<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
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
            <a class="navbar-brand" href="#">Wave CAFE</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./order/get">MyOrders</a>
                    </li>
                </ul>
                <li class="nav-item">
                    <a class="nav-link" href=""><?= auth()['name'] ?></a>
                </li>

                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="tm-container  d-flex justify-content-between">
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
                            <?php $totalPrice = 0 ?>

                            <?php foreach ($cartProducts as $cartProduct) : ?>
                                <?php $totalPrice += $cartProduct['price'] * $cartProduct['quantity']; ?>
                                <div class=" row text-light my-2 gx-0 p-0">
                                    <div class="col col-lg-6 p-2">
                                        <h3> <?= $cartProduct['name'] ?></h3>
                                    </div>
                                    <div class="col col-lg-2 p-2">
                                        <h4><?= '$' . $cartProduct['price'] ?></h4>
                                    </div>
                                    <div class="col col-lg-1">
                                        <form action="./cart/minusquantity" method="post">
                                            <input type="text" name="product_id" value="<?= $cartProduct['id'] ?>" hidden>
                                            <input type="text" name="user_id" value="<?= $user['id'] ?>" hidden>
                                            <button type="submit" class=" btn btn-sm btn-dark ">
                                                <h3> - </h3>
                                            </button>
                                        </form>

                                    </div>
                                    <span id="quantity" class="col col-lg-1">
                                        <h4><?= $cartProduct['quantity'] ?></h4>
                                    </span>
                                    <div class="col col-lg-1">
                                        <form action="./cart/addquantity" method="post">
                                            <input type="text" name="product_id" value="<?= $cartProduct['id'] ?>" hidden>
                                            <input type="text" name="user_id" value="<?= $user['id'] ?>" hidden>
                                            <button type="submit" class=" btn btn-sm btn-dark">
                                                <h3> + </h3>
                                            </button>
                                        </form>

                                    </div>
                                    <div class="col col-lg-1">
                                        <form action="./cart/delete" method="post">
                                            <input type="text" name="product_id" value="<?= $cartProduct['id'] ?>" hidden>
                                            <button class=" btn  btn-danger">X</button>
                                        </form>
                                    </div>
                                </div>
                            <?php endforeach ?>
                            <?php if (count($cartProducts) > 0) { ?>
                                <form action="./order/create" method="post">
                                    <div>
                                        <div class="row gx-0 mx-2 my-2">
                                            <div class="form-group">
                                                <textarea class="form-control" name="comment" value="" rows="2"> any notes</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row gx-0 g-2 my-2 p-2">
                                            <div class="col col-lg-3 text-light">
                                                <h2><label for="room">Room</label></h2>
                                            </div>
                                            <div class="col col-lg-3"> <select class="form-control" name="room" id="room">
                                                    <option value="<?= $user['room_no'] ?>"><?= $user['room_no'] ?></option>
                                                    <?php foreach ($rooms as $room) { ?>
                                                        <?php if ($room['room_no'] == $user['room_no']) {
                                                            continue;
                                                        } ?>
                                                        <option value="<?= $room['room_no'] ?>"><?= $room['room_no'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="d-flex  text-light p-2 ">
                                            <h2 class="me-4">Total Price </h2>
                                            <h2 id="total-price">$ <?= $totalPrice ?> </h2>
                                        </div>
                                        <div class="d-flex justify-content-end m-3 p-2">
                                            <input type="text" name="total_price" value="<?= $totalPrice ?>" hidden>
                                            <input type="text" hidden name="user_id" value="<?= $user['id'] ?>">

                                            <button class="me-2 form-buttons">Order Now</button>

                                        </div>
                                    </div>
                                </form>
                            <?php } else { ?>
                                <div class="col col-lg-12">
                                    <span>
                                        <h3 class="text-danger text-center">Empty Cart</h3>
                                    </span>
                                </div>
                            <?php } ?>

                        </div>
                </div>
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
                                                    <?php if (!(in_array($product['id'], $cartProductsIds))) { ?>
                                                        <form action="./cart/addto" method="post">
                                                            <input type="text" name="product_id" value="<?= $product['id'] ?>" hidden>
                                                            <button class="form-buttons">Add To Cart</button>
                                                        </form>
                                                    <?php } else { ?>
                                                        <form action="./cart/addquantity" method="post">
                                                            <input type="text" name="product_id" value="<?= $product['id'] ?>" hidden>
                                                            <input type="text" name="user_id" value="<?= $user['id'] ?>" hidden>
                                                            <button class="form-buttons" style="background-color: #0cc; color:white">Add More</button>
                                                        </form>
                                                    <?php } ?>


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

</body>

</html>