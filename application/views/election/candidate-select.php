<?php
$mynid = $this->session->userdata("mynid");
//  echo $mynid;


?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <br> 

            <div class="card bg-secondary text-white">
                <div class="card-body"> <h2 style="text-align: center;">Voter For You</h2></div>
            </div><br/>
            <?php
            if(isset($allPdt)){
            foreach ($allPdt as $pdt) {
                $seat_no = $pdt->seat_no;
                ?>


                <?php
            }
            }
            ?>



            <div class="container">

                <div class="card">
                    <div class="card-body">
                        <form action="<?php echo base_url(); ?>vote_now" method="post">
                            
                        
                        <table class="table table-striped">
                            <tr>
                                <th>Name</th>
                                <th>Party Name</th>
                                <th>seat_no</th>
                                <th>Picture</th>
                             
                                <th>VOTE</th>
                            </tr>
                            <?php
                                        if(isset($allCdt)){
                            foreach ($allCdt as $pdt) {
                                if ($seat_no == $pdt->seat_no) {
                                    ?>
                                    <tr>
                                        <td><?php echo $pdt->first_name ; echo $pdt->last_name;?> </td>
                                        <td><?php echo $pdt->party_listname; ?> </td>
                                        <td><?php echo $pdt->seat_no; ?><input type="hidden" value="<?php echo $pdt->seat_no; ?>" name="seat_no" ></td>
										     <td><input type="hidden" value="<?php echo $pdt->party_listid; ?>" name="partyplistid" ></td>
										
                                       
                                        <td><?php
                                                if (file_exists("images/party/party-{$pdt->party_listid}.{$pdt->party_listpicture}")) {
                                                    echo "<img  src='" . base_url() . "images/party/party-{$pdt->party_listid}.{$pdt->party_listpicture}" . "' width='200px' height='150px;'/>";
                                                } else {
                                                    echo "<img  src='" . base_url() . "images/party/party.jpg" . "' width='60px'/>";
                                                }
                                                ?> </td>
                                        <td><input type="radio" name="party_listid" value="<?php echo $pdt->party_listid; ?>">Vote </td>
										
										
                                    </tr>
                                    <?php
                               }
                            }
                                        }
                            ?>
                                    <tr><td><input class="btn btn-primary " type="submit" value="Sumit" name="submit" ></td></tr>
                        </table>
</form>
                  


                    </div>
                </div>
                <br>

                <br>
            </div>

            <div class="card bg-dark text-white">
            </div>


        </div></div></div>