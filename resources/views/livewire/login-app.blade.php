<div class="container">

    @livewire('header')

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
                    <a href="auth/google" class="btn btn-danger btn-block">
                        <ion-icon name="logo-google"></ion-icon>Google</a>
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
