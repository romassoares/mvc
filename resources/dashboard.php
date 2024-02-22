<?php include 'header.php'; ?>

<div>welcome !!! <?php echo $_SESSION['user']->name ?> <a href="/logout">Logout</a></div>
<a href="/">return to home</a>

<?php include 'footer.php' ?>