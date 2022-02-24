<?php
session_start();
$code = $_SESSION["code"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <script src="./script.js"></script>
  <link rel="stylesheet" href="style.css" />
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta http-equiv="X-UA-Compatible" content="IE=7">
  <title>Document</title>
</head>

<body>
  <form action="./traitement.php" method="post" id="idFormulaire">
    <fieldset>
      <!-- <img src="./image/Warning-800px.png" alt="warning" style="width: 40px; height:40px;padding-top:10px; position:absolute"> -->
      <legend>Coordonnées</legend>
      <p>
        <label for="nom">First name</label>
        <input type="text" name="nom" id="nom" />
      </p>
      <p>
        <label for="idPrenom">Last name</label>
        <input type="text" name="prenom" id="idPrenom" />
      </p>
      <p>
        <label for="idNom">Last name</label>
        <input type="text" name="nom" id="idNom" />
      </p>
      <!-- Etape1: dertermination de l'endroit ou nous voulons placer le captcha -->
      <p class="classformulaire" style="position: relative;">
        <label for="captcha">copiez le code :</label>
        <!-- nous avons bien mentionner dans la partie explicative que nous allons générer une image totalement virtuel
             donc on utilisera bien evidemment la balise html image, certe elle est virtuel mais c'est une image. -->
        <img src="captcha.php" alt="code" /> &nbsp;
        <input type="text" name="code" id="captcha" size="7" />
        <span class="errorCode" style="position:absolute;width:50px;height: 20px;"></span>
      </p>
    </fieldset>
    <input type="submit" value="valider" style="margin-left: 20px; margin-top: 10px" />
  </form>

  <script src="./jquery.js"></script>
  <script>
    $(document).ready(function() {
      $("#idFormulaire").submit(function() {
        // alert("bonjour adda"); le mise en place fonctionne
        /*************************************************** 
         * nous allons utiiser l'approche variable boolean  *
         ****************************************************/
        var result = true;
        //nous pouvons egalement utiliser les expression regulière pour assurer la saisi de 5 caractère alphanumique
        if ($("#captcha").val() == "") {
          $("#captcha").css({
            borderColor: "red",
            backgroundColor: "#fecfc6",
          })
          $(".errorCode").html('<img src="./image/Warning-800px.png" alt="warning" style="width: 30px; height:auto;padding-top:10px;padding-bottom:5px;">')

          return false;
        }

        return result;
      })

    })
  </script>
</body>

</html>