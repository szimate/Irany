<?php
require_once('../../private/initialize.php');

log_out_admin();
log_out_user();
redirect_to(url_for('wellcome.php'));
 ?>
