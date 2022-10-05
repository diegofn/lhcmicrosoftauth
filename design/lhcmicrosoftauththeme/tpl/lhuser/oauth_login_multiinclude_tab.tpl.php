<?php if (!isset($_GET['oauth_microsoft']) && !isset($_POST['oauth_microsoft'])) : ?>
<hr>
    <a href="<?php echo erLhcoreClassDesign::baseurl('microsoftauth/login')?>"><img src="<?php echo erLhcoreClassDesign::design('images/microsoftauth/btn_microsoft_signin_dark_normal_web.png');?>"></a>
<hr>
<?php else : ?>
<p>Please login to complete process.</p>
<input ng-non-bindable type="hidden" name="oauth_microsoft" value="<?php echo isset($_POST['oauth_microsoft']) ? $_POST['oauth_microsoft'] : (isset($_GET['oauth_microsoft']) ? $_GET['oauth_microsoft'] : '')?>">
<?php endif; ?>