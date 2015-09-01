<?php
/**
 * @var yii\web\View $this
 */
$this->title = 'FAQ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-index">

    <div class="body-content">
         <h1><?= \Yii::t('Backend', 'Frequentely Asked Questions') ?></h1>
         
         <div id="div-faq">
             <p class="question"><?= Yii::t("FAQ", "What are the criteria used to decide the amount of our sales?") ?></p>
             <div class="answer">
                <p><?= Yii::t("FAQ", "Each company will get sales whether they improve their company or not.") ?>
                <br/><br/>
                <?= Yii::t("FAQ", "Companies putting effort to their actions get more. \"More\" sales mean both more orders, but also orders with higher value.") ?></p>
                
                <p class='strong'><?= Yii::t("FAQ", "These will increase your sales") ?>:</p>
                <table>
                     <tr>
                        <th><?= Yii::t("FAQ", "Marketing") ?></th><td><?= Yii::t("FAQ", "ads, marketing campaigns, etc.") ?></td>
                    </tr>
                    <tr>
                        <th><?= Yii::t("FAQ", "Product pricing") ?></th><td><?= Yii::t("FAQ", "smart pricing gets more customers") ?></td>
                    </tr>
                    <tr>
                        <th><?= Yii::t("FAQ", "Customer support") ?></th><td><?= Yii::t("FAQ", "be professional and friendly") ?></td>
                        </tr>
                    <tr>
                        <th><?= Yii::t("FAQ", "Paying your employees") ?></th><td><?= Yii::t("FAQ", "(more) will result in higher employee satisfaction") ?></td>
                    </tr>
                    <tr>
                        <th><?= Yii::t("FAQ", "Remarks") ?></th><td><?= Yii::t("FAQ", "instructor can give notes about your company") ?></td>
                    </tr>
                    <tr>
                        <th><?= Yii::t("FAQ", "Communications") ?></th><td><?= Yii::t("FAQ", "your data and phone connections") ?></td>
                    </tr>
                    <tr>
                        <th><?= Yii::t("FAQ", "Revenues") ?></th><td><?= Yii::t("FAQ", "your company HQ location") ?></td>
                    </tr>
                    <tr>
                        <th><?= Yii::t("FAQ", "Health") ?></th><td><?= Yii::t("FAQ", "a health plan increases your employee effiency") ?></td>
                    </tr>
                    <tr>
                        <th><?= Yii::t("FAQ", "Expenses") ?></th><td><?= Yii::t("FAQ", "material etc. expenses effect your sales slightly") ?></td>
                    </tr>
                    <tr>
                        <th><?= Yii::t("FAQ", "Loans") ?></th><td><?= Yii::t("FAQ", "lower loan amount effects your sales slightly") ?></td>
                    </tr>
                    <tr>
                        <th><?= Yii::t("FAQ", "Brand") ?></th><td><?= Yii::t("FAQ", "a derivative from all the above") ?></td>
                    </tr>
                </table>
             </div>
         </div>
         
         <div id="div-faq">
             <p class="question"><?= Yii::t("FAQ", "What does this term mean?") ?></p>
             <div class="answer">
                 <table>
                    <tr>
                        <th><?= Yii::t("FAQ", "SO") ?></th><td><?= Yii::t("FAQ", "Sale Order") ?></td>
                    </tr>
                    <tr>
                        <th><?= Yii::t("FAQ", "PO") ?></th><td><?= Yii::t("FAQ", "Purchase Order") ?></td>
                    </tr>
                    <tr>
                        <th><?= Yii::t("FAQ", "RFQ") ?></th><td><?= Yii::t("FAQ", "Request for Quotation") ?></td>
                    </tr>
                    <tr>
                        <th><?= Yii::t("FAQ", "MTO") ?></th><td><?= Yii::t("FAQ", "Make to Order") ?></td>
                    </tr>
                    <tr>
                        <th><?= Yii::t("FAQ", "MTS") ?></th><td><?= Yii::t("FAQ", "Make to Stock") ?></td>
                    </tr>
                 </table>
             </div>
         </div>
         
         <div id="div-faq">
             <p class="question"><?= Yii::t("FAQ", "We paid an invoice wrong / twice / etc.") ?></p>
             <div class="answer">
                <p><?= Yii::t("FAQ", "Contact the supplier and settle the matter with them") ?></p>
                
                 <ul>
                     <li><?= Yii::t("FAQ", "If the invoice isn't confirmed yet, you can just cancel it and create a new copy") ?></li>
                     <li><?= Yii::t("FAQ", "If the invoice is confirmed, you will need to reconcile the invoice and create a copy") ?></li>
                 </ul>
             </div>
         </div>
         
         <div id="div-faq">
             <p class="question"><?= Yii::t("FAQ", "The customer hasn't paid their invoice (correctly)") ?></p>
             <div class="answer">
                <p><?= Yii::t("FAQ", "Contact the customer and settle the matter with them") ?></p>
             
                <ul>
                    <li><?= Yii::t("FAQ", "If the invoice isn't confirmed yet, you can just cancel it and create a new copy") ?></li>
                    <li><?= Yii::t("FAQ", "If the invoice is confirmed, you will need to reconcile the invoice and create a copy") ?></li>
                </ul>
             </div>
         </div>
         
         <div id="div-faq">
             <p class="question"><?= Yii::t("FAQ", "We remitted different products that we ordered") ?></p>
             <div class="answer">
                <p><?= Yii::t("FAQ", "Find out what are the differences between the products you have and the list you've marked you have") ?></p>
                
                <ul>
                    <li><?= Yii::t("FAQ", "Remitted too few products: Create a new PO with missing products and remit them") ?></li>
                    <li><?= Yii::t("FAQ", "Remitted too many products: Manually fix the product saldos") ?></li>
                </ul>
             </div>
         </div>
         
    </div>
</div>
