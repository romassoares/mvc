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
    <div>

        <form action="/search" id="searchForm" method="post">
            <input type="text" name="name" id="name">
            <button type="submit">Search</button>
        </form>
        <?php var_dump(App\Auth::isAuthenticated()) ?>
        <!-- <?php if (App\Auth::isAuthenticated() === true) { ?>
            <a href="/dashboard">Dashboard</a>
            <a href="/logout">Logout</a>
        <?php } else { ?>
            <a href="/login">login</a>
        <?php } ?> -->
    </div>
    <div>

        <table>
            <tr>
                <th>name</th>
                <th>email</th>
                <th>cpf</th>
                <th>actions</th>
            </tr>
            <?php
            if (isset($users)) {
                foreach ($users as $key => $user) {
                    echo '<tr>';
                    echo '<td>' . $user['name'] . '</td>';
                    echo '<td>' . $user['email'] . '</td>';
                    echo '<td>' . $user['cpf'] . '</td>';
                    echo '<td><div>
                <a href="/user/edit/' . $user['id'] . '">edit</a>
                <a href="/user/remove/' . $user['id'] . '">remove</a>
                </div></td>';
                    echo '</tr>';
                }
            }
            ?>
        </table>
        <a href="/user/create">New</a>
    </div>
</body>

</html>