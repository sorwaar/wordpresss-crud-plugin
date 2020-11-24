<?php

class Sh_Sales_Manager_Admin_Teams
{

    function sh_teams_page_handler() 
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'sh_sm_teams';
        if(isset($_POST["newsubmit"])) {
            $name = $_POST["newname"];
            $email = $_POST["newemail"];
            $created_by = get_current_user_id();
            $created_at = date('Y-m-d H:i:s');

            $wpdb->query("INSERT INTO $table_name(name,email,created_by,created_at) VALUES('$name','$email','$created_by','$created_at')");
            echo "<script>location.replace('admin.php?page=sh-sales-manager-sales-team');</script>";
        }
        if(isset($_POST["uptsubmit"])) {
            $id = $_POST["uptid"];
            $name = $_POST["uptname"];
            $email = $_POST["uptemail"];
            $wpdb->query("UPDATE $table_name SET name='$name',email='$email' WHERE id='$id'");
            echo "<script>location.replace('admin.php?page=sh-sales-manager-sales-team');</script>";
        }
        if(isset($_GET["del"])) {
            $del_id = $_GET["del"];
            $wpdb->query("DELETE FROM $table_name WHERE id='$del_id'");
            echo "<script>location.replace('admin.php?page=sh-sales-manager-sales-team');</script>";
        }
        ?>
    <div id="col-container" class="wp-clearfix">
        <div class="icon32 icon32-posts-post" id="icon-edit"><br></div>
        <h2><?php _e('Teams', 'sh-sales-manager')?></h2>
        <div id="col-left">
            <div class="col-wrap wrap">
                <div class="form-wrap">
                    <h2><?php _e('Add New Team', 'sh-sales-manager')?></h2>
                </div>
                <form action="" method="post">
                    <div class="form-wrap">
                        <div class="form-field">
                            <label for="tag-name"><?php _e('Name:', 'sh-sales-manager')?></label>
                            <input name="newname" id="newname" type="text" value="" size="40" aria-required="true">
                            <p>Name of the team</p>
                        </div>
                        <div class="form-field">
                            <label for="tag-name"><?php _e('E-Mail:', 'sh-sales-manager')?></label>
                            <input name="newemail" id="newemail" type="text" value="" size="40">
                            <p>Email of the team</p>
                        </div>
                       
                        <div class="form-field"> 
                            <button id="newsubmit" name="newsubmit" type="submit">INSERT</button>
                        </div>
                    </div> 
                </form>
                <br><br>

            </div>
        </div><!-- /col-left -->

        <div id="col-right">
            <div class="col-wrap wrap">
                <h3><?php _e('Team List', 'sh-sales-manager')?></h3>
                <table class="wp-list-table widefat striped">
                <thead>
                    <tr>
                        <th width="25%"> ID</th>
                        <th width="25%">Team Name</th>
                        <th width="25%">Email Address</th>
                        <th width="25%">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $result = $wpdb->get_results("SELECT * FROM $table_name");
                        foreach ($result as $print) {
                            echo "
                                <tr>
                                    <td width='25%'>$print->id</td>
                                    <td width='25%'>$print->name</td>
                                    <td width='25%'>$print->email</td>
                                    <td width='25%'><a href='admin.php?page=sh-sales-manager-sales-team&upt=$print->id'><button type='button'>UPDATE</button></a> <a href='admin.php?page=sh-sales-manager-sales-team&del=$print->id'><button type='button'>DELETE</button></a></td>
                                </tr>
                            ";
                        }
                    ?>
                </tbody>    
            </table><br><br>

            <?php
                if(isset($_GET["upt"])) {
                    $upt_id = $_GET["upt"];
                    $result = $wpdb->get_results("SELECT * FROM $table_name WHERE id='$upt_id'");
                    foreach($result as $print) {
                        $name = $print->name;
                        $email = $print->email;
                    }
                    echo "
                    <table class='wp-list-table widefat striped'>
                        <thead>
                            <tr>
                                <th width='25%'>ID</th>
                                <th width='25%'>Team Name</th>
                                <th width='25%'>Email Address</th>
                                <th width='25%'>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <form action='' method='post'>
                                <tr>
                                    <td width='25%'>$print->id <input type='hidden' id='uptid' name='uptid' value='$print->id'></td>
                                    <td width='25%'><input type='text' id='uptname' name='uptname' value='$print->name'></td>
                                    <td width='25%'><input type='text' id='uptemail' name='uptemail' value='$print->email'></td>
                                    <td width='25%'><button id='uptsubmit' name='uptsubmit' type='submit'>UPDATE</button> <a href='admin.php?page=sh-sales-manager-sales-team'><button type='button'>CANCEL</button></a></td>
                                </tr>
                            </form>
                        </tbody>
                    </table>";
                }
            ?>

            </div><!-- /col-right -->
        </div>
    </div>

        <?php
    }

}
