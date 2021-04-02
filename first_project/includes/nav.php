<ul>
    <?php

    foreach ($nacItems as $items) {
        echo "<li><a href=\"$items[slug]\">$items[title]</a></li>";
    }
    ?>
</ul>