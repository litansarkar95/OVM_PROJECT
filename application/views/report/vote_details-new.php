<!--Print code   -->
<style>
    .hiddenprint_file {
        visibility: hidden;

    }
    .hiddenprint_file p{
        background-color:#0f834d;
        padding: 15px;
        color: white;
    }
    .woocommerce-thankyou-order-received ul li {
        float: left;
    }
</style>

<script>
    function printContent(el) {
        var restorepage = document.body.innerHTML;
        var printcontent = document.getElementById(el).innerHTML;
        document.body.innerHTML = printcontent;
        window.print();
        document.body.innerHTML = restorepage;
    }
</script>


<div id="page-inner">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-head-line">Vote  Result</h1>

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
                    <form id="sform" role="form"  name="sform"  method="post" action="<?php echo base_url() ?>report/vote_details" enctype="multipart/form-data" onsubmit="return valiform()">
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
                            <select class="form-control" name="scid" id="scid">
                                <option value="0">Choose Division First</option>
                            </select>
                        </div>



                        <input type="submit" name="sub" value="Search" class="btn btn-info">

                    </form>

                </div>
            </div>
        </div>
        <?php
        if (isset($allChat)) {
            ?>
            <div class="panel-body">

                <div class="table-responsive" id="div1">

                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">

                        <thead>
                            <tr>
                                <th>Divisions Name</th>
                                <th>District Name</th>
                                <th>Seat_name</th>
                                <th>Name </th>
                                <th>Party Name</th>
                                <th>Total Vote</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($allChat as $cat) {
                                ?>
                                <tr class="odd gradeX">
                                    <td><?php echo $cat->divisionsname; ?></td>
                                    <td><?php echo $cat->districtname; ?></td>
                                    <td><?php echo $cat->seat_name; ?></td>

                                    <td><?php echo $cat->first_name; ?></td>
                                    <td><?php echo $cat->party_listname; ?></td>
                                    <td><?php echo $cat->votecount; ?></td>



                                </tr>






        <?php
    }
    ?>


                        </tbody>
                    </table>

                    <button class="btn btn-info" onclick="printContent('div1')">Print</button>         
                </div>

            </div>
    <?php
}
?>

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


<script>
    $(document).ready(function () {
        $("#did").change(function () {
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






