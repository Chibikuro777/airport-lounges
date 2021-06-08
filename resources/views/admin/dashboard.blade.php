<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    login成功
    @if (session('login_success'))
        <div class="alert alert_success">
            {{ session('login_success') }}
        </div>
    @endif
</body>
</html>