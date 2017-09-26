<?php

require_once('../../../private/initialize.php');
require_login();

if(!isset($_GET['id'])) {
  redirect_to(url_for('/data_manager/documents/index.php'));
}
$id = $_GET['id'];

if(is_post_request()) {

  // Handle form values sent by new.php

  $document = [];
  $document['id'] = $id;
  $document['leltari_szam1'] = $_POST['leltari_szam1'] ?? '';
  $document["leltari_szam2"] = $_POST['leltari_szam2'] ?? '';;
  $document["cim"] = $_POST['cim'] ?? '';;
  $document["szerzo"] = $_POST['szerzo'] ?? '';;
  $document["ev"] = $_POST['ev'] ?? '';;
  $document["szoveg"] = $_POST['szoveg'] ?? '';;
  $document["terkep"] = $_POST['terkep'] ?? '';;
  $document["szelveny"] = $_POST['szelveny'] ?? '';;
  $document["tablazat"] = $_POST['tablazat'] ?? '';;
  $document["abra"] = $_POST['abra'] ?? '';;
  $document["foto"] = $_POST['foto'] ?? '';;
  $document["melleklet"] = $_POST['melleklet'] ?? '';;
  $document["retegsor"] = $_POST['retegsor'] ?? '';;
  $document["diagram"] = $_POST['diagram'] ?? '';;
  $document["vizsgalat"] = $_POST['vizsgalat'] ?? '';;
  $document["adattar"] = $_POST['adattar'] ?? '';;
  $document["letrehozta"] = $_POST['letrehozta'] ?? '';;
  $document["hozzaadta"] = $_POST['hozzaadta'] ?? '';;


  $result = update_document($document);
  if($result === true) {
    $_SESSION['message'] = 'Sikeresen frissítetted a dokumentumot.';
    redirect_to(url_for('/data_manager/documents/show.php?id=' . $id));
  } else {
    $errors = $result;
  }

} else {
  $document = find_document_by_id($id);
}

$document_set = find_all_documents();
$document_count = mysqli_num_rows($document_set);
mysqli_free_result($document_set);
?>

<?php $page_title = 'Dokumentum szerkesztés'; ?>
<?php include(SHARED_PATH . '/data_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/data_manager/documents/index.php'); ?>"&laquo;> Vissza a listához</a>

  <div class="document edit">
    <h1>Dokumentum szerkesztése</h1>

    <?php echo display_errors($errors); ?>

    <form action="<?php echo url_for('/data_manager/documents/edit.php?id=' . h(u($id))); ?>" method="post">
      <dl>
        <dt>Leltári szám 1</dt>
        <dd><input type="text" name="leltari_szam1" value="<?php echo h($document['leltari_szam1']); ?>" /></dd>
      </dl>
      <dl>
        <dt>Leltári szám 2</dt>
        <dd><input type="text" name="leltari_szam2" value="<?php echo h($document['leltari_szam2']); ?>" /></dd>
      </dl>
      <dl>
        <dt>Cím</dt>
        <dd><input type="text" name="cim" value="<?php echo h($document['cim']); ?>" /></dd>
      </dl>
      <dl>
        <dt>Év</dt>
        <dd><input type="text" name="ev" value="<?php echo h($document['ev']); ?>" /></dd>
      </dl>
      <dt>Szöveg</dt>
      <dd><input type="text" name="szoveg" value="<?php echo h($document['szoveg']); ?>" /></dd>
    </dl>
    <dl>
      <dt>Térkép</dt>
      <dd><input type="text" name="terkep" value="<?php echo h($document['terkep']); ?>" /></dd>
    </dl>
    <dl>
      <dt>Szelvény</dt>
      <dd><input type="text" name="szelveny" value="<?php echo h($document['szelveny']); ?>" /></dd>
    </dl>
    <dl>
      <dt>Táblázat</dt>
      <dd><input type="text" name="tablazat" value="<?php echo h($document['tablazat']); ?>" /></dd>
    </dl>
    <dt>Ábra</dt>
    <dd><input type="text" name="abra" value="<?php echo h($document['abra']); ?>" /></dd>
  </dl>
  <dl>
    <dt>Fotó</dt>
    <dd><input type="text" name="foto" value="<?php echo h($document['foto']); ?>" /></dd>
  </dl>
  <dl>
    <dt>Melléklet</dt>
    <dd><input type="text" name="melleklet" value="<?php echo h($document['melleklet']); ?>" /></dd>
  </dl>
  <dl>
    <dt>Rétegsor</dt>
    <dd><input type="text" name="retegsor" value="<?php echo h($document['retegsor']); ?>" /></dd>
  </dl>
  <dt>Diagram</dt>
  <dd><input type="text" name="diagram" value="<?php echo h($document['diagram']); ?>" /></dd>
</dl>
<dl>
  <dt>Vizsgálat</dt>
  <dd><input type="text" name="vizsgalat" value="<?php echo h($document['vizsgalat']); ?>" /></dd>
</dl>
<dl>
  <dt>Adattár</dt>
  <dd><input type="text" name="adattar" value="<?php echo h($document['adattar']); ?>" /></dd>
</dl>
<dl>
  <dt>Létrehozta</dt>
  <dd><input type="text" name="letrehozta" value="<?php echo h($document['letrehozta']); ?>" readonly /></dd>
</dl>
<dl>
  <dt>Hozzáadva</dt>
  <dd><input type="text" name="hozzaadva" value="<?php echo h($document['hozzaadva']); ?>" readonly /></dd>
</dl>
      <div id="operations">
        <input type="submit" class="nyomogomb" value="Mentés" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/data_footer.php'); ?>
