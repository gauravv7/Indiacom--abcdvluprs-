<?php
/**
 * Created by PhpStorm.
 * User: Pavithra
 * Date: 2/14/15
 * Time: 2:22 PM
 */
?>

<div id="contentPanel" class="col-sm-10 col-md-10">
    <h1 class="page-header">Desk Manager</h1>

    <div class="row">
        <form class="form-horizontal" enctype="multipart/form-data" method="post">
            <div class="form-group">
                <label for="searchby" class="col-sm-3 control-label"><span class="glyphicon "></span> Search by</label>

                <div class="col-sm-5">

                    <?php
                    $search_parameters = array("MemberID", "PaperID", "MemberName", "PaperTitle");
                    ?>
                    <div class="btn-group" data-toggle="buttons">
                        <?php
                        foreach ($search_parameters as $parameter) {
                            ?>
                            <label class="btn btn-primary">
                                <input type="radio" name="searchby" value="<?php echo $parameter; ?>"> <?php echo $parameter; ?>
                            </label>
                        <?php
                        }
                        ?>
<!--                        <label class="btn btn-primary">-->
<!--                            <input type="radio" name="searchby" id="option3" autocomplete="off"> Member Name-->
<!--                        </label>-->
<!--                        <label class="btn btn-primary">-->
<!--                            <input type="radio" name="searchby" id="option2" autocomplete="off"> Paper Title-->
<!--                        </label>-->
<!--                        <label class="btn btn-primary">-->
<!--                            <input type="radio" name="searchby" id="option2" autocomplete="off"> Paper ID-->
<!--                        </label>-->
                    </div>
<!--                    <select id="searchby" name="searchby" class="form-control">-->
<!--                        --><?php
//                        foreach ($search_parameters as $parameter) {
//                            ?>
<!--                            <option value ="--><?php //echo $parameter; ?><!--"<!----><?php ///*if(set_value('searchby') == $parameter) echo "selected" ;*/
//                            ?><!---->--><?php //echo $parameter ?><!--</option>-->
<!--                        --><?php
//                        }
//                        ?>
<!---->
<!--                    </select>-->
<!---->

                </div>
            </div>

            <div class="form-group">
                <label for="searchvalue" class="col-sm-3 control-label"><span class="glyphicon "></span> Search
                    Value</label>

                <div class="col-sm-5">
                    <input type="text" name="searchvalue" maxlength="50" class="form-control"
                           value="<?php echo set_value('searchvalue'); ?>" id="searchvalue" placeholder="Enter value">
                </div>
                <div class="col-sm-8 col-sm-offset-4 text-danger h5" id="errorText">
                    <?php echo form_error('searchvalue'); ?>
                </div>
            </div>

            <div class="col-sm-8 col-sm-offset-4 text-danger h5" id="errorText">
                <?php echo form_error('searchby'); ?>
            </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-6">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

    </form>
</div>

</div>
