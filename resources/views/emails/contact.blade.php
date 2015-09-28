<html>
<head>
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
</head>
<body>

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

            Voornaam: {{$contactinfo->input('firstname')}}<br />
            Achternaam: {{$contactinfo->input('lastname')}}<br /><br />

            Telefoon: {{$contactinfo->input('telephone')}}<br />
            E-mail adres: {{$contactinfo->input('email')}}<br /><br />

            Onderwerp: {{$contactinfo->input('subject')}}<br /><br />

            Bericht
            ========================================================================
            {{$contactinfo->input('message')}}
            ========================================================================

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
</body>
</html>