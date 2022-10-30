<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= assets("assets/css/tooplate-wave-cafe.css") ?>">
    <title>login</title>
    <style>
        .tm-text-primary {
            margin: auto 0;
            text-align: center;
            color: white;
        }

        .tm-contact-text-container {
            padding: 15px 0px;
        }

        .alian-center {
            margin-right: auto;
            margin-left: auto;
        }
    </style>
</head>

<body>
    <!-- Contact Page -->
    <div id="contact" class="tm-page-content">
        <div class="tm-black-bg tm-contact-text-container">
            <h1 class="tm-text-primary">Log In</h1>

        </div>
        <div class="tm-black-bg tm-contact-form-container alian-center">

            <form action="<?php route('login') ?>" method="POST" id="contact-form">
                <span class="text-danger "><?php if ($errors)  echo implode('<br>', $errors); ?>
                </span>
                <div class="tm-form-group my-2">
                    <input type="email" name="email" class="tm-form-control" placeholder="Email" />
                </div>
                <div class="tm-form-group">
                    <input type="password" name="password" class="tm-form-control" placeholder="Password" />
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="remember" id="" value="checkedValue">
                         Remember me 
                    </label>
                </div>
                <div>
                    <button type="submit" class="tm-btn-primary tm-align-right">
                        Submit
                    </button>
                </div>



            </form>
        </div>
    </div>
    <!-- end Contact Page -->
    <div class="tm-video-wrapper">
        <i id="tm-video-control-button" class="fas fa-pause"></i>
        <video autoplay muted loop id="tm-video">
            <source src="<?php echo assets("assets/video/wave-cafe-video-bg.mp4") ?>" type="video/mp4">
        </video>
    </div>

    <script src="js/jquery-3.4.1.min.js"></script>
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