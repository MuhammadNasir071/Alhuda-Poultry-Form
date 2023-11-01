api['createUser'] = ajax_path + '/admin/users';
api['updateUser'] = ajax_path + '/admin/users/:id';

var add_user_btn = $('#add_user_btn');
var update_users_btn = $('#update_users_btn');

// ADD Shed
$('body').on('submit', '#add_users_form', function (e) {
    e.preventDefault();
    var _this = $(this);
    var data = new FormData();

    data.append('full_name', $('#full_name').val());
    data.append('role', $('#role').val());
    data.append('email', $('#email').val());
    data.append('password', $('#password').val());
    data.append('contact', $('#contact').val());
    data.append('_method', 'POST');

    button_status(add_user_btn, true, 'Creating');

    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        url: api['createUser'],
        type: "POST",
        contentType: false,
        processData: false,
        data: data,

        success: function (response) {
            if (response.responseCode == 200) {
                toastr.success(response.message);
                setTimeout(function () {
                    button_status(add_user_btn, false);
                    window.location = "/admin/users";
                }, 1500);
            }
            else {
                button_status(add_user_btn, false);
                toastr.error('There are something went wrong');
            }
        },
        error: function (errors) {
            $('.error_message').remove();
            if (errors.status == 422) {
                $('#success_message').fadeIn().html(errors.responseJSON.message);
                // you can loop through the errors object and show it to the user
                // display errors on each form field
                $.each(errors.responseJSON.errors, function (input_name, error) {

                    var element = $(document).find('[name="' + input_name + '"]');
                    element.after($('<div class="error_message"><span style="color: red;">' + error[0] + '</span></div>'));
                });
            }
            setTimeout(function () {      // button reset
                button_status(add_user_btn, false);
            }, 1000);
        }
    });
});



