
<!-- Start Slide -->
<section id="slide">
    <div class="s-bg slide">
        <div class="container">
            <h1>Politacal Party</h1>
            <h3>All<br>List</h3>
        </div>
    </div><!-- /.sbg -->
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="#">Home</a><i class="fa fa-angle-double-right" aria-hidden="true"></i></li>
                <li><a href="#">politacal party</a><i class="fa fa-angle-double-right" aria-hidden="true"></i></li>
              
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
            foreach ($allCdt as $cat) {
                if ($cat->status == "1") {
                    ?>
                        <div class="col-md-8">
                        
                            <div class="blog-c">
                               
                                <div class="b-txt">
     
                                    <div class="b-single">
                                          <div class="card-body"><h2 style="color:orangered;"><?php echo $cat->name; ?></h2>
                                <h3>Registration Number : <?php echo $cat->id; ?></h3>
                                <h3>Registration date : <?php echo $cat->date; ?></h3>
                                <h3>Symbol Name : <?php echo $cat->symbol_name; ?></h3>
                                <h3>President : <?php echo $cat->president; ?></h3>
                                <h3>Symbol :  <br>   <?php
                                                if (file_exists("images/party/party-{$cat->id}.{$cat->picture}")) {
                                                    echo "<img  src='" . base_url() . "images/party/party-{$cat->id}.{$cat->picture}" . "' width='200px' height='150px;'/>";
                                                } else {
                                                    echo "<img  src='" . base_url() . "images/party/party.jpg" . "' width='60px'/>";
                                                }
                                                ?></h3>
                                <hr>
                            </div> 
                                    </div>
                                   
                               
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            
            </div>
        </div><!-- /.container -->
    </div><!-- /.blogg -->
</section><!-- /#blog -->
<!-- Start blog -->
