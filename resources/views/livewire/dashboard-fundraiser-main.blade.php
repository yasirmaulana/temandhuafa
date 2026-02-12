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
            <div class="pageTitle">Dashboard Fundraiser</div>
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
                        <h4 class="name mt-1 mb-0 text-primary">{{ $this->fundraiser->nama_lembaga ?? $user->name }}</h5>
                            <h6 class="subtext mb-0">Fundraiser sejak {{ $this->fundraiser ? $this->fundraiser->created_at->translatedFormat('d F Y') : $user->created_at->translatedFormat('d F Y') }}</h6>
                            <div class="mt-05">
                                @if($fundraiser && $fundraiser->register_status == 'Active')
                                    <span class="badge badge-success px-2">Approved</span>
                                @else
                                    <span class="badge badge-warning px-2">Pending</span>
                                @endif
                            </div>
                    </div>
                    <div class="col-3">
                         <a href="/akun/dashboard-donatur" wire:navigate class="text-primary"><button
                                    type="botton" class="btn btn-sm btn-outline-primary">Donatur</botton></a>
                    </div>
                </li>
            </ul>

            <div class="section inset pt-2 pb-2 mb-1">
                @if($fundraiser && $fundraiser->register_status != 'Active')
                    <div class="alert alert-warning mb-2" role="alert">
                        <h4 class="alert-title">Akun Belum Disetujui</h4>
                        Silakan tunggu admin memverifikasi akun fundraiser Anda sebelum dapat membuat campaign baru.
                    </div>
                @endif

                <div class="row">
                    <div class="col-12">
                        @if($fundraiser && $fundraiser->register_status == 'Active')
                            <button wire:click="toggleCreateForm" class="btn btn-{{ $showCreateForm ? 'secondary' : 'primary' }} btn-lg btn-block">
                                {{ $showCreateForm ? 'Batal' : 'Buat Campaign Baru' }}
                            </button>
                        @else
                            <button class="btn btn-secondary btn-lg btn-block" disabled>Buat Campaign Baru</button>
                        @endif
                    </div>
                </div>

                @if($showCreateForm)
                    <div class="section full mt-2 mb-2">
                        <div class="section-title">{{ $isEditing ? 'Edit Campaign' : 'Form Tambah Campaign' }}</div>
                        <div class="wide-block pt-2 pb-2">
                            <form wire:submit.prevent="saveCampaign">
                                <div class="form-group boxed">
                                    <div class="input-wrapper">
                                        <label class="label" for="image">Banner Campaign {{ $isEditing ? '(Opsional)' : '' }}</label>
                                        <input type="file" wire:model="image" class="form-control" id="image">
                                        @error('image') <span class="text-danger small">{{ $message }}</span> @enderror
                                        <div wire:loading wire:target="image" class="text-info small">Uploading...</div>
                                        @if ($image)
                                            <div class="mt-1">
                                                <img src="{{ $image->temporaryUrl() }}" class="imaged w-100 rounded">
                                            </div>
                                        @elseif ($isEditing && $currentImage)
                                            <div class="mt-1">
                                                <p class="small text-muted">Banner saat ini:</p>
                                                <img src="{{ $currentImage }}" class="imaged w-100 rounded">
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group boxed">
                                    <div class="input-wrapper">
                                        <label class="label" for="title">Judul Campaign</label>
                                        <input type="text" wire:model="title" class="form-control" id="title" placeholder="Contoh: Wakaf Air Bersih">
                                        @error('title') <span class="text-danger small">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                <div class="form-group boxed">
                                    <div class="input-wrapper">
                                        <label class="label" for="category">Kategori</label>
                                        <select class="form-control custom-select" wire:model="category_id" id="category">
                                            <option value="">Pilih Kategori</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id') <span class="text-danger small">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                <div class="form-group boxed">
                                    <div class="input-wrapper">
                                        <label class="label" for="target_amount">Target Dana (Rp)</label>
                                        <input type="number" wire:model="target_amount" class="form-control" id="target_amount" placeholder="0">
                                        @error('target_amount') <span class="text-danger small">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                <div class="form-group boxed">
                                    <div class="input-wrapper">
                                        <label class="label" for="end_date">Tanggal Berakhir</label>
                                        <input type="date" wire:model="end_date" class="form-control" id="end_date">
                                        @error('end_date') <span class="text-danger small">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                <div class="form-group boxed">
                                    <div class="input-wrapper">
                                        <label class="label" for="target_penerima">Target Penerima Manfaat</label>
                                        <input type="text" wire:model="target_penerima_manfaat" class="form-control" id="target_penerima" placeholder="Contoh: 100 Kepala Keluarga">
                                        @error('target_penerima_manfaat') <span class="text-danger small">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                <div class="form-group boxed">
                                    <div class="input-wrapper">
                                        <label class="label" for="lokasi">Lokasi Penyaluran</label>
                                        <input type="text" wire:model="lokasi_penyaluran" class="form-control" id="lokasi" placeholder="Contoh: Bogor, Jawa Barat">
                                        @error('lokasi_penyaluran') <span class="text-danger small">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                <div class="form-group boxed">
                                    <div class="input-wrapper">
                                        <label class="label" for="description">Deskripsi Lengkap</label>
                                        <textarea wire:model="description" rows="5" class="form-control" id="description" placeholder="Ceritakan detail campaign Anda..."></textarea>
                                        @error('description') <span class="text-danger small">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                <div class="mt-2">
                                    <button type="submit" class="btn btn-primary btn-block btn-lg" wire:loading.attr="disabled">
                                        {{ $isEditing ? 'Update Campaign' : 'Daftarkan Campaign' }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                @endif

                <!-- Table daftar campaign -->
                <div class="section full mt-2 mb-2">
                    <div class="section-title">Campaign Saya</div>
                    <div class="content-header mb-05"></div>
                    <div class="wide-block p-0">

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Campaign</th>
                                        <th scope="col">Dana</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($campaigns as $campaign)
                                        <tr>
                                            <td>
                                                <div class="fw-bold">{{ $campaign->title }}</div>
                                                <div class="text-muted small">Ends: {{ \Carbon\Carbon::parse($campaign->end_date)->translatedFormat('d M Y') }}</div>
                                            </td>
                                            <td>
                                                <div class="small">Terkumpul:</div>
                                                <div class="text-primary fw-bold">Rp {{ number_format($campaign->collected_amount, 0, ',', '.') }}</div>
                                                <div class="text-muted small">Target: Rp {{ number_format($campaign->target_amount, 0, ',', '.') }}</div>
                                            </td>
                                            <td>
                                                @if($campaign->status == 'published')
                                                    <span class="badge badge-success">Aktif</span>
                                                @elseif($campaign->status == 'draft')
                                                    <span class="badge badge-warning">Draft</span>
                                                @elseif($campaign->status == 'completed')
                                                    <span class="badge badge-primary">Selesai</span>
                                                @else
                                                    <span class="badge badge-secondary">{{ $campaign->status }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($campaign->status == 'draft')
                                                    <button wire:click="editCampaign({{ $campaign->id }})" class="btn btn-sm btn-text-primary">Edit</button>
                                                @else
                                                    <span class="text-muted small">-</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">Belum ada campaign.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>

            </div>

            @livewire('nav-bar')

        </div>
    </div>
</div>
