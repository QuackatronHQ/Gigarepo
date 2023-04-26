<?php
/*
 * A PHP file for testing PHP-CS-Fixer
 */
?>

<div class='grid_6 leading table-100'>
<h2>Section A </h2>
<?= render_it($data,
    $cols,
    array_merge($keys, A("render_options")),
    "Not Found"); ?>
</div>


<div class='grid_6 leading table-100'>
<h2>Section B</h2>
<?= render_it($data,    $cols,
    array_merge($keys, A("render_options")),
    "Not Found"); ?>
</div>

<div class='grid_6 leading table-100'>
<h2>Section C</h2>
<?= render_it($data,   $cols,    array_merge($keys, A("render_options")),
    "Not Found"); ?>
</div>
