<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>welcome !!! <?php echo $_SESSION['user']->name ?> <a href="/logout">Logout</a></div>
    <a href="/">return to home</a>
</body>

</html>