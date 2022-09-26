<?php include_once('db/conn.php');
include_once('check_session.php');
     $query = "SELECT * FROM marketing_campaigns";
     $data = mysqli_query($conn, $query);
     $array=[];
     while ($row = mysqli_fetch_array($data)) {
         $array[] = $row;
     }

$where = array();
$mag = '';
$data='';
if (isset($_POST['submit'])) {
     // code...
    $date_to = $_POST['date_to'];
    $date_from = $_POST['date_from'];
    $slug = $_POST['slugs'];
     $sql="SELECT id,phone,creation_date,trial FROM USERS WHERE DATE(creation_date) >= '$date_to' AND DATE(creation_date) <= '$date_from' AND source_id = '$slug'";
       
    $result = mysqli_query($conn, $sql);
      if( mysqli_num_rows($result)==0 ){
         $mag = '<tr><td colspan="4"><h3 style=color:red;font-siz:20px;text-align:center>No Results Found </h3></td></tr>';
    }

    else {
        $data=[];
            $i=0;
    
        while ($row = mysqli_fetch_assoc($result)) {
            $data[$i]=$row;
            $i++;
        }
    }
  
     
   }
   else
   {
    if(isset($_GET['source_id'])) {
         $creation_date=$_GET['creation_date'];
         $source_id=$_GET['source_id'];
         $sql="SELECT creation_date,phone,trial From USERS where creation_date='$creation_date' AND source_id='$source_id'";
     $result = mysqli_query($conn,$sql);
    $data=[];
      $i=0;
     while ($row = mysqli_fetch_array($result)) {
          $data[$i]=$row;
            $i++;    
        }

    }
    }
?>
<!--  -->
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php include_once('includes/head.php'); ?>
    <script src="jquery-3.6.0.min.js"></script>
</head>

<body>
<div id="wrapper">
    <?php include_once('includes/nav.php'); ?>

    <div id="page-wrapper">
        <div class="header">
            <h1 class="page-header">
                User Compaign Report
            </h1>
        </div>
        <div id="page-inner">

            <div class="dashboard-cards">
                <div class="row">
                    <div class="col-md-12">

                        <div class="card">
                            <div class="card-content">
                               
                                 <form class="col s12" method="post" action="campaign_report.php">
                                    <div class="row">
                                        <div class="input-field col s4">
                                            <input name="date_to"
                                                   value="<?php echo (!empty($date_to)) ? $date_to : ''; ?>"
                                                   type="date"
                                                   class="validate">
                                            <label for="msisdn" class="active" style="font-size: 18px;">TO</label>
                                        </div>
                                        <div class="input-field col s4">
                                            <input name="date_from"
                                                   value="<?php echo (!empty($date_from)) ? $date_from : ''; ?>"
                                                   type="date"
                                                   class="validate">
                                            <label for="msisdn" class="active" style="font-size: 18px;">From</label>
                                        </div>
                                        <div class="input-field col s2" style="padding: 5px;" >
                                         <select name="slugs" class="form-control" id="sou">

                                              <option selected="true" disabled="disabled">--Select Option--</option>
                                               <?php foreach ($array as $market_campaign) { ?>
                                                <option  <?php if(isset($_POST['slugs']) && $_POST['slugs']==$market_campaign['source_id']) 
                                                    echo "selected='seselected'";?>> <?php echo $market_campaign['source_id']?></option>
                                                                                    <?php } ?>
                                        </select>
                                        <label for="msisdn" class="active" style="font-size: 18px;">Campaign</label>
                                    </div>
                                        <div class="input-field col s1 " style="padding: 3px;">
                                            <input type="submit" name="submit" value="Submit" class="btn btn-danger"/>
                                        </div>
                                    </div>
                                </form>
                                <div class="clearBoth"></div>

                                <div class="row">
                                    <div class="col-md-12">
                                         
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Date</th>
                                                <th>Phone</th>
                                                <th>Trial</th>
                                            </tr>
                                            </thead>
                                            <tr>
                                                <?php echo $mag ; ?>
                                            </tr>
                                            <tbody>
                                                <?php
                                                if(!empty($data))
                                                    {?>
                                                <?php
                                                $i = 1;
                                                $total = 0;
                                                foreach ($data as $key => $val) { ?>
                                                    <tr>
                                                        <th><?php echo $i; ?></th>
                                                        <th><?php echo date("M j, Y", strtotime($val['creation_date']));?></th>
                                                        <th><?php echo $val['phone']; ?></th>
                                                        <th><?php echo number_format($val['trial'], 2); ?></th>
                                                    </tr>
                                                    <?php
                                                    $i++;
                                                } ?>
                                                 <?php }?>
                                                </tbody>
                                           
                                                
                                                </tbody>
                                           
                                           
                                        </table>
                                        
                                    </div>
                                </div>

                            </div>


                        </div>

                    </div>
                </div>

            </div>
            <!-- /. ROW  -->

            <?php include_once('includes/footer.php'); ?>


        </div>
        <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
</div>
<!-- /. WRAPPER  -->

<?php include_once('includes/scripts.php'); ?>


</body>
</html>