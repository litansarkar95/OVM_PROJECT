<div id="page-inner">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-head-line">District Registration Form</h1>

        </div>
    </div>
    <!-- /. ROW  -->
    <div class="row">
        <div class="col-md-8 col-sm-8 col-xs-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    
                    <?php   $dt = $this->session->userdata("msg");
                    if ($dt != NULL) {
                        echo $dt;
                        $this->session->unset_userdata("msg");
                    }else{
                       echo "BASIC FORM"; 
                    }
                    ?>
                </div>
                <div class="panel-body">
                    <form id="sform" role="form"  name="sform"  method="post" action="<?php echo base_url() ?>candidate_area/insert" onsubmit="return valiform()">
                        <div class="form-group">
                            <label>Code</label>
                           <select class="form-control" name="code" id="code">
                                        <option value="0">Choose Division First</option>
                                    </select>
                                        
                        </div>
                        <div class="form-group">
                            <label>Code 2</label>
                           <select class="form-control" name="code2" id="code2">
                                        <option value="0">Choose Division First</option>
                                    </select>
                                        
                        </div>
                         <div class="form-group">
                            <label>Code 3</label>
                            <?php
                            $rang=rand(100000,999999);
                            echo $rang;
                            ?>
                            <input class="form-control" name="submit" value="<?php echo $rang; ?>" placeholder="Enter  seat_name" id = "code3" />
                                        
                        </div>
                        <div class="form-group">
                            <label>Seat Name</label>
                            <h5 style="color:red;"><?php echo form_error("seat_name"); ?></h5>
                            <input class="form-control" name="submit" placeholder="Enter  seat_name" id = "result2" />
                        </div>
                        
                        <div class="form-group">
                        <label>Candidate Area</label>
                       
                            <input class="form-control" name="candidate_area" placeholder="Enter  Name" id="candidate_area" />
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
                            <select class="form-control" name="districtid" id="scid">
                                        <option value="0">Choose Division First</option>
                                    </select>
                        </div>
                        <input type="button" name="submit" onClick="multiplyBy1()"  Value="multiplyCode" />
                        <button type="submit"  class="btn btn-info">Save </button>

                    </form>
                    
                    
                    <form>
1st Number : <input type="text" id="firstNumber" /><br>
2nd Number: <input type="text" id="secondNumber" /><br>
<input type="button" onClick="multiplyBy1()" Value="Multiply" />
<input type="button" onClick="divideBy()" Value="Divide" />
</form>
                    <p>The Result is : <br>
<span id = "result4"></span>
                </div>
            </div>
        </div>

    </div>
    <!--/.ROW-->
   
    <!-- /. ROW  -->
    <!-- /. PAGE INNER  -->
</div>
<script>
    function multiplyBy1()
   
{
       var  num4=Math.random();
        num1 = document.getElementById("code").value;
        num2 = document.getElementById("code2").value;
        num3 = document.getElementById("code3").value;
       
        document.getElementById("result4").innerHTML = num1 +num2 +num3;
}
    function multiplyBy()
{
        num1 = document.getElementById("firstNumber").value;
        num2 = document.getElementById("secondNumber").value;
        document.getElementById("result2").innerHTML = num1 * num2;
}
function divideBy() 
{ 
        num1 = document.getElementById("firstNumber").value;
        num2 = document.getElementById("secondNumber").value;
document.getElementById("result2").innerHTML = num1 / num2;
}
    
    function valiform() {
        var seat_no= document.sform.seat_no.value;
        var seat_name= document.sform.seat_name.value;
        var candidate_area= document.sform.candidate_area.value;
        var status = false;

        if (seat_no == null || seat_no == "") {
            document.getElementById("seat_no").style.border =
                    "2px solid red";
            status = false;
        } else {
            document.getElementById("seat_no").style.border =
                    "2px solid green";
            status = true;
        }
        if (seat_name == null || seat_name == "") {
            document.getElementById("seat_name").style.border =
                    "2px solid red";
            status = false;
        } else {
            document.getElementById("seat_name").style.border =
                    "2px solid green";
            status = true;
        }
        if (candidate_area == null || candidate_area == "") {
            document.getElementById("candidate_area").style.border =
                    "2px solid red";
            status = false;
        } else {
            document.getElementById("candidate_area").style.border =
                    "2px solid green";
            status = true;
        }




        return status;
    }
</script> 

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
$(document).ready(function(){
    $("#scid").change(function(){
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