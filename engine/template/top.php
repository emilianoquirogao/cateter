    <!-- loader -->
    <div id="loader">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <!-- * loader -->

    <!-- App Header -->
	<?php if(isset($_SESSION['user'])):?>
    <div class="appHeader bg-primary scrolled">
        <div class="left">
            <a href="#" class="headerButton" data-bs-toggle="offcanvas" data-bs-target="#sidebarPanel">
                <ion-icon name="menu-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">
<?php
include('engine/template/ft_title.php');
?>
        </div>
    </div>
	<?php endif; ?>
    <!-- * App Header -->

    <!-- App Capsule -->
    <div id="appCapsule">