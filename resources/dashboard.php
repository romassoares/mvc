<?php include 'header.php'; ?>

<div>welcome !!! <?php echo $_SESSION['user']->name ?> <a href="/logout">Logout</a></div>
<a href="/">return to home</a>
<hr>

<fieldset>
    <legend>order</legend>
    <div>
        <div>9, 7, 0, 0, 2, 19</div>
        <?php foreach ($sort as $key => $value) { ?>
            <span><?php echo $value ?></span>
        <?php } ?>
    </div>
</fieldset>

<fieldset>
    <legend>change priority</legend>
    <?php foreach ($priority as $key => $value) { ?>
        <div><?php echo "nome: " . $value['name'] ?></div>
    <?php } ?>
    <div>[9, 7, 0, 0, 2, 19]</div>
    <input type="number">
</fieldset>

<?php include 'footer.php' ?>