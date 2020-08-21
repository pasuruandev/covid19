$(function() {
    const form = $('form#form-update');
    const card_view = $('#card-suspek');
    const card_view_dirawat = $('#card-suspek-dirawat');
    const card_view_sembuh = $('#card-suspek-sembuh');
    const card_view_meninggal = $('#card-suspek-meninggal');

    (function () {
        var date = card_view.find('.date');
        var format = moment(date.html(), 'YYYY-MM-DD HH:mm:ss').format('dddd, DD MMMM YYYY HH:mm');
        date.html(format);

        var date = card_view_dirawat.find('.date');
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
            card_view.find('#suspek').html(res.jumlah);
            var date = card_view.find('.date');
            var format = moment(res.tanggal, 'YYYY-MM-DD HH:mm:ss').format('dddd, DD MMMM YYYY HH:mm');
            date.html(format);

            card_view_dirawat.find('#suspek-dirawat').html(res.dirawat);
            var date = card_view_dirawat.find('.date');
            var format = moment(res.tanggal, 'YYYY-MM-DD HH:mm:ss').format('dddd, DD MMMM YYYY HH:mm');
            date.html(format);

            card_view_sembuh.find('#suspek-sembuh').html(res.sembuh);
            var date = card_view_sembuh.find('.date');
            var format = moment(res.tanggal, 'YYYY-MM-DD HH:mm:ss').format('dddd, DD MMMM YYYY HH:mm');
            date.html(format);

            card_view_meninggal.find('#suspek-meninggal').html(res.meninggal);
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