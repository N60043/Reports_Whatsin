<?php include_once('db/conn.php');
include_once('check_session.php');
     $query = "SELECT * FROM marketing_campaigns";
     $data = mysqli_query($conn, $query);
     $array=[];
     while ($row = mysqli_fetch_array($data)) {
         $array[] = $row;
     }

$where = array();
$msg = '';
$data='';
if (isset($_POST['submit'])) {
   
    $date_to = $_POST['date_to'];
    $date_from = $_POST['date_from'];
    $id = $_POST['id'];
   
// Query for When trial=0
 $sql1="SELECT COUNT(trial) AS Total_trials,COUNT(id) AS Total_users,creation_date FROM USERS WHERE date(creation_date)>='$date_to' AND date(creation_date)<='$date_from' AND source_id='$id' GROUP BY date(creation_date)";
 $sql2="SELECT COUNT(trial) AS Total_trials_01 FROM USERS WHERE trial=1 AND date(creation_date)>='$date_to' AND date(creation_date)<='$date_from' AND source_id='$id' GROUP BY date(creation_date)";
$sql3="SELECT COUNT(trial) AS Total_trials_0 FROM USERS WHERE trial=0 date(creation_date)>='$date_to' AND date(creation_date)<='$date_from' AND source_id='$id' GROUP BY date(creation_date)";
     
    $result1 = mysqli_query($conn, $sql1);
      if( mysqli_num_rows($result1)==0 ){
         $mag = '<tr><td colspan="4"><h3 style=color:red;font-siz:20px;text-align:center>No Results Found </h3></td></tr>';
    }

    else {
        $data1=[];
            $i=0;
    
        while ($row = mysqli_fetch_assoc($result1)) {
            $data1[$i]=$row;
            $i++;
        }
    }
    $result2 = mysqli_query($conn, $sql2);
      if( mysqli_num_rows($result2)==0 ){
         $mag = '<tr><td colspan="4"><h3 style=color:red;font-siz:20px;text-align:center>No Results Found </h3></td></tr>';
    }

    else {
        $data2=[];
            $i=0;
    
        while ($row = mysqli_fetch_assoc($result2)) {
            $data2[$i]=$row;
            $i++;
        }
    }
    $result3 = mysqli_query($conn, $sql3);
      if( mysqli_num_rows($result3)==0 ){
         $mag = '<tr><td colspan="4"><h3 style=color:red;font-siz:20px;text-align:center>No Results Found </h3></td></tr>';
    }

    else {
        $data3=[];
            $i=0;
    
        while ($row = mysqli_fetch_assoc($result3)) {
            $data3[$i]=$row;
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
                               
                                 <form class="col s12" method="post" action="campaign_count_report.php">
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
                                         <select name="id" class="form-control" id="sou">

                                              <option selected="true" disabled="disabled">--Select Option--</option>
                                               <?php foreach ($array as $market_campaign) { ?>
                                                <option  <?php if(isset($_POST['id']) && $_POST['id']==$market_campaign['source_id']) 
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
                                                <th>Count</th>
                                                <th>Total Trial</th>
                                                <th>Trial=0</th>
                                                <th>Trial=1</th>
                                               
                                            </tr>
                                            </thead>
                                            <tr>
                                                <?php echo $msg ; ?>
                                            </tr>
                                            <tbody>
                                                <?php
                                                if(!empty($data1))
                                                    {?>
                                                <?php
                                                $i = 1;
                                               
                                                foreach ($data1 as $val) { ?>
                                                    <tr>
                                                        <th><?php echo $i; ?></th>
                                                        <th><?php echo date("M j, Y", strtotime($val['creation_date']));?></th>
                                                        
                                                        <th><a href="campaign_report.php?creation_date=<?php echo  $val['creation_date'] ?>&source_id=<?php echo $val['source_id'] ?>"><?php echo $val['Total_users']; ?></a></th>
                                                         <th><?php echo $val['Total_trials']; ?></th>
                                                         <?php
                                                    $i++;
                                                } ?> 
                                                 <?php }?>

                                                 <?php
                                                if(!empty($data2))
                                                    {?>
                                                <?php
                                                $i = 1;
                                               
                                                foreach ($data2 as $val2) { ?>
                                                          <th><?php echo $val2['Total_trials_01']; ?></th>
                                                           <?php
                                                    $i++;
                                                } ?> 
                                                 <?php }?>

                                                 <?php
                                                if(!empty($data3))
                                                    {?>
                                                <?php
                                                $i = 1;
                                                  foreach ($data3 as $val3) { ?>
                                                           <th><?php echo $val3['Total_trials_0']; ?></th>
                                                            <?php
                                                    $i++;
                                                } ?> 
                                                 <?php }?>



                                                       
                                                    </tr>
                                                   
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
// Data Get through prepare statement

// $stmt = $conn->prepare($sql); 
// $stmt->execute();
// $result = $stmt->get_result();
// if($result)
// {
//     $i=0;
//     $data=[];
//     while ($row = $result->fetch_assoc()) 
//     {
//         $data[$i]=$row;
//         $i++;
//     }
//     foreach($data as $key=>$val)
//                {
//                 echo "<pre>";
//                 print_r($val);
//                 exit();
//                }
// }
// else
// {
//     echo ("No Record");
// }
// $query="SELECT COUNT(trial) AS Total_trials_01,creation_date FROM USERS WHERE trial=1 AND date(creation_date)='$creation_date' AND source_id='$source_id' GROUP BY date(creation_date)";
// $result = mysqli_query($conn, $query);
//       if( mysqli_num_rows($result)>0 ){
//         $data=[];
//             $i=0;
    
//         while ($row = mysqli_fetch_assoc($result)) {
//             $data[$i]=$row;
//             $i++;
//         }
//     }

//     else {
//          echo ("No Record");
//     }
  
     
   
// $stmt2 = $conn->prepare($query); 
// $stmt2->execute();
// $result2 = $stmt2->get_result();
// if($result2)
// {
//     $i=0;
//     $data2=[];
//     while ($row = $result2->fetch_assoc()) 
//     {
//         $data2[$i]=$row;
//         $i++;
//     }
//     foreach($data2 as $key=>$val2)
//                {
//                 echo "<pre>";
//                 print_r($val2);
//                 exit();
//                }
// }
    //     if ($stmt->affected_rows === 1) {
    //         $i=0;
    //         $data=[];
    //           while ($row = mysqli_fetch_assoc($result)) 
    //            {
                
    //                $data[$i]=$row;
    //                $i++;
    //            }
    //            foreach($data as $key=>$val)
    //            {
    //             echo "<pre>";
    //             print_r($val);
    //             exit();
    //            }
                

    //     }
    // else { // The user accessed the script directly

    //     // Kill the script.
    //     echo "That is not allowed!";
    //     exit();
    // }

// $sql .="SELECT COUNT(trial) AS Total_trials_01,creation_date FROM USERS WHERE trial=1 AND date(creation_date)='$creation_date' AND source_id='$source_id' GROUP BY date(creation_date);";

     
   // Execute multi query
    // if (mysqli_multi_query($conn, $sql)) 
    //    {
    //           do 
    //         {
    //                 // Store first result set
    //                 if ($result = mysqli_store_result($conn)) 
    //                 {
    //                     $i=0;
    //                     $data=[];
    //                       while ($row = mysqli_fetch_assoc($result)) 
    //                        {
                            
    //                            $data[$i]=$row;
    //                            $i++;
    //                        }
    //                        // foreach($data as $key=>$val)
    //                        // {
    //                        //  echo "<pre>";
    //                        //  print_r($val);
    //                        // }
    //                         mysqli_free_result($result);
    //                 }
                    
                  
    //              //Prepare next result set
    //         } while (mysqli_next_result($conn));
    //      }
