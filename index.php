<?php include 'includes/db.php' ?>
<?php session_start() ; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/style.css">
    <title>Quête 9</title>
</head>
<body class="bg-dark">
    
<?php 
    include 'includes/header.php';
    include 'includes/jumpbotron.php';
?>

<section class="container">
    <div class="row justify-content-center text-center">
    <?php 


    
    if (isset($_GET['champion'])){ ?>
        <div class="col-6"><a class="text-light" href="?johto">
            <p>Région de Johto</p>    
            <img class="col-12" src="img/johto.png" alt="">
        </a></div>
        <div class="col-6"><a class="text-light" href="?kanto">
            <p>Région de Kanto</p>
            <img class="col-12 text-" src="img/kanto.png" alt="">
    </a></div>
    
    <?php }

     // Dresseur Johto 
     if (isset($_GET['johto'])){
        
        $sqlSelect = "SELECT * FROM dresseur WHERE `region` = 'johto' ORDER BY id";
        $prepare = $db->prepare($sqlSelect);
        $prepare->execute();
        $fetch = $prepare->fetchALL();

        foreach ($fetch as $value) {  ?>
        
        <a class="text-decoration-none text-light" href="?dresseur=<?php echo htmlspecialchars($value['dresseur']); ?>">
        <div class="card bg-dark border-white m-1" style="width: 18rem;">
        <img src="<?php echo $value['image'] ?>" class="card-img-top" height="400" alt="...">
        <div class="card-body">
            <h5 class="card-title text-light"><?php echo htmlspecialchars($value['dresseur']); ?></h5>
        </div>
        </div>
        </a>

<?php }}

        // Dresseur Kanto 
    if (isset($_GET['kanto'])){
        
        $sqlSelect = "SELECT * FROM dresseur WHERE `region` = 'Kanto' ORDER BY id";
        $prepare = $db->prepare($sqlSelect);
        $prepare->execute();
        $fetch = $prepare->fetchALL();

        foreach ($fetch as $value) {  ?>
        <a class="text-decoration-none text-light" href="?dresseur=<?php echo htmlspecialchars($value['dresseur']) ?>">
        <div class="card bg-dark border-white m-1" style="width: 18rem;">
        <img src="<?php echo $value['image'] ?>" class="card-img-top" height="400" alt="...">
        <div class="card-body">
            <h5 class="card-title text-light"><?php echo htmlspecialchars($value['dresseur']) ?></h5>
        </div>
        </div>
        </a>
<?php }}
        
    // Affiche dresseur solo
    if (isset($_GET['dresseur'])){ 
        $nomDresseur = $_GET['dresseur'];
        $sqlSelect = "SELECT * FROM dresseur WHERE dresseur = :dresseur ";
        $prepare = $db->prepare($sqlSelect);
        $prepare->execute([ 'dresseur' => $nomDresseur ]);
        $fetch = $prepare->fetchALL();

        foreach ($fetch as $value) {  
            $_SESSION['dresseur'] = [
                'id' => $value['id'],
                'ville' => $value['ville'],
                'dresseur' => $value['dresseur'],
                'type' => $value['type'],
                'badge' => $value['badge'],
                'region' => $value['region'],
                'image' => $value['image']
            ]; 
            
            ?>

        <div><img class="col-7 border-white" src="<?php echo $value['image']; ?>" class="card-img-top" alt="..."></div>
        <div class="col-3">
            <h5 class="text-light">Champion : <?php echo htmlspecialchars($value['dresseur']); ?> </h5>
            <p class="text-light">Arene de la ville de : <?php echo htmlspecialchars($value['ville']); ?></p>
            <p class="text-light">Type <?php echo htmlspecialchars($value['type']); ?></p>
            <p class="text-light">Badge <?php echo htmlspecialchars($value['badge']); ?></p>
            <form action="index.php" method="POST">
                <a href="?editDresseur=<?php echo htmlspecialchars($_SESSION['dresseur']['dresseur']); ?>"><img src="img/edit.png" height="20" alt=""></a>
                <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" title="Supprimer" style="background: none; color: inherit;	border: none; padding: 0; font: inherit; cursor: pointer; outline: inherit;">
                    <img src="img/del.png" height=20 alt="" />
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Voulez-vous supprimer ?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            </button>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            <button type="submit" name="deleteButtonDresseur" class="btn btn-primary">Supprimer</button>
                        </div>
                        </div>
                    </div>
                    </div>
            </form>
        </div>
            <?php }}



        //Tous les Pokémon (pokédex)
    if (isset($_GET['pokedex'])){
        $sqlSelect = "SELECT * FROM pokemon";
        $prepare = $db->prepare($sqlSelect);
        $prepare->execute();
        $fetch = $prepare->fetchALL();
    
    foreach ($fetch as $value) {  ?>
        <a class="text-decoration-none text-light" href="?idPokemon=<?php echo htmlspecialchars($value['id']); ?>"><div class="card bg-dark m-3 border-white" style="width: 18rem;">
        <img src="<?php echo $value['image'] ?>" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">N°<?php echo htmlspecialchars($value['numero']); ?> <?php echo htmlspecialchars($value['name']); ?> </h5>
        </div>
        </div></a>
    <?php }}

        // Affichage Pokemon Seul
    if (isset($_GET['idPokemon'])){ 
        $idPok = $_GET['idPokemon'];
        $sqlSelect = "SELECT * FROM pokemon WHERE id = :id ";
        $prepare = $db->prepare($sqlSelect);
        $prepare->execute([ 'id' => $idPok ]);
        $fetch = $prepare->fetchALL();

        foreach ($fetch as $value) {  
            $_SESSION['pokemon'] = [
                'id' => $value['id'],
                'numero' => $value['numero'],
                'name' => $value['name'],
                'type1' => $value['type1'],
                'type2' => $value['type2'],
                'image' => $value['image']
            ]; 
            ?>

        <div><img class="col-5 border-white" src="<?php echo $value['image']; ?>" class="card-img-top" alt="..."></div>
        <div class="col-2">
            <h5 class="text-light">N°<?php echo $value['numero']; ?> <?php echo htmlspecialchars($value['name']); ?> </h5>
            <p class="text-light">Type 1 : <?php echo htmlspecialchars($value['type1']); ?></p>
            <?php if (!empty($value['type2'])){ ?>
            <p class="text-light">Type 2 : <?php echo htmlspecialchars($value['type2']); ?></p> <?php } ?>
            <form action="index.php" method="POST">
                <a href="?editPokemon=<?php echo htmlspecialchars($_SESSION['pokemon']['numero']);?>"><img src="img/edit.png" height="20" alt=""></a>
                <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" style="	background: none; color: inherit;	border: none; padding: 0; font: inherit; 	cursor: pointer; outline: inherit;">
                    <img src="img/del.png" height=20 alt="" />
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Voulez-vous supprimer ?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            </button>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            <button type="submit" name="deleteButtonPokemon" class="btn btn-primary">Supprimer</button>
                        </div>
                        </div>
                    </div>
                    </div>
            </form>
            
        </div>
            <?php }} ?>



        </div>
