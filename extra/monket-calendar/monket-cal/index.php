<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>

  <?php
    include_once('monket-cal-config.php');    
    include_once(MONKET_SOURCE . 'monket-cal-init.php');

    echo getCalInitHTML();
  ?>

</head>
<body>

<h1><?= $MC['title'] ?></h1>

<?php
  include_once(MONKET_SOURCE . 'monket-cal-parse.php');
  displayCalendar();
?>

</body>
</html>
