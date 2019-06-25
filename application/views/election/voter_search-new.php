

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
               <?php   $dt = $this->session->userdata("msg");
                    if ($dt != NULL) {
                        echo $dt;
                        $this->session->unset_userdata("msg");
                    }else{
                       echo "Login Now"; 
                    }
                    ?></h2>
            <form action="<?php echo base_url()?>election/check" class="was-validated" method="post">
    <div class="form-group">
      <label for="nid">NID:</label>
      <input type="text" class="form-control" id="nid" placeholder="Enter nid" name="nid" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>
    <div class="form-group">
      <label for="pwd">Mobile Number:</label>
      <input type="number" class="form-control" id="pwd" placeholder="Enter Mobile Number" name="mobile" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>
    <div class="form-group form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember" required> I agree .
        <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">Check this checkbox to continue.</div>
      </label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
        </div>
        
    </div>
</div>
