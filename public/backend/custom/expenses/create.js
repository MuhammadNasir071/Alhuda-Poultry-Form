api['storeExpenses'] = ajax_path + '/admin/expenses';
api['updateExpenses'] = ajax_path + '/admin/expenses/:id';

var add_expense_btn = $('#add-expense_button');
var update_expense_btn = $('#update_expense_btn');

// ADD Shed
$('body').on('submit', '#add_expense', function (e) {
    e.preventDefault();
    var _this = $(this);
    var data = new FormData();

    if($('#shed_id').val() != null || $('#shed_id').val() != ''){
        data.append('shed_id', $('#shed_id').val());
    }

    data.append('company_id', $('#company_id').val());
    data.append('invoice_no', $('#invoice_no').val());
    data.append('expense_type', $('#expense_type').val());
    data.append('expense_detail', $('#expense_detail').val());
    data.append('quantity', $('#quantity').val());
    data.append('quantity_type', $('#quantity_type').val());
    data.append('price', $('#price').val());
    data.append('date', $('#date').val());
    data.append('agency', $('#agency').val());
    data.append('_method', 'POST');

    button_status(add_expense_btn, true, 'Creating');

    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        url: api['storeExpenses'],
        type: "POST",
        contentType: false,
        processData: false,
        data: data,

        success: function (response) {
            if (response.responseCode == 200) {
                toastr.success(response.message);
                setTimeout(function () {
                    button_status(add_expense_btn, false);
                    window.location = "/admin/expenses";
                }, 1500);
            }
            else {
                button_status(add_expense_btn, false);
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
                button_status(add_expense_btn, false);
            }, 1000);
        }
    });
});


// UPDATE SHIPPING TYPES
$('body').on('submit', '#update_expense', function (e) {
    e.preventDefault();

    var _this = $(this);
    var data = new FormData();

    data.append('shed_id', $('#shed_id').val());
    data.append('invoice_no', $('#invoice_no').val());
    data.append('expense_type', $('#expense_type').val());
    data.append('expense_detail', $('#expense_detail').val());
    data.append('quantity', $('#quantity').val());
    data.append('quantity_type', $('#quantity_type').val());
    data.append('price', $('#price').val());
    data.append('date', $('#date').val());
    data.append('agency', $('#agency').val());
    data.append('_method', 'PUT');

    button_status(update_expense_btn, true, 'Updating');
    let expense_id = _this.data('id');
    let url = api['updateExpenses'];
    url = url.replace(":id", expense_id);

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
                    button_status(update_expense_btn, false);
                    window.location = "/admin/expenses";
                }, 1500);
            }
            else {
                button_status(update_expense_btn, false);
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
                button_status(update_expense_btn, false);
            }, 1000);
        }
    });
});


