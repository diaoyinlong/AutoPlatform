/**
 * Created by diao on 17-4-26.
 */

$(function () {
    // document.forms['ehomePaySubmit'].submit();
    $('#sign_btn').click(function () {
        $.post('/mock/interface/getSign', {
                data: {
                    prodCatalog: $('#prodCatalog').val(),
                    subject: $('#subject').val(),
                    input_charset: $('#input_charset').val(),
                    notify_url: $('#notify_url').val(),
                    orderTime: $('#orderTime').val(),
                    partnerFlow: $('#partnerFlow').val(),
                    operator: $('#operator').val(),
                    currency: $('#currency').val(),
                    orderNo: $('#orderNo').val(),
                    totalAmount: $('#totalAmount').val(),
                    service: $('#service').val(),
                    seller_id: $('#seller_id').val(),
                    partner: $('#partner').val(),
                    extend_params: $('#extend_params').val(),
                    sign_key: $('#sign_key').val()
                }
            },
            function (res) {
                $('#sign_value').val(res);
            })
    });

    $('#test_env').click(function () {
        $('.btn.btn-default.dropdown-toggle').text('测试环境');
        $('#notify_url').val('http://10.12.9.23:8083/poscashier_web/payByOrderPos/callback.do');
        $('#ehomePaySubmit').attr('action','http://10.12.9.23:8083/poscashier_web/payByOrderPos/index');
    });

    $('#huidu_env').click(function () {
        $('.btn.btn-default.dropdown-toggle').text('灰度环境');
        $('#notify_url').val('http://10.12.8.53:8080/poscashier_web/payByOrderPos/callback.do');
        $('#ehomePaySubmit').attr('action','http://10.12.8.53:8080/poscashier_web/payByOrderPos/index');
    });
});