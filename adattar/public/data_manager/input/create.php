<?php //itt fogják az adattárosok bevinni a dokumentum adatait ?>

<?php require_once('../../../private/initialize.php'); ?>

<?php $page_title = 'New-document'; ?>
<?php include(SHARED_PATH . '/data_header.php'); ?>

<div id="form">
<form action="" method="post">
	<h1>Data Stored</h1>
			<dl>
        <dt>Id:</dt>
        <dd><input type="text" name="id" value="" /></dd>
      </dl>
			<dl>
        <dt>Lsz1:</dt>
        <dd><input type="text" name="lsz_1" value="" required/></dd>
      </dl>
			<dl>
        <dt>Lsz2:</dt>
        <dd><input type="text" name="lsz_2" value="" /></dd>
      </dl>
      <dl>
        <dt>Data Stored at:</dt>
        <dd>
          <select name="data_stored" required>
						<option value="0"></option>
            <option value="1">MBFSZ</option>
						<option value="2">MBK</option>
						<option value="3">PBK</option>
						<option value="4">VBK</option>
          </select>
        </dd>
      </dl>
			<dl>
        <dt>Data Storage Lsz:</dt>
        <dd><input type="text" name="adattároló_lsz" value="" /></dd>
      </dl>
      <dl>
        <dt>Type</dt>
        <dd>
          <input type="checkbox" name="cd" value="0" /> CD
          <input type="checkbox" name="dvd" value="1" /> DVD
					<input type="checkbox" name="hdd" value="1" /> HDD
        </dd>
      </dl>
      	<h1>Document</h1>
					<dl>
		        <dt>Title:</dt>
		        <dd><input type="textarea" name="area" value="" required/></dd>
		      </dl>
					<dl>
		        <dt>Author:</dt>
		        <dd><input type="textarea" name="area" value="" /></dd>
		      </dl>
					<dl>
		        <dt>Date:</dt>
		        <dd><input type="date" name="date" value="" /></dd>
		      </dl>
					<dl>
		        <dt>City:</dt>
		        <dd><input type="text" name="city" value="" /></dd>
		      </dl>
					<dl>
		        <dt>Landscape:</dt>
		        <dd><input type="text" name="landscape" value="" /></dd>
		      </dl>
					<dl>
		        <dt>Organisation:</dt>
		        <dd><input type="text" name="organisation" value="" /></dd>
		      </dl>
					<dl>
		        <dt>Raw Material:</dt>
		        <dd><input type="text" name="raw_material" value="" /></dd>
		      </dl>
					<dl>
		        <dt>Subject:</dt>
		        <dd><input type="text" name="subject_1" value="" /></dd>
		      </dl>
					<dl>
		        <dt>Subject:</dt>
		        <dd><input type="text" name="subject_2" value="" /></dd>
		      </dl>
				<h1>Content</h1>
				 <h3>Bibliography</h3>
					<dl>
		        <dt>Page:</dt>
		        <dd><input type="text" name="page" value="" /></dd>
		      </dl>
					<dl>
		        <dt>Figure:</dt>
		        <dd><input type="text" name="figure" value="" /></dd>
		      </dl>
					<dl>
		        <dt>Table:</dt>
		        <dd><input type="text" name="table" value="" /></dd>
		      </dl>
					<dl>
		        <dt>Picture:</dt>
		        <dd><input type="text" name="picture" value="" /></dd>
		      </dl>
					<dl>
		        <dt>Graph:</dt>
		        <dd><input type="text" name="graph" value="" /></dd>
		      </dl>
					<dl>
		        <dt>Appendix:</dt>
		        <dd><input type="text" name="appendix" value="" /></dd>
		      </dl>
					<dl>
		        <dt>Attachment:</dt>
		        <dd><input type="text" name="attachment" value="" /></dd>
		      </dl>
				<h3>Pofessional Elements </h3>
					<dl>
		        <dt>Map:</dt>
		        <dd><input type="text" name="map" value="" /></dd>
		      </dl>
					<dl>
		        <dt>Section:</dt>
		        <dd><input type="text" name="section" value="" /></dd>
		      </dl>
					<dl>
		        <dt>Layer:</dt>
		        <dd><input type="text" name="layer" value="" /></dd>
		      </dl>
					<dl>
		        <dt>Method:</dt>
		        <dd><input type="text" name="method" value="" /></dd>
		      </dl>
					<h1>Official</h1>
					<dl>
		        <dt>Registrar:</dt>
		        <dd><input type="text" name="registrar" value="" /></dd>
		      </dl>
					<dl>
		        <dt>Limitation:</dt>
		        <dd><input type="text" name="limitation" value="" /></dd>
						<input type="radio" name="limit" value="0"> No
						<input type="radio" name="limit" value="1"> Yes
		      </dl>
					<dt>Added:</dt>
		        <dd><input type="datetime-local" name="added" value="" /></dd>
		      </dl>
					<br/>
				<div id="operations">
						<input type="submit" class="submit" value="Save document" />
				</div>
		</form>
	</div>

<?php include(SHARED_PATH . '/data_footer.php'); ?>
