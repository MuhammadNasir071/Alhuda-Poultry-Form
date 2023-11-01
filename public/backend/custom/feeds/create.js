api['storeFeeds'] = ajax_path + '/admin/feeds';
api['updateFeeds'] = ajax_path + '/admin/feeds/:id';
api['getAvgWeight'] = ajax_path + '/admin/get_avg_weight/:company_id/:shed_id';

var add_feed_btn = $('#add_feed_btn');
var update_feed_btn = $('#update_feed_btn');

// ADD Shed
$('body').on('submit', '#add_feed', function (e) {
    e.preventDefault();
    var _this = $(this);
    $('.error_message').remove();
    var data = new FormData();
    if($('#shed_id').val() != null || $('#shed_id').val() != ''){
        data.append('shed_id', $('#shed_id').val());
    }
    data.append('company_id', $('#company_id').val());
    data.append('day_feed', $('#day_feed').val());
    data.append('night_feed', $('#night_feed').val());
    data.append('date', $('#date').val());
    data.append('ave_weight', $('#ave_weight').val());
    data.append('_method', 'POST');

    button_status(add_feed_btn, true, 'Creating');

    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        url: api['storeFeeds'],
        type: "POST",
        contentType: false,
        processData: false,
        data: data,

        success: function (response) {
            if (response.responseCode == 200) {
                toastr.success(response.message);
                setTimeout(function () {
                    button_status(add_feed_btn, false);
                    window.location = "/admin/feeds";
                }, 1500);
            }
            else {
                button_status(add_feed_btn, false);
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
                button_status(add_feed_btn, false);
            }, 1000);
        }
    });
});


// UPDATE Feeds
$('body').on('submit', '#update_feed', function (e) {
    e.preventDefault();

    var _this = $(this);
    var data = new FormData();

    data.append('day_feed', $('#day_feed').val());
    data.append('night_feed', $('#night_feed').val());
    data.append('date', $('#date').val());
    data.append('_method', 'PUT');

    button_status(update_feed_btn, true, 'Updating');
    let feed_id = _this.data('id');
    let url = api['updateFeeds'];
    url = url.replace(":id", feed_id);

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
                    button_status(update_feed_btn, false);
                    window.location = "/admin/feeds";
                }, 1500);
            }
            else {
                button_status(update_feed_btn, false);
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
                button_status(update_feed_btn, false);
            }, 1000);
        }
    });
});


// get week on change shed select
$('#shed_id').change(function (e) {
    var _this = $(this);
    var company_id = $('#company_id').val();
    var shed_id = _this.val();
    var url = api['getAvgWeight'];
    url = url.replace(":company_id", company_id);
    url = url.replace(":shed_id", shed_id);

    if (_this.val() > 0) {
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            url: url,
            type: "GET",
            success: function (response) {
                if (response.responseCode == 200) {
                    var feeds = response.payload.feeds;
                    if (feeds.length >= 7)
                    {
                        var mood = feeds.length % 7;
                        feeds = parseInt(feeds.length / 7);

                        $('#week').empty();
                        $('#select_week_dev').show();
                        for (let index = 1; index < feeds+1; index++)
                        {
                            var element = `<option value="${index}"> Week 0${index} </div>`;
                            $('#week').append(element);
                        }
                        if(mood > 0){
                            $('#week').append(`<option value='remaning_week'>Remaning days</option>`);
                        }

                    }
                    else{
                        $('#week').empty();
                        $('#select_week_dev').css('display', 'none');
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
