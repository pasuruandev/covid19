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
    if (result[0] == result[1]) result.pop()
    return result.join(' - ');
}

$(function() {
    moment.locale($('html').attr('lang'));

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
                        lockdown.img = 'assets/img/loc_shop.png';
                        break;
                    case 'M':
                        lockdown.img = 'assets/img/loc_mosque.png';
                        break;
                    case 'J':
                        lockdown.img = 'assets/img/loc_cone.png';
                        break;
                    case 'G':
                        lockdown.img = 'assets/img/loc_church.png';
                        break;
                    default:
                        lockdown.img = 'assets/img/loc_cone.png';
                        break;
                }
                
                let waktu = [];
                for (let w of lockdown.waktu) {
                    if (w.tipe == 'I') {
                        let hari = render_hari(w.hari);
                        let jam = "Seharian Penuh";
                        if (w.jam_awal != null && w.jam_awal != "") jam = moment(w.jam_awal, 'HH:mm:ss').format('HH:mm') + ' - ' + moment(w.jam_akhir, 'HH:mm:ss').format('HH:mm');
                        waktu.push(hari + ' ' + jam);
                    } else {
                        let tgl = moment(w.tgl_awal, 'YYYY-MM-DD').format('dddd, DD MMMM YYYY');
                        if (w.tgl_awal != w.tgl_akhir) tgl += ' - ' + moment(w.tgl_akhir, 'YYYY-MM-DD').format('dddd, DD MMMM YYYY');
                        let jam = "Seharian Penuh";
                        if (w.jam_awal != null && w.jam_awal != "") jam = moment(w.jam_awal, 'HH:mm:ss').format('HH:mm') + ' - ' + moment(w.jam_akhir, 'HH:mm:ss').format('HH:mm');
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

    // map code
    $('#map1').ready(function(){
        $.get('/data/maps/3514')
            .done(data => {
                var map = L.map('map1').setView([-7.643130, 112.910461], 12);

                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(map);

                var newMarker = L.icon({
                    iconUrl: 'assets/img/marker.png',

                    iconSize:     [48, 48],
                    iconAnchor:   [20, 50],
                    popupAnchor:  [0, -60]
                });
        
                var kec = [];
                for(var i in data) {
                    kec.push(data[i]);
                };

                var markerpop = new Array();
                var marker = new Array();
            
                for (var i = 0; i < kec.length; i++) {                    
                    markerpop[i] = "<div class='bg-green text-white x-bold font-16 p-1 popup-head text-center'>"+ kec[i]['nama'] +"</div>"+
                        "<p class='font-16 x-bold'>ODP : "+ kec[i]['odp'] +"</p>" +
                        "<p class='font-16 x-bold'>PDP : "+ kec[i]['pdp'] +"</p>" +
                        "<p class='font-16 x-bold'>Positif : "+ kec[i]['positif'] +"</p>";                        
                    marker[i] = L.marker([kec[i]['latitude'], kec[i]['longitude']], {icon: newMarker}).addTo(map)
                    .bindPopup(markerpop[i], {minWidth:200});	
                }
            });
        });

    // table code
    $('#tabel-kecam1').ready(function(){
        $.get('/data/maps/3514')
            .done(data => {                
                var tabkec = [];
                for(var i in data) {
                    tabkec.push(data[i]);
                };
                
                for(var i = 0; i < tabkec.length; i++){
                    var no = i+1;
                    $("#tabel-kecam1").append("<tr><td>"+no+"</td>"+"<td>"+tabkec[i]['nama']+"</td><td>"+tabkec[i]['odp']+"</td><td>"+tabkec[i]['pdp']+"</td><td>"+tabkec[i]['pdp']+"</td></tr>");                    
                }

            });
        });

    // map code
    $('#map2').ready(function(){
        $.get('/data/maps/3575')
            .done(data => {
                var map = L.map('map2').setView([-7.643130, 112.910461], 12);

                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(map);

                var newMarker = L.icon({
                    iconUrl: 'assets/img/marker.png',

                    iconSize:     [48, 48],
                    iconAnchor:   [20, 50],
                    popupAnchor:  [0, -60]
                });
        
                var kec = [];
                for(var i in data) {
                    kec.push(data[i]);
                };

                var markerpop = new Array();
                var marker = new Array();
            
                for (var i = 0; i < kec.length; i++) {                    
                    markerpop[i] = "<div class='bg-green text-white x-bold font-16 p-1 popup-head text-center'>"+ kec[i]['nama'] +"</div>"+
                        "<p class='font-16 x-bold'>ODP : "+ kec[i]['odp'] +"</p>" +
                        "<p class='font-16 x-bold'>PDP : "+ kec[i]['pdp'] +"</p>" +
                        "<p class='font-16 x-bold'>Positif : "+ kec[i]['positif'] +"</p>";                        
                    marker[i] = L.marker([kec[i]['latitude'], kec[i]['longitude']], {icon: newMarker}).addTo(map)
                    .bindPopup(markerpop[i], {minWidth:200});	
                }
            });
        });
    
        // table code
    $('#tabel-kecam2').ready(function(){
        $.get('/data/maps/3575')
            .done(data => {                
                var tabkec = [];
                for(var i in data) {
                    tabkec.push(data[i]);
                };
                
                for(var i = 0; i < tabkec.length; i++){
                    var no = i+1;
                    $("#tabel-kecam2").append("<tr><td>"+no+"</td>"+"<td>"+tabkec[i]['nama']+"</td><td>"+tabkec[i]['odp']+"</td><td>"+tabkec[i]['pdp']+"</td><td>"+tabkec[i]['pdp']+"</td></tr>");                    
                }

        });
    });
    
    // end ambil data dinamis
    $('#artikel').ready(function() {
        const limit = $(this).attr('data-limit');
        $.get('/data/article' + (limit ? `/${limit}` : ''))
        .done(data => {
            const $container = $('[data-content="artikel"]');
            const $template  = $($container.attr('data-template'));
            const $html      = $($template.html());
            for(let article of data) {
                let component = $html.clone();
                let url = 'article/' + article.id;
                let header = '/assets/img/article/1.jpg';
                if (article.header) header = '/assets/img/article/' + article.header;
                component.find('[data-entity="header"]').attr('src', header);
                component.find('[data-entity="title"]').html(article.title);
                component.find('[data-entity="link"]').attr('href', url);
                $container.append(component);
            }
        });
    });
    // end ambil data dinamis
});
