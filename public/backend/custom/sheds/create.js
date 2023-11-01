api['createSheds'] = ajax_path + '/admin/sheds';
api['updateSheds'] = ajax_path + '/admin/sheds/:id';

var add_shed_btn = $('#add-sheds_button');
var update_shed_btn = $('#update_sheds_btn');

// ADD Shed
$('body').on('submit', '#add_sheds', function (e) {
    e.preventDefault();
    var _this = $(this);
    var data = new FormData();
    var isActive = 0;
    if ($('#is_active').is(":checked")) {
        isActive = 1;
    }

    data.append('is_active', isActive);
    data.append('name', $('#name').val());
    data.append('company_id', $('#company_id').val());
    data.append('quantity', $('#quantity').val());
    data.append('price', $('#price').val());
    data.append('_method', 'POST');

    button_status(add_shed_btn, true, 'Creating');

    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        url: api['createSheds'],
        type: "POST",
        contentType: false,
        processData: false,
        data: data,

        success: function (response) {
            if (response.responseCode == 200) {
                toastr.success(response.message);
                setTimeout(function () {
                    button_status(add_shed_btn, false);
                    window.location = "/admin/sheds";
                }, 1500);
            }
            else {
                button_status(add_shed_btn, false);
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
                button_status(add_shed_btn, false);
            }, 1000);
        }
    });
});


// UPDATE SHIPPING TYPES
$('body').on('submit', '#update_sheds', function (e) {
    e.preventDefault();

    var _this = $(this);
    var data = new FormData();
    var isActive = 0;
    if ($('#is_active').is(":checked")) {
        isActive = 1;
    }

    data.append('is_active', isActive);
    data.append('name', $('#name').val());
    data.append('company_id', $('#company_id').val());
    data.append('quantity', $('#quantity').val());
    data.append('price', $('#price').val());
    data.append('_method', 'PUT');

    button_status(update_shed_btn, true, 'Updating');
    let shed_id = _this.data('id');
    let url = api["updateSheds"];
    url = url.replace(":id", shed_id);

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
                    button_status(update_shed_btn, false);
                    window.location = "/admin/sheds";
                }, 1500);
            }
            else {
                button_status(update_shed_btn, false);
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
                button_status(update_shed_btn, false);
            }, 1000);
        }
    });
});