</section>

<!-- formulaire ajout pokemon -->
<?php if (isset($_GET['addPokemon'])){ include 'includes/formPokemon.php'; } ?>
<?php 
    if (isset($_POST['ajoutPokemon'])){
        $target_dir = "img/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // vérification si le fichier existe déjà
        if (file_exists($target_file)) {
            ?>
            <div class="alert alert-danger text-center" role="alert">
            Le fichier existe déjà.
            </div><br>
        <?php
        $uploadOk = 0;
        }
        // Vérification de la taille du fichier
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            ?>
            <div class="alert alert-danger text-center" role="alert">
            La taille du fichier est trop importante.
            </div><br>
        <?php

        $uploadOk = 0;
        }
        // Autorisation seulement de certain format de fichier
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) { ?>
            <div class="alert alert-danger text-center" role="alert">
            Seulement les fichiers JPG, JPEG, PNG et GIF sont autorisés
            </div><br>
        <?php
        
        $uploadOk = 0;
        }
        // Vérification si $upload n'est pas à 0 (envoie message d'erreur)
        if ($uploadOk == 0) { ?>
            <div class="alert alert-danger text-center" role="alert">
            Le fichier n'a pas été envoyé.
            </div>
        <?php
        // Si tout est ok, alors le fichier est uploadé dans le bon dossier
        } 
        else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) { ?>
      
            <div class="alert alert-success text-center" role="alert">
            Le pokemon a été ajouté avec succès !
            </div>
        <?php
            $sqlQuery = "INSERT INTO `pokemon`(`numero`, `name`, `type1`, `type2`, `image`) VALUES (:numero, :name, :type1, :type2, :image)";
            $insertSQL = $db->prepare($sqlQuery);
            $insertSQL->execute([
            "numero" => $_POST['numeroPokemon'],
            "name" => $_POST['namePokemon'],
            "type1" => $_POST['type1Pokemon'],
            "type2" => $_POST['type2Pokemon'],
            "image" => 'img/' . basename($_FILES["fileToUpload"]["name"])
        ]);
        } else {
            echo " Erreur lors de l'envoi du fichier";
        } } }
