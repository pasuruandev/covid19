$(function() {
    const form = $('form#form-update');
    const card_view = $('#card-odp');

    (function () {
        const date = card_view.find('#date');
        const format = moment(date.html(), 'YYYY-MM-DD HH:mm:ss').format('dddd, DD MMMM YYYY HH:mm');
        date.html(format);
    })()
    card_view.on('update', e => {
        $.get(ajax_refresh)
        .done(res => {
            card_view.find('#odp').html(res.jumlah);
            const date = card_view.find('#date');
            const format = moment(res.tanggal, 'YYYY-MM-DD HH:mm:ss').format('dddd, DD MMMM YYYY HH:mm');
            date.html(format);
        })
    })
    
    form.on('submit', e => {
        e.preventDefault();
        const button = form.find('[type="submit"]');
        button.loading();

        $.post(ajax_update, form.serialize())
        .done(res => {
            if (res == 'Success') bootbox.alert("Berhasil Update!");
            else bootbox.alert({
                size: "small",
                title: "Gagal Simpan!",
                message: res.responseText,
                callback: () => { }
            });
            card_view.trigger('update');
        })
        .fail(res => {
            bootbox.alert({
                size: "small",
                title: "Gagal Update!",
                message: res.responseText,
                callback: () => {}
            });
        })
        .always(() => {
            button.loading(false);
        })
    });
});