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
         <button class="btn btn-info" onclick="printContent('div1')">Print</button>
        <?php
         if(isset($allPdt)){
             $count=1;
        ?>
    <div class="panel-body">
                    <div class="table-responsive" id="div1">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                             <p class="hiddenprint_file woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received " style="background-color:orange;padding: 15px;text-align:center;color: white">Vote Result</p>
                            <thead>
                                <tr>
                                     <th>id</th>
                                    <th>nid</th>
                                    <th> Name</th>
                                     <th>Seat_name</th>
                                   
                                    <th>District Name</th>
                                  <th>Contact </th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                               
                                foreach($allPdt as $cat){
                                
                                ?>
                                <tr class="odd gradeX">
                                    <td><?php echo $count; ?></td>
                                    <td><?php echo $cat->nid; ?></td>
                                    <td><?php echo $cat->first_name; echo " " ;echo $cat->last_name; ?></td>
                                    <td><?php echo $cat->seat_name; ?></td>
                                    
                                    <td><?php echo $cat->districtname; ?></td>
                                     <td><?php echo $cat->contact; ?></td>
                                  
                          
                                   
                                    
                                </tr>
                                
                  
                       
                        
                        
                       
                                <?php
                                $count++;
                              
                            }
                                ?>
                              
                          
                            </tbody>
                        </table>
                    </div>

                </div>
       <?php
       }
       ?>

    </div>
    <!--/.ROW-->
    <!-- /. PAGE INNER  -->
</div>






