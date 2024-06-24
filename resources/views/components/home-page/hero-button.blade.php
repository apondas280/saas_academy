<div class="banner-btn">
    <a href="#" onclick="scrollToSmoothly(1950, 5)" class="eBtn gradient">{{ get_phrase('Get Started') }}</a>
    <a data-bs-toggle="modal" data-bs-target="#promoVideo" href="#" class="eBtn learn-btn"><i class="fa-solid fa-play"></i>{{ get_phrase('Learn More') }}</a>
</div>



<!-- Vertically centered modal -->
<div class="modal fade-in-effect" id="promoVideo" tabindex="-1" aria-labelledby="promoVideoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-body bg-dark">
                <link rel="stylesheet" href="{{ asset('assets/global/plyr/plyr.css') }}">

                @if (get_frontend_settings('promo_video_provider') == 'youtube')
                    <div class="plyr__video-embed" id="promoPlayer">
                        <iframe height="500" src="{{ get_frontend_settings('promo_video_link') }}?origin=https://plyr.io&amp;iv_load_policy=3&amp;modestbranding=1&amp;playsinline=1&amp;showinfo=0&amp;rel=0&amp;enablejsapi=1" allowfullscreen allowtransparency allow="autoplay"></iframe>
                    </div>
                @elseif (get_frontend_settings('promo_video_provider') == 'vimeo')
                    <div class="plyr__video-embed" id="promoPlayer">
                        <iframe height="500" id="promoPlayer" src="https://player.vimeo.com/video/{{ get_frontend_settings('promo_video_link') }}?loop=false&amp;byline=false&amp;portrait=false&amp;title=false&amp;speed=true&amp;transparent=0&amp;gesture=media" allowfullscreen allowtransparency allow="autoplay"></iframe>
                    </div>
                @else
                    <video id="promoPlayer" playsinline controls>
                        <source src="{{ get_frontend_settings('promo_video_link') }}" type="video/mp4">
                    </video>
                @endif

                <script src="{{ asset('assets/global/plyr/plyr.js') }}"></script>
                <script>
                    "use strict";
                    var promoPlayer = new Plyr('#promoPlayer');
                </script>

            </div>
        </div>
    </div>
</div>

<script>
    "use strict";
    const myModalEl = document.getElementById('promoVideo')
    myModalEl.addEventListener('hidden.bs.modal', event => {
        promoPlayer.pause();
        $('#promoVideo').toggleClass('in');
    });
    myModalEl.addEventListener('shown.bs.modal', event => {
        promoPlayer.play();
        $('#promoVideo').toggleClass('in');
    });

    function scrollToSmoothly(pos, time) {
        if (isNaN(pos)) {
            throw "Position must be a number";
        }
        if (pos < 0) {
            throw "Position can not be negative";
        }
        var currentPos = window.scrollY || window.screenTop;
        if (currentPos < pos) {
            var t = 10;
            for (let i = currentPos; i <= pos; i += 10) {
                t += 10;
                setTimeout(function() {
                    window.scrollTo(0, i);
                }, t / 2);
            }
        } else {
            time = time || 2;
            var i = currentPos;
            var x;
            x = setInterval(function() {
                window.scrollTo(0, i);
                i -= 10;
                if (i <= pos) {
                    clearInterval(x);
                }
            }, time);
        }
    }
</script>
