<div class="">
    @include('_message')
    <div class="">
        <form action="{{ route('fundraiser.store') }}" class="row g-3 needs-validation" novalidate method="post"
            enctype="multipart/form-data">
            @csrf
            <h5 class="card-title">Data Lembaga/Komunitas</h5>
            <div class="col-md-6">
                <label for="validationCustom01" class="form-label">Nama Lembaga/Komunitas</label>
                <input type="text" class="form-control" id="validationCustom01" name="namaLembaga" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-6">
                <label for="validationCustom02" class="form-label">Jenis Badan Usaha</label>
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
            </div>
            <div class="col-md-4">
                <label for="validationCustom03" class="form-label">Kota Domisili </label>
                <input type="text" class="form-control" id="validationCustom03" name="kotaDomisili" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-8">
                <label for="validationCustom04" class="form-label">Alamat Lembaga/Komunitas </label>
                <input type="text" class="form-control" id="validationCustom04" name="alamatLembaga" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-6">
                <label for="validationCustom05" class="form-label">Email Lembaga/Komunitas </label>
                <input type="email" class="form-control" id="validationCustom05" name="emailLembaga" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-6">
                <label for="validationCustom07" class="form-label">Nomor Telpon/HP </label>
                <input type="number" class="form-control" id="validationCustom07" name="nomorTelpon" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-4">
                <label for="validationCustom08" class="form-label">Nomor Ijin </label>
                <input type="text" class="form-control" id="validationCustom08" name="nomorIjin" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-4">
                <label for="validationCustom09" class="form-label">Nomor Kemenkumham </label>
                <input type="text" class="form-control" id="validationCustom09" name="nomorKemenkumham" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-4">
                <label for="validationCustom10" class="form-label">Nomor NPWP </label>
                <input type="text" class="form-control" id="validationCustom10" name="nomorNpwp">
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>

            <div class="col-md-4">
                <label for="validationCustom11" class="form-label">Nama Bank </label>
                <input type="text" class="form-control" id="validationCustom11" name="namaBank" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-4">
                <label for="validationCustom12" class="form-label">Nomor Rekening </label>
                <input type="number" class="form-control" id="validationCustom12" name="nomorRekening" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-4">
                <label for="validationCustom13" class="form-label">Nama Rekening </label>
                <input type="text" class="form-control" id="validationCustom13" name="namaRekening" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-3">
                <label for="validationCustom14" class="form-label">Lampiran dokumen ijin </label>
                <input type="file" class="form-control" name="imageIjin" id="validationCustom14" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-3">
                <label for="validationCustom15" class="form-label">Lampiran dokumen kemenhumham </label>
                <input type="file" class="form-control" name="imageKemenhumham" id="validationCustom15" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-3">
                <label for="validationCustom16" class="form-label">Lampiran dokumen NPWP </label>
                <input type="file" class="form-control" name="imageNpwp" id="validationCustom16">
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-3">
                <label for="validationCustom17" class="form-label">Lampiran dokumen buku tabungan </label>
                <input type="file" class="form-control" name="imageBukuTabungan" id="validationCustom17"
                    required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>

            <hr>
            <h5 class="card-title">Data Penanggung Jawab</h5>

            <div class="col-md-4">
                <label for="validationCustom18" class="form-label">Nama Penanggung Jawab </label>
                <input type="text" class="form-control" id="validationCustom18" name="namaPj" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-4">
                <label for="validationCustom19" class="form-label">Tempat lahir </label>
                <input type="text" class="form-control" id="validationCustom19" name="tempatLahir" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-4">
                <label for="validationCustom20" class="form-label">Tanggal lahir </label>
                <input type="date" class="form-control" id="validationCustom20" name="tanggallahir" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>

            <div class="col-md-4">
                <label for="validationCustom21" class="form-label">Email </label>
                <input type="email" class="form-control" id="validationCustom21" name="emailPj" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-4">
                <label for="validationCustom22" class="form-label">Nomor </label>
                <input type="number" class="form-control" id="validationCustom22" name="nomorPj" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-4">
                <label for="validationCustom23" class="form-label">Jabatan dalam Lembaga/Komunitas </label>
                <input type="text" class="form-control" id="validationCustom23" name="jabatan" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>

            <div class="col-md-6">
                <label for="validationCustom24" class="form-label">Nama Pimpinan </label>
                <input type="text" class="form-control" id="validationCustom24" name="namaPimpinan" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-6">
                <label for="validationCustom25" class="form-label">Nomor HP Pimpinan </label>
                <input type="number" class="form-control" id="validationCustom25" name="nomorHpPimpinan" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-6">
                <label for="validationCustom26" class="form-label">Nama Bendahara </label>
                <input type="text" class="form-control" id="validationCustom26" name="namaBendahara" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-6">
                <label for="validationCustom27" class="form-label">Nomor HP Bendahara </label>
                <input type="number" class="form-control" id="validationCustom27" name="nomorHpBendahara" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>

            <div class="col-md-4">
                <label for="validationCustom28" class="form-label">Lampiran dokumen PJ dari lembaga </label>
                <input type="file" class="form-control" name="imageDocPj" id="validationCustom28" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-4">
                <label for="validationCustom29" class="form-label">Lampiran dokumen struktur organisasi </label>
                <input type="file" class="form-control" name="imageStrukturOrg" id="validationCustom29">
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-4">
                <label for="validationCustom30" class="form-label">Lampiran dokumen KTP </label>
                <input type="file" class="form-control" name="imageKtp" id="validationCustom30" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>

            <div class="col-12">
                <button class="btn btn-primary" type="submit">Submit Register</button>
            </div>
        </form>

    </div>
</div>
