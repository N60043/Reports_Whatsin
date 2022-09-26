<nav class="navbar navbar-default top-navbar" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle waves-effect waves-dark" data-toggle="collapse"
                data-target=".sidebar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand waves-effect waves-dark" href="index.php">
            <img src="assets/img/whatsin-logo.png" style="width:15%;margin-top: -5px;" class="img-responsive">
        </a>

        <div id="sideNav" href=""><i class="fa fa-list fa-sm" style="color:#232846"></i></div>
    </div>

    <ul class="nav navbar-top-links navbar-right">
        <!--        <li><a class="dropdown-button waves-effect waves-dark" href="#!" data-activates="dropdown4"><i-->
        <!--                        class="fa fa-envelope fa-fw"></i> <i class="material-icons right">arrow_drop_down</i></a></li>-->
        <!--        <li><a class="dropdown-button waves-effect waves-dark" href="#!" data-activates="dropdown3"><i-->
        <!--                        class="fa fa-tasks fa-fw"></i> <i class="material-icons right">arrow_drop_down</i></a></li>-->
        <!--        <li><a class="dropdown-button waves-effect waves-dark" href="#!" data-activates="dropdown2"><i-->
        <!--                        class="fa fa-bell fa-fw"></i> <i class="material-icons right">arrow_drop_down</i></a></li>-->
        <li><a class="dropdown-button waves-effect waves-dark" href="javascript:void(0)" data-activates="dropdown1">
                <i class="fa fa-user fa-fw"></i> <b><?php echo $_SESSION['username']; ?></b>
            </a></li>
    </ul>
</nav>

<!-- Dropdown Structure -->
<ul id="dropdown1" class="dropdown-content">
    <!--    <li><a href="#"><i class="fa fa-user fa-fw"></i> My Profile</a>-->
    <!--    </li>-->
    <!--    <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>-->
    <!--    </li>-->
    <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
    </li>
