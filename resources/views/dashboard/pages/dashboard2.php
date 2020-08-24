<?php include __DIR__.'/../layouts/header.php' ?>

<div class="card shadow mb-4">
    <div class="card-header bg-primary text-white py-3">
        <h6 class="m-0 font-weight-bold">SUSPEK COVID19</h6>
    </div>
    <div class="card-body">
        <div class="font-weight-bold text-success text-uppercase mb-1">KABUPATEN PASURUAN</div>
        <div class="row">
            <div class="col-xl-12 col-md-12 mb-2">
                <div class="card border-left-primary shadow h-100 py-2" id="card-suspek">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase">Jumlah Terakhir</div>
                                <div class="text-xs font-weight-bold text-dark mb-1"><span class="date"><?= $suspek['kab']->tanggal ?></span></div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><span id="suspek"><?= $suspek['kab']->jumlah() ?></span> Orang</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-12 mb-4">
                <div class="card border-left-warning shadow h-100 py-2" id="card-suspek-dirawat">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase">Dirawat Terakhir</div>
                                <div class="text-xs font-weight-bold text-dark mb-1"><span class="date"><?= $suspek['kab']->tanggal ?></span></div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><span id="suspek-dirawat"><?= $suspek['kab']->dirawat ?></span> Orang</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-12 mb-4">
                <div class="card border-left-success shadow h-100 py-2" id="card-suspek-sembuh">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase">Sembuh Terakhir</div>
                                <div class="text-xs font-weight-bold text-dark mb-1"><span class="date"><?= $suspek['kab']->tanggal ?></span></div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><span id="suspek-sembuh"><?= $suspek['kab']->sembuh ?></span> Orang</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-12 mb-4">
                <div class="card border-left-danger shadow h-100 py-2" id="card-suspek-meninggal">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-danger text-uppercase">Meninggal Terakhir</div>
                                <div class="text-xs font-weight-bold text-dark mb-1"><span class="date"><?= $suspek['kab']->tanggal ?></span></div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><span id="suspek-meninggal"><?= $suspek['kab']->meninggal ?></span> Orang</div>
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
            <div class="col-xl-12 col-md-12 mb-2">
                <div class="card border-left-primary shadow h-100 py-2" id="card-suspek">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase">Jumlah Terakhir</div>
                                <div class="text-xs font-weight-bold text-dark mb-1"><span class="date"><?= $suspek['kota']->tanggal ?></span></div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><span id="suspek"><?= $suspek['kota']->jumlah() ?></span> Orang</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-12 mb-4">
                <div class="card border-left-warning shadow h-100 py-2" id="card-suspek-dirawat">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase">Dirawat Terakhir</div>
                                <div class="text-xs font-weight-bold text-dark mb-1"><span class="date"><?= $suspek['kota']->tanggal ?></span></div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><span id="suspek-dirawat"><?= $suspek['kota']->dirawat ?></span> Orang</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-12 mb-4">
                <div class="card border-left-success shadow h-100 py-2" id="card-suspek-sembuh">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase">Sembuh Terakhir</div>
                                <div class="text-xs font-weight-bold text-dark mb-1"><span class="date"><?= $suspek['kota']->tanggal ?></span></div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><span id="suspek-sembuh"><?= $suspek['kota']->sembuh ?></span> Orang</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-12 mb-4">
                <div class="card border-left-danger shadow h-100 py-2" id="card-suspek-meninggal">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-danger text-uppercase">Meninggal Terakhir</div>
                                <div class="text-xs font-weight-bold text-dark mb-1"><span class="date"><?= $suspek['kota']->tanggal ?></span></div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><span id="suspek-meninggal"><?= $suspek['kota']->meninggal ?></span> Orang</div>
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
        <h6 class="m-0 font-weight-bold">KONFIRMASI COVID19</h6>
    </div>
    <div class="card-body">
        <div class="font-weight-bold text-success text-uppercase mb-1">KABUPATEN PASURUAN</div>
        <div class="row">
            <div class="col-xl-12 col-md-12 mb-2">
                <div class="card border-left-primary shadow h-100 py-2" id="card-konfirmasi">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase">Jumlah Terakhir</div>
                                <div class="text-xs font-weight-bold text-dark mb-1"><span class="date"><?= $konfirmasi['kab']->tanggal ?></span></div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><span id="konfirmasi"><?= $konfirmasi['kab']->jumlah() ?></span> Orang</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-12 mb-4">
                <div class="card border-left-warning shadow h-100 py-2" id="card-konfirmasi-dirawat">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase">Isolasi Terakhir</div>
                                <div class="text-xs font-weight-bold text-dark mb-1"><span class="date"><?= $konfirmasi['kab']->tanggal ?></span></div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><span id="konfirmasi-dirawat"><?= $konfirmasi['kab']->isolasi ?></span> Orang</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-12 mb-4">
                <div class="card border-left-success shadow h-100 py-2" id="card-konfirmasi-sembuh">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase">Sembuh Terakhir</div>
                                <div class="text-xs font-weight-bold text-dark mb-1"><span class="date"><?= $konfirmasi['kab']->tanggal ?></span></div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><span id="konfirmasi-sembuh"><?= $konfirmasi['kab']->sembuh ?></span> Orang</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-12 mb-4">
                <div class="card border-left-danger shadow h-100 py-2" id="card-konfirmasi-meninggal">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-danger text-uppercase">Meninggal Terakhir</div>
                                <div class="text-xs font-weight-bold text-dark mb-1"><span class="date"><?= $konfirmasi['kab']->tanggal ?></span></div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><span id="konfirmasi-meninggal"><?= $konfirmasi['kab']->meninggal ?></span> Orang</div>
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
            <div class="col-xl-12 col-md-12 mb-2">
                <div class="card border-left-primary shadow h-100 py-2" id="card-konfirmasi">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase">Jumlah Terakhir</div>
                                <div class="text-xs font-weight-bold text-dark mb-1"><span class="date"><?= $konfirmasi['kota']->tanggal ?></span></div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><span id="konfirmasi"><?= $konfirmasi['kota']->jumlah() ?></span> Orang</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-12 mb-4">
                <div class="card border-left-warning shadow h-100 py-2" id="card-konfirmasi-dirawat">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase">Isolasi Terakhir</div>
                                <div class="text-xs font-weight-bold text-dark mb-1"><span class="date"><?= $konfirmasi['kota']->tanggal ?></span></div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><span id="konfirmasi-dirawat"><?= $konfirmasi['kota']->isolasi ?></span> Orang</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-12 mb-4">
                <div class="card border-left-success shadow h-100 py-2" id="card-konfirmasi-sembuh">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase">Sembuh Terakhir</div>
                                <div class="text-xs font-weight-bold text-dark mb-1"><span class="date"><?= $konfirmasi['kota']->tanggal ?></span></div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><span id="konfirmasi-sembuh"><?= $konfirmasi['kota']->sembuh ?></span> Orang</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-12 mb-4">
                <div class="card border-left-danger shadow h-100 py-2" id="card-konfirmasi-meninggal">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-danger text-uppercase">Meninggal Terakhir</div>
                                <div class="text-xs font-weight-bold text-dark mb-1"><span class="date"><?= $konfirmasi['kota']->tanggal ?></span></div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><span id="konfirmasi-meninggal"><?= $konfirmasi['kota']->meninggal ?></span> Orang</div>
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