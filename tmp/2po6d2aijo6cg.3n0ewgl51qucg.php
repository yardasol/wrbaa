<!-- wrbaa.htm -->
<!DOCTYPE html>
  <html>
    <head>
      <title> <?= ($title) ?> </title>
      <link rel="stylesheet" type="text/css" href="wrbaa.css">
      <link rel="stylesheet" href="plume-css/lib/plume-all.css">
      <style>
      html {
        -webkit-text-size-adjust: 100%; /* 2 */
      }
      body {
        margin: 0;
      }
      </style>
    </head>

    <body>
      <?php echo $this->render('header.htm',NULL,get_defined_vars(),0); ?>
      <?php echo $this->render($content,NULL,get_defined_vars(),0); ?>
    </body>
  </html>
