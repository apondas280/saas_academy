@extends('layouts.admin')

@push('title', get_phrase('Categories'))

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap flex-md-nowrap">
                <h4 class="section-title">{{ get_phrase('All Category') }}</h4>

                <a onclick="ajaxModal('{{ route('admin.category.create') }}', '{{ get_phrase('Add new category') }}')" href="#" class="btn ol-btn-outline-secondary d-flex align-items-center cg-10px">
                    <span class="fi-rr-plus"></span>
                    <span>{{ get_phrase('Add new category') }}</span>
                </a>
            </div>
        </div>
    </div>


    <div class="row g-4 all-category-list mb-4">
        @foreach ($categories as $category)
            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 col-xxl-3">
                <div class="category-card">
                    <div class="category-head">
                        <div class="thumbnail">
                            <img src="{{ get_image($category->thumbnail) }}" alt="">
                        </div>

                        <div class="category-info">
                            <span class="title d-block">{{ $category->title }}</span>
                            <span class="count-subcategory">{{ $category->childs->count() }} {{ get_phrase('Sub Category') }}</span>
                        </div>
                    </div>

                    <div class="category-body">
                        <ul class="sub-categories">
                            @foreach ($category->childs as $child_category)
                                <li>
                                    <span class="title">{{ $child_category->title }}</span>
                                    <div class="action">
                                        <a href="javascript:void(0)" onclick="ajaxModal('{{ route('modal', ['admin.category.edit', 'id' => $child_category->id]) }}', '{{ get_phrase('Edit category') }}')">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M5.83333 2.5C3.99238 2.5 2.5 3.99238 2.5 5.83333V14.1667C2.5 16.0076 3.99238 17.5 5.83333 17.5H14.1666C16.0076 17.5 17.5 16.0076 17.5 14.1667L17.5 10.8333C17.5 10.3731 17.1269 10 16.6666 10C16.2064 10 15.8333 10.3731 15.8333 10.8333L15.8333 14.1667C15.8333 15.0871 15.0871 15.8333 14.1666 15.8333H5.83333C4.91285 15.8333 4.16666 15.0871 4.16666 14.1667V5.83333C4.16666 4.91286 4.91285 4.16667 5.83333 4.16667H9.16665C9.62689 4.16667 9.99998 3.79357 9.99998 3.33333C9.99998 2.8731 9.62689 2.5 9.16665 2.5H5.83333Z" />
                                                <path d="M13.3794 3.34877C13.2967 3.26605 13.2979 3.13061 13.389 3.05722C14.3815 2.25756 15.838 2.31859 16.7597 3.2403C17.6814 4.16202 17.7424 5.61849 16.9427 6.61102C16.8694 6.70211 16.7339 6.70332 16.6512 6.6206L13.3794 3.34877Z" />
                                                <g opacity="0.5">
                                                    <path
                                                        d="M10.5866 12.3985C10.7493 12.5612 11.0132 12.5612 11.1759 12.3985L15.3293 8.24507C15.492 8.08235 15.492 7.81853 15.3293 7.65581L12.3441 4.67058C12.1814 4.50786 11.9176 4.50786 11.7548 4.67058L7.6014 8.82402C7.43869 8.98674 7.43869 9.25056 7.6014 9.41328L10.5866 12.3985Z" />
                                                    <path d="M6.60405 10.7729C6.48423 10.6531 6.2791 10.7189 6.25124 10.886L5.84325 13.334C5.7626 13.8178 6.18209 14.2373 6.66594 14.1567L9.1139 13.7487C9.28105 13.7208 9.34679 13.5157 9.22696 13.3959L6.60405 10.7729Z" />
                                                </g>
                                            </svg>
                                        </a>

                                        <a href="javascript:void(0)" onclick="confirmModal('{{ route('admin.category.delete', $child_category->id) }}')">
                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M7.49999 3.29997V2.99997C7.49999 2.17154 8.17157 1.49997 8.99999 1.49997C9.82842 1.49997 10.5 2.17154 10.5 2.99997V3.29997C10.5 3.5485 10.2985 3.74997 10.05 3.74997H7.94999C7.70147 3.74997 7.49999 3.5485 7.49999 3.29997Z" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M5.31524 7.49997H12.685C13.1238 7.49997 13.4689 7.87499 13.4324 8.31225L12.9221 14.4368C12.8249 15.603 11.85 16.5 10.6798 16.5H7.32043C6.15023 16.5 5.17539 15.603 5.07821 14.4368L4.56783 8.31225C4.53139 7.87499 4.87646 7.49997 5.31524 7.49997ZM8.25013 10.5C8.25013 10.0858 7.91434 9.74997 7.50013 9.74997C7.08592 9.74997 6.75013 10.0858 6.75013 10.5V13.5C6.75013 13.9142 7.08592 14.25 7.50013 14.25C7.91434 14.25 8.25013 13.9142 8.25013 13.5V10.5ZM11.2501 10.5C11.2501 10.0858 10.9143 9.74997 10.5001 9.74997C10.0859 9.74997 9.75013 10.0858 9.75013 10.5V13.5C9.75013 13.9142 10.0859 14.25 10.5001 14.25C10.9143 14.25 11.2501 13.9142 11.2501 13.5V10.5Z" />
                                                <path opacity="0.5" d="M14.25 6.375C14.25 6.58211 14.0821 6.75 13.875 6.75H4.125C3.91789 6.75 3.75 6.58211 3.75 6.375V6C3.75 5.17157 4.42157 4.5 5.25 4.5H12.75C13.5784 4.5 14.25 5.17157 14.25 6V6.375Z" />
                                            </svg>
                                        </a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="category-footer">
                        <div class="action">
                            <a href="javascript:void(0)" onclick="ajaxModal('{{ route('modal', ['admin.category.create', 'parent_id' => $category->id]) }}', '{{ get_phrase('Add new category') }}')">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M10 5C10.4602 5 10.8333 5.3731 10.8333 5.83333V9.16667H14.1667C14.6269 9.16667 15 9.53976 15 10C15 10.4602 14.6269 10.8333 14.1667 10.8333H10.8333V14.1667C10.8333 14.6269 10.4602 15 10 15C9.53976 15 9.16667 14.6269 9.16667 14.1667V10.8333H5.83333C5.3731 10.8333 5 10.4602 5 10C5 9.53976 5.3731 9.16667 5.83333 9.16667H9.16667V5.83333C9.16667 5.3731 9.53976 5 10 5Z" />
                                </svg>
                                <span>{{ get_phrase('Add') }}</span>
                            </a>

                            <a href="javascript:void(0)" onclick="ajaxModal('{{ route('modal', ['admin.category.edit', 'id' => $category->id]) }}', '{{ get_phrase('Edit category') }}')">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M5.83333 2.5C3.99238 2.5 2.5 3.99238 2.5 5.83333V14.1667C2.5 16.0076 3.99238 17.5 5.83333 17.5H14.1666C16.0076 17.5 17.5 16.0076 17.5 14.1667L17.5 10.8333C17.5 10.3731 17.1269 10 16.6666 10C16.2064 10 15.8333 10.3731 15.8333 10.8333L15.8333 14.1667C15.8333 15.0871 15.0871 15.8333 14.1666 15.8333H5.83333C4.91285 15.8333 4.16666 15.0871 4.16666 14.1667V5.83333C4.16666 4.91286 4.91285 4.16667 5.83333 4.16667H9.16665C9.62689 4.16667 9.99998 3.79357 9.99998 3.33333C9.99998 2.8731 9.62689 2.5 9.16665 2.5H5.83333Z" />
                                    <path d="M13.3794 3.34877C13.2967 3.26605 13.2979 3.13061 13.389 3.05722C14.3815 2.25756 15.838 2.31859 16.7597 3.2403C17.6814 4.16202 17.7424 5.61849 16.9427 6.61102C16.8694 6.70211 16.7339 6.70332 16.6512 6.6206L13.3794 3.34877Z" />
                                    <g opacity="0.5">
                                        <path
                                            d="M10.5866 12.3985C10.7493 12.5612 11.0132 12.5612 11.1759 12.3985L15.3293 8.24507C15.492 8.08235 15.492 7.81853 15.3293 7.65581L12.3441 4.67058C12.1814 4.50786 11.9176 4.50786 11.7548 4.67058L7.6014 8.82402C7.43869 8.98674 7.43869 9.25056 7.6014 9.41328L10.5866 12.3985Z" />
                                        <path d="M6.60405 10.7729C6.48423 10.6531 6.2791 10.7189 6.25124 10.886L5.84325 13.334C5.7626 13.8178 6.18209 14.2373 6.66594 14.1567L9.1139 13.7487C9.28105 13.7208 9.34679 13.5157 9.22696 13.3959L6.60405 10.7729Z" />
                                    </g>
                                </svg>
                                <span>{{ get_phrase('Edit') }}</span>
                            </a>

                            <a href="javascript:void(0)" onclick="confirmModal('{{ route('admin.category.delete', $category->id) }}')">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7.49999 3.29997V2.99997C7.49999 2.17154 8.17157 1.49997 8.99999 1.49997C9.82842 1.49997 10.5 2.17154 10.5 2.99997V3.29997C10.5 3.5485 10.2985 3.74997 10.05 3.74997H7.94999C7.70147 3.74997 7.49999 3.5485 7.49999 3.29997Z" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M5.31524 7.49997H12.685C13.1238 7.49997 13.4689 7.87499 13.4324 8.31225L12.9221 14.4368C12.8249 15.603 11.85 16.5 10.6798 16.5H7.32043C6.15023 16.5 5.17539 15.603 5.07821 14.4368L4.56783 8.31225C4.53139 7.87499 4.87646 7.49997 5.31524 7.49997ZM8.25013 10.5C8.25013 10.0858 7.91434 9.74997 7.50013 9.74997C7.08592 9.74997 6.75013 10.0858 6.75013 10.5V13.5C6.75013 13.9142 7.08592 14.25 7.50013 14.25C7.91434 14.25 8.25013 13.9142 8.25013 13.5V10.5ZM11.2501 10.5C11.2501 10.0858 10.9143 9.74997 10.5001 9.74997C10.0859 9.74997 9.75013 10.0858 9.75013 10.5V13.5C9.75013 13.9142 10.0859 14.25 10.5001 14.25C10.9143 14.25 11.2501 13.9142 11.2501 13.5V10.5Z" />
                                    <path opacity="0.5" d="M14.25 6.375C14.25 6.58211 14.0821 6.75 13.875 6.75H4.125C3.91789 6.75 3.75 6.58211 3.75 6.375V6C3.75 5.17157 4.42157 4.5 5.25 4.5H12.75C13.5784 4.5 14.25 5.17157 14.25 6V6.375Z" />
                                </svg>
                                <span>{{ get_phrase('Delete') }}</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
