<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mvc basic - login</title>
</head>

<body>
    <div>
        <h1>Login</h1><a href="/dashboard">Dashboard</a>
        <div>
            <form action="/authenticate" method="post">
                <input type="email" name="email" id="email" value="romas@email.com" />
                <input type="text" name="cpf" id="cpf" value="12345678" />
                <button type="submit">login</button>
            </form>
        </div>
    </div>
</body>

</html>