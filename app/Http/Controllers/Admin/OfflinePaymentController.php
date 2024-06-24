<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\OfflinePayment;
use App\Models\Payment_history;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class OfflinePaymentController extends Controller
{
    public function index(Request $request)
    {
        $payments = OfflinePayment::orderBY('id', 'DESC');

        if ($request->status == 'approved') {
            $payments->where('status', 1);
        } elseif ($request->status == 'suspended') {
            $payments->where('status', 2);
        } elseif ($request->status == 'pending') {
            $payments->where('status', 0)->orWhere('status', null);
        }


        $page_data['payments'] = $payments->paginate(10);
        return view('admin.offline_payments.index', $page_data);
    }

    public function download_doc($id)
    {
        // validate id
        if (empty($id)) {
            Session::flash('error', get_phrase('Data not found.'));
            return redirect()->back();
        }

        // payment details
        $payment_details = OfflinePayment::where('id', $id)->first();
        $filePath        = public_path($payment_details->doc);
        if (!file_exists($filePath)) {
            Session::flash('error', get_phrase('Data not found.'));
            return redirect()->back();
        }
        // download file
        return Response::download($filePath);
    }

    public function accept_payment($id)
    {
        // validate id
        if (empty($id)) {
            Session::flash('error', get_phrase('Data not found.'));
            return redirect()->back();
        }

        // payment details
        $query = OfflinePayment::where('id', $id)->where('status', 0);
        if ($query->doesntExist()) {
            Session::flash('error', get_phrase('Data not found.'));
            return redirect()->back();
        }

        $payment_details = $query->first();
        $items           = json_decode($payment_details->items);

        $payment['invoice']      = Str::random(20);
        $payment['user_id']      = $payment_details['user_id'];
        $payment['payment_type'] = 'offline';
        $payment['coupon']       = $payment_details->coupon;

        foreach ($items as $item) {
            $accept_payment = null;
            if ($payment_details->item_type == 'course') {
                $course               = Course::where('id', $item)->first();
                $payment['course_id'] = $course->id;
                $payment['amount']    = $course->discount_flag == 1 ? $course->discounted_price : $course->price;
                $payment['tax']       = $payment['amount'] * (get_settings('course_selling_tax') / 100);

                if (get_course_creator_id($course->id)->role == 'admin') {
                    $payment['admin_revenue'] = $payment['amount'];
                } else {
                    $payment['instructor_revenue'] = $payment['amount'] * (get_settings('instructor_revenue') / 100);
                    $payment['admin_revenue']      = $payment['amount'] - $payment['instructor_revenue'];
                }
                $accept_payment = Payment_history::insert($payment);
            }

            // start enroll user
            if ($accept_payment) {
                $enroll['course_id']       = $course->id;
                $enroll['user_id']         = $payment_details['user_id'];
                $enroll['enrollment_type'] = "paid";
                $enroll['entry_date']      = time();
                $enroll['created_at']      = date('Y-m-d H:i:s');
                $enroll['updated_at']      = date('Y-m-d H:i:s');

                // insert a new enrollment
                $enrollment = Enrollment::insert($enroll);
            }
        }

        // remove items from offline payment
        OfflinePayment::where('id', $id)->update(['status' => 1]);

        // go back
        Session::flash('success', 'Payment has been accepted.');
        return redirect()->route('admin.offline.payments');
    }

    function decline_payment($id)
    {
        // remove items from offline payment
        OfflinePayment::where('id', $id)->update(['status' => 2]);

        // go back
        Session::flash('success', 'Payment has been suspended');
        return redirect()->route('admin.offline.payments');
    }
}
