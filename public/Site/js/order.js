(function ($) {
    $(function () {

        function checkEmail(value) {
            var emailPattern = /^[a-z0-9_-]+@[a-z0-9-]+\.[a-z]{2,6}$/i;
            if (value.search(emailPattern)) {
                return false;
            } else {
                return true;
            }
        }

        $('.modal-content')
            .on('click', '.order-submit', function () {

                var csrf = $('.order-wrapper').find('input').filter(function() {
                    return $(this).attr('name') == '_token'
                }).val();
                var productId = $('.order-field-product_id').val();
                var email = $('.order-field-email').val();
                var content = $('.order-field-content').val();

                if (email && checkEmail(email)) {

                    $.ajax({
                        url: '/order/new_order',
                        data: {
                            _token: csrf,
                            action: 'newOrder',
                            product: productId,
                            email: email,
                            comment: content
                        },
                        type: 'POST',
                        dataType: 'json',
                        success: function (response) {
                            if (response.error === 1) {
                                $('.order-response').find('span').html('<h3>Ошибка</h3><p>Попробуте позже или всяжитесь с нами</p>');
                            }
                            $('.order-wrapper').hide();
                            $('.order-response').show();
                        },
                        error: function (xhr) {
                            console.log('error', xhr.responseText);
                        }
                    });

                } else {
                    $('.order-field-email').css({'border': '1px solid red'});
                }
            });


    })
})(jQuery);