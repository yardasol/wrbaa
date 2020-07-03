<!-- news.htm --><!-- NEED TO FIGURE OUT HOW TO ADD CONTENT -->
<?php foreach (($newsDBItems?:[]) as $item): ?>
    <h3><?= ($item['newsHeadline']) ?></h3>
    <p><?= ($item['newsDate']) ?></p>
    <p><?= ($item['newsSummary']) ?></p>
    <p><?= ($item['newsDescription']) ?></p>
<?php endforeach; ?>
