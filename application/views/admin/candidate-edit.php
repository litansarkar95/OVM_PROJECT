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
                            <form role="form">
                                        <div class="form-group">
                                            <label>Enter First Name</label>
                                            <input class="form-control" type="text" placeholder="Enter Your First Name">
                                        </div>
                                        <div class="form-group">
                                            <label>Enter Last Name</label>
                                            <input class="form-control" type="text" placeholder="Enter Your Last Name">
                                        </div>
                                        <div class="form-group">
                                            <label>Canidate NID Number</label>
                                            <input class="form-control" type="text"placeholder="Enter Canidate NID Number">
                                        </div>
                                        <div class="form-group">
                                            <label>Enter Contact Number</label>
                                            <input class="form-control" type="text" placeholder="Enter Contact Number">
                                        </div>

                                        <div class="form-group">
                                            <label>Canidate Education</label>
                                            <select class="form-control">
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
                                            <input type="file" name="myImage" accept="image/x-png,image/gif,image/jpeg" />
                                        </div>

                                        <div class="form-group">
                                            <label>Canidate Gender</label>
                                            <select class="form-control">
                                                 <option>Select One</option>
                                                <option>Male</option>
                                                <option>Female</option>
                                                <option>Others</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Enter Canidate No</label>
                                            <input class="form-control" type="text" placeholder="Enter Canidate No">
                                        </div>

                                        <div class="form-group">
                                            <label>Enter Paty Image</label>
                                            <input type="file" name="myImage" accept="image/x-png,image/gif,image/jpeg" />
                                        </div>

                                        <div class="form-group">
                                            <label>Paty</label>
                                            <select class="form-control">
                                            <?php
                            foreach($allPat as $pdt){
                               
                                    echo " <option value=\"{$pdt->id}\" >{$pdt->name}</option>";
                               
                            }
                            ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Enter Birthday</label>
                                            <input class="form-control" type="text" placeholder="Enter Birthday">
                                        </div>
                                        <div class="form-group">
                                            <label>Enter Email</label>
                                            <input class="form-control" type="text" placeholder="Enter Email">
                                        </div>
                                        <div class="form-group">
                                  <label>Division Name</label>
                      
                            <select class="form-control" name="cat" id="cid">
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
                      
                            <select class="form-control" name="cat" id="cid">
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
                            <select class="form-control" name="districtid" id="scid">
                                        <option value="0">Choose Division First</option>
                                    </select>
                        </div>
                                        <div class="form-group">
                                            <label>Canidate Nationality</label>
                                            <select class="form-control">
                                                 <option>Select One</option>
                                                <option>Bangladesh</option>
                                                <option>Others</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Canidate Religion</label>
                                            <select class="form-control">
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