?>

<!-- Editer Pokemon -->
<?php if (isset($_GET['editPokemon'])){ include 'includes/formPokemonModify.php'; ?>
<?php }
    if (isset($_POST['editButtonPokemon'])){ 
        $target_dir = "img/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // vérification si le fichier existe déjà
        if (file_exists($target_file)) {
            ?>
            <div class="alert alert-danger text-center" role="alert">
            Le fichier existe déjà.
            </div><br>
        <?php
        $uploadOk = 0;
        }
        // Vérification de la taille du fichier
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            ?>
            <div class="alert alert-danger text-center" role="alert">
            La taille du fichier est trop importante.
            </div><br>
        <?php

        $uploadOk = 0;
        }
        // Autorisation seulement de certain format de fichier
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) { ?>
            <div class="alert alert-danger text-center" role="alert">
            Seulement les fichiers JPG, JPEG, PNG et GIF sont autorisés
            </div><br>
        <?php
        
        $uploadOk = 0;
        }
        // Vérification si $upload n'est pas à 0 (envoie message d'erreur)
        if ($uploadOk == 0) { ?>
            <div class="alert alert-danger text-center" role="alert">
            Le fichier n'a pas été envoyé.
            </div>
        <?php
        // Si tout est ok, alors le fichier est uploadé dans le bon dossier
        } 
        else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) { ?>
      
            <div class="alert alert-success text-center" role="alert">
            Le pokemon a été modifié avec succès !
            </div>
        <?php
            $sqlUpdate = "UPDATE pokemon SET `id`= :id,`numero`= :numero,`name`= :name,`type1`= :type1,`type2`= :type2, `image` = :image WHERE numero = :numero2 ";
            $modifypokemon = $db->prepare($sqlUpdate);
            $modifypokemon->execute([
                "id" => $_POST["idPokemonModify"],
                "numero" => $_POST["numéroPokemonModify"],
                "name" => $_POST["namePokemonModify"],
                "type1" => $_POST["type1PokemonModify"],
                "type2" => $_POST["type2PokemonModify"],
                "numero2" => $_SESSION['pokemon']['numero'],
                "image" => 'img/' . basename($_FILES["fileToUpload"]["name"])
            ]);
        } 
        } } 
?>

<!-- Supprimer pokemon -->
<?php if (isset($_POST['deleteButtonPokemon'])){ 
    $deletePokemonImage = $_SESSION['pokemon']['image']; 
    unlink($deletePokemonImage);
    $sqlDelete = 'DELETE FROM `pokemon` WHERE numero = :numero';
    $deleteDresseur = $db->prepare($sqlDelete);
    $deleteDresseur->execute([
    'numero' => $_SESSION['pokemon']['numero']
    ]); ?>
        <div class="alert alert-success text-center" role="alert">
        Le Pokémon a été supprimé avec succès !
        </div>
<?php }
?>

