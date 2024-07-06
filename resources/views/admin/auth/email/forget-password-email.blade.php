<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>fotget-password-email</title>
</head>

<body>
    <p>Hi,</p>
    <p>You requested a password reset. Click the link below to reset your password:</p>
    <a href="{{ route('password.reset', $token) }}">Reset Password</a>
    <p>If you did not request a password reset, no further action is required.</p>
    <p>Thanks,</p>
    <p>Your Application Team</p>
</body>

</html>
