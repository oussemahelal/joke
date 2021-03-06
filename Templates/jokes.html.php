<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>List of jokes</title>
</head>

<body>
    <?php if (isset($error)) : ?>
        <p>
            <?php echo $error; ?>
        </p>
    <?php else : ?>
        <p><?= $totalJokes ?> jokes have been submitted
            to the Internet Joke Database.</p>
        <?php foreach ($jokes as $joke) : ?>
            <blockquote>
                <p>
                    <?= htmlspecialchars($joke['joketext'], ENT_QUOTES, 'UTF-8') ?>
                    (by <a href="mailto:<?= htmlspecialchars($joke['email'], ENT_QUOTES, 'UTF-8'); ?>">
                        <?= htmlspecialchars($joke['name'], ENT_QUOTES, 'UTF-8'); ?></a> on
                    <?php
                            $date = new DateTime($joke['jokedate']);
                            echo $date->format('jS F Y'); ?>)
                            <?php if ($userId == $joke['authorid']): ?>
                    <a href="/joke/edit?id=<?= $joke['id'] ?>">Edit
                    </a>
                    <form action="/joke/delete" method="post">
                        <input type="hidden" name="id" value="<?= $joke['id'] ?>">
                        <input type="submit" value="Delete">
                    </form>
                    <?php endif; ?>
                </p>
            </blockquote>
        <?php endforeach; ?>
    <?php endif; ?>
</body>

</html>