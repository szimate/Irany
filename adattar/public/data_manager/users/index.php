<?php

//ez az oldal felépítéséhez alapvető paracsokat tartalmazza(függvények, adatbázis csatlakozás, adatbázis lekérdezések)
require_once('../../../private/initialize.php');
require_login();
//ez megkeresi az összes admint az adatbázisból
$user_set = find_all_users(); //
?>
<?php
//ez mindíg az aktuális oldal címét írja ki a böngészőben
 $page_title = 'Users'; ?>
<?php
//a parancsa a rövidebb elérési utat biztosítja(fejléc általános használata)
include(SHARED_PATH . '/data_header.php'); ?>

<div id="content">
  <div class="admins listing">
    <h1>Felhasználók</h1>

    <table class="list">
      <tr>
        <th>ID</th>
        <th>Vezetéknév</th>
        <th>Keresztnév</th>
        <th>Email</th>
        <th>Felhasználónév</th>
        <th>&nbsp;</th>

      </tr>

      <?php /*TODO*/ while($user = mysqli_fetch_assoc($user_set)) { ?>
        <tr>
          <td><?php /*kiírja az adatbázis lekérdezés az id-t*/ echo h($user['id']); ?></td>
          <td><?php /*kiírja az adatbázis lekérdezés az first_name-et*/ echo h($user['first_name']); ?></td>
          <td><?php /*kiírja az adatbázis lekérdezés az last_name-et*/ echo h($user['last_name']); ?></td>
          <td><?php /*kiírja az adatbázis lekérdezés az email-t*/ echo h($user['email']); ?></td>
          <td><?php /*kiírja az adatbázis lekérdezés a username-et*/ echo h($user['username']); ?></td>

          <td><a class="action" href="<?php echo url_for('/data_manager/users/delete.php?id=' . h(u($user['id']))); ?>">Törlés</a></td>
        </tr>
      <?php } ?>
    </table>

    <?php
    //felszabadítja a memóriát
      mysqli_free_result($user_set);
    ?>
  </div>

</div>

<?php
//a parancsa a rövidebb elérési utat biztosítja(lábjegyzet általános használata)
 include(SHARED_PATH . '/data_footer.php'); ?>
