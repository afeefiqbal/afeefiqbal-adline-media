$(document).ready(function () {
    if ($.fn.countUp) {
        $('.counter').countUp({
            delay: 5,
            time: 1500
        });
    }

    function refreshMathCaptcha() {
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: base_url + '/form-captcha-refresh',
            success: function (response) {
                if (response.captcha_question) {
                    $('.math-captcha-question').text(response.captcha_question);
                    $('.math-captcha-field').val('');
                    $('.math-captcha-field').each(function () {
                        var id = $(this).attr('id');
                        if (id) {
                            $('#' + id + '_error').html('');
                        }
                    });
                }
            }
        });
    }

    $(document).on('click', '.math-captcha-refresh', function (e) {
        e.preventDefault();
        refreshMathCaptcha();
    });

    $(document).on('click', '.loadMoreBtn', function (e) {
        e.preventDefault();
        var page_type = $(this).data('type');
        var take_count = $(this).data('take_count');
        var currentCount = $('#currentCount').val();
        $('.loadMoreBtn').html('Please wait..!');
        var nextCount = parseInt(currentCount) + take_count;
        $.ajax({
            type: 'POST',
            data: { offset: currentCount, _token: token, type: page_type },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: base_url + '/loadMore',
            success: function (response) {
                $('.appendHere_' + currentCount).after(response);
                $('#loadMoreBtn_' + currentCount).hide();
                $('#loadMoreBtn_' + nextCount).show();
            }
        });
    });

    $(document).on('click', '.submit-form-btn', function (e) {
        e.preventDefault();
        var btn_value = $(this).html();
        var form_flag = $(this).data('flag');
        var email_id = $('#' + form_flag + '_email').val();
        var form_id = $(this).closest('form').attr('id');
        var formData = new FormData(document.getElementById(form_id));
        var required = [];
        var url = $(this).data('url');

        $('.' + form_flag + '-required').each(function () {
            var id = $(this).attr('id');
            if ($('#' + id).val() == '') {
                required.push($('#' + id).val());
                $('#' + id + '_error').html('This field is required');
            } else {
                $('#' + id + '_error').html('');
            }
        });

        if (required.length == 0) {
            var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if (!regex.test(email_id)) {
                swal({
                    title: 'Error',
                    text: 'Please enter a valid email id',
                    type: 'error'
                });
                $('#' + form_flag + '_email').css({ 'border-color': '#FF0000' });
            } else {
                var valid = true;
                if ($('#flexCheckDefault').length > 0 && $('#flexCheckDefault').prop('checked') == false) {
                    valid = false;
                }
                if (valid == true) {
                    $('.submit-form-btn').html('Please wait..!');
                    $('.with-errors').html('');
                    $.ajax({
                        type: 'POST',
                        dataType: 'json',
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: formData,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: base_url + '/' + url,
                        success: function (response) {
                            $('.submit-form-btn').html(btn_value);
                            if (response.status == true) {
                                swal({
                                    title: 'Success',
                                    text: response.message || 'Entry has been submitted successfully',
                                    type: 'success'
                                }, function () {
                                    window.location.reload();
                                });
                            } else if (response.status == 'error') {
                                $('#' + form_flag + '_email').css({ 'border-color': '#FF0000' });
                            } else {
                                if (response.captcha_question) {
                                    $('.math-captcha-question').text(response.captcha_question);
                                    $('.math-captcha-field').val('');
                                }
                                swal({
                                    title: 'Error',
                                    text: response.message,
                                    type: response.status === false ? 'error' : response.status
                                });
                            }
                        }
                    });
                } else {
                    $('#approve_terms_conditions').html('Please accept the conditions');
                    return false;
                }
            }
        }
    });
});
