api['updateProfile'] = ajax_path + '/admin/update_profile/:id';
var update_admin_btn = $('#update_admin_btn');

// Update User
$('body').on('submit', '#update_admin_form', function(e){
    e.preventDefault();
    var _this = $(this);
    var data = new FormData();

    var files = $('#upload-photo')[0].files;
    if (files.length > 0) {
        data.append('image', files[0]);
    }
    data.append('full_name', $('#full_name').val());
    data.append('contact', $('#contact').val());
    data.append('_method', 'put');

    button_status(update_admin_btn, true, 'Updating');
    let update_id = _this.data('id');
    let url = api["updateProfile"];
    url = url.replace(":id", update_id);

    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        url: url,
        type: "POST",
        contentType: false,
        processData: false,
        data: data,

        success: function (response) {
            if (response.responseCode == 200) {
                toastr.success(response.message);
                setTimeout(function () {
                    button_status(update_admin_btn, false);
                    window.location.reload();
                }, 1500);
            }
            else {
                button_status(update_admin_btn, false);
                toastr.error('There are something went wrong');
            }
        },
        error: function (errors) {

            $('.validation_message').remove();

            if (errors.status == 422) {
                $('#success_message').fadeIn().html(errors.responseJSON.message);
                $.each(errors.responseJSON.errors, function (input_name, error) {

                    var element = $(document).find('[name="' + input_name + '"]');
                    element.after($('<div class="validation_message" ><span style="color: red;">' + error[0] + '</span></div>'));
                });
            }
            setTimeout(function () {      // button reset
                button_status(update_admin_btn, false);
            }, 1000);
        }
    });
});



var loadFile = function (event) {
    var reader = new FileReader();
    reader.onload = function () {
        var output = document.getElementById('imagePreview');
        output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
};
