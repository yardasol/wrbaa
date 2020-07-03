<!-- stories.htm -->
<!-- NEED TO FIGURE OUT HOW TO ADD CONTENT -->
<?php foreach (($storiesDBItems?:[]) as $item): ?>
  <h3><?= ($item['storyTitle']) ?></h3>
  <p><?= ($item['storySummary']) ?> </p>
  <p><?= ($item['storyContent']) ?> </p>
<?php endforeach; ?>
