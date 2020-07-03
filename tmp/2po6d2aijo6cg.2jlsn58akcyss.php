<!-- events.htm -->
<!-- NEED TO FIGURE OUT HOW TO ADD CONTENT -->
<?php foreach (($eventsDBItems?:[]) as $item): ?>
  <h3><?= ($item['eventDate']) ?> at <?= ($item['eventLocation']) ?>: <?= ($item['eventName']) ?> </h3>
  <p><?= ($item['eventDescription']) ?></p>
<?php endforeach; ?>
