<div>
    <style>
        .log-out-outline {
            filter: invert(1);
        }
    </style>

    <div class="container">

        <div class="appHeader bg-primary text-light container">
            <div class="left">
                <a href="/akun/dashboard-donatur" wire:navigate class="headerButton goBack">
                    <img src="{{ asset('assets/img/logo.png') }}" height="30"></img>
                </a>
            </div>
            <div class="pageTitle"></div>
            <div class="right">
                <a href="/logout" wire:navigate class="headerButton goBack">
                    <img src="{{ asset('assets/img/log-out-outline.svg') }}" alt="Log out Icon" class="log-out-outline"
                        height="24">
                </a>
            </div>
        </div>

        @include('_message')

        <!-- App Capsule -->
        <div id="appCapsule">

            <ul class="listview no-line">
                <li>
                    <div class="col-3">
                        <img src="{{ $user->avatar }}" alt="image" class="imaged w64 rounded mr-05">
                    </div>
                    <div class="col-6">
                        <h4 class="name mt-1 mb-0 text-primary">{{ $user->name }}</h4>
                        <h6 class="subtext mb-0">Sejak {{ $user->created_at->translatedFormat('d F Y') }}</h6>
                        <h6 class="subtext mb-0">{{ $user->email }}</h6>
                        <h6 class="subtext mb-0">{{ $user->handphone }}</h6>
                        <div class="mt-1">
                            @if(!$isEditing)
                            <button class="btn btn-outline-primary btn-sm" wire:click="editProfile">Edit Profile</button>
                            @endif
                        </div>
                    </div>
                    <div class="col-3">
                        {{-- {{ $fundraiser_status }} --}}
                        @if ($fundraiser_status == 'not register')
                            <a href="/akun/dashboard-fundraiser" wire:navigate class="text-primary"><button
                                    type="botton" class="btn btn-sm btn-outline-primary">Daftar Fundriser</botton></a>
                        @elseif ($fundraiser_status == 'register')
                            <span class="badge badge-warning">Menunggu Persetujuan</span>
                        @elseif ($fundraiser_status == 'Active')
                            <a href="/akun/dashboard-fundraiser-main" wire:navigate class="text-primary"><button
                                    type="botton" class="btn btn-sm btn-outline-primary">Dashboard Fundraiser</botton></a>
                        @endif
                    </div>
                </li>
            </ul>

            @if ($isEditing)
            <div class="section mt-2 mb-2">
                <div class="section-title">Edit Profil</div>
                <div class="card">
                    <div class="card-body">
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="photo">Foto Profil</label>
                                <input type="file" class="form-control" id="photo" wire:model="photo" accept="image/*">
                                @if ($photo)
                                    <div class="mt-2">
                                        <img src="{{ $photo->temporaryUrl() }}" alt="Preview" class="imaged w64 rounded">
                                    </div>
                                @endif
                                @error('photo') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="name">Nama Lengkap</label>
                                <input type="text" class="form-control" id="name" wire:model="name">
                                @error('name') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="email">Email</label>
                                <input type="email" class="form-control" id="email" wire:model="email">
                                @error('email') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="phone">No HP</label>
                                <input type="text" class="form-control" id="phone" wire:model="phone">
                                @error('phone') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="password">Password Baru (Opsional)</label>
                                <input type="password" class="form-control" id="password" wire:model="password" placeholder="Kosongkan jika tidak ingin mengubah">
                                @error('password') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="password_confirmation">Konfirmasi Password</label>
                                <input type="password" class="form-control" id="password_confirmation" wire:model="password_confirmation">
                            </div>
                        </div>

                        <div class="mt-2">
                            <button class="btn btn-primary btn-block" wire:click="updateProfile">Simpan Perubahan</button>
                            <button class="btn btn-outline-secondary btn-block" wire:click="cancelEdit">Batal</button>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <div class="section inset pt-2 pb-2 mb-1">
                <button type="button" class="btn btn-success btn-lg btn-block">Total Donasi Rp {{ number_format($total_donasi->total_amount ?? 0, 0, ',', '.') }}</button>

                <!-- Table riwayat donasi -->
                <div class="section full mt-1 mb-2">
                    <div class="section-title">Riwayat Donasi</div>
                    <div class="content-header mb-05"></div>
                    <div class="wide-block p-0">

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Tgl</th>
                                        <th scope="col">Program</th>
                                        <th scope="col">Nominal</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">PDF</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transactions as $transaksi)
                                        <tr>
                                            <td>{{ \Carbon\Carbon::parse($transaksi->transaction_time)->translatedFormat('d F Y') }}</td>
                                            <td>{{ $transaksi->program_name }}</td>
                                            <td>{{ number_format($transaksi->amount, 0, ',', '.')  }}</td>
                                            <td class="{{ $transaksi->transaction_status == 'settlement' ? 'text-success' : ($transaksi->transaction_status == 'pending' ? 'text-danger' : 'text-warning') }}">
                                                {{ $transaksi->transaction_status }}
                                            </td>
                                            <td><a href="{{ url('donation/receipt/'.$transaksi->order_id) }}" target="_blank" rel="noopener noreferrer">Lihat</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>

                    <!-- load more post -->
                    <div class="section inset pt-2 pb-2">
                        <a href="#" class="btn-block" id="loadMore">
                            <button type="button"
                                class="btn btn-outline-primary mr-1 mb-1 btn-sm btn-block rounded">Lihat
                                Lagi</button>
                        </a>
                        </a>
                    </div>
                    <!-- * riwayat donasi -->
                </div>

                <!-- * App Capsule -->

            </div>



            @livewire('nav-bar')

        </div>
    </div>
</div>