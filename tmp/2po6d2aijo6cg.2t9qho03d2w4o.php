<!-- home.htm --><!-- NEED TO FIGURE OUT HOW TO ADD CONTENT -->
<?php foreach (($homeDBItems?:[]) as $item): ?>
    <h3><?= ($item['homeItem']) ?></h3>
    <p><?= ($item['homeContent']) ?></p>
<?php endforeach; ?>
