<a href="javascript:;" onclick="$('#phpmyadmin_login').submit();return false;">
	login
</a>

<form class="hidden_form" method="post" action="<?=$url?>" name="login_form" id="phpmyadmin_login" target="_blank">
	<input type="hidden" name="pma_username" id="input_username" value="<?=$login?>" />
	<input type="hidden" name="pma_password" id="input_password" value="<?=$pwd?>" />
	<input type="hidden" name="server" value="1" />
	<input type="hidden" name="lang" value="en-utf-8" />
	<input type="hidden" name="convcharset" value="iso-8859-1" />
	<input type="hidden" name="db" value="" />
	<input type="hidden" name="table" value="" />
</form>