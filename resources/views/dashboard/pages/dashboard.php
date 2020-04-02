<?php include __DIR__.'/../layouts/header.php' ?>

<div class="card shadow mb-4">
    <div class="card-header bg-primary text-white py-3">
        <h6 class="m-0 font-weight-bold">ODP - (Orang Dalam Pantauan)</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-xl-6 col-md-12 mb-4">
                <div class="card border-left-primary shadow h-100 py-2" id="card-odp">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-md font-weight-bold text-success text-uppercase">KABUPATEN PASURUAN</div>
                                <div class="text-xs font-weight-bold text-primary text-uppercase">Jumlah Terakhir</div>
                                <div class="text-xs font-weight-bold text-dark mb-1"><span
                                        id="date"><?= $odp['kab']->tanggal ?></span></div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><span id="odp"><?= $odp['kab']->jumlah ?></span>
                                    Orang</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-md-12 mb-4">
                <div class="card border-left-primary shadow h-100 py-2" id="card-odp">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-md font-weight-bold text-primary text-uppercase">KOTA PASURUAN</div>
                                <div class="text-xs font-weight-bold text-primary text-uppercase">Jumlah Terakhir</div>
                                <div class="text-xs font-weight-bold text-dark mb-1"><span
                                        id="date"><?= $odp['kota']->tanggal ?></span></div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><span id="odp"><?= $odp['kota']->jumlah ?></span>
                                    Orang</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-header bg-primary text-white py-3">
        <h6 class="m-0 font-weight-bold">PDP - (Pasien Dalam Pantauan)</h6>
    </div>
    <div class="card-body">
        <div class="font-weight-bold text-success text-uppercase mb-1">KABUPATEN PASURUAN</div>
        <div class="row">
            <div class="col-xl-6 col-md-12 mb-4">
                <div class="card border-left-primary shadow h-100 py-2" id="card-pdp">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase">Jumlah Terakhir</div>
                                <div class="text-xs font-weight-bold text-dark mb-1"><span class="date"><?= $pdp['kab']->tanggal ?></span></div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><span id="pdp"><?= $pdp['kab']->jumlah ?></span> Orang</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-md-12 mb-4">
                <div class="card border-left-success shadow h-100 py-2" id="card-pdp-negative">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase">Negatif Terakhir</div>
                                <div class="text-xs font-weight-bold text-dark mb-1"><span class="date"><?= $pdp['kab']->tanggal ?></span></div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><span id="pdp-negative"><?= $pdp['kab']->negatif ?></span> Orang</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="font-weight-bold text-primary text-uppercase mb-1">KOTA PASURUAN</div>
        <div class="row">
            <div class="col-xl-6 col-md-12 mb-4">
                <div class="card border-left-primary shadow h-100 py-2" id="card-pdp">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase">Jumlah Terakhir</div>
                                <div class="text-xs font-weight-bold text-dark mb-1"><span class="date"><?= $pdp['kota']->tanggal ?></span></div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><span id="pdp"><?= $pdp['kota']->jumlah ?></span> Orang</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-md-12 mb-4">
                <div class="card border-left-success shadow h-100 py-2" id="card-pdp-negative">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase">Negatif Terakhir</div>
                                <div class="text-xs font-weight-bold text-dark mb-1"><span class="date"><?= $pdp['kota']->tanggal ?></span></div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><span id="pdp-negative"><?= $pdp['kota']->negatif ?></span> Orang</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-header bg-primary text-white py-3">
        <h6 class="m-0 font-weight-bold">POSITIF COVID19</h6>
    </div>
    <div class="card-body">
        <div class="font-weight-bold text-success text-uppercase mb-1">KABUPATEN PASURUAN</div>
        <div class="row">
            <div class="col-xl-4 col-md-12 mb-4">
                <div class="card border-left-primary shadow h-100 py-2" id="card-positif">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase">Jumlah Terakhir</div>
                                <div class="text-xs font-weight-bold text-dark mb-1"><span class="date"><?= $positif['kab']->tanggal ?></span></div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><span id="positif"><?= $positif['kab']->jumlah ?></span> Orang</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-12 mb-4">
                <div class="card border-left-success shadow h-100 py-2" id="card-positif-sembuh">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase">Sembuh Terakhir</div>
                                <div class="text-xs font-weight-bold text-dark mb-1"><span class="date"><?= $positif['kab']->tanggal ?></span></div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><span id="positif-sembuh"><?= $positif['kab']->sembuh ?></span> Orang</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-12 mb-4">
                <div class="card border-left-danger shadow h-100 py-2" id="card-positif-meninggal">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-danger text-uppercase">Meninggal Terakhir</div>
                                <div class="text-xs font-weight-bold text-dark mb-1"><span class="date"><?= $positif['kab']->tanggal ?></span></div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><span id="positif-meninggal"><?= $positif['kab']->meninggal ?></span> Orang</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="font-weight-bold text-primary text-uppercase mb-1">KOTA PASURUAN</div>
        <div class="row">
            <div class="col-xl-4 col-md-12 mb-4">
                <div class="card border-left-primary shadow h-100 py-2" id="card-positif">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase">Jumlah Terakhir</div>
                                <div class="text-xs font-weight-bold text-dark mb-1"><span class="date"><?= $positif['kota']->tanggal ?></span></div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><span id="positif"><?= $positif['kota']->jumlah ?></span> Orang</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-12 mb-4">
                <div class="card border-left-success shadow h-100 py-2" id="card-positif-sembuh">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase">Sembuh Terakhir</div>
                                <div class="text-xs font-weight-bold text-dark mb-1"><span class="date"><?= $positif['kota']->tanggal ?></span></div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><span id="positif-sembuh"><?= $positif['kota']->sembuh ?></span> Orang</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-12 mb-4">
                <div class="card border-left-danger shadow h-100 py-2" id="card-positif-meninggal">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-danger text-uppercase">Meninggal Terakhir</div>
                                <div class="text-xs font-weight-bold text-dark mb-1"><span class="date"><?= $positif['kota']->tanggal ?></span></div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><span id="positif-meninggal"><?= $positif['kota']->meninggal ?></span> Orang</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


<?php include __DIR__.'/../layouts/footer.php' ?>