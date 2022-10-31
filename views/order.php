<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link rel="stylesheet" href="<?= assets("assets/css/tooplate-wave-cafe.css") ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet" /> <!-- https://fonts.google.com/ -->
    <style>
        .header-table {
            background-color: #099;
            color: #fff;
        }

        .product-cart {
            background-color: rgba(0, 0, 0, 0.7);
            color: #fff;
        }
    </style>

</head>

<body>
    <nav id='header-nav' class="navbar navbar-expand-lg  navbar-dark bg-dark sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= url('') ?>">Wave CAFE</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="<?= url('') ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">MyOrders</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="container text-light">
        <div class="row my-4">
            <h1 class="text-dark">My orders</h1>
        </div>
        <form action="<?php route("order/filter") ?>" method="post">
            <div class="d-flex my-4 justify-content-end">
                <div class="d-flex me-3">
                    <h3 class="me-3"><label for="from">From</label></h3>
                    <input type="date" id="from" name="date-from" value="" for="date">
                </div>
                <div class="d-flex  me-3">
                    <h3 class="me-3"><label for="to">To</label></h3>
                    <input type="date" id="to" name="date-to" value="" for="date">
                </div>
                <button type="submit" class="btn btn-dark">find orders</button>
            </div>
        </form>
        <div class="row g-0 header-table">
            <div class="col col-md-6 col-lg-3">
                <h2>Order Date</h2>
            </div>
            <div class="col col-md-6 col-lg-3">
                <h2>status</h2>
            </div>
            <div class="col col-md-6 col-lg-3">
                <h2>Total price</h2>
            </div>
            <div class="col col-md-6 col-lg-3">
                <h2>Action</h2>
            </div>
        </div>
        <div class="orders">
            <?php foreach ($orders as $order) { ?>
                <div class="order">
                    <div class="row g-0 bg-dark text-light py-2">
                        <div class="col col-md-6 col-lg-3">
                            <h5><?= $order['created_at'] ?></h5>
                        </div>
                        <div class="col col-md-6 col-lg-3">
                            <h5><?= $order['status'] ?></h5>
                        </div>
                        <div class="col col-md-6 col-lg-3">
                            <h5><?= $order['total_price'] ?></h5>
                        </div>

                        <?php if ($order['status'] == 'proceesing') { ?>
                            <div class="col col-md-6 col-lg-3">
                                <form action="<?php route("order/delete") ?>" method="post">
                                    <input type="text" hidden name="order_id" value="<?= $order['id'] ?>">
                                    <button class="btn btn-danger btn-sm"> Cancel</button>
                                </form>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="row g-0 my-5 p-3 product-cart">
                    <?php foreach ($products as $product) { ?>
                        <?php if ($product['order_id'] == $order['id']) { ?>
                            <div class="col col-lg-2">
                                <img src='<?= assets("/assets/img/" . $product['image']) ?>' alt="Image" class="tm-list-item-img">
                                <h5><?= $product['name'] ?></h5>
                                <h5><?= $product['price'] ?> $ </h5>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>



    <!-- Background video -->
    <div class="tm-video-wrapper">
        <i id="tm-video-control-button" class="fas fa-pause"></i>
        <video autoplay muted loop id="tm-video">
            <source src="<?= assets("assets/video/wave-cafe-video-bg.mp4") ?>" type="video/mp4">
        </video>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="public/assets/js/jquery-3.4.1.min.js"></script>
    <script>
        function setVideoSize() {
            const vidWidth = 1920;
            const vidHeight = 1080;
            const windowWidth = window.innerWidth;
            const windowHeight = window.innerHeight;
            const tempVidWidth = windowHeight * vidWidth / vidHeight;
            const tempVidHeight = windowWidth * vidHeight / vidWidth;
            const newVidWidth = tempVidWidth > windowWidth ? tempVidWidth : windowWidth;
            const newVidHeight = tempVidHeight > windowHeight ? tempVidHeight : windowHeight;
            const tmVideo = $('#tm-video');

            tmVideo.css('width', newVidWidth);
            tmVideo.css('height', newVidHeight);
        }
        /************** Video background *********/
        setVideoSize();
        // Set video background size based on window size
        let timeout;
        window.onresize = function() {
            clearTimeout(timeout);
            timeout = setTimeout(setVideoSize, 100);
        };

        // Play/Pause button for video background      
        const btn = $("#tm-video-control-button");

        btn.on("click", function(e) {
            const video = document.getElementById("tm-video");
            $(this).removeClass();

            if (video.paused) {
                video.play();
                $(this).addClass("fas fa-pause");
            } else {
                video.pause();
                $(this).addClass("fas fa-play");
            }
        });
    </script>

</body>

</html>