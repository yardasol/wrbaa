<!-- wrbaa.htm -->
<!--
<one line to give the program's name and a brief idea of what it does.>
Copyright (C) 2020 Oleksandr Yardas

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <https://www.gnu.org/licenses/>.
-->
<!DOCTYPE html>
  <html>
    <head>
      <title> <?= ($title) ?> </title>
      <link rel="stylesheet" type="text/css" href="wrbaa.css">
      <link rel="stylesheet" href="packages/plume-css/lib/plume-all.css">
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
