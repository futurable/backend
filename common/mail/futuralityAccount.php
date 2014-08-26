<?php
    // Send login information to user
    $messageContent = "<h1>".Yii::t('Company', 'Welcome to Futurality')."</h1>";

    $messageContent .= "<p>";
    $messageContent .= Yii::t('Company', 'You have created a company in the')."<br/>";
    $messageContent .= "<a href='https://futurality.fi'>".Yii::t('Company', 'Futurality business simulation')."</a>";
    $messageContent .= "</p>";

    $messageContent .= "<p>";
        $messageContent .= Yii::t('Company', 'Your company');
        $messageContent .= ":<br/><strong>".$company->name."</strong><br/>";
        $messageContent .= "<strong>".$company->business_id."</strong><br>";
        $messageContent .= " <strong>".$company->tag."</strong><br>";
    $messageContent .= "</p>";
    
    $messageContent .= "<h2>".Yii::t('Company', 'Bank account')."</h2>";
    $messageContent .= "<p>";
        $messageContent .= "<ul>";
            $messageContent .= "<li>".Yii::t('Company', 'User account').": <strong>$company->tag</strong></li>";
            $messageContent .= "<li>".Yii::t('Company', 'Password').": <strong>{$company->companyPasswords->bank_password}</strong></li>";
            $messageContent .= "<li>".Yii::t('Company', 'Login from').": <a href='http://futurality.fi/bank/index.php/user/login/?company={$company->tag}'>futurality.fi/bank</a></li>";
        $messageContent .= "</ul>";
    $messageContent .= "</p>";
    
    $messageContent .= "<h2>".Yii::t('Company', 'OpenERP account')."</h2>";
    $messageContent .= "<p>";
        $messageContent .= "<ul>";
            $messageContent .= "<li>".Yii::t('Company', 'User account').": <strong>admin</strong></li>";
            $messageContent .= "<li>".Yii::t('Company', 'Password').": <strong>{$company->companyPasswords->openerp_password}</strong></li>";
            $messageContent .= "<li>".Yii::t('Company', 'Login from').": <a href='http://erp.futurality.fi/?db={$company->tag}'>erp.futurality.fi</a></li>";
        $messageContent .= "</ul>";
    $messageContent .= "</p>";
    
    $messageContent .= "<h2>".Yii::t('Company', 'Backend account')."</h2>";
    $messageContent .= "<p>";
        $messageContent .= "<ul>";
            $messageContent .= "<li>".Yii::t('Company', 'User account').": <strong>{$company->tag}</strong></li>";
            $messageContent .= "<li>".Yii::t('Company', 'Password').": <strong>{$company->companyPasswords->backend_password}</strong></li>";
            $messageContent .= "<li>".Yii::t('Company', 'Login from').": <a href='https://futurality.fi/backend/index.php/site/login?company={$company->tag}'>futurality.fi/backend</a></li>";
        $messageContent .= "</ul>";
    $messageContent .= "</p>";
    
    $messageContent .= "<p><strong>".Yii::t('Company', "Have fun")."!</strong></p>";
    
    $messageContent .= "<p>---<br/>";
    $messageContent .= "<a href='http://futurable.fi'>Futurable Oy</a><br/>".date('Y')."</p>";
    
    echo $messageContent;
?>