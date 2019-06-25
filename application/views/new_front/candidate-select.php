
<?php
$mynid = $this->session->userdata("mynid");
if (isset($allPdt)) {
    foreach ($allPdt as $pdt) {
        $seat_no = $pdt->seat_no;
        ?>


        <?php
    }
}
?>

<!-- Start Slide -->
<section id="slide">

    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="#">Vote Now</a><i  aria-hidden="true"></i></li>

            </ol>
        </div>
    </div>
</section><!-- /#slide -->
<!-- End Slide -->
<!-- Start About -->
<section id="about">
    <div class="about">
        <div class="container">
            <div class="about-us">

                <div class="a-us">
                    <div class="row">
                        <form action="<?php echo base_url(); ?>vote_count/start" method="post">


                            <table class="table table-striped">
                                <tr class="breadcrumb">
                                    <th>Candidate No</th>
                                      <th>Name</th>
                                    <th>Party Name</th>
                                    <th>seat_no</th>
                                    <th>Picture</th>

                                    <th>VOTE</th>
                                </tr>
                                <?php
                                if (isset($allCdt)) {
                                    foreach ($allCdt as $pdt) {
                                        if ($seat_no == $pdt->seat_no) {
                                            ?>
                                            <tr>
                                                <td><?php echo $pdt->candidate_no; ?></td>
                                                <td><?php
                                                    echo $pdt->first_name; echo " ";
                                                    echo $pdt->last_name;
                                                    ?> </td>
                                                <td><?php echo $pdt->party_listname; ?> </td>
                                                
                                                <td><?php echo $pdt->seat_no; ?></td>
                                                <td>
                                                    <?php
                                                    if (file_exists("images/party/party-{$pdt->party_listid}.{$pdt->party_listpicture}")) {
                                                        echo "<img  src='" . base_url() . "images/party/party-{$pdt->party_listid}.{$pdt->party_listpicture}" . "' width='100px' height='100px;'/>";
                                                    } else {
                                                        echo "<img  src='" . base_url() . "images/party/party.jpg" . "' width='60px'/>";
                                                    }
                                                    ?> </td>
                                                <td><input type="radio" name="id" value="<?php echo $pdt->id; ?>">Vote </td>


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
            </div>

        </div>
    </div>
</section><!-- /#About -->
<!-- End About -->
<!-- Start story -->

<!-- End story -->