<?php 

function box_tooltips($msg){?>
<span  class=" tooltip-hover" data-bs-toggle="tooltip" data-bs-html="true" title="<?php echo $msg;?>"> <i class="fa fa-info-circle"></i></span>

<?php }
require(dirname(__FILE__).'/ae_user_fields.php');