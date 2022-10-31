<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <!-- CSS only -->
    <link rel="stylesheet" href="public/assets/css/tooplate-wave-cafe.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="public/assets/fontawesome/css/all.min.css"> <!-- https://fontawesome.com/ -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet" /> <!-- https://fonts.google.com/ -->


</head>

<body>
    <nav id='header-nav' class="navbar navbar-expand-lg  navbar-dark bg-dark sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="tm-container">
        <div class="tm-row">
            <!-- cart -->
            <div class="tm-left">
                <div class="tm-left-inner">
                    <div class="tm-site-header">
                        <i class="fas fa-cart fa-3x tm-site-logo"></i>
                        <h1 class="tm-site-name">Cart</h1>
                    </div>
                    <nav class="tm-site-nav">
                        <div class="d-flex flex-column">
                            <?php foreach ($cartProducts as $cartProduct) : ?>
                                <div class=" row text-light my-2 gx-0 p-0">
                                    <div class="col col-lg-6 p-0">
                                        <h3> <?= $cartProduct['name'] ?></h3>
                                    </div>
                                    <div class="col col-lg-2">
                                        <h4><?= '$' . $cartProduct['price'] ?></h4>
                                    </div>
                                    <div class="col col-lg-1">
                                        <h3><a href="" class="cart-link">+</a></h3>
                                    </div>
                                    <span id="quantity" class="col col-lg-1">
                                        <h4><?= $cartProduct['quantity'] ?></h4>
                                    </span>
                                    <div class="col col-lg-1">
                                        <h3><a href="" class="cart-link">-</a></h3>
                                    </div>
                                    <div class="col col-lg-1">
                                        <form action="./cart/delete" method="post">
                                            <input type="text" name="product_id" value="<?= $cartProduct['id'] ?>" hidden>
                                            <button class=" btn btn-sm btn-danger">X</button>
                                        </form>
                                    </div>
                                </div>
                            <?php endforeach ?>
                            <div>
                                <div class="row gx-0 mx-2 my-2">
                                    <div class="form-group">
                                        <textarea class="form-control" name="" id="" rows="2"> any notes</textarea>
                                    </div>
                                </div>
                                <div class="form-group row gx-0 g-2 my-2">
                                    <div class="col col-lg-3 text-light">
                                        <h4 class="text-center"><label for="room">Room</label></h4>
                                    </div>
                                    <div class="col col-lg-3"> <select class="form-control" name="room" id="room">
                                            <option value="<?= $user['room_no'] ?>"><?= $user['room_no'] ?></option>


                                            <?php foreach ($rooms as $room) { ?>
                                                <?php if ($room['room_no'] == $user['room_no']) {
                                                    continue;
                                                } ?>
                                                <option value="<?= $room['room_no'] ?>"><?= $room['room_no'] ?></option>
                                            <?php } ?>
                                        </select></div>


                                    <a href="<?php echo url('add/new/user.png'); ?>">add</a>
                                    </form>
                                    =======
                                </div>
                                <div class="d-flex justify-content-between text-light p-2 ">
                                    <h2>Total Price </h2>
                                    <h2>$ Price</h2>
                                </div>
                                <div class="d-flex justify-content-end m-3">
                                    <form action="./order/create" method="post">
                                        <input type="text" hidden name="user_id" value="<?= $user['id'] ?>">
                                        <button class="me-2 form-buttons">Order Now</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        </form>
                    </nav>
                </div>
            </div>
            <!-- products -->
            <div class="tm-right">
                <main class="tm-main">
                    <div id="drink" class="tm-page-content">
                        <!-- Drink Menu Page -->
                        <?php foreach ($categories as $category) { ?>
                            <nav class="tm-black-bg tm-drinks-nav mt-1">
                                <ul>
                                    <li>
                                        <h2> <?= $category['name'] ?></h2>
                                    </li>
                                </ul>
                            </nav>
                            <?php foreach ($products as $product) { ?>
                                <?php if ($category['id'] == $product['category_id']) { ?>
                                    <div class="tm-tab-content">
                                        <div class="tm-list">
                                            <div class="tm-list-item">
                                                <img src="public/assets/img/<?= $product['image'] ?>" alt="Image" class="tm-list-item-img">
                                                <div class="tm-black-bg tm-list-item-text">
                                                    <h3 class="tm-list-item-name"><?= $product['name'] ?><span class="tm-list-item-price">$<?= $product['price'] ?></span></h3>
                                                    <p class="tm-list-item-description">Here is a short description for the first item. Wave Cafe Template is provided by Tooplate.</p>
                                                    <div class="d-flex justify-content-end">
                                                        <form action="./cart/addto" method="post">
                                                            <input type="text" name="product_id" value="<?= $product['id'] ?>" hidden>
                                                            <button class="form-buttons">Add To Cart</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        <?php } ?>
                        <!-- end Drink Menu Page -->
                    </div>
                </main>
            </div>
        </div>
    </div>

    <!-- Background video -->
    <div class="tm-video-wrapper">
        <i id="tm-video-control-button" class="fas fa-pause"></i>
        <video autoplay muted loop id="tm-video">
            <source src="public/assets/video/wave-cafe-video-bg.mp4" type="video/mp4">
        </video>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="public/assets/js/jquery-3.4.1.min.js"></script>
    <script>
        // function addToCart(product_id) {
        //     console.log(product_id);
        //     let productId = 'addToCart' + product_id;
        //     console.log('product id',productId);
        //     let addToCartEle = document.getElementById(productId);
        //     console.log(addToCartEle);
        //     return;
        // }
    </script>
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