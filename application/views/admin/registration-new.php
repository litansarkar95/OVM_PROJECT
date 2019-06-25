<div id="page-inner">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-head-line"> Registration Form</h1>

        </div>
    </div>
    <!-- /. ROW  -->
    <div class="row">
        <div class="col-md-8 col-sm-8 col-xs-12">
            <div class="panel panel-info">
                <div class="panel-heading">

                    <?php
                    $dt = $this->session->userdata("msg");
                    if ($dt != NULL) {
                        echo $dt;
                        $this->session->unset_userdata("msg");
                    } else {
                        echo "BASIC FORM";
                    }
                    ?>
                </div>
                <div class="panel-body">
                    <form id="sform" role="form"  name="sform"  method="post" action="<?php echo base_url() ?>registration/insert" onsubmit="return valiform()">
                        <div class="form-group">
                            <label>Full Name</label>
                            <h5 style="color:red;"><?php echo form_error("fname"); ?></h5>
                            <input class="form-control" name="fname" placeholder="Enter  Name" id="fname" />
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <h5 style="color:red;"><?php echo form_error("email"); ?></h5>
                            <input type="email" class="form-control" name="email" placeholder="Enter  Email" id="email" />
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <h5 style="color:red;"><?php echo form_error("password"); ?></h5>
                            <input type="password" class="form-control" name="password" placeholder="Enter  Password" id="password" />
                        </div>
                        <div class="form-group">
                            <label>Gender</label>
                            <h5 style="color:red;"><?php echo form_error("name"); ?></h5>
                            <select class="form-control" name="gender"  >
                                <option value="m">Male</option>
                                <option value="f">Female</option>
                                <option value="o">Other</option>


                            </select>
                        </div>
                        <div class="form-group">
                            <label>District Name</label>

                            <select class="form-control" name="districtid"  >
                                <?php
                                foreach ($allCat as $pdt) {
                                    echo " <option value=\"{$pdt->id}\">{$pdt->name}</option>";
                                }
                                ?>


                            </select>
                        </div>
                        <div class="form-group">
                            <label>Mobile Number</label>
                            <h5 style="color:red;"><?php echo form_error("mobile"); ?></h5>
                            <input class="form-control" name="mobile" placeholder="Enter  Mobile" id="mobile" />
                        </div>
                        <div class="form-group">
                            <label>Role</label>

                            <select class="form-control" name="role"  >
                                <option value="a">Admin</option>
                                <option value="ad">Administer</option>
                                <option value="o">Other</option>


                            </select>
                        </div>

                        <button type="submit" class="btn btn-info">Save </button>

                    </form>
                </div>
            </div>
        </div>

    </div>
    <!--/.ROW-->
    <div class="row">
        <div class="col-md-12">
            <!-- Advanced Tables -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    Advanced Tables
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Gender</th>
                                    <th>Mobile</th>
                                    <th>District</th>
                                    <th>Type</th>
                                    <th>Active/Deactive</th>
                                    <th>Date</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($allCdt as $cat) {
                                    if ($cat->status == "1") {
                                        ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $cat->id; ?></td>
                                            <td><?php echo $cat->fullname; ?></td>
                                            <td><?php echo $cat->email; ?></td>
                                            <td><?php echo $cat->gender; ?></td>
                                            <td><?php echo $cat->mobile; ?></td>
                                            <td><?php echo $cat->tname; ?></td>
                                            <td><?php echo $cat->type; ?></td>
                                            <td><?php
                                                $active = $cat->active;
                                                if ($active == 1) {
                                                    ?>
                                                    <a href="<?php echo base_url() . "registration/deactive/{$cat->id}" ?>" class="btn btn-primary">Active</a>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <a href="<?php echo base_url() . "registration/active/{$cat->id}" ?>" class="btn btn-danger">Deactive</a>
                                                    <?php
                                                }
                                                ?>
                                            </td>
                                            <td><?php echo $cat->date; ?></td>

                                            <td class="center"><button class="btn btn-primary" data-toggle="modal" data-target="#myModal-<?php echo $cat->id; ?>"><i class="fa fa-edit "></i>Edit</button></td>
                                            <td class="center"><button class="btn btn-danger" data-toggle="modal" data-target="#delete-<?php echo $cat->id; ?>"><i class="fa fa-pencil"></i> Delete</button></td>


                                        </tr>

                                        <!-- ################# delete #################### -->

                                    <div class="modal fade" id="delete-<?php echo $cat->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <h4 class="modal-title" id="myModalLabel">District Delete</h4>
                                                </div>
                                                <form action=""> 
                                                    <div class="modal-body">
                                                        <h2>Are You Sure ?</h2>
                                                        <a href="<?php echo base_url() . "registration/delete/{$cat->id}" ?>"><button type="button" class="btn btn-info "><i class="fa fa-check"></i>Yes</button></a>
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                                                    </div>
                                                    <div class="modal-footer">


                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="modal fade" id="myModal-<?php echo $cat->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <h4 class="modal-title" id="myModalLabel">registration Edit</h4>
                                                </div>
                                                <form action="<?php echo base_url() ?>registration/update" method="post" > 
                                                    <div class="modal-body">

                                                        <div class="form-group">
                                                            <input type="hidden" class="form-control" name="id" value="<?php echo $cat->id ?>" id="id" />
                                                            <label>Full Name</label>
                                                            <h5 style="color:red;"><?php echo form_error("name"); ?></h5>
                                                            <input class="form-control" name="name" value="<?php echo $cat->fullname ?>" id="name" />

                                                        </div>


                                                        <div class="form-group">

                                                            <label>email</label>
                                                            <h5 style="color:red;"><?php echo form_error("email"); ?></h5>
                                                            <input class="form-control" name="email" value="<?php echo $cat->email ?>" id="name" />

                                                        </div>
                                                        <div class="form-group">

                                                            <label>mobile</label>
                                                            <h5 style="color:red;"><?php echo form_error("mobile"); ?></h5>
                                                            <input class="form-control" name="mobile" value="<?php echo $cat->mobile ?>" id="name" />

                                                        </div>
                                                        <div class="form-group">
                                                            <label>Division Name</label>
                                                            <select class="form-control" name="divisionsid"  >
                                                                <?php
                                                                foreach ($allCat as $cdt) {
                                                                    if ($cdt->id == $cat->tid) {
                                                                        echo " <option value=\"{$cdt->id}\" selected>{$cdt->name}</option>";
                                                                    } else {
                                                                        echo " <option value=\"{$cdt->id}\" >{$cdt->name}</option>";
                                                                    }
                                                                }
                                                                ?>


                                                            </select>      
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Role</label>
                                                            <select class="form-control" name="role"  >
                                                                <?php
                                                                if ($cat->type == a) {
                                                                    echo " <option value=\"a\" selected>Admin</option>";
                                                                    echo " <option value=\"ad\" >Administer</option>";
                                                                    echo " <option value=\"o\" >Others</option>";
                                                                } else if ($cat->type == ad) {
                                                                    echo " <option value=\"a\" >Admin</option>";
                                                                    echo " <option value=\"ad\" selected>Administer</option>";
                                                                    echo " <option value=\"o\" >Others</option>";
                                                                } else {
                                                                    echo " <option value=\"a\" >Admin</option>";
                                                                    echo " <option value=\"ad\" >Administer</option>";
                                                                    echo " <option value=\"o\" selected>Others</option>";
                                                                }
                                                                ?>


                                                            </select>      
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
        <?php
    }
}
?>


                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <!--End Advanced Tables -->
        </div>
    </div>
    <!-- /. ROW  -->
    <!-- /. PAGE INNER  -->
</div>
<script>
    function valiform() {
        var fname = document.sform.fname.value;
        var email = document.sform.email.value;
        var password = document.sform.password.value;
        var status = false;

        if (fname == null || fname == "") {
            document.getElementById("fname").style.border =
                    "2px solid red";
            alert("Enter Full Name")
            status = false;
        } else {
            document.getElementById("fname").style.border =
                    "2px solid green";
            status = true;
        }
        if (email == null || email == "") {
            document.getElementById("email").style.border =
                    "2px solid red";

            status = false;
        } else {
            document.getElementById("email").style.border =
                    "2px solid green";
            status = true;
        }
        if (password == null || password == "") {
            document.getElementById("password").style.border =
                    "2px solid red";

            status = false;
        } else {
            document.getElementById("password").style.border =
                    "2px solid green";
            status = true;
        }



        return status;
    }
</script> 