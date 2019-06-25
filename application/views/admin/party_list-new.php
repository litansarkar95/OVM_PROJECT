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
                            <label>Symbol name</label>
                            <h5 style="color:red;"><?php echo form_error("symbol"); ?></h5>
                            <input class="form-control" name="symbol" placeholder="Enter  Name" id="" />
                        </div>
                        <div class="form-group">
                            <label>Party Image</label>
                            <h5 style="color:red;"><?php echo form_error("pic"); ?></h5>
                            <input type="file" class="form-control" name="pic" placeholder="Enter  Name" id="pic" />
                        </div>
                        <div class="form-group">
                            <label>President Name</label>
                            <h5 style="color:red;"><?php echo form_error("president"); ?></h5>
                            <input class="form-control" name="president" placeholder="Enter President Name" id="" />
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
                                     <th>Symbol name</th> 
                                     <th>Party Image</th>
                                      <th>President Name</th>
                                    <th>Date</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach($allCdt as $cat){
                                    if($cat->status=="1"){
                                ?>
                                <tr class="odd gradeX">
                                    <td><?php echo $cat->id; ?></td>
                                    <td><?php echo $cat->name; ?></td>
                                     <td><?php echo $cat->symbol_name; ?></td>
                                   <td> <?php
                                            if (file_exists("images/party/party-{$cat->id}.{$cat->picture}")) {
                                                echo "<img  src='" . base_url() . "images/party/party-{$cat->id}.{$cat->picture}" . "' width='200px' height='150px;'/>";
                                            } else {
                                                echo "<img  src='" . base_url() . "images/party/party.jpg" . "' width='60px'/>";
                                            }
                                            ?></td>
                                    <td><?php echo $cat->president; ?></td>
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
                                            <h4 class="modal-title" id="myModalLabel">party_list Delete</h4>
                                        </div>
                                         <form action=""> 
                                        <div class="modal-body">
                                            <h2>Are You Sure ?</h2>
                                            <a href="<?php echo base_url()."party_list/delete/{$cat->id}"?>"><button type="button" class="btn btn-info "><i class="fa fa-check"></i>Yes</button></a>
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
                                            <h4 class="modal-title" id="myModalLabel">party_list Edit</h4>
                                        </div>
                                        <form action="<?php echo base_url()?>party_list/update" method="post" enctype="multipart/form-data" > 
                                        <div class="modal-body">
                                           
                                           <div class="form-group">
                                               <input type="hidden" class="form-control" name="id" value="<?php echo $cat->id ?>" id="id" />
                                    <label>party_list Name</label>
                                    <h5 style="color:red;"><?php echo form_error("name"); ?></h5>
                                    <input class="form-control" name="name" value="<?php echo $cat->name ?>" id="name" />
                                     
                                </div>
                                             <div class="form-group">
                                    <label>Symbol name</label>
                                    <h5 style="color:red;"><?php echo form_error("name"); ?></h5>
                                    <input class="form-control" name="symbol_name" value="<?php echo $cat->symbol_name ?>" id="name" />
                                     
                                </div>
                                           <div class="form-group">
                                    <label>Party Image</label>
                                   
                                    <input type="file" class="form-control" name="pic"   />
                                     
                                </div>
                                             <div class="form-group">
                                    <label>President Name</label>
                                    <h5 style="color:red;"><?php echo form_error("president"); ?></h5>
                                    <input class="form-control" name="president" value="<?php echo $cat->president ?>" id="name" />
                                     
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