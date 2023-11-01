api['createCompanies'] = ajax_path + '/admin/companies';
api['updateCompanies'] = ajax_path + '/admin/companies/:id';

var add_company_btn = $('#add-company_button');
var update_company_btn = $('#update_company_btn');

// ADD Company
$('body').on('submit', '#add_company', function (e) {
    e.preventDefault();
    var _this = $(this);
    var data = new FormData();
    var isActive = 0;
    if ($('#is_active').is(":checked")) {
        isActive = 1;
    }

    data.append('is_active', isActive);
    data.append('name', $('#name').val());
    data.append('address', $('#address').val());
    data.append('_method', 'POST');

    button_status(add_company_btn, true, 'Creating');

    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        url: api["createCompanies"],
        type: "POST",
        contentType: false,
        processData: false,
        data: data,

        success: function (response) {
            if (response.responseCode == 200) {
                toastr.success(response.message);
                setTimeout(function () {
                    button_status(add_company_btn, false);
                    window.location = "/admin/companies";
                }, 1500);
            }
            else {
                button_status(add_company_btn, false);
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
                button_status(add_company_btn, false);
            }, 1000);
        }
    });
});


// UPDATE SHIPPING TYPES
$('body').on('submit', '#update_company', function (e) {
    e.preventDefault();

    var _this = $(this);
    var data = new FormData();
    var isActive = 0;
    if ($('#is_active').is(":checked")) {
        isActive = 1;
    }

    data.append('is_active', isActive);
    data.append('name', $('#name').val());
    data.append('address', $('#address').val());
    data.append('_method', 'PUT');

    button_status(update_company_btn, true, 'Updating');
    let company_id = _this.data('id');
    let url = api["updateCompanies"];
    url = url.replace(":id", company_id);

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
                    button_status(update_company_btn, false);
                    window.location = "/admin/companies";
                }, 1500);
            }
            else {
                button_status(update_company_btn, false);
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
                button_status(update_company_btn, false);
            }, 1000);
        }
    });
});


