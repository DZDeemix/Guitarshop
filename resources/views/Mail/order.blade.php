<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--Источник--http://webdesign.tutsplus.com/ru/articles/creating-a-simple-responsive-html-email--webdesign-12978-->



<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Спасибо за заказ в магазине PVB</title>

<style type="text/css">
    @media only screen and (min-device-width: 601px) {.content {width: 600px !important;}}
    body[yahoo] .class {}
    .button {text-align: center; font-size: 18px; font-family: sans-serif; font-weight: bold; padding: 0 30px 0 30px;}
    .button a {color: #ffffff!important; text-decoration: none;}
    .button a:hover {text-decoration: underline;}

    @media only screen and (max-width: 550px), screen and (max-device-width: 550px) {
        body[yahoo] .buttonwrapper {background-color: transparent!important;}
        body[yahoo] .button a {background-color: #e05443; padding: 15px 15px 13px!important; display: block!important;}
</style>
</head>

<body yahoo bgcolor="#f6f8f1" style="margin: 0; padding: 0; min-width: 100%; background-color: #f6f8f1;">
<!--[if (gte mso 9)|(IE)]>
<table width="600" align="center" cellpadding="0" cellspacing="0" border="0">
    <tr> <td><![endif]-->




    <table class="content" align="center" cellpadding="0" cellspacing="0" border="0" style="width: 100%; max-width: 600px;">
    <!--Header-->
    <tr>
        <td bgcolor="#c7d8a7" style="padding: 40px 30px 20px 30px;">

            <!--LOGO-->
            <table width="95" align="left" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td height="70" style="padding: 0 20px 20px 0;">

                        <!--ТУТ ССЫЛКА НА ЛОГО-->
                        <img src="/Site/images/logo/logo_pvb3.svg" width="100"  border="0" alt="" />
                    </td>
                </tr>
            </table><!--END-LOGO-->

            <!--Заглавие-->
            <!--[if (gte mso 9)|(IE)]>
            <table width="425" align="left" cellpadding="0" cellspacing="0" border="0">
                <tr>
                    <td>
            <![endif]-->

            <table class="col425" align="left" border="0" cellpadding="0" style="width: 100%; max-width: 400px;">
                <tr>
                    <td height="70">
                        <table width="100%" border="0" cellspacing="0">

                            <tr>
                                <td class="h1" style="padding: 5px 0 0 0; font-size: 33px; line-height: 38px; font-weight: bold; color: #153643; font-family: sans-serif;">
                                   Новый заказ от {{ $order->guest->email }}
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]--><!--END-ЗАГЛАВИЕ-->

        </td>
    </tr>


    <!--ТЕЛО ПИСЬМА-->
    <tr>
        <td class="content" bgcolor="#ffffff" style="width: 100%; max-width: 600px; padding: 30px 30px 30px 30px; border-bottom: 1px solid #f2eeed;">

            <table width="100%" border="0" cellspacing="0" cellpadding="0">


                <!--НАЧАЛО-->
                <tr>
                    <td style="color: #153643; font-family: sans-serif; font-size: 16px; line-height: 22px;">

                        <table border="2" cellspacing="0" cellpadding="10" style="border:#ccc 1px solid; border-collapse:separate; border-spacing: 0; width: 100%;">
                                <tr>
                                        <td>Название</td>
                                        <td>email</td>
                                        <td>цена</td>
                                        <td style="word-break: break-all;">Коментарий</td>
                                </tr>
                                <tr >
                                        <td>{{ $order->product->title  }}</td>
                                        <td>{{ $order->guest->email    }}</td>
                                        <td>{{ $order->product->price  }}</td>
                                        <td style="word-break: break-all;">{{ $order->content  }}</td>
                                </tr>
                        </table>

                        <!--КНОПКА Button-->
                        <table class="buttonwrapper" bgcolor="#e05443" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td class="button" height="45" style="text-align: center; font-size: 18px; font-family: sans-serif; font-weight: bold; padding: 0 30px 0 30px;">

                                    <!--ТЕКСТ И ССЫЛКА КНОПКИ-->
                                    <a style="color: #ffffff; text-decoration: none;" href="/admin/orders/show">К заказу</a>
                                </td>
                            </tr>
                        </table><!--/Button-->


                    </td>
                </tr><!--/НАЧАЛО-->

                <!--КАРТИНКА-->
                <tr>
                    <td style="padding: 30px 30px 30px 30px;">
                        <img src="/Site/images/logo/logo_pvb3.svg" width="100%" border="0" style="height: auto;" alt="" />
                    </td>
                </tr><!--/КАРТИНКА-->




            </table>
        </td>
    </tr>



</body>
</html>