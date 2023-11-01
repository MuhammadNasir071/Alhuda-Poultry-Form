/**
 * core js of plotefinder app
 *
 */

var api = [];
var ajax_path = $('meta[name="server-path"]').attr('content');
var id = $('meta[name="auth-id"]').attr('content');

// globle button status function
function button_status(element, handle = true, text = 'Loading',) {
    if (handle) {
        // loading //
        element.data('text', element.html());
        element.prop('disabled', true);
        element.html('<span class="spinner-grow spinner-grow-sm mr-2"></span>' + [text]);
    } else {
        // reset //
        element.prop('disabled', false);
        element.html(element.data('text'));
    }
}

// TOOTIP FOR ALL WEBSITE
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});

api['getCompanySheds'] = ajax_path + '/admin/get_company/shed/:id';


// // GET Sheds of selected company
$('body').on('change', '#company_id', function (e) {
    var _this = $(this);
    var company_id = _this.val();

    if (_this.val() > 0) {
        var url = api['getCompanySheds'].replace(':id', company_id);
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            url: url,
            type: "GET",
            success: function (response) {
                if (response.responseCode == 200) {
                    let sheds = response.payload.sheds;
                    if (sheds.length > 0)
                    {
                        $('#shed_id').empty();
                        $('#child_shed_div').show();
                        $('#shed_id').append(`<option value="">Select a shed</option>`);
                        sheds.forEach(function(shed) {
                            var element = `<option value="${shed.id}"> ${shed.name} </div>`;
                            $('#shed_id').append(element);
                          });
                    }
                    else{
                        $('#shed_id').empty();
                        $('#child_shed_div').css('display', 'none');
                    }
                }
                else {
                    // button_status(submit_btn, "reset");
                    toastr.error('There are something went wrong');
                }
            }
        });
    }

});




api['getCompanySheds_history'] = ajax_path + '/admin/get_company/sheds/:id';


// // GET Sheds of selected company
$('body').on('change', '#company_id_history', function (e) {
    var _this = $(this);
    var company_id = _this.val();

    if (_this.val() > 0) {
        var url = api['getCompanySheds_history'].replace(':id', company_id);
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            url: url,
            type: "GET",
            success: function (response) {
                if (response.responseCode == 200) {
                    let sheds = response.payload.sheds;
                    if (sheds.length > 0)
                    {
                        $('#shed_id').empty();
                        $('#child_shed_div').show();
                        $('#shed_id').append(`<option value="">Select a shed</option>`);
                        sheds.forEach(function(shed) {
                            var element = `<option value="${shed.id}"> ${shed.name} </div>`;
                            $('#shed_id').append(element);
                          });
                    }
                    else{
                        $('#shed_id').empty();
                        $('#child_shed_div').css('display', 'none');
                    }
                }
                else {
                    // button_status(submit_btn, "reset");
                    toastr.error('There are something went wrong');
                }
            }
        });
    }

});
