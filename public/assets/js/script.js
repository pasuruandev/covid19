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

    // belum selesai remove dulu
    $('#artikel').remove();
    //$('#map-container').remove();

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
                
                
                // var kec = [
                //     ["PURWODADI", -7.803544,112.7271303,0,0,0],
                //     ["TUTUR", -7.8996875,112.8224678,0,0,0],
                //     ["PUSPO", -7.8360402,112.870133,0,0,0],
                //     ["TOSARI", -7.8955854,112.8939647,0,0,0],
                //     ["LUMBANG", -7.7995045,112.9773703,0,0,0],
                //     ["PASREPAN", -7.7941107,112.8939647,0,0,0],
                //     ["KEJAYAN", -7.7359823,112.8463007,0,0,0],
                //     ["WONOREJO", -7.71972,112.7748002,0,0,0],
                //     ["PURWOSARI", -7.7629501,112.7271303,0,0,0],
                //     ["PRIGEN", -7.697172,112.627899,0,0,0],
                //     ["SUKOREJO", -7.7169176,112.7187595,0,0,0],
                //     ["PANDAAN", -7.6426348,112.7032945,0,0,0],
                //     ["GEMPOL", -7.6034421,112.6794582,0,0,0],
                //     ["BEJI", -7.5947854,112.7450068,0,0,0],
                //     ["BANGIL", -7.604976,112.775101,0,0,0],
                //     ["REMBANG", -7.6373665,112.7986343,0,0,0],
                //     ["KRATON", -7.6752088,112.8463007,0,0,0],
                //     ["POHJENTREK", -7.6786077,112.876091,0,0,0],
                //     ["GONDANG WETAN", -7.7117048,112.9177957,0,0,0],
                //     ["REJOSO", -7.6746075,112.9475835,0,0,0],
                //     ["WINONGAN", -7.7508715,112.941626,0,0,0],
                //     ["GRATI", -7.7468219,113.013113,0,0,0],
                //     ["LEKOK", -7.6658741,113.013113,0,0,0],
                //     ["NGULING", -7.7036431,113.0607675,0,0,0],
                // ];
                console.log(kec);
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

                console.log(kec);
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
});