<!-- Formulaire ajout Dresseur -->
<?php if (isset($_GET['addDresseur'])){ include 'includes/formDresseur.php';} ?>
<?php
if (isset($_POST['ajoutDresseur'])){
    $target_dir = "img/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
   // vérification si le fichier existe déjà
   if (file_exists($target_file)) {
    ?>
    <div class="alert alert-danger text-center" role="alert">
    Le fichier existe déjà.
    </div><br>
<?php
$uploadOk = 0;
}
// Vérification de la taille du fichier
if ($_FILES["fileToUpload"]["size"] > 500000) {
    ?>
    <div class="alert alert-danger text-center" role="alert">
    La taille du fichier est trop importante.
    </div><br>
<?php

$uploadOk = 0;
}
// Autorisation seulement de certain format de fichier
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) { ?>
    <div class="alert alert-danger text-center" role="alert">
    Seulement les fichiers JPG, JPEG, PNG et GIF sont autorisés
    </div><br>
<?php

$uploadOk = 0;
}
// Vérification si $upload n'est pas à 0 (envoie message d'erreur)
if ($uploadOk == 0) { ?>
    <div class="alert alert-danger text-center" role="alert">
    Le fichier n'a pas été envoyé.
    </div>
<?php
// Si tout est ok, alors le fichier est uploadé dans le bon dossier
} 
else {
if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) { ?>

    <div class="alert alert-success text-center" role="alert">
    Le dresseur a été ajouté avec succès !
    </div>
<?php
        $sqlQuery = "INSERT INTO `dresseur`(`dresseur`, `ville`, `type`, `badge`, `region`, `image`) VALUES (:dresseur, :ville, :type, :badge, :region, :image)";
        $insertSQL = $db->prepare($sqlQuery);
        $insertSQL->execute([
            "dresseur" => $_POST['nameDresseur'],
            "ville" => $_POST['nameVille'],
            "type" => $_POST['nameVille'],
            "badge" => $_POST['nameBadge'],
            "region" => $_POST['nameRegion'],
            "image" => 'img/' . basename($_FILES["fileToUpload"]["name"])
        ]);
    }}}
?>

<!-- editer dresseur -->
<?php 

        if (isset($_GET['editDresseur'])){ include 'includes/formDresseurModify.php'; } ?>

<?php       
        if (isset($_POST['editButtonDresseur'])){ 
            $target_dir = "img/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // vérification si le fichier existe déjà
        if (file_exists($target_file)) {
            ?>
            <div class="alert alert-danger text-center" role="alert">
            Le fichier existe déjà.
            </div><br>
        <?php
        $uploadOk = 0;
        }
        // Vérification de la taille du fichier
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            ?>
            <div class="alert alert-danger text-center" role="alert">
            La taille du fichier est trop importante.
            </div><br>
        <?php

        $uploadOk = 0;
        }
        // Autorisation seulement de certain format de fichier
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) { ?>
            <div class="alert alert-danger text-center" role="alert">
            Seulement les fichiers JPG, JPEG, PNG et GIF sont autorisés
            </div><br>
        <?php
        
        $uploadOk = 0;
        }
        // Vérification si $upload n'est pas à 0 (envoie message d'erreur)
        if ($uploadOk == 0) { ?>
            <div class="alert alert-danger text-center" role="alert">
            Le fichier n'a pas été envoyé.
            </div>
        <?php
        // Si tout est ok, alors le fichier est uploadé dans le bon dossier
        } 
        else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) { ?>
      
            <div class="alert alert-success text-center" role="alert">
            Le dresseur a été modifié avec succès !
            </div>
        <?php
                $sqlUpdate = "UPDATE dresseur SET `id`=:id,`ville`=:ville,`dresseur`=:dresseur,`type`=:type,`badge`=:badge,`region`=:region, `image` = :image WHERE dresseur = :dresseur2";
                $modifyDresseur = $db->prepare($sqlUpdate);
                $modifyDresseur->execute([
                'id' => $_POST['idDresseurModify'],
                "ville" => $_POST['nameVilleModify'],
                "dresseur" => $_POST['nameDresseurModify'],
                "type" => $_POST['typeDresseurModify'],
                "badge" => $_POST['nameBadgeModify'],
                "region" => $_POST['nameRegionModify'],
                "image" => 'img/' . basename($_FILES["fileToUpload"]["name"]),
                "dresseur2" => $_SESSION['dresseur']['dresseur']
                ]);
            }}



        } ?>

