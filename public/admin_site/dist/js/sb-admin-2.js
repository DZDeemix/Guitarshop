/*!
 * Start Bootstrap - SB Admin 2 v3.3.7+1 (http://startbootstrap.com/template-overviews/sb-admin-2)
 * Copyright 2013-2016 Start Bootstrap
 * Licensed under MIT (https://github.com/BlackrockDigital/startbootstrap/blob/gh-pages/LICENSE)
 */
$(function() {
    $('#side-menu').metisMenu();
});

//Loads the correct sidebar on window load,
//collapses the sidebar on window resize.
// Sets the min-height of #page-wrapper to window size
$(function() {
    $(window).bind("load resize", function() {
        var topOffset = 50;
        var width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;
        if (width < 768) {
            $('div.navbar-collapse').addClass('collapse');
            topOffset = 100; // 2-row-menu
        } else {
            $('div.navbar-collapse').removeClass('collapse');
        }

        var height = ((this.window.innerHeight > 0) ? this.window.innerHeight : this.screen.height) - 1;
        height = height - topOffset;
        if (height < 1) height = 1;
        if (height > topOffset) {
            $("#page-wrapper").css("min-height", (height) + "px");
        }
    });

    var url = window.location;
    // var element = $('ul.nav a').filter(function() {
    //     return this.href == url;
    // }).addClass('active').parent().parent().addClass('in').parent();
    var element = $('ul.nav a').filter(function() {
        return this.href == url;
    }).addClass('active').parent();

    while (true) {
        if (element.is('li')) {
            element = element.parent().addClass('in').parent();
        } else {
            break;
        }
    }
});

(function ($) {
    $(function () {


        $('.active-gallery-item')
            .on('click', '.active-gallery-del', function () {
                var galleryId = $(this).data('id');
                var csrf = $('.product-wrapper').find('input').filter(function() {
                    return $(this).attr('name') == '_token'
                }).val();

                $.ajax({
                    url: '/admin/product/img',
                    data: {
                        _token: csrf,
                        action: 'delImage',
                        galleryId: galleryId
                    },
                    type: 'POST',
                    dataType: 'json',
                    success: function (response) {
                        if (response.error === 1) {


                            $('#page-wrapper').prepend(response.html);
                            setTimeout(function () {
                                $('.gall-error').hide(300);
                            }, 2000);

                        }else {
                            $('[data-id=' + galleryId + ']').closest('div').remove();
                        }
                    },
                    error: function (xhr) {
                        console.log('error', xhr.responseText);
                    }
                });

            });

    })
})(jQuery);