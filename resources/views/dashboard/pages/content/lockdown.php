<?php include __DIR__.'/../../layouts/header.php' ?>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold">LOCKDOWN</h6>
    </div>
    <div class="card-body">
        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addModal"><i class="fa fa-plus"></i> Add</button>
        <hr>
        <div class="table-responsive">
            <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Tipe Lokasi</th>
                        <th>Lokasi</th>
                        <th>Alamat</th>
                        <th>Waktu</th>
                        <th>Log Time</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel"
    aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="addForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Tambah Lokasi</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="tipe">Tipe</label>
                        <select class="custom-select" id="add_tipe"  required>
                            <option value="U">Fasilitas umum</option>
                            <option value="J">Jalan</option>
                            <option value="M">Masjid</option>
                            <option value="G">Gereja</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="lokasi">Lokasi</label>
                        <input type="text" class="form-control" id="add_lokasi" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" id="add_alamat" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Waktu</label>
                        <input type="hidden" name="input_waktu" id="add_waktu" value="[]">
                        <ul class="list-group mb-3 list-waktu">
                        </ul>
                        <a data-toggle="collapse" href="#addCollapseWaktu" role="button" aria-expanded="false" aria-controls="addCollapseWaktu">Tambah Waktu</a>
                        <div class="rounded collapse" id="addCollapseWaktu">
                            <div class="form-group">
                                <label for="add_tipe">Tipe</label>
                                <div class="input-group mb-2">
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" name="tipe_lockdown" id="add_tipe_lockdown_i" value="I">
                                        <label class="custom-control-label" for="add_tipe_lockdown_i">Interval</label>
                                    </div>
                                    <div class="mr-2 ml-2 text-warning font-weight-bold">atau</div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" name="tipe_lockdown" id="add_tipe_lockdown_s" value="S">
                                        <label class="custom-control-label" for="add_tipe_lockdown_s">Spesifik</label>
                                    </div>
                                </div>
                            </div>
                            <div class="waktu-box" prefix="waktu_i">
                                <div class="form-group">
                                    <label for="add_hari">Hari</label>
                                    <select class="custom-select" name="hari" id="add_hari" multiple size="3">
                                        <option value="senin">Senin</option>
                                        <option value="selasa">Selasa</option>
                                        <option value="rabu">Rabu</option>
                                        <option value="kamis">Kamis</option>
                                        <option value="jumat">Jum'at</option>
                                        <option value="sabtu">Sabtu</option>
                                        <option value="minggu">Minggu</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="add_jam">Jam</label>
                                    <div class="input-group input-timerange" id="add_jam">
                                        <input type="text" class="form-control" name="i_jam_awal" id="add_i_jam_awal" data-toggle="datetimepicker" data-target="#add_i_jam_awal">
                                        <div class="input-group-append">
                                            <span class="input-group-text">-</span>
                                        </div>
                                        <input type="text" class="form-control" name="i_jam_akhir" id="add_i_jam_akhir" data-toggle="datetimepicker" data-target="#add_i_jam_akhir">
                                    </div>
                                    <small class="form-text text-muted">Kosongi untuk seharian penuh.</small>
                                </div>
                            </div>
                            <div class="waktu-box" prefix="waktu_s">
                                <div class="form-group">
                                    <label for="add_tgl">Tanggal</label>
                                    <div class="input-group input-daterange" id="add_tgl">
                                        <input type="text" class="form-control" name="s_tgl_awal" id="add_s_tgl_awal" data-toggle="datetimepicker" data-target="#add_s_tgl_awal">
                                        <div class="input-group-append">
                                            <span class="input-group-text">-</span>
                                        </div>
                                        <input type="text" class="form-control" name="s_tgl_akhir" id="add_s_tgl_akhir" data-toggle="datetimepicker" data-target="#add_s_tgl_akhir">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="add_jam">Jam</label>
                                    <div class="input-group input-timerange" id="add_jam">
                                        <input type="text" class="form-control" name="s_jam_awal" id="add_s_jam_awal" data-toggle="datetimepicker" data-target="#add_s_jam_awal">
                                        <div class="input-group-append">
                                            <span class="input-group-text">-</span>
                                        </div>
                                        <input type="text" class="form-control" name="s_jam_akhir" id="add_s_jam_akhir" data-toggle="datetimepicker" data-target="#add_s_jam_akhir">
                                    </div>
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="button" class="btn btn-sm btn-success bt-tambah-waktu">Tambahkan</button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea class="form-control" id="add_deskripsi"></textarea>
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

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
    aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="editForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Lokasi</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="edit_key">
                    <div class="form-group">
                        <label for="tipe">Tipe</label>
                        <select class="custom-select" id="edit_tipe"  required>
                            <option value="U">Fasilitas umum</option>
                            <option value="J">Jalan</option>
                            <option value="M">Masjid</option>
                            <option value="G">Gereja</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="lokasi">Lokasi</label>
                        <input type="text" class="form-control" id="edit_lokasi" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" id="edit_alamat" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Waktu</label>
                        <input type="hidden" name="input_waktu" id="edit_waktu" value="[]">
                        <ul class="list-group mb-3 list-waktu">
                        </ul>
                        <a data-toggle="collapse" href="#addCollapseWaktu" role="button" aria-expanded="false" aria-controls="addCollapseWaktu">Tambah Waktu</a>
                        <div class="rounded collapse" id="addCollapseWaktu">
                            <div class="form-group">
                                <label for="edit_tipe">Tipe</label>
                                <div class="input-group mb-2">
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" name="tipe_lockdown" id="edit_tipe_lockdown_i" value="I">
                                        <label class="custom-control-label" for="edit_tipe_lockdown_i">Interval</label>
                                    </div>
                                    <div class="mr-2 ml-2 text-warning font-weight-bold">atau</div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" name="tipe_lockdown" id="edit_tipe_lockdown_s" value="S">
                                        <label class="custom-control-label" for="edit_tipe_lockdown_s">Spesifik</label>
                                    </div>
                                </div>
                            </div>
                            <div class="waktu-box" prefix="waktu_i">
                                <div class="form-group">
                                    <label for="edit_hari">Hari</label>
                                    <select class="custom-select" name="hari" id="edit_hari" multiple size="3">
                                        <option value="senin">Senin</option>
                                        <option value="selasa">Selasa</option>
                                        <option value="rabu">Rabu</option>
                                        <option value="kamis">Kamis</option>
                                        <option value="jumat">Jum'at</option>
                                        <option value="sabtu">Sabtu</option>
                                        <option value="minggu">Minggu</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="edit_jam">Jam</label>
                                    <div class="input-group input-timerange" id="edit_jam">
                                        <input type="text" class="form-control" name="i_jam_awal" id="edit_i_jam_awal" data-toggle="datetimepicker" data-target="#edit_i_jam_awal">
                                        <div class="input-group-append">
                                            <span class="input-group-text">-</span>
                                        </div>
                                        <input type="text" class="form-control" name="i_jam_akhir" id="edit_i_jam_akhir" data-toggle="datetimepicker" data-target="#edit_i_jam_akhir">
                                    </div>
                                    <small class="form-text text-muted">Kosongi untuk seharian penuh.</small>
                                </div>
                            </div>
                            <div class="waktu-box" prefix="waktu_s">
                                <div class="form-group">
                                    <label for="edit_tgl">Tanggal</label>
                                    <div class="input-group input-daterange" id="edit_tgl">
                                        <input type="text" class="form-control" name="s_tgl_awal" id="edit_s_tgl_awal" data-toggle="datetimepicker" data-target="#edit_s_tgl_awal">
                                        <div class="input-group-append">
                                            <span class="input-group-text">-</span>
                                        </div>
                                        <input type="text" class="form-control" name="s_tgl_akhir" id="edit_s_tgl_akhir" data-toggle="datetimepicker" data-target="#edit_s_tgl_akhir">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="edit_jam">Jam</label>
                                    <div class="input-group input-timerange" id="edit_jam">
                                        <input type="text" class="form-control" name="s_jam_awal" id="edit_s_jam_awal" data-toggle="datetimepicker" data-target="#edit_s_jam_awal">
                                        <div class="input-group-append">
                                            <span class="input-group-text">-</span>
                                        </div>
                                        <input type="text" class="form-control" name="s_jam_akhir" id="edit_s_jam_akhir" data-toggle="datetimepicker" data-target="#edit_s_jam_akhir">
                                    </div>
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="button" class="btn btn-sm btn-success bt-tambah-waktu">Tambahkan</button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea class="form-control" id="edit_deskripsi"></textarea>
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



<?php
    $_INJECT_JS = [];
    $_SCRIPT =
    "<script>
        const ajax_datatable = `". route('content.lockdown.data') ."`;
        const ajax_get = `". route('content.lockdown.get') ."`;
        const ajax_insert = `". route('content.lockdown.insert') ."`;
        const ajax_update = `". route('content.lockdown.update') ."`;
        const ajax_delete = `". route('content.lockdown.delete') ."`;
    </script>";
    $_INJECT_JS[] = $_SCRIPT;
    $_INJECT_JS[] = "<script src='". url('dist/js/pages/content/lockdown.js') ."'></script>";
?>

<?php include __DIR__.'/../../layouts/footer.php' ?>