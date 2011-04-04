<a href="javascript:;" onclick="$('#google_analytics_login').submit();return false;">
	login
</a>

<form class="hidden_form" id="google_analytics_login" action="<?=$url?>" target="_blank">
<input type="hidden" name="Email" class="gaia le val" id="Email" size="18" value="<?=$login?>" />
<input type="hidden" name="Passwd" class="gaia le val" id="Passwd" size="18" value="<?=$pwd?>" />
<input type="hidden" name="PersistentCookie" value="yes" />
<input type="hidden" name="rmShown" value="1" >
<input type="hidden" name="continue" value="<?=$url?>" />
<input type="hidden" name="service" value="analytics">
<input type="hidden" name="nui" value="1" />
<input type="hidden" name="hl" value="en-US">
</form>