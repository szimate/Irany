<?php
require_once('../../../private/initialize.php');

?>

<?php
// $id = isset($_GET['id']) ? $_GET['id'] : '1';
$id = $_GET['id'] ?? '1'; // PHP > 7.0

$document = find_document_by_id($id);
?>

<?php $page_title = 'Show document';
  include(SHARED_PATH . '/data_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/data_manager/search/show.php?=' . h(u($id))); ?>" &laquo;> Vissza a listához</a>

  <div class="document show">

    <h1>Documentum: <?php echo h($document['leltari_szam1']); ?></h1>

    <div class="attributes">
      <dl>
        <dt>Leltári szám 1</dt>
        <dd><?php echo h($document['leltari_szam1']); ?></dd>
      </dl>
      <dl>
      <dt>Leltári szám 2</dt>
        <dd><?php echo h($document['leltari_szam2']); ?></dd>
      </dl>
      <dl>
        <dt>Szerző</dt>
        <dd><?php echo h($document['szerzo']); ?></dd>
      </dl>
      <dl>
        <dt>Cím</dt>
        <dd><?php echo h($document['cim']); ?></dd>
      </dl>
      <dl>
        <dt>Év</dt>
        <dd><?php echo h($document['ev']); ?></dd>
      </dl>
      <dl>
      <dt>Szöveg</dt>
      <dd><?php echo h($document['szoveg']); ?></dd>
    </dl>
    <dl>
      <dt>Térkép</dt>
      <dd><?php echo h($document['terkep']); ?></dd>
    </dl>
    <dl>
      <dt>Szelvény</dt>
      <dd><?php echo h($document['szelveny']); ?></dd>
    </dl>
    <dl>
      <dt>Táblázat</dt>
      <dd><?php echo h($document['tablazat']); ?></dd>
    </dl>
    <dt>Ábra</dt>
    <dd><?php echo h($document['abra']); ?></dd>
  </dl>
  <dl>
    <dt>Fotó</dt>
    <dd><?php echo h($document['foto']); ?></dd>
  </dl>
  <dl>
    <dt>Melléklet</dt>
    <dd><?php echo h($document['melleklet']); ?></dd>
  </dl>
  <dl>
    <dt>Rétegsor</dt>
    <dd><?php echo h($document['retegsor']); ?></dd>
  </dl>
  <dt>Diagram</dt>
  <dd><?php echo h($document['diagram']); ?></dd>
</dl>
<dl>
  <dt>Vizsgálat</dt>
  <dd><?php echo h($document['vizsgalat']); ?></dd>
</dl>
<dl>
  <dt>Adattár</dt>
  <dd><?php echo h($document['adattar']); ?></dd>
</dl>
<dl>
  <dt>Létrehozta</dt>
  <dd><?php echo h($document['letrehozta']); ?></dd>
</dl>
<dl>
  <dt>Hozzáadva</dt>
  <dd><?php echo h($document['hozzaadva']); ?></dd>
</dl>
    </div>
  </div>
</div>
