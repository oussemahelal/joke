<?php if (!empty($errors)) :?>
    <div class="errors">
        <p>Your account could not be created,
            please check the following:</p>
        <ul>
            <?php foreach ($errors as $error) :?>
                <li><?= $error ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif;?>

<form action="" method="post">
    <label for="email">Your email address</label>
    <center><input name="author[email]" id="email" type="text" value="<?=$author['email'] ?? '' ?>"></center>
    <br><label for="name">Your name</label>
    <center><input name="author[name]" id="name" type="text" value="<?=$author['name'] ?? '' ?>"></center>
    <br><label for="password">Password</label>
    <center><input name="author[password]" id="password" type="password" value="<?=$author['password'] ?? '' ?>"></center>
    <br><input type="submit" name="submit" value="Register account">
</form>
