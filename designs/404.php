<!DOCTYPE html>
<html lang="es-mx">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Page Not Found - Brand</title>
    <meta name="twitter:card" content="summary">
    <meta name="twitter:image" content="https://comercial.castelancarpinteyro.com/assets/img/branding/logo.jpeg">
    <meta name="author" content="Dante Castelán Carpinteyro">
    <meta property="og:type" content="website">
    <meta name="description" content="Web-app de administración de inventario y ventas">
    <meta property="og:image" content="https://comercial.castelancarpinteyro.com/assets/img/branding/logo.jpeg">
    <link rel="icon" type="image/jpeg" sizes="1024x1024" href="../assets/img/branding/logo.jpeg">
    <link rel="icon" type="image/jpeg" sizes="1024x1024" href="../assets/img/branding/logo.jpeg">
    <link rel="icon" type="image/jpeg" sizes="1024x1024" href="../assets/img/branding/logo.jpeg">
    <link rel="icon" type="image/jpeg" sizes="1024x1024" href="../assets/img/branding/logo.jpeg">
    <link rel="icon" type="image/jpeg" sizes="1024x1024" href="../assets/img/branding/logo.jpeg">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="manifest" href="../manifest.json">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="../assets/css/Bootstrap-Callout-Info.css">
    <link rel="stylesheet" href="../assets/css/extra.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="index.php">
                    <div class="sidebar-brand-icon col col-3 d-flex justify-content-center"><img class="icon-circle" onchange="javascript:filtroInventario();" src="../assets/img/branding/logo.jpeg"></div>
                    <div class="sidebar-brand-text mx-3"><span>CC Comercial</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link" href="sale.html"><i class="fas fa-table"></i><span>Artículos</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="detail.html"><i class="fas fa-search"></i><span>Detalle producto</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="sale.html"><i class="fas fa-cash-register"></i><span>Vender</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="transactions.html"><i class="fas fa-hand-holding-usd"></i><span>Transacciones</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="tasks.html"><i class="fas fa-tasks"></i><span>Tareas</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="operations.html"><i class="fas fa-hard-hat"></i><span>Operaciones</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="chat.html"><i class="fas fa-comments"></i><span>Chat</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="profile.html"><i class="fas fa-user"></i><span>Perfil</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="logout.html"><i class="fas fa-door-open"></i><span>Cerrar sesión</span></a></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars main-branding-text-color"></i></button><a href="sale.html" style="width: 100%;"><button class="btn btn-primary main-branding-background-color" type="button" style="font-size: 85% !important;/*padding: 12% !important;*/width: 100%;"><i class="fas fa-cash-register"></i>&nbsp;Vender</button></a>
                        <ul class="navbar-nav flex-nowrap ms-auto">
                            <li class="nav-item dropdown no-arrow mx-1">
                                <div class="nav-item dropdown show no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="true" data-bs-toggle="dropdown" href="#"><span class="badge bg-danger badge-counter">3+</span><i class="fas fa-bell fa-fw"></i></a>
                                    <div class="dropdown-menu dropdown-menu-end show dropdown-list animated--grow-in" data-bs-popper="none">
                                        <h6 class="dropdown-header">CENTRO DE ALERTAS</h6><a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="me-3">
                                                <div class="bg-primary icon-circle"><i class="fas fa-file-alt text-white"></i></div>
                                            </div>
                                            <div><span class="small text-gray-500">Enero 1, 2023</span>
                                                <p>El resumen mensual de ventas está listo</p>
                                            </div>
                                        </a><a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="me-3">
                                                <div class="bg-success icon-circle"><i class="fas fa-donate text-white"></i></div>
                                            </div>
                                            <div><span class="small text-gray-500">Diciembre 23, 2023</span>
                                                <p>Se vendió 1 Avión Summer Fun por $671 vía Mercado Libre.</p>
                                            </div>
                                        </a><a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="me-3">
                                                <div class="bg-warning icon-circle"><i class="fas fa-exclamation-triangle text-white"></i></div>
                                            </div>
                                            <div><span class="small text-gray-500">December 2, 2019</span>
                                                <p>Spending Alert: We've noticed unusually high spending for your account.</p>
                                            </div>
                                        </a><a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item dropdown no-arrow mx-1">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="badge bg-danger badge-counter">7</span><i class="fas fa-envelope fa-fw"></i></a>
                                    <div class="dropdown-menu dropdown-menu-end dropdown-list animated--grow-in">
                                        <h6 class="dropdown-header">MENSAJES</h6><a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="dropdown-list-image me-3"><img class="rounded-circle" src="../assets/img/avatars/avatar4.jpeg">
                                                <div class="bg-success status-indicator"></div>
                                            </div>
                                            <div class="fw-bold">
                                                <div class="text-truncate"><span>Hi there! I am wondering if you can help me with a problem I've been having.</span></div>
                                                <p class="small text-gray-500 mb-0">Emily Fowler - 58m</p>
                                            </div>
                                        </a><a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="dropdown-list-image me-3"><img class="rounded-circle" src="../assets/img/avatars/avatar2.jpeg">
                                                <div class="status-indicator"></div>
                                            </div>
                                            <div class="fw-bold">
                                                <div class="text-truncate"><span>I have the photos that you ordered last month!</span></div>
                                                <p class="small text-gray-500 mb-0">Jae Chun - 1d</p>
                                            </div>
                                        </a><a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="dropdown-list-image me-3"><img class="rounded-circle" src="../assets/img/avatars/avatar3.jpeg">
                                                <div class="bg-warning status-indicator"></div>
                                            </div>
                                            <div class="fw-bold">
                                                <div class="text-truncate"><span>Last month's report looks great, I am very happy with the progress so far, keep up the good work!</span></div>
                                                <p class="small text-gray-500 mb-0">Morgan Alvarez - 2d</p>
                                            </div>
                                        </a><a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="dropdown-list-image me-3"><img class="rounded-circle" src="../assets/img/avatars/avatar5.jpeg">
                                                <div class="bg-success status-indicator"></div>
                                            </div>
                                            <div class="fw-bold">
                                                <div class="text-truncate"><span>Am I a good boy? The reason I ask is because someone told me that people say this to all dogs, even if they aren't good...</span></div>
                                                <p class="small text-gray-500 mb-0">Chicken the Dog · 2w</p>
                                            </div>
                                        </a><a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                                    </div>
                                </div>
                                <div class="shadow dropdown-list dropdown-menu dropdown-menu-end" aria-labelledby="alertsDropdown"></div>
                            </li>
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="d-none d-lg-inline me-2 text-gray-600 small">Dante</span><img class="border rounded-circle img-profile" src="../assets/img/avatars/avatar1.jpeg"></a>
                                    <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in"><a class="dropdown-item" href="profile.php"><i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Perfil</a><a class="dropdown-item" href="settings.php"><i class="fas fa-cogs fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Ajustes</a><a class="dropdown-item" href="tasks.php"><i class="fas fa-tasks fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Tareas</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item" href="php-scripts/logout.php"><i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Cerrar sesión</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid">
                    <div class="text-center mt-5">
                        <div class="error mx-auto" data-text="404">
                            <p class="m-0">404</p>
                        </div>
                        <p class="text-dark mb-5 lead">Página no encontrada</p>
                        <p class="text-black-50 mb-0">It looks like you found a glitch in the matrix...</p><a href="/">← Regresar al inicio</a>
                    </div>
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © Castelán Carpinteyro 2023</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/cart-controller.js"></script>
    <script src="../assets/js/theme.js"></script>
</body>

</html>