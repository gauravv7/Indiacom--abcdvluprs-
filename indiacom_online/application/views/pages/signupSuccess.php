<?php
/**
 * Created by PhpStorm.
 * User: Jitin
 * Date: 29/7/14
 * Time: 10:37 AM
 */
?>

<div class="container-fluid contentBlock-top">
    <div class="row">
        <div class="col-md-9 col-sm-9 col-xs-12">
            <span class="h3 text-theme">Member Registration</span>
            <div class="row body-text">
                <div class="col-md-12">
                    You are successfully registered.<br>
                    Your Member ID : <?php echo $member_id; ?><br><?php echo $message; ?>
                    <a href="/<?php echo INDIACOM; ?>d/Dashboard">Dashboard Home</a>
                </div>
            </div>
        </div>
    </div>
</div>