@php
    $currentRoute = request()->path();
@endphp

<div>
    <style>
        .appBottomMenu .col div {
            width: 24px;
            height: 24px;
            /* background-color: black; */
            display: inline-block;
            background-size: cover;
        }

        /* Tambahkan border untuk debugging */
        /* .home-outline,
        .home,
        .layers-outline,
        .layers,
        .book-outline,
        .book,
        .person-outline,
        .person {
            width: 24px;
            height: 24px;
            background-size: contain;
            background-repeat: no-repeat;
            display: inline-block;
            border: 1px solid red;
        } */

        /* Perbaiki masking */
        .home {
            background-color: #255C34 !important;
            -webkit-mask-image: url("{{ asset('assets/img/home.svg') }}");
            mask-image: url("{{ asset('assets/img/home.svg') }}");
            -webkit-mask-size: contain;
            mask-size: contain;
        }

        .home-outline {
            background-color: black;
            -webkit-mask-image: url("{{ asset('assets/img/home-outline.svg') }}");
            mask-image: url("{{ asset('assets/img/home-outline.svg') }}");
            -webkit-mask-size: contain;
            mask-size: contain;
        }
        
        .layers {
            background-color: #255C34;
            -webkit-mask-image: url("{{ asset('assets/img/layers.svg') }}");
            mask-image: url("{{ asset('assets/img/layers.svg') }}");
            -webkit-mask-size: contain;
            mask-size: contain;
        }

        .layers-outline {
            background-color: black;
            -webkit-mask-image: url("{{ asset('assets/img/layers-outline.svg') }}");
            mask-image: url("{{ asset('assets/img/layers-outline.svg') }}");
            -webkit-mask-size: contain;
            mask-size: contain;
        }
                
        .book-outline {
            background-color: black;
            -webkit-mask-image: url("{{ asset('assets/img/book-outline.svg') }}");
            mask-image: url("{{ asset('assets/img/book-outline.svg') }}");
            -webkit-mask-size: contain;
        }
        .book {
            background-color: #255C34;
            -webkit-mask-image: url("{{ asset('assets/img/book.svg') }}");
            mask-image: url("{{ asset('assets/img/book.svg') }}");
            -webkit-mask-size: contain;
        }
        .person-outline {
            background-color: black;
            -webkit-mask-image: url("{{ asset('assets/img/person-outline.svg') }}");
            mask-image: url("{{ asset('assets/img/person-outline.svg') }}");
            -webkit-mask-size: contain;
        }
        .person {
            background-color: #255C34;
            -webkit-mask-image: url("{{ asset('assets/img/person.svg') }}");
            mask-image: url("{{ asset('assets/img/person.svg') }}");
            -webkit-mask-size: contain;
            mask-size: contain;
        }

    </style>

    <div class="appBottomMenu container">
        <a href="/" wire:navigate class="item {{ $currentRoute === '/' ? 'active' : '' }}">
            <div class="col">
                <div class="{{ $currentRoute === '/' ? 'home' : 'home-outline' }}"></div>
                <strong>BERANDA</strong>
            </div>
        </a>
        <a href="/program/all" wire:navigate
            class="item {{ Str::startsWith($currentRoute, 'program/') ? 'active' : '' }}">
            <div class="col">
                <div class="{{ Str::startsWith($currentRoute, 'program/') ? 'layers' : 'layers-outline' }}"></div>
                <strong>PROGRAM</strong>
            </div>
        </a>
        <a href="/faq" wire:navigate class="item {{ $currentRoute === 'faq' ? 'active' : '' }}">
            <div class="col">
                <div class="{{ $currentRoute === 'faq' ? 'book' : 'book-outline' }}"></div>
                <strong>FAQ</strong>
            </div>
        </a>
        <a href="/akun/dashboard-donatur" wire:navigate
            class="item {{ Str::startsWith($currentRoute, 'akun/') ? 'active' : '' }}">
            <div class="col">
                <div class="{{ Str::startsWith($currentRoute, 'akun/') ? 'person' : 'person-outline' }}"></div>
                <strong>AKUN</strong>
            </div>
        </a>
    </div>
</div>
