<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tests - login</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <div>
        <h1>Login</h1><a href="/dashboard">Dashboard</a>
        <div>
            <div>
                <?php echo isset($msg) ? $msg : "" ?>
            </div>
            <form action="/authenticate" method="post">
                <input type="email" name="email" id="email" value="romas2@email.com" />
                <input type="text" name="cpf" id="cpf" value="12345678" />
                <button type="submit">login</button>
            </form>
        </div>
    </div>
</body>

</html>