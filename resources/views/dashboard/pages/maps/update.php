<?php include __DIR__.'/../../layouts/header.php' ?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold">MAP PERSEBARAN</h6>        
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <button class="btn btn-primary" data-toggle="modal" data-target="#addModal"> Tambah Kecamatan Persebaran</button>
                <br><br>
            </div>
            <div class="col-xl-12 col-md-12 ">
                <div class="table-responsive">
                    <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>Kecamatan</th>
                                <th>ODP</th>
                                <th>PDP</th>
                                <th>Positif</th>
                                <th>Log Time</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 0;
                                foreach($mapdata as $data){
                                    $no++;
                            ?>
                                <tr>
                                   <td><?= $no ?></td> 
                                   <td><?= $data->nama; ?></td> 
                                   <td><?= $data->odp; ?></td> 
                                   <td><?= $data->pdp; ?></td> 
                                   <td><?= $data->positif; ?></td> 
                                   <td><?= date('d F Y', strtotime($data->last_up   )) ?></td>
                                   <td>
                                        <div class="btn-group">
                                            <button class="btn btn-warning btnEdit"                                             
                                            data-kecamatan="<?=$data->nama?>" 
                                            data-odp="<?=$data->odp?>" 
                                            data-pdp="<?=$data->pdp?>" 
                                            data-positif="<?=$data->positif?>" 
                                            data-id="<?=$data->idmap?>" 
                                            data-toggle="modal" data-target="#editModal"><span class="fa fa-edit"></span></button>
                                            <a href="hapus_maps/<?=$data->idmap?>" class="btn btn-danger"><span class="fa fa-trash"></span></a>
                                        </div>
                                   </td> 
                                </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                    </table>

                    <!-- modal edit -->
                    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
                        aria-hidden="true" data-backdrop="static" data-keyboard="false">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <form id="editForm" method="post" action="edit_maps">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel">Persebaran Covid <span id="namaDaerah">Purwodadi</span></h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body row">
                                        <div class="col-md-4">
                                            <input type="hidden" name="id" id="edit_key">                                        
                                            <div class="form-group">
                                                <label for="lokasi">ODP</label>
                                                <input type="text" class="form-control" name="odp_lokasi" id="odp_lokasi" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="lokasi">PDP</label>
                                                <input type="text" class="form-control" name="pdp_lokasi" id="pdp_lokasi" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="lokasi">POSITIF</label>
                                                <input type="text" class="form-control" name="positif_lokasi" id="positif_lokasi" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer text-right">
                                        <button class="btn btn-secondary pull-left" type="button" data-dismiss="modal">Batal</button>
                                        <button class="btn btn-primary" type="submit">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- end of modal edit -->
                    <!-- modal add -->
                    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel"
                        aria-hidden="true" data-backdrop="static" data-keyboard="false">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <form id="editForm" method="post" action="add_maps">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addModalLabel">Tambah Data Persebaran</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body row"> 
                                        <div class="col-md-12">
                                            <label for="kecamatan">Nama Kecamatan</label>
                                            <select name="kecamatan" id="kecamatan" class="form-control">
                                                <?php
                                                    foreach($kecamatan as $datak){
                                                ?>
                                                    <option value="<?= $datak->id?>"><?=$datak->nama?></option>
                                                <?php
                                                    }
                                                ?>
                                            </select>
                                            <br>
                                        </div>
                                        <div class="col-md-4">                                                                                 
                                            <div class="form-group">
                                                <label for="lokasi">ODP</label>
                                                <input type="number" class="form-control" name="odp_lokasi"required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="lokasi">PDP</label>
                                                <input type="number" class="form-control" name="pdp_lokasi" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="lokasi">POSITIF</label>
                                                <input type="number" class="form-control" name="positif_lokasi" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer text-right">
                                        <button class="btn btn-secondary pull-left" type="button" data-dismiss="modal">Batal</button>
                                        <button class="btn btn-primary" type="submit">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- end of modal add-->
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    // $_INJECT_JS = [];
    // $_SCRIPT =
    // "<script>
    //     const ajax_update = `". $link_update ."`;
    //     const ajax_refresh = `". $link_refresh ."`;
    // </script>";
    // $_INJECT_JS[] = $_SCRIPT;
    // $_INJECT_JS[] = "<script src='". url('dist/js/pages/odp/update.js') ."'></script>";
?>

<?php include __DIR__.'/../../layouts/footer.php' ?>
<script>
    $("#dataTable").dataTable();
    $(".btnEdit").click(function(){
        let kecam = $(this).data('kecamatan');
        let odp = $(this).data("odp");
        let pdp = $(this).data("pdp");
        let positif = $(this).data("positif");
        let myid = $(this).data("id");
        $("#namaDaerah").text(kecam);
        $("#odp_lokasi").val(odp);
        $("#pdp_lokasi").val(pdp);
        $("#positif_lokasi").val(positif);
        $("#edit_key").val(myid);
    });
</script>