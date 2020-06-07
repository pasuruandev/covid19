<?php include __DIR__.'/../../layouts/header.php' ?>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold">ARTICLE</h6>
    </div>
    <div class="card-body">
        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addModal"><i class="fa fa-plus"></i> Add</button>
        <hr>
        <div class="table-responsive">
            <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Judul</th>
                        <th>Content</th>
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
            <form id="addForm" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Tambah Artikel</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title">Judul</label>
                        <input type="text" class="form-control" id="title" required>
                    </div>
                    <div class="form-group">
                        <label for="content">Konten</label>
                        <textarea class="form-control editor" id="content" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="header">Header</label>
                        <input type="file" class="form-control" id="header">
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
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <form id="editForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Artikel</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="edit_key">
                    <div class="form-group">
                        <label for="title">Judul</label>
                        <input type="text" class="form-control" id="title" required>
                    </div>
                    <div class="form-group">
                        <label for="content">Konten</label>
                        <textarea class="form-control editor" id="content" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="header">Header</label>
                        <input type="file" class="form-control" id="header">
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
        const ajax_datatable = `". route('content.article.data') ."`;
        const ajax_get = `". route('content.article.get') ."`;
        const ajax_insert = `". route('content.article.insert') ."`;
        const ajax_update = `". route('content.article.update') ."`;
        const ajax_delete = `". route('content.article.delete') ."`;
    </script>";
    $_INJECT_JS[] = $_SCRIPT;
    $_INJECT_JS[] = '<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>';
    $_INJECT_JS[] = '<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>';
    $_INJECT_JS[] = "<script src='". url('dist/js/pages/content/article.js') ."'></script>";
?>

<?php include __DIR__.'/../../layouts/footer.php' ?>
