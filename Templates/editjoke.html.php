<form action="" method="post">
    <input type="hidden" name="jokeid" value="<?= $joke['id'] ?? '' ?>">
    <label for="joketext">Type your joke here:
    </label>
    <textarea id="joketext" name="joketext" value="<?= $joke['joketext'] ?? '' ?>" rows="3" cols="40"><?php if (isset($joke)) : ?>
<?= $joke['joketext'] ?? '' ?>
<?php endif; ?></textarea>
    <input type="submit" name="submit" value="Save">
</form>