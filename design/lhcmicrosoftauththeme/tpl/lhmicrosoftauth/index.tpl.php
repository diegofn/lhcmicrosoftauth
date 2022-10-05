<h1><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('module/microsoftauth','Microsoft Auth');?></h1>

<ul>
    <li><a href="<?php echo erLhcoreClassDesign::baseurl('microsoftauth/options')?>"><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('module/microsoftauth','Options');?></a></li>
</ul>

<p>Callback URL in Microsoft Azure has to be set to this:</p>
<input type="text" class="form-control form-control-sm" value="<?php echo erLhcoreClassXMP::getBaseHost() . $_SERVER['HTTP_HOST']?><?php echo erLhcoreClassDesign::baseurl('microsoftauth/auth') ?>">
