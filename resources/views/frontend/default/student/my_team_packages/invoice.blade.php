<div class="tab-pane fade" id="invoice" role="tabpanel" aria-labelledby="invoice-tab" tabindex="0">
    <div class="table-responsive mt-4">
        <table class="eTable table">
            <thead>
                <th scope="col">{{ get_phrase('Package') }}</th>
                <th scope="col">{{ get_phrase('Price') }}</th>
                <th scope="col">{{ get_phrase('Date') }}</th>
                <th scope="col">{{ get_phrase('Method') }}</th>
                <th scope="col">{{ get_phrase('Invoice') }}</th>
            </thead>
            <tbody>
                @foreach ($purchased_packages as $key => $purchased_package)
                    <tr>
                        <td class="pop-subtitle-13px3"> {{ $purchased_package->title }} </td>
                        <td class="pop-subtitle-13px3"> {{ currency(number_format($purchased_package->price, 2)) }} </td>
                        <td class="pop-subtitle-13px3"> {{ date('d-M-Y', strtotime($purchased_package->created_at)) }} </td>
                        <td class="pop-subtitle-13px3 text-capitalize"> {{ $purchased_package->payment_method }} </td>
                        <td>
                            <a href="{{ route('team.package.invoice', $purchased_package->id) }}" class="btn btn-primary d-flex align-items-center justify-content-center">
                                <svg xmlns="http://www.w3.org/2000/svg" id="Outline" viewBox="0 0 24 24" width="20" height="20">
                                    <path fill="#fff"
                                        d="M19,6V4a4,4,0,0,0-4-4H9A4,4,0,0,0,5,4V6a5.006,5.006,0,0,0-5,5v5a5.006,5.006,0,0,0,5,5,3,3,0,0,0,3,3h8a3,3,0,0,0,3-3,5.006,5.006,0,0,0,5-5V11A5.006,5.006,0,0,0,19,6ZM7,4A2,2,0,0,1,9,2h6a2,2,0,0,1,2,2V6H7ZM17,21a1,1,0,0,1-1,1H8a1,1,0,0,1-1-1V17a1,1,0,0,1,1-1h8a1,1,0,0,1,1,1Zm5-5a3,3,0,0,1-3,3V17a3,3,0,0,0-3-3H8a3,3,0,0,0-3,3v2a3,3,0,0,1-3-3V11A3,3,0,0,1,5,8H19a3,3,0,0,1,3,3Z" />
                                    <path fill="#fff" d="M18,10H16a1,1,0,0,0,0,2h2a1,1,0,0,0,0-2Z" />
                                </svg>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
