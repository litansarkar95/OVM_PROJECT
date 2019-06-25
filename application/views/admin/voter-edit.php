<div id="page-inner">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-head-line">
                <?php
                $dt = $this->session->userdata("msg");
                if ($dt != NULL) {
                    echo $dt;
                    $this->session->unset_userdata("msg");
                } else {
                    echo "Voter Registration Form";
                }
                ?>
            </h1>

        </div>
    </div>
    <!-- /. ROW  -->
    <div class="row">
        <div class="col-md-8 col-sm-8 col-xs-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    BASIC FORM
                </div>
                <div class="panel-body">
                    <?php
                    foreach ($allPdt as $pdt) {
                        ?>
                        <form id="sform" role="form"  name="sform"  method="post" action="<?php echo base_url() ?>voter/insert" enctype="multipart/form-data" onsubmit="return valiform()">
                            <!-- START NID -->
                            <div class="form-group">

                                <select style="display:none;" class="form-control" name="code" id="code">
                                    <option value="0">Choose Division First</option>
                                </select>

                                <select style="display:none;" class="form-control" name="code2" id="code2">
                                    <option value="0">Choose Division First</option>
                                </select>

                                <?php
                                $rang = rand(100000, 999999);
                                ?>
                                <input style="display:none;" class="form-control" name="submit" value="<?php echo $rang; ?>" placeholder="Enter  seat_name" id = "code3" />

                            </div>

                            <!-- END NID -->
                            <div class="form-group">
                                <label>Enter First Name</label>
                                <h5 style="color:red;"><?php echo form_error("fname"); ?></h5>
                                <input class="form-control" type="text"  name="fname" placeholder="Enter Your First Name" value="<?php echo $pdt->first_name; ?>" >
                            </div>
                            <div class="form-group">
                                <label>Enter Last Name</label>
                                <input class="form-control" type="text" name="lname" placeholder="Enter Your Last Name" value="<?php echo $pdt->last_name; ?>" >
                            </div>
                            <div class="form-group">
                                <label>Enter Father Name</label>
                                <input class="form-control" type="text" name="fathername" placeholder="Enter Your Father Name" value="<?php echo $pdt->father_name; ?>" >
                            </div>
                            <div class="form-group">
                                <label>Division Name</label>

                                <select class="form-control" name="cid" id="cid">
                                    <option value="0">Choose Division</option>
                                    <?php
                                    foreach ($allCat as $cat) {
                                        echo "<option value=\"{$cat->id}\">{$cat->name}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>District Name</label>

                                <select class="form-control" name="scid" id="scid">
                                    <option value="0">Choose Division</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <label>Seat Name</label>
                                <select class="form-control" name="setid" id="setid">
                                    <option value="0">Choose Division First</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <textarea class="form-control" type="text" name="address" placeholder="address"><?php echo $pdt->address; ?></textarea>
                            </div>

                            <div class="form-group">
                                <label>Enter Contact Number</label>
                                <input class="form-control" type="text" onClick="multiplyBy1()" name="contact" placeholder="Enter Contact Number" value="<?php echo $pdt->contact; ?>" >
                            </div>

                            <div class="form-group">
                                <label>Education</label>
                                <select class="form-control" name="education">
                                    <option>Select One</option>
                                    <option>None</option>
                                    <option>S.S.C</option>
                                    <option>H.S.C</option>
                                    <option>Degree</option>
                                    <option>Masters</option>
                                    <option>PHD</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Enter  Image</label>
                                <input type="file" class="form-control" name="pic" />
                            </div>

                            <div class="form-group">
                                <label>Gender</label>
                                <select class="form-control" name="gender" >
                                    <?php
                                    $dd = $pdt->gender;
                                    if ($dd == "Male") {
                                        echo "<option selected>Male</option>";
                                        echo "<option>Female</option>";
                                        echo "<option>Others</option>";
                                    }
                                   else if ($dd == Female) {
                                        echo "<option>Male</option>";
                                        echo "<option selected>Female</option>";
                                        echo "<option>Others</option>";
                                    } else  {
                                        echo "<option>Male</option>";
                                        echo "<option>Female</option>";
                                        echo "<option selected>Others</option>";
                                    }
                                    ?>
                                    
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Enter Birthday</label>
                                <input type="date" class="form-control" value="<?php echo $pdt->dob; ?>" name="start_date" id="start-date" />

                            </div>
                            <div class="form-group">

                                <label>Enter Email</label>
                                <input class="form-control" type="email" value="<?php echo $pdt->email; ?>" name="email"  placeholder="Enter Email">
                            </div>

                            <div class="form-group">
                                <label> Nationality</label>
                                <select class="form-control" name="nationality">
                                    <?php
                                    $dd = $pdt->nationality;
                                    if ($dd == "Bangladesh") {
                                        echo "<option selected>Bangladesh</option>";
                                        echo "<option>Others</option>";
                                    } else {
                                        echo "<option>Bangladesh</option>";
                                        echo "<option selected>Others</option>";
                                    }
                                    ?>
                                </select>
                            </div>


                            <div class="form-group">
                                <label> NID Number</label>
                                <h5 style="color:red;"><?php echo form_error("nid"); ?></h5>

                                <textarea  class="form-control" rows="1" cols="16" id="result4" name="nid"><?php echo $pdt->nid; ?> </textarea>
                            </div>
                            <div class="form-group">
                                <label> Religion</label>
                                <select class="form-control" name="religion">

                                    <?php
                                    $dd = $pdt->religion;
                                    if ($dd == "Muslim") {
                                        echo "<option selected>Muslim</option>";
                                        echo "<option>Hindu</option>";
                                        echo "<option>Others</option>";
                                    }
                                    if ($dd == Hindu) {
                                        echo "<option>Muslim</option>";
                                        echo "<option selected>Hindu</option>";
                                        echo "<option>Others</option>";
                                    } else if ($dd == Others) {
                                        echo "<option>Muslim</option>";
                                        echo "<option>Hindu</option>";
                                        echo "<option selected>Others</option>";
                                    }
                                    ?>

                                </select>
                            </div>


                            <button type="submit"  class="btn btn-info">Update </button>

                        </form>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>

    </div>
    <!--/.ROW-->
    <!-- /. PAGE INNER  -->
</div>
<!-- NID Start -->
<script>
    $(document).ready(function () {
        $("#cid").change(function () {
            var c = $("#cid").val();
            var sc = "";
            if (c == 0)
            {
                sc += "<option value='0'>Choose Division First</option>";
            }

<?php
foreach ($allCat as $cat) {
    echo "else if (c == $cat->id) {";
    foreach ($allCat as $scat) {
        // if ($scat->divisionsid == $cat->id) {

        echo "sc += \"<option value='{$cat->code}'>{$cat->code}</option>\";";
        // }
    }

    echo "}";
}
?>
            $("#code").html(sc);
        });
    });

</script>
<script>
    $(document).ready(function () {
        $("#scid").change(function () {
            var c = $("#scid").val();
            var sc = "";
            if (c == 0)
            {
                sc += "<option value='0'>Choose Division First</option>";
            }

<?php
foreach ($allScat as $cat) {
    echo "else if (c == $cat->id) {";
    foreach ($allScat as $scat) {
        // if ($scat->divisionsid == $cat->id) {

        echo "sc += \"<option value='{$cat->code}'>{$cat->code}</option>\";";
        // }
    }

    echo "}";
}
?>
            $("#code2").html(sc);
        });
    });

</script>
<script>
    function multiplyBy1()

    {
        var num4 = Math.random();
        num1 = document.getElementById("code").value;
        num2 = document.getElementById("code2").value;
        num3 = document.getElementById("code3").value;

        document.getElementById("result4").innerHTML = num1 + num2 + num3;
    }

</script>
<!-- end NID -->

<script>
    function valiform() {
        var fname = document.sform.fname.value;

        var status = false;

        if (fname == null || fname == "") {
            document.getElementById("fname").style.border =
                    "2px solid red";
            alert('First Name');
            status = false;
        } else {
            document.getElementById("fname").style.border =
                    "2px solid green";
            status = true;
        }



        return status;
    }
</script> 
<script>
    $(document).ready(function () {
        $("#cid").change(function () {
            var c = $("#cid").val();
            var sc = "";
            if (c == 0)
            {
                sc += "<option value='0'>Choose Division First</option>";
            }

<?php
foreach ($allCat as $cat) {
    echo "else if (c == $cat->id) {";
    echo "sc += \"<option value='0'>Choose District</option>\";";
    foreach ($allScat as $scat) {
        if ($scat->divisionsid == $cat->id) {

            echo "sc += \"<option value='{$scat->id}'>{$scat->name}</option>\";";
        }
    }

    echo "}";
}
?>
            $("#scid").html(sc);
        });
    });

</script>
<script>
    $(document).ready(function () {
        $("#scid").change(function () {
            var c = $("#scid").val();
            var sc = "";
            if (c == 0)
            {
                sc += "<option value='0'>Choose Division First</option>";
            }

<?php
foreach ($allScat as $cat) {
    echo "else if (c == $cat->id) {";
    foreach ($allSit as $scat) {
        if ($scat->districtid == $cat->id) {

            echo "sc += \"<option value='{$scat->id}'>{$scat->seat_name}</option>\";";
        }
    }

    echo "}";
}
?>
            $("#setid").html(sc);
        });
    });

</script>
<script>
    $(document).ready(function () {

        $('#start-date').datepicker({
            dateFormat: 'yy-mm-dd '
        });
        $('#end-date').datepicker({
            dateFormat: 'yy-mm-dd '
        });
    });
</script>

<!--- NID --->

