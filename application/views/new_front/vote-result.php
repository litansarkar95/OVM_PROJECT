<?php

$mynid = $this->session->userdata("mynid");

                    if ($mynid != NULL) {
                        //echo $mynid;

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
   
    <link rel="stylesheet" href="<?php echo base_url().'assets/chart/css/morris.css'?>">
  </head>
  <body>
      <?php
      $dt = $this->session->userdata("msg");
                    if ($dt != NULL) {
                        echo $dt;
                        $this->session->unset_userdata("msg");
                    }
      ?>
 
    <?php
    
    foreach($allRdt as $pdt){
        $pp= $pdt->votecount;
     $fname=$pdt->first_name;
     $lname=$pdt->last_name;
     $party_listname=$pdt->party_listname;
        $ss= max(array($pp));
     
     
    }
 
    ?>
    <h2>Win <?php echo $fname. " " .$lname." ".$party_listname; ?></h2>
    <div id="graph"></div>

    <script src="<?php echo base_url().'assets/chart/js/jquery.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/chart/js/raphael-min.js'?>"></script>
    <script src="<?php echo base_url().'assets/chart/js/morris.min.js'?>"></script>
  
    <script>
        Morris.Bar({
          element: 'graph',
          data: <?php echo $allChat;?>,
          xkey: 'party_listname',
          ykeys: [ 'votecount'],
          labels: ['votecount']
        });
</script>


  </body>
</html>

<?php
$this->session->unset_userdata("myid");
$this->session->unset_userdata("msg");
$this->session->unset_userdata("mynid");
                    }

?>
