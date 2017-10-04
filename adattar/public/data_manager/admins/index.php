<?php

//ez az oldal felépítéséhez alapvető paracsokat tartalmazza(függvények, adatbázis csatlakozás, adatbázis lekérdezések)
require_once('../../../private/initialize.php');

require_login();

//ez megkeresi az összes admint az adatbázisból
$admin_set = find_all_admins(); //
?>
<?php
//ez mindíg az aktuális oldal címét írja ki a böngészőben
 $page_title = 'Adminok'; ?>
<?php
//a parancsa a rövidebb elérési utat biztosítja(fejléc általános használata)
include(SHARED_PATH . '/data_header.php'); ?>

<div id="content">
  <div class="admins listing">
    <h1>Adminok</h1>

    <div class="actions">
      <a class="action" href="<?php /*ha a link esemény megtörténik akkor erre az oldalra irányít*/
      echo url_for('/data_manager/admins/new.php'); //TODO ?>">Admin hozzáadása</a>
    </div>

    <table class="list">
      <tr>
        <th>ID</th>
        <th>Vezetéknév</th>
        <th>Keresztnév</th>
        <th>Email</th>
        <th>Felhasználónév</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
      </tr>

      <?php /*TODO*/ while($admin = mysqli_fetch_assoc($admin_set)) { ?>
        <tr>
          <td><?php /*kiírja az adatbázis lekérdezés az id-t*/ echo h($admin['id']); ?></td>
          <td><?php /*kiírja az adatbázis lekérdezés az first_name-et*/ echo h($admin['first_name']); ?></td>
          <td><?php /*kiírja az adatbázis lekérdezés az last_name-et*/ echo h($admin['last_name']); ?></td>
          <td><?php /*kiírja az adatbázis lekérdezés az email-t*/ echo h($admin['email']); ?></td>
          <td><?php /*kiírja az adatbázis lekérdezés a username-et*/ echo h($admin['username']); ?></td>
          <td><a class="action" href="<?php /*átirányít oda ahol megnézheted az adatokat*/
  /*TODO*/        echo url_for('/data_manager/admins/show.php?id=' . h(u($admin['id']))); ?>">Megtekintés</a></td>
          <td><a class="action" href="<?php echo url_for('/data_manager/admins/edit.php?id=' . h(u($admin['id']))); ?>">Szerkesztés</a></td>
          <td><a class="action" href="<?php echo url_for('/data_manager/admins/delete.php?id=' . h(u($admin['id']))); ?>">Törlés</a></td>
        </tr>
      <?php } ?>
    </table>

    <?php
    //felszabadítja a memóriát
      mysqli_free_result($admin_set);
    ?>
  </div>

</div>

<?php
//a parancsa a rövidebb elérési utat biztosítja(lábjegyzet általános használata)
 include(SHARED_PATH . '/data_footer.php'); ?>
