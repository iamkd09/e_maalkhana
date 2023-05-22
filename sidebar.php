<?php 
include('conn.php');
//include('header.php');

$Role = $_SESSION['role_id'];

$current_page = basename($_SERVER['PHP_SELF']);

?>

<div class="sidebar" data-color="blue">  
    <div class="logo">
        <a href="#" style="font-size:large;" class="simple-text logo-normal">
            <b><span><?php echo $lang['e'] ?></span>-<span><?php echo $lang['malkhana'] ?></span></b>
        </a>
    </div>
    <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav" style="font-size:large;">
            <li class="<?php echo ($current_page == 'dashboard.php') ? 'active' : ''; ?>">
                <a href="dashboard.php">
                    <i class="fa fa-home" aria-hidden="true"></i>
                    <p><?php echo $lang['sidebar_home'] ?></p>
                </a>
            </li>
            <?php if($Role == 1 || $Role == 2){ ?>
            <li class="<?php echo ($current_page == 'user.php') ? 'active' : ''; ?>">
                <a href="user.php">
                    <?php $_SESSION['user'] = true; ?>
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <p><?php echo $lang['sidebar_register'] ?></p>
                </a>
            </li>
            <?php }?>
            <li class="<?php echo ($current_page == 'language_change.php') ? 'active' : ''; ?>">
                <a href="language_change.php">
                    <?php $_SESSION['language'] = true; ?>
                    <i class="fa fa-language" aria-hidden="true"></i>
                    <p><?php echo $lang['sidebar_languages'] ?></p>
                </a>
            </li>
            <li>
                <a href="./logout.php" class="border-color:red" >
                    <i class="fa fa-power-off"></i>
                    <p><?php echo $lang['sidebar_logout'] ?></p>
                </a>
            </li>
        </ul>
    </div>
</div>
