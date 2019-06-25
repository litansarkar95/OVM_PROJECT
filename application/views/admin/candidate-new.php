  <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Canidate Registration Form</h1>

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
                        <form id="sform" role="form"  name="sform"  method="post" action="<?php echo base_url() ?>candidate/insert" enctype="multipart/form-data" onsubmit="return valiform()">
                      
                            
                            <div class="form-group">
                                            <label>Enter Canidate No</label>
                                            <input class="form-control" name="canidate_no" type="text" placeholder="Enter Canidate No" id="canidate_no">
                                        </div>
                                        <div class="form-group">
                                            <label>Enter First Name</label>
                                            <input class="form-control" type="text"  name="fname" placeholder="Enter Your First Name">
                                        </div>
                                        <div class="form-group">
                                            <label>Enter Last Name</label>
                                            <input class="form-control" type="text" name="lname" placeholder="Enter Your Last Name">
                                        </div>
                                        <div class="form-group">
                                            <label>Canidate NID Number</label>
                                            <input class="form-control" type="text" name="nid" placeholder="Enter Canidate NID Number">
                                        </div>
                                        <div class="form-group">
                                            <label>Enter Contact Number</label>
                                            <input class="form-control" type="text" name="contact" placeholder="Enter Contact Number">
                                        </div>

                                        <div class="form-group">
                                            <label>Canidate Education</label>
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
                                            <label>Enter Canidate Image</label>
                                            <input type="file" class="form-control" name="pic" />
                                        </div>

                                        <div class="form-group">
                                            <label>Canidate Gender</label>
                                            <select class="form-control" name="gender" >
                                                 <option>Select One</option>
                                                <option>Male</option>
                                                <option>Female</option>
                                                <option>Others</option>
                                            </select>
                                        </div>


                                        <div class="form-group">
                                            <label>Paty</label>
                                            <select class="form-control" name="party">
                                            <?php
                            foreach($allPat as $pdt){
                               
                                    echo " <option value=\"{$pdt->id}\" >{$pdt->name}</option>";
                               
                            }
                            ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Enter Birthday</label>
                                            <input class="form-control" value="<?php echo date("Y-m-d") ?>" name="start_date" id="start-date" />

                                        </div>
                                        <div class="form-group">
                                            <label>Enter Email</label>
                                            <input class="form-control" type="text" name="email" placeholder="Enter Email">
                                        </div>
                                        <div class="form-group">
                                  <label>Division Name</label>
                      
                            <select class="form-control" name="dat" id="did">
                                        <option value="0">Choose Division</option>
                                        <?php
                                        foreach ($allDat as $cat) {
                                            echo "<option value=\"{$cat->id}\">{$cat->name}</option>";
                                        }
                                        ?>
                                    </select>
                        </div>
                                        <div class="form-group">
                                  <label>District Name</label>
                      
                            <select class="form-control" name="cat" id="cid">
                                        <option value="0">Choose Division</option>
                                        
                                    </select>
                        </div>
                        <div class="form-group">
                            <label>Seat Name</label>
                            <select class="form-control" name="districtid" id="scid">
                                        <option value="0">Choose Division First</option>
                                    </select>
                        </div>
                                        <div class="form-group">
                                            <label>Canidate Nationality</label>
                                            <select class="form-control" name="nationality">
                                                 <option>Select One</option>
                                                <option>Bangladesh</option>
                                                <option>Others</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Canidate Religion</label>
                                            <select class="form-control" name="religion">
                                                 <option>Select One</option>
                                                <option>Muslim</option>
                                                <option>Hindu</option>
                                                <option>Others</option>
                                            </select>
                                        </div>
                                  
                                 
                                        <button type="submit" class="btn btn-info">Save </button>

                                    </form>
                            </div>
                        </div>
                            </div>

        </div>
             <!--/.ROW-->
            <!-- /. PAGE INNER  -->
        </div>
        <script>
    function valiform() {
        var canidate_no = document.sform.canidate_no.value;
        var status = false;

        if (canidate_no == null || canidate_no == "") {
            document.getElementById("canidate_no").style.border =
                    "2px solid red";
            status = false;
        } else {
            document.getElementById("canidate_no").style.border =
                    "2px solid green";
            status = true;
        }



        return status;
    }
</script> 

<!-- error -->
<!--
        <script>
$(document).ready(function(){
    $("#did").change(function(){
        var c = $("#did").val();
            var sc = "";
            if (c == 0)
            {
                sc += "<option value='0'>Choose Division First</option>";
            }

            <?php
    foreach ($allDat as $cat) {
    echo "else if (c == $cat->id) {";
        echo "sc += \"<option value='0'>Choose District</option>\";";
    foreach ($allCat as $scat) {
       if ($scat->divisionsid == $cat->id) {

            echo "sc += \"<option value='{$scat->id}'>{$scat->name}</option>\";";
        }
   }

    echo "}";
}
?>
             $("#cid").html(sc);
    });
});

$(document).ready(function(){
    $("#cid").change(function(){
        var c = $("#cid").val();
            var sc = "";
            if (c == 0)
            {
                sc += "<option value='0'>Choose Division First</option>";
            }

            <?php
    foreach ($allCat as $cat) {
    echo "else if (c == $cat->id) {";
    foreach ($allScat as $scat) {
       if ($scat->districtid == $cat->id) {

            echo "sc += \"<option value='{$scat->id}'>{$scat->seat_name}</option>\";";
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

        $('#start-date').datepicker({
            dateFormat: 'yy-mm-dd '
        });
        $('#end-date').datepicker({
            dateFormat: 'yy-mm-dd '
        });
    });
</script>