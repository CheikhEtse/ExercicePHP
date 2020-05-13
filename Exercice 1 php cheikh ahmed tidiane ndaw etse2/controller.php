<?php
/*Traitement 
Calculer le Dp
-Calculer le P
-Calculer la S
-Calculer la diagonale
*/
function demi_perimetre($longueur,$largeur){
    return $longueur+$largeur;

}
function perimetre($longueur,$largeur){
    return demi_perimetre($longueur,$largeur);
}
function surface($longueur,$largeur){
    return $longueur*$largeur;

}
function diagonale($longueur,$largeur){

    return $longueur/$largeur;
}

?>