<div class="">
    @include('_message')
    <h5 class="card-title ps-1 fw-bold">Register Status: {{ $getRecord[0]->register_status }}</h5>
    <div class="">
        <form action="{{ route('fundraiser.store') }}" class="row g-3 needs-validation" novalidate method="post"
            enctype="multipart/form-data">
            @csrf
            <h5 class="card-title ps-2">Data Lembaga/Komunitas</h5>
            <div class="col-md-6">
                <label for="validationCustom01" class="form-label">Nama Lembaga/Komunitas</label>
                <input type="text" class="form-control" id="validationCustom01" name="namaLembaga"
                    value="{{ $getRecord[0]->nama_lembaga }}" @if ($getRecord[0]->register_status == 'Active') disabled @endif
                    @if ($getRecord[0]->register_status == 'Active') disabled @endif required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-6">
                <label for="validationCustom02" class="form-label">Jenis Badan Usaha</label>

                @if ($getRecord[0]->register_status == 'Active')
                    <input type="text" class="form-control" id="validationCustom01" name="namaLembaga"
                        value="{{ $getRecord[0]->jenis_badan_usaha }}" disabled required>
                @else
                    <select class="form-select" id="validationCustom02" name="jenisBdanUsaha" required>
                        <option selected disabled value="">Choose...</option>
                        <option>Yayasan</option>
                        <option>Sekolah</option>
                        <option>Pesantren</option>
                        <option>Ormas</option>
                        <option>Komunitas</option>
                        <option>Masjid</option>
                    </select>
                    <div class="invalid-feedback">
                        Please select a valid state.
                    </div>
                @endif
            </div>
            <div class="col-md-4">
                <label for="validationCustom03" class="form-label">Kota Domisili </label>
                <input type="text" class="form-control" id="validationCustom03" name="kotaDomisili"
                    value="{{ $getRecord[0]->kota_domisili }}" @if ($getRecord[0]->register_status == 'Active') disabled @endif
                    required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-8">
                <label for="validationCustom04" class="form-label">Alamat Lembaga/Komunitas </label>
                <input type="text" class="form-control" id="validationCustom04" name="alamatLembaga"
                    value="{{ $getRecord[0]->alamat_lembaga }}" @if ($getRecord[0]->register_status == 'Active') disabled @endif
                    required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-6">
                <label for="validationCustom05" class="form-label">Email Lembaga/Komunitas </label>
                <input type="email" class="form-control" id="validationCustom05" name="emailLembaga"
                    value="{{ $getRecord[0]->email_lembaga }}" @if ($getRecord[0]->register_status == 'Active') disabled @endif
                    required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-6">
                <label for="validationCustom07" class="form-label">Nomor Telpon/HP </label>
                <input type="number" class="form-control" id="validationCustom07" name="nomorTelpon"
                    value="{{ $getRecord[0]->nomor_telpon }}" @if ($getRecord[0]->register_status == 'Active') disabled @endif
                    required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-4">
                <label for="validationCustom08" class="form-label">Nomor Ijin </label>
                <input type="text" class="form-control" id="validationCustom08" name="nomorIjin"
                    value="{{ $getRecord[0]->nomor_ijin }}" @if ($getRecord[0]->register_status == 'Active') disabled @endif required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-4">
                <label for="validationCustom09" class="form-label">Nomor Kemenkumham </label>
                <input type="text" class="form-control" id="validationCustom09" name="nomorKemenkumham"
                    value="{{ $getRecord[0]->nomor_kemenkumham }}" @if ($getRecord[0]->register_status == 'Active') disabled @endif
                    required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-4">
                <label for="validationCustom10" class="form-label">Nomor NPWP </label>
                <input type="text" class="form-control" id="validationCustom10" name="nomorNpwp"
                    value="{{ $getRecord[0]->nomor_npwp }}" @if ($getRecord[0]->register_status == 'Active') disabled @endif>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>

            <div class="col-md-4">
                <label for="validationCustom11" class="form-label">Nama Bank </label>
                <input type="text" class="form-control" id="validationCustom11" name="namaBank"
                    value="{{ $getRecord[0]->nama_bank }}" @if ($getRecord[0]->register_status == 'Active') disabled @endif
                    required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-4">
                <label for="validationCustom12" class="form-label">Nomor Rekening </label>
                <input type="number" class="form-control" id="validationCustom12" name="nomorRekening"
                    value="{{ $getRecord[0]->nomor_rekening }}" @if ($getRecord[0]->register_status == 'Active') disabled @endif
                    required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-4">
                <label for="validationCustom13" class="form-label">Nama Rekening </label>
                <input type="text" class="form-control" id="validationCustom13" name="namaRekening"
                    value="{{ $getRecord[0]->nama_rekening }}" @if ($getRecord[0]->register_status == 'Active') disabled @endif
                    required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-3">
                <label for="validationCustom14" class="form-label">Lampiran dokumen ijin </label>
                @if ($getRecord[0]->register_status == 'Active')
                    <input type="text" class="form-control" id="validationCustom01" name="namaLembaga"
                        value="{{ $getRecord[0]->image_ijin }}" disabled required>
                @else
                    <input type="file" class="form-control" name="imageIjin" id="validationCustom14" required>
                    <a href="{{ asset('storage/app/private/uploads/fundraiser/' . $getRecord[0]->image_ijin) }}"
                        download>
                        {{ $getRecord[0]->image_ijin }}
                    </a>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                @endif
            </div>
            <div class="col-md-3">
                <label for="validationCustom15" class="form-label">Lampiran dokumen kemenkumham </label>
                @if ($getRecord[0]->register_status == 'Active')
                    <input type="text" class="form-control" id="validationCustom01" name="namaLembaga"
                        value="{{ $getRecord[0]->image_kemenkumham }}" disabled required>
                @else
                    <input type="file" class="form-control" name="imageKemenhumham" id="validationCustom15"
                        required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                @endif
            </div>
            <div class="col-md-3">
                <label for="validationCustom16" class="form-label">Lampiran dokumen NPWP </label>
                @if ($getRecord[0]->register_status == 'Active')
                    <input type="text" class="form-control" id="validationCustom01" name="namaLembaga"
                        value="{{ $getRecord[0]->image_npwp }}" disabled required>
                @else
                    <input type="file" class="form-control" name="imageNpwp" id="validationCustom16">
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                @endif
            </div>
            <div class="col-md-3">
                <label for="validationCustom17" class="form-label">Lampiran dokumen buku tabungan </label>
                @if ($getRecord[0]->register_status == 'Active')
                    <input type="text" class="form-control" id="validationCustom01" name="namaLembaga"
                        value="{{ $getRecord[0]->image_buku_tabungan }}" disabled required>
                @else
                    <input type="file" class="form-control" name="imageBukuTabungan" id="validationCustom17"
                        required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                @endif
            </div>

            <hr>
            <h5 class="card-title ps-2">Data Penanggung Jawab</h5>

            <div class="col-md-4">
                <label for="validationCustom18" class="form-label">Nama Penanggung Jawab </label>
                <input type="text" class="form-control" id="validationCustom18" name="namaPj"
                    value="{{ $getRecord[0]->nama_pj }}" @if ($getRecord[0]->register_status == 'Active') disabled @endif required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-4">
                <label for="validationCustom19" class="form-label">Tempat lahir </label>
                <input type="text" class="form-control" id="validationCustom19" name="tempatLahir"
                    value="{{ $getRecord[0]->tempat_lahir }}" @if ($getRecord[0]->register_status == 'Active') disabled @endif
                    required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-4">
                <label for="validationCustom20" class="form-label">Tanggal lahir </label>
                <input type="date" class="form-control" id="validationCustom20" name="tanggallahir"
                    value="{{ $getRecord[0]->tanggal_lahir }}" @if ($getRecord[0]->register_status == 'Active') disabled @endif
                    required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>

            <div class="col-md-4">
                <label for="validationCustom21" class="form-label">Email </label>
                <input type="email" class="form-control" id="validationCustom21" name="emailPj"
                    value="{{ $getRecord[0]->email_pj }}" @if ($getRecord[0]->register_status == 'Active') disabled @endif
                    required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-4">
                <label for="validationCustom22" class="form-label">Nomor </label>
                <input type="number" class="form-control" id="validationCustom22" name="nomorPj"
                    value="{{ $getRecord[0]->nomor_pj }}" @if ($getRecord[0]->register_status == 'Active') disabled @endif
                    required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-4">
                <label for="validationCustom23" class="form-label">Jabatan dalam Lembaga/Komunitas </label>
                <input type="text" class="form-control" id="validationCustom23" name="jabatan"
                    value="{{ $getRecord[0]->jabatan }}" @if ($getRecord[0]->register_status == 'Active') disabled @endif required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>

            <div class="col-md-6">
                <label for="validationCustom24" class="form-label">Nama Pimpinan </label>
                <input type="text" class="form-control" id="validationCustom24" name="namaPimpinan"
                    value="{{ $getRecord[0]->nama_pimpinan }}" @if ($getRecord[0]->register_status == 'Active') disabled @endif
                    required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-6">
                <label for="validationCustom25" class="form-label">Nomor HP Pimpinan </label>
                <input type="number" class="form-control" id="validationCustom25" name="nomorHpPimpinan"
                    value="{{ $getRecord[0]->nomor_hp_pimpinan }}" @if ($getRecord[0]->register_status == 'Active') disabled @endif
                    required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-6">
                <label for="validationCustom26" class="form-label">Nama Bendahara </label>
                <input type="text" class="form-control" id="validationCustom26" name="namaBendahara"
                    value="{{ $getRecord[0]->nama_bendahara }}" @if ($getRecord[0]->register_status == 'Active') disabled @endif
                    required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-6">
                <label for="validationCustom27" class="form-label">Nomor HP Bendahara </label>
                <input type="number" class="form-control" id="validationCustom27" name="nomorHpBendahara"
                    value="{{ $getRecord[0]->nomor_hp_bendahara }}"
                    @if ($getRecord[0]->register_status == 'Active') disabled @endif required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>

            <div class="col-md-4">
                <label for="validationCustom28" class="form-label">Lampiran dokumen PJ dari lembaga </label>
                @if ($getRecord[0]->register_status == 'Active')
                    <input type="text" class="form-control" id="validationCustom01" name="namaLembaga"
                        value="{{ $getRecord[0]->image_doc_pj }}" disabled required>
                @else
                    <input type="file" class="form-control" name="imageDocPj" id="validationCustom28" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                @endif
            </div>
            <div class="col-md-4">
                <label for="validationCustom29" class="form-label">Lampiran dokumen struktur organisasi </label>
                @if ($getRecord[0]->register_status == 'Active')
                    <input type="text" class="form-control" id="validationCustom01" name="namaLembaga"
                        value="{{ $getRecord[0]->image_struktur_org }}" disabled required>
                @else
                    <input type="file" class="form-control" name="imageStrukturOrg" id="validationCustom29">
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                @endif
            </div>
            <div class="col-md-4">
                <label for="validationCustom30" class="form-label">Lampiran dokumen KTP </label>
                @if ($getRecord[0]->register_status == 'Active')
                    <input type="text" class="form-control" id="validationCustom01" name="namaLembaga"
                        value="{{ $getRecord[0]->image_ktp }}" disabled required>
                @else
                    <input type="file" class="form-control" name="imageKtp" id="validationCustom30" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                @endif
            </div>

            @if ($getRecord[0]->register_status != 'Active')
                <div class="col-12">
                    <button class="btn btn-primary" type="submit">Update Data</button>
                </div>
            @endif
        </form>
    </div>
</div>
