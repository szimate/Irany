<?php

require_once('../../../private/initialize.php');

require_login();
?>

<?php include(SHARED_PATH . '/data_header.php'); ?>

  <div>
    <form method="POST" action="<?php echo url_for('/data_manager/search/index.php'); ?>" >
      <dl>
        <dt> Leltári szám: </dt>
        <dd><input type="text" name="leltari_szam"></dd>
        <dd><input type="submit" value="Keresés"></dd>
      </dl>
    </form>
  </div>

<?php

  mysqli_set_charset($db, 'utf8');

  if (isset($_POST["leltari_szam"])) {

  $leltari_szam = $_POST["leltari_szam"];

      $sql = "select a.*, group_concat(distinct concat(' ',b.nev)), ";
      $sql .= "group_concat(distinct concat(' ',e.name)), ";
      $sql .= "group_concat(distinct concat(' ',g.name)) ";
      $sql .= "from dokumentum a ";
      $sql .= "left join dok_ceg c ";
      $sql .= "inner join ceg b on c.ceg_id = b.id ";
      $sql .= "on a.id = c.dok_id ";
      $sql .= "left join dok_taj d ";
      $sql .= "inner join taj e on e.code = d.tajkod ";
      $sql .= "on a.id = d.dok_id ";
      $sql .= "left join dok_eto f ";
      $sql .= "inner join eto g on g.code = f.eto_kod ";
      $sql .= "on a.id = f.dok_id ";
      $sql .= "where a.leltari_szam1 ='" . db_escape($db, $leltari_szam) . "'";

      $result=mysqli_query($db, $sql);
?>

<table class="list">
  <tr>
    <th>ID</th>
    <th>Leltári szám 1</th>
    <th>Leltari szam 2</th>
    <th>Szerző</th>
    <th>Cím</th>
    <th>Év</th>

    <th>&nbsp;</th>
    <th>&nbsp;</th>
    <th>&nbsp;</th>
  </tr>

  <?php
   while ($leltari_szam = mysqli_fetch_assoc($result))
        {
          $count = 0;
      print("<tr>");
      foreach ($leltari_szam as $i=>$ertek)
      {
        $count++;
         print"<td align=center>$ertek</td>";
        if($count > 5) {
          break;
        }
      }
    }
?>
      <td><a class="action" href="<?php echo url_for('/data_manager/documents/show.php?id=' . h(u($leltari_szam['id']))); ?>">Megtekintés</a></td>
      <td><a class="action" href="<?php echo url_for('/data_manager/documents/edit.php?id=' . h(u($leltari_szam['id']))); ?>">Szerkesztés</a></td>
      <td><a class="action" href="<?php echo url_for('/data_manager/documents/delete.php?id=' . h(u($leltari_szam['id']))); ?>">Törlés</a></td>
    </tr>
  <?php } ?>
</table>

  <?php include(SHARED_PATH . '/data_footer.php'); ?>
