<?php //a cím a böngésző feljécében mindíg változik
//az adott oldal tartalmához igazítva
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

<?php echo display_session_message(); ?>

    <navigation>
      <ul>
        <li>Felhasználó: <?php echo $_SESSION['username'] ?? ''; ?></li>
        <li><a href="<?php echo url_for('/master.php'); ?>">Menu</a></li>
      </ul>
    </navigation>
</body>
</html>
