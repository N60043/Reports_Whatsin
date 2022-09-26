<?php include_once('db/conn.php');
include_once('check_session.php');

$sql = "SELECT * FROM revenue";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $data = [];
    // output data of each row
    $i = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $data[$i] = $row;
        $i++;
    }
    $row = mysqli_fetch_assoc($result);
}
$where = array();

if (isset($_POST['submit'])) {
    //$revenue_date = $_POST['revenue_date'];

    $revenue_date_to = $_POST['revenue_date_to'];
    $revenue_date_from = $_POST['revenue_date_from'];

    if (!empty($revenue_date_to && $revenue_date_from)) {
        $where[] = "revenue_date between '$revenue_date_to' and '$revenue_date_from' ";
    }

    if (!empty($where)) {
        $sql = "SELECT * FROM revenue where " . implode(' AND ', $where) . " order by revenue_date desc";
    } else {
        $sql = "SELECT * FROM revenue order by revenue_date desc";
    }
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $data = [];
        $i = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $data[$i] = $row;
            $i++;
        }
        $row = mysqli_fetch_assoc($result);
    }

}

mysqli_close($conn);

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php include_once('includes/head.php'); ?>
</head>

<body>
<div id="wrapper">
    <?php include_once('includes/nav.php'); ?>

    <div id="page-wrapper">
        <div class="header">
            <h1 class="page-header">
                Revenue Report
            </h1>
        </div>
        <div id="page-inner">

            <div class="dashboard-cards">
                <div class="row">
                    <div class="col-md-12">

                        <div class="card">
                            <div class="card-content">
                                <form class="col s12" method="post" action="revenue-report.php">
                                    <div class="row">
                                        <div class="input-field col s4">
                                            <input name="revenue_date_to"
                                                   value="<?php echo (!empty($revenue_date_to)) ? $revenue_date_to : ''; ?>"
                                                   type="date"
                                                   class="validate">
                                            <label for="msisdn" class="active" style="font-size: 18px;">TO</label>
                                        </div>
                                        <div class="input-field col s4">
                                            <input name="revenue_date_from"
                                                   value="<?php echo (!empty($revenue_date_from)) ? $revenue_date_from : ''; ?>"
                                                   type="date"
                                                   class="validate">
                                            <label for="msisdn" class="active" style="font-size: 18px;">From</label>
                                        </div>
                                        <div class="input-field col s4">
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
                                                <th>Total Users</th>
                                                <th>Amount</th>
                                            </tr>
                                            </thead>
                                            <?php if (!empty($data)) {
                                                ?>
                                                <tbody>
                                                <?php
                                                $i = 1;
                                                $total = 0;
                                                foreach ($data as $key => $val) { ?>
                                                    <tr>
                                                        <th><?php echo $i; ?></th>
                                                        <th><?php echo date("M j, Y", strtotime($val['revenue_date'])); ?></th>
                                                        <th><?php echo $val['total_users']; ?></th>
                                                        <th><?php echo number_format($val['revenue_amount'], 2); ?></th>
                                                    </tr>
                                                    <?php
                                                    $i++;
                                                    $total = $total + $val['revenue_amount'];
                                                } ?>
                                                </tbody>
                                            <?php } else { ?>
                                                <tr>
                                                    <th colspan="4">No record found</th>
                                                </tr>
                                            <?php } ?>
                                            <tfoot>
                                            <tr>
                                                <th colspan="3"> Total</th>
                                                <th><?php echo number_format($total, 2); ?></th>
                                            </tr>
                                            </tfoot>
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