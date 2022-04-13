const Category = (function () {
    let modules = {};

    modules.resetForm = function (e) {
        e.trigger('reset');
    }

    modules.getList = async function (url,data) {
       await Base.callForm(url, data)
            .then(function (res) {
                $('#list').html('').append(res);
            });
    };

    modules.getListSearch = async function () {
        let data = $('.form-search').serialize();
        let url = $('#list').data('action');
       await Category.getList(url,data);
    };

    modules.store = function () {
        let form = $('#addCateForm');
        let data = form.serialize();
        let url = form.data('action');
        Base.callForm(url, data, 'POST')
            .done(function (res) {
                Category.resetForm($('#addCateForm'));
                $('#show-form-create').modal('hide');
                Category.getList($('#list').data('action'));
                CustomAlert.modalSuccess(res.message);
            })
            .fail(function (res) {
                CustomAlert.showError(res.responseJSON.errors);
            });
    };

    modules.edit = function (element) {
        let url = element.data('action');
        Base.callForm(url)
            .then(function (res) {
                $('#edit').html('').append(res);
            })
            .fail(function () {
                CustomAlert.modalFail();
            })
    };

    modules.update = function () {
        let form = $('#editCateForm')
        let data = form.serialize();
        let url = form.data('action');
        Base.callForm(url, data, 'PUT')
            .done(function (res) {
                Category.resetForm($('#editCateForm'));
                $('#show-form-edit').modal('hide');
                Category.getList($('#list').data('action'));
                CustomAlert.modalSuccess(res.message);
            })
            .fail(function (res) {
                CustomAlert.showError(res.responseJSON.errors);
            });
    };

    modules.delete = function (element) {
        let url = element.data('action');
        Base.confirmDelete().then(
            function () {
                Base.callForm(url, {}, 'delete')
                    .done(function () {
                        Category.getList($('#list').data('action'));
                        CustomAlert.modalSuccess('Delete category success');
                    })
                    .fail(function () {
                        CustomAlert.modalFail();
                    });
            }
        );

    };

    return modules;
}(window.jQuery, window, document));

$(document).ready(function () {

    const DELAY_TIME = 500;

    Category.getList($('#list').data('action'));

    $(document).on('click', '.page-link', function (e) {
        e.preventDefault();
        let url = $(this).attr('href');
        Category.getList(url);
    });

    $(document).on('click','#btn-add-new-cate', function () {
       Base.resetError();
    });

    $(document).on('click', '#btn-create', function (e) {
        e.preventDefault();
        Category.store();

    });

    $(document).on('click', '.btn-edit-cate', function (e) {
        Category.edit($(this));
    });

    $(document).on('click', '#btn-edit', function (e) {
        e.preventDefault();
        Category.update();
    });

    $(document).on('click', '.btn-delete-cate', function () {
        Category.delete($(this));

    });

    $(document).on('keyup', '#search-with-name',$.debounce(DELAY_TIME, function (){
        Category.getListSearch();
    }));

    $(document).on('change','#search-with-category-id',$.debounce(DELAY_TIME, function (){
        Category.getListSearch();
    }));
});

