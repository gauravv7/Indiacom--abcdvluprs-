<script src="/<?php echo PATH ?>assets/js/AJAX.js"></script>
<link rel="stylesheet" href="/<?php echo PATH ?>assets/css/AJAXstyle.css">

<div class="container-fluid">
    <div class="row contentBlock-top">
        <div class="col-md-9 col-md-offset-2 col-sm-8 col-sm-offset-0 col-xs-12 col-xs-offset-0">
            <h1 class="text-theme">Member Registration</h1>
            <hr>
            <?php
            if(isset($_SESSION) && !isset($_SESSION[APPID]['member_id']))
            {
            ?>
            <p class="body-text">
            Already a member? <button class="btn btn-sm btn-success">Login</button>
            </p>
            <?php
            }
            ?>
            <p class="text-muted body-text">
                Note: The certificate acknowledging your contributions would be generated based on the records submitted here by you.
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-2 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0">
            <form class="form-horizontal" enctype="multipart/form-data" method = "post">
                <div class="form-group">
                    <label for="salutation" class="col-sm-3 control-label"><span class="glyphicon glyphicon-asterisk text-danger"></span> Salutation</label>
                    <div class="col-sm-3">

                        <?php
                            $salutation = array("Mr", "Ms", "Mrs", "Dr", "Prof", "Sir");
                        ?>

                        <select id="salutation" name="salutation" class="form-control">
                            <?php
                                foreach($salutation as $value)
                                {
                            ?>
                            <option value = <?php echo $value ?> <?php if(set_value('salutation') == $value) echo "selected" ;?>><?php echo $value ?></option>
                            <?php
                                }
                            ?>

                        </select>
                    </div>
                    <div class="col-sm-8 col-sm-offset-4 text-danger h5" id="errorText">
                        <?php echo form_error('salutation'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label"><span class="glyphicon glyphicon-asterisk text-danger"></span> Name</label>
                    <div class="col-sm-9">
                        <input type="text" name = "name" maxlength="50" class="form-control" value="<?php echo set_value('name'); ?>" id="name" placeholder="Enter name">
                    </div>
                    <div class="col-sm-8 col-sm-offset-4 text-danger h5" id="errorText">
                        <?php echo form_error('name'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label"><span class="glyphicon glyphicon-asterisk text-danger"></span> Email</label>
                    <div class="col-sm-9">
                        <input type="email" name = "email" class="form-control" value="<?php echo set_value('email'); ?>" id="email" placeholder="Enter email">
                    </div>
                    <div class="col-sm-8 col-sm-offset-4 text-danger h5" id="errorText">
                        <?php echo form_error('email'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="address" class="col-sm-3 control-label"><span class="glyphicon glyphicon-asterisk text-danger"></span> Address</label>
                    <div class="col-sm-9">
                        <textarea name = "address" maxlength="100" class="form-control" id="address" placeholder="Enter full address"><?php echo set_value('address'); ?></textarea>
                    </div>
                    <div class="col-sm-8 col-sm-offset-4 text-danger h5" id="errorText">
                        <?php echo form_error('address'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="pincode"  class = "col-sm-3 control-label"><span class="glyphicon glyphicon-asterisk text-danger"></span> Pincode</label>
                    <div class="col-sm-9">
                        <input type="tel" name = "pincode" maxlength="10" class="form-control" id="pincode" value="<?php echo set_value('pincode'); ?>" placeholder="Enter Pincode or Zipcode">
                    </div>
                    <div class="col-sm-8 col-sm-offset-4 text-danger h5" id="errorText">
                        <?php echo form_error('pincode'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="phoneNumber" class="col-sm-3 control-label"><span class="glyphicon glyphicon-asterisk text-danger"></span>Phone Number</label>
                    <div class="col-sm-9">
                        <input type="tel" name = "phoneNumber" maxlength = "20" class="form-control" id="phoneNumber" value="<?php echo set_value('phoneNumber'); ?>" placeholder="Enter Phone Number">
                    </div>
                    <div class="col-sm-8 col-sm-offset-4 text-danger h5" id="errorText">
                        <?php echo form_error('phoneNumber'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="mobileNumber" class="col-sm-3 control-label"><span class="glyphicon glyphicon-asterisk text-danger"></span>Mobile Number</label>
                    <div class="col-sm-9">
                        <div class="col-sm-4">
                            <input type="tel" name = "countryCode"  maxlength="5" class="form-control" id="countryCode" value="<?php echo set_value('countryCode'); ?>" placeholder="Country Code">
                        </div>
                        <div class="col-sm-8">
                            <input type="tel" name = "mobileNumber"  maxlength="10" class="form-control" id="mobileNumber" value="<?php echo set_value('mobileNumber'); ?>" placeholder="Enter Mobile Number">
                        </div>
                    </div>
                    <div class="col-sm-8 col-sm-offset-4 text-danger h5" id="errorText">
                        <?php echo form_error('countryCode'); ?>
                        <?php echo form_error('mobileNumber'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="fax" class="col-sm-3 control-label">Fax Number</label>
                    <div class="col-sm-9">
                        <input type="tel" name = "fax" maxlength="20" class="form-control" id="fax" value="<?php echo set_value('fax'); ?>" placeholder="Enter Fax Number">
                    </div>


                </div>
                <div class="form-group">
                    <label for="biodata" class="col-sm-3 control-label">Biodata</label>
                    <div class="col-sm-9">
                        <input type="file" name = "biodata" class="form-control" id="biodata" placeholder="Choose File">
                    </div>
					<div class="col-sm-8 col-sm-offset-4 text-danger h5" id="errorText">
                        <?php
                        echo form_error('biodata');
                        if(isset($uploadError)) echo $uploadError;
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="csimembershipno" class="col-sm-3 control-label">CSI Membership Number</label>
                    <div class="col-sm-9">
                        <input type="tel" name = "csimembershipno" maxlength="30" class="form-control" id="csimembershipno" value="<?php echo set_value('csimembershipno'); ?>" placeholder="Enter CSI Membership Number">
                    </div>


                </div>
                <div class="form-group">
                    <label for="ietemembershipno" class="col-sm-3 control-label">IETE Membership Number</label>
                    <div class="col-sm-9">
                        <input type="tel" name = "ietemembershipno" maxlength="30" class="form-control" id="ietemembershipno" value="<?php echo set_value('ietemembershipno'); ?>" placeholder="Enter IETE Membership Number">
                    </div>
                </div>
                <div class="form-group">
                    <label for="category" class="col-sm-3 control-label"><span class="glyphicon glyphicon-asterisk text-danger"></span> Category</label>
                    <div class="col-sm-9">
                        <select name = "category" class="form-control" id="category" >
                            <?php foreach($member_categories as $category)
                                  {
                            ?>
                                <option value = "<?php echo $category -> member_category_id ?>" <?php if(set_value('category') == $category -> member_category_id) echo "selected" ; ?>><?php echo $category -> member_category_name ?></option>
                            <?php
                                  }
                            ?>
                        </select>


                    </div>
                    <div class="col-sm-8 col-sm-offset-4 text-danger h5" id="errorText">
                        <?php echo form_error('category'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="organization" class="col-sm-3 control-label"><span class="glyphicon glyphicon-asterisk text-danger"></span> Organization</label>
                    <div class="col-sm-9">
                        <input type="text" name = "organization" autocomplete="off" class="form-control" id="keyword" value="<?php echo set_value('organization'); ?>" placeholder="Start typing name of Organization here">
                        <div id="ajax_response"></div>
                    </div>
                    <div class="col-sm-8 col-sm-offset-4 text-danger h5" id="errorText">
                        <?php echo form_error('organization'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="department" class="col-sm-3 control-label"><span class="glyphicon glyphicon-asterisk text-danger"></span> Department</label>
                    <div class="col-sm-9">
                        <input type="text" name = "department" class="form-control" id="department" value="<?php echo set_value('department'); ?>" placeholder="Enter your department">
                    </div>
                    <div class="col-sm-8 col-sm-offset-4 text-danger h5" id="errorText">
                        <?php echo form_error('department'); ?>
                    </div>
                </div>

                <div class="form-group category-based">
                    <label for="designation" class="col-sm-3 control-label">Designation</label>
                    <div class="col-sm-9">
                        <input type="text" name = "designation" class="form-control" id="designation" value="<?php echo set_value('designation'); ?>" placeholder="Enter Designation in the Organization">
                    </div>
                </div>

                <div class="form-group category-based">
                    <label for="experience" class="col-sm-3 control-label">Experience</label>
                    <div class="col-sm-9">
                        <input type="text" name = "experience"  maxlength="2" class = "form-control" id="experience" value="<?php echo set_value('experience'); ?>" placeholder="Enter Experience in the Organization">
                    </div>
                </div>
                <!--div class="form-group">
                    <label for="password" class="col-sm-3 control-label"><span class="glyphicon glyphicon-asterisk text-danger"></span> Password</label>
                    <div class="col-sm-9">
                        <input type="password" name = "password" class="form-control" id="password" placeholder="Enter strong password">
                    </div>
                    <div class="col-sm-8 col-sm-offset-4 text-danger h5" id="errorText">
                        <?php echo form_error('password'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password2" class="col-sm-3 control-label"><span class="glyphicon glyphicon-asterisk text-danger"></span> Confirm Password</label>
                    <div class="col-sm-9">
                        <input type="password" name = "password2" class="form-control" id="password2" placeholder="Re-enter password">
                    </div>
                    <div class="col-sm-8 col-sm-offset-4 text-danger h5" id="errorText">
                        <?php echo form_error('password2'); ?>
                    </div>
                </div-->

                <div class="form-group">
                    <label for="captcha" class="col-sm-3 control-label">Captcha</label>
                    <div class="col-sm-9">
                        <div class="row">
                            <div class="col-md-12">
                                <?php echo $image;   ?>
                            </div>
                            <div class="col-md-12 contentBlock-top">
                                <input type="text" name = "captcha" class="form-control" id="captcha" placeholder="Enter the letters in the image above">
                            </div>
                            <div class="col-sm-8 col-sm-offset-4 text-danger h5" id="errorText">
                                <?php echo form_error('captcha'); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" class="btn btn-primary">Sign Up</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </div>
                </div>

            </form>

        </div>

    </div>
</div>