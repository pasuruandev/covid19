moment.locale($('html').attr('lang'));

$(function() {
    $('.date').each(function () {
        const self = $(this);
        const date = moment(self.html(), 'YYYY-MM-DD HH:mm:ss').format('dddd, DD MMMM YYYY');
        self.html(date);
    })
})