<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Latest User Registrations</title>
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
                                👥 Latest {{ count($users) }} User Registrations
                            </h1>
                        </td>
                    </tr>

                    <!-- Body -->
                    <tr>
                        <td style="padding:30px; color:#333333; font-size:15px; line-height:1.6;">
                            <p>Hello Admin,</p>
                            <p>Here are the latest <strong>10 registered users</strong> on
                                <strong>{{ config('app.name') }}</strong>:
                            </p>

                            <!-- User Table -->
                            <table width="100%" cellpadding="10" cellspacing="0" border="1"
                                style="border-collapse: collapse; margin-top:15px; font-size:14px;">
                                <thead style="background:#f3f4f6;">
                                    <tr>
                                        <th align="left">#ID</th>
                                        <th align="left">Name</th>
                                        <th align="left">Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <p style="margin-top:20px;">Keep track of user activity and ensure proper monitoring.</p>

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
