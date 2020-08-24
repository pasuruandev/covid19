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
                                <th>Id</th>
                                <th>Kecamatan</th>
                                <th>Suspek</th>
                                <th>Konfirmasi</th>
                                <th>Log Time</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>

                    <!-- modal edit -->
                    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
                        aria-hidden="true" data-backdrop="static" data-keyboard="false">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <form id="editForm">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel">Persebaran Covid <span id="namaDaerah">Purwodadi</span></h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body row">
                                        <input type="hidden" id="edit_key">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="edit_suspek">Suspek</label>
                                                <input type="number" class="form-control" id="edit_suspek" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label for="edit_konfirmasi">Konfirmasi</label>
                                                <input type="number" class="form-control" id="edit_konfirmasi" required>
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
                                <form id="addForm" method="post" action="add_maps">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addModalLabel">Tambah Data Persebaran</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body row"> 
                                        <div class="col-md-12">
                                            <label for="add_kecamatan">Nama Kecamatan</label>
                                            <select id="add_kecamatan" class="form-control">
                                            <?php foreach($kecamatans as $key => $value): ?>
                                            <option value="<?=$value['id']?>"><?=$value['nama']?></option>
                                            <?php endforeach; ?>
                                            </select>
                                            <br>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="add_suspek">Suspek</label>
                                                <input type="number" class="form-control" id="add_suspek" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label for="add_konfirmasi">Konfirmasi</label>
                                                <input type="number" class="form-control" id="add_konfirmasi" required>
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

                    <!-- modal delete -->
                    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
                        aria-hidden="true" data-backdrop="static" data-keyboard="false">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form id="deleteForm">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel">Delete User</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" id="delete_key">
                                        Yakin Hapus ?
                                    </div>
                                    <div class="modal-footer text-right">
                                        <button class="btn btn-secondary pull-left" type="button" data-dismiss="modal">Batal</button>
                                        <button class="btn btn-danger" type="submit">Hapus</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- end of modal delete -->
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    $_INJECT_JS = [];
    $_SCRIPT =
    "<script>
        const ajax_datatable = `". $AJAX['datatable'] ."`;
        const ajax_get = `". $AJAX['get'] ."`;
        const ajax_insert = `". $AJAX['insert'] ."`;
        const ajax_update = `". $AJAX['update'] ."`;
        const ajax_delete = `". $AJAX['delete'] ."`;
    </script>";
    $_INJECT_JS[] = $_SCRIPT;
    $_INJECT_JS[] = "<script src='". url('dist/js/pages/map/script.js') ."'></script>";
?>

<?php include __DIR__.'/../../layouts/footer.php' ?>