api['storeSales'] = ajax_path + '/admin/sales';
api['updateSales'] = ajax_path + '/admin/sales/:id';

var add_sale_btn = $('#add-sale_button');
var update_sale_btn = $('#update_sale_btn');

// ADD Sale
$('body').on('submit', '#add_sale', function (e) {
    e.preventDefault();
    var _this = $(this);
    $('.error_message').remove();
    var data = new FormData();
    if($('#shed_id').val() != null || $('#shed_id').val() != ''){
        data.append('shed_id', $('#shed_id').val());
    }

    data.append('company_id', $('#company_id').val());
    data.append('client_id', $('#client_id').val());
    data.append('vehicle_no', $('#vehicle_no').val());
    data.append('initial_weight', $('#initial_weight').val());
    data.append('final_weight', $('#final_weight').val());
    data.append('rate', $('#rate').val());
    data.append('final_price', $('#final_price').val());
    data.append('payment_type', $('#payment_type').val());
    data.append('payment_status', $('#payment_status').val());
    data.append('_method', 'POST');

    button_status(add_sale_btn, true, 'Creating');

    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        url: api['storeSales'],
        type: "POST",
        contentType: false,
        processData: false,
        data: data,

        success: function (response) {
            if (response.responseCode == 200) {
                toastr.success(response.message);
                setTimeout(function () {
                    button_status(add_sale_btn, false);
                    window.location = "/admin/sales";
                }, 1500);
            }
            else {
                button_status(add_sale_btn, false);
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
                button_status(add_sale_btn, false);
            }, 1000);
        }
    });
});


// UPDATE SALe
$('body').on('submit', '#update_sale', function (e) {
    e.preventDefault();

    var _this = $(this);
    var data = new FormData();

    data.append('client_id', $('#client_id').val());

    data.append('vehicle_no', $('#vehicle_no').val());
    data.append('initial_weight', $('#initial_weight').val());
    data.append('final_weight', $('#final_weight').val());
    data.append('rate', $('#rate').val());
    data.append('final_price', $('#final_price').val());
    data.append('payment_type', $('#payment_type').val());
    data.append('payment_status', $('#payment_status').val());
    data.append('_method', 'PUT');

    button_status(update_sale_btn, true, 'Updating');
    let sale_id = _this.data('id');
    let url = api['updateSales'];
    url = url.replace(":id", sale_id);

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
                    button_status(update_sale_btn, false);
                    window.location = "/admin/sales";
                }, 1500);
            }
            else {
                button_status(update_sale_btn, false);
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
                button_status(update_sale_btn, false);
            }, 1000);
        }
    });
});

$('body').on("keyup", '#final_price', function() {
    var initial_weight1 = $("#initial_weight").val();
    var final_price1 = $("#final_price").val();
    var rate1 = $("#rate").val();
    $("#final_weight").val('');
    $('.avg_weight_jq').remove();

    // Calculate the result
    var result = parseInt(final_price1 / rate1);
    var final_weight1 = parseInt(result) + parseInt(initial_weight1);

    if((final_price1 > 1) && (final_weight1 > 1)){
        $("#final_weight").val(final_weight1);
        $('#initial_weight').after('<span class="avg_weight_jq" style="color:green">Avg Weight: '+ result +'</span>');
    }
    else{
        $("#final_weight").val(0);
    }
});

$(document).ready(function(){
    var initial_weight = $("#initial_weight");
    var final_weight = $("#final_weight");
    var rate = $("#rate");
    final_weight.on("keyup", updateResult);
    rate.on("keyup", updateResult);

    function updateResult() {
        var val1 = initial_weight.val();
        var val2 = final_weight.val();
        var val3 = rate.val();
        $('.avg_weight_jq').remove();
        // Calculate the result
        var total_price = (val2 - val1) * val3;
        if(total_price > 1){
            $("#final_price").val(total_price);
            $('#initial_weight').after('<span class="avg_weight_jq" style="color:green">Avg Weight: '+ (val2 - val1) +'</span>');
        }
        else{
            $("#final_price").val(0);
        }
    }
});





