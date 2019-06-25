<div id="page-inner">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-head-line">Canidate Result</h1>

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
                    <form id="sform" role="form"  name="sform"  method="post" action="<?php echo base_url() ?>report/vote" enctype="multipart/form-data" onsubmit="return valiform()">
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
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    Result Chart
                </div>
                <div class="panel-body">
                    <div id="graph"></div>
                </div>
            </div></div>
       

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


<script src="<?php echo base_url() . 'assets/chart/js/jquery.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/chart/js/raphael-min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/chart/js/morris.min.js' ?>"></script>



<script>
    Morris.Bar({
        element: 'graph',
        data: <?php echo $allChat; ?>,
        xkey: 'party_listname',
        ykeys: ['votecount'],
        labels: ['votecount']
    });
</script>





