<?php
$errorMSG = "";

if (empty($_POST["name"])) {
    $errorMSG = "Se requiere agregar un nombre";
} else {
    $name = $_POST["name"];
}

if (empty($_POST["email"])) {
    $errorMSG = "Se requiere agregar un correo";
} else {
    $email = $_POST["email"];
}

if (empty($_POST["message"])) {
    $errorMSG = "Se requiere agregar un mensaje";
} else {
    $message = $_POST["message"];
}


$EmailTo = "contacto@desarrollosflorida.cl";
$Subject = "Nuevo mensaje del formulario de contacto de landing page";

// prepare email body text
$Body = "";
$Body .= "Name: ";
$Body .= $name;
$Body .= "\n";
$Body .= "Email: ";
$Body .= $email;
$Body .= "\n";
$Body .= "Message: ";
$Body .= $message;
$Body .= "\n";

// send email
$success = mail($EmailTo, $Subject, $Body, "From:".$email);

// redirect to success page
if ($success && $errorMSG == ""){
   echo "success";
}else{
    if($errorMSG == ""){
        echo "Something went wrong :(";
    } else {
        echo $errorMSG;
    }
}
?>