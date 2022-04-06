function ShowLoading() {
    $('body').removeClass('loaded');

}

function StopLoading() {
    $('body').addClass('loaded');
}



var KennelPost = function(params) {
    var url = params.url,
        type = params.type,
        data = params.data,
        method = params.method,
        dataType = params.dataType,
        return_url = params.return_url,
        function_type = params.function_type,
        token = params.token;
    ShowLoading();

    if (typeof return_url === 'undefined' || return_url == '') {
        return_url = current_url;
    }
    try {
        if (function_type === 'AJAX_DATA') {

            var returningresponse = '';

            $.ajax({
                url: site_url + function_type,
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                type: method,
                dataType: dataType,
                cache: false,
                async: false,
                data: { postdata: data, type: type },
                success: function(data) {
                    // console.log(data);
                    if (data.status == 200) {
                        returningresponse = data;
                    } else {
                        returningresponse = false;
                        // alert(data.Message)
                        // alert("Our technical staff has been automatically notified and will be looking into this with utmost urgency");
                        console.log(data.message);

                    }
                },
                error: function(jqXHR, exception) {
                    StopLoading();
                    var msg = '';
                    if (jqXHR.status === 0) {
                        msg = 'Not connect.\n Verify Network.';
                    } else if (jqXHR.status == 404) {
                        msg = 'Requested page not found. [404]';
                    } else if (jqXHR.status == 500) {
                        msg = 'Internal Server Error [500].';
                    } else if (exception === 'parsererror') {
                        msg = 'Requested JSON parse failed.';
                    } else if (exception === 'timeout') {
                        msg = 'Time out error.';
                    } else if (exception === 'abort') {
                        msg = 'Ajax request aborted.';
                    } else if (jqXHR.status == 422) {
                        $.each(jqXHR.responseJSON.errors, function(i, error) {
                            var el = $(document).find('[name="' + i + '"]');
                            el.after($('<br><span style="color: red;">' + error[0] + '</span>'));
                        });
                        return;
                    } else {
                        msg = 'Uncaught Error.\n' + jqXHR.responseJSON.message + ' Our technical staff has been automatically notified and will be looking into this with utmost urgency';
                    }
                    //alert(msg);
                    console.log(jqXHR);
                }
            });
            StopLoading();
            return returningresponse;
        } else if (function_type === 'FORM_SAVE') {
            $.ajax({
                url: url,
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                type: method,
                dataType: dataType,
                contentType: false,
                processData: false,
                cache: false,
                data: data,
                success: function(data) {
                    StopLoading();

                    if (data.status != 200 && data.status != 421) {
                        toastr.warning(data.message);
                        return;
                    }

                    if (typeof return_url !== 'undeined' || return_url !== '') {
                        toastr.success(data.message);
                        setTimeout(function() {
                            if (data.url) {
                                window.location.href = data.url;
                                //location.replace();    
                            } else if (data.reload != false) {
                                location.reload();
                            }
                        }, 1500);
                    }
                    if (data.status == 421) {
                        let error = data.message;
                        if (typeof error == 'object') {
                            for (let key in error) {
                                let single_error = error[key];
                                for (let key2 in single_error) {
                                    toastr.warning(`${key} : ${single_error[key2]}`);
                                }
                            }
                        }
                        // console.log(data.message);
                    }
                },
                error: function(jqXHR, exception) {
                    StopLoading();
                    var msg = '';
                    if (jqXHR.status === 0) {
                        msg = 'Not connect.\n Verify Network.';
                    } else if (status == 404) {
                        msg = 'Requested page not found. [404]';
                    } else if (jqXHR.status == 500) {
                        msg = 'Internal Server Error [500].';
                    } else if (exception === 'parsererror') {
                        msg = 'Requested JSON parse failed.';
                    } else if (exception === 'timeout') {
                        msg = 'Time out error.';
                    } else if (exception === 'abort') {
                        msg = 'Ajax request aborted.';
                    } else if (jqXHR.status == 422) {
                        $.each(jqXHR.responseJSON.errors, function(i, error) {
                            var el = $(document).find('[name="' + i + '"]');
                            if ($(el).siblings('.validation_error').length >= 0) {
                                $(el).siblings('.validation_error').remove();
                                el.after($('<br><span style="color: red;" class="validation_error">' + error[0] + '</span>'));
                            }
                        });
                        return;
                    } else {
                        msg = 'Uncaught Error.\n' + jqXHR.responseJSON.message + ' Our technical staff has been automatically notified and will be looking into this with utmost urgency';
                    }
                    // alert(msg);
                    console.log(jqXHR);

                }

            });
        } else if (function_type === 'ADMIN_AJAX_DATA') {

            var returningresponse = '';

            $.ajax({
                url: site_url + 'admin/ajax',
                type: method,
                dataType: dataType,
                cache: false,
                async: false,

                data: { postdata: data, type: type },
                success: function(data) {

                    if (data.success) {
                        returningresponse = data;
                    } else {
                        returningresponse = false;
                        // alert(data.Message)
                        console.log(data.Message);

                    }
                },
                error: function(jqXHR, exception) {
                    StopLoading();
                    var msg = '';
                    if (jqXHR.status === 0) {
                        msg = 'Not connect.\n Verify Network.';
                    } else if (jqXHR.status == 404) {
                        msg = 'Requested page not found. [404]';
                    } else if (jqXHR.status == 500) {
                        msg = 'Internal Server Error [500].';
                    } else if (exception === 'parsererror') {
                        msg = 'Requested JSON parse failed.';
                    } else if (exception === 'timeout') {
                        msg = 'Time out error.';
                    } else if (exception === 'abort') {
                        msg = 'Ajax request aborted.';
                    } else if (jqXHR.status == 422) {
                        $.each(jqXHR.responseJSON.errors, function(i, error) {
                            var el = $(document).find('[name="' + i + '"]');
                            el.after($('<br><span style="color: red;">' + error[0] + '</span>'));
                        });
                        return;
                    } else {
                        msg = 'Uncaught Error.\n' + jqXHR.responseJSON.message + ' Our technical staff has been automatically notified and will be looking into this with utmost urgency';
                    }
                    //alert(msg);
                    console.log(jqXHR);
                }
            });
            return returningresponse;
            StopLoading();
        } else {
            StopLoading();
        }
    } catch (e) {
        StopLoading();
        console.log(e);
        return false;
    }
}