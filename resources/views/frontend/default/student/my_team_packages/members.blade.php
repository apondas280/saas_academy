<div class="tab-pane fade show active" id="members" role="tabpanel" aria-labelledby="members-tab" tabindex="0">
    <div class="row">
        <div class="col-md-6 offset-md-6">
            <div class="search-members">
                <form method="get">
                    <input type="text" name="search" class="form-control team-search" placeholder="{{ get_phrase('Search team members') }}" autocomplete="off">
                </form>

                <div class="search-result">
                    <p class="response-msg px-4 py-2">{{ get_phrase('Enter member\'s email ...') }}</p>
                    <div class="search-placeholder"></div>
                </div>
            </div>
        </div>
    </div>



    @if (count($members) > 0)
        <div class="table-responsive mt-4">
            <table class="eTable table">
                <thead>
                    <th>{{ get_phrase('Member') }}</th>
                    <th class="text-center">{{ get_phrase('Joined') }}</th>
                    <th class="text-center">{{ get_phrase('Progress') }}</th>
                    <th class="text-center">{{ get_phrase('Options') }}</th>
                </thead>
                <tbody>
                    @foreach ($members as $member)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="member-photo">
                                        <img class="rounded-circle" width="45px" src="{{ get_image($member->photo) }}" alt="">
                                    </div>
                                    <div class="d-flex flex-column">
                                        <span class="pop-subtitle-13px3">{{ $member->name }}</span>
                                        <small class="pop-subtitle-13px3">{{ $member->email }}</small>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">
                                <p class="pop-subtitle-13px3">{{ date('d-M-Y', strtotime($member->created_at)) }}</p>
                            </td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: {{ progress_bar($member->course_id, $member->member_id) }}%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="text-center pop-subtitle-13px3">
                                    {{ progress_bar($member->course_id, $member->member_id) }}%
                                </p>
                            </td>
                            <td class="text-center">
                                <a href="javascript:void(0)" onclick="confirmModal('{{ route('my.team.packages.members.action', ['remove', 'package_id' => $package->id, 'user_id' => $member->member_id]) }}')" class="lms2-btn-primary p-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" id="Outline" viewBox="0 0 24 24" width="20" height="20">
                                        <path fill="#fff"
                                            d="M21,4H17.9A5.009,5.009,0,0,0,13,0H11A5.009,5.009,0,0,0,6.1,4H3A1,1,0,0,0,3,6H4V19a5.006,5.006,0,0,0,5,5h6a5.006,5.006,0,0,0,5-5V6h1a1,1,0,0,0,0-2ZM11,2h2a3.006,3.006,0,0,1,2.829,2H8.171A3.006,3.006,0,0,1,11,2Zm7,17a3,3,0,0,1-3,3H9a3,3,0,0,1-3-3V6H18Z" />
                                        <path fill="#fff" d="M10,18a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,10,18Z" />
                                        <path fill="#fff" d="M14,18a1,1,0,0,0,1-1V11a1,1,0,0,0-2,0v6A1,1,0,0,0,14,18Z" />
                                    </svg>

                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        @include('frontend.default.empty')
    @endif
</div>


@push('js')
    <script>
        $(document).ready(function() {
            const searchInput = $('input[name="search"]');
            const searchResult = $('.search-placeholder');
            const responseMsg = $('.response-msg');

            // Show search results when clicking on the search input
            searchInput.click(function(e) {
                e.stopPropagation();
                searchResult.parent().addClass('active');
            });

            // Perform AJAX search when typing in the search input
            searchInput.keyup(function(e) {
                let inputValue = $(this).val();

                if (inputValue.includes('@')) {
                    $.ajax({
                        type: "get",
                        url: "{{ route('search.package.members') }}/" + "{{ $package->id }}",
                        data: {
                            email: inputValue
                        },
                        success: function(response) {
                            if (response == '') {
                                searchResult.empty();
                                responseMsg.removeClass('d-none').text("{{ get_phrase('No data found!') }}");
                            } else {
                                responseMsg.addClass('d-none');
                                searchResult.empty().append(response);
                            }
                        }
                    });
                }
            });

            // Hide search results when clicking outside
            $(document).click(function() {
                searchResult.parent().removeClass('active');
            });

            // Prevent hiding search results when clicking inside the search results
            searchResult.parent().click(function(e) {
                e.stopPropagation();
            });
        });
    </script>
@endpush
