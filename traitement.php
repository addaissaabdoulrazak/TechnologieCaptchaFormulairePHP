<?php
session_start();
$code = $_SESSION["code"];
// une fois que le formulaire a été soumis via la methodes Post nous aurons besoin de recupérer le contenue de notre champs input captcha
$contenueInput = $_POST["captcha"];

/*nous allons inposer une condition(if) il faut que le contenue de notre champs input soit equivalent a celui de  notre code ayant 
 été généré de manière aléatoire voir la procedure avec la variable global des session*/

#-1 tout d'abord il faut pas que le contenue soit vide et qu'il soit egale au code générer de manière aléatoire => double condition <=
#-ce qui veut dire qu'il nous faut faire appele au code ayant été générer dans le fichier precedant et pour cela nous avons l'obligation
#-de demarer notre session sinon cela ne marchera pas.
if (isset($contenueInput) && ($contenueInput == $code)) {
    $reponse = "code ok";
} else {
    $reponse = "code pas ok";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!--oserez vous ecrire un code coté serveur sans serve et sans utiliser la balise php  -->
    <p style="text-align: center;"><?php echo $reponse ?></p>
</body>

</html>