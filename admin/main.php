<!doctype html>
<html lang="it">
    <head>
        <title>Admin | Main</title>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="../inc/js/popper.min.js" type="text/javascript"></script>
        
        <link href="../inc/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <script src="../inc/js/bootstrap.min.js" type="text/javascript"></script>
    </head>

    <body>
        <?php 
            include 'php/sc_checkIfLoginIsValid.php';
            if(!logIn())
                header("Location: /index.php");
        ?>

       
    </body>
<html>