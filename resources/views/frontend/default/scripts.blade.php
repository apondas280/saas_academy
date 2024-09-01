<script>
    "use strict";

    function toggleWishlist(course_id, elem) {

        $.ajax({
            type: "get",
            url: "{{ route('toggleWishItem') }}" + '/' + course_id,
            success: function(response) {
                if (response) {
                    if (response.toggleStatus == 'added') {
                        $(elem).addClass('inList');
                        $(elem).find('.wish-icon').addClass('active');

                        $(elem).attr('data-bs-title', '{{ get_phrase('Remove from wishlist') }}')
                            .tooltip('dispose')
                            .tooltip('show');

                        success('{{ get_phrase('This course added to your wishlist') }}');

                    } else if (response.toggleStatus == 'removed') {
                        $(elem).removeClass('inList');
                        $(elem).find('.wish-icon').removeClass('active');

                        $(elem).attr('data-bs-title', '{{ get_phrase('Add to wishlist') }}')
                            .tooltip('dispose')
                            .tooltip('show');

                        success('{{ get_phrase('This course removed from your wishlist') }}');
                    }
                }
            }
        });
    }

    $(document).ready(function() {
        //When need to add a wishlist button inside a anchor tag
        $('.checkPropagation').on('click', function(event) {
            var action = $(this).attr('action');
            var onclickFunction = $(this).attr('onclick');
            var onChange = $(this).attr('onchange');
            var tag = $(this).prop("tagName").toLowerCase();
            console.log(tag);
            if (tag != 'a' && action) {
                $(location).attr('href', $(this).attr('action'));
                return false;
            } else if (onclickFunction) {
                if (onclickFunction) {
                    onclickFunction;
                }
                return false;
            } else if (tag == 'a') {
                return true;
            }
        });


        // change course layout grid and list in course page
        $('.layout').on('click', function(e) {
            e.preventDefault();
            let layout = $(this).data('layout');

            $.ajax({
                type: "get",
                url: "{{ route('change.layout') }}",
                data: {
                    view: layout
                },
                success: function(response) {
                    if (response.reload) {
                        window.location.reload(1);
                    }
                }
            });
        });
    });

    $(function() {
        if ($('.tagify:not(.inited)').length) {
            var tagify = new Tagify(document.querySelector('.tagify:not(.inited)'), {
                placeholder: '{{ get_phrase('Enter your keywords') }}'
            })
            $('.tagify:not(.inited)').addClass('inited');
        }
        $('[data-bs-toggle="tooltip"]').tooltip();
    });
</script>
