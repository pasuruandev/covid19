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