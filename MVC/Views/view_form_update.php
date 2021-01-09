<?php require "view_begin.php" ?>

<h1> Add a Nobel Prize </h1>
            
<form action = "?controller=set&action=update" method="post">
    <p> <label> Name: <input type="text" name="name" value="<?= e($name) ?>"/> </label> </p>
    <p> <label> Year: <input type="text" name="year" value="<?= e($year) ?>"/> </label></p>
    <p> <label> Birth Date: <input type="text" name="birthdate" value="<?= e($birthdate) ?>"/></label> </p>
    <p> <label> Birth Place: <input type="text" name="birthplace" value="<?= e($birthplace) ?>"/> </label></p>
    <p> <label> County: <input type="text" name="county" value="<?= e($county) ?>"/></label> 
    <input type="hidden" name="id" value="<?= e($id) ?>"/>
    </p>

    <p>
    <?php foreach($categories as $cat): ?>
        <label> <input type="radio" name="category" value="<?= e($cat) ?>"  
        <?php
        if ($category == $cat){ echo 'checked="checked"';}
        ?>
        > <?= ucfirst(e($cat)) ?> </label>
    <?php endforeach ?>
    <label> <input type="radio" name="category" value="info" > informatique </label>

    </p>
    <textarea name="motivation" cols="70" rows="10"> <?= e($motivation) ?>  </textarea>
    <p>  <input type="submit" value="Update database"/> </p>
</form>

<?php require "view_end.php" ?>