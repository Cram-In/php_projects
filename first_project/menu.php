<?php
define("TITLE", "Menu | Franklin's Fine Dining");
include('includes/header.php');
?>
<div id="menu-items">
    <h1 style="text-align: center;">Our Delicious Menu</h1>
    <p style="text-align: center;">Not the bigest choice &mdash; but dang, does it ever pack a punch!</p>
    <p style="text-align: center;"><em>Click any menu item to learn more about it</em></p>

    <hr>

    <ul>
        <?php foreach ($menuItems as $dish => $item) { ?>

            <li><a href="dish.php?item=<?php echo $dish; ?>"><?php echo $item[title]; ?></a> <strong><sup>£</sup><?php echo $item[price]; ?></li></strong>

        <?php
        }
        ?>


    </ul>
    <hr>
</div>



<?php include('includes/footer.php'); ?>