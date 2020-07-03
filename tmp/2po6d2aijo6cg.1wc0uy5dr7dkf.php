<!-- archives.htm --><!-- NEED TO FIGURE OUT HOW TO ADD CONTENT -->
<?php foreach (($archivesDBItems?:[]) as $item): ?>
      <h3><?= ($item['fileTitle']) ?></h3>
      <img src="<?= ($item['filePath']) ?>" alt="<?= ($item['fileTitle']) ?>">
      <p><?= ($item['fileDescription']) ?></p>
<?php endforeach; ?>
