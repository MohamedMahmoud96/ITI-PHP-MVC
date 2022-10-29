<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  
    <form action="<?php route('login')?>" method="POST">
   <p> <?php if($errors)  echo implode('<br>', $errors);?> </p>
        <input type='email' name='email'>
        <input type="password" name='password'>
        <input type="checkbox" name='remember'>
        <button>login</button>

    </form>
</body>
</html>