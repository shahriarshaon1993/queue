<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Gemcon Offers</title>
</head>

<body style="margin:0; padding:0; font-family: Arial, sans-serif; background-color:#f4f4f7;">

    <table align="center" width="100%" cellpadding="0" cellspacing="0" style="padding:20px;">
        <tr>
            <td align="center">
                <table width="700" cellpadding="0" cellspacing="0"
                    style="background:#ffffff; border-radius:10px; overflow:hidden; box-shadow:0 4px 10px rgba(0,0,0,0.1);">

                    <!-- Header -->
                    <tr>
                        <td align="center" style="background:#2563eb; padding:25px;">
                            <h1 style="color:#ffffff; margin:0; font-size:22px;">
                                👥 Gemcon Offers
                            </h1>
                        </td>
                    </tr>

                    <!-- Body -->
                    <tr>
                        <td style="padding:30px; color:#333333; font-size:15px; line-height:1.6;">
                            <p>Hello {{ $user->name }},</p>
                            <p>You can activate our 100 Gp- Gp SMS bundle package only at BDT 5.00</p>

                            <p style="margin-top:30px;">Thanks,<br><strong>{{ config('app.name') }} System</strong></p>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td align="center" style="background:#f9fafb; padding:20px; font-size:13px; color:#777;">
                            &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>

</body>

</html>
