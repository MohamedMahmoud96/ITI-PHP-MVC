

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo assets('dist/css/main.css');?>">
</head>
<body>
    <h1>welcome</h1>
    <?php dump(auth())?>
    <form action="<?php route('register')?>" method='post'>
        <input type=' text' name='name'>
        <button>

                add
        </button>

            <a href="<?php echo url('add/new/user.png'); ?>">add</a>
    </form>
</body>
</html>