<?php
$mynid = $this->session->userdata("mynid");
//  echo $mynid;

foreach ($allPdt as $pdt) {
    echo $pdt->id;
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <br> 

            <div class="card bg-secondary text-white">
                <div class="card-body"> <h2 style="text-align: center;">Voter Profile</h2></div>
            </div><br/>
            <?php
            foreach ($allPdt as $pdt) {
                ?>

                <div class="container">

                    <div class="card">
                        <div class="card-body"><h2 style="color:orangered;"><?php echo $pdt->first_name;
            echo $pdt->last_name ?></h2>
                            <h3>NID : <?php echo $pdt->nid; ?></h3>
                            <h3>Father_name : <?php echo $pdt->father_name; ?></h3>
                            <h3>candidate_area : <?php echo $pdt->seat_name ?></h3>
                            <h3>Address : <?php echo $pdt->address; ?></h3>
                            <h3>contact : <?php echo $pdt->contact; ?></h3>
                            <h3>Gender : <?php echo $pdt->gender; ?></h3>
                            <h3>dob : <?php echo $pdt->dob; ?></h3>
                            <h3>Religion : <?php echo $pdt->religion; ?></h3>
                            <h3>Picture :  <br>   <?php
            if (file_exists("images/voter/voter-{$pdt->id}.{$pdt->picture}")) {
                echo "<img  src='" . base_url() . "images/voter/voter-{$pdt->id}.{$pdt->picture}" . "' width='200px' height='150px;'/>";
            } else {
                echo "<img  src='" . base_url() . "images/voter/voter.jpg" . "' width='60px'/>";
            }
                ?></h3>
                        </div>
                    </div>
                    <br>

                    <br>
                </div>

 <div class="card bg-dark text-white">
                <div class="card-body"><a href="<?php echo base_url()."candidate_select/vote/{$pdt->nid}"?>"> <h2 style="text-align: center;">Vote Now</h2></a></div>
            </div>

                <?php
            }
            ?>
            
           
        </div></div></div>