<!-- lore.htm -->
<!-- NEED TO FIGURE OUT HOW TO ADD CONTENT -->
<?php foreach (($loreDBItems?:[]) as $item): ?>
  <h3><?= ($item['loreItem']) ?></h3>
  <p><?= ($item['loreSummary']) ?> </p>
  <p><?= ($item['loreDescription']) ?> </p>
<?php endforeach; ?>
