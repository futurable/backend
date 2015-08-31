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
             <p class="question">What is a SO?</p>
             <div class="answer">
                <p>
                A Sale Order
                </p>
             </div>
         </div>
         
         <div id="div-faq">
             <p class="question">What is a PO?</p>
             <div class="answer">
                <p>
                A Purchase Order
                </p>
             </div>
         </div>
         
         <div id="div-faq">
             <p class="question">We paid an invoice wrong / twice / etc.</p>
             <div class="answer">
                <p>
                Contact the supplier and settle the matter with them
                </p>
                
                 <ul>
                     <li>If the invoice isn't confirmed yet, you can just cancel it and create a new copy</li>
                     <li>If the invoice is confirmed, you will need to reconcile the invoice and create a copy</li>
                 </ul>
             </div>
         </div>
         
         <div id="div-faq">
             <p class="question">The customer hasn't paid their invoice (correctly)</p>
             <div class="answer">
                <p>Contact the customer and settle the matter with them</p>
             
                <ul>
                    <li>If the invoice isn't confirmed yet, you can just cancel it and create a new copy</li>
                    <li>If the invoice is confirmed, you will need to reconcile the invoice and create a copy</li>
                </ul>
             </div>
         </div>
         
         <div id="div-faq">
             <p class="question">We remitted different products that we ordered</p>
             <div class="answer">
                <p>Find out what are the differences between the products you have and the list you've marked you have</p>
                
                <ul>
                    <li>Remitted too few products: Create a new PO with missing products and remit them</li>
                    <li>Remitted too many products: Manually fix the product saldos</li>
                </ul>
             </div>
         </div>
         
    </div>
</div>
