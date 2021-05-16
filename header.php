<header class="header-section">
    <div class="container-fluid">
        <div class="logo">
            <a href="./home.php">
                <img style="position: relative; top: -20px;" src="img/logo.png" alt="">
            </a>
        </div>
        
        <div class="container">
            <div class="nav-menu">
                <nav class="mainmenu mobile-menu">
                    <ul>
                        <li><a href="./home.php">Home</a></li>
                        <li><a href="./about-us.php">About us</a></li>
                        <li><a href="./gallery.php">Gallery</a></li>
                        <li><a href="./event.php">Event</a></li>
                        <li><a href="./Service.php">Service</a>
                        <li style="padding-right: 100px;"><a href="./contact.php">Contacts</a></li>
                        <li>
                        <form  class="navbar-form" action="search.php" method="GET">
                            <input value="<?php if(!empty($_GET['search'])) echo $_GET['search']; ?>" class="form-control search-input" name="search" placeholder="Search" type="text">
                            </input>
                        </form>
                    </li>
                    </ul>
                </nav>
            </div>
        </div>
        <div id="mobile-menu-wrap"></div>
    </div>
</header>