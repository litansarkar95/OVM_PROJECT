

<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="panel-body pb">
            
             <h2>
               <?php 
               $mynid = $this->session->userdata("mynid");
              
               $dt = $this->session->userdata("msg");
               
                    if ($dt != NULL) {
                        echo $dt;
                        $this->session->unset_userdata("msg");
                    }else{
                       echo "Check Your Mobile Code Send"; 
                    }
                    ?></h2>
            <form class="form-horizontal" action="<?php echo base_url()?>vote_system/verify" role="form" method="post">
                <div class="form-group">
                    
                     <input type="hidden" class="form-control" id="nid" value="<?php echo $mynid;?>" placeholder="Enter nid" name="nid" required>
     
                </div>
                <div class="form-group">
                    <label>Code :</label>
                    <input type="text" class="form-control" id="mobile " placeholder="Enter Code" name="code"  required>

                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-default pull-right hvr-rectangle-in">Submit Now</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

