<style type="text/css">
    @media only screen and (min-device-width: 601px) {
        .content {width: 600px !important;}
    }
    .header {padding: 40px 30px 20px 30px;}
    .description {padding: 20px 30px 20px 30px;}
    .footer{padding: 100px 30px 20px 30px;}

    .block-title{padding:10px 15px 10px 15px;}
    .block-content{padding:10px 15px 10px 15px;}
    .g-bar{height:50px;}
</style>

<!--[if (gte mso 9)|(IE)]>
<table width="600" align="center" cellpadding="0" cellspacing="0" border="0">
    <tr>
        <td style="padding: 20px 0 30px 0;">
        <![endif]-->
        <table class="content" align="center" cellpadding="0" cellspacing="0" border="0" style="border: 1px solid #cccccc;">
            <tr>
                <td class="header" align="center">
                    <img src="http://www.werotterdam.com/images/logo.jpg" />
                </td>
            </tr>
            <tr>
                <td class="g-bar" bgcolor="#12af0d">

                </td>
            </tr>
            <tr>
                <td class="description" style="color: #153643; font-family: Arial, sans-serif; font-size: 14px; line-height: 20px;" bgcolor="#ffffff">
                    Beste {{$order->Fullname}},
                    <br /><br />
                    Hartelijk dank voor uw online bestelling bij We'Rotterdam.
                    Met deze e-mail bevestigen wij dat uw order is ontvangen en sturen wij u de ingevulde gegevens op ter controle.
                    <br />
                    <hr width="100%" height="1">
                    <br />
                    <table width="100%">
                        <tr>
                            <td class="block-title" bgcolor="#12af0d" style="color: #ffffff;">Afleveradres</td>
                        </tr>
                        <tr>
                            <td class="block-content">
                                <table>
                                    <tr><td>Naam</td><td>{{$order->Fullname}}</td></tr>
                                    <tr><td>Straat</td><td>{{$order->Address}}</td></tr>
                                    <tr><td>Postcode</td><td>{{$order->postalcode}}</td></tr>
                                    <tr><td>Plaats</td><td>{{$order->city}}</td></tr>
                                    <tr><td>Land</td><td>{{$order->country}}</td></tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                    <br />
                    <hr width="100%" height="1">
                    <br />
                    <table width="100%">
                        <tr>
                            <td class="block-title" bgcolor="#12af0d" style="color: #ffffff;">Product(en)</td>
                        </tr>
                        <tr>
                            <td class="block-content">
                                <table>
                                    <tr>
                                        <td></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>

            </tr>
            <tr>
                <td class="footer" bgcolor="#dfdfdf">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tr>
                            <td></td>
                            <td align="right">
                                <table>
                                    <tr>
                                        <td><img src="http://www.werotterdam.com/images/twitter_logo_small.png" /></td>
                                        <td><img src="http://www.werotterdam.com/images/fbook_logo_small.png" /></td>
                                    </tr>
                                </table>
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
<![endif]-->