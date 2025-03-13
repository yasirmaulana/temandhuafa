<div class="container">

    @livewire('header')

    <div id="appCapsule">
        <div class="section mt-3 mb-0">
            <h2 class="text-primary mb-3">Hitung Kafarat Puasa</h2>
        </div>

        <div class="container">
            <div class="blog-post">
                <div class="post-body">
                    <p>
                        Kafarah puasa adalah sebuah denda yang harus dibayar oleh mukalaf lantaran membatalkan puasa
                        bulan Ramadan, qada puasa Ramadan setelah azan zuhur, dan puasa nazar dengan waktu yang telah
                        ditentukan.
                    </p>
                    <p>
                        Kafarah membatalkan puasa dengan sengaja adalah puasa dua bulan (31 hari harus dilakukan
                        secara berkesinambungan) atau memberi makan 60 orang fakir.
                    </p>
                    <p>
                        Kafarah membatalkan puasa dengan perbuatan haram, seperti: minum miras atau zina, mewajibkan
                        kafarah ganda, yaitu: puasa dua bulan dan memberi makan 60 orang fakir.
                    </p>
                </div>
                <form class="needs-validation" novalidate action="">
                    <div class="section-full mt-0 mb-0">

                    </div>
                    <div class="wide-block pb-2 pt-2"">
                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="form-label">Memberi makan 60 orang fakir</label>
                                <input type="number" class="form-control" id="numberInput"
                                    wire:model.change="jumlahHariTidakPuasa" placeholder="60 orang fakir" disabled>
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>
                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="form-label">Biaya makan 1 mud (750 gram gandum atau bahan makanan lain)
                                    atau rata-rata biaya makan dalam sehari</label>
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

    @if ($jumlahBayar)
        <div class="appBottomMenu container">
            <div class="col-12">
                <a href="/checkout/{{ 'kafarat-' . $jumlahBayar }}" class="btn-block">
                    <button type="button" class="btn btn-success btn-lg btn-block">Bayar Kafarat</button>
                </a>
            </div>
        </div>
        
    @endif

</div>