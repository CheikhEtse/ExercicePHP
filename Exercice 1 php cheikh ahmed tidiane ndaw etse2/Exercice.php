<!--
 1) Saisir la longueur et la largeur d'un rectangle a partir d'un formulaire
        Longueur et Largeur doivent etre numeric
        Longueur positif
        Largeur positif
        Longueur> Largeur
        SI l'une de ces conditions est fausses on sera dans un scénario alternatif
        Pour la formulaire on aura deux champs
         
 2) Traitements=> Use Case
    -Calculer le Dp
    -Calculer le P
    -Calculer la S
    -Calculer la diagonale
 
-->
<?php
    require_once("Validation.php");
    require_once("controller.php");
$errrors=[];
$resultat=[];
    if(isset($_POST['btn_submit'])){
        $longueur=$_POST['longueur'];
        $largeur=$_POST['largeur'];
        $result=is_empty($longueur);
        if($result !==true){
            $errors['longueur']=$result;
        }
        $result=is_empty($largeur);
        if($result !==true){
            $errors['largeur']=$result;
        }
        if(count($errors)===0){
            $result=compare($longueur,$largeur);
            if($result===true){
                $resultat["demi_perimetre"]=demi_perimetre($longueur,$largeur);
                $resultat["perimetre"]=perimetre($longueur,$largeur);
                $resultat["surface"]=surface($longueur,$largeur);
                $resultat["diagonale"]=diagonale($longueur,$largeur);
            }else{
                $errors[]=$result;
            }
        }
    }

//isset($var):booleen
    //$var existe=> true
    //$var n'existe pas=>false
?>

html <!doctype html>
 <html lang="en">
 
 <head>
     <title>Title</title>
 
     <!-- Required meta tags -->
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
         integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
 
 </head>
 
 <body>
     <div class="container mt-5">
         <form method="post" action="">
             <div class="form-group row">
                 <label for="inputName" class="col-sm-1-12 col-form-label">Longueur</label>
                 <div class="col-6 ml-2">
                     <input type="text" class="form-control" name="longueur" id="inputName" placeholder="">
                 </div> 
    
                 <div class="alert alert-danger col-3"> 
                     <strong>Erreur</strong> Alert body ...
                 </div>
                 
             </div>
             <div class="form-group row">
                 <label for="inputName" class="col-sm-1-12 col-form-label">Largeur</label>
                 <div class="col-6 ml-2">
                     <input type="text" class="form-control" name="largeur" id="inputName" placeholder="">
                 </div>
                 <div class="alert alert-danger col-3"> 
                     <strong>Erreur</strong> Alert body ...
                 </div>

             </div>
             <div class="form-group row">
                 <div class="offset-sm-2 col-sm-10">
                     <button type="submit" name="btn_submit" class="btn btn-primary">Calculer</button>
                 </div>

             </div>
          </form>
     </div>
<?php
    if( isset($_POST['btn_submit'])){
?>
     <div class="container">
         <ul class="nav justify-content-center">
             <li class="nav-item">
                 Demi-Perimetre :
             </li>
             <li class="nav-item">
                Perimetre :
             </li>
             <li class="nav-item">
                Surface :
             </li>
             <li class="nav-item">
                Diagonale :
             </li>
         </ul>

     </div>
     <?php
    }
?>
 
 
     <!-- Optional JavaScript -->
     <!-- jQuery first, then Popper.js, then Bootstrap JS -->
     <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
         integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
         crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
         integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
         crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
         integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
         crossorigin="anonymous"></script>
 </body>
 
 </html>