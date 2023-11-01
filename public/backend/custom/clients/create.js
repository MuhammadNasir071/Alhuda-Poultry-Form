api['storeClients'] = ajax_path + '/admin/clients';
api['updateClients'] = ajax_path + '/admin/clients/:id';

var add_client_btn = $('#add-client_button');
var update_client_btn = $('#update_client_btn');

// ADD Client
$('body').on('submit', '#add_client', function (e) {
    e.preventDefault();
    var _this = $(this);
    var data = new FormData();

    data.append('name', $('#name').val());
    data.append('email', $('#email').val());
    data.append('phone', $('#phone').val());
    data.append('address', $('#address').val());
    data.append('_method', 'POST');

    button_status(add_client_btn, true, 'Creating');

    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        url: api['storeClients'],
        type: "POST",
        contentType: false,
        processData: false,
        data: data,

        success: function (response) {
            if (response.responseCode == 200) {
                toastr.success(response.message);
                setTimeout(function () {
                    button_status(add_client_btn, false);
                    window.location = "/admin/clients";
                }, 1500);
            }
            else {
                button_status(add_client_btn, false);
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
                button_status(add_client_btn, false);
            }, 1000);
        }
    });
});


// UPDATE SHIPPING TYPES
$('body').on('submit', '#update_client', function (e) {
    e.preventDefault();

    var _this = $(this);
    var data = new FormData();

    data.append('name', $('#name').val());
    data.append('email', $('#email').val());
    data.append('phone', $('#phone').val());
    data.append('address', $('#address').val());
    data.append('_method', 'PUT');

    button_status(update_client_btn, true, 'Updating');
    let client_id = _this.data('id');
    let url = api['updateClients'];
    url = url.replace(":id", client_id);

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
                    button_status(update_client_btn, false);
                    window.location = "/admin/clients";
                }, 1500);
            }
            else {
                button_status(update_client_btn, false);
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
                    element.after($('<div class="error_message" ><span style="color: red;">' + error[0] + '</span></div>'));
                });
            }
            setTimeout(function () {      // button reset
                button_status(update_client_btn, false);
            }, 1000);
        }
    });
});


