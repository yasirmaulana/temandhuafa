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
                        <input type="file" class="form-control" @error('cover') is-invalid @enderror wire:model="cover">
                        @error('cover')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="nama_lembaga">Nama Lembaga</label>
                        <input type="text" class="form-control" @error('nama_lembaga') is-invalid @enderror wire:model="nama_lembaga" placeholder="Nama Lembaga">
                        @error('nama_lembaga')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="jenis_badan_usaha">Jenis Badan Hukum</label>
                        <select class="form-control custom-select text-secondary" wire:model="jenis_badan_usaha">
                            <option selected  value="">-- Pilih Jenis Badan Hukum --</option>
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
                        <input type="text" class="form-control" wire:model="nomor_ijin" placeholder="Nomor Legalitas">
                        @error('nomor_ijin')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="nomor_kemenkumham">Ijin Kemenkumham</label>
                        <input type="text" class="form-control" wire:model="nomor_kemenkumham" placeholder="Ijin Kemenkumham">
                        @error('nomor_kemenkumham')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="provinsi">Domisili Provinsi</label>
                        <select class="form-control custom-select text-secondary" wire:model.change="selectedProvinsi" required>
                            <option selected  value="">-- Pilih Provinsi --</option>
                            @foreach ($provinsi as $prov )
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
                        <select class="form-control custom-select text-secondary" wire:model="kota_domisili" required>
                            <option selected  value="">-- Pilih Kota/Kabupaten --</option>
                            @foreach ($kota_domisili as $kota )
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
                        <label class="label" for="alamat-fundriser">Alamat Lengkap</label>
                        <input type="text" class="form-control" id="alamat-fundriser" placeholder="" required>
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">Tuliskan alamat lengkap fundriser.</div>
                    </div>
                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="no-rekening">Nomor Rekening Lembaga/Yayasan/Ormas</label>
                        <input type="text" class="form-control" id="no-rekening" placeholder="" required>
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">Tuliskan nomor rekening lembaga/yayasan/ormas.</div>
                    </div>
                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="nama-rekening">Nama Pemilik Rekening</label>
                        <input type="text" class="form-control" id="nama-rekening" placeholder="" required>
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">Tuliskan nama pemilik rekening.</div>
                    </div>
                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="nama-bank">Nama Bank</label>
                        <input type="text" class="form-control" id="nama-bank" placeholder="" required>
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">Tuliskan nama bank.</div>
                    </div>
                </div>
                <br />
                <h4>DATA PENGURUS</h4>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="nama-pimpinan">Nama Pimpinan</label>
                        <input type="text" class="form-control" id="nama-pimpinan" placeholder="" required>
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">Masukkan nama pimpinan.</div>
                    </div>
                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="kontak-pimpinan">Kontak WA Pimpinan</label>
                        <input type="text" class="form-control" id="kontak-pimpinan" placeholder="" required>
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">Masukkan nomor kontak WA pimpinan.</div>
                    </div>
                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="email-pimpinan">Email Pimpinan</label>
                        <input type="email" class="form-control" id="email-pimpinan" placeholder="" required>
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">Masukkan alamat email pimpinan.</div>
                    </div>
                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="nama-bendahara">Nama Bendahara</label>
                        <input type="text" class="form-control" id="nama-bendahara" placeholder="" required>
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">Masukkan nama bendahara.</div>
                    </div>
                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="kontak-bendahara">Kontak WA Bendahara</label>
                        <input type="text" class="form-control" id="kontak-bendahara" placeholder="" required>
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">Masukkan nomor kontak WA bendahara.</div>
                    </div>
                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="email-bendahara">Email Bendahara</label>
                        <input type="email" class="form-control" id="email-bendahara" placeholder="" required>
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">Masukkan alamat email bendahara.</div>
                    </div>
                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="nama-pic">Nama PIC</label>
                        <input type="text" class="form-control" id="nama-pic" placeholder="" required>
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">Masukkan nama penanggung jawab fundrising.</div>
                    </div>
                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="kontak-pic">Kontak WA PIC</label>
                        <input type="text" class="form-control" id="kontak-pic" placeholder="" required>
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">Masukkan nomor kontak penanggung jawab fundrising.</div>
                    </div>
                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="email-pic">Email PIC</label>
                        <input type="email" class="form-control" id="email-pic" placeholder="" required>
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">Masukkan alamat email penanggung jawab fundrising.</div>
                    </div>
                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="file-galitas">Lampiran legalitas lembaga/yayasan/ormas</label>
                        <input type="file" class="form-control" id="file-legalitas" placeholder=""
                            accept=".jpg, .jpeg, .png, .pdf" required>
                    </div>
                </div>


                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="file-kemenkumham">Lampiran Kemenkumham</label>
                        <input type="file" class="form-control" id="file-kemenkumham" placeholder=""
                            accept=".jpg, .jpeg, .png, .pdf" required>
                    </div>
                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="file-rekening">Lampiran halaman depan buku rekening</label>
                        <input type="file" class="form-control" id="file-rekening" placeholder=""
                            accept=".jpg, .jpeg, .png, .pdf" required>
                    </div>
                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="file-rekening-personal">Lampiran pernyataan jika tidak menggunakan
                            rekening lembaga/yayasan/ormas (opsional)</label>
                        <input type="file" class="form-control" id="file-rekening-personal" placeholder=""
                            accept=".jpg, .jpeg, .png, .pdf">
                    </div>
                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="file-struktur">Lampiran Struktur Organisasi</label>
                        <input type="file" class="form-control" id="file-struktur" placeholder=""
                            accept=".jpg, .jpeg, .png, .pdf" required>
                    </div>
                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="file-surat-tugas">Lampiran Surat Tugas</label>
                        <input type="file" class="form-control" id="file-surat-tugas" placeholder=""
                            accept=".jpg, .jpeg, .png, .pdf" required>
                    </div>
                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="file-ktp">Lampiran KTP PIC</label>
                        <input type="file" class="form-control" id="file-ktp" placeholder=""
                            accept=".jpg, .jpeg, .png, .pdf" required>
                    </div>
                </div>




                <div class="form-group  mt-2 mb-3">
                    <div class="custom-control custom-checkbox mb-1">
                        <input type="checkbox" class="custom-control-input" id="customCheck2" required>
                        <label class="custom-control-label" for="customCheck2">Saya setuju dengan
                            <a href="javascript:;">Syarat & Ketentuan</a>
                        </label>
                    </div>
                    <div class="valid-feedback"></div>
                    <div class="invalid-feedback">Wajib diceklis.</div>
                </div>

                <div class="appBottomMenu container">
                    <button type="submit" class="btn btn-success btn-block btn-lg">Registrasi Fundriser</button>
                </div>

            </form>


            <!-- * Registrasi form non personal -->

        </div>
        <!-- * App Capsule -->

    </div>
