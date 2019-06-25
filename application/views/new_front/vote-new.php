

<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="panel-body pb">
            <h2 class="title">Voter NID & Mobile Number Now</h2>
            <h3>
                <?php   $dt = $this->session->userdata("msg");
                    if ($dt != NULL) {
                        echo $dt;
                        $this->session->unset_userdata("msg");
                    }
                    ?>
            </h3>
            <form class="form-horizontal" action="<?php echo base_url()?>vote_system/code" role="form" method="post">
                <div class="form-group">
                    <label for="email">Nid:</label>
                    <input type="text" class="form-control" id="uname" placeholder="Enter NID" name="nid" required>
                </div>
                <div class="form-group">
                    <label>Mobile Number:</label>
                    <input type="text" class="form-control" id="mobile " placeholder="Enter mobile Number" name="mobile" required>

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

