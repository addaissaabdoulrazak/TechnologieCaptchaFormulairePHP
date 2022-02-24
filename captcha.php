<?php
session_start();

#--première etape : definir un code aléatoire.
/* et pour definir un code aleatoire php met a notre disposition la methode reand() qui prend deux paramètre
 et comme que nous voulons générer un code a 5 chiffre nous allons passer en paramètre un nombre a 5 chiffre
 et pour cela nous utiliserons une variable globale $_SESSION["code"]*/
$_SESSION["code"] = rand(10000, 99999);
$code = $_SESSION["code"];

#--second etape : definir une image
/**pour créer une image php met a notre disposition une methode imagecreate qui va nous permetre de créer un image
 * et qui prend deux paramèters qui sont : parametre de longueur et paramètre de hauteur
 */

$image = imagecreate(55, 25);

/*puis nous allons definir la couleur de fond de notre image et php met a notre disposition une fonction 
 qui va nous permetre de definir une couleur et cette fonction s'appele imageaolorallocate(), et cette fonction va contenir
 plusieur paramètre, dont le 1er paramètre est l'image qu'on a creer precedement($image) a la quelle on veut apporter
 une image de fond, et pour le 2ième, le 3ième, et le 4ième paramètre ce sont les couleur RGB */

$image_color = imagecolorallocate($image, 0, 0, 0);


#--Troisième etape : definir le texte qui va être sur l'image qui n'est autre que la variable global de SESSION créer lors de l'etape n°1
#-- c'est a dire c'est  code générer de manière aléatoire qui represent le texte qui va être sur l'image.
#-- Et donc comme que nous avons deja notre texte(le code aleatoire) il reste juste a définir la color du texte

/*Et donc prémièrement nous allons définir la couleur de notre text comme que nous avons definis la couleur de notre image*/
$txtColor = imagecolorallocate($image, 255, 255, 255);

/*Puis nous allons lié notre image creer au niveau de l'etape 2 a notre texte, qui lui aussi doit être relier a notre code generer de manière aléatoire
  et pour cela php met a notre disposition une variable qui permet de tous les relier qui prend en paramètre notre image qu'on veut relier a notre texte
  le second paramètre qui indique la taille en pixel de notre image qui sera sur l'image de font, le 3e et 4e paramètre qui representerons le positionnement 
  sur a l'axe des X et l'axe des Y par rapport a l'mage de font le 5e parametre concerne ce que nous voulons ecrire sur image =>qui est le code générer
  de manière aleatoire */

imagestring($image, 50, 5, 5,  $_SESSION["code"], $txtColor);

#--Dernière Etape: Afficher l'image

/** et donc pour afficher l'image php met a notre disposition la fonction  header() qui va prendre en argument le type de contenue
 * qui sera dans notre cas ci l'extension du fichier*/

header("Content-type:image/jpeg");

/* il va falloir indiquer l'image de type jpeg et pour cela nous avons la function imagejpeg() mis a notre disposition par php*/
imagejpeg($image);

//puis pour ne pas laisser de trace nous allons utiliser un fonction nous permetant ainsi de vider le cache de notre machine 
imagedestroy($image);
