<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Question;
use App\Models\QuizSubmission;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MobileViewController extends Controller
{
    public function index(Request $request)
    {
        $page_data['quiz']    = Lesson::where('id', $request->lesson_id)->first();
        $page_data['user_id'] = $request->user_id;

        return view('frontend.default.student.mobile_view.quiz.index', $page_data);
    }

    public function quiz_submit_mobile(Request $request, $id = "")
    {
        $retake = Lesson::where('id', $request->quiz_id)->value('retake');
        $submit = QuizSubmission::where('quiz_id', $request->quiz_id)->where('user_id', $request->user_id)->count();

        if ($submit > $retake) {
            Session::flash('warning', get_phrase('Attempt has been over.'));
            return redirect()->back();
        }

        $inputs  = collect($request->all());
        $quiz_id = $inputs->pull('quiz_id');
        $inputs->forget(['_token', 'quiz_id', 'user_id']); // Exclude `user_id` here

        // Filter only question IDs for submissions
        $submits = $inputs->whereNotNull();

        foreach ($submits as $key => $submit) {
            if (is_string($submit) && ($submit != 'true' && $submit != 'false')) {
                $decodedSubmit = json_decode($submit);

                // Ensure decoded submission is an array before using array_column
                if (is_array($decodedSubmit)) {
                    $submits[$key] = array_column($decodedSubmit, 'value');
                } else {
                    $submits[$key] = [$submit]; // handle as single value if not an array
                }
            }
        }

        $question_ids      = $submits->keys();
        $submitted_answers = $submits->values();
        $questions         = Question::whereIn('id', $question_ids)->get();

        $right_answers = $wrong_answers = [];
        foreach ($questions as $key => $question) {
            $correct_answer = json_decode($question->answer, true);
            $submitted      = $submitted_answers[$key];

            if ($question->type == 'mcq') {
                $isCorrect = empty(array_diff($correct_answer, $submitted));
            } elseif ($question->type == 'fill_blanks') {
                $isCorrect = count($correct_answer) === count($submitted);

                if ($isCorrect) {
                    for ($i = 0; $i < count($correct_answer); $i++) {
                        // Ensure both elements are strings before comparison
                        if (is_string($correct_answer[$i]) && is_string($submitted[$i])) {
                            if (strtolower($correct_answer[$i]) != strtolower($submitted[$i])) {
                                $isCorrect = false;
                                break;
                            }
                        } else {
                            $isCorrect = false;
                            break;
                        }
                    }
                } else {
                    $isCorrect = false;
                }
            } elseif ($question->type == 'true_false') {
                // Ensure both elements are strings before comparison
                if (is_string($correct_answer) && is_string($submitted)) {
                    // $isCorrect = strtolower($correct_answer) == strtolower($submitted);
                    $isCorrect = strtolower(json_encode($correct_answer)) == strtolower($submitted);
                }
            }

            $isCorrect ? $right_answers[] = $question->id : $wrong_answers[] = $question->id;
        }

        $data['quiz_id']        = $quiz_id;
        $data['user_id']        = $request->user_id;
        $data['correct_answer'] = $right_answers ? json_encode($right_answers) : null;
        $data['wrong_answer']   = $wrong_answers ? json_encode($wrong_answers) : null;
        $data['submits']        = $submits->count() > 0 ? json_encode($submits->toArray()) : null;

        QuizSubmission::insert($data);
        return redirect()->back();
    }

    public function load_result_mobile(Request $request)
    {
        $userId = $request->query('user_id');

        $page_data['quiz']      = Lesson::where('id', $request->quiz_id)->first();
        $page_data['questions'] = Question::where('quiz_id', $request->quiz_id)->get();
        $page_data['result']    = QuizSubmission::where('id', $request->submit_id)
            ->where('quiz_id', $request->quiz_id)
            ->where('user_id', $userId)
            ->first();

        return view('frontend.default.student.mobile_view.quiz.result', $page_data);
    }

    public function load_questions_mobile(Request $request)
    {
        $page_data['quiz']      = Lesson::where('id', $request->quiz_id)->first();
        $page_data['questions'] = Question::where('quiz_id', $request->quiz_id)->get();
        $page_data['submits']   = QuizSubmission::where('quiz_id', $request->quiz_id)
            ->where('user_id', $request->user_id)
            ->get();

        return view('frontend.default.student.mobile_view.quiz.questions', $page_data);
    }
}
