<?php
/**
 * Created by PhpStorm.
 * User: rubby
 * Date: 8/22/2017
 * Time: 5:31 PM
 */?>
<form action="<?=base_url()?>b_check_out" method="POST">
    <script
        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
        data-key="pk_test_m24ptzwSZcm4cdtbNsbXsiF8"
        data-amount="999"
        data-name="Tele-ID"
        data-description="Widget"
        data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
        data-locale="auto">
    </script>
    <input type="text" name="amount" value="1">
    <input type="text" name="token" value="84eb3887e095496732a52622c3916f56">
</form>