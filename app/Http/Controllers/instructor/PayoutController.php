<?php

namespace App\Http\Controllers\instructor;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Payout;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PayoutController extends Controller
{
    public function index()
    {
        $total_income = Course::join('payment_histories', 'courses.id', 'payment_histories.course_id')
            ->select('payment_histories.*', 'courses.id as course_id')
            ->where('courses.user_id', auth()->user()->id)
            ->sum('payment_histories.instructor_revenue');

        $start_date = strtotime('first day of this month');
        $end_date   = strtotime('last day of this month');

        if (request()->has('eDateRange')) {
            // modify date and prepare to compare with database
            $date       = explode('-', urldecode(request()->query('eDateRange')));
            $start_date = strtotime($date[0] . ' 00:00:00');
            $end_date   = strtotime($date[1] . ' 23:59:59');
        }
        $query = Payout::where('user_id', auth()->user()->id)->where('created_at', '>=', date('Y-m-d H:i:s', $start_date))
            ->where('created_at', '<=', date('Y-m-d H:i:s', $end_date))->latest('id');

        $page_data['start_date']     = $start_date;
        $page_data['end_date']       = $end_date;
        $page_data['end_date']       = $end_date;
        $page_data['payout_reports'] = $query->paginate(10)->appends(request()->query('eDateRange'));

        $page_data['total_payout']   = Payout::where('status', 1)->where('user_id', auth()->user()->id)->sum('amount');
        $page_data['balance']        = $total_income - $page_data['total_payout'];
        $page_data['payout_request'] = Payout::where('user_id', auth()->user()->id)->where('status', 0)->first();

        return view('instructor.payout_report.index', $page_data);
    }

    public function store(Request $request)
    {

        // check old request
        if (Payout::where('user_id', auth()->user()->id)->where('status', 0)->exists()) {
            Session::flash('error', get_phrase('Your request is in process.'));
            return redirect()->back();
        }

        // check amount validity
        $total_income = Course::join('payment_histories', 'courses.id', 'payment_histories.course_id')
            ->select('payment_histories.*', 'courses.id as course_id')
            ->where('courses.user_id', auth()->user()->id)
            ->sum('payment_histories.instructor_revenue');

        $total_payout      = Payout::where('user_id', auth()->user()->id)->sum('amount');
        $balance_remaining = $total_income - $total_payout;

        if ($request->amount < 1 || $request->amount > $balance_remaining) {
            Session::flash('error', get_phrase('You do not have sufficient balance.'));
            return redirect()->back();
        }

        $data['user_id'] = auth()->user()->id;
        $data['amount']  = $request->amount;
        Payout::insert($data);

        Session::flash('success', get_phrase('Your request has been submitted.'));
        return redirect()->back();
    }

    public function delete($id)
    {
        if (Payout::where('id', $id)->where('user_id', auth()->user()->id)->doesntExist()) {
            Session::flash('error', get_phrase('Data not found.'));
            return redirect()->back();
        }
        Payout::where('id', $id)->delete();
        Session::flash('success', get_phrase('Your request has been deleted.'));
        return redirect()->back();
    }
}
