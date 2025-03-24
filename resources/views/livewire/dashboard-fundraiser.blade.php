<div class="container">
    <script type="module" src="https://unpkg.com/ionicons@5.0.0/dist/ionicons/ionicons.esm.js"></script>
    
    <!-- App Header -->
    <div class="appHeader bg-primary text-light container" >
        <div class="left">
            <a href="/akun/dashboard-donatur" class="headerButton goBack">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle"></div>
        <div class="right">

        </div>
    </div>
    <!-- * App Header -->

    <!-- App Capsule -->
    <div id="appCapsule">

        <div class="login-form">
            <div class="section mt-3 mb-3">
                <h2 class="mb-3">Registrasi Fundriser</h2>
				        <h4>Lembaga/organisasi berbadan hukum.</h4>
            </div>
		</div>

		<!-- Registrasi fundriser-->
		<div class="section wide-block mt-1 mb-3">



			<form class="needs-validation" novalidate action="verifikasi-fundriser.html">

        <div class="wide-block pb-2 pt-2">
					<div class="form group basic custom-file-upload">
							<input type="file" id="fileuploadInput" accept=".png, .jpg, .jpeg">
								<label for="fileuploadInput">
									<span>
										<strong>
											<ion-icon name="cloud-upload-outline"></ion-icon>
											<i>Upload Cover Fundriser (480x220px)</i>
										</strong>
									</span>
								</label>
					</div>
				</div>

				<div class="form-group basic">
					<div class="input-wrapper">
						<label class="label" for="jenis-badan-hukum">Jenis Badan Hukum</label>
						<select class="form-control custom-select text-secondary" id="jenis-badan-hukum" required>
							<option selected disabled value=""></option>
							<option value="1">Yayasan</option>
							<option value="2">Sekolah</option>
							<option value="3">Pesantren</option>
							<option value="4">Organisasi Masyarakat</option>
              				<option value="5">Komunitas</option>
						</select>
						<div class="valid-feedback"></div>
						<div class="invalid-feedback">Pilih basis provinsi.</div>
					</div>
				</div>

        <div class="form-group basic">
          <div class="input-wrapper">
            <label class="label" for="nomor-ijin">Nomor Legalitas Lembaga/Yayasan/Ormas</label>
            <input type="text" class="form-control" id="nomor ijin" placeholder="" required>
            <i class="clear-input">
              <ion-icon name="close-circle"></ion-icon>
            </i>
            <div class="valid-feedback"></div>
            <div class="invalid-feedback">Masukkan nomor legalitas lembaga/yayasan/ormas.</div>
          </div>
        </div>

		
        <div class="form-group basic">
          <div class="input-wrapper">
            <label class="label" for="ijin-kemenkumham">Ijin Kemenkumham</label>
            <input type="text" class="form-control" id="ijin-kemenkumham" placeholder="" required>
            <i class="clear-input">
              <ion-icon name="close-circle"></ion-icon>
            </i>
            <div class="valid-feedback"></div>
            <div class="invalid-feedback">Masukkan nomor ijin Kemenkumham.</div>
          </div>
        </div>

	
        
        <div class="form-group basic">
          <div class="input-wrapper">
            <label class="label" for="provinsi">Domisili Provinsi</label>
            <select class="form-control custom-select text-secondary" id="provinsi" required>
              <option selected disabled value=""></option>
              <option value="1">Aceh</option>
              <option value="2">Sumatera Utara</option>
              <option value="3">Sumatera Barat</option>
              <option value="4">Riau</option>
              <option value="5">Kepulauan Riau</option>
              <option value="6">Jambi</option>
              <option value="7">Bengkulu</option>
              <option value="8">Sumatera Selatan</option>
              <option value="9">Kepulauan Bangka Belitung</option>
              <option value="10">Lampung</option>
              <option value="11">Banten</option>
              <option value="12">Jawa Barat</option>
              <option value="13">DKI Jakarta</option>
              <option value="14">Jawa Tengah</option>
              <option value="15">Yogyakarta</option>
              <option value="16">Jawa Timur</option>
              <option value="17">Bali</option>
              <option value="18">Nusa Tenggara Barat</option>
              <option value="19">Nusa Tenggara Timur</option>
              <option value="20">Kalimantan Utara</option>
              <option value="21">Kalimantan Barat</option>
              <option value="22">Kalimantan Tengah</option>
              <option value="23">Kalimantan Selatan</option>
              <option value="24">Kalimantan Timur</option>
              <option value="25">Gorontalo</option>
              <option value="26">Sulawesi Utara</option>
              <option value="27">Sulawesi Barat</option>
              <option value="28">Sulawesi Tengah</option>
              <option value="29">Sulawesi Selatan</option>
              <option value="30">Sulawesi Tenggara</option>
              <option value="31">Maluku Utara</option>
              <option value="32">Maluku</option>
              <option value="33">Papua</option>
              <option value="34">Papua Barat</option>
            </select>
            <div class="valid-feedback"></div>
            <div class="invalid-feedback">Pilih basis provinsi.</div>
          </div>
        </div>
						<!-- Domisili kota/kabupaten klo bisa diambil list otomatis dari pemilihan propinsi. 
						 domisili kota/kabupaten menjadi home base dalam profil fundriser dan lokasi pada laporan campign-->
        				<div class="form-group basic">
        					<div class="input-wrapper">
        						<label class="label" for="kota">Domisili Kota/Kabupaten</label>
        						<input type="text" class="form-control" id="kota" placeholder="" required>
        						<i class="clear-input">
        							<ion-icon name="close-circle"></ion-icon>
        						</i>
        						<div class="valid-feedback"></div>
        						<div class="invalid-feedback">Tuliskan kota/kabupaten.</div>
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
										<input type="file" class="form-control" id="file-legalitas" placeholder="" accept=".jpg, .jpeg, .png, .pdf" required>
									</div>
								</div>
						

								<div class="form-group basic">
									<div class="input-wrapper">
										<label class="label" for="file-kemenkumham">Lampiran Kemenkumham</label>
										<input type="file" class="form-control" id="file-kemenkumham" placeholder="" accept=".jpg, .jpeg, .png, .pdf" required>
									</div>
								</div>

								<div class="form-group basic">
									<div class="input-wrapper">
										<label class="label" for="file-rekening">Lampiran halaman depan buku rekening</label>
										<input type="file" class="form-control" id="file-rekening" placeholder="" accept=".jpg, .jpeg, .png, .pdf" required>
									</div>
								</div>

								<div class="form-group basic">
									<div class="input-wrapper">
										<label class="label" for="file-rekening-personal">Lampiran pernyataan jika tidak menggunakan rekening lembaga/yayasan/ormas (opsional)</label>
										<input type="file" class="form-control" id="file-rekening-personal" placeholder="" accept=".jpg, .jpeg, .png, .pdf">
									</div>
								</div>

								<div class="form-group basic">
									<div class="input-wrapper">
										<label class="label" for="file-struktur">Lampiran Struktur Organisasi</label>
										<input type="file" class="form-control" id="file-struktur" placeholder="" accept=".jpg, .jpeg, .png, .pdf" required>
									</div>
								</div>

								<div class="form-group basic">
									<div class="input-wrapper">
										<label class="label" for="file-surat-tugas">Lampiran Surat Tugas</label>
										<input type="file" class="form-control" id="file-surat-tugas" placeholder="" accept=".jpg, .jpeg, .png, .pdf" required>
									</div>
								</div>

								<div class="form-group basic">
									<div class="input-wrapper">
										<label class="label" for="file-ktp">Lampiran KTP PIC</label>
										<input type="file" class="form-control" id="file-ktp" placeholder="" accept=".jpg, .jpeg, .png, .pdf" required>
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