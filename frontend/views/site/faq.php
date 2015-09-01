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
             <p class="question">What are the criteria used to decide the amount of our sales?</p>
             <div class="answer">
                <p>Each company will get sales whether they improve their company or not.
                Companies putting effort to their actions get more. "More" sales mean both
                more orders, but also orders with higher value.</p>
                
                <p class='strong'>These will increase your sales:</p>
                <table>
                     <tr>
                        <th>Marketing</th><td>ads, marketing campaigns etc.</td>
                    </tr>
                    <tr>
                        <th>Product pricing</th><td>smart pricing gets more customers</td>
                    </tr>
                    <tr>
                        <th>Customer support</th><td>be professional and friendly</td>
                        </tr>
                    <tr>
                        <th>Paying your employees</th><td>(more) will result in higher employee satisfaction</td>
                    </tr>
                    <tr>
                        <th>Remarks</th><td>instructor can give notes about your company</td>
                    </tr>
                    <tr>
                        <th>Communications</th><td>your data and phone connections</td>
                    </tr>
                    <tr>
                        <th>Revenues</th><td>your company HQ location</td>
                    </tr>
                    <tr>
                        <th>Health</th><td>a health plan increases your employee effiency</td>
                    </tr>
                    <tr>
                        <th>Expenses</th><td>material etc. expenses effect your sales slightly</td>
                    </tr>
                    <tr>
                        <th>Loans</th><td>lower loan amount effects your sales slightly</td>
                    </tr>
                    <tr>
                        <th>Brand</th><td>a derivative from all the above</td>
                    </tr>
                </table>
             </div>
         </div>
         
         <div id="div-faq">
             <p class="question">What does this term mean?</p>
             <div class="answer">
                 <table>
                    <tr>
                        <th>SO</th><td>Sale Order</td>
                    </tr>
                    <tr>
                        <th>PO</th><td>Purchase Order</td>
                    </tr>
                    <tr>
                        <th>RFQ</th><td>Request for Quotation</td>
                    </tr>
                    <tr>
                        <th>MTO</th><td>Make to Order</td>
                    </tr>
                    <tr>
                        <th>MTS</th><td>Make to Stock</td>
                    </tr>
                 </table>
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
