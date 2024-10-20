<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class CoursePlayerController extends Controller
{
    public function streamLessonFile(Request $request)
    {
        if (! isset($_SERVER['HTTP_REFERER'])) {
            return false;
        }

        $course_id = $request->query('course_id');
        $lesson_id = $request->query('lesson_id');
        $user_id   = auth()->id();

        // Authentication & Enrollment Check
        if (! $user_id || ! $this->isUserEnrolled($course_id, $user_id)) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        // Fetch lesson details
        $lesson = $this->getLesson($lesson_id);
        if (! $lesson) {
            return response()->json(['error' => 'Lesson not found'], 404);
        }

        $lessonType = $lesson->lesson_type;
        $filePath   = $this->getFilePath($lesson, $lessonType);

        if (! file_exists($filePath)) {
            return response()->json(['error' => 'File not found'], 404);
        }

        // Stream media file or directly serve small files
        return ($lessonType === 'system-video' || $lessonType === 'audio')
        ? $this->streamMediaFile($filePath, $request)
        : $this->serveFile($filePath);
    }

    private function streamMediaFile($filePath, Request $request)
    {
        $fileSize = filesize($filePath);
        $range    = $request->header('Range');

        // Default start and end if range not requested
        $start = 0;
        $end   = $fileSize - 1;

        // Check if the Range header is present and valid
        if ($range) {
            // Parse the range header, e.g., "Range: bytes=0-"
            if (preg_match('/bytes=(\d*)-(\d*)/', $range, $matches)) {
                $start = isset($matches[1]) && $matches[1] !== '' ? intval($matches[1]) : $start;
                $end   = isset($matches[2]) && $matches[2] !== '' ? intval($matches[2]) : $end;
            }
        }

        // Calculate content length and make sure range is valid
        $length = $end - $start + 1;

        $response = new StreamedResponse(function () use ($filePath, $start, $length) {
            $file = fopen($filePath, 'rb');
            fseek($file, $start);
            $bufferSize = 1024 * 8; // 8KB buffer

            while (! feof($file) && ftell($file) <= $start + $length) {
                echo fread($file, $bufferSize);
                ob_flush();
                flush();
            }
            fclose($file);
        }, 206); // 206 Partial Content status

        // Add headers required for partial content
        $response->headers->set('Content-Type', mime_content_type($filePath));
        $response->headers->set('Content-Length', $length);
        $response->headers->set('Accept-Ranges', 'bytes');
        $response->headers->set('Content-Range', "bytes $start-$end/$fileSize");
        $response->headers->set('Content-Disposition', 'inline; filename="' . basename($filePath) . '"');
        $response->headers->set('Access-Control-Allow-Origin', '*');

        return $response;
    }

    private function serveFile($filePath)
    {
        return response()->file($filePath, [
            'Content-Type'        => mime_content_type($filePath),
            'Content-Disposition' => 'inline; filename="' . basename($filePath) . '"',
        ]);
    }

    private function getLesson($lesson_id)
    {
        return \App\Models\Lesson::find($lesson_id);
    }

    private function getFilePath($lesson, $lessonType)
    {
        $filePaths = [
            'system-video' => public_path($lesson->lesson_src),
            'audio'        => asset('storage/lesson_videos/' . $lesson->file),
            'document'     => asset('storage/lesson_files/' . $lesson->file),
            'image'        => asset('storage/lesson_images/' . $lesson->file),
        ];

        return $filePaths[$lessonType] ?? '';
    }

    private function isUserEnrolled($course_id, $user_id)
    {
        return \App\Models\Enrollment::where('course_id', $course_id)
            ->where('user_id', $user_id)
            ->exists();
    }
}
