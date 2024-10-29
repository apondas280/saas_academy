@extends('layouts.admin')

@push('title', get_phrase('Create Admin'))

@push('meta')
@endpush

@push('css')
@endpush


@section('content')
    <div class="row">
        <div class="col-12">
            <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap flex-md-nowrap">
                <h4 class="section-title">
                    {{ get_phrase('Create Admin') }}
                </h4>

                <a href="{{ route('admin.admins.index') }}" class="btn ol-btn-outline-secondary d-flex align-items-center cg-10px">
                    <span class="fi-rr-arrow-alt-left"></span>
                    <span>{{ get_phrase('Back') }}</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Start Admin area -->
    <div class="ol-card p-3">
        <div class="ol-card-body create-user-form">
            <form action="{{ route('admin.admins.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="">
                    <div class="ol-sidebar-tab">
                        <div class="nav nav-pills" id="myv-pills-tab" role="tablist" aria-orientation="vertical">
                            <button class="nav-link text-start active" id="v-pills-tab1-tab" data-bs-toggle="pill" data-bs-target="#v-pills-tab1" type="button" role="tab" aria-controls="v-pills-tab1" aria-selected="true">
                                <span>
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M11.7902 2.32592C10.7587 1.44686 9.24151 1.44686 8.20998 2.32592L7.86365 2.62106C7.42162 2.99776 6.87202 3.22541 6.2931 3.27161L5.8395 3.3078C4.48852 3.41561 3.41573 4.4884 3.30792 5.83938L3.27173 6.29297C3.22553 6.8719 2.99788 7.4215 2.62118 7.86353L2.32604 8.20986C1.44698 9.24138 1.44698 10.7585 2.32604 11.7901L2.62118 12.1364C2.99788 12.5784 3.22553 13.128 3.27173 13.7069L3.30792 14.1605C3.36183 14.836 3.65698 15.442 4.10752 15.8925L15.8926 4.1074C15.4421 3.65685 14.8362 3.36171 14.1607 3.3078L13.7071 3.27161C13.1281 3.22541 12.5785 2.99776 12.1365 2.62106L11.7902 2.32592Z" />
                                        <path opacity="0.5"
                                            d="M16.7281 6.29287L16.6919 5.83928C16.638 5.16379 16.3428 4.55785 15.8923 4.1073L4.10718 15.8924C4.55772 16.343 5.16367 16.6381 5.83916 16.692L6.29275 16.7282C6.87168 16.7744 7.42127 17.0021 7.8633 17.3788L8.20964 17.6739C9.24116 18.553 10.7583 18.553 11.7898 17.6739L12.1362 17.3788C12.5782 17.0021 13.1278 16.7744 13.7067 16.7282L14.1603 16.692C15.5113 16.5842 16.5841 15.5114 16.6919 14.1604L16.7281 13.7068C16.7743 13.1279 17.0019 12.5783 17.3786 12.1363L17.6738 11.79C18.5528 10.7584 18.5528 9.24128 17.6738 8.20976L17.3786 7.86343C17.0019 7.4214 16.7743 6.8718 16.7281 6.29287Z" />
                                    </svg>
                                </span>
                                <span>{{ get_phrase('Basic') }}</span>
                            </button>


                            <button class="nav-link text-start" id="v-pills-tab2-tab" data-bs-toggle="pill" data-bs-target="#v-pills-tab2" type="button" role="tab" aria-controls="v-pills-tab2" aria-selected="false">
                                <span>
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M16.6359 5.77446L14.2256 3.36412C13.523 2.66162 12.5124 2.36026 11.5323 2.56105C10.6908 2.73344 10.0016 3.34257 9.72641 4.15722L9.47575 4.89917C9.17377 5.79306 9.40106 6.77577 10.0629 7.43757L12.5624 9.93714C13.2242 10.5989 14.2069 10.8262 15.1008 10.5243L15.8427 10.2736C16.6574 9.99841 17.2666 9.30922 17.439 8.46768C17.6397 7.48759 17.3384 6.47694 16.6359 5.77446ZM13.9638 5.45363C13.6384 5.12819 13.1108 5.1282 12.7853 5.45363C12.4599 5.77907 12.4599 6.30671 12.7853 6.63214L13.3677 7.21454C13.6932 7.53998 14.2208 7.53997 14.5462 7.21454C14.8717 6.8891 14.8717 6.36146 14.5462 6.03603L13.9638 5.45363Z" />
                                        <path opacity="0.5"
                                            d="M6.61916 11.0515L8.67487 8.99582C8.83758 8.8331 9.1014 8.8331 9.26412 8.99582L11.0045 10.7361C11.1672 10.8989 11.1672 11.1627 11.0045 11.3254L5.41888 16.911C5.09344 17.2364 4.56581 17.2364 4.24037 16.911L3.08929 15.7599C2.76386 15.4345 2.76386 14.9068 3.08929 14.5814L3.67576 13.9949L4.25803 14.5772C4.58347 14.9026 5.11111 14.9026 5.43655 14.5772C5.76198 14.2517 5.76198 13.7241 5.43654 13.3987L4.85427 12.8164L5.44065 12.23L6.31412 13.1035C6.63956 13.4289 7.1672 13.4289 7.49263 13.1035C7.81807 12.7781 7.81807 12.2504 7.49263 11.925L6.61916 11.0515Z" />
                                    </svg>
                                </span>
                                <span>{{ get_phrase('Login Credentials') }}</span>
                            </button>

                            <button class="nav-link text-start" id="v-pills-tab3-tab" data-bs-toggle="pill" data-bs-target="#v-pills-tab3" type="button" role="tab" aria-controls="v-pills-tab3" aria-selected="false">
                                <span>
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd"
                                            d="M2.5 14.1666C2.5 15.0871 3.24619 15.8333 4.16667 15.8333H15.8333C16.7538 15.8333 17.5 15.0871 17.5 14.1666V9.58329C17.5 9.35317 17.3135 9.16663 17.0833 9.16663H2.91667C2.68655 9.16663 2.5 9.35317 2.5 9.58329V14.1666ZM13.3333 12.5C13.3333 13.4204 12.5871 14.1666 11.6667 14.1666C10.7462 14.1666 10 13.4204 10 12.5C10 11.5795 10.7462 10.8333 11.6667 10.8333C12.5871 10.8333 13.3333 11.5795 13.3333 12.5ZM13.6829 13.9783C13.6489 14.0247 13.6679 14.0918 13.7234 14.107C13.8645 14.1459 14.0132 14.1666 14.1667 14.1666C15.0871 14.1666 15.8333 13.4204 15.8333 12.5C15.8333 11.5795 15.0871 10.8333 14.1667 10.8333C14.0132 10.8333 13.8645 10.854 13.7234 10.8929C13.6679 10.9082 13.6489 10.9752 13.6829 11.0216C13.987 11.4357 14.1667 11.9468 14.1667 12.5C14.1667 13.0531 13.987 13.5643 13.6829 13.9783Z" />
                                        <path d="M2.5 7.08329C2.5 7.31341 2.68655 7.49996 2.91667 7.49996H17.0833C17.3135 7.49996 17.5 7.31341 17.5 7.08329V5.83329C17.5 4.91282 16.7538 4.16663 15.8333 4.16663H4.16667C3.24619 4.16663 2.5 4.91282 2.5 5.83329V7.08329Z" />
                                    </svg>
                                </span>

                                <span>{{ get_phrase('Payment Information') }}</span>
                            </button>

                            <button class="nav-link text-start" id="v-pills-tab4-tab" data-bs-toggle="pill" data-bs-target="#v-pills-tab4" type="button" role="tab" aria-controls="v-pills-tab4" aria-selected="false">
                                <span>
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M10.5546 8.2669C10.2291 8.59234 10.2291 9.11998 10.5546 9.44542C11.4926 10.3834 11.4926 11.9042 10.5546 12.8422L8.26692 15.1298C7.32893 16.0678 5.80815 16.0678 4.87016 15.1298C3.93217 14.1918 3.93217 12.671 4.87016 11.7331L5.44207 11.1611C5.76751 10.8357 5.76751 10.3081 5.44207 9.98263C5.11663 9.6572 4.589 9.6572 4.26356 9.98263L3.69165 10.5545C2.10278 12.1434 2.10278 14.7195 3.69165 16.3083C5.28051 17.8972 7.85657 17.8972 9.44544 16.3083L11.7331 14.0207C13.3219 12.4318 13.3219 9.85577 11.7331 8.2669C11.4076 7.94147 10.88 7.94147 10.5546 8.2669Z" />
                                        <path opacity="0.5"
                                            d="M11.733 4.87016C12.671 3.93217 14.1918 3.93217 15.1298 4.87016C16.0677 5.80815 16.0677 7.32893 15.1298 8.26692L14.5578 8.83884C14.2324 9.16427 14.2324 9.69191 14.5578 10.0173C14.8833 10.3428 15.4109 10.3428 15.7364 10.0173L16.3083 9.44544C17.8971 7.85657 17.8971 5.28051 16.3083 3.69165C14.7194 2.10278 12.1433 2.10278 10.5545 3.69165L8.26684 5.97929C6.67798 7.56815 6.67798 10.1442 8.26684 11.7331C8.59228 12.0585 9.11992 12.0585 9.44535 11.7331C9.77079 11.4076 9.77079 10.88 9.44535 10.5546C8.50736 9.61657 8.50736 8.09579 9.44535 7.1578L11.733 4.87016Z" />
                                    </svg>

                                </span>
                                <span>{{ get_phrase('Social Links') }}</span>
                            </button>
                        </div>
                    </div>
                    <div class="tab-content w-100" id="myv-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-tab1" role="tabpanel" aria-labelledby="v-pills-tab1-tab" tabindex="0">
                            @include('admin.admin.create_admin_basic')
                        </div>
                        <div class="tab-pane fade" id="v-pills-tab2" role="tabpanel" aria-labelledby="v-pills-tab2-tab" tabindex="0">
                            @include('admin.admin.create_login')
                        </div>
                        <div class="tab-pane fade" id="v-pills-tab3" role="tabpanel" aria-labelledby="v-pills-tab3-tab" tabindex="0">
                            @include('admin.admin.create_payment')
                        </div>
                        <div class="tab-pane fade" id="v-pills-tab4" role="tabpanel" aria-labelledby="v-pills-tab4-tab" tabindex="0">
                            @include('admin.admin.create_social')
                        </div>

                        <button type="submit" class="btn ol-btn-primary mt-3">
                            <span>{{ get_phrase('Create Admin') }}</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- End Admin area -->
@endsection
