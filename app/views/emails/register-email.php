<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to SEMSYS</title>
</head>

<body style="margin:0;padding:0;background-color:#f3f4f6;font-family:Arial,sans-serif;">
<table width="100%" cellpadding="0" cellspacing="0" style="padding:40px 0;background-color:#f3f4f6;">
<tr>
<td align="center">

<table width="100%" cellpadding="0" cellspacing="0"
       style="max-width:600px;background:#ffffff;border-radius:8px;box-shadow:0 2px 10px rgba(0,0,0,.1);">

    <!-- HEADER -->
    <tr>
        <td style="background:#1d4ed8;padding:20px;text-align:center;">
            <img src="https://cdn-icons-png.flaticon.com/512/2910/2910768.png"
                 style="width:80px;border-radius:50%;margin-bottom:10px;">
            <h1 style="color:#fff;font-size:22px;margin:0;">SEMSYS</h1>
        </td>
    </tr>

    <!-- BODY -->
    <tr>
        <td style="padding:30px;color:#1f2937;">
            <h2>🎉 Welcome, <?= htmlspecialchars($name) ?>!</h2>

            <p>Thank you for registering with <strong>SEMSYS</strong>.</p>

            <p><strong>Email:</strong> <?= htmlspecialchars($email) ?></p>
            <p>
                <strong>Password:</strong>
                <span style="color:#16a34a;"><?= htmlspecialchars($password) ?></span>
            </p>

            <p style="margin-top:20px;">
                ✅ Please log in using the credentials above.<br>
                🔒 Change your password after first login.
            </p>

            <div style="text-align:center;margin:30px 0;">
                <a href="http://localhost/semsys/public"
                   style="background:#2563eb;color:#fff;padding:12px 24px;
                          border-radius:6px;text-decoration:none;">
                    Go to SEMSYS
                </a>
            </div>

            <p style="font-size:14px;color:#6b7280;">
                If you did not register, please ignore this email.
            </p>
        </td>
    </tr>

    <!-- FOOTER -->
    <tr>
        <td style="background:#f9fafb;text-align:center;padding:15px;font-size:12px;color:#9ca3af;">
            &copy; <?= date('Y') ?> SEMSYS. All rights reserved.
        </td>
    </tr>

</table>

</td>
</tr>
</table>
</body>
</html>
