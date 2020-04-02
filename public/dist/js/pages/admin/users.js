$(document).ready(function () {
    const table = $('#dataTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: ajax_datatable,
        columns: [{
                data: 'username',
                name: 'username'
            },
            {
                data: 'name',
                name: 'name'
            },
            {
                data: (row, type, val, meta) => {
                    const created = moment(row.created_at, 'YYYY-MM-DD HH:mm:ss');
                    const updated = moment(row.updated_at, 'YYYY-MM-DD HH:mm:ss');
                    return moment.max(created, updated).format('dddd, DD MMMM YYYY HH:mm:ss');
                },
                name: 'updated_at'
            },
            {
                data: (row, type, val, meta) => {
                    return row;
                },
                searchable: false,
                orderable: false
            },
        ],
        columnDefs: [{
            targets: 3,
            render: function (data, type, row, meta) {
                let html = ``;
                // html += `<button data-id="` + row.key + `" class="btn btn-sm btn-primary bt-view"><i class="fa fa-eye"  data-toggle="tooltip" data-placement="top" title="View Data"></i></button>`
                html += `<button data-id="` + row.key + `" class="btn btn-sm btn-warning bt-edit"><i class="fa fa-edit"  data-toggle="tooltip" data-placement="top" title="Edit Data"></i></button>`
                html += `<button data-id="` + row.key + `" class="btn btn-sm btn-danger bt-delete"><i class="fa fa-trash"  data-toggle="tooltip" data-placement="top" title="Delete Data"></i></button>`
                html = `<div class="btn-group">` + html + `</div>`;
                return html;
            }
        }]
    });

    $('#addModal').on('hidden.bs.modal', function (e) {
        $(this).find('input[type="password"]').val('');
    });
    $('#addModal').on('simpan', function (e) {
        $(this).find('.modal-body > .alert').remove();
        const $button = $(this).find('button[type="submit"]');
        $button.loading();
        $.post(ajax_insert, {
            username: $(this).find('#add_username').val(),
            name: $(this).find('#add_name').val(),
            password: $(this).find('#add_password').val(),
            password_confirm: $(this).find('#add_password_confirm').val()
        })
        .done(res => {
            console.log(res);
            $button.loading(false);
            $(this).modal('hide');
            table.ajax.reload();
            $(this).find('input').val('');
        })
        .fail(err => {
            console.error(err);
            $(this).find('.modal-body').prepend(`<div class="alert alert-danger" role="alert">${err.responseText}</div>`);
        })
        .always(() => {
            $button.loading(false);
        });
    });
    $('#addForm').on('submit', function (e) {
        e.preventDefault();
        $('#addModal').trigger('simpan');
    });

    $('#editModal').on('hidden.bs.modal', function (e) {
        $(this).find('input').val('');
    });
    $('#editModal').on('simpan', function (e) {
        $(this).find('.modal-body > .alert').remove();
        const $button = $(this).find('button[type="submit"]');
        $button.loading();
        $.post(ajax_update, {
            key: $('#edit_key').val(),
            username: $(this).find('#edit_username').val(),
            name: $(this).find('#edit_name').val(),
            password: $(this).find('#edit_password').val(),
            password_confirm: $(this).find('#edit_password_confirm').val()
        })
        .done(res => {
            $button.loading(false);
            $(this).modal('hide');
            table.ajax.reload();
        })
        .fail(err => {
            console.error(err);
            $(this).find('.modal-body').prepend(`<div class="alert alert-danger" role="alert">${err.responseText}</div>`);
        })
        .always(() => {
            $button.loading(false);
        });
    });
    $('#editForm').on('submit', function (e) {
        e.preventDefault();
        $('#editModal').trigger('simpan');
    });
    
    $('#deleteModal').on('hidden.bs.modal', function (e) {
        $(this).find('input').val('');
    });
    $('#deleteModal').on('simpan', function (e) {
        $(this).find('.modal-body > .alert').remove();
        const $button = $(this).find('button[type="submit"]');
        $button.loading();
        $.post(ajax_delete, {
            key: $('#delete_key').val()
        })
        .done(res => {
            $button.loading(false);
            $(this).modal('hide');
            table.ajax.reload();
        })
        .fail(err => {
            console.error(err);
            $(this).find('.modal-body').prepend(`<div class="alert alert-danger" role="alert">${err.responseText}</div>`);
        })
        .always(() => {
            $button.loading(false);
        });
    });
    $('#deleteForm').on('submit', function (e) {
        e.preventDefault();
        $('#deleteModal').trigger('simpan');
    });

    table.on('draw', function() {
        $(this).find('.bt-edit').click(function (e) {
            $(this).loading();
            const key = $(this).attr('data-id');
            const modal = $('#editModal');
            $.get(ajax_get + `/${key}`)
            .done(res => {
                console.log(res);
                modal.find('input#edit_key').val(key);
                for (const k in res) {
                    modal.find(`input#edit_${k}`).val(res[k]);
                }
                modal.modal('show');
            })
            .always(() => {
                $(this).loading(false);
            })
        });
        $(this).find('.bt-delete').click(function (e) {
            const key = $(this).attr('data-id');
            const modal = $('#deleteModal');
            modal.find('#delete_key').val(key);
            modal.modal('show');
        });
    });
    
});