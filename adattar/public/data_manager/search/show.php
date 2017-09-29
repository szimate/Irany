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

  $documentum_set = find_all_documents();

  if (isset($_POST["leltari_szam"])) {
  $leltari_szam = $_POST["leltari_szam"];

?>

<table class="list">
  <tr>
    <th name="th1">ID</th>
    <th name="th2">Leltári szám 1</th>
    <th name="th3">Leltari szam 2</th>
    <th name="th4">Szerző</th>
    <th name="th5">Cím</th>
    <th name="th6">Év</th>
    <th>&nbsp;</th>
    <th>&nbsp;</th>
    <th>&nbsp;</th>
  </tr>

  <?php
   while ($leltari_szam = mysqli_fetch_assoc($documentum_set))
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
