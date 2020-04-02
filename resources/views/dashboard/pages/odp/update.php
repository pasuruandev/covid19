<?php include __DIR__.'/../../layouts/header.php' ?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold">ODP - (Orang Dalam Pantauan)</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-xl-3 col-md-12 mb-4">
                <div class="card border-left-primary shadow h-100 py-2" id="card-odp">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase">Jumlah Terakhir</div>
                                <div class="text-xs font-weight-bold text-dark mb-1"><span id="date"><?= $data->tanggal ?></span></div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><span id="odp"><?= $data->jumlah ?></span> Orang</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-md-12 mb-4">
                <form action="<?= $link_update ?>" method="post" id="form-update">
                    <h6>UPDATE DATA</h6>
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <input type="number" class="form-control" id="jumlah" name="jumlah" value="<?= $data->jumlah ?>"
                                placeholder="Jumlah" aria-label="Jumlah" aria-describedby="button-odp">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit" id="button-odp">Simpan</button>
                            </div>
                        </div>
                    </div>
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
    $_INJECT_JS[] = "<script src='". url('dist/js/pages/odp/update.js') ."'></script>";
?>

<?php include __DIR__.'/../../layouts/footer.php' ?>