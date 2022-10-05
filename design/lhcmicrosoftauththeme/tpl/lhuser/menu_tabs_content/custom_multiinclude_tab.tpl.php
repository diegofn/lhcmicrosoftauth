<div role="tabpanel" class="tab-pane" id="microsoftauth">
    <?php if (erLhcoreClassUser::instance()->hasAccessTo('lhmicrosoftauth','use_admin')) : ?>
        <?php foreach (erLhcoreClassModelMicrosoftAuth::getList(array('filter' => array('user_id' => erLhcoreClassUser::instance()->getUserID()))) as $loggedAccount) : ?>
        <a class="btn btn-sm btn-danger mb-1 mr-1" ng-non-bindable href="<?php echo  erLhcoreClassDesign::baseurl('microsoftauth/remove')?>/<?php echo $loggedAccount->id?>">Logout - <?php echo htmlspecialchars($loggedAccount->givenName . ' '. 	$loggedAccount->familyName . '[' . $loggedAccount->email . ']')?></a>
        <?php endforeach; ?>
    <?php endif; ?>
    <br/>
    <a href="<?php echo  erLhcoreClassDesign::baseurl('microsoftauth/login')?>"><img src="<?php echo erLhcoreClassDesign::design('images/microsoftauth/btn_microsoft_signin_dark_normal_web.png');?>"></a>
</div>
