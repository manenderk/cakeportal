<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .loader {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url(<?= $this->request->getAttribute('webroot') ?>img/wait.gif) 50% 50% no-repeat rgb(249, 249, 249);
        }
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>iProats:<?= $this->fetch('title') ?>
    </title>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('font-awesome-animation.min.css') ?>
    <?= $this->Html->css('sass-compiled.css') ?>
    <?= $this->Html->css('font-awesome.min.css') ?>
    <?= $this->Html->css('vendor/animate.css/animate.min.css') ?>
    <?= $this->Html->css('vendor/whirl/dist/whirl.css') ?>
    <?= $this->Html->css('vendor/weather-icons/css/weather-icons.min.css') ?>
    <?= $this->Html->css('app.css') ?>
    <?= $this->Html->css('theme-a.css') ?>
    <?= $this->Html->css('theme-b.css') ?>
    <?= $this->Html->css('theme-c.css') ?>
    <?= $this->Html->css('theme-d.css') ?>
    <?= $this->Html->css('theme-e.css') ?>
    <?= $this->Html->css('theme-f.css') ?>
    <?= $this->Html->css('theme-g.css') ?>
    <?= $this->Html->css('theme-h.css') ?>
    <?= $this->Html->css('bootstrap-datepicker.min') ?>
    <?= $this->Html->css('multi-select') ?>
    <?= $this->Html->script('jquery-1-10-2.min'); ?>
    <?= $this->Html->script('jquery.infinitescroll.min'); ?>
    <?= $this->Html->script('jquery_ui'); ?>
    <?= $this->Html->script('modernizr'); ?>
    <?= $this->Html->script('bootstrap'); ?>
    <?= $this->Html->script('jquery.storageapi'); ?>
    <?= $this->Html->script('jquery.easing'); ?>
    <?= $this->Html->script('animo'); ?>
    <?= $this->Html->script('jquery.slimscroll.min'); ?>
    <?= $this->Html->script('screenfull'); ?>
    <?= $this->Html->script('jquery.localize'); ?>
    <?= $this->Html->script('demo-rtl'); ?>
    <?= $this->Html->script('jquery.sparkline.min'); ?>
    <?= $this->Html->script('jquery.flot'); ?>
    <?= $this->Html->script('jquery.flot.tooltip.min'); ?>
    <?= $this->Html->script('jquery.flot.resize'); ?>
    <?= $this->Html->script('jquery.flot.pie'); ?>
    <?= $this->Html->script('jquery.flot.time'); ?>
    <?= $this->Html->script('jquery.flot.categories'); ?>
    <?= $this->Html->script('jquery.flot.spline.min'); ?>
    <?= $this->Html->script('jquery.classyloader.min'); ?>
    <?= $this->Html->script('moment-with-locales.min'); ?>
    <?= $this->Html->script('skycons'); ?>
    <?= $this->Html->script('bootstrap-datepicker.min'); ?>
    <?= $this->Html->script('jquery.multi-select'); ?>
    <?= $this->Html->script('custom.js'); ?>
    <?= $this->Html->script('app'); ?>
    <?= $this->Html->script('jquery.gmap.min'); ?>
    <script type="text/javascript">
        $(window).load(function() {
            $(".loader").fadeOut("slow");
        })
    </script>
</head>
<?php
$controller = $this->request->getParam('controller');
$action = $this->request->getParam('action');

if ($controller=='Profiles') {
    $search_class = 'navbar-form open';
} else {
    $search_class = 'navbar-form';
}

if (isset($_GET['keywords']) && $_GET['keywords']!='') {
    $keyword = $_GET['keywords'];
    $style = "background-color:#ADD8E6;";
} else {
    $keyword = '';
    $style = "background-color:#fff;";
}
?>

<body>
    <div class="loader"></div>
    <div class="wrapper">
        <!-- top navbar-->
        <header class="topnavbar-wrapper">
            <!-- START Top Navbar-->
            <nav role="navigation" class="navbar topnavbar">
                <!-- START navbar header-->
                <div class="navbar-header">
                    <a href="#/" class="navbar-brand">
                        <div class="brand-logo">
                            <?php echo $this->Html->image('logo.png', ['class'=>'img-responsive']); ?>
                        </div>
                        <div class="brand-logo-collapsed">
                            <?php echo $this->Html->image('favicon.png', ['class'=>'img-responsive']); ?>
                            <!--<img src="img/logo-single.png" alt="App Logo" class="img-responsive">-->
                        </div>
                    </a>
                </div>
                <!-- END navbar header-->
                <!-- START Nav wrapper-->
                <div class="nav-wrapper">
                    <!-- START Left navbar-->
                    <ul class="nav navbar-nav">
                        <li>
                            <!-- Button used to collapse the left sidebar. Only visible on tablet and desktops-->
                            <a href="#" data-toggle-state="aside-collapsed" class="hidden-xs">
                                <em class="fa fa-navicon"></em>
                            </a>
                            <!-- Button to show/hide the sidebar on mobile. Visible on mobile only.-->
                            <a href="#" data-toggle-state="aside-toggled" data-no-persist="true"
                                class="visible-xs sidebar-toggle">
                                <em class="fa fa-navicon"></em>
                            </a>
                        </li>
                        <!-- START User avatar toggle-->
                        <li>
                            <!-- Button used to collapse the left sidebar. Only visible on tablet and desktops-->
                            <a href="#user-block" data-toggle="collapse">
                                <em class="fa fa-user"></em>
                            </a>
                        </li>
                        <!-- END User avatar toggle-->
                    </ul>
                    <!-- END Left navbar-->
                    <!-- START Right Navbar-->

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="#" data-search-open="">
                                <em class="fa fa-search"></em>
                            </a>
                        </li>
                        <!-- Fullscreen (only desktops)-->
                        <li class="visible-lg">
                            <a href="#" data-toggle-fullscreen="">
                                <em class="fa fa-expand"></em>
                            </a>
                        </li>
                        <li class="dropdown">
                            <!-- Button used to collapse the left sidebar. Only visible on tablet and desktops-->
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <em class="fa fa-power-off"></em>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a
                                        href="<?php echo $this->Url->build(["controller" => "users", "action" => "myprofile", $this->request->getSession()->read('Auth.User.id')]) ?>">Profile</a>
                                </li>
                                <li><a
                                        href="<?php echo $this->Url->build(["controller" => "notifications", "action" => "index"]); ?>">My
                                        Notofications</a></li>
                                <li><a
                                        href="<?php echo $this->Url->build(["controller" => "todos", "action" => "index"]); ?>">To
                                        Do</a></li>
                                <li><a
                                        href="<?php echo $this->Url->build(["controller" => "users", "action" => "logout"]); ?>">Logout</a>
                                </li>
                            </ul>

                        </li>
                        <!-- START Alert menu-->
                        <li class="dropdown dropdown-list">
                            <?php if ($total>0) : ?>
                            <a href="#" data-toggle="dropdown">
                                <em class="fa fa-bell"></em>
                                <div class="label label-danger"><?=$total;?>
                                </div>
                                <?php echo $this->Html->image('New image.gif', ['alt' => 'New Feature', 'height'=>'25', 'widht'=>'25']);?>
                            </a>
                            <!-- START Dropdown menu-->
                            <ul class="dropdown-menu animated rollInInX">
                                <li>
                                    <!-- START list group-->
                                    <div class="list-group">
                                        <!-- list item-->
                                        <?php
                                            /* foreach ($notificationsArr as $data) {
                                                $hostname = $_SERVER['HTTP_HOST'];
                                                $internal_url = $this->Url->build('/', false);
                                                $path = $hostname.$internal_url.$data['link'];
                                                //Set color for notifications
                                                $type = $data['type_of_notification'];
                                                
                                                switch ($type) {
                                                    case "New Job Requirement":
                                                        $color = "#2f80e7";
                                                        break;
                                                    case "Job Requirement Manager Assigned":
                                                        $color = "#1e983b";
                                                        break;
                                                    case "Job Requirement Recruiter Assigned":
                                                        $color = "#e90bd6";
                                                        break;
                                                    case "Client Submission Notification to Manager":
                                                        $color = "#f3ca06";
                                                        break;
                                                    case "RTR Confirmation To Manager":
                                                        $color = "#243948";
                                                        break;
                                                    case "RTR Status to Manager-Recruiter":
                                                        $color = "#23b7e5";
                                                        break;
                                                    default:
                                                        $color = "#5d9cec";
                                            } */
                                        ?>
                                        <a href="http://<?=$hostname.$internal_url.$data['link']; ?>"
                                            class="list-group-item">
                                            <div class="media-box panel-body">
                                                <div class="pull-left">
                                                    <em class="fa fa-envelope fa-2x text-warning"></em>
                                                </div>
                                                <div class="media-box-body clearfix">
                                                    <p class="m0"><?=$data['notification_text']; ?>
                                                    </p>
                                                    <p class="m0 text-muted">
                                                        <small>(<?=$data['notification_date']; ?>)</small>
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                        
                                        <!-- last list item -->
                                        <?php if (is_numeric($more) && $more > 0) : ?>
                                        <a href="<?=$this->Url->build(["controller" => "Notifications","action" => "index"]);?>"
                                            class="list-group-item">
                                            <small><b>More notifications</b></small>
                                            <span class="label label-danger pull-right"><?=$more;?></span>
                                        </a>
                                        <?php endif; ?>
                                    </div>
                                    <!-- END list group-->
                                </li>
                            </ul>
                            <?php endif; ?>
                            <!-- END Dropdown menu-->
                        </li>
                        <!-- END Alert menu-->
                        <!-- START Contacts button-->
                        <li>
                            <a href="#" data-toggle-state="offsidebar-open" data-no-persist="true">
                                <em class="fa fa-rss"></em>
                            </a>
                        </li>
                        <!-- END Contacts menu-->
                    </ul>

                    <!-- END Right Navbar-->
                </div>
                <!-- END Nav wrapper-->
                <!-- START Search form-->
                <form method="get"
                    action="<?php echo $this->Url->build(["controller" => "Profiles","action" => "index"]);?>"
                    class="<?=$search_class;?>">
                    <div class="form-group has-feedback">
                        <input type="text" name='keywords' placeholder="Type and hit enter ..." class="form-control"
                            value="<?=$keyword;?>"
                            style="<?=$style;?>">
                        <div data-search-dismiss="" class="fa fa-times form-control-feedback"></div>
                    </div>
                </form>
                <!-- END Search form-->
            </nav>
            <!-- END Top Navbar-->
        </header>
        <!-- sidebar-->
        <aside class="aside">
            <!-- START Sidebar (left)-->
            <div class="aside-inner">
                <nav class="sidebar">
                    <!-- START sidebar nav-->
                    <ul class="nav navbar-nav">
                        
                        <!-- Iterates over all sidebar items-->                                                
                        <li class="animated rollIn">
                            <a href="<?=$this->Url->build(["controller" => "Dashboard","action" => "index"]);?>"
                                title="Dashboard">
                                <em class="fa fa-dashboard"></em>
                                <span data-localize="sidebar.nav.DASHBOARD">Dashboard</span>
                            </a>
                        </li>   
                        <?php $action_name = 'view_admin' ?>                <!--NEEDS TO BE CHANGED AS PER ROLE -->
                        <li class="animated rollIn">
                            <a href="<?=$this->Url->build(["controller" => "Dashboard","action" => $action_name]); ?>"
                                title="Dashboard">
                                <em class="fa fa-dashboard -passing animated"></em>
                                <span data-localize="sidebar.nav.DASHBOARD">Dashboard New</span>
                            </a>
                        </li>
                        <li class="animated rollIn">
                            <a href="<?=$this->Url->build(["controller" => "Dashboard","action" => 'report']); ?>"
                                title="Report">
                                <em class="fa fa-dashboard -passing animated"></em>
                                <span data-localize="sidebar.nav.DASHBOARD">Report</span>
                            </a>
                        </li>
                        <li class="animated rotateInDownRight">
                            <a href="<?=$this->Url->build(["controller" => "compose","action" => "compose_email"]);?>"
                                title="Compose Emails">
                                <em class="fa fa-envelope-o -ring animated "></em>
                                <span data-localize="sidebar.nav.element.BUTTON">Compose Email</span>
                            </a>
                        </li>
                        <li class="animated rollIn">
                            <a href="#profile" title="Profile" data-toggle="collapse">
                                <em class="fa fa-user  -tada animated "></em>
                                <span data-localize="sidebar.nav.Candidates">Profile</span>
                            </a>
                            <ul id="profile" class="nav sidebar-subnav collapse">
                                <li class="sidebar-subnav-header">Profile</li>
                                <li>
                                    <a href="<?=$this->Url->build(["controller" => "Users","action" => "myprofile",$this->request->getSession()->read('Auth.User.id')]);?>"
                                        title="My Profile">
                                        <em class="fa fa-user"></em>
                                        <span data-localize="sidebar.nav.Profile">My Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?=$this->Url->build(["controller" => "Users","action" => "edit",$this->request->getSession()->read('Auth.User.id')]);?>"
                                        title="Edit Profile">
                                        <em class="fa fa-user"></em>
                                        <span data-localize="sidebar.nav.Profile">Edit Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?=$this->Url->build(["controller" => "Users","action" => "contact"]);?>"
                                        title="Contact">
                                        <em class="fa fa-tree"></em>
                                        <span data-localize="sidebar.nav.Profile">Contact</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="animated rotateInDownRight">
                            <a href="#users" title="Users" data-toggle="collapse">
                                <em class="fa fa-smile-o -spin animated "></em>
                                <span data-localize="sidebar.nav.Candidates">Users</span>
                            </a>
                            <ul id="users" class="nav sidebar-subnav collapse">
                                <li class="sidebar-subnav-header">Users</li>
                                <li>
                                    <a href="<?=$this->Url->build(["controller" => "Users","action" => "index"]);?>"
                                        title="User List">
                                        <em class="fa fa-list "></em>
                                        <span data-localize="sidebar.nav.element.BUTTON">Users List</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?=$this->Url->build(["controller" => "Users","action" => "internal_users"]);?>"
                                        title="Internal User List">
                                        <em class="fa fa-list "></em>
                                        <span data-localize="sidebar.nav.element.BUTTON">Internal Users</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?=$this->Url->build(["controller" => "Users","action" => "external_users"]);?>"
                                        title="External User List">
                                        <em class="fa fa-list "></em>
                                        <span data-localize="sidebar.nav.element.BUTTON">External Users</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?=$this->Url->build(["controller" => "Users","action" => "add"]);?>"
                                        title="Add new User">
                                        <em class="fa fa-plus-circle"></em>
                                        <span data-localize="sidebar.nav.element.BUTTON">Add User</span>
                                    </a>
                                </li>

                            </ul>
                        </li> 
                        <li class="animated rollIn">
                            <a href="#jobs" title="Jobs" data-toggle="collapse">
                                <em class="fa fa-briefcase -flash animated "></em>
                                <span data-localize="sidebar.nav.Candidates">Job Requirements</span>
                            </a>
                            <ul id="jobs" class="nav sidebar-subnav collapse">
                                <li class="sidebar-subnav-header">Job Requirements</li>
                                <?php $requirement_url_action = 'index' ?>              <!-- NEEDS TO BE CHANGES AS PER ROLE -->
                                <li>
                                    <a href="<?=$this->Url->build(["controller" => "JobRequirements","action" => $requirement_url_action]); ?>"
                                        title="Job Requirement List">
                                        <em class="fa fa-list"></em>
                                        <span data-localize="sidebar.nav.element.BUTTON">Requirements List</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?=$this->Url->build(["controller" => "JobRequirements","action" => "add"]);?>"
                                        title="Add new job requirement">
                                        <em class="fa fa-plus-circle"></em>
                                        <span data-localize="sidebar.nav.element.BUTTON">Add Requirements</span>
                                    </a>
                                </li> 
                                <li>
                                    <a href="<?=$this->Url->build(["controller" => "JobRequirements","action" => "my_requirements"]);?>"
                                        title="My job requirement">
                                        <em class="fa fa-plane"></em>
                                        <span data-localize="sidebar.nav.element.BUTTON">My Requirements</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?=$this->Url->build(["controller" => "JobRequirements","action" => "today_requirements"]);?>"
                                        title="Today's job requirement">
                                        <em class="fa fa-plug"></em>
                                        <span data-localize="sidebar.nav.element.BUTTON">Today Requirements</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?=$this->Url->build(["controller" => "JobRequirements","action" => "hold_requirements"]);?>"
                                        title="On hold requirement">
                                        <em class="fa fa-quote-left"></em>
                                        <span data-localize="sidebar.nav.element.BUTTON">On-Hold Reqs</span>
                                    </a>
                                </li> 
                                <li>
                                    <a href="<?=$this->Url->build(["controller" => "JobRequirements","action" => "upload_requirements"]); ?>"
                                        title="On hold requirement">
                                        <em class="fa fa-quote-left"></em>
                                        <span data-localize="sidebar.nav.element.BUTTON">Upload Requirements</span>
                                    </a>
                                </li>


                            </ul>
                        </li>
                        <li class="animated rotateInDownRight">
                            <a href="#submissions" title="Jobs" data-toggle="collapse">
                                <em class="fa fa-briefcase animated "></em>
                                <span data-localize="sidebar.nav.submissions">Submissions</span>
                            </a>
                            <ul id="submissions" class="nav sidebar-subnav collapse">
                                <li class="sidebar-subnav-header">Submissions</li>
                                <li>
                                    <a href="<?=$this->Url->build(["controller" => "candidateSubmissionDetails","action" => "index"]);?>"
                                        title="Job Requirement List">
                                        <em class="fa fa-quote-left"></em>
                                        <span data-localize="sidebar.nav.element.BUTTON">All Submissions</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?=$this->Url->build(["controller" => "candidateSubmissionDetails","action" => "saved_submissions"]);?>"
                                        title="Job Requirement List">
                                        <em class="fa fa-quote-left"></em>
                                        <span data-localize="sidebar.nav.element.BUTTON">Saved Submissions</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?=$this->Url->build(["controller" => "candidateSubmissionDetails","action" => "cancelled_submissions"]);?>"
                                        title="Job Requirement List">
                                        <em class="fa fa-quote-left"></em>
                                        <span data-localize="sidebar.nav.element.BUTTON">Cancelled Submissions</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="animated rollIn">
                            <a href="<?=$this->Url->build(["controller" => "candidateSubmissionDetails","action" => "rtr_status"]);?>"
                                title="RTR">
                                <em class="fa fa-list -burst animated "></em>
                                <span data-localize="sidebar.nav.element.BUTTON">RTR</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?=$this->Url->build(["controller" => "Clients","action" => "our_clients"]);?>"
                                title="Clients">
                                <em class="fa fa-cloud "></em>
                                <span data-localize="sidebar.nav.Clients">Clients</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?=$this->Url->build(["controller" => "JobRequirements","action" => "add"]);?>"
                                title="Add Job Requirements">
                                <em class="fa fa-plus-circle"></em>
                                <span data-localize="sidebar.nav.Add Job Requirements">Add Requirements</span>
                            </a>
                        <li class="animated rotateInDownRight">
                            <a href="#candidate" title="Candidates" data-toggle="collapse">
                                <em class="fa fa-users -bounce animated "></em>
                                <span data-localize="sidebar.nav.Candidates">Candidates</span>
                            </a>
                            <ul id="candidate" class="nav sidebar-subnav collapse">
                                <li class="sidebar-subnav-header">Candidates</li>
                                <li>
                                    <a href="<?=$this->Url->build(["controller" => "candidates","action" => "index"]);?>"
                                        title="Candidate List">
                                        <em class="fa fa-list"></em>
                                        <span data-localize="sidebar.nav.element.BUTTON">Candidate List</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?=$this->Url->build(["controller" => "candidates","action" => "add"]);?>"
                                        title="Add new Candidate">
                                        <em class="fa fa-plus-circle"></em>
                                        <span data-localize="sidebar.nav.element.BUTTON">Add Candidate</span>
                                    </a>
                                </li>
                            </ul>
                        <li class="animated rollIn">
                            <a href="#client" title="Clients" data-toggle="collapse">
                                <em class="fa fa-magnet -wrench animated"></em>
                                <span data-localize="sidebar.nav.Clients">Clients</span>
                            </a>
                            <ul id="client" class="nav sidebar-subnav collapse">
                                <li class="sidebar-subnav-header">Clients</li>
                                <li>
                                    <a href="<?=$this->Url->build(["controller" => "Clients","action" => "index"]);?>"
                                        title="Client List">
                                        <em class="fa fa-list"></em>
                                        <span data-localize="sidebar.nav.element.BUTTON">Client List</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?=$this->Url->build(["controller" => "Clients","action" => "add"]);?>"
                                        title="Add new Client">
                                        <em class="fa fa-plus-circle"></em>
                                        <span data-localize="sidebar.nav.element.BUTTON">Add new client</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?=$this->Url->build(["controller" => "ClientContacts","action" => "index"]);?>"
                                        title="Client managers">
                                        <em class="fa fa-list"></em>
                                        <span data-localize="sidebar.nav.element.BUTTON">Client Managers</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?=$this->Url->build(["controller" => "ClientContacts","action" => "add"]);?>"
                                        title="Add new Client manager">
                                        <em class="fa fa-plus-circle"></em>
                                        <span data-localize="sidebar.nav.element.BUTTON">Add Client Manager</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?=$this->Url->build(["controller" => "Users","action" => "rtr"]);?>"
                                title="RTR Form">
                                <em class="fa fa-list"></em>
                                <span data-localize="sidebar.nav.element.BUTTON">RTR Form</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?=$this->Url->build(["controller" => "MassMailers","action" => "index"]);?>"
                                title="Mass Mailer">
                                <em class="fa fa-list"></em>
                                <span data-localize="sidebar.nav.element.BUTTON">Mass Mailer</span>
                            </a>
                        </li>
                        <li class="animated rotateInDownRight">
                            <a href="#elements" title="Master Data" data-toggle="collapse">
                                <em class="fa fa-sitemap"></em>
                                <span data-localize="sidebar.nav.Elements">Masters</span>
                            </a>
                            <ul id="elements" class="nav sidebar-subnav collapse">
                                <li class="sidebar-subnav-header">Masters</li>
                                <li>
                                    <a href="<?=$this->Url->build(["controller" => "businessDomains","action" => "index"]);?>"
                                        title="Business Domains">
                                        <em class="fa fa-list"></em>
                                        <span data-localize="sidebar.nav.element.BUTTON">Business Domains</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?=$this->Url->build(["controller" => "countries","action" => "index"]);?>"
                                        title="Countries">
                                        <em class="fa fa-list"></em>
                                        <span data-localize="sidebar.nav.element.BUTTON">Countries</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?=$this->Url->build(["controller" => "states","action" => "index"]);?>"
                                        title="States">
                                        <em class="fa fa-list"></em>
                                        <span data-localize="sidebar.nav.element.BUTTON">States</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?=$this->Url->build(["controller" => "Currencies","action" => "index"]);?>"
                                        title="Currencies">
                                        <em class="fa fa-list"></em>
                                        <span data-localize="sidebar.nav.element.BUTTON">Currencies</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?=$this->Url->build(["controller" => "Jobs","action" => "index"]);?>"
                                        title="Job Title List">
                                        <em class="fa fa-list"></em>
                                        <span data-localize="sidebar.nav.Job Title List">Job Title List</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?=$this->Url->build(["controller" => "jobTypes","action" => "index"]);?>"
                                        title="Job Type">
                                        <em class="fa fa-list"></em>
                                        <span data-localize="sidebar.nav.element.BUTTON">Job Type</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?=$this->Url->build(["controller" => "profileSources","action" => "index"]);?>"
                                        title="Profile Source">
                                        <em class="fa fa-list"></em>
                                        <span data-localize="sidebar.nav.element.BUTTON">Profile Source</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?=$this->Url->build(["controller" => "rateTypes","action" => "index"]);?>"
                                        title="Rate Type">
                                        <em class="fa fa-list"></em>
                                        <span data-localize="sidebar.nav.element.BUTTON">Rate Type</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?=$this->Url->build(["controller" => "Skills","action" => "index"]);?>"
                                        title="Skills">
                                        <em class="fa fa-list"></em>
                                        <span data-localize="sidebar.nav.element.BUTTON">Skills</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?=$this->Url->build(["controller" => "statusCodes","action" => "index"]);?>"
                                        title="Status Codes">
                                        <em class="fa fa-list"></em>
                                        <span data-localize="sidebar.nav.element.BUTTON">Status Code</span>
                                    </a>
                                </li>
                                <!-- TODO: REPLACE THIS MODULE WITH NEW ACL -->
                                <li>
                                    <a href="<?=$this->Url->build(["controller" => "userRoles","action" => "index"]);?>"
                                        title="User Roles">
                                        <em class="fa fa-list"></em>
                                        <span data-localize="sidebar.nav.element.BUTTON">User Roles</span>
                                    </a>
                                </li>
                                <!-- TODO: REPLACE THIS MODULE WITH GROUPS -->
                                <li>
                                    <a href="<?=$this->Url->build(["controller" => "userTypes","action" => "index"]);?>"
                                        title="Use Type">
                                        <em class="fa fa-list"></em>
                                        <span data-localize="sidebar.nav.element.BUTTON">User Types</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?=$this->Url->build(["controller" => "visas","action" => "index"]);?>"
                                        title="Visa">
                                        <em class="fa fa-list"></em>
                                        <span data-localize="sidebar.nav.element.BUTTON">Visa</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="rotateInDownRight">
                            <a href="#configuration" title="Configurations" data-toggle="collapse">
                                <em class="fa fa-wrench"></em>
                                <span data-localize="sidebar.nav.Elements">Configurations</span>
                            </a>
                            <ul id="configuration" class="nav sidebar-subnav collapse">
                                <li class="sidebar-subnav-header">Configurations</li>
                                <li>
                                    <a href="#" title="User Assignment for Activities Notifications">
                                        <em class="fa fa-list"></em>
                                        <span data-localize="sidebar.nav.element.BUTTON">User Assignment for Activities
                                            Notifications</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" title="Email Messages settings">
                                        <em class="fa fa-list"></em>
                                        <span data-localize="sidebar.nav.element.BUTTON">Email Messages settings</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="rotateInDownRight">
                            <a href="<?=$this->Url->build(["controller" => "Parser","action" => "index"]);?>"
                                title="Resume Parser">
                                <em class="fa fa-file-archive-o"></em>
                                <span data-localize="sidebar.nav.Elements">Resume Parser</span>
                            </a>
                            <ul id="parser" class="nav sidebar-subnav collapse">
                                <li class="sidebar-subnav-header">Parse Resume</li>
                            </ul>
                        </li>
                    </ul>
                    <!-- END sidebar nav-->
                </nav>
            </div>
            <!-- END Sidebar (left)-->
        </aside>
        <!-- offsidebar-->
        <aside class="offsidebar">
            <!-- START Off Sidebar (right)-->
            <nav>
                <div role="tabpanel">
                    <!-- Nav tabs-->
                    <ul role="tablist" class="nav nav-tabs nav-justified">
                        <li role="presentation" class="active">
                            <a href="#app-settings" aria-controls="app-settings" role="tab" data-toggle="tab">
                                <em class="fa fa-suitcase fa-lg"></em>
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="#app-chat" aria-controls="app-chat" role="tab" data-toggle="tab">
                                <em class="fa fa-users fa-lg"></em>
                            </a>
                        </li>
                    </ul>
                    <!-- Tab panes-->
                    <div class="tab-content">
                        <div id="app-settings" role="tabpanel" class="tab-pane fade in active">
                            <h3 class="text-center text-thin">Settings</h3>
                            <div class="p">
                                <h4 class="text-muted text-thin">Themes</h4>
                                <div class="table-grid mb">
                                    <div class="col mb">
                                        <div class="setting-color">
                                            <label data-load-css="css/theme-h.css">
                                                <input type="radio" name="setting-theme">
                                                <span class="icon-check"></span>
                                                <span class="split">
                                                    <span class="color bg-info-dark"></span>
                                                    <span class="color bg-info"></span>
                                                </span>
                                                <span class="color bg-white"></span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col mb">
                                        <div class="setting-color">
                                            <label data-load-css="css/theme-b.css">
                                                <input type="radio" name="setting-theme">
                                                <span class="icon-check"></span>
                                                <span class="split">
                                                    <span class="color bg-green"></span>
                                                    <span class="color bg-green-light"></span>
                                                </span>
                                                <span class="color bg-white"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col mb">
                                        <div class="setting-color">
                                            <label data-load-css="css/theme-c.css">
                                                <input type="radio" name="setting-theme">
                                                <span class="icon-check"></span>
                                                <span class="split">
                                                    <span class="color bg-purple"></span>
                                                    <span class="color bg-purple-light"></span>
                                                </span>
                                                <span class="color bg-white"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col mb">
                                        <div class="setting-color">
                                            <label data-load-css="css/theme-d.css">
                                                <input type="radio" name="setting-theme">
                                                <span class="icon-check"></span>
                                                <span class="split">
                                                    <span class="color bg-danger"></span>
                                                    <span class="color bg-danger-light"></span>
                                                </span>
                                                <span class="color bg-white"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-grid mb">
                                    <div class="col mb">
                                        <div class="setting-color">
                                            <label data-load-css="css/theme-e.css">
                                                <input type="radio" name="setting-theme">
                                                <span class="icon-check"></span>
                                                <span class="split">
                                                    <span class="color bg-info-dark"></span>
                                                    <span class="color bg-info"></span>
                                                </span>
                                                <span class="color bg-gray-dark"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col mb">
                                        <div class="setting-color">
                                            <label data-load-css="css/theme-f.css">
                                                <input type="radio" name="setting-theme">
                                                <span class="icon-check"></span>
                                                <span class="split">
                                                    <span class="color bg-green-dark"></span>
                                                    <span class="color bg-green"></span>
                                                </span>
                                                <span class="color bg-gray-dark"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col mb">
                                        <div class="setting-color">
                                            <label data-load-css="css/theme-g.css">
                                                <input type="radio" name="setting-theme">
                                                <span class="icon-check"></span>
                                                <span class="split">
                                                    <span class="color bg-purple-dark"></span>
                                                    <span class="color bg-purple"></span>
                                                </span>
                                                <span class="color bg-gray-dark"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col mb">
                                        <div class="setting-color">
                                            <label data-load-css="css/theme-a.css">
                                                <input type="radio" name="setting-theme" checked="checked">
                                                <span class="icon-check"></span>
                                                <span class="split">
                                                    <span class="color bg-danger"></span>
                                                    <span class="color bg-danger-light"></span>
                                                </span>
                                                <span class="color bg-gray-dark"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="p">
                                <h4 class="text-muted text-thin">Layout</h4>
                                <div class="clearfix">
                                    <p class="pull-left">Fixed</p>
                                    <div class="pull-right">
                                        <label class="switch">
                                            <input id="chk-fixed" type="checkbox" data-toggle-state="layout-fixed">
                                            <span></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="clearfix">
                                    <p class="pull-left">Boxed</p>
                                    <div class="pull-right">
                                        <label class="switch">
                                            <input id="chk-boxed" type="checkbox" data-toggle-state="layout-boxed">
                                            <span></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="clearfix">
                                    <p class="pull-left">RTL</p>
                                    <div class="pull-right">
                                        <label class="switch">
                                            <input id="chk-rtl" type="checkbox">
                                            <span></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="p">
                                <h4 class="text-muted text-thin">Aside</h4>
                                <div class="clearfix">
                                    <p class="pull-left">Collapsed</p>
                                    <div class="pull-right">
                                        <label class="switch">
                                            <input id="chk-collapsed" type="checkbox"
                                                data-toggle-state="aside-collapsed">
                                            <span></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="clearfix">
                                    <p class="pull-left">Float</p>
                                    <div class="pull-right">
                                        <label class="switch">
                                            <input id="chk-float" type="checkbox" data-toggle-state="aside-float">
                                            <span></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="clearfix">
                                    <p class="pull-left">Hover</p>
                                    <div class="pull-right">
                                        <label class="switch">
                                            <input id="chk-hover" type="checkbox" data-toggle-state="aside-hover">
                                            <span></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="app-chat" role="tabpanel" class="tab-pane fade">
                            <h3 class="text-center text-thin">Connections</h3>
                            <ul class="nav">
                                <!-- START list title-->
                                <li class="p">
                                    <small class="text-muted">ONLINE</small>
                                </li>
                                <!-- END list title-->
                                <li>
                                    <!-- START User status-->
                                    <a href="#" class="media-box p mt0">
                                        <span class="pull-right">
                                            <span class="circle circle-success circle-lg"></span>
                                        </span>
                                        <span class="pull-left">
                                            <!-- Contact avatar-->
                                            <!--<img src="img/user/05.jpg" alt="Image" class="media-box-object img-circle thumb48">-->
                                        </span>
                                        <!-- Contact info-->
                                        <span class="media-box-body">
                                            <span class="media-box-heading">
                                                <strong>Juan Sims</strong>
                                                <br>
                                                <small class="text-muted">Designeer</small>
                                            </span>
                                        </span>
                                    </a>
                                    <!-- END User status-->
                                    <!-- START User status-->
                                    <a href="#" class="media-box p mt0">
                                        <span class="pull-right">
                                            <span class="circle circle-success circle-lg"></span>
                                        </span>
                                        <span class="pull-left">
                                            <!-- Contact avatar-->
                                            <!--<img src="img/user/06.jpg" alt="Image" class="media-box-object img-circle thumb48">-->
                                        </span>
                                        <!-- Contact info-->
                                        <span class="media-box-body">
                                            <span class="media-box-heading">
                                                <strong>Maureen Jenkins</strong>
                                                <br>
                                                <small class="text-muted">Designeer</small>
                                            </span>
                                        </span>
                                    </a>
                                    <!-- END User status-->
                                    <!-- START User status-->
                                    <a href="#" class="media-box p mt0">
                                        <span class="pull-right">
                                            <span class="circle circle-danger circle-lg"></span>
                                        </span>
                                        <span class="pull-left">
                                            <!-- Contact avatar-->
                                            <!--<img src="img/user/07.jpg" alt="Image" class="media-box-object img-circle thumb48">-->
                                        </span>
                                        <!-- Contact info-->
                                        <span class="media-box-body">
                                            <span class="media-box-heading">
                                                <strong>Billie Dunn</strong>
                                                <br>
                                                <small class="text-muted">Designeer</small>
                                            </span>
                                        </span>
                                    </a>
                                    <!-- END User status-->
                                    <!-- START User status-->
                                    <a href="#" class="media-box p mt0">
                                        <span class="pull-right">
                                            <span class="circle circle-warning circle-lg"></span>
                                        </span>
                                        <span class="pull-left">
                                            <!-- Contact avatar-->
                                            <!--<img src="img/user/08.jpg" alt="Image" class="media-box-object img-circle thumb48">-->
                                        </span>
                                        <!-- Contact info-->
                                        <span class="media-box-body">
                                            <span class="media-box-heading">
                                                <strong>Tomothy Roberts</strong>
                                                <br>
                                                <small class="text-muted">Designer</small>
                                            </span>
                                        </span>
                                    </a>
                                    <!-- END User status-->
                                </li>
                                <!-- START list title-->
                                <li class="p">
                                    <small class="text-muted">OFFLINE</small>
                                </li>
                                <!-- END list title-->
                                <li>
                                    <!-- START User status-->
                                    <a href="#" class="media-box p mt0">
                                        <span class="pull-right">
                                            <span class="circle circle-lg"></span>
                                        </span>
                                        <span class="pull-left">
                                            <!-- Contact avatar-->
                                            <!--<img src="img/user/09.jpg" alt="Image" class="media-box-object img-circle thumb48">-->
                                        </span>
                                        <!-- Contact info-->
                                        <span class="media-box-body">
                                            <span class="media-box-heading">
                                                <strong>Lawrence Robinson</strong>
                                                <br>
                                                <small class="text-muted">Developer</small>
                                            </span>
                                        </span>
                                    </a>
                                    <!-- END User status-->
                                    <!-- START User status-->
                                    <a href="#" class="media-box p mt0">
                                        <span class="pull-right">
                                            <span class="circle circle-lg"></span>
                                        </span>
                                        <span class="pull-left">
                                            <!-- Contact avatar-->
                                            <!--<img src="img/user/10.jpg" alt="Image" class="media-box-object img-circle thumb48">-->
                                        </span>
                                        <!-- Contact info-->
                                        <span class="media-box-body">
                                            <span class="media-box-heading">
                                                <strong>Tyrone Owens</strong>
                                                <br>
                                                <small class="text-muted">Designer</small>
                                            </span>
                                        </span>
                                    </a>
                                    <!-- END User status-->
                                </li>
                                <li>
                                    <div class="p-lg text-center">
                                        <!-- Optional link to list more users-->
                                        <a href="#" title="See more contacts" class="btn btn-purple btn-sm">
                                            <strong>Load more..</strong>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                            <!-- Extra items-->
                            <div class="p">
                                <p>
                                    <small class="text-muted">Tasks completion</small>
                                </p>
                                <div class="progress progress-xs m0">
                                    <div role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"
                                        class="progress-bar progress-bar-success progress-80">
                                        <span class="sr-only">80% Complete</span>
                                    </div>
                                </div>
                            </div>
                            <div class="p">
                                <p>
                                    <small class="text-muted">Upload quota</small>
                                </p>
                                <div class="progress progress-xs m0">
                                    <div role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"
                                        class="progress-bar progress-bar-warning progress-40">
                                        <span class="sr-only">40% Complete</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- END Off Sidebar (right)-->
        </aside>
        <!-- Main section-->
        <section>
            <!-- Page content-->
            <div class="content-wrapper">
                <?php
                $message = $this->Flash->render();
                $pos = strpos($message, "message error");
                if ($pos === false) {
                    $class = "alert alert-success";
                } else {
                    $class = "alert alert-default";
                }
               ?>
                <?php if ($message!='') {?>
                <div class="<?=$class;?>" role="alert">
                    <?= $message; ?>
                </div>
                <?php } ?>
                <?= $this->fetch('content') ?>
            </div>
        </section>
        <!-- Page footer-->
        <footer>
            <span>&copy; 2016 - iProats</span>
        </footer>
    </div>
</body>

</html>
<script>
    function check_todo() {
        var dt = new Date();
        var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();

        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1; //January is 0!

        var yyyy = today.getFullYear();
        if (dd < 10) {
            dd = '0' + dd
        }
        if (mm < 10) {
            mm = '0' + mm
        }
        var today = yyyy + '-' + mm + '-' + dd + ' ' + time;

        <?php
        if (count($todoArr)>0) {
            foreach ($todoArr as $t) {?>
        var dbTime = '<?=$t['todo_date']?>';

        var d1 = Date.parse(today);
        var d2 = Date.parse(dbTime);

        //alert(d2-d1);
        if (d2 - d1 == 538000) {
            $('.modal-header').removeClass('alert alert-danger');
            $('.modal-header').addClass('alert alert-info');
            $("#myModal").modal('show');
            $('.modal-body').html(
                "<p><?=$t['todo_task']?></p><p>(Date & Time: <?=$t['todo_date']?>)</p><p style='color:white;'><a href='<?=$this->Url->build(['controller' => 'Todos', 'action' => 'index']);?>'>view todo</a></p>"
            );
        }
        if (d1 == d2) {
            $('.modal-header').removeClass('alert alert-info');
            $('.modal-header').addClass('alert alert-danger');
            $("#myModal").modal('show');
            $('.modal-body').html(
                "<p><?=$t['todo_task']?></p><p>(Date & Time: <?=$t['todo_date']?>)</p><p style='color:white;'><a href='<?=$this->Url->build(['controller' => 'Todos', 'action' => 'index']);?>'>view todo</a></p>"
            );
        }
        <?php }
        }?>
    }
    setInterval(function() {
        check_todo()
    }, 1000);
    $('ul.nav li.dropdown').hover(function() {
        $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
    }, function() {
        $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
    });
</script>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Todo expired</h4>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>