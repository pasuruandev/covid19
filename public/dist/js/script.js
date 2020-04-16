moment.locale($('html').attr('lang'));
jQuery.fn.loading = function (set = true) {
    const self = $(this)
    if (set) {
        self.prepend(`<span class="spinner-border spinner-border-sm" style="vertical-align: middle;" role="status" aria-hidden="true"></span>`);
        self.attr('disabled', true);
    } else {
        self.find('.spinner-border').remove();
        self.removeAttr('disabled');
    }
};
if (jQuery.fn.datetimepicker) {
    $('.datepicker').datetimepicker({
        format: 'L',
        locale: $('html').attr('lang'),
        keepOpen: false
    });
    $('.input-daterange input').each(function () {
        $(this).datetimepicker({
            format: 'L',
            locale: $('html').attr('lang'),
            keepOpen: false,
            allowInputToggle: true
        });
    });
    $('.timepicker').datetimepicker({
        format: 'HH:mm',
        locale: $('html').attr('lang'),
        keepOpen: false
    });
    $('.input-timerange input').each(function () {
        $(this).datetimepicker({
            format: 'HH:mm',
            locale: $('html').attr('lang'),
            keepOpen: false
        });
    });
}

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
                const next = (i + 1 < hari.length) ? hari[i+1] : null;
                const prev = (i - 1 > -1) ? hari[i-1] : null;
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
    if (result[0] == result[1]) result.pop();
    return result.join(' - ');
}