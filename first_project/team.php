<?php
define("TITLE", "Team | Franklin's Fine Dining");
include('includes/header.php');
?>
<div id="team-members" class="cf" style="text-align: center;">
    <h1>Our Team at Franklin's</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean viverra metus massa, non aliquam lorem efficitur eu. Cras fringilla interdum justo, id varius tellus efficitur non. Sed porttitor justo a velit tempor dignissim. Vestibulum vel dignissim ante. Morbi sed arcu finibus libero hendrerit viverra id quis felis. Aliquam ut enim imperdiet, hendrerit justo a, tempus velit. Praesent sollicitudin tellus nibh, molestie interdum erat semper non. Curabitur maximus bibendum justo id scelerisque. Donec quis luctus eros, vitae viverra nisi. Sed et quam tempus, pulvinar ex sed, vulputate dolor. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec venenatis, leo a tempor consequat, felis eros semper odio, sit amet consequat eros lorem pretium velit.<br><strong> Ut varius egestas lectus, blandit molestie ante bibendum ut.</strong></p>
    <hr>

    <?php
    foreach ($teamMembers as $member) {
    ?>

        <div class="member">
            <img src="static/img/<?php echo $member[img]; ?>.jpg" alt="<?php echo $member[name]; ?>">
            <h2><?php echo $member[name]; ?></h2>
            <p><?php echo $member[bio]; ?></p>
        </div>

    <?php
    }
    ?>
</div><!-- team-members -->
<hr>
<?php include('includes/footer.php'); ?>