</ul>
<!--<ul id="dropdown2" class="dropdown-content w250">-->
<!--    <li>-->
<!--        <div>-->
<!--            <i class="fa fa-comment fa-fw"></i> New Comment-->
<!--            <span class="pull-right text-muted small">4 min</span>-->
<!--        </div>-->
<!--        </a>-->
<!--    </li>-->
<!--    <li class="divider"></li>-->
<!--    <li>-->
<!--        <div>-->
<!--            <i class="fa fa-twitter fa-fw"></i> 3 New Followers-->
<!--            <span class="pull-right text-muted small">12 min</span>-->
<!--        </div>-->
<!--        </a>-->
<!--    </li>-->
<!--    <li class="divider"></li>-->
<!--    <li>-->
<!--        <div>-->
<!--            <i class="fa fa-envelope fa-fw"></i> Message Sent-->
<!--            <span class="pull-right text-muted small">4 min</span>-->
<!--        </div>-->
<!--        </a>-->
<!--    </li>-->
<!--    <li class="divider"></li>-->
<!--    <li>-->
<!--        <div>-->
<!--            <i class="fa fa-tasks fa-fw"></i> New Task-->
<!--            <span class="pull-right text-muted small">4 min</span>-->
<!--        </div>-->
<!--        </a>-->
<!--    </li>-->
<!--    <li class="divider"></li>-->
<!--    <li>-->
<!--        <div>-->
<!--            <i class="fa fa-upload fa-fw"></i> Server Rebooted-->
<!--            <span class="pull-right text-muted small">4 min</span>-->
<!--        </div>-->
<!--        </a>-->
<!--    </li>-->
<!--    <li class="divider"></li>-->
<!--    <li>-->
<!--        <a class="text-center" href="#">-->
<!--            <strong>See All Alerts</strong>-->
<!--            <i class="fa fa-angle-right"></i>-->
<!--        </a>-->
<!--    </li>-->
<!--</ul>-->
<!--<ul id="dropdown3" class="dropdown-content dropdown-tasks w250">-->
<!--    <li>-->
<!--        <a href="#">-->
<!--            <div>-->
<!--                <p>-->
<!--                    <strong>Task 1</strong>-->
<!--                    <span class="pull-right text-muted">60% Complete</span>-->
<!--                </p>-->
<!--                <div class="progress progress-striped active">-->
<!--                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60"-->
<!--                         aria-valuemin="0" aria-valuemax="100" style="width: 60%">-->
<!--                        <span class="sr-only">60% Complete (success)</span>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </a>-->
<!--    </li>-->
<!--    <li class="divider"></li>-->
<!--    <li>-->
<!--        <a href="#">-->
<!--            <div>-->
<!--                <p>-->
<!--                    <strong>Task 2</strong>-->
<!--                    <span class="pull-right text-muted">28% Complete</span>-->
<!--                </p>-->
<!--                <div class="progress progress-striped active">-->
<!--                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="28"-->
<!--                         aria-valuemin="0" aria-valuemax="100" style="width: 28%">-->
<!--                        <span class="sr-only">28% Complete</span>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </a>-->
<!--    </li>-->
<!--    <li class="divider"></li>-->
<!--    <li>-->
<!--        <a href="#">-->
<!--            <div>-->
<!--                <p>-->
<!--                    <strong>Task 3</strong>-->
<!--                    <span class="pull-right text-muted">60% Complete</span>-->
<!--                </p>-->
<!--                <div class="progress progress-striped active">-->
<!--                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60"-->
<!--                         aria-valuemin="0" aria-valuemax="100" style="width: 60%">-->
<!--                        <span class="sr-only">60% Complete (warning)</span>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </a>-->
<!--    </li>-->
<!--    <li class="divider"></li>-->
<!--    <li>-->
<!--        <a href="#">-->
<!--            <div>-->
<!--                <p>-->
<!--                    <strong>Task 4</strong>-->
<!--                    <span class="pull-right text-muted">85% Complete</span>-->
<!--                </p>-->
<!--                <div class="progress progress-striped active">-->
<!--                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="85"-->
<!--                         aria-valuemin="0" aria-valuemax="100" style="width: 85%">-->
<!--                        <span class="sr-only">85% Complete (danger)</span>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </a>-->
<!--    </li>-->
<!--    <li class="divider"></li>-->
<!--    <li>-->
<!--</ul>-->
<!--<ul id="dropdown4" class="dropdown-content dropdown-tasks w250 taskList">-->
<!--    <li>-->
<!--        <div>-->
<!--            <strong>John Doe</strong>-->
<!--            <span class="pull-right text-muted">-->
<!--                                        <em>Today</em>-->
<!--                                    </span>-->
<!--        </div>-->
<!--        <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...</p>-->
<!--        </a>-->
<!--    </li>-->
<!--    <li class="divider"></li>-->
<!--    <li>-->
<!--        <div>-->
<!--            <strong>John Smith</strong>-->
<!--            <span class="pull-right text-muted">-->
<!--                                        <em>Yesterday</em>-->
<!--                                    </span>-->
<!--        </div>-->
<!--        <p>Lorem Ipsum has been the industry's standard dummy text ever since an kwilnw...</p>-->
<!--        </a>-->
<!--    </li>-->
<!--    <li class="divider"></li>-->
<!--    <li>-->
<!--        <a href="#">-->
<!--            <div>-->
<!--                <strong>John Smith</strong>-->
<!--                <span class="pull-right text-muted">-->
<!--                                        <em>Yesterday</em>-->
<!--                                    </span>-->
<!--            </div>-->
<!--            <p>Lorem Ipsum has been the industry's standard dummy text ever since the...</p>-->
<!--        </a>-->
<!--    </li>-->
<!--    <li class="divider"></li>-->
<!--    <li>-->
<!--        <a class="text-center" href="#">-->
<!--            <strong>Read All Messages</strong>-->
<!--            <i class="fa fa-angle-right"></i>-->
<!--        </a>-->
<!--    </li>-->
<!--</ul>-->
<!--/. NAV TOP  -->
<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">

            <?php if ($_SESSION['type'] == 1) { ?>
               
                 <li>
                    <a href="campaign_report.php"
                       class="<?php if (basename($_SERVER['PHP_SELF']) == 'campaign_report.php') {
                           echo 'active-menu';
                       } ?> waves-effect waves-dark"><i class="fa fa-money"></i> User Campaign Report
                        </a>
                </li>
                  <li>
                    <a href="campaign_count_report.php"
                       class="<?php if (basename($_SERVER['PHP_SELF']) == 'campaign_count_report.php') {
                           echo 'active-menu';
                       } ?> waves-effect waves-dark"><i class="fa fa-money"></i> Campaign Count Report
                        </a>
                </li>



            <?php } else { ?>
                <li>
                    <a class="<?php if (basename($_SERVER['PHP_SELF']) == 'index.php') {
                        echo 'active-menu';
                    } ?> waves-effect waves-dark" href="index.php"><i class="fa fa-dashboard"></i>
                        Dashboard</a>
                </li>
                <li>
                    <a href="subscriber-report.php"
                       class="<?php if (basename($_SERVER['PHP_SELF']) == 'subscriber-report.php') {
                           echo 'active-menu';
                       } ?> waves-effect waves-dark"><i class="fa fa-desktop"></i>Subscriber
                        Report</a>
                </li>
                <li>
                    <a href="subscription.php" class="<?php if (basename($_SERVER['PHP_SELF']) == 'subscription.php') {
                        echo 'active-menu';
                    } ?> waves-effect waves-dark"><i class="fa fa-bar-chart-o"></i>Provisioning
                        Options</a>
                </li>
                <li>
                    <a href="bulk-unsubscribe.php"
                       class="<?php if (basename($_SERVER['PHP_SELF']) == 'bulk-unsubscribe.php') {
                           echo 'active-menu';
                       } ?> waves-effect waves-dark"><i class="fa fa-users"></i> Bulk
                        Unsubscribe</a>
                </li>
                <li>
                    <a href="unsub-report.php" class="<?php if (basename($_SERVER['PHP_SELF']) == 'unsub-report.php') {
                        echo 'active-menu';
                    } ?> waves-effect waves-dark"><i class="fa fa-list"></i> Unsubscribers
                        Report</a>
                </li>
            <?php } ?>

        </ul>

    </div>

</nav>
<!-- /. NAV SIDE  -->