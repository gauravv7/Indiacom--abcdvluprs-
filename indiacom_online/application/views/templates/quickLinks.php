<?php
/**
 * Created by PhpStorm.
 * User: lavis_000
 * Date: 10/07/14
 * Time: 10:53
 */
?>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12 text-center contentBlock-top">
        <ul class="list-inline">
            <span class="h4 text-muted">Quick Links &raquo;</span
            <li>
                <a href="/<?php echo INDIACOM; ?>callForPapers">Call For Papers</a>
            </li>
            <li>
                <strong><a href="/<?php echo INDIACOM; ?>specialSessions">Special Sessions</a></strong>
            </li>
            <li>
                <a href="/<?php echo INDIACOM; ?>importantdates">Important Dates</a>
            </li>
            <li>
                <a href="/<?php echo INDIACOM; ?>reachingBVICAM">Reaching BVICAM</a>
            </li>
            <li>
                <a href="/<?php echo INDIACOM; ?>accomodation">Accomodation</a>
            </li>
            <?php
            if ( !isset($_SESSION[APPID]['member_id']) )
            {
            ?>
            <li>
                <a href="/<?php echo INDIACOM; ?>d/Registration/signUp">Register</a>
            </li>
            <?php
            }
            ?>
        </ul>
    </div>
</div>