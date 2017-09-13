<?php require_once('../private/initialize.php'); ?>

<?php include(SHARED_PATH . '/data_header.php'); ?>
<!doctype html>

<html lang="hu">
  <head>
    <title>Geo Store</title>
    <meta charset="utf-8">
  </head>

  <body>

<div id="content">
    <form action="<?php echo url_for('/master.php'); ?>" method="post">
      <h1>Login</h1>

        <input type="text" name="user_name" value=""/> Username <br/>
        <input type="text" name="user_pass" value=""/> Password
      <div id="operations">
        <input type="submit" class="submit" value="Login" />
      </div>
    </form>
  </div>
  <div id="content_reg">
      <form action="<?php echo url_for('/master.php'); ?>" method="post">
        <h1>Registration</h1>

          <input type="text" name="user_name" value="" required/> Username <br/>
          <input type="password" name="user_pass" value="" required/> Password <br/>
          <input type="password" name="user_confirmpass" value="" required/> Confirm password <br/>
          <input type="email" name="user_email" value="" required/> E-mail <br/>
          <select id="status">
                <option value="0"></option>
                <option value="1">Student</option>
    						<option value="2">Self-employer</option>
    						<option value="3">Retired</option>
    						<option value="4">Company</option>
              </select>Status

        <div id="operations">
          <input type="submit" class="submit" value="Login" />
        </div>
      </form>
    </div>


  </body>
</html>

<?php include(SHARED_PATH . '/data_footer.php'); ?>
