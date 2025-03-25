<div class="container">

    <div class="appHeader bg-primary text-light container">
        <div class="left">
            <a href="/" wire:navigate class="headerButton goBack">
                <img src="{{ asset('assets/img/back-arrow.png') }}" height="30"></img>
            </a>
        </div>
        <div class="pageTitle"></div>
        <div class="right">

        </div>
    </div>

    <div id="appCapsule">
        <div class="section mt-3 mb-0">
            <h2 class="text-primary mb-3">Hitung Fidyah</h2>
        </div>

        <div class="container">
            <div class="blog-post">
                <div class="post-body">
                    <p>
                        Fidyah adalah kewajiban membayar ganti puasa bagi umat Islam yang tidak bisa
                        berpuasa karena alasan tertentu. Fidyah dibayarkan sesuai jumlah hari puasa
                        yang ditinggalkan.
                    </p>
                    <p>
                        Fidyah puasa dapat dibayarkan kapan saja kepada fakir miskin, khususnya Ahlul Bait
                        dalam betuk beras sebanyak 750-800 gram atau makanan siap santap, yakni nasi dan lauknya.
                        Tidak boleh memberikannya dalam bentuk uang, kecuali sekedar menitipkan untuk dibelikan beras
                        atau nasi.
                    </p>
                </div>
                <form class="needs-validation" novalidate action="">
                    <div class="section-full mt-0 mb-0">

                    </div>
                    <div class="wide-block pb-2 pt-2">
                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="form-label">Jumlah hari tidak puasa</label>
                                <input type="number" class="form-control" id="numberInput"
                                    wire:model.change="jumlahHariTidakPuasa" placeholder="0">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>
                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="form-label">Biaya rata-rata makan satu hari</label>
                                <input type="number" class="form-control" id="numberInput"
                                    wire:model.change="formattedBiayaMakan" placeholder="Rp">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>
                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="form-label"><strong>Jumlah yang saya harus bayar</strong></label>
                                <input type="text" id="numberInput" class="form-control"
                                    wire:model.change="formattedJumlahBayar" placeholder="Rp" disabled>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

    @if ($jumlahBayar > 0)
        <div class="appBottomMenu container">
            <div class="col-12">
                <a href="/checkout/{{ 'fidyah-' . $jumlahBayar }}" class="btn-block">
                    <button type="button" class="btn btn-success btn-lg btn-block">Bayar Fidyah</button>
                </a>
            </div>
        </div>
    @endif

</div>