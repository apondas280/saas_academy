@php
    $query = App\Models\Payout::where('user_id', auth()->user()->id);
    $requested_withdrawals = $query->where('status', 0)->exists();
    $withdrawal = $query->where('status', 1)->sum('amount');

    $total_amount = App\Models\Course::join('payment_histories', 'courses.id', 'payment_histories.course_id')
        ->select('payment_histories.*', 'courses.user_id as course_user_id')
        ->where('courses.user_id', auth()->user()->id)
        ->sum('payment_histories.instructor_revenue');

    $total_balance = $total_amount - $withdrawal;

    $total_income = App\Models\Course::join('payment_histories', 'courses.id', 'payment_histories.course_id')
        ->select('payment_histories.*', 'courses.id as course_id')
        ->where('courses.user_id', auth()->user()->id)
        ->sum('payment_histories.instructor_revenue');

    $total_payout = App\Models\Payout::where('user_id', auth()->user()->id)->sum('amount');
    $balalnce = $total_income - $total_payout;

@endphp

@if ($requested_withdrawals)
    <div class="alert alert-danger" role="alert">
        <h4 class="alert-heading">{{ get_phrase('Opps!') }}!</h4>
        <p><strong>{{ get_phrase('You already requested a withdrawal') }}</strong></p>
        <p>{{ get_phrase('If you want to make another') }},
            {{ get_phrase('You have to delete the requested one first') }}</p>
    </div>
@elseif($balalnce > 0)
    <form class="required-form" action="{{ route('instructor.payout.request') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="withdrawal_amount" class="form-label ol-form-label">{{ get_phrase('Withdrawal amount') }}</label>
            <input type="number" class="form-control ol-form-control" name="amount" id="withdrawal_amount" aria-describedby="withdrawal_amount-help" min="0" max="{{ $balalnce }}" required>
            <small id="withdrawal_amount-help" class="form-text text-muted">{{ get_phrase('The amount should not be more than') . ' ' . $balalnce }}</small>
        </div>
        <button type="submit" class="btn btn-primary text-center mt-3">{{ get_phrase('Request') }}</button>
    </form>
@else
    <div class="alert alert-danger" role="alert">
        <h4 class="alert-heading">{{ get_phrase('Ops!') }}!</h4>
        <p><strong>{{ get_phrase('You got nothing to withdraw') }}</strong></p>
    </div>
@endif
