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
        
        data.suspek.all = {};
        data.suspek.all.jumlah = data.suspek.kab.jumlah + data.suspek.kota.jumlah;
        
        data.konfirmasi.all = {};
        data.konfirmasi.all.jumlah = data.konfirmasi.kab.jumlah + data.konfirmasi.kota.jumlah;

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

    // map code
    $('#map1').ready(function(){
        $.get('/data/maps/kab')
            .done(data => {
                var map = L.map('map1').setView([-7.72, 112.858215], 11);

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
                    markerpop[i] = "<div class='bg-green text-white x-bold font-16 p-1 popup-head text-center'>"+ kec[i]['kecamatan']['nama'] +"</div>"+
                        "<p class='font-16 x-bold'>Suspek : "+ kec[i]['suspek'] +"</p>" +
                        "<p class='font-16 x-bold'>Konfirmasi : "+ kec[i]['konfirmasi'] +"</p>";
                    marker[i] = L.marker([kec[i]['kecamatan']['latitude'], kec[i]['kecamatan']['longitude']], {icon: newMarker}).addTo(map)
                    .bindPopup(markerpop[i], {minWidth:200});	
                }
            });
        });

    // table code
    $('#tabel-kecam1').ready(function(){
        $.get('/data/maps/kab')
            .done(data => {                
                var tabkec = [];
                for(var i in data) {
                    tabkec.push(data[i]);
                };
                
                for(var i = 0; i < tabkec.length; i++){
                    var no = i+1;
                    $("#tabel-kecam1").append(
                        `<tr>`+
                            `<td>${no}</td>`+
                            `<td>${tabkec[i]['kecamatan']['nama']}</td>`+
                            `<td>${tabkec[i]['suspek']}</td>`+
                            `<td>${tabkec[i]['konfirmasi']}</td>`+
                        `</tr>`
                    );
                }

            });
        });

    // map code
    $('#map2').ready(function(){
        $.get('/data/maps/kota')
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
                    markerpop[i] = "<div class='bg-green text-white x-bold font-16 p-1 popup-head text-center'>"+ kec[i]['kecamatan']['nama'] +"</div>"+
                        "<p class='font-16 x-bold'>Suspek : "+ kec[i]['suspek'] +"</p>" +
                        "<p class='font-16 x-bold'>Konfirmasi : "+ kec[i]['konfirmasi'] +"</p>";
                    marker[i] = L.marker([kec[i]['kecamatan']['latitude'], kec[i]['kecamatan']['longitude']], {icon: newMarker}).addTo(map)
                    .bindPopup(markerpop[i], {minWidth:200});	
                }
            });
        });
    
        // table code
    $('#tabel-kecam2').ready(function(){
        $.get('/data/maps/kota')
            .done(data => {                
                var tabkec = [];
                for(var i in data) {
                    tabkec.push(data[i]);
                };
                
                for(var i = 0; i < tabkec.length; i++){
                    var no = i+1;
                    $("#tabel-kecam2").append(
                        `<tr>`+
                            `<td>${no}</td>`+
                            `<td>${tabkec[i]['kecamatan']['nama']}</td>`+
                            `<td>${tabkec[i]['suspek']}</td>`+
                            `<td>${tabkec[i]['konfirmasi']}</td>`+
                        `</tr>`
                    );
                }

        });
    });
    
    // end ambil data dinamis
    $('#artikel').ready(function() {
        const limit = 3;
        $.get('/data/article' + (limit ? `/${limit}` : ''))
        .done(data => {
            const $container = $('[data-content="artikel"]');
            const $template  = $($container.attr('data-template'));
            const $html      = $($template.html());
            for(let article of data) {
                let component = $html.clone();
                let url = 'article/' + article.slug;
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
