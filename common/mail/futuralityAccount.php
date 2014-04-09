<?php
    // Send login information to user
    $messageContent = "<h1>".Yii::t('Company', 'Welcome to Futurality')."</h1>";

    $messageContent .= "<p>";
    $messageContent .= Yii::t('Company', 'You have created a company in the')."<br/>";
    $messageContent .= "<a href='https://futurality.fi'>".Yii::t('Company', 'Futurality business simulation')."</a>";
    $messageContent .= "</p>";

    $messageContent .= "<p>";
    $messageContent .= Yii::t('Company', 'Your company name is');
    $messageContent .= " <strong>".$company->name."</strong>.<br/>";
    $messageContent .= Yii::t('Company', 'Your company tag is');
    $messageContent .= " <strong>".$company->tag."</strong>.<br>";
    $messageContent .= Yii::t('Company', 'Your business id is');
    $messageContent .= " <strong>".$company->business_id."</strong>.<br>";
    $messageContent .= "</p>";
    
    $messageContent .= "<h2>".Yii::t('Company', 'OpenERP account')."</h2>";
    $messageContent .= "<ul>";
    $messageContent .= "<li>".Yii::t('Company', 'User Id').": <strong>admin</strong></li>";
    $messageContent .= "<li>".Yii::t('Company', 'Password').": <strong>{$company->companyPasswords->openerp_password}</strong></li>";
    $messageContent .= "<li>".Yii::t('Company', 'Login from')." <a href='http://erp.futurality.fi/web/login?db={$company->tag}'>erp.futurality.fi</a></li>";
    $messageContent .= "</ul>";
    
    $messageContent .= "<h2>".Yii::t('Company', 'Bank account')."</h2>";
    $messageContent .= "<ul>";
    $messageContent .= "<li>".Yii::t('Company', 'User id').": <strong>$company->tag</strong></li>";
    $messageContent .= "<li>".Yii::t('Company', 'Password').": <strong>{$company->companyPasswords->bank_password}</strong></li>";
    $messageContent .= "<li>".Yii::t('Company', 'Login from')." <a href='http://futurality.fi/bank/index.php/user/login/?company={$company->tag}'>futurality.fi/bank</a></li>";
    $messageContent .= "</ul>";
    
    $messageContent .= "<h2>".Yii::t('Company', 'Backend account')."</h2>";
    $messageContent .= "<ul>";
    $messageContent .= "<li>".Yii::t('Company', 'User id').": <strong>{$company->tag}</strong></li>";
    $messageContent .= "<li>".Yii::t('Company', 'Password').": <strong>{$company->companyPasswords->backend_password}</strong></li>";
    $messageContent .= "<li>".Yii::t('Company', 'Login from')." <a href='http://futurality.fi/backend'>futurality.fi/bank</a></li>";
    $messageContent .= "</ul>";
    
    $messageContent .= "<p><strong>".Yii::t('Company', "Have fun")."!</strong></p>";
    
    $messageContent .= "<p>---</p>";
    $messageContent .= "<p><a href='http://futurable.fi'>Futurable Oy</a><br/>".date('Y')."</p>";
    
    echo $messageContent;
?>