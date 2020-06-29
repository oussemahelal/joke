<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>List of authors</title>
</head>
<body>
<?php if (isset($error)): ?>
<p>
<?php echo $error; ?>
</p>
<?php else: ?>
<p><?=$totalauthors?> authors have been submitted to The internet Joke Database.</p>
<?php foreach ($authors as $author): ?>
<blockquote>
<p>
<?=htmlspecialchars($author['email'],
ENT_QUOTES, 'UTF-8')?>
(by <a href="mailto:<?php
echo htmlspecialchars($author['email'], ENT_QUOTES, 'UTF-8');?>"><?php
echo htmlspecialchars($author['name'], ENT_QUOTES, 'UTF-8');?></a> on 
<?php
$date= new DateTime($author['date']);
echo $date->format('jS F Y');
?>)
<a href= "editjoke.php?id=<?=$author['id'];?>">Edit</a>
<form action="deletejokes.php" method="post">
<input type="hidden" name="id" value="<?=$author['id']?>">
<input type="submit" value="Delete">
</form>
</p>
</blockquote>
<?php endforeach; ?>
<?php endif; ?>
</body>
</html>