moment.locale($('html').attr('lang'));
$('.date').each(function (e) {
    const self = $(this);
    const date = moment(self.html(), 'YYYY-MM-DD HH:mm:ss').format('dddd, DD MMMM YYYY');
    self.html(date);
});