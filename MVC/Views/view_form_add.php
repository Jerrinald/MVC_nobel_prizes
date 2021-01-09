<?php require "view_begin.php" ?>

<form action="?controller=set&action=add" method="post">
<p> Name :<br/><input type="text" name="name"></p>
<p> Year :<br/><input type="text" name="year"></p>
<p> Birthdate :<br/><input type="text" name="birthdate"></p>
<p> Birthplace :<br/><input type="text" name="birthplace"></p>
<p> County :<br/><input type="text" name="county"></p>


<?php foreach ($categories as $cat) : ?>
	<input type="radio" name="category" value="<?= e($cat) ?>"> <?= ucfirst($cat) ?><br/>
<?php endforeach ?>

<br/><textarea name="motivation" rows=10 cols=80></textarea>
<br/><input type="submit" value="ajouter">

<?php require "view_end.php" ?>