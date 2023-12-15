<?php

if (isset($_GET['product'])) {
    $id = $_GET['product'];
    include "php scripts/functions.php";
    include "php scripts/sql-fetcher.php";
    $tabla = "juguetes";
    $campos = array();
    $campos = [
        "id_toy",
        "name_toy",
        "description_toy",
        "model_toy",
        "line_toy",
        "bars_toy",
        "brand_toy",
        "pieces_toy",
        "quantity_toy",
        "price_toy",
        "imgs_toy",
        "quant_imgs_toy",
    ];
    $data = fetch_fields($tabla, $campos, "$id");
} else {
    header("Location: articles.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title><?php echo ($data[1] . " "); ?>- Detalle de Producto - CC Comercial</title>
    <meta name="twitter:card" content="summary">
    <meta name="twitter:image" content="https://comercial.castelancarpinteyro.com/assets/img/branding/logo.jpeg">
    <meta name="author" content="Dante Castelán Carpinteyro">
    <meta property="og:type" content="website">
    <meta name="description" content="Web-app de administración de inventario y ventas">
    <meta property="og:image" content="https://comercial.castelancarpinteyro.com/assets/img/branding/logo.jpeg">
    <link rel="icon" type="image/jpeg" sizes="1024x1024" href="assets/img/branding/logo.jpeg">
    <link rel="icon" type="image/jpeg" sizes="1024x1024" href="assets/img/branding/logo.jpeg">
    <link rel="icon" type="image/jpeg" sizes="1024x1024" href="assets/img/branding/logo.jpeg">
    <link rel="icon" type="image/jpeg" sizes="1024x1024" href="assets/img/branding/logo.jpeg">
    <link rel="icon" type="image/jpeg" sizes="1024x1024" href="assets/img/branding/logo.jpeg">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="manifest" href="manifest.json">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="assets/css/Bootstrap-Callout-Info.css">
    <link rel="stylesheet" href="assets/css/extra.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="index.php">
                    <div class="sidebar-brand-icon col col-3 d-flex justify-content-center"><img class="icon-circle" onchange="javascript:filtroInventario();" src="assets/img/branding/logo.jpeg"></div>
                    <div class="sidebar-brand-text mx-3"><span>CC Comercial</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link" href="articles.html"><i class="fas fa-table"></i><span>Artículos</span></a></li>
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
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="badge bg-danger badge-counter">3+</span><i class="fas fa-bell fa-fw"></i></a>
                                    <div class="dropdown-menu dropdown-menu-end dropdown-list animated--grow-in">
                                        <h6 class="dropdown-header">alerts center</h6><a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="me-3">
                                                <div class="bg-primary icon-circle"><i class="fas fa-file-alt text-white"></i></div>
                                            </div>
                                            <div><span class="small text-gray-500">December 12, 2019</span>
                                                <p>A new monthly report is ready to download!</p>
                                            </div>
                                        </a><a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="me-3">
                                                <div class="bg-success icon-circle"><i class="fas fa-donate text-white"></i></div>
                                            </div>
                                            <div><span class="small text-gray-500">December 7, 2019</span>
                                                <p>$290.29 has been deposited into your account!</p>
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
                                        <h6 class="dropdown-header">alerts center</h6><a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="dropdown-list-image me-3"><img class="rounded-circle" src="assets/img/avatars/avatar4.jpeg">
                                                <div class="bg-success status-indicator"></div>
                                            </div>
                                            <div class="fw-bold">
                                                <div class="text-truncate"><span>Hi there! I am wondering if you can help me with a problem I've been having.</span></div>
                                                <p class="small text-gray-500 mb-0">Emily Fowler - 58m</p>
                                            </div>
                                        </a><a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="dropdown-list-image me-3"><img class="rounded-circle" src="assets/img/avatars/avatar2.jpeg">
                                                <div class="status-indicator"></div>
                                            </div>
                                            <div class="fw-bold">
                                                <div class="text-truncate"><span>I have the photos that you ordered last month!</span></div>
                                                <p class="small text-gray-500 mb-0">Jae Chun - 1d</p>
                                            </div>
                                        </a><a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="dropdown-list-image me-3"><img class="rounded-circle" src="assets/img/avatars/avatar3.jpeg">
                                                <div class="bg-warning status-indicator"></div>
                                            </div>
                                            <div class="fw-bold">
                                                <div class="text-truncate"><span>Last month's report looks great, I am very happy with the progress so far, keep up the good work!</span></div>
                                                <p class="small text-gray-500 mb-0">Morgan Alvarez - 2d</p>
                                            </div>
                                        </a><a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="dropdown-list-image me-3"><img class="rounded-circle" src="assets/img/avatars/avatar5.jpeg">
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
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="d-none d-lg-inline me-2 text-gray-600 small">Dante</span><img class="border rounded-circle img-profile" src="assets/img/avatars/avatar1.jpeg"></a>
                                    <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in"><a class="dropdown-item" href="profile.php"><i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Perfil</a><a class="dropdown-item" href="settings.php"><i class="fas fa-cogs fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Ajustes</a><a class="dropdown-item" href="tasks.php"><i class="fas fa-tasks fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Tareas</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item" href="php scripts/logout.php"><i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Cerrar sesión</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid">
                    <h1 class="text-dark text-center main-branding-text-color fw-bold" style="padding: 0px;">Detalle de producto</h1>
                </div>
            </div>
            <div class="container container-fluid">
                <div class="col">
                    <div class="row d-flex align-items-center">
                        <div class="col col-12 col-sm-12 col-md-12 col-lg-8">
                            <!-- Start: Bold BS4 Carousel Full Responsive -->

                            <?php
                            if ($data[11] == 1) {
                                echo (build_detail_carousel(split_urls($data[10])));
                            } else {
                                echo (build_detail_carousel(split_urls($data[10])));
                            }
                            ?>

                            <!--
                                <div class="carousel slide" data-bs-ride="carousel" id="carousel-1">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active"><img class="w-100 d-block" src="assets/img/test/pm1.jpg" alt="Slide Image"></div>
                                        <div class="carousel-item"><img class="w-100 d-block" src="assets/img/test/pm2.jpg" alt="Slide Image"></div>
                                        <div class="carousel-item"><img class="w-100 d-block" src="assets/img/test/pm3.jpg" alt="Slide Image"></div>
                                    </div>
                                    <div>
                                        
                                        <a class="carousel-control-prev" href="#carousel-1" role="button" data-bs-slide="prev"><span class="carousel-control-prev-icon"></span><span class="visually-hidden">Previous</span></a>
                                        
                                        <a class="carousel-control-next" href="#carousel-1" role="button" data-bs-slide="next"><span class="carousel-control-next-icon"></span><span class="visually-hidden">Next</span></a>
                                    </div>
                                    <ol class="carousel-indicators">
                                        <li data-bs-target="#carousel-1" data-bs-slide-to="0" class="active"></li>
                                        <li data-bs-target="#carousel-1" data-bs-slide-to="1"></li>
                                        <li data-bs-target="#carousel-1" data-bs-slide-to="2"></li>
                                    </ol>
                                </div>
                            -->

                        </div>
                        <div class="col col-12 col-sm-12 col-md-12 col-lg-4 h-75">
                            <div class="row">
                                <div class="col">
                                    <p class="text-primary m-0 fw-bold main-branding-text-color text-center py-2 fs-3" style="line-height: 1.12;"><?php echo ($data[1]); ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div id="barcode-inner" class="col d-flex justify-content-center align-middle"></div>
                            </div>
                            <div class="row">
                                <div class="col d-flex justify-content-end col-7 px-1"><span class="fs-1" style="color: #29a3a3;">$<?php echo ($data[9]); ?></span></div>
                                <div class="col d-flex justify-content-start col-5 px-1"><span class="fs-5 d-flex align-items-center" style="color: #29a3a3;font-size: 100% !important;">MXN</span></div>
                            </div>
                            <div class="row">
                                <div class="col d-flex justify-content-center py-1">
                                    <div class="input-group" style="width: 85%;"><span class="d-xxl-flex input-group-text fs-6" style="padding-left: 0px;padding-right: 0px;display: inline-block !important;text-align: center;width: 65% !important;" value="1" max="<?php echo ($data[8]); ?>">Cantidad</span><input class="form-control" type="number" value="1" style="text-align: center;width: 35% !important;padding-left: 0px;"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col d-flex justify-content-center fs-4"><span class="py-2" style="text-align: center;line-height: 1.3;"><?php echo ($data[8]); ?> unidades disponibles</span></div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="row">
                                        <div class="col d-flex justify-content-center"><button class="btn btn-primary up-button" type="button" onclick="javascript:directSale(<?php echo ($data[0]); ?>);"><i class="fas fa-cash-register"></i>&nbsp;Vender</button></div>
                                    </div>
                                    <div class="row">
                                        <div class="col d-flex justify-content-center"><button class="btn btn-primary down-button" type="button" onclick="javascript:add_to_sale(<?php echo ($data[0]); ?>);"><i class="fas fa-file-invoice-dollar"></i>&nbsp;Añadir a venta</button></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row py-3">
                        <div class="col col-md-4 pe-md-0">
                            <div class="row">
                                <div class="col d-flex justify-content-center"><span class="fs-3 d-flex justify-content-center" style="width: 100% !important;line-height: 1.2;text-align: center;">Ficha técnica:</span></div>
                            </div>
                            <div class="row py-1">
                                <div class="col d-flex justify-content-center gray-span col-md-5"><span>Marca</span></div>
                                <div class="col d-flex justify-content-center col-md-7"><span><?php echo ($data[6]); ?></span></div>
                            </div>
                            <div class="row py-1">
                                <div class="col d-flex justify-content-center gray-span col-md-5"><span>Modelo</span></div>
                                <div class="col d-flex justify-content-center col-md-7"><span><?php echo ($data[3]); ?></span></div>
                            </div>
                            <div class="row py-1">
                                <div class="col d-flex justify-content-center gray-span col-md-5"><span class="d-flex align-items-center">Línea</span></div>
                                <div class="col d-flex justify-content-center col-md-7"><span style="text-align: center;"><?php echo ($data[4]); ?></span></div>
                            </div>
                            <div class="row py-1">
                                <div class="col d-flex justify-content-center gray-span col-md-5"><span class="d-flex align-items-center" style="text-align: center;">Piezas</span></div>
                                <div class="col d-flex justify-content-center col-md-7"><span style="text-align: center;"><?php echo ($data[7]); ?></span></div>
                            </div>
                        </div>
                        <div class="col col-md-8 mx-md-0">
                            <div class="row">
                                <div class="col d-flex justify-content-center"><span class="fs-3">Descripción:</span></div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <?php
                                    if ($data[2] != "" and $data[2] != null) {
                                        $paragraphs = splitter($data[2], "

");
                                        $n = sizeof($paragraphs);
                                        for ($i = 0; $i < $n; $i++) {
                                            echo ('<p class="fs-6 p-description" style="text-align: justify;">' . $paragraphs[$i] . "</p>");
                                        }
                                    } else {
                                        echo ('<p class="fs-6 p-description" style="text-align: center;">' . "No se cargó una descripción." . "</p>");
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
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
    <script src="assets/js/theme.js"></script>
    <script>
        function encapsulated_bars_generator(bars, capsule1, capsule2) {
            let objective = document.getElementById("barcode-inner");

            // Crear objeto XMLHttpRequest
            let xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // Procesar la respuesta del servidor
                    objective.innerHTML = (this.responseText);
                    if (this.responseText != null) {
                        // La construcción de la tabla no es nula y procede
                        //objective.innerHTML = (capsule1 + (this.responseText) + capsule2);
                        objective.innerHTML = (this.responseText);
                    } else {
                        // La respuesta es nula, interpretar como que no se encontraron datos y avisar vacío
                        objective.innerHTML = ("Error fatal en generación de código de barras.");
                    }
                }
            };
            xhr.open("GET", "php scripts/barcode-generator.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send("bars=" + bars);
        }

        document.addEventListener("DOMContentLoaded", function() {
            function insertBarcode(number) {
                let objective = document.getElementById("barcode-inner");

                // Crear objeto XMLHttpRequest
                let xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        // Procesar la respuesta del servidor
                        if (this.responseText !== null) {
                            objective.innerHTML = this.responseText;
                        } else {
                            objective.innerHTML = "Error en la generación del código de barras.";
                        }
                    }
                };

                // Hacer la solicitud GET al archivo PHP con el número como parámetro
                xhr.open("GET", "php scripts/barcode-generator.3php?bar=" + number, true);
                xhr.send();
            }
            // Aquí ejecutas la función
            insertBarcode("7501000278404");
        });

        encapsulated_bars_generator('<?php echo ($data[5]) ?>', '<img class="px-md-4" alt="Código de barras: <?php echo ($data[5]); ?>" style="width: 100% !important;/*height: 75% !important;*//*padding-top: 12.5%;*//*padding-bottom: 12.5%;*/" src="', '">');
    </script>
</body>

</html>