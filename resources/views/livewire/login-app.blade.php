<div class="container">

    <style>
        .chevron-back,
        .logo-google {
            filter: invert(1);
        }

        .btn-google {
            border-color: #ccc;
            background: white;
            transition: all 0.3s ease-in-out;
        }

        .btn-google:hover {
            background: #f8f9fa;
            border-color: #bbb;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
    </style>

    {{-- @livewire('header')  --}}
    <div class="appHeader bg-primary text-light container">
        <div class="left">
            <a href="/" wire:navigate class="headerButton goBack">
                <img src="{{ asset('assets/img/chevron-back.svg') }}" alt="Search Icon" class="chevron-back" height="24">
            </a>
        </div>
        <div class="pageTitle"></div>
        <div class="right">
            <a href="#" class="headerButton" data-toggle="modal" data-target="#actionSheetShare">
                {{-- <img src="{{ asset('assets/img/share-outline.svg') }}" alt="Search Icon" class="share-outline" height="24"> --}}
            </a>
        </div>
    </div>

    <div id="appCapsule">

        <div class="login-form">
            <div class="section mt-3 mb-3">
                <h2 class="mb-3">Login Donatur</h2>
                <h4>Silahkan masukkan email dan password.</h4>
            </div>
        </div>

        <div class="secton full pb-3">
            <div class="section wide-block pt-3 pb-3">
                @include('_message')
                <form class="needs-validation" method="post" wire:submit="auth_login" novalidate>
                    {{ csrf_field() }}
                    <div class="col-12">
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="email">Alamat Email</label>
                                <input type="email" class="form-control" wire:model="email" placeholder="" required>
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback">Masukkan alamat email.</div>
                            </div>
                        </div>

                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="password">Password</label>
                                <input type="password" class="form-control" wire:model="password" placeholder=""
                                    required>
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback">Password harap dilengkapi.</div>
                            </div>
                        </div>

                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-success btn-block">Login</button>
                    </div>
                </form>

                <div class="col-12 mt-3 mb-3">

                    <h4 class="text-center">Atau</h4>
                </div>

                <div class="col-12">
                    <a href="auth/google"
                        class="btn btn-block border shadow-sm rounded d-flex align-items-center justify-content-center p-2 btn-google">
                        <img src="{{ asset('assets/img/logo_google.svg') }}" class="mr-1" height="24">
                        <span class="font-weight-bold text-dark">Google</span>
                    </a>
                </div>


                <div class="col-12 mt-1 mb-3">
                    <h4 class="pt-3 mt-3">Belum punya akun? </h4>
                    <div>
                        <a href="/register" wire:navigate>Registrasi Baru</a>
                    </div>
                    {{-- <div>
                    <a href="lupa-password.html" class="text-muted">Lupa Password?</a>
                </div> --}}
                </div>


            </div>
        </div>

    </div>

</div>
