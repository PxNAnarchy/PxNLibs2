<?php
if (isset($loadpage)) {
?>
<aside class="sidebar">
    <div class="sidebar-container">
    <div class="sidebar-header">
    <div class="brand"><div class="logo"> <span class="l l1"></span> <span class="l l2"></span> <span class="l l3"></span> <span class="l l4"></span> <span class="l l5"></span> </div> <?php echo \Nucleo\Config::$title;?> </div></div>
    <nav class="menu">
        <ul class="nav metismenu" id="sidebar-menu">
            <li><a href="<?php echo \Nucleo\Config::$url;?>"> <i class="fa fa-home"></i> <?php echo $language['sidebar_home'];?> </a></li>
        <li>
            <a href=""> <i class="fa fa-credit-card-alt"></i> Gates <i class="fa arrow"></i> </a>
            <ul>
                <li> <a href="<?php echo \Nucleo\Config::$url;?>/Gate1">STRIPE</a> </li>
                <?php 
                
/*
                        <li><a href="<?php echo \Nucleo\Config::$url;?>/CheckerProxys"> <i class="fa fa-puzzle-piece"></i> <?php echo $language['proxychecker_title'];?> </a></li>



                 */ ?>

            </ul>
        </li>
        <li><a href="<?php echo \Nucleo\Config::$url;?>/Bot"> <i class="fa fa-rebel"></i> <?php echo $language['bot_sidebar'];?> </a></li>
        <li><a href="<?php echo \Nucleo\Config::$url;?>/Lsk"> <i class="fa fa-refresh"></i> <?php echo $language['slk_title'];?> </a></li>
        <li><a href="<?php echo \Nucleo\Config::$url;?>/MyProxys"> <i class="fa fa-internet-explorer"></i> <?php echo $language['myproxys_title'];?> </a></li>
        <li><a href="<?php echo \Nucleo\Config::$url;?>/CheckerProxys"> <i class="fa fa-internet-explorer"></i> <?php echo $language['proxychecker_title'];?> </a></li>
        
        <li><a href="<?php echo \Nucleo\Config::$url;?>/Key"> <i class="fa fa-expeditedssl"></i> <?php echo $language['key_sidebar'];?> </a></li>
        <li><a href="https://www.youtube.com/channel/UCYCDs0fAd02GS11kJmgCoag/videos" target="_blank"> <i class="fa fa-youtube-play"></i> TUTORIALES  </a></li>



    </ul>
    </nav>
    </div>
                    

<footer class="sidebar-footer">
<ul class="nav metismenu" id="customize-menu">
    <li>
    <ul>
    <li class="customize">
        <div class="customize-item">
        <div class="row customize-header">
        <div class="col-xs-4"> </div>
        <div class="col-xs-4"> <label class="title">fixed</label> </div>
        <div class="col-xs-4"> <label class="title">static</label> </div>
        </div>
        <div class="row hidden-md-down">
        <div class="col-xs-4"> <label class="title">Sidebar:</label> </div>
        <div class="col-xs-4"> <label>
        <input class="radio" type="radio" name="sidebarPosition" value="sidebar-fixed" >
        <span></span>
        </label> </div>
        <div class="col-xs-4"> <label>
        <input class="radio" type="radio" name="sidebarPosition" value="">
        <span></span>
        </label> </div>
        </div>
        <div class="row">
        <div class="col-xs-4"> <label class="title">Header:</label> </div>
        <div class="col-xs-4"> <label>
        <input class="radio" type="radio" name="headerPosition" value="header-fixed">
        <span></span>
        </label> </div>
        <div class="col-xs-4"> <label>
        <input class="radio" type="radio" name="headerPosition" value="">
        <span></span>
        </label> </div>
        </div>
        <div class="row">
        <div class="col-xs-4"> <label class="title">Footer:</label> </div>
        <div class="col-xs-4"> <label>
        <input class="radio" type="radio" name="footerPosition" value="footer-fixed">
        <span></span>
        </label> </div>
        <div class="col-xs-4"> <label>
        <input class="radio" type="radio" name="footerPosition" value="">
        <span></span>
        </label> </div>
        </div>
        </div>
        <div class="customize-item">
        <ul class="customize-colors">
        <li> <span class="color-item color-red" data-theme="red"></span> </li>
        <li> <span class="color-item color-orange" data-theme="orange"></span> </li>
        <li> <span class="color-item color-green" data-theme="green"></span> </li>
        <li> <span class="color-item color-seagreen" data-theme="seagreen"></span> </li>
        <li> <span class="color-item color-blue active" data-theme=""></span> </li>
        <li> <span class="color-item color-purple" data-theme="purple"></span> </li>
        </ul>
        </div>
        </li>
        </ul>
        <a href=""> <i class="fa fa-cog"></i> <?php echo $language['sidebar_customize'];?> </a>
        </li>
        </ul>
        </footer>
        </aside>

<?php } ?>