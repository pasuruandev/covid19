<?php include __DIR__.'/../../layouts/header.php' ?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold">PDP - (Pasien Dalam Pantauan)</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-xl-6 col-md-12 mb-4">
                <div class="card border-left-primary shadow h-100 py-2" id="card-pdp">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase">Jumlah Terakhir</div>
                                <div class="text-xs font-weight-bold text-dark mb-1"><span class="date"><?= $data->tanggal ?></span></div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><span id="pdp"><?= $data->jumlah ?></span> Orang</div>
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
                                <div class="text-xs font-weight-bold text-dark mb-1"><span class="date"><?= $data->tanggal ?></span></div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><span id="pdp-negative"><?= $data->negatif ?></span> Orang</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-md-12 mb-4">
                <form action="<?= $link_update ?>" method="post" id="form-update">
                    <h6>UPDATE DATA</h6>
                    <div class="row">
                        <div class="col-xl-6 col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold text-primary" for="jumlah">Jumlah</label>
                                <input type="number" class="form-control" id="jumlah" name="jumlah" value="<?= $data->jumlah ?>"
                                    placeholder="Jumlah" aria-label="Jumlah" aria-describedby="button-pdp">
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6">
                            <div class="form-group">
                                <label class="font-weight-bold text-success" for="negatif">Negative</label>
                                <input type="number" class="form-control" id="negatif" name="negatif" value="<?= $data->negatif ?>"
                                    placeholder="Jumlah" aria-label="Jumlah" aria-describedby="button-pdp">
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit" id="button-pdp">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
    $_INJECT_JS = [];
    $_SCRIPT =
    "<script>
        const ajax_update = `". $link_update ."`;
        const ajax_refresh = `". $link_refresh ."`;
    </script>";
    $_INJECT_JS[] = $_SCRIPT;
    $_INJECT_JS[] = "<script src='". url('dist/js/pages/pdp/update.js') ."'></script>";
?>

<?php include __DIR__.'/../../layouts/footer.php' ?>