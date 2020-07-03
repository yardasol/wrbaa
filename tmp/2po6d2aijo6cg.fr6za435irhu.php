<!-- history.htm -->
<!-- NEED TO FIGURE OUT HOW TO ADD CONTENT -->
<?php foreach (($historyDBItems?:[]) as $item): ?>
  <h3><?= ($item['historyPeriod']) ?></h3>
  <h4>Summary:</h4>
  <p><?= ($item['historySummary']) ?> </p>
  <h4>Detailed description:</h4>
  <p><?= ($item['historyDescription']) ?> </p>
<?php endforeach; ?>
