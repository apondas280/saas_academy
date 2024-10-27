<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FileUploader;
use App\Models\Onboarding;
use Illuminate\Http\Request;

class OnboardingController extends Controller
{
    public function index()
    {
        return view('admin.onboarding.index');
    }
    public function show($company = '', $sequence)
    {
        if ($sequence == 'finish' && ! Onboarding::where('status', 0)->exists()) {
            return view('admin.onboarding.finish');
        } elseif (! Onboarding::where('status', 0)->exists()) {
            return to_route('admin.dashboard');
        }

        $incomplete_step = Onboarding::where('status', 0)->value('id');
        if ($sequence != 1 && $sequence > $incomplete_step) {
            return to_route('onboarding.step', $incomplete_step)->with('error', get_phrase('Please complete previous step.'));
        }

        $payload              = Onboarding::where('sequence', $sequence)->value('payload');
        $page_data['payload'] = $payload ? json_decode($payload, true) : [];

        return view("admin.onboarding.step_{$sequence}", $page_data);
    }
    public function store(Request $request, $company = '', $sequence)
    {
        $process = ['processStepOne', 'processStepTwo', 'processStepThree'];

        // process onboarding step
        self::{$process[$sequence - 1]}($request);

        // redirect to next step or finish (sequence 3 is the last step)
        return to_route('onboarding.step', $sequence == 3 ? 'finish' : $sequence + 1);
    }

    public static function processStepOne($request): void
    {
        $data['payload'] = json_encode(['purpose' => $request->purpose]);
        self::updateOnboardingProcess(1, $data);
    }
    public static function processStepTwo($request): void
    {
        $data['payload']['timezone'] = $request->timezone;
        $data['payload']['logo']     = FileUploader::upload($request->logo, 'logo');

        $data['payload'] = json_encode($data['payload']);

        self::updateOnboardingProcess(2, $data);
    }
    public static function processStepThree($request): void
    {
        $data['payload'] = json_encode(['social_media' => $request->social_media]);
        self::updateOnboardingProcess(3, $data);
    }

    public static function updateOnboardingProcess(int $sequence, array $data)
    {
        $data['status'] = 1;
        Onboarding::where('sequence', $sequence)->update($data);
    }
}
