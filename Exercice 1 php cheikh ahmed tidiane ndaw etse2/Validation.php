<!--
        Longueur positif
        Largeur positif
        Longueur> Largeur
-->


<?php
// longueur et largeur doivent etre numeric(entier, reel)
function is_number($nombre,$errorMessage="Veuillez saisir un nombre"){
    if(is_numeric($nombre)){
        return null;
    }
    else{
        return $errorMessage;

    }

  }
//is_positif()
/*longueur positif
largeur positif 
*/
function is_positif($nombre,$errorMessage="Veuillez saisir un nombre positif"){
    $result=is_number($nombre);
            if($result==true){
                if($nombre>0){
                    return true;
                }
                else{
                     return $errorMessage;
                }
            }
        }



//compare
//Nbre1=>plus grand
//Nbre2 =>plus petit
function compare($nbre1,$nbre2,$errorMessage="Longueur doit etre supérieur a la largeur"){
    $result1=is_positif($nbre1);
    $result2=is_positif($nbre2);
    $error=[];
    if($result1 !==true){
        $error[]= $result1;

    }
    if($result2 !==true){
        $error[]= $result2;
    }
    if(count($error)==0){
        if($nbre1>$nbre2){
            return true;
        }
        else{
            $error[]=$errorMessage;
        }
    }
    return $error;

  }
  function is_empty($nbre,$sms=null)
  {
      if(empty($nbre))
      {
          if($sms==null)
          {
              $sms="Le nombre est obligatoire";
          }
          return $sms;
      }
      
  }
?>