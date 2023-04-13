<?php
require "../core/require/page.php";
include_once "../core/require/sql.php";

$query = "SELECT * FROM tickets WHERE status='open'";
$result = mysqli_query($cpconn, $query);
?>
<!-- Header -->
<input id="node" name="node" type="hidden" value="">



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <title><?= $getsettingsdb["name"] ?></title>
    <?php include '../core/imports/header.php'; ?>
</head>

<body data-background-color="dark">
    <div class="wrapper">
        <div class="main-header">
            <div class="logo-header" data-background-color="dark2">
                <a href="/" class="logo">
                    <p style="color:white;" class="navbar-brand"><?= $getsettingsdb["name"]?></p>
                </a>
                <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse"
                    data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <i class="icon-menu"></i>
                    </span>
                </button>
                <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
                <div class="nav-toggle">
                    <button class="btn btn-toggle toggle-sidebar">
                        <i class="icon-menu"></i>
                    </button>
                </div>
            </div>
            <nav class="navbar navbar-header navbar-expand-lg" data-background-color="dark">

                <div class="container-fluid">
                    <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                        <li class="nav-item dropdown hidden-caret">
                            <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"
                                aria-expanded="false">
                                <div class="avatar-sm">
                                    <img src="<?= $userdb['avatar']?>" alt="..." class="avatar-img rounded-circle">
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-user animated fadeIn">
                                <div class="dropdown-user-scroll scrollbar-outer">
                                    <li>
                                        <div class="user-box">
                                            <div class="avatar-lg"><img src="<?= $userdb['avatar']?>"
                                                    alt="image profile" class="avatar-img rounded"></div>
                                            <div class="u-text">
                                                <h4><?= $userdb['username']?></h4>
                                                <p class="text-muted"><?= $userdb['role']?></p>
                                                <p class="text-muted">Coins: <?= $userdb['coins']?></p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <?php 
                                        if(!$userdb['discord_id'] == null || !$userdb['discord_username'] == null || !$userdb['discord_discriminator'] == null || !$userdb['discord_email'] == null)
                                        {
                                            ?>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="/auth/discord">Relink discord</a>
                                            <?php
                                        }
                                        else
                                        {
                                            ?>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="/auth/discord">Link discord</a>
                                            <?php
                                        }
                                        ?>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="/auth/logout">Logout</a>
                                    </li>
                                </div>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="sidebar sidebar-style-2" data-background-color="dark2">
            <div class="sidebar-wrapper scrollbar scrollbar-inner">
                <div class="sidebar-content">
                    <div class="user">
                        <div class="avatar-sm float-left mr-2">
                            <img src="<?= $userdb['avatar']?>" alt="..." class="avatar-img rounded-circle">
                        </div>
                        <div class="info">
                            <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                                <span>
                                    <?= $userdb['username']?>

                                    <span class="user-level"><?= $userdb['role']?></span>

                                </span>
                            </a>
                        </div>
                    </div>
                    <ul class="nav nav-primary">
                        <li class="nav-section">
                            <span class="sidebar-mini-icon">
                                <i class="fa fa-ellipsis-h"></i>
                            </span>
                            <h4 class="text-section">Overview</h4>
                        </li>
                        <li class="nav-item ">
                            <a href="/" class="collapsed">
                                <i class="fas fa-home"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/server/create" class="collapsed">
                                <i class="fas fa-plus-square"></i>
                                <p>New Server</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/store" class="collapsed">
                                <i class="fas fa-shopping-bag"></i>
                                <p>Shop</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a data-toggle="collapse" href="#earn">
                                <i class="fas fa-coins"></i>
                                <p>Earn</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="earn">
                                <ul class="nav nav-collapse">
                                    <li class="nav-item">
                                        <a href="/earn/afk" class="collapsed">
                                            <p>AFK</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/earn/linkvertise" class="collapsed">
                                            <p>Linkvertise</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/earn/redeem" class="collapsed">
                                            <p>Redeem</p>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item active">
                            <a href="/support/select" class="collapsed">
                                <i class="fa-solid fa-ticket" style="color: #b9babf;"></i>
                                <p>Support</p>
                            </a>
                        </li>
                        <li class="nav-section">
                            <span class="sidebar-mini-icon">
                                <i class="fa fa-ellipsis-h"></i>
                            </span>
                            <h4 class="text-section">Links</h4>
                        </li>
                        <?php 
                        if ($getsettingsdb['enable_mainwebsite'] == "false")
                        {

                        }
                        else
                        {
                            ?>
                        <li class="nav-item">
                            <a href="<?= $getsettingsdb['website']?>" class="collapsed">
                                <i class="bi bi-house-fill"></i>
                                <p>Website</p>
                            </a>
                        </li>
                        <?php 
                            
                        }
                        
                        if ($getsettingsdb['enable_discord'] == "false")
                        {

                        }
                        else
                        {
                            ?>
                        <li class="nav-item">
                            <a href="<?= $getsettingsdb['discordserver']?>" class="collapsed">
                                <i class="bi bi-discord"></i>
                                <p>Discord</p>
                            </a>
                        </li>
                        <?php
                        }

                        if ($getsettingsdb['enable_phpmyadmin'] == "false")
                        {

                        }
                        else
                        {
                            
                            ?>
                            <li class="nav-item">
                            <a href="<?= $getsettingsdb['phpmyadmin']?>" class="collapsed">
                                <i class="bi bi-server"></i>
                                <p>PhpMyAdmin</p>
                            </a>
                            </li>
                            <?php
                        }
                        if ($getsettingsdb['enable_status'] == "false")
                        {

                        }
                        else
                        {
                            ?>
                            <li class="nav-item">
                            <a href="<?= $getsettingsdb['statuspage']?>" class="collapsed">
                                <i class="fas fa-signal"></i>
                                <p>Status</p>
                            </a>
                            </li>
                            <?php
                        }
                        ?>

                        <li class="nav-item">
                            <a href="<?= $getsettingsdb['ptero_url']?>" class="collapsed">
                                <i class="fas fa-external-link-square-alt"></i>
                                <p>Panel</p>
                            </a>
                        </li>


                        <li class="nav-section">
                            <span class="sidebar-mini-icon">
                                <i class="fa fa-ellipsis-h"></i>
                            </span>
                            <h4 class="text-section">Administrative Overview</h4>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="main-panel">
            <div class="container">
                <div class="content">
                    <div class="page-inner">
                        <div class="mt-2 mb-4">
                            <h2 class="text-white pb-2">Welcome back, <?= $userdb['username']?>!</h2>
                        </div>
                        <div class="row">
                            <?php include('../core/imports/resources.php');?>
                        </div>
                        <?php         if (isset($_SESSION["error"])) {
            ?>
                        <div class="alert alert-danger text-danger" role="alert">
                            <strong>Error!</strong> <?= $_SESSION["error"] ?>
                        </div>
                        <?php
            unset($_SESSION["error"]);
        }
        ?>
                        <?php
        if (isset($_SESSION["success"])) {
            ?>
                        <div class="alert alert-success" role="alert">
                            <strong>Success!</strong> <?= $_SESSION["success"] ?>
                        </div>
                        <?php
            unset($_SESSION["success"]);
        }
        ?>  
					<div class="row">
						<div class="col-md-12">
							<div class="d-flex justify-content-between">
								<a type="button" class="btn btn-success d-none d-sm-inline-block text-white" href="./create_ticket">New ticket</a>
							</div>
                            <br>
                            <div class="card bg-default shadow">
                                    <div class="card-header bg-transparent border-0">
                                        <h3 class="text-white mb-0">Your tickets</h3>
                                    </div>
								<div class="list-group list-group-messages list-group-flush">
									<div class="list-group-item unread">
                                    <?php
                                    echo "<table id='tickets' class='table table-sm '>";
                                    echo "<thead class='text-white  '><tr><th>ID</th><th>Owner</th><th>Content</th><th>Status</th><th>Created at</th><th>Actions</th></tr></thead>";
                                    echo "<tbody>";
                                    $result = mysqli_query($cpconn, "SELECT * FROM tickets WHERE user_id='" . $_SESSION['uid'] . "'");
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr>";
                                        echo "<td class='text-white'>" . $row["id"] . "</td>";
                                        echo "<td class='text-white'>" . $row["username"] . "</td>";
                                        echo "<td class='text-white'>" . $row["content"] . "</td>";
                                        echo "<td class='text-white'>" . $row["status"] . "</td>";
                                        echo "<td class='text-white'>" . $row["created_at"] . "</td>";
                                        echo "<td class='text-white'>";
                                        echo "<a href='view_ticket?id=" . $row["id"] . "' class='btn btn-sm btn-primary'>Open</a> ";
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                                    echo "</tbody></table>";
                                    ?>
                                        </div>
								</div>
							</section>
                        </div>
                    </div>
                </div>
                
            </div> 
            <?php 
            include('../core/imports/credits.php')
            ?>
        </div>
    </div>
</body>
<?php include '../core/imports/footer.php'; ?>

</html>