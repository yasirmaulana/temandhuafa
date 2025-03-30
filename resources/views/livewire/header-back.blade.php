<div>
    <script src="{{ asset('assets/js/lib/jquery-3.4.1.min.js') }}"></script> 
    <script src="{{ asset('assets/js/lib/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/base.js') }}"></script>

    <style>
        .chevron-back,
        .share-outline {
            filter: invert(1);
        }

        /* Warna Default Ikon */
        .icon-social {
            background-color: #255C34 !important;
            /* Warna hijau khas WhatsApp */
            -webkit-mask-size: contain;
            mask-size: contain;
            width: 24px;
            height: 24px;
            display: inline-block;
        }

        /* Icon Masking */
        .logo-facebook {
            -webkit-mask-image: url("{{ asset('assets/img/logo-facebook.svg') }}");
            mask-image: url("{{ asset('assets/img/logo-facebook.svg') }}");
        }

        .logo-twitter {
            -webkit-mask-image: url("{{ asset('assets/img/logo-twitter.svg') }}");
            mask-image: url("{{ asset('assets/img/logo-twitter.svg') }}");
        }

        .paper-plane {
            -webkit-mask-image: url("{{ asset('assets/img/paper-plane.svg') }}");
            mask-image: url("{{ asset('assets/img/paper-plane.svg') }}");
        }

        .logo-whatsapp {
            -webkit-mask-image: url("{{ asset('assets/img/logo-whatsapp.svg') }}");
            mask-image: url("{{ asset('assets/img/logo-whatsapp.svg') }}");
        }
    </style>

    <div class="appHeader bg-primary text-light container">
        <div class="left">
            <a href="/" wire:navigate class="headerButton goBack">
                <img src="{{ asset('assets/img/chevron-back.svg') }}" alt="chevron Icon" class="chevron-back"
                    height="24">
            </a>
        </div>
        <div class="pageTitle"></div>
        <div class="right">
            <a href="#" class="headerButton" data-toggle="modal" data-target="#actionSheetShare">
                <img src="{{ asset('assets/img/share-outline.svg') }}" alt="Search Icon" class="share-outline"
                    height="24">
            </a>
        </div>
    </div>
</div>
