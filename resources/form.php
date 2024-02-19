<?php
// var_dump($_SESSION);
// die();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>
        <?php if (isset($user)) { ?>
            <form action="/user/update/?id=<?php $user->id ?>" method="post">
                <input type="hidden" name="id" value="<?php echo $user->id ?> ">
            <?php } else { ?>
                <form action="/user/store" method="post"><?php } ?>
                <input type="text" name="name" id="name" placeholder="type your name" value="<?php echo isset($user) ? $user->name : ""; ?>" />
                <input type="email" name="email" id="email" placeholder="type your email" value="<?php echo isset($user) ? $user->email : ""; ?>" />
                <input type="text" name="cpf" id="cpf" placeholder="type your social security number" value="<?php echo isset($user) ? $user->cpf : ""; ?>" />
                <button type="submit">save</button>
                </form>
    </div>
</body>

</html>