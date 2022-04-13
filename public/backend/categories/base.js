$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

const Base = (function () {
    let modules = {};

    modules.callForm = function (url, data = {}, method = 'get') {
        return $.ajax({
            url: url,
            data: data,
            method: method,
        })
    }

    modules.confirmDelete = function () {
        return new Promise((resolve, reject) => {
            Swal.fire({
                title: 'Are you sure want to delete ?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    resolve(true);
                } else {
                    reject(false);
                }
            })
        })
    }

    modules.resetError = function () {
        $('.errors').html('');
    }

    return modules;
}(window.jQuery, window, document));

const CustomAlert = (function () {
    let modules = {};

    modules.modalSuccess = function (message) {
        Swal.fire(
            message,
            '',
            'success'
        )
    };

    modules.showError = function (error) {
        $.each(error,function (key,value) {
            $(`.error-${key}`).text(value);
        });
    };

    modules.modalFail = function () {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Something went wrong!',
        })
    };

    return modules;
}(window.jQuery, window, document));


