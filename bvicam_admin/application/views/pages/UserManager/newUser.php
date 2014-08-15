<?php
/**
 * Created by PhpStorm.
 * User: Kisholoy
 * Date: 8/11/14
 * Time: 9:09 PM
 */
?>

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header">New User</h1>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <form class="form-horizontal" role="form" action="#" method="post">
                <div class="form-group">
                    <label for="userName" class="col-sm-3 control-label">User Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="userName" id="userName" placeholder="Enter user's name">
                    </div>
                    <div class="col-sm-8 col-sm-offset-4 text-danger h5" id="errorText">
                        <?php echo form_error('userName'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="userEmail" class="col-sm-3 control-label">User Email</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="userEmail" id="userEmail" placeholder="Enter user's email id">
                    </div>
                    <div class="col-sm-8 col-sm-offset-4 text-danger h5" id="errorText">
                        <?php echo form_error('userEmail'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="userPassword" class="col-sm-3 control-label">User Password</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="userPassword" id="userPassword" placeholder="Enter user's password">
                    </div>
                    <div class="col-sm-8 col-sm-offset-4 text-danger h5" id="errorText">
                        <?php echo form_error('userPassword'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="roles" class="col-sm-3 control-label">User Roles</label>
                    <div class="col-sm-9">
                        <select name="roles[]" id="roles" multiple="multiple">
                            <?php
                            foreach($roles as $role)
                            {
                            ?>
                                <option value="<?php echo $role->role_id; ?>"><?php echo $role->role_name; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-sm-8 col-sm-offset-4 text-danger h5" id="errorText">
                        <?php  ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="events" class="col-sm-3 control-label">User Events</label>
                    <div class="col-sm-9">
                        <select name="events[]" id="events" multiple="multiple">
                            <?php
                            foreach($events as $event)
                            {
                            ?>
                                <option value="<?php echo $event->event_id; ?>"><?php echo $event->event_name; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-sm-8 col-sm-offset-4 text-danger h5" id="errorText">
                        <?php  ?>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>