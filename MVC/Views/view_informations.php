<?php require "view_begin.php" ?>

<h1> Informations on <?= e($name) ?> </h1>


<h2> <?= e($name) ?> got a nobel prize in <?php if($year ==null){echo "???";}else{echo e($year); }  ?> in <?= e($category) ?> for the following. </h2>

<p> <?= e($motivation) ?>

<h2> Additional information </h2>

<p> <?= e($name) ?> was born in  <?= e($birthdate) === null ? "???" : e($birthdate) ?> in <?php if($birthplace ==null){echo "???";}else{echo e($birthplace); }  ?>  and lives now in <?= e($county) ?> </p>

<?php require "view_end.php" ?>