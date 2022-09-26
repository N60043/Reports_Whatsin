<?php include_once('db/conn.php');
include_once('check_session.php');
 if(isset($_GET['source_id'])) {
         $creation_date=$_GET['creation_date'];
         $source_id=$_GET['source_id'];

 $sql="SELECT creation_date, count(trial) as Total_trial,
SUM(CASE WHEN trial =0 THEN 1 ELSE 0 END) AS trial_0,
SUM(CASE WHEN trial =1 THEN 1 ELSE 0 END) AS trial_1
FROM USERS  WHERE date(creation_date)>='$creation_date' AND source_id='$source_id' GROUP BY date(creation_date) LIMIT 1 "; 

$result = mysqli_query($conn, $sql);
      if( mysqli_num_rows($result)==0 ){
         $msg = '<tr><td colspan="4"><h3 style=color:red;font-siz:20px;text-align:center>No Results Found </h3></td></tr>';
    }

    else {
        $data=[];
            $i=0;
    
        while ($row = mysqli_fetch_assoc($result)) {
            $data[$i]=$row;
            $i++;
        }


    }

// Query for When trial=0
// $sql="SELECT COUNT(trial) AS trials_0,creation_date FROM USERS WHERE trial=0 AND date(creation_date)>='$creation_date' AND source_id='$source_id' GROUP BY date(creation_date) LIMIT 1;";
// $sql .="SELECT COUNT(trial) AS Total_trials_01,creation_date FROM USERS WHERE trial=1 AND date(creation_date)='$creation_date' AND source_id='$source_id' GROUP BY date(creation_date) LIMIT 1;";
//                         $data=[];
//   if (mysqli_multi_query($conn, $sql)) 
//        {
//               do 
//             {
//                     // Store first result set
//                     if ($result = mysqli_store_result($conn)) 
//                     {
//                         $i = 0;
//                          while($row = mysqli_fetch_assoc($result))
//                          {
//                             $data[$i] = $row;
//                             $i++;
//                          }
                               
//                            foreach($data as $key=>$val)
//                            {
//                             echo "<pre>";
//                             print_r($val);

//                            }
//                             mysqli_free_result($result);
                         
//                     }
                    
                  
//                  //Prepare next result set
//             } while (mysqli_next_result($conn));
//              exit();
//          }


      
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
                User Compaign Count Trials
            </h1>
        </div>
        <div id="page-inner">

            <div class="dashboard-cards">
                <div class="row">
                    <div class="col-md-12">

                        <div class="card">
                            <div class="card-content">
                               

                              
                                <div class="clearBoth"></div>

                                <div class="row">
                                    <div class="col-md-12">
                                         
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Date</th>
                                                <th>Trial=0</th>
                                                <th>Total=1</th>
                                                
                                               
                                            </tr>
                                            </thead>
                                           
                                            <tbody>
                                                <?php
                                                if(!empty($data))
                                                    {?>
                                                <?php
                                                $i = 1;
                                               
                                                foreach($data as $key => $val){ ?>
                                                    
                                                    <tr>
                                                        <th><?php echo $i; ?></th>
                                                        <th><?php echo date("M j, Y", strtotime($val['creation_date']));?></th>
                                                        
                                                          <th><?php echo $val['trial_0']; ?></th>
                                                           <th><?php echo $val['trial_1']; ?></th>



                                                       
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