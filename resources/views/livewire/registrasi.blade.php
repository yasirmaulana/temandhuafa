<div class="container">
    <style>
        .chevron-back {
            filter: invert(1);
        }
    </style>
    
    <div class="appHeader bg-primary text-light container">
        <div class="left">
            <a href="/loginapp" wire:navigate class="headerButton goBack">
                <img src="{{ asset('assets/img/chevron-back.svg') }}" alt="Search Icon" class="chevron-back" height="24">
            </a>
        </div>
        <div class="pageTitle"></div>
        <div class="right">

        </div>
    </div>

    <div id="appCapsule">

        <div class="login-form">
            <div class="section mt-3 mb-3">
                <h2 class="mb-3">Formulir Donatur</h2>
                <h4>Silahkan lengkapi formulir berikut:</h4>
            </div>
        </div>

        <!-- Registrasi form personal -->
        <div class="section wide-block mt-1 mb-3">

            <form class="needs-validation" novalidate method="post" wire:submit.prevent="auth_register"
                enctype="multipart/form-data">
                @csrf
                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label mb-2" for="avatar">Upload Foto (Max size 2M)</label>
                        <div class="col-sm-12">
                            <input type="file" class="form-control" @error('avatar') is-invalid @enderror
                                wire:model="avatar">
                        </div>
                        @error('avatar')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="nama">Nama</label>
                        <input type="text" class="form-control" @error('name') is-invalid @enderror
                            wire:model="name">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="kontak-wa">Kontak WA</label>
                        <input type="text" class="form-control" @error('handphone') is-invalid @enderror
                            wire:model="handphone">
                        @error('handphone')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="email">Email</label>
                        <input type="email" class="form-control" @error('email') is-invalid @enderror
                            wire:model="email">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="email">Password</label>
                        <input type="password" class="form-control" @error('password') is-invalid @enderror
                            wire:model="password">
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="email">Ulangi Password</label>
                        <input type="password" class="form-control" @error('password_confirmation') is-invalid @enderror
                            wire:model="password_confirmation">
                        @error('password_confirmation')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group  mt-2 mb-3">
                    <div class="custom-control custom-checkbox mb-1">
                        <input type="checkbox" class="custom-control-input" id="terms" wire:model="terms">
                        <label class="custom-control-label" for="terms">Saya setuju dengan
                            <a href="javascript:;">Syarat & Ketentuan</a>
                        </label>
                    </div>
                    @error('terms')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="appBottomMenu container">
                    <button type="submit" class="btn btn-success btn-block btn-lg">Registrasi Donatur</button>
                </div>

            </form>

        </div>

    </div>

</div>
