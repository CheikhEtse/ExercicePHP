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
    //Premiere heure
        1-Afficher les erreurs
        2-Garder les bonnes et effacer les mauvaises valeurs
        3-Session=>$_SESSION
            //Ouvrir session_start()
            //Fermer la Session session_destroy()
            //$_SESSION est un tableau assosiatif
    //Deuxieme heure
    //POO en PHP==>Rectangle
        1-Classe(Concrte ou abstraite ou interface)
            a)Attribut(Instance ou Classe)
            b)Methode(Instance ou Classe)
        2-Objet
        //Nomination
        Classe=> MaClasse
        methode=>maMethode
        attribut=>monattribut
 
-->
<?php
    require_once("Validation.php");
    require_once("controller.php");
$errors=[];
$resultat=[];
$longueur="";
$largeur="";
//Ouvrir session
    session_start();
    if(!isset($_SESSION['id'])){
        $_SESSION['id']=0;
    }
    session_destroy();
         
    if(isset($_POST['btn_submit'])){
        if($_POST['btn_submit']==="calcul"){
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
                $id= $_SESSION['id'];
                $id++;
                $_SESSION["Resultat"]=$resultat;
                $_SESSION['id']=$id;
            }else{
                $errors[]=$result;
            }
        }
        if(isset($errors["longueur"])){
            $longueur="";
        }
        if(isset($errors["largeur"])){
            $largeur="";
        } 
    }else{
        session_destroy();
    }
}

//isset($var):booleen
    //$var existe=> true
    //$var n'existe pas=>false
?>

 <!doctype html>
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
     <?php if(isset($errors['all'])){

         
    ?>

        <div class="alert alert-danger col-4"> 
            <strong>Erreur</strong><?php echo $errors['all'];?> 
        </div>
    <?php
    }  
    ?>    
         <form method="post" action="">
             <div class="form-group row">
                 <label for="inputName" class="col-sm-1-12 col-form-label">Longueur</label>
                 <div class="col-6 ml-2">
                     <input type="text" class="form-control" name="longueur" value="<?=$longueur;?>" id="inputName" placeholder="">
                 </div> 
        <?php if(isset($errors['longueur'])){
            

         
         ?>
    
                 <div class="alert alert-danger col-4"> 
                     <strong>Erreur</strong><?php echo $errors['longueur'];?>
                 </div>
        <?php
        }  
        ?>    
             </div>
             <div class="form-group row">
                 <label for="inputName" class="col-sm-1-12 col-form-label">Largeur</label>
                 <div class="col-6 ml-2">
                     <input type="text" class="form-control" name="largeur" value="<?=$largeur;?>" id="inputName" placeholder="">
                 </div>
        <?php if(isset($errors['Largeur'])){
            
         
        ?>

        <div class="alert alert-danger col-4"> 
            <strong>Erreur</strong><?php echo $errors['Largeur'];?>
        </div>
        <?php
        }  
        ?>    
             </div>
             <div class="form-group row">
                 <div class="offset-sm-2 col-sm-2">
                     <button type="submit" name="btn_submit" value="calcul" class="btn btn-primary">Calculer</button>
                 </div>
             <div class="form-group row">
                 <div class="col-sm-2">
                     <button type="submit" name="btn_submit"  value="réinitialisation" class="btn btn-secondary">Réinitialiser</button>
                 </div>

             </div>
          </form>
     </div>
<?php
    if( isset($_POST['btn_submit']) && $_POST['btn_submit']==="calcul" && count($errors)=== 0){
?>
    <table class="table container table-bordered">
        <thead>
            <tr>
                <th>Demi-Perimetre</th>
                <th>Perimetre</th>
                <th>Surface</th>
                <th>Diagonale</th>
            </tr>
        </thead>
        <tbody>
        <?php
            foreach($_SESSION as$key=>$rectangle){
                if($key=="id"){}
            }
        ?>
            <tr>
                <td scope="row"></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td scope="row"></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
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