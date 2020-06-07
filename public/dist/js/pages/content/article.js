$(function () {
    /*
    $('.editor').summernote({
        placeholder: '',
        tabsize: 2,
        height: 100
    });
    */

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
                data: 'title',
                name: 'title'
            },
            {
                data: (row, type, val, meta) => {
                    const content = row.content;
                    return content.substring(1, 150);
                },
                name: 'content'
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
                targets: 4,
                render: function (data, type, row, meta) {
                    let html = ``;
                    html += `<button data-id="` + row.id + `" class="btn btn-sm btn-primary bt-view"><i class="fa fa-eye"  data-toggle="tooltip" data-placement="top" title="View Data"></i></button>`
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
        $('#add_tipe_lockdown_i').prop('checked', true).trigger('change');
        $('input[name="input_waktu"]').val('[]');
        $(this).find('.list-waktu').trigger('render');
    });

    $('#addModal').on('show.bs.modal', function (e) {
        ($(this).find('textarea#content')).summernote({
            placeholder: '',
            tabsize: 2,
            height: 100
        });
    });

    $('#addModal').on('simpan', function (e) {
        $(this).find('.modal-body > .alert').remove();
        const $button = $(this).find('button[type="submit"]');
        $button.loading();

        const file = $(this).find('#header')[0].files[0];
        var form = new FormData();
        form.append('title', $(this).find('#title').val());
        form.append('content', $(this).find('#content').val());
        if (file) form.append('header', file);

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
                $this.find('input').val('');
            },
            error: function (err) {
                console.error(err);
                $this.find('.modal-body').prepend(`<div class="alert alert-danger" role="alert">${err.responseText}</div>`);
            }
        });
    });

    $('#addForm').on('submit', function (e) {
        e.preventDefault();
        $('#addModal').trigger('simpan');
    });

    $('#editModal').on('hidden.bs.modal', function (e) {
        $(this).find('form').trigger('reset');
        $('#edit_tipe_lockdown_i').prop('checked', true).trigger('change');
        $('input[name="input_waktu"]').val('[]');
        $(this).find('.list-waktu').trigger('render');
    });

    $('#editModal').on('simpan', function (e) {
        $(this).find('.modal-body > .alert').remove();
        const $button = $(this).find('button[type="submit"]');
        $button.loading();

        const file = $(this).find('#header')[0].files[0];
        var form = new FormData();
        form.append('key', $('#edit_key').val());
        form.append('title', $(this).find('#title').val());
        form.append('content', $(this).find('#content').val());
        if (file) form.append('header', file);
        
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
            },
            error: function (err) {
                console.error(err);
                $this.find('.modal-body').prepend(`<div class="alert alert-danger" role="alert">${err.responseText}</div>`);
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
                modal.find('input#edit_key').val(key);
                modal.find('input#title').val(res.title);
                modal.find('textarea#content').html(res.content);
                modal.modal('show');
                (modal.find('textarea#content')).summernote({
                    placeholder: '',
                    tabsize: 2,
                    height: 500
                });
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

        $(this).find('.bt-view').click(function (e) {
            const key = $(this).attr('data-id');
            window.open('/article/'+ key, '_blank');
        });
    });
    
});
