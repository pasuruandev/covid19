(function() {
    
    const table = $('#dataTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: ajax_datatable,
        columns: [
            {
                data: 'id',
                name: 'id'
            },
            {
                data: 'kecamatan.nama',
                name: 'kecamatan.nama'
            },
            {
                data: 'suspek',
                name: 'suspek'
            },
            {
                data: 'konfirmasi',
                name: 'konfirmasi'
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
        columnDefs: [
            {
                targets: 5,
                render: function (data, type, row, meta) {
                    let html = ``;
                    html += `<button data-id="` + row.key + `" class="btn btn-sm btn-warning bt-edit"><i class="fa fa-edit"  data-toggle="tooltip" data-placement="top" title="Edit Data"></i></button>`
                    html += `<button data-id="` + row.key + `" class="btn btn-sm btn-danger bt-delete"><i class="fa fa-trash"  data-toggle="tooltip" data-placement="top" title="Delete Data"></i></button>`
                    html = `<div class="btn-group">` + html + `</div>`;
                    return html;
                }
            }
        ]
    });
    
    $('#addModal').on('hidden.bs.modal', function (e) {
        $(this).find('form').trigger('reset');
    });

    $('#addModal').on('simpan', function (e) {
        $(this).find('.modal-body > .alert').remove();
        const $button = $(this).find('button[type="submit"]');
        $button.loading();

        var form = new FormData();
        form.append('kecamatan_id', $(this).find('#add_kecamatan').val());
        form.append('suspek', $(this).find('#add_suspek').val());
        form.append('konfirmasi', $(this).find('#add_konfirmasi').val());

        const $this = $(this);
        $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: ajax_insert,
            data: form,
            processData: false,
            contentType: false,
            cache: false,
            success: function (res) {
                $button.loading(false);
                $this.modal('hide');
                table.ajax.reload();
                $this.find('form').trigger('reset');
            },
            error: function (err) {
                console.error(err);
                $this.find('.modal-body').prepend(`<div class="alert alert-danger" role="alert">${err.responseText}</div>`);
                $button.loading(false);
            }
        });
    });

    $('#addForm').on('submit', function (e) {
        e.preventDefault();
        $('#addModal').trigger('simpan');
    });

    $('#editModal').on('hidden.bs.modal', function (e) {
        $(this).find('form').trigger('reset');
    });

    $('#editModal').on('simpan', function (e) {
        $(this).find('.modal-body > .alert').remove();
        const $button = $(this).find('button[type="submit"]');
        $button.loading();

        var form = new FormData();
        form.append('key', $('#edit_key').val());
        form.append('suspek', $(this).find('#edit_suspek').val());
        form.append('konfirmasi', $(this).find('#edit_konfirmasi').val());
        
        const $this = $(this);
        $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: ajax_update,
            data: form,
            processData: false,
            contentType: false,
            cache: false,
            success: function (res) {
                $button.loading(false);
                $this.modal('hide');
                table.ajax.reload();
                $this.find('form').trigger('reset');
            },
            error: function (err) {
                console.error(err);
                $this.find('.modal-body').prepend(`<div class="alert alert-danger" role="alert">${err.responseText}</div>`);
                $button.loading(false);
            }
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
            $(this).find('form').trigger('reset');
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
                modal.find('#namaDaerah').html(res.kecamatan.nama);
                modal.find('input#edit_key').val(key);
                modal.find('input#edit_suspek').val(res.suspek);
                modal.find('input#edit_konfirmasi').val(res.konfirmasi);
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

})();