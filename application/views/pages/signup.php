<div class="container-fluid">
    <div class="row contentBlock-top">
        <div class="col-md-9 col-md-offset-2 col-sm-8 col-sm-offset-0 col-xs-12 col-xs-offset-0 h1 text-theme">
            Member Registration
        </div>
    </div>
    <div class="row">
        <div class="col-md-9 col-md-offset-2 col-sm-8 col-sm-offset-0 col-xs-12 col-xs-offset-0 h5">
            Already a member? <button class="btn btn-sm btn-success">Login</button>
            <p class="text-muted ">
                Note: The certificate acknowledging your contributions would be generated based on the records submitted here by you.
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-2 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0">
            <form class="form-horizontal" method = "post" action="#">
                <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">Name</label>
                    <div class="col-sm-9">
                        <input type="text" name = "name" class="form-control" id="name" placeholder="Enter name">
                    </div>
                    <div class="col-sm-8 col-sm-offset-4 text-danger h5" id="errorText">
                        <?php echo form_error('name'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-9">
                        <input type="email" name = "email" class="form-control" id="email" placeholder="Enter email">
                    </div>
                    <div class="col-sm-8 col-sm-offset-4 text-danger h5" id="errorText">
                        <?php echo form_error('email'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="address" class="col-sm-3 control-label">Address</label>
                    <div class="col-sm-9">
                        <textarea name = "address" class="form-control" id="address" placeholder="Enter full address"></textarea>
                    </div>
                    <div class="col-sm-8 col-sm-offset-4 text-danger h5" id="errorText">
                        <?php echo form_error('address'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="pincode" class="col-sm-3 control-label">Pincode</label>
                    <div class="col-sm-9">
                        <input type="text" name = "pincode" class="form-control" id="pincode" placeholder="Enter Pincode or Zipcode">
                    </div>
                    <div class="col-sm-8 col-sm-offset-4 text-danger h5" id="errorText">
                        <?php echo form_error('pincode'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="phoneNumber" class="col-sm-3 control-label">Phone Number</label>
                    <div class="col-sm-9">
                        <input type="tel" name = "phoneNumber" class="form-control" id="phoneNumber" placeholder="Enter Phone Number">
                    </div>
                    <div class="col-sm-8 col-sm-offset-4 text-danger h5" id="errorText">
                        <?php echo form_error('phoneNumber'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="mobileNumber" class="col-sm-3 control-label">Mobile Number</label>
                    <div class="col-sm-9">
                        <input type="tel" name = "mobileNumber" class="form-control" id="mobileNumber" placeholder="Enter Mobile Number">
                    </div>
                </div>
                <div class="form-group">
                    <label for="fax" class="col-sm-3 control-label">Fax Number</label>
                    <div class="col-sm-9">
                        <input type="tel" name = "fax" class="form-control" id="fax" placeholder="Enter Fax Number">
                    </div>

                </div>
                <div class="form-group">
                    <label for="biodata" class="col-sm-3 control-label">Biodata</label>
                    <div class="col-sm-9">
                        <input type="file" name = "biodata" class="form-control" id="biodata" placeholder="Choose File">
                    </div>
                </div>
                <div class="form-group">
                    <label for="csimembershipno" class="col-sm-3 control-label">CSI Membership Number</label>
                    <div class="col-sm-9">
                        <input type="text" name = "csimembershipno" class="form-control" id="csimembershipno" placeholder="Enter CSI Membership Number">
                    </div>

                </div>
                <div class="form-group">
                    <label for="ietemembershipno" class="col-sm-3 control-label">IETE Membership Number</label>
                    <div class="col-sm-9">
                        <input type="text" name = "ietemembershipno" class="form-control" id="ietemembershipno" placeholder="Enter IETE Membership Number">
                    </div>
                </div>
                <div class="form-group">
                    <label for="category" class="col-sm-3 control-label">Category</label>
                    <div class="col-sm-9">
                        <select name = "category" class="form-control" id="category">
                            <option value="researchStudent">Research Student</option>
                            <option value="student">Student</option>
                            <option value="faculty">Faculty</option>
                            <option value="industryRepresentative">Industry Representative</option>
                        </select>
                    </div>
                    <div class="col-sm-8 col-sm-offset-4 text-danger h5" id="errorText">
                        <?php echo form_error('category'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="organization" class="col-sm-3 control-label">Organization</label>
                    <div class="col-sm-9">
                        <input type="text" name = "organization" class="form-control" id="keyword" placeholder="Start typing name of Organization here">
                    </div>
                    <div class="col-sm-8 col-sm-offset-4 text-danger h5" id="errorText">
                        <?php echo form_error('organization'); ?>
                    </div>
                    <div id="ajax_response"></div>
                </div>
                <div class="form-group">
                    <label for="experience" class="col-sm-3 control-label">Experience</label>
                    <div class="col-sm-9">
                        <input type="tel" name = "experience" class="form-control" id="experience" placeholder="Enter Experience in the Organization">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Password</label>
                    <div class="col-sm-9">
                        <input type="password" name = "password" class="form-control" id="password" placeholder="Enter strong password">
                    </div>
                    <div class="col-sm-8 col-sm-offset-4 text-danger h5" id="errorText">
                        <?php echo form_error('password'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password2" class="col-sm-3 control-label">Confirm Password</label>
                    <div class="col-sm-9">
                        <input type="password" name = "password2" class="form-control" id="password2" placeholder="Re-enter password">
                    </div>
                    <div class="col-sm-8 col-sm-offset-4 text-danger h5" id="errorText">
                        <?php echo form_error('password2'); ?>
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