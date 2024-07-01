<?php 

function box_tooltips($msg){
	global $count_tool;
	?>

<span data-toggle="tooltip" data-placement="left" title="<?php echo $msg;?>" class="fre-tooltip fe-tooltip-<?php echo $count_tool;?>"><i class="fa fa-info-circle"></i></span></span>

<?php $count_tool++; }
require(dirname(__FILE__).'/ae_user_fields.php');