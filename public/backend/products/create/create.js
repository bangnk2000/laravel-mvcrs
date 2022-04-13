$(document).ready(function (){
    $('.select2_init').select2({
        'placeholder':'Chọn danh muc'
    })
})

$(document).ready(function () {
    $('#image').change(function (e) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#showImage').attr('src', e.target.result);
        }
        reader.readAsDataURL(e.target.files['0']);
    })
})