<!-- Supprimer dresseur -->
<?php
        if (isset($_POST['deleteButtonDresseur'])){ 
        $deleteDresseurImage = $_SESSION['Dresseur']['image']; 
        unlink($deleteDresseurImage);
            $sqlDelete = 'DELETE FROM `dresseur` WHERE dresseur= :dresseur';
            $deleteDresseur = $db->prepare($sqlDelete);
            $deleteDresseur->execute([
              'dresseur' => $_SESSION['dresseur']['dresseur']
            ]); ?>
        <div class="alert alert-sucess text-center" role="alert">
            Le dresseur a bien été supprimé
        </div>
        <?php }
?>

<!-- Recherche -->
<section class="container">
<div class="row justify-content-center">

<?php

if(isset($_GET['recherche'])){

    $recherche = htmlspecialchars($_GET['recherche']);
    $query = "SELECT * FROM pokemon WHERE `name` LIKE :search ORDER BY id;";
    $prepareRecherche = $db->prepare($query);
    $prepareRecherche->execute([
        'search' => '%' . $_GET['recherche'] . '%'
    ]);
    $fetch = $prepareRecherche->fetchALL();

    
    foreach ($fetch as  $value){ ?>
          <a class="text-decoration-none text-light" href="?idPokemon=<?php echo $value['id'] ?>"><div class="card bg-dark m-3 border-white text-center" style="width: 18rem;">
        <img src="<?php echo $value['image'] ?>" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">N°<?php echo $value['numero'] ?> <?php echo $value['name'] ?> </h5>
        </div>
        </div></a>
    <?php }

    $recherche = htmlspecialchars($_GET['recherche']);
    $query = "SELECT * FROM pokemon WHERE `numero` LIKE :search ORDER BY id;";
    $prepareRecherche = $db->prepare($query);
    $prepareRecherche->execute([
        'search' => '%' . $_GET['recherche'] . '%'
    ]);
    $fetch = $prepareRecherche->fetchALL();


    foreach ($fetch as  $value){ ?>
        <a class="text-decoration-none text-light" href="?idPokemon=<?php echo $value['id'] ?>"><div class="card bg-dark m-3 border-white text-center" style="width: 18rem;">
        <img src="<?php echo $value['image'] ?>" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">N°<?php echo $value['numero'] ?> <?php echo $value['name'] ?> </h5>
        </div>
        </div></a>
    <?php }

    $query2 = "SELECT * FROM dresseur WHERE `dresseur` LIKE :search2 ORDER BY id; ";
    $prepareRecherche = $db->prepare($query2);
    $prepareRecherche->execute([
        'search2' => '%' . $_GET['recherche'] . '%'
    ]);
    $fetch = $prepareRecherche->fetchALL();

    
    foreach ($fetch as  $value){ ?>
        <a class="text-decoration-none text-light" href="?dresseur=<?php echo $value['dresseur'] ?>"><div class="card bg-dark m-3 border-white text-center" style="width: 18rem;">
        <img src="<?php echo $value['image'] ?>" class="card-img-top col-6 m-auto" alt="...">
        <div class="card-body">
            <h5 class="card-title"><?php echo $value['dresseur'] ?> </h5>
        </div>
        </div></a>
    <?php }
}

?>

</div>
</section>


<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>