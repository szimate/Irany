<?php
  if(!isset($page_title)) { $page_title = 'Wellcome!'; }
?>


<!doctype html>

<html lang="hu">
  <head>
    <title>GS - <?php echo h($page_title); ?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" media="all" href="<?php echo url_for('/stylesheets/data_manager.css'); ?>" />
  </head>

  <body>

    <header>
      <h1>Wellcome to Data Storage</h1>
    </header>

    <navigation>
      <ul>
        <li><a href="<?php echo url_for('/wellcome.php'); ?>">Menu</a></li>
      </ul>
    </navigation>
