function render_hari(hari) {
    if (hari == '*') return 'Setiap Hari';

    const days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];

    if (hari.match(/(Y(-+)Y)/g)) {
        if (hari.match(/(Y(-+)(Y+)(-+))/g)) {
            // hari satu satu
            let result = [];
            for (let i = 0; i < hari.length; i++) {
                const element = hari[i];
                if (element == 'Y') result.push(days[i]);
            }
            return result.join(', ');
        }

        if (hari.charAt(0) == 'Y' && hari.charAt(hari.length - 1) == 'Y') {
            // sambung minggu berikutnya
            let result = [];
            for (let i = 0; i < hari.length; i++) {
                const element = hari[i];
                const next = (i + 1 < hari.length) ? hari[i + 1] : null;
                const prev = (i - 1 > -1) ? hari[i - 1] : null;
                if ((element == 'Y' && next == '-') || (element == 'Y' && prev == '-')) result.unshift(days[i]);
            }
            return result.join(' - ');
        }
    }

    // hari awal dan hari akhir saja
    let result = ["", ""];
    let min = hari.length;
    let max = 0;
    for (let i = 0; i < hari.length; i++) {
        const element = hari[i];
        if (element == 'Y') {
            if (i <= min) {
                result[0] = days[i];
                min = i;
            }
            if (i >= max) {
                result[1] = days[i];
                max = i;
            }
        }
    }
    return result.join(' - ');
}

$(function() {
    moment.locale($('html').attr('lang'));

    // belum selesai remove dulu
    $('#artikel').remove();
    $('#map-container').remove();

    // ambil data dinamis
    $.get('/data')
    .done(data => {
        
        data.odp.all = {};
        data.odp.all.jumlah = data.odp.kab.jumlah + data.odp.kota.jumlah;
        
        data.pdp.all = {};
        data.pdp.all.jumlah = data.pdp.kab.jumlah + data.pdp.kota.jumlah;

        data.positif.all = {};
        data.positif.all.jumlah = data.positif.kab.jumlah + data.positif.kota.jumlah;

        $('[data-content="data"]').each(function() {
            const $this = $(this);
            const entity = $this.attr('data-entity');
            const type = $this.attr('data-type');
            let value = '-';
            
            if (entity.includes('.')) {
                let temp = entity.split('.');
                value = data;
                for(let t of temp) {
                    value = value[t];
                }
            } else value = data[entity];

            if (type) {
                if (type == 'date') value = moment(value, 'YYYY-MM-DD').format('dddd, DD MMMM YYYY');
            }
            
            $this.html(value);
        })
    })

    $('#lockdown').ready(function() {
        const limit = $(this).attr('data-limit');
        $.get('/data/lockdown' + (limit ? `/${limit}` : ''))
        .done(data => {
            const $container = $('[data-content="lockdown"]');
            const $template  = $($container.attr('data-template'));
            const $html      = $($template.html());
            for(let lockdown of data) {
                let component = $html.clone();
                switch (lockdown.tipe_lokasi) {
                    case 'U':
                        lockdown.img = '/assets/img/loc_shop.png';
                        break;
                    case 'M':
                        lockdown.img = '/assets/img/loc_mosque.png';
                        break;
                    case 'J':
                        lockdown.img = '/assets/img/loc_cone.png';
                        break;
                    case 'G':
                        lockdown.img = '/assets/img/loc_church.png';
                        break;
                    default:
                        lockdown.img = '/assets/img/loc_cone.png';
                        break;
                }
                
                let waktu = [];
                for (let w of lockdown.waktu) {
                    if (w.tipe == 'I') {
                        let hari = render_hari(w.hari);
                        let jam = "Seharian Penuh";
                        if (w.jam_awal != null) jam = moment(w.jam_awal, 'HH:mm:ss').format('HH:mm') + ' - ' + moment(w.jam_akhir, 'HH:mm:ss').format('HH:mm');
                        waktu.push(hari + ' ' + jam);
                    } else {
                        let tgl = moment(w.tgl_awal, 'YYYY-MM-DD').format('dddd, DD MMMM YYYY');
                        if (w.tgl_awal != w.tgl_akhir) tgl += ' - ' + moment(w.tgl_akhir, 'YYYY-MM-DD').format('dddd, DD MMMM YYYY');
                        let jam = "Seharian Penuh";
                        if (w.jam_awal != null) jam = moment(w.jam_awal, 'HH:mm:ss').format('HH:mm') + ' - ' + moment(w.jam_akhir, 'HH:mm:ss').format('HH:mm');
                        waktu.push(tgl + ' ' + jam);
                    }
                }
                component.find('[data-entity="img"]').attr('src', lockdown.img);
                component.find('[data-entity="lokasi"]').html(lockdown.lokasi);
                component.find('[data-entity="alamat"]').html(lockdown.alamat);
                component.find('[data-entity="waktu"]').html(waktu.join('<br>'));
                component.find('[data-entity="deskripsi"]').html(lockdown.deskripsi);
                $container.append(component);
            }
        });
    });
    // end ambil data dinamis
});