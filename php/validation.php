<?php

require "conn.php";

$name = $_POST["name"];
$telefono =$_POST["phone"];
$email =$_POST["email"];
$message = $_POST["message"];
$vacio = $error = $correcto ="";
$nameErr= $emailErr=$errorCampos="";

if ($_SERVER["REQUEST_METHOD"]=="POST") {
    
if (isset($_POST["bottom"])) {
    if (!empty($name) && !empty($telefono) && !empty($email) && !empty($message)) {

       $sql  = "INSERT INTO reparacion VALUES (null,'$name','$telefono','$email','$message')";

        $name = segury_input($name);
        if (!preg_match("/^[a-zA-Z- ']*$/",$name)  ) {
            $errorCampos = "<div class='alert alert-danger errorCampos'>Error Al enviar el Mensaje </div>";

            $nameErr = "<span class='nameErr alert alert-danger is-invalid'>Solo se permiten letras y espacios</span>";

            

    }else{
        
        $email = segury_input($email);
        if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
         $errorCampos = "<div class='alert alert-danger errorCampos'>Error Al enviar el Mensaje </div>";

         $emailErr  = "<span class='alert alert-danger emailErr is-invalid'>Ingrese un Gmail correcto</span>";

        }else{
            $telefono = segury_input($telefono);
            $message = segury_input($message);
            if ($conn->query($sql)==true) {
                $correcto=  "<div class='correcto alert alert-success '>Mensaje Enviado </div>";               
     
             }else{
                $error = "<span class='alert alert-danger error is-invalid'>Error Al enviar el Mensaje </span>";
             }
        }     
        }
    }else{
        $vacio = "<span class='alert alert-danger vacio'> Relle los Campos";
    }  
}

}
function segury_input($data){

    $data  =trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
$conn->close();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mantenimiento y Refrigeración</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">



</head>
<body>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
</body>
</html>