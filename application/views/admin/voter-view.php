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
		function printContent(el){
		var restorepage =document.body.innerHTML;
		var printcontent=document.getElementById(el).innerHTML;
		document.body.innerHTML=printcontent;
		window.print();
		document.body.innerHTML=restorepage;
		}
		</script>

<div id="page-inner">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-head-line">Voter View</h1>

        </div>
    </div>
    <!-- /. ROW  -->

    <!--/.ROW-->
    <div class="row">
        <div class="col-md-12">
            <!-- Advanced Tables -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <button class="btn btn-info" onclick="printContent('div1')">Print</button>
                </div>
                    <div class="woocommerce-order" id="div1">
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nid</th>
                                    <th>first_name</th>
                                    <th>last_name</th>
                                    <th>father_name</th>

                                    <th>contact</th>

                                    <th>Picture</th>
                                    <th>View</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($allPdt as $cat) {
                                    if ($cat->status == "1") {
                                        ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $cat->id; ?></td>
                                            <td><?php echo $cat->nid; ?></td>
                                            <td><?php echo $cat->first_name; ?></td>
                                            <td><?php echo $cat->last_name; ?></td>
                                            <td><?php echo $cat->father_name; ?></td>
                                            <td><?php echo $cat->contact; ?></td>
                                            <td> <?php
                                                if (file_exists("images/voter/voter-{$cat->id}.{$cat->picture}")) {
                                                    echo "<img  src='" . base_url() . "images/voter/voter-{$cat->id}.{$cat->picture}" . "' width='200px' height='150px;'/>";
                                                } else {
                                                    echo "<img  src='" . base_url() . "images/party/party.jpg" . "' width='60px'/>";
                                                }
                                                ?></td>
                                            <td class="center"><button class="btn btn-primary" data-toggle="modal" data-target="#myModal-<?php echo $cat->id; ?>"><i class="fa fa-edit "></i>View </button></td>

                                            <td class="center"><a href="<?php echo base_url()."voter/edit/{$cat->id}"; ?>"><button class="btn btn-primary"><i class="fa fa-edit "></i>Edit</button></a></td>
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
                                                        <a href="<?php echo base_url() . "party_list/delete/{$cat->id}" ?>"><button type="button" class="btn btn-info "><i class="fa fa-check"></i>Yes</button></a>
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
                                                    <h4 class="modal-title" id="myModalLabel">Voter Edit</h4>
                                                </div>
                                                <form action="<?php echo base_url() ?>voter/update" method="post" > 
                                                    <div class="modal-body">

                                                        <div class="form-group">
                                                            <label>NID</label>
                                                            <input class="form-control" type="" value="<?php echo $cat->nid ?>"  disabled="disabled"/>

                                                        </div>
                                                        <div class="form-group">
                                                            <label>first_name</label>
                                                            <input class="form-control" type="" value="<?php echo $cat->first_name ?>"  disabled="disabled"/>

                                                        </div>
                                                         <div class="form-group">
                                                            <label>last_name</label>
                                                            <input class="form-control" type="" value="<?php echo $cat->last_name ?>"  disabled="disabled"/>

                                                        </div>
                                                         <div class="form-group">
                                                            <label>father_name</label>
                                                            <input class="form-control" type="" value="<?php echo $cat->father_name ?>"  disabled="disabled"/>

                                                        </div>
                                                         <div class="form-group">
                                                            <label>contact</label>
                                                            <input class="form-control" type="" value="<?php echo $cat->contact ?>"  disabled="disabled"/>

                                                        </div>
                                                         <div class="form-group">
                                                            <label>address</label>
                                                            <input class="form-control" type="" value="<?php echo $cat->address ?>"  disabled="disabled"/>

                                                        </div>
                                                        <div class="form-group">
                                                            <label>candidate_area</label>
                                                            <input class="form-control" type="" value="<?php echo $cat->candidate_area ?>"  disabled="disabled"/>

                                                        </div>
                                                         <div class="form-group">
                                                            <label>seat_name</label>
                                                            <input class="form-control" type="" value="<?php echo $cat->seat_name ?>"  disabled="disabled"/>

                                                        </div>
                                                          <div class="form-group">
                                                            <label>districtname</label>
                                                            <input class="form-control" type="" value="<?php echo $cat->districtname ?>"  disabled="disabled"/>

                                                        </div>
                                                         <div class="form-group">
                                                            <label>education</label>
                                                            <input class="form-control" type="" value="<?php echo $cat->education ?>"  disabled="disabled"/>

                                                        </div>
                                                         <div class="form-group">
                                                            <label>gender</label>
                                                            <input class="form-control" type="" value="<?php echo $cat->gender ?>"  disabled="disabled"/>

                                                        </div>
                                                         <div class="form-group">
                                                            <label>dob</label>
                                                            <input class="form-control" type="" value="<?php echo $cat->dob ?>"  disabled="disabled"/>

                                                        </div>
                                                         <div class="form-group">
                                                            <label>email</label>
                                                            <input class="form-control" type="" value="<?php echo $cat->email ?>"  disabled="disabled"/>

                                                        </div>
                                                         <div class="form-group">
                                                            <label>nationality</label>
                                                            <input class="form-control" type="" value="<?php echo $cat->nationality ?>"  disabled="disabled"/>

                                                        </div>
                                                         <div class="form-group">
                                                            <label>religion</label>
                                                            <input class="form-control" type="" value="<?php echo $cat->religion ?>"  disabled="disabled"/>

                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <label>date</label>
                                                            <input class="form-control" type="" value="<?php echo $cat->date ?>"  disabled="disabled"/>

                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                     
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