<section id="menu-0">

    <nav class="navbar navbar-dropdown bg-color transparent navbar-fixed-top">
        <div class="container">

            <div class="mbr-table">
                <div class="mbr-table-cell">

                    <div class="navbar-brand">
                        <a href="index.php" class="navbar-logo"><img src="assets/images/codilogo.png" alt="Codi Urdaneta"></a>
                        <a class="navbar-caption" href="index.php">CODI URDANETA</a>
                    </div>

                </div>
                <div class="mbr-table-cell">

                    <button class="navbar-toggler pull-xs-right hidden-md-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                        <div class="hamburger-icon"></div>
                    </button>

                    <ul class="nav-dropdown collapse pull-xs-right nav navbar-nav navbar-toggleable-sm" id="exCollapsingNavbar">
<!--                        <li class="nav-item">
                            <a class="nav-link link" href="https://mobirise.com/">OVERVIEW</a>
                        </li>
                        <li class="nav-item dropdown open">
                            <a class="nav-link link dropdown-toggle" data-toggle="dropdown-submenu" href="https://mobirise.com/" aria-expanded="true">FEATURES</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="https://mobirise.com/">Mobile friendly</a>
                                <a class="dropdown-item" href="https://mobirise.com/">Based on Bootstrap</a>
                                <div class="dropdown open">
                                    <a class="dropdown-item dropdown-toggle" data-toggle="dropdown-submenu" href="https://mobirise.com/" aria-expanded="true">Trendy blocks</a>
                                    <div class="dropdown-menu dropdown-submenu">
                                        <a class="dropdown-item" href="https://mobirise.com/">Image/content slider</a>
                                        <a class="dropdown-item" href="https://mobirise.com/">Contact forms</a>
                                        <a class="dropdown-item" href="https://mobirise.com/">Image gallery</a>
                                        <a class="dropdown-item" href="https://mobirise.com/">Mobile menu</a>
                                        <a class="dropdown-item" href="https://mobirise.com/">Google maps</a>
                                        <a class="dropdown-item" href="https://mobirise.com/">Social buttons</a>
                                        <a class="dropdown-item" href="https://mobirise.com/">Google fonts</a>
                                        <a class="dropdown-item" href="https://mobirise.com/">Video background</a>
                                    </div>
                                </div>
                                <a class="dropdown-item" href="https://mobirise.com/" aria-expanded="false">Trendy blocks</a>
                                <a class="dropdown-item" href="https://mobirise.com/">Host anywhere</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link link dropdown-toggle" data-toggle="dropdown-submenu" href="https://mobirise.com/">HELP</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="http://forums.mobirise.com/">Forum</a>
                                <a class="dropdown-item" href="https://mobirise.com/">Tutorials</a>
                                <a class="dropdown-item" href="https://mobirise.com/">Contact us</a>
                            </div>
                        </li>
     -->                       <?php if (!isset($_SESSION['userId'])){
                                echo ('

                        <li class="nav-item">
                        <a class="navlink link" href="login.php">Log In</a></li>'); 
                                } else {
                                        echo ('   
                            <li class="nav-item dropdown">                      
                            <a class="nav-link link dropdown-toggle" data-toggle="dropdown-submenu" href="#">My Profile</a>
                                <div class="dropdown-menu">
                                <a class="dropdown-item" href="profile.php">View Profile</a>
                                 <a class="dropdown-item" href="logout.php?logout">Log Out</a></li>'); 
                                }
                                ?>


                                
                            </div>
                        </li>
                    </ul>
                    <button hidden="" class="navbar-toggler navbar-close" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                        <div class="close-icon"></div>
                    </button>

                </div>
            </div>

        </div>
    </nav>

</section>