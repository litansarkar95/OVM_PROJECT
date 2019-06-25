

<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="panel-body pb">
            <h2 class="title">Login Now</h2>
            <h3>
                <?php
                $dt = $this->session->userdata("msg");
                if ($dt != NULL) {
                    echo $dt;
                    $this->session->unset_userdata("msg");
                }
                ?>
            </h3>
            <form class="form-horizontal" action="<?php echo base_url() ?>login/insert" role="form" method="post">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" class="form-control" id="uname" placeholder="Enter NID" name="email" required>
                </div>
                <div class="form-group">
                    <label>Password :</label>
                    <input type="password" class="form-control" id="mobile " placeholder="Enter Password" name="password" required>

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

