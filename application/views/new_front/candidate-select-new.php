<?php
$mynid = $this->session->userdata("mynid");
//  echo $mynid;

foreach ($allPdt as $pdt) {
    echo $pdt->id;
}
?>

<!-- Start Slide -->
<section id="slide">
    <div class="s-bg slide">
        <div class="container">
            <h1>Personal Information</h1>
            <h3>Voter<br></h3>
        </div>
    </div><!-- /.sbg -->
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="#">Home</a><i class="fa fa-angle-double-right" aria-hidden="true"></i></li>
                <li><a href="#">Vote</a><i class="fa fa-angle-double-right" aria-hidden="true"></i></li>
                <li class="active">System</li>
            </ol>
        </div>
    </div>
</section><!-- /#slide -->
<!-- Start blog -->
<section id="blog">
    <div class="blogg">
        <div class="container">
            <div class="row">
                <?php
                if (isset($allPdt)) {
                    foreach ($allPdt as $pdt) {
                        ?>
                        <div class="col-md-8">
                            <div class="blogs">
                                <?php
                                if (file_exists("images/voter/voter-{$pdt->id}.{$pdt->picture}")) {
                                    echo "<img  src='" . base_url() . "images/voter/voter-{$pdt->id}.{$pdt->picture}" . "' width='200px' height='150px;'/>";
                                } else {
                                    echo "<img  src='" . base_url() . "images/voter/voter.jpg" . "' width='200px' height='150px;'/>";
                                }
                                ?>
                            </div>
                            <div class="blog-c">
                                <div class="calender"><?php echo $pdt->seat_no ?> <span>Seat</span></div>
                                <div class="b-txt">
                                    <h3><?php echo $pdt->first_name;
                        echo " ";
                        echo $pdt->last_name ?></h3>
                                    <p class="content"> <a href="#" class="admin">Father Name :</a> <span>:</span> <a href="#"><?php echo $pdt->father_name; ?></a> </p>

                                    <div class="b-single">
                                        <h4>NID : <?php echo $pdt->nid; ?></h4>
                                        <blockquote>contact : <?php echo $pdt->contact; ?>.</blockquote>
                                        <h4>candidate_area : <?php echo $pdt->seat_name; ?></h4>
                                        <h4>address : <?php echo $pdt->address; ?>.</h4>
                                        <h3>contact : <?php echo $pdt->contact; ?></h3>
                                        <h3>Gender : <?php echo $pdt->gender; ?></h3>
                                        <h3>dob : <?php echo $pdt->dob; ?></h3>
                                        <h3>Religion : <?php echo $pdt->religion; ?></h3>
                                        <button type="button"  id="submit" class=" submit"><a style="color: white;" href="<?php echo base_url()."candidate_select/vote/{$pdt->nid}"?>"> Vote Now</a></button>
                                       
                                    </div>
                                   
                                

                               
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
                <div class="col-md-4">
                    <div class="search">
                        <input type="text" placeholder="search"/>
                        <a href="#"><i class="fa fa-search" aria-hidden="true"></i></a>
                    </div>
                   
                    <div class="right-side">
                        <h3 class="border">Party List</h3>
                        <div class="rp">
                            <?php
            foreach ($allCdt as $cat) {
                if ($cat->status == "1") {
                    ?>
                            <div class="RP">
                                <div class="rp-img"><a href="#"><?php
                                                if (file_exists("images/party/party-{$cat->id}.{$cat->picture}")) {
                                                    echo "<img  src='" . base_url() . "images/party/party-{$cat->id}.{$cat->picture}" . "' width='80px' height='80px;'/>";
                                                } else {
                                                    echo "<img  src='" . base_url() . "images/party/party.jpg" . "' width='60px'/>";
                                                }
                                                ?></a></div>
                                <div class="rp-txt">
                                    <h4><a href="#"><?php echo $cat->name; ?></a></h4>
                                    <p><?php echo $cat->president; ?></p>
                                    <h5><?php echo $cat->date; ?></h5>
                                </div>
                            </div>
                          <?php
                          
                }
            }
                          ?>
                        </div>
                    </div>
                 
                </div>
            </div>
        </div><!-- /.container -->
    </div><!-- /.blogg -->
</section><!-- /#blog -->
<!-- Start blog -->
