<?php

namespace App\Http\Controllers;

use App\Models\Addtocart;
use App\Models\Category;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Language;
use App\Models\Live_class;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use PDOException;

class ApiController extends Controller
{
    //register_company
    public function register_company(Request $request)
    {
        $db_user = 'ctmacademy_creativeitem';
        $db_pass = 'a7#YwR!Ii]^k';
        $db_host = '127.0.0.1';
        $db_name = 'ctmacademy_creativeitem';

        // Get the company name from the URL
        $app_variable = str_replace('index.php', '', $_SERVER['SCRIPT_NAME']);
        $app_variable = str_replace($app_variable, '', $_SERVER['REQUEST_URI']);
        $app_variable = explode('/', $app_variable);

        if (isset($app_variable[0])) {
            $company_slug = $app_variable[0];

            try {
                // Establish database connection
                $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // Prepare SQL statement with a WHERE clause
                $stmt = $pdo->prepare("SELECT * FROM saas_companies WHERE company_slug = :company_slug");
                $stmt->bindParam(':company_slug', $company_slug);
                $stmt->execute();

                // Check if any rows are returned
                if ($stmt->rowCount() > 0) {
                    $response = [
                        'status'  => 200,
                        'message' => 'Company created successfully',
                    ];
                } else {
                    $response = [
                        'status'  => 404,
                        'message' => 'Company creation failed',
                    ];
                }
            } catch (PDOException $e) {
                // Handle errors
                $response = [
                    'status'  => 500,
                    'message' => 'Database error: ' . $e->getMessage(),
                ];
            }

            // Return the response as JSON
            return response()->json($response);
        }

        // If no company_slug is provided in the URL
        return response()->json([
            'status'  => 400,
            'message' => 'Invalid request',
        ]);
    }

    //student login function
    public function login(Request $request)
    {
        $fields = $request->validate([
            'email'    => 'required|string',
            'password' => 'required|string',
        ]);

        // Check email
        $user = User::where('email', $fields['email'])->where('status', 1)->first();

        // Check password
        if (! $user || ! Hash::check($fields['password'], $user->password)) {
            if (isset($user) && $user->count() > 0) {
                return response([
                    'message' => 'Invalid credentials!',
                ], 401);
            } else {
                return response([
                    'message' => 'User not found!',
                ], 401);
            }
        } else if ($user->role == 'student') {

            $token = $user->createToken('auth-token')->plainTextToken;

            $user->photo = get_photo('user_image', $user->photo);

            $response = [
                'message' => 'Login successful',
                'user'    => $user,
                'token'   => $token,
            ];

            return response($response, 201);
        } else {

            //user not authorized
            return response()->json([
                'message' => 'User not found!',
            ], 400);
        }
    }

    //student logout function
    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete;

        return response()->json([
            'message' => 'Logged out successfully.',
        ], 201);
    }

    // update user data
    public function update_userdata(Request $request)
    {

        $response = array();
        $token    = $request->bearerToken();

        if (isset($token) && $token != '') {
            $user_id = auth('sanctum')->user()->id;

            if ($request->name != "") {
                $data['name'] = htmlspecialchars($request->name, ENT_QUOTES, 'UTF-8');
            } else {
                $response['status']       = 'failed';
                $response['error_reason'] = 'name can not be empty';
                return $response;
            }

            $data['biography'] = $request->biography;
            $data['about']     = $request->about;
            $data['address']   = $request->address;
            $data['facebook']  = htmlspecialchars($request->facebook, ENT_QUOTES, 'UTF-8');
            $data['twitter']   = htmlspecialchars($request->twitter, ENT_QUOTES, 'UTF-8');
            $data['linkedin']  = htmlspecialchars($request->linkedin, ENT_QUOTES, 'UTF-8');

            User::where('id', $user_id)->update($data);

            $user        = auth('sanctum')->user();
            $user->photo = get_photo('user_image', $user->photo);

            $response['status']       = 'success';
            $response['user']         = $user;
            $response['error_reason'] = 'None';
        } else {
            $response['status']       = 'failed';
            $response['error_reason'] = 'Unauthorized login';
        }

        return $response;
    }

    //
    public function top_courses($company = "", $top_course_id = "")
    {
        $query = Course::orderBy('id', 'desc')->limit(10)->get();

        if ($top_course_id != "") {
            $query->where('id', $top_course_id);
        }

        $result = course_data($query);

        return $result;
    }

    public function all_categories()
    {
        $all_categories = array();
        $categories     = Category::where('parent_id', 0)->get();
        foreach ($categories as $key => $category) {
            $all_categories[$key]                      = $category;
            $all_categories[$key]['thumbnail']         = get_photo('category_thumbnail', $category['thumbnail']);
            $all_categories[$key]['number_of_courses'] = get_category_wise_courses($category['id'])->count();

            $all_categories[$key]['number_of_sub_categories'] = $category->childs->count();

            $sub_categories = $category->childs;
        }

        return $all_categories;
    }

    // Get categories
    public function categories($category_id = "")
    {
        if ($category_id != "") {
            $categories = Category::where('id', $category_id)->first();
        } else {
            $categories = Category::where('parent_id', 0)->get();
        }
        foreach ($categories as $key => $category) {
            $categories[$key]['thumbnail']         = get_photo('category_thumbnail', $category['thumbnail']);
            $categories[$key]['number_of_courses'] = get_category_wise_courses($category['id'])->count();

            $categories[$key]['number_of_sub_categories'] = $category->childs->count();
        }
        return $categories;
    }

    // Fetch all the categories
    public function category_details(Request $request)
    {

        $response   = array();
        $categories = array();
        $categories = sub_categories($request->category_id);

        $response[0]['sub_categories'] = $categories;

        $courses = get_category_wise_courses($request->category_id);

        $response[0]['courses'] = course_data($courses);

        return $response;
    }

    // Fetch all the categories
    public function sub_categories($parent_category_id = "")
    {

        $categories = array();
        $categories = sub_categories($parent_category_id);

        return $categories;
    }

    // Fetch all the courses belong to a certain category
    public function category_wise_course(Request $request)
    {
        $category_id = $request->category_id;
        $courses     = get_category_wise_courses($category_id);

        $result = course_data($courses);

        return $result;
    }

    // Filter course
    public function filter_course(Request $request)
    {

        $selected_category      = $request->selected_category;
        $selected_price         = $request->selected_price;
        $selected_level         = $request->selected_level;
        $selected_language      = $request->selected_language;
        $selected_rating        = $request->selected_rating;
        $selected_search_string = ltrim(rtrim($request->selected_search_string));

        $query = Course::query();

        if ($selected_search_string != "" && $selected_search_string != "null") {
            $query->where('title', $selected_search_string->id);
        }
        if ($selected_category != "all") {
            $query->where('category_id', $selected_category);
        }

        if ($selected_price != "all") {
            if ($selected_price == "paid") {
                $query->where('is_paid', 1);
            } elseif ($selected_price == "free") {
                $query->where('is_paid', 0)
                    ->orWhere('is_paid', null);
            }
        }

        if ($selected_level != "all") {
            $query->where('level', $selected_level);
        }

        if ($selected_language != "all") {
            $query->where('language', $selected_language);
        }

        $query->where('status', 'active');
        $courses = $query->get();

        // This block of codes return the required data of courses
        $result = array();
        $result = course_data($courses);
        return $result;
    }

    // Fetch all the courses belong to a certain category
    public function languages()
    {
        $response  = array();
        $languages = Language::select('name')->distinct()->get();

        foreach ($languages as $key => $language) {
            $response[$key]['id']             = $key + 1;
            $response[$key]['value']          = $language->name;
            $response[$key]['displayedValue'] = ucfirst($language->name);
        }

        return $response;
    }

    // Filter course
    public function courses_by_search_string(Request $request)
    {
        $search_string = $request->search_string;

        $courses  = Course::where('title', 'LIKE', "%{$search_string}%")->where('status', 'active')->get();
        $response = course_data($courses);

        return $response;
    }

    // Course Details
    public function course_details_by_id(Request $request)
    {

        $response = array();

        $course_id = $request->course_id;

        $user    = auth('sanctum')->user();
        $user_id = $user ? $user->id : 0;

        if ($user_id > 0) {
            $response = course_details_by_id($user_id, $course_id);
        } else {
            $response = course_details_by_id(0, $course_id);
        }
        return $response;
    }

    //Protected APIs. This APIs will require Authorization.
    // My Courses API
    public function my_courses(Request $request)
    {
        $token = $request->bearerToken();

        if (isset($token) && $token != '') {
            $user_id = auth('sanctum')->user()->id;

            $my_courses     = array();
            $my_courses_ids = Enrollment::where('user_id', $user_id)->get();
            foreach ($my_courses_ids as $my_courses_id) {
                $course_details = Course::find($my_courses_id['course_id']);
                array_push($my_courses, $course_details);
            }

            $my_courses = course_data($my_courses);

            foreach ($my_courses as $key => $my_course) {
                if (isset($my_course['id']) && $my_course['id'] > 0) {
                    $my_courses[$key]['completion']                        = round(course_progress($my_course['id'], $user_id));
                    $my_courses[$key]['total_number_of_lessons']           = count(get_lessons('course', $my_course['id']));
                    $my_courses[$key]['total_number_of_completed_lessons'] = get_completed_number_of_lesson($user_id, 'course', $my_course['id']);
                }
            }

            return $my_courses;
        } else {
        }
    }

    // My Courses API
    public function my_wishlist(Request $request)
    {
        $token = $request->bearerToken();

        if (isset($token) && $token != '') {
            $user_id   = auth('sanctum')->user()->id;
            $wishlist  = Wishlist::where('user_id', $user_id)->pluck('course_id');
            $wishlists = json_decode($wishlist);

            if (sizeof($wishlists) > 0) {
                $courses  = Course::whereIn('id', $wishlists)->get();
                $response = course_data($courses);
            } else {
                $response = array();
            }
        } else {
        }

        return $response;
    }

    // Remove from wishlist
    public function toggle_wishlist_items(Request $request)
    {
        $token = $request->bearerToken();

        if (isset($token) && $token != '') {
            $user_id = auth('sanctum')->user()->id;

            $status       = "";
            $course_id    = $request->course_id;
            $wishlists    = array();
            $check_status = Wishlist::where('course_id', $course_id)->where('user_id', $user_id)->first();
            if (empty($check_status)) {
                $wishlist            = new Wishlist();
                $wishlist->course_id = $request->course_id;
                $wishlist->user_id   = $user_id;
                $wishlist->save();
                $status = "added";
            } else {
                Wishlist::where('user_id', $user_id)->where('course_id', $request->course_id)->delete();
                $status = "removed";
            }

            $response['status'] = $status;
            return $response;
        } else {
            return response()->json([
                'message' => 'Please login first',
            ], 400);
        }
    }

    // Get all the sections
    public function sections(Request $request)
    {

        $token = $request->bearerToken();

        if (isset($token) && $token != '') {
            $user_id   = auth('sanctum')->user()->id;
            $course_id = $request->course_id;
            $response  = sections($course_id, $user_id);
        } else {
        }

        return $response;
    }

    // password reset
    public function update_password(Request $request)
    {

        $token    = $request->bearerToken();
        $response = array();

        if (isset($token) && $token != '') {
            $auth = auth('sanctum')->user();

            // The passwords matches
            if (! Hash::check($request->get('current_password'), $auth->password)) {
                $response['status']  = 'failed';
                $response['message'] = 'Current Password is Invalid';

                return $response;
            }

            // Current password and new password same
            if (strcmp($request->get('current_password'), $request->new_password) == 0) {
                $response['status']  = 'failed';
                $response['message'] = 'New Password cannot be same as your current password.';

                return $response;
            }

            // Current password and new password same
            if (strcmp($request->get('confirm_password'), $request->new_password) != 0) {
                $response['status']  = 'failed';
                $response['message'] = 'New Password is not same as your confirm password.';

                return $response;
            }

            $user           = User::find($auth->id);
            $user->password = Hash::make($request->new_password);
            $user->save();

            $response['status']  = 'success';
            $response['message'] = 'Password Changed Successfully';

            return $response;
        } else {
            $response['status']  = 'failed';
            $response['message'] = 'Please login first';

            return $response;
        }
    }

    public function account_disable(Request $request)
    {

        $token    = $request->bearerToken();
        $response = array();

        if (isset($token) && $token != '') {
            $auth = auth('sanctum')->user();

            $account_password = $request->get('account_password');

            // The passwords matches
            if (Hash::check($account_password, $auth->password)) {
                User::where('id', $auth->id)->update([
                    'status' => 0,
                ]);
                $response['validity'] = 1;
                $response['message']  = 'Account has been removed';
            } else {
                $response['validity'] = 0;
                $response['message']  = 'Mismatch password';
            }
        }

        return $response;
    }

    public function cart_list(Request $request)
    {
        $token      = $request->bearerToken();
        $cart_items = array();

        if (isset($token) && $token != '') {
            $auth           = auth('sanctum')->user();
            $my_courses_ids = Addtocart::where('user_id', $auth->id)->get();

            foreach ($my_courses_ids as $my_courses_id) {
                $course_details = Course::find($my_courses_id['course_id']);
                array_push($cart_items, $course_details);
            }

            $cart_items = course_data($cart_items);
        }

        return $cart_items;
    }

    // Toggle from cart list
    public function toggle_cart_items(Request $request)
    {
        $token = $request->bearerToken();

        if (isset($token) && $token != '') {
            $user_id = auth('sanctum')->user()->id;

            $status       = "";
            $course_id    = $request->course_id;
            $cart_items   = array();
            $check_status = Addtocart::where('course_id', $course_id)->where('user_id', $user_id)->first();
            if (empty($check_status)) {
                $cart_item            = new Addtocart();
                $cart_item->course_id = $request->course_id;
                $cart_item->user_id   = $user_id;
                $cart_item->save();
                $status = "added";
            } else {
                Addtocart::where('user_id', $user_id)->where('course_id', $request->course_id)->delete();
                $status = "removed";
            }

            $response['status'] = $status;
            return $response;
        }
    }

    public function save_course_progress(Request $request)
    {
        $token = $request->bearerToken();

        if (isset($token) && $token != '') {
            $user_id = auth('sanctum')->user()->id;

            $lessons = get_lessons('lesson', $request->lesson_id);

            update_watch_history_manually($request->lesson_id, $lessons[0]->course_id, $user_id);

            return course_completion_data($lessons[0]->course_id, $user_id);
        }
    }

    public function live_class_schedules(Request $request)
    {
        $response = array();

        $classes = array();

        $live_classes = Live_class::where('course_id', $request->course_id)->orderBy('class_date_and_time', 'desc')->get();

        foreach ($live_classes as $key => $live_class) {
            $additional_info = json_decode($live_class->additional_info, true);

            $classes[$key]['class_topic']         = $live_class->class_topic;
            $classes[$key]['provider']            = $live_class->provider;
            $classes[$key]['note']                = $live_class->note;
            $classes[$key]['class_date_and_time'] = $live_class->class_date_and_time;
            $classes[$key]['meeting_id']          = $additional_info['id'];
            $classes[$key]['meeting_password']    = $additional_info['password'];
            $classes[$key]['start_url']           = $additional_info['start_url'];
            $classes[$key]['join_url']            = $additional_info['join_url'];
        }

        $response['live_classes'] = $classes;

        $response['zoom_sdk_client_id']     = get_settings('zoom_sdk_client_id');
        $response['zoom_sdk_client_secret'] = get_settings('zoom_sdk_client_secret');

        return $response;
    }

    public function payment(Request $request)
    {
        $token = $request->bearerToken();

        if (isset($token) && $token != '') {
            $user = auth('sanctum')->user();
            Auth::login($user);
        }

        if ($request->app_url) {
            session(['app_url' => $request->app_url . '://']);
        }

        return redirect(route('payment'));
    }

    public function update_subscription(Request $request)
    {
        // Validate the request payload
        $validate = $request->validate([
            'payload' => 'required|array',
        ]);

        $data = ['payload' => json_encode($validate['payload'])];

        $table = DB::table('grow_up_lms_subscriptions');
        if ($table->exists()) {
            $table->update($data);
            $message = 'Subscription updated successfully.';
        } else {
            $table->insert($data);
            $message = 'Subscription created successfully.';
        }

        // make a company storage folder
        $company         = $request->route('company');
        $company_storage = public_path("upload/{$company}");
        if (! is_dir($company_storage)) {
            File::makeDirectory($company_storage, 0777, true, true);
        }

        // Return a JSON response
        return response()->json([
            'message' => $message,
            'success' => true,
        ]);
    }

}