<div id="page-inner">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-head-line">party_list Registration Form</h1>

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
                    <form id="sform" role="form"  name="sform"  method="post" action="<?php echo base_url() ?>party_list/insert" enctype="multipart/form-data" onsubmit="return valiform()">
                        <div class="form-group">
                            <label>Party Name</label>
                            <h5 style="color:red;"><?php echo form_error("name"); ?></h5>
                            <input class="form-control" name="name" placeholder="Enter  Name" id="name" />
                        </div>
                        <div class="form-group">
                            <label>Party Image</label>
                            <h5 style="color:red;"><?php echo form_error("pic"); ?></h5>
                            <input type="file" class="form-control" name="pic" placeholder="Enter  Name" id="pic" />
                        </div>
                        <a href="<?php echo base_url()?>rand.py" target="_blank">Picture</a>
                        <button type="submit" class="btn btn-info"><a href="<?php echo base_url()?>one1.py/v=tt">Save</a></button>

                    </form>
                </div>
            </div>
        </div>

    </div>
    <!--/.ROW-->
     <div class="row">
        <div class="col-md-12">

            <!--End Advanced Tables -->
        </div>
    </div>
    <!-- /. ROW  -->
    <!-- /. PAGE INNER  -->
</div>
<script>
    function valiform() {
        var name = document.sform.name.value;
        var status = false;

        if (name == null || name == "") {
            document.getElementById("name").style.border =
                    "2px solid red";
            status = false;
        } else {
            document.getElementById("name").style.border =
                    "2px solid green";
            status = true;
        }



        return status;
    }
</script> 