<?php 
// clicky stats
if (!empty($api_data)) {
	$current = next($api_data);
	$date_range = explode(',', key($current));
	$start_date = english_date($date_range[0]);
	$end_date = english_date($date_range[1]);
?>

<div class="clicky_stats">
	<a href="javascript:;" onclick="$('#clicky_login').submit();return false;">
		login
	</a>

	<h3>Website Statistics <span class="date_range"><?=$start_date?> - <?=$end_date?></span></h3>
	
	<form class="hidden_form" action="<?=$url?>" method="post" name="login" enctype="multipart/form-data" id="clicky_login" target="_blank">
	<input type="hidden" name="username" value="<?=$login?>" />
	<input type="hidden" name="password" value="<?=$pwd?>" />
	<input type="submit" name="submit_button" value="Login" /> 
	</form>

	<table border="0" cellspacing="0" cellpadding="0">
		<tbody>
			<tr>
				<?php foreach($api_data as $key => $val){ ?>
				<th><?=ucfirst(str_replace('-', ' ', $key))?></th>
				<?php } ?>
			</tr>
			<tr>
				<?php foreach($api_data as $key => $val){ 
					$data = current($val);
					?>
				<td><?=$data[0]['value']?></td>
				<?php } ?>
			</tr>
		</tbody>
	</table>
</div>


<?php } ?>