<?php

namespace App\Http\Controllers\instructor;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\FileUploader;
use App\Models\TeamPackagePurchase;
use App\Models\TeamTrainingPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class TeamTrainingController extends Controller
{
    public function index($company = "")
    {
        $query = TeamTrainingPackage::join('courses', 'team_training_packages.course_id', 'courses.id')
            ->select('team_training_packages.*', 'courses.title as course_title', 'courses.slug as course_slug', 'courses.price as course_price')
            ->where('team_training_packages.user_id', auth()->user()->id);

        if (request()->has('search')) {
            $query = $query->where('team_training_packages.title', 'LIKE', "%" . request()->query('search') . "%");
        }

        $page_data['packages'] = $query->paginate(20)->appends(request()->query());
        return view('instructor.team_training.index', $page_data);
    }

    public function store(Request $request)
    {
        $package['title']          = $request->title;
        $package['slug']           = Str::slug($request->title);
        $package['course_privacy'] = $request->course_privacy;
        $package['course_id']      = $request->course_id;
        $package['allocation']     = $request->allocation;
        $package['pricing_type']   = $request->pricing_type;
        $package['price']          = $request->price;
        $package['expiry_type']    = $request->expiry_type;
        $package['date']           = $request->expiry_date;
        $package['thumbnail']      = $request->thumbnail;

        $validator = Validator::make($package, [
            'title'          => [
                'required',
                Rule::unique('team_training_packages')->where(function ($query) {
                    return $query->where('user_id', auth()->user()->id);
                }),
            ],
            'slug'           => [
                'required',
                Rule::unique('team_training_packages')->where(function ($query) {
                    return $query->where('user_id', auth()->user()->id);
                }),
            ],
            'course_privacy' => 'required|in:public,private',
            'allocation'     => 'required|numeric|min:0',
            'pricing_type'   => 'required|in:0,1',
            'price'          => 'required_if:is_paid,1',
            'expiry_type'    => 'required_if:is_paid,1|in:limited,lifetime',
            'date'           => 'required_if:expiry_type,limited',
            'thumbnail'      => 'required|file|mimes:jpg,jpeg,png',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->expiry_type == 'limited') {
            $date                   = explode('-', $request->expiry_date);
            $package['start_date']  = strtotime($date[0]);
            $package['expiry_date'] = strtotime($date[1]);
        }

        unset($package['thumbnail']);
        if ($request->thumbnail) {
            $package['thumbnail'] = "uploads/team_training/thumbnail/" . nice_file_name($request->title, $request->thumbnail->extension());
            FileUploader::upload($request->thumbnail, $package['thumbnail']);
        }

        $package['user_id']  = auth()->user()->id;
        $package['features'] = json_encode($request->features);
        $package['status']   = 1;

        TeamTrainingPackage::create($package);
        return redirect()->back()->with('success', get_phrase('Package has been created.'));
    }

    public function edit($company = "", $id)
    {
        $page_data['package'] = TeamTrainingPackage::join('courses', 'team_training_packages.course_id', 'courses.id')
            ->select('team_training_packages.*', 'courses.title as course_title', 'courses.slug as course_slug', 'courses.price as course_price')
            ->where('team_training_packages.id', $id)->first();

        return view('instructor.team_training.edit', $page_data);
    }

    public function update(Request $request, $company = "", $id)
    {
        $package['title']          = $request->title;
        $package['slug']           = Str::slug($request->title);
        $package['course_privacy'] = $request->course_privacy;
        $package['course_id']      = $request->course_id;
        $package['allocation']     = $request->allocation;
        $package['pricing_type']   = $request->pricing_type;
        $package['price']          = $request->price;
        $package['expiry_type']    = $request->expiry_type;
        $package['date']           = $request->expiry_date;
        $package['thumbnail']      = $request->thumbnail;

        $validator = Validator::make($package, [
            'title'          => [
                'required',
                Rule::unique('team_training_packages')->where(function ($query) use ($id) {
                    return $query->where(['id' => ! $id, 'user_id' => auth()->user()->id]);
                }),
            ],
            'slug'           => [
                'required',
                Rule::unique('team_training_packages')->where(function ($query) use ($id) {
                    return $query->where(['id' => ! $id, 'user_id' => auth()->user()->id]);
                }),
            ],
            'course_privacy' => 'required|in:public,private',
            'allocation'     => 'required|numeric|min:0',
            'pricing_type'   => 'required|in:0,1',
            'price'          => 'required_if:is_paid,1',
            'expiry_type'    => 'required_if:is_paid,1|in:limited,lifetime',
            'date'           => 'required_if:expiry_type,limited',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->expiry_type == 'limited') {
            $date                   = explode('-', $request->expiry_date);
            $package['start_date']  = strtotime($date[0]);
            $package['expiry_date'] = strtotime($date[1]);
        }

        unset($package['thumbnail']);
        if ($request->thumbnail) {
            $package['thumbnail'] = "uploads/team_training/thumbnail/" . nice_file_name($request->title, $request->thumbnail->extension());
            FileUploader::upload($request->thumbnail, $package['thumbnail']);
        }

        $package['user_id'] = auth()->user()->id;
        $filteredFeatures   = array_filter($request->features, function ($value) {
            return ! is_null($value);
        });
        $package['features'] = json_encode(array_values($filteredFeatures));

        TeamTrainingPackage::find($id)->update($package);
        return redirect()->back()->with('success', get_phrase('Package has been updated.'));
    }

    public function delete($company = "", $id)
    {
        TeamTrainingPackage::find($id)->delete();
        return redirect()->back()->with('error', get_phrase('Package has been deleted.'));
    }

    public function duplicate($company = "", $id)
    {
        $package = TeamTrainingPackage::find($id)->toArray();

        $package['title'] = $package['title'] . ' copy';
        $package['slug']  = Str::slug($package['title']);
        unset($package['id'], $package['created_at'], $package['updated_at']);

        $insert_id = TeamTrainingPackage::insertGetId($package);
        return to_route('instructor.team.packages.edit', $insert_id)->with('success', get_phrase('Package has been copied.'));
    }

    public function get_courses(Request $request)
    {
        if (isset($request->privacy) && in_array($request->privacy, ['public', 'private'])) {
            $privacy = $request->privacy == 'public' ? 'active' : 'private';
            $courses = Course::where('status', $privacy)->get();
            return view('instructor.team_training.load_courses', compact('courses'));
        }
    }

    public function get_course_price(Request $request)
    {
        if (isset($request->course_id) && $request->course_id != '') {
            $price = Course::where('id', $request->course_id)->value('price');
            return $price;
        }
    }

    public function toggle_status($company = "", $id)
    {
        $package = TeamTrainingPackage::find($id);
        $status  = $package->status ? 0 : 1;
        $package->update(['status' => $status]);

        return redirect()->back()->with('success', get_phrase('Status has been updated.'));
    }

    public function purchase_history()
    {
        $page_data['purchases'] = TeamPackagePurchase::join('team_training_packages', 'team_package_purchases.package_id', 'team_training_packages.id')
            ->where('team_training_packages.user_id', auth()->user()->id)
            ->select(
                'team_package_purchases.*',
                'team_training_packages.user_id as author',
                'team_training_packages.title',
                'team_training_packages.slug',
                'team_training_packages.price as amount',
            )
            ->latest('team_package_purchases.id')->paginate(20)->appends(request()->query());

        return view('instructor.team_training.purchase_history', $page_data);
    }

    public function invoice($company = "", $id)
    {
        $page_data['invoice'] = TeamPackagePurchase::join('team_training_packages', 'team_package_purchases.package_id', 'team_training_packages.id')
            ->where('team_training_packages.user_id', auth()->user()->id)
            ->where('team_package_purchases.id', $id)
            ->select('team_package_purchases.*', 'team_training_packages.title', 'team_training_packages.slug')
            ->first();

        return view('instructor.team_training.invoice', $page_data);
    }
}
