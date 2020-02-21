$('.is-invalid').on('focus', function () {
    if ($(this).is('input[type=password]')) {
        $(this).keydown(function () {
            $(this).closest('.has-danger').removeClass('has-danger');
            $(this).removeClass('is-invalid');
        })
    } else {
        $(this).closest('.has-danger').removeClass('has-danger');
        $(this).removeClass('is-invalid');
        $(this).siblings('label').children('span.is-invalid').removeClass('is-invalid');
    }
});
