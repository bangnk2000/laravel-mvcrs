$(function () {
    $('.checkbox_wrapper').on('click', function () {
        $(this).parents('.car').find('.b').prop('checked', $(this).prop('checked'));
    });

    $('.select-all-permission').on('click', function () {
        $(this).parents().find('.b').prop('checked', $(this).prop('checked'));
        $(this).parents().find('.checkbox_wrapper').prop('checked', $(this).prop('checked'));

    });
});
