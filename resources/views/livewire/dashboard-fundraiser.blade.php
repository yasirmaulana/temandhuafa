<div class="container">
    <div class="appHeader bg-primary text-light container">
        <div class="left">
            <a href="/akun/dashboard-donatur" wire:navigate class="headerButton goBack">
                <img src="{{ asset('assets/img/back-arrow.png') }}" height="30"></img>
            </a>
        </div>
        <div class="pageTitle"></div>
        <div class="right">

        </div>
    </div>

    <div id="appCapsule">

        <div class="login-form">
            <div class="section mt-3 mb-3">
                <h2 class="mb-3">Registrasi Fundriser</h2>
                <h4>Lembaga/organisasi berbadan hukum.</h4>
            </div>
        </div>

        <!-- Registrasi fundriser-->
        <div class="section wide-block mt-1 mb-3">

            <form class="needs-validation" novalidate method="post" wire:submit.prevent="auth_register"
                enctype="multipart/form-data">
                @csrf

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label mb-2" for="cover">Upload Cover Fundriser (480x220px; Max size 2M)</label>
                        <input type="file" class="form-control" @error('cover') is-invalid @enderror
                            wire:model="cover">
                        @error('cover')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="nama_lembaga">Nama Lembaga</label>
                        <input type="text" class="form-control" @error('nama_lembaga') is-invalid @enderror
                            wire:model="nama_lembaga">
                        @error('nama_lembaga')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="jenis_badan_usaha">Jenis Badan Hukum</label>
                        <select class="form-control custom-select text-secondary" wire:model="jenis_badan_usaha">
                            <option selected value="">-- Pilih Jenis Badan Hukum --</option>
                            <option value="Yayasan">Yayasan</option>
                            <option value="Sekolah">Sekolah</option>
                            <option value="Pesantren">Pesantren</option>
                            <option value="Organisasi Masyarakat">Organisasi Masyarakat</option>
                            <option value="Komunitas">Komunitas</option>
                        </select>
                        @error('jenis_badan_usaha')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="nomor_ijin">Nomor Legalitas Lembaga/Yayasan/Ormas</label>
                        <input type="text" class="form-control" wire:model="nomor_ijin">
                        @error('nomor_ijin')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="nomor_kemenkumham">Ijin Kemenkumham</label>
                        <input type="text" class="form-control" wire:model="nomor_kemenkumham">
                        @error('nomor_kemenkumham')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="provinsi">Domisili Provinsi</label>
                        <select class="form-control custom-select text-secondary" wire:model.change="provinsi">
                            <option selected value="">-- Pilih Provinsi --</option>
                            @foreach ($list_provinsi as $prov)
                                <option value="{{ $prov->provinsi }}">{{ $prov->provinsi }}</option>
                            @endforeach
                        </select>
                        @error('provinsi')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="kota_domisili">Domisili Kota/Kabupaten</label>
                        <select class="form-control custom-select text-secondary" wire:model="kota_domisili">
                            <option selected value="">-- Pilih Kota/Kabupaten --</option>
                            @foreach ($list_kota as $kota)
                                <option value="{{ $kota->nama_kota }}">{{ $kota->nama_kota }}</option>
                            @endforeach
                        </select>
                        @error('kota_domisili')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="alamat_lembaga">Alamat Lengkap</label>
                        <input type="text" class="form-control" wire:model="alamat_lembaga">
                        @error('alamat_lembaga')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="nomor_rekening">Nomor Rekening Lembaga/Yayasan/Ormas</label>
                        <input type="text" class="form-control" wire:model="nomor_rekening">
                        @error('nomor_rekening')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="nama_rekening">Nama Pemilik Rekening</label>
                        <input type="text" class="form-control" wire:model="nama_rekening">
                        @error('nama_rekening')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="nama_bank">Nama Bank</label>
                        <input type="text" class="form-control" wire:model="nama_bank">
                        @error('nama_bank')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <br />
                <h4>DATA PENGURUS</h4>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="nama_pimpinan">Nama Pimpinan</label>
                        <input type="text" class="form-control" wire:model="nama_pimpinan">
                        @error('nama_pimpinan')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="nomor_hp_pimpinan">Kontak WA Pimpinan</label>
                        <input type="number" class="form-control" wire:model="nomor_hp_pimpinan">
                        @error('nomor_hp_pimpinan')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="email_pimpinan">Email Pimpinan</label>
                        <input type="email" class="form-control" wire:model="email_pimpinan">
                        @error('email_pimpinan')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="nama_bendahara">Nama Bendahara</label>
                        <input type="text" class="form-control" wire:model="nama_bendahara">
                        @error('nama_bendahara')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="nomor_hp_bendahara">Kontak WA Bendahara</label>
                        <input type="number" class="form-control" wire:model="nomor_hp_bendahara">
                        @error('nomor_hp_bendahara')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="email_bendahara">Email Bendahara</label>
                        <input type="email" class="form-control" wire:model="email_bendahara">
                        @error('email_bendahara')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="nama_pj">Nama PIC</label>
                        <input type="text" class="form-control" wire:model="nama_pj">
                        @error('nama_pj')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="nomor_pj">Kontak WA PIC</label>
                        <input type="number" class="form-control" wire:model="nomor_pj">
                        @error('nomor_pj')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="email_pj">Email PIC</label>
                        <input type="email" class="form-control" wire:model="email_pj">
                        @error('email_pj')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="file_legalitas">Lampiran legalitas lembaga/yayasan/ormas (Max size
                            2M)</label>
                        <input type="file" class="form-control" @error('file_legalitas') is-invalid @enderror
                            wire:model="file_legalitas">
                        @error('file_legalitas')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="file_kemenkumham">Lampiran Kemenkumham (Max size 2M)</label>
                        <input type="file" class="form-control" @error('file_kemenkumham') is-invalid @enderror
                            wire:model="file_kemenkumham">
                        @error('file_kemenkumham')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="file_rekening">Lampiran halaman depan buku rekening (Max size
                            2M)</label>
                        <input type="file" class="form-control" @error('file_rekening') is-invalid @enderror
                            wire:model="file_rekening">
                        @error('file_rekening')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="file_pernyataan">Lampiran pernyataan jika tidak menggunakan
                            rekening lembaga/yayasan/ormas (opsional) (Max size 2M)</label>
                        <input type="file" class="form-control" @error('file_pernyataan') is-invalid @enderror
                            wire:model="file_pernyataan">
                        @error('file_pernyataan')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="file_struktur">Lampiran Struktur Organisasi (Max size 2M)</label>
                        <input type="file" class="form-control" @error('file_struktur') is-invalid @enderror
                            wire:model="file_struktur">
                        @error('file_struktur')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="file_surat_tugas">Lampiran Surat Tugas (Max size 2M)</label>
                        <input type="file" class="form-control" @error('file_surat_tugas') is-invalid @enderror
                            wire:model="file_surat_tugas">
                        @error('file_surat_tugas')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="file_ktp">Lampiran KTP PIC (Max size 2M)</label>
                        <input type="file" class="form-control" @error('file_ktp') is-invalid @enderror
                            wire:model="file_ktp">
                        @error('file_ktp')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group  mt-2 mb-3">
                    <div class="custom-control custom-checkbox mb-1">
                        <input type="checkbox" class="custom-control-input" id="terms" wire:model="terms">
                        <label class="custom-control-label" for="terms">Saya setuju dengan
                            <a href="/" target=_blank wire:navigate>Syarat & Ketentuan</a>
                        </label>
                    </div>
                    @error('terms')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="appBottomMenu container">
                    <button type="submit" class="btn btn-success btn-block btn-lg">Registrasi Fundriser</button>
                </div>

            </form>
        </div>
    </div>
</div>