<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Registration Successful</title>
</head>

<body style="margin:0; padding:0; font-family: Arial, sans-serif; background-color:#f4f4f7;">
    <table align="center" width="100%" cellpadding="0" cellspacing="0" style="padding:20px;">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0"
                    style="background:#ffffff; border-radius:10px; overflow:hidden; box-shadow:0 4px 10px rgba(0,0,0,0.1);">

                    <!-- Header -->
                    <tr>
                        <td align="center" style="background:#4f46e5; padding:30px;">
                            <h1 style="color:#ffffff; margin:0; font-size:24px;">🎉 Registration Successful</h1>
                        </td>
                    </tr>

                    <!-- Body -->
                    <tr>
                        <td style="padding:30px; color:#333333; font-size:16px; line-height:1.6;">
                            <p>Hi <strong>{{ $user->name }}</strong>,</p>
                            <p>Thank you for registering with <strong>{{ config('app.name') }}</strong>. Your account
                                has been created successfully!</p>

                            <h3 style="color:#4f46e5; margin-top:20px;">✅ Your Account Details</h3>
                            <ul style="padding-left:20px; margin:10px 0;">
                                <li><strong>Name:</strong> {{ $user->name }}</li>
                                <li><strong>Email:</strong> {{ $user->email }}</li>
                            </ul>

                            <div style="text-align:center; margin:30px 0;">
                                <a href="{{ url('/') }}"
                                    style="background:#4f46e5; color:#ffffff; text-decoration:none; padding:12px 24px; border-radius:6px; font-size:16px; display:inline-block;">
                                    Login to Your Account
                                </a>
                            </div>

                            <p>If you didn’t create this account, please contact our support team immediately.</p>
                            <p style="margin-top:30px;">Thanks,<br><strong>{{ config('app.name') }} Team</strong></p>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td align="center" style="background:#f9fafb; padding:20px; font-size:14px; color:#777;">
                            &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>

</body>

</html>
