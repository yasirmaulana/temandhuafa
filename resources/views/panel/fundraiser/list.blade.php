<x-layout>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                @include('_message')
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="card-title">Fundraiser List</h5>
                            </div>
                        </div>

                        <table class="table table-hover datatable">
                            <thead>
                                <tr>
                                    <th scope="col">Nama Lembaga</th>
                                    <th scope="col">Jenis Badan Usaha</th>
                                    <th scope="col">Email Lembaga</th>
                                    <th scope="col">Nomor Lembaga</th>
                                    <th scope="col">Status</th>`
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($getRecord as $value)
                                    <tr data-bs-toggle="modal" data-bs-target="#ExtralargeModal"
                                        data-nama-lembaga="{{ $value->nama_lembaga }}"
                                        data-jenis-badan-usaha="{{ $value->jenis_badan_usaha }}"
                                        data-kota-domisili="{{ $value->kota_domisili }}"
                                        data-alamat-lembaga="{{ $value->alamat_lembaga }}"
                                        data-email-lembaga="{{ $value->email_lembaga }}"
                                        data-nomor-telpon="{{ $value->nomor_telpon }}"
                                        data-nomor-ijin="{{ $value->nomor_ijin }}"
                                        data-nomor-kemenkumham="{{ $value->nomor_kemenkumham }}"
                                        data-nomor-npwp="{{ $value->nomor_npwp }}"
                                        data-nama-bank="{{ $value->nama_bank }}"
                                        data-nomor-rekening="{{ $value->nomor_rekening }}"
                                        data-nama-rekening="{{ $value->nama_rekening }}"
                                        data-image-ijin="{{ $value->image_ijin }}"
                                        data-image-kemenkumham="{{ $value->image_kemenkumham }}"
                                        data-image-npwp="{{ $value->image_npwp }}"
                                        data-image-buku-tabungan="{{ $value->image_buku_tabungan }}"
                                        data-nama-pj="{{ $value->nama_pj }}"
                                        data-tempat-lahir="{{ $value->tempat_lahir }}"
                                        data-tanggal-lahir="{{ $value->tanggal_lahir }}"
                                        data-email-pj="{{ $value->email_pj }}" data-nomor-pj="{{ $value->nomor_pj }}"
                                        data-jabatan="{{ $value->jabatan }}"
                                        data-nama-pimpinan="{{ $value->nama_pimpinan }}"
                                        data-nomor-hp-pimpinan="{{ $value->nomor_hp_pimpinan }}"
                                        data-nama-bendahara="{{ $value->nama_bendahara }}"
                                        data-nomor-hp-bendahara="{{ $value->nomor_hp_bendahara }}"
                                        data-image-doc-pj="{{ $value->image_doc_pj }}"
                                        data-image-struktur-org="{{ $value->image_struktur_org }}"
                                        data-image-ktp="{{ $value->image_ktp }}">
                                        <td>{{ $value->nama_lembaga }}</td>
                                        <td>{{ $value->jenis_badan_usaha }}</td>
                                        <td>{{ $value->email_lembaga }}</td>
                                        <td>{{ $value->nomor_telpon }}</td>
                                        <td>{{ $value->register_status }}</td>
                                        <td></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="ExtralargeModal" tabindex="-1">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Fundraiser Detail</h5>
                    </div>
                    <div class="modal-body">
                        <div>
                            <div class="row">
                                <div class="col-md-6">
                                    <h5 class="card-title">Data Lembaga/Komunitas</h5>

                                    <div class="mb-2 row d-flex align-items-center">
                                        <label class="col-auto col-form-label">Nama:</label>
                                        <div class="col">
                                            <span id="namaLembaga" class="fw-bold">var</span>
                                        </div>
                                    </div>

                                    <div class="mb-2 row d-flex align-items-center">
                                        <label class="col-auto col-form-label">Jenis Badan Usaha:</label>
                                        <div class="col">
                                            <span id="jenisBadanUsaha" class="fw-bold">var</span>
                                        </div>
                                    </div>

                                    <div class="mb-2 row d-flex align-items-center">
                                        <label class="col-auto col-form-label">Kota Domisili:</label>
                                        <div class="col">
                                            <span id="kotaDomisili" class="fw-bold">var</span>
                                        </div>
                                    </div>
                                    <div class="mb-2 row d-flex align-items-center">
                                        <label class="col-auto col-form-label">Alamat:</label>
                                        <div class="col">
                                            <span id="alamatLembaga" class="fw-bold">var</span>
                                        </div>
                                    </div>
                                    <div class="mb-2 row d-flex align-items-center">
                                        <label class="col-auto col-form-label">Email:</label>
                                        <div class="col">
                                            <span id="emailLembaga" class="fw-bold">var</span>
                                        </div>
                                    </div>
                                    <div class="mb-2 row d-flex align-items-center">
                                        <label class="col-auto col-form-label">Nomor Telpon/HP:</label>
                                        <div class="col">
                                            <span id="nomorLembaga" class="fw-bold">var</span>
                                        </div>
                                    </div>
                                    <div class="mb-2 row d-flex align-items-center">
                                        <label class="col-auto col-form-label">Nomor Ijin:</label>
                                        <div class="col">
                                            <span id="nomorIjin" class="fw-bold">var</span>
                                        </div>
                                    </div>
                                    <div class="mb-2 row d-flex align-items-center">
                                        <label class="col-auto col-form-label">Nomor Kemenkumham:</label>
                                        <div class="col">
                                            <span id="nomorKemenkumham" class="fw-bold">var</span>
                                        </div>
                                    </div>
                                    <div class="mb-2 row d-flex align-items-center">
                                        <label class="col-auto col-form-label">Nomor NPWP:</label>
                                        <div class="col">
                                            <span id="nomorNpwp" class="fw-bold">var</span>
                                        </div>
                                    </div>
                                    <div class="mb-2 row d-flex align-items-center">
                                        <label class="col-auto col-form-label">Nama Bank:</label>
                                        <div class="col">
                                            <span id="namaBank" class="fw-bold">var</span>
                                        </div>
                                    </div>
                                    <div class="mb-2 row d-flex align-items-center">
                                        <label class="col-auto col-form-label">Nomor Rekening:</label>
                                        <div class="col">
                                            <span id="nomorRekening" class="fw-bold">var</span>
                                        </div>
                                    </div>
                                    <div class="mb-2 row d-flex align-items-center">
                                        <label class="col-auto col-form-label">Nama Rekening:</label>
                                        <div class="col">
                                            <span id="namaRekening" class="fw-bold">var</span>
                                        </div>
                                    </div>
                                    <div class="mb-2 row d-flex align-items-center">
                                        <label class="col-auto col-form-label">Dokumen ijin:</label>
                                        <div class="col">
                                            <span id="imageIjin" class="fw-bold">var</span>
                                        </div>
                                    </div>
                                    <div class="mb-2 row d-flex align-items-center">
                                        <label class="col-auto col-form-label">Dokumen kemenkumham:</label>
                                        <div class="col">
                                            <span id="imageKemenkumham" class="fw-bold">var</span>
                                        </div>
                                    </div>
                                    <div class="mb-2 row d-flex align-items-center">
                                        <label class="col-auto col-form-label">Dokumen NPWP:</label>
                                        <div class="col">
                                            <span id="imageNpwp" class="fw-bold">var</span>
                                        </div>
                                    </div>
                                    <div class="mb-2 row d-flex align-items-center">
                                        <label class="col-auto col-form-label">Dokumen buku tabungan:</label>
                                        <div class="col">
                                            <span id="imageBukuTabungan" class="fw-bold">var</span>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-6">
                                    <h5 class="card-title">Data Penanggung Jawab</h5>

                                    <div class="mb-2 row d-flex align-items-center">
                                        <label class="col-auto col-form-label">Nama:</label>
                                        <div class="col">
                                            <span id="namaPj" class="fw-bold">var</span>
                                        </div>
                                    </div>
                                    <div class="mb-2 row d-flex align-items-center">
                                        <label class="col-auto col-form-label">Tempat Lahir:</label>
                                        <div class="col">
                                            <span id="tempatLahir" class="fw-bold">var</span>
                                        </div>
                                    </div>
                                    <div class="mb-2 row d-flex align-items-center">
                                        <label class="col-auto col-form-label">tanggal Lahir:</label>
                                        <div class="col">
                                            <span id="tanggalLahir" class="fw-bold">var</span>
                                        </div>
                                    </div>
                                    <div class="mb-2 row d-flex align-items-center">
                                        <label class="col-auto col-form-label">Email:</label>
                                        <div class="col">
                                            <span id="emailPj" class="fw-bold">var</span>
                                        </div>
                                    </div>
                                    <div class="mb-2 row d-flex align-items-center">
                                        <label class="col-auto col-form-label">Nomor:</label>
                                        <div class="col">
                                            <span id="nomorPj" class="fw-bold">var</span>
                                        </div>
                                    </div>


                                    <div class="mb-2 row d-flex align-items-center">
                                        <label class="col-auto col-form-label">Jabatan dalam Lembaga/Komunitas:</label>
                                        <div class="col">
                                            <span id="jabatan" class="fw-bold">var</span>
                                        </div>
                                    </div>
                                    <div class="mb-2 row d-flex align-items-center">
                                        <label class="col-auto col-form-label">Nama Pimpinan:</label>
                                        <div class="col">
                                            <span id="namaPimpinan" class="fw-bold">var</span>
                                        </div>
                                    </div>
                                    <div class="mb-2 row d-flex align-items-center">
                                        <label class="col-auto col-form-label">Nomor HP Pimpinan:</label>
                                        <div class="col">
                                            <span id="nomorHpPimpinan" class="fw-bold">var</span>
                                        </div>
                                    </div>
                                    <div class="mb-2 row d-flex align-items-center">
                                        <label class="col-auto col-form-label">Nama Bendahara:</label>
                                        <div class="col">
                                            <span id="namaBendahara" class="fw-bold">var</span>
                                        </div>
                                    </div>
                                    <div class="mb-2 row d-flex align-items-center">
                                        <label class="col-auto col-form-label">Nomor HP Bendahara:</label>
                                        <div class="col">
                                            <span id="nomorHpBendahara" class="fw-bold">var</span>
                                        </div>
                                    </div>
                                    <div class="mb-2 row d-flex align-items-center">
                                        <label class="col-auto col-form-label">Dokumen PJ dari lembaga:</label>
                                        <div class="col">
                                            <span id="imageDocPj" class="fw-bold">var</span>
                                        </div>
                                    </div>
                                    <div class="mb-2 row d-flex align-items-center">
                                        <label class="col-auto col-form-label">Dokumen struktur organisasi:</label>
                                        <div class="col">
                                            <span id="imageStrukturOrg" class="fw-bold">var</span>
                                        </div>
                                    </div>
                                    <div class="mb-2 row d-flex align-items-center">
                                        <label class="col-auto col-form-label">Dokumen KTP:</label>
                                        <div class="col">
                                            <span id="imageKtp" class="fw-bold">var</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Ambil semua baris di tabel
            const rows = document.querySelectorAll("table tbody tr");

            rows.forEach(row => {
                row.addEventListener("click", function() {
                    // Ambil data dari atribut dataset atau langsung dari tabel
                    const data = {
                        nama_lembaga: this.dataset.namaLembaga,
                        jenis_badan_usaha: this.dataset.jenisBadanUsaha,
                        kota_domisili: this.dataset.kotaDomisili,
                        alamat_lembaga: this.dataset.alamatLembaga,
                        email_lembaga: this.dataset.emailLembaga,
                        nomor_telpon: this.dataset.nomorTelpon,
                        nomor_ijin: this.dataset.nomorIjin,
                        nomor_kemenkumham: this.dataset.nomorKemenkumham,
                        nomor_npwp: this.dataset.nomorNpwp,
                        nama_bank: this.dataset.namaBank,
                        nomor_rekening: this.dataset.nomorRekening,
                        nama_rekening: this.dataset.namaRekening,
                        image_ijin: this.dataset.imageIjin,
                        image_kemenkumham: this.dataset.imageKemenkumham,
                        image_npwp: this.dataset.imageNpwp,
                        image_buku_tabungan: this.dataset.imageBukuTabungan,

                        nama_pj: this.dataset.namaPj,
                        tempat_lahir: this.dataset.tempatLahir,
                        tanggal_lahir: this.dataset.tanggalLahir,
                        email_pj: this.dataset.emailPj,
                        nomor_pj: this.dataset.nomorPj,
                        jabatan: this.dataset.jabatan,
                        nama_pimpinan: this.dataset.namaPimpinan,
                        nomor_hp_pimpinan: this.dataset.nomorHpPimpinan,
                        nama_bendahara: this.dataset.namaBendahara,
                        nomor_hp_bendahara: this.dataset.nomorHpBendahara,
                        image_doc_pj: this.dataset.imageDocPj,
                        image_struktur_org: this.dataset.imageStrukturOrg,
                        image_ktp: this.dataset.imageKtp,

                    };

                    // Isi input modal dengan data yang sesuai
                    // document.getElementById("namaLembaga").value = data.nama_lembaga;
                    document.getElementById("namaLembaga").textContent = data.nama_lembaga;
                    document.getElementById("jenisBadanUsaha").textContent = data.jenis_badan_usaha;
                    document.getElementById("kotaDomisili").textContent = data.kota_domisili;
                    document.getElementById("alamatLembaga").textContent = data.alamat_lembaga;
                    document.getElementById("emailLembaga").textContent = data.email_lembaga;
                    document.getElementById("nomorLembaga").textContent = data.nomor_telpon;
                    document.getElementById("nomorIjin").textContent = data.nomor_ijin;
                    document.getElementById("nomorKemenkumham").textContent = data
                        .nomor_kemenkumham;
                    document.getElementById("nomorNpwp").textContent = data.nomor_npwp;
                    document.getElementById("namaBank").textContent = data.nama_bank;
                    document.getElementById("nomorRekening").textContent = data.nomor_rekening;
                    document.getElementById("namaRekening").textContent = data.nama_rekening;
                    document.getElementById("imageIjin").textContent = data.image_ijin;
                    document.getElementById("imageKemenkumham").textContent = data
                        .image_kemenkumham;
                    document.getElementById("imageNpwp").textContent = data.image_npwp;
                    document.getElementById("imageBukuTabungan").textContent = data
                        .image_buku_tabungan;

                    document.getElementById("namaPj").textContent = data.nama_pj;
                    document.getElementById("tempatLahir").textContent = data.tempat_lahir;
                    document.getElementById("tanggalLahir").textContent = data.tanggal_lahir;
                    document.getElementById("emailPj").textContent = data.email_pj;
                    document.getElementById("nomorPj").textContent = data.nomor_pj;
                    document.getElementById("jabatan").textContent = data.jabatan;
                    document.getElementById("namaPimpinan").textContent = data.nama_pimpinan;
                    document.getElementById("nomorHpPimpinan").textContent = data.nomor_hp_pimpinan;
                    document.getElementById("namaBendahara").textContent = data.nama_bendahara;
                    document.getElementById("nomorHpBendahara").textContent = data
                        .nomor_hp_bendahara;
                    document.getElementById("imageDocPj").textContent = data.image_doc_pj;
                    document.getElementById("imageStrukturOrg").textContent = data
                        .image_struktur_org;
                    document.getElementById("imageKtp").textContent = data.image_ktp;

                    // Tambahkan pengisian input lain sesuai dengan ID atau class yang digunakan

                    // Tampilkan modal
                    new bootstrap.Modal(document.getElementById("ExtralargeModal")).show();
                });
            });

            // RESET MODAL KETIKA DITUTUP
            document.getElementById("ExtralargeModal").addEventListener("hidden.bs.modal", function() {
                let elements = [
                    "namaLembaga", "jenisBadanUsaha", "kotaDomisili", "alamatLembaga",
                    "emailLembaga", "nomorLembaga", "nomorIjin", "nomorKemenkumham", "nomorNpwp",
                    "namaBank", "nomorRekening", "namaRekening", "imageIjin", "imageKemenkumham",
                    "imageNpwp", "imageBukuTabungan", "namaPj", "tempatLahir", "tanggalLahir",
                    "emailPj", "nomorPj", "jabatan", "namaPimpinan", "nomorHpPimpinan", "namaBendahara",
                    "nomorHpBendahara", "imageDocPj", "imageStrukturOrg", "imageKtp"
                ];

                elements.forEach(id => {
                    document.getElementById(id).textContent =
                    ""; // Kosongkan isi modal saat ditutup
                });
            });
        });
    </script>
</x-layout>
