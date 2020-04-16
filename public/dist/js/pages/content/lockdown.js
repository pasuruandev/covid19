$(function() {
    // init waktu input
    $('.waktu-box input[type="text"], .waktu-box select').attr('disabled', true);
    
    $('input[name="tipe_lockdown"]').on('change', function() {
        const $this = $(this);
        const value = $this.val();
        if (value == "I") {
            // open $this form
            $this.closest('form').find('.waktu-box[prefix="waktu_i"]').show().find('input[type="text"], select').removeAttr('disabled');
            // disabled other
            $this.closest('form').find('.waktu-box[prefix="waktu_s"]').hide().find('input[type="text"], select').attr('disabled', true);
        } else if (value == "S") {
            // open $this form
            $this.closest('form').find('.waktu-box[prefix="waktu_s"]').show().find('input[type="text"], select').removeAttr('disabled');
            // disabled other
            $this.closest('form').find('.waktu-box[prefix="waktu_i"]').hide().find('input[type="text"], select').attr('disabled', true);
        }
    });

    // start default with internal waktu input
    $('#add_tipe_lockdown_i, #edit_tipe_lockdown_i').prop('checked', true).trigger('change');

    $('#addCollapseWaktu, #editCollapseWaktu').on('reset', function (e) {
        $(this).find('input[type="text"], select').val('');
    });
    $('.list-waktu').on('render', function (e) {
        const $self = $(this);
        const $input = $self.closest('.modal').find('input[name="input_waktu"]');
        const value = JSON.parse($input.val());
        $self.html("");
        for (let k in value) {
            let v = value[k];
            let comp = $("<li>").addClass('list-group-item')
                        .html(`<a href="#" class="float-right text-danger hapus-waktu" data-key="${k}"><i class="fa fa-times"></i></a>`);
            if (v.tipe == 'I') {
                let hari = render_hari(v.hari);
                let jam = "Seharian Penuh";
                if (v.jam_awal != null && v.jam_awal != "") jam = moment(v.jam_awal, 'HH:mm:ss').format('HH:mm') + ' - ' + moment(v.jam_akhir, 'HH:mm:ss').format('HH:mm');
                comp.append($('<b>').html(hari + ' ' + jam));
            } else {
                let tgl = moment(v.tgl_awal, 'YYYY-MM-DD').format('dddd, DD MMMM YYYY');
                if (v.tgl_awal != v.tgl_akhir) tgl += ' - ' + moment(v.tgl_akhir, 'YYYY-MM-DD').format('dddd, DD MMMM YYYY');
                let jam = "Seharian Penuh";
                if (v.jam_awal != null && v.jam_awal != "") jam = moment(v.jam_awal, 'HH:mm:ss').format('HH:mm') + ' - ' + moment(v.jam_akhir, 'HH:mm:ss').format('HH:mm');
                comp.append($('<b>').html(tgl + ' ' + jam));
            }
            $self.append(comp);
        }
        $self.find('.hapus-waktu').click(function(e) {
            const key = parseInt($(this).attr('data-key'));
            const value = JSON.parse($input.val());
            value.splice(key, 1);
            $input.val(JSON.stringify(value));
            $self.trigger('render');
        });
    });
    $('#addModal, #editModal').find('.bt-tambah-waktu').click(function () {
        const $modal = $(this).closest('.modal');
        const $input = $modal.find('input[name="input_waktu"]');
        const $collapse = $modal.find('.collapse');
        const $list = $modal.find('.list-waktu');
        let value = JSON.parse($input.val());

        let waktu = {
            tipe: $modal.find('input[name="tipe_lockdown"]:checked').val()
        }
        if (waktu.tipe == 'I') {
            const selected_days = $modal.find('select[name="hari"]').val();
            const days = ['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'minggu'];
            let add_hari = "";
            for (const day of days) {
                if (selected_days.includes(day)) add_hari += 'Y';
                else add_hari += "-";
            }
            waktu.hari = add_hari.includes('-') ? add_hari : '*';
            waktu.jam_awal = $modal.find('input[name="i_jam_awal"]').val();
            waktu.jam_akhir = $modal.find('input[name="i_jam_akhir"]').val();
        } else if (waktu.tipe == 'S') {
            waktu.tgl_awal = moment($modal.find('input[name="s_tgl_awal"]').val(), 'DD/MM/YYYY').format('YYYY-MM-DD');
            waktu.tgl_akhir = moment($modal.find('input[name="s_tgl_akhir"]').val(), 'DD/MM/YYYY').format('YYYY-MM-DD');
            waktu.jam_awal = $modal.find('input[name="s_jam_awal"]').val();
            waktu.jam_akhir = $modal.find('input[name="s_jam_akhir"]').val();
        }
        value.push(waktu);
        $input.val(JSON.stringify(value));
        $collapse.trigger('reset').collapse('hide');
        $list.trigger('render');
    });
});

$(function () {
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
                data: 'tipe_lokasi',
                name: 'tipe_lokasi'
            },
            {
                data: 'lokasi',
                name: 'lokasi'
            },
            {
                data: 'alamat',
                name: 'alamat'
            },
            {
                data: (row, type, val, meta) => {
                    return row;
                }
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
                targets: 1,
                render: function (data, type, row, meta) {
                    const tipe_lokasi = {
                        U: 'Fasilitas Umum',
                        J: 'Jalan',
                        M: 'Masjid',
                        G: 'Gereja'
                    }
                    return tipe_lokasi[data];
                }
            },
            {
                targets: 4,
                render: function (data, type, row, meta) {
                    let comp = $('<ul>');
                    for(let waktu of row.waktu) {
                        if (waktu.tipe == 'I') {
                            let hari = render_hari(waktu.hari);
                            let jam = "Seharian Penuh";
                            if (waktu.jam_awal != null) jam = moment(waktu.jam_awal, 'HH:mm:ss').format('HH:mm') + ' - ' + moment(waktu.jam_akhir, 'HH:mm:ss').format('HH:mm');
                            comp.append($('<li>').html(hari + ' ' + jam));
                        } else {
                            let tgl = moment(waktu.tgl_awal, 'YYYY-MM-DD').format('dddd, DD MMMM YYYY');
                            if (waktu.tgl_awal != waktu.tgl_akhir) tgl += ' - ' + moment(waktu.tgl_akhir, 'YYYY-MM-DD').format('dddd, DD MMMM YYYY');
                            let jam = "Seharian Penuh";
                            if (waktu.jam_awal != null) jam = moment(waktu.jam_awal, 'HH:mm:ss').format('HH:mm') + ' - ' + moment(waktu.jam_akhir, 'HH:mm:ss').format('HH:mm');
                            comp.append($('<li>').html(tgl + ' ' + jam));
                        }
                        return comp.prop('outerHTML');
                    }
                }
            },
            {
                targets: 6,
                render: function (data, type, row, meta) {
                    let html = ``;
                    // html += `<button data-id="` + row.key + `" class="btn btn-sm btn-primary bt-view"><i class="fa fa-eye"  data-toggle="tooltip" data-placement="top" title="View Data"></i></button>`
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
    $('#addModal').on('simpan', function (e) {
        $(this).find('.modal-body > .alert').remove();
        const $button = $(this).find('button[type="submit"]');
        $button.loading();
        $.post(ajax_insert, {
            tipe_lokasi: $(this).find('#add_tipe').val(),
            lokasi: $(this).find('#add_lokasi').val(),
            alamat: $(this).find('#add_alamat').val(),
            tipe_lockdown: $(this).find('input#add_tipe_lockdown_i').is(':checked') ? 'I' : 'S',
            deskripsi: $(this).find('#add_deskripsi').val(),
            waktu: $(this).find('input[name="input_waktu"]').val()
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
        $(this).find('form').trigger('reset');
        $('#edit_tipe_lockdown_i').prop('checked', true).trigger('change');
        $('input[name="input_waktu"]').val('[]');
        $(this).find('.list-waktu').trigger('render');
    });
    $('#editModal').on('simpan', function (e) {
        $(this).find('.modal-body > .alert').remove();
        const $button = $(this).find('button[type="submit"]');
        $button.loading();
        $.post(ajax_update, {
            key: $('#edit_key').val(),
            tipe_lokasi: $(this).find('#edit_tipe').val(),
            lokasi: $(this).find('#edit_lokasi').val(),
            alamat: $(this).find('#edit_alamat').val(),
            tipe_lockdown: $(this).find('input#edit_tipe_lockdown_i').is(':checked') ? 'I' : 'S',
            deskripsi: $(this).find('#edit_deskripsi').val(),
            waktu: $(this).find('input[name="input_waktu"]').val()
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
                modal.find('input#edit_key').val(key);
                modal.find('select#edit_tipe').val(res.tipe_lokasi);
                for (const k in res) {
                    modal.find(`input#edit_${k}, textarea#edit_${k}`).val(res[k]);
                    modal.find(`textarea#edit_${k}`).val(res[k]);
                }
                let waktu = JSON.stringify(res.waktu);
                modal.find('input#edit_waktu').val(waktu);
                modal.find('.list-waktu').trigger('render');

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