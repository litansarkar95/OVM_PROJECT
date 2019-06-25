
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">DASHBOARD</h1>
                     

                    </div>
                </div>
                <!-- /. ROW  -->
                <div class="row">
                    <div class="col-md-4">
                        <div class="main-box mb-red">
                            <a href="#">
                                <i class="fa fa-users fa-5x"></i>
								<?php
								if(isset($allData[1])){
								foreach ($allData[1] as $pdt){
									
									$voter= $pdt->total;
								echo "<h5>$voter Voter</h5>";
                                
								}
								}
								?>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="main-box mb-dull">
                            <a href="#">
                                <i class="fa fa-plug fa-5x"></i>
                               <?php
								if(isset($allData[2])){
								foreach ($allData[2] as $pdt){
									
									$candidate= $pdt->total;
								echo "<h5>$candidate Candidate</h5>";
                                
								}
								}
								?>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="main-box mb-pink">
                            <a href="#">
                                <i class="fa fa-dollar fa-5x"></i>
                                <?php
								if(isset($allData[3])){
								foreach ($allData[3] as $pdt){
									
									$candidate= $pdt->total;
								echo "<h5>$candidate Party</h5>";
                                
								}
								}
								?>
                            </a>
                        </div>
                    </div>

                </div>
                <!-- /. ROW  -->

            
                <!--/.ROW-->

            </div>
            <!-- /. PAGE INNER  -->
        