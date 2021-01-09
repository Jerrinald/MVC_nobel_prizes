<?php require "view_begin.php" ?>

<h1> List of Nobel prizes </h1>


<p>
<?php if($previous):?>
<a href="?controller=list&action=pagination&start=<?= $start - 1 >= 0? $start - 1 : 0?>"><img src="Content/img/previous-icon.png" class="icone"></a>
<?php endif ?>

<?php for($p = $debut; $p <= $fin; $p++): ?>
<a <?= $start == $p ? 'class="active"' : '' ?> href="?controller=list&action=pagination&start=<?= $p ?>"> <?= $p ?> </a>
<?php endfor ?>

<?php if($next):?>
<a href="?controller=list&action=pagination&start=<?= $start + 1?>"><img src="Content/img/next-icon.png" class="icone"></a>
</p>
<?php endif ?>


<?php require "view_list_nobel.php" ?>



<?php require "view_end.php" ?>