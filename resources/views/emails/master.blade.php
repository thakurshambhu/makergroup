<!DOCTYPE html>
<html>

<head>
    <title>The Maker Group</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <style type="text/css">
        /* CLIENT-SPECIFIC STYLES */
        
        body,
        table,
        td,
        a {
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }
        /* Prevent WebKit and Windows mobile changing default text sizes */
        
        table,
        td {
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }
        /* Remove spacing between tables in Outlook 2007 and up */
        
        img {
            -ms-interpolation-mode: bicubic;
        }
        /* Allow smoother rendering of resized image in Internet Explorer */
        /* RESET STYLES */
        
        img {
            border: 0;
            height: auto;
            line-height: 100%;
            outline: none;
            text-decoration: none;
            max-width: 100%;
        }
        
        table {
            border-collapse: collapse !important;
        }
        
        body {
            height: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
            width: 100% !important;
        }
        /* iOS BLUE LINKS */
        
        a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }
        /* MOBILE STYLES */
        
        @media screen and (max-width: 525px) {
            /* ALLOWS FOR FLUID TABLES */
            .wrapper {
                width: 100% !important;
                max-width: 100% !important;
            }
            /* ADJUSTS LAYOUT OF LOGO IMAGE */
            .logo img {
                margin: 0 auto !important;
            }
            /* USE THESE CLASSES TO HIDE CONTENT ON MOBILE */
            .img-max {
                max-width: 100% !important;
                width: 100% !important;
                height: auto !important;
            }
            /* FULL-WIDTH TABLES */
            .responsive-table {
                width: 100% !important;
            }
            /* UTILITY CLASSES FOR ADJUSTING PADDING ON MOBILE */
            .padding {
                padding: 0px 5% 0px 5% !important;
            }
            .paddingtop {
                padding: 7px 5% 7px 5% !important;
            }
            .padding-meta {
                padding: 30px 5% 0px 5% !important;
                text-align: center;
            }
            .no-padding {
                padding: 0 !important;
            }
            .section-padding {
                padding: 50px 15px 50px 15px !important;
            }
            /* ADJUST BUTTONS ON MOBILE */
            .mobile-button-container {
                margin: 0 auto;
                width: 100% !important;
            }
            .mobile-button {
                padding: 15px !important;
                border: 0 !important;
                font-size: 16px !important;
                display: block !important;
            }
        }
        /* ANDROID CENTER FIX */
        
        div[style*="margin: 16px 0;"] {
            margin: 0 !important;
        }
    </style>
</head>

<body style="margin: 0 !important; padding: 0 !important;">
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td bgcolor="#ffffff" align="center">
                <!-- HEADER -->
                <!--[if (gte mso 9)|(IE)]>
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
            <![endif]-->
                <table bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;" class="wrapper">
                    <tr>
                        <td height="40"></td>
                    </tr>
                    <tr>
                        <td>
                            <table border="1" bordercolor="#d4d4d4" cellpadding="0" cellspacing="0" width="100%" style=" border: 1px solid #d4d4d4; border-radius: 5px; -webkit-border-radius: 5px; box-shadow: 0px 0px 7px rgba(1,1,1,0.29); -webkit-box-shadow: 0px 0px 7px rgba(1,1,1,0.29);"
                                class="responsive-table">
                                <tr>
                                    <td bgcolor="#f6f6f6" align="left" style="text-align: center;">
                                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                            <tr>
                                                <td align="left" valign="middle" class="logo" style="padding: 10px 20px; text-align: center;">
                                                    <a href="#" target="_blank"> <img alt="Logo" height="30" width="240" src="{{ asset('paper')}}/img/brand_logo.jpg"><img> </a>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                @yield('main_content')
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td height="40"></td>
                    </tr>
                    <tr>
                        <td align="center" style="font-size: 15px; line-height: 18px; font-family: Helvetica, Arial, sans-serif; color: #4f4f4f;">For queries? Call Us at <span style="font-weight: bold">1-800-987-1553</span> or email <a href="mailto:info@themakergroup.com">info@themakergroup.com</a> </td>
                    </tr>
                    <tr>
                        <td height="33"></td>
                    </tr>
                </table>
                <!--[if (gte mso 9)|(IE)]>
            </table>
            <![endif]-->
            </td>
        </tr>
    </table>
</body>

</html>