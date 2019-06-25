<?php
$mynid = $this->session->userdata("mynid");
$mycandidate_areaid = $this->session->userdata("mycandidate_areaid");

//echo $mycandidate_areaid;
if (isset($allPdt)) {
    foreach ($allPdt as $pdt) {
        if($mycandidate_areaid == $pdt->candidate_areaid){
        ?>
<?php  echo $ddd=$pdt->id;  ?>

        <?php
    }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Chart using codeigniter and morris.js</title>
    <link rel="stylesheet" href="<?php echo base_url().'assets/chart/css/morris.css'?>">
  </head>
  <body>
    <h2>Chart using Codeigniter and Morris.js</h2>

    <div id="graph"></div>

    <script src="<?php echo base_url().'assets/chart/js/jquery.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/chart/js/raphael-min.js'?>"></script>
    <script src="<?php echo base_url().'assets/chart/js/morris.min.js'?>"></script>
    
    <?php
    
    if($ddd){
    ?>
    <script>
        Morris.Bar({
          element: 'graph',
          data: <?php echo $allChat;?>,
          xkey: 'party_listname',
          ykeys: ['id', 'party_listid', 'votecount'],
          labels: ['id', 'party_listid', 'votecount']
        });
</script>

<?php 
    }
?>

  </body>
</html>
