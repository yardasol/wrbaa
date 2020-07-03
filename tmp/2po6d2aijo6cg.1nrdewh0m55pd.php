<!-- people.htm -->
<!-- NEED TO FIGURE OUT HOW TO ADD CONTENT -->
<?php foreach (($peopleDBItems?:[]) as $item): ?>
  <h3><?= ($item['personName']) ?></h3>
  <p><?= ($item['personSummary']) ?> </p>
  <p><?= ($item['personDetails']) ?> </p>
<?php endforeach; ?>
