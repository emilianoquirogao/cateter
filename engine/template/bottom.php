		<div style="height:20px"></div>
    </div>
    <!-- * App Capsule -->

<?php if(isset($_SESSION['user'])):?>
    <!-- App Bottom Menu -->
     <div class="appBottomMenu">
        <a href="<?php echo $url_inicio; ?>" class="item <?php if($_GET['page_id']=="home") echo "active"; ?>">
            <div class="col">
                <ion-icon name="home-outline"></ion-icon>
            </div>
        </a>
        <a href="<?php echo $url_activos; ?>" class="item <?php if($_GET['page_id']=="activos") echo "active"; ?>">
            <div class="col">
                <ion-icon name="people-outline"></ion-icon>
				<span class="badge badge-primary">3</span>
            </div>
        </a>
        <a href="<?php echo $url_mispacientes; ?>" class="item <?php if($_GET['page_id']=="mispacientes") echo "active"; ?>">
            <div class="col">
                <ion-icon name="list-outline"></ion-icon>
                <span class="badge badge-primary">2</span>
            </div>
        </a>
        <a href="<?php echo $url_estadisticas; ?>" class="item <?php if($_GET['page_id']=="estadisticas") echo "active"; ?>">
            <div class="col">
                <ion-icon name="pie-chart-outline"></ion-icon>
            </div>
        </a>
        <a href="#sidebarPanel" class="item" data-bs-toggle="offcanvas">
            <div class="col">
                <ion-icon name="menu-outline"></ion-icon>
            </div>
        </a>
    </div>
    <!-- * App Bottom Menu -->
	
	    <!-- App Sidebar -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="sidebarPanel">
        <div class="offcanvas-body">
            <!-- profile box -->
            <div class="profileBox">
                <div class="image-wrapper">
                    <img src="assets/img/sample/avatar/avatar1.jpg" alt="image" class="imaged rounded">
                </div>
                <div class="in">
                    <strong>Emiliano Quiroga</strong>
                </div>
                <a href="#" class="close-sidebar-button" data-bs-dismiss="offcanvas">
                    <ion-icon name="arrow-back-outline"></ion-icon>
                </a>
            </div>
            <!-- * profile box -->

            <ul class="listview flush transparent no-line image-listview mt-2">
                <li>
                    <a href="<?php echo $url_inicio; ?>" class="item">
                        <div class="icon-box bg-primary">
                            <ion-icon name="home-outline"></ion-icon>
                        </div>
                        <div class="in">
                            Inicio
                        </div>
                    </a>
                </li>
                <li>
                    <a href="<?php echo $url_activos; ?>" class="item">
                        <div class="icon-box bg-primary">
                            <ion-icon name="people-outline"></ion-icon>
                        </div>
                        <div class="in">
                            <div>Pacientes Activos</div>
							<span class="badge badge-primary">3</span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="<?php echo $url_mispacientes; ?>" class="item">
                        <div class="icon-box bg-primary">
                            <ion-icon name="list-outline"></ion-icon>
                        </div>
                        <div class="in">
                            <div>Mis Pacientes</div>
							<span class="badge badge-primary">2</span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="<?php echo $url_agregarpaciente; ?>" class="item">
                        <div class="icon-box bg-primary">
                            <ion-icon name="person-add-outline"></ion-icon>
                        </div>
                        <div class="in">
                            <div>Nuevo Paciente</div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="<?php echo $url_buscarpaciente; ?>" class="item">
                        <div class="icon-box bg-primary">
                            <ion-icon name="search-outline"></ion-icon>
                        </div>
                        <div class="in">
                            <div>Buscar Paciente</div>
                        </div>
                    </a>
                </li>
                <!--<li>
                    <a href="<?php // echo $url_historial; ?>" class="item">
                        <div class="icon-box bg-primary">
                            <ion-icon name="document-text-outline"></ion-icon>
                        </div>
                        <div class="in">
                            <div>Historial</div>
                        </div>
                    </a>
                </li>-->
                <li>
                    <a href="<?php echo $url_estadisticas; ?>" class="item">
                        <div class="icon-box bg-primary">
                            <ion-icon name="pie-chart-outline"></ion-icon>
                        </div>
                        <div class="in">
                            <div>Estadisticas</div>
                        </div>
                    </a>
                </li>
                <li>
                    <div class="item">
                        <div class="icon-box bg-primary">
                            <ion-icon name="moon-outline"></ion-icon>
                        </div>
                        <div class="in">
                            <div>Dia/Noche</div>
                            <div class="form-check form-switch">
                                <input class="form-check-input dark-mode-switch" type="checkbox" id="darkmodesidebar">
                                <label class="form-check-label" for="darkmodesidebar"></label>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <!-- sidebar buttons -->
        <div class="sidebar-buttons">
            <a href="<?php echo $url_perfil; ?>" class="button">
                <ion-icon name="person-outline"></ion-icon>
            </a>
            <a href="<?php echo $url_configuracion; ?>" class="button">
                <ion-icon name="settings-outline"></ion-icon>
            </a>
            <a href="<?php echo $url_logout; ?>" class="button">
                <ion-icon name="log-out-outline"></ion-icon>
            </a>
        </div>
        <!-- * sidebar buttons -->
    </div>
    <!-- * App Sidebar -->
<?php endif; ?>