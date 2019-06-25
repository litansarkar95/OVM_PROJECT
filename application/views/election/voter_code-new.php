

<div class="container">
    <div class="row">
                <div class="col-12 col-sm-4 col-md-4 pr-0 side-menu">
            <div class="card mt-2">
                <p class="card-header bg-dark text-white">
                   PARTY LIST
                </p>
                <div class="card-body">
                    <ul><?php
                    if(isset($allCdt)){
            foreach ($allCdt as $cat) {
                if ($cat->status == "1") {
                    ?>
                        <li><a href="#" target="_blank" rel="noopener"><?php echo $cat->name; ?></a></li>
                  <?php
                }
            }
            }
                   ?>
                    
                    </ul>
                </div>
            </div>

        </div>
        <div class="col-md-8">
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
            <form action="<?php echo base_url()?>election/verify" class="was-validated" method="post">
    <div class="form-group">
      
      <input type="hidden" class="form-control" id="nid" value="<?php echo $mynid;?>" placeholder="Enter nid" name="nid" required>
     
    </div>
   <div class="form-group">
      <label for="code">CODE</label>
      <input type="text" class="form-control" id="code" placeholder="Enter Code" name="code" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
        </div>
        
    </div>
</div>
