api['storeMortalities'] = ajax_path + '/admin/mortalities';
api['updateMortalities'] = ajax_path + '/admin/mortalities/:id';

var add_mortality_btn = $('#add-mortality_button');
var update_mortality_btn = $('#update_mortality_btn');

// ADD Shed
$('body').on('submit', '#add_mortality', function (e) {
    e.preventDefault();
    var _this = $(this);
    $('.error_message').remove();
    var data = new FormData();
    if($('#shed_id').val() != null || $('#shed_id').val() != ''){
        data.append('shed_id', $('#shed_id').val());
    }

    data.append('company_id', $('#company_id').val());
    data.append('day_mortality', $('#day_mortality').val());
    data.append('night_mortality', $('#night_mortality').val());
    data.append('date', $('#date').val());
    data.append('_method', 'POST');

    button_status(add_mortality_btn, true, 'Creating');

    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        url: api['storeMortalities'],
        type: "POST",
        contentType: false,
        processData: false,
        data: data,

        success: function (response) {
            if (response.responseCode == 200) {
                toastr.success(response.message);
                setTimeout(function () {
                    button_status(add_mortality_btn, false);
                    window.location = "/admin/mortalities";
                }, 1500);
            }
            else {
                button_status(add_mortality_btn, false);
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
                button_status(add_mortality_btn, false);
            }, 1000);
        }
    });
});


// UPDATE SHIPPING TYPES
$('body').on('submit', '#update_mortality', function (e) {
    e.preventDefault();

    var _this = $(this);
    var data = new FormData();

    data.append('day_mortality', $('#day_mortality').val());
    data.append('night_mortality', $('#night_mortality').val());
    data.append('date', $('#date').val());
    data.append('_method', 'PUT');

    button_status(update_mortality_btn, true, 'Updating');
    let mortality_id = _this.data('id');
    let url = api['updateMortalities'];
    url = url.replace(":id", mortality_id);

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
                    button_status(update_mortality_btn, false);
                    window.location = "/admin/mortalities";
                }, 1500);
            }
            else {
                button_status(update_mortality_btn, false);
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
                button_status(update_mortality_btn, false);
            }, 1000);
        }
    });
});


