<?php include __DIR__.'/../../layouts/header.php' ?>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold">PERMISSIONS</h6>
    </div>
    <div class="card-body">
        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addModal"><i class="fa fa-plus"></i> Add</button>
        <hr>
        <div class="table-responsive">
            <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Menu</th>
                        <th>Allows</th>
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
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="addForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Tambah Permissions</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <select class="custom-select" id="add_username">
                            <option selected>Open this select menu</option>
                            <?php foreach($users as $key => $user): ?>
                            <option value="<?= $user['username'] ?>"><?= $user['username'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="menu">Menu</label>
                        <select class="custom-select" id="add_menu">
                            <option selected>Open this select menu</option>
                            <?php foreach($menus as $key => $menu): ?>
                            <option value="<?= $menu['key'] ?>"><?= '('.$menu['key'].') '.$menu['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="allows">Allows</label>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="add_view">
                            <label class="custom-control-label" for="add_view">View</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="add_edit">
                            <label class="custom-control-label" for="add_edit">Edit</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="add_delete">
                            <label class="custom-control-label" for="add_delete">Delete</label>
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

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
    aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="editForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Permissions</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="edit_key">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <select class="custom-select" id="edit_username">
                            <option selected>Open this select menu</option>
                            <?php foreach($users as $key => $user): ?>
                            <option value="<?= $user['username'] ?>"><?= $user['username'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="menu">Menu</label>
                        <select class="custom-select" id="edit_menu">
                            <option selected>Open this select menu</option>
                            <?php foreach($menus as $key => $menu): ?>
                            <option value="<?= $menu['key'] ?>"><?= '('.$menu['key'].') '.$menu['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="allows">Allows</label>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="edit_view">
                            <label class="custom-control-label" for="edit_view">View</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="edit_edit">
                            <label class="custom-control-label" for="edit_edit">Edit</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="edit_delete">
                            <label class="custom-control-label" for="edit_delete">Delete</label>
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

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
    aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="deleteForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Delete Permissions</h5>
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
        const ajax_datatable = `". route('admin.permissions.data') ."`;
        const ajax_get = `". route('admin.permissions.get') ."`;
        const ajax_insert = `". route('admin.permissions.insert') ."`;
        const ajax_update = `". route('admin.permissions.update') ."`;
        const ajax_delete = `". route('admin.permissions.delete') ."`;
    </script>";
    $_INJECT_JS[] = $_SCRIPT;
    $_INJECT_JS[] = "<script src='". url('dist/js/pages/admin/permissions.js') ."'></script>";
?>

<?php include __DIR__.'/../../layouts/footer.php' ?>