<?php if (erLhcoreClassUser::instance()->hasAccessTo('lhmicrosoftauth','use_admin_configure')) : ?>
<li class="nav-item"><a class="nav-link" href="<?php echo erLhcoreClassDesign::baseurl('microsoftauth/index')?>"><i class="material-icons">textsms</i><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('pagelayout/pagelayout','Microsoft Auth');?></a></li>
<?php endif; ?>