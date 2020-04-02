$(function() {
    const form = $('form#form-update');
    const card_view = $('#card-positif');
    const card_view_sembuh = $('#card-positif-sembuh');
    const card_view_meninggal = $('#card-positif-meninggal');

    (function () {
        var date = card_view.find('.date');
        var format = moment(date.html(), 'YYYY-MM-DD HH:mm:ss').format('dddd, DD MMMM YYYY HH:mm');
        date.html(format);

        var date = card_view_sembuh.find('.date');
        var format = moment(date.html(), 'YYYY-MM-DD HH:mm:ss').format('dddd, DD MMMM YYYY HH:mm');
        date.html(format);

        var date = card_view_meninggal.find('.date');
        var format = moment(date.html(), 'YYYY-MM-DD HH:mm:ss').format('dddd, DD MMMM YYYY HH:mm');
        date.html(format);
    })()
    card_view.on('update', e => {
        $.get(ajax_refresh)
        .done(res => {
            card_view.find('#positif').html(res.jumlah);
            var date = card_view.find('.date');
            var format = moment(res.tanggal, 'YYYY-MM-DD HH:mm:ss').format('dddd, DD MMMM YYYY HH:mm');
            date.html(format);

            card_view_sembuh.find('#positif-sembuh').html(res.sembuh);
            var date = card_view_sembuh.find('.date');
            var format = moment(res.tanggal, 'YYYY-MM-DD HH:mm:ss').format('dddd, DD MMMM YYYY HH:mm');
            date.html(format);

            card_view_meninggal.find('#positif-meninggal').html(res.meninggal);
            var date = card_view_meninggal.find('.date');
            var format = moment(res.tanggal, 'YYYY-MM-DD HH:mm:ss').format('dddd, DD MMMM YYYY HH:mm');
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