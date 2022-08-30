<section class="container">
                <h2 class="text-light text-center">Modifier le dresseur</h2>
  <div class="row justify-content-center text-center">
    <form action="index.php" method='POST' enctype="multipart/form-data">

    <div class="col-12 mb-3">
        <label class="text-light col-12">ID du dresseur : </label>
        <input class="text col-8" type="text" name="idDresseurModify" value="<?php echo $_SESSION['dresseur']['id']; ?>">
    </div>

    <div class="col-12 mb-3">
        <label class="text-light col-12">Nom du dresseur : </label>
        <input class="text col-8" type="text" name="nameDresseurModify" value="<?php echo $_SESSION['dresseur']['dresseur']; ?>">
    </div>

    <div class="col-12 mb-3">
        <label class="text-light col-12">Ville :</label>
        <input class="text col-8" type="text" name="nameVilleModify" value="<?php echo $_SESSION['dresseur']['ville']; ?>">
    </div>
      

    <div class="col-12 mb-3">
        <label class="text-light col-12" >Type</label>
        <input class="text col-8" type="text" name="typeDresseurModify" value="<?php echo $_SESSION['dresseur']['type']; ?>">   
    </div>

    <div class="col-12 mb-3">
        <label class="text-light col-12" >Badge</label>
        <input class="text col-8" type="text" name="nameBadgeModify" value="<?php echo $_SESSION['dresseur']['badge']; ?>">   
    </div>

    <div class="row justify-content-center my-2">
        <div class="form-check mx-2">
            <input class="form-check-input" type="radio" name="nameRegionModify" value="johto" checked>
            <label class="form-check-label  text-light">
                Johto
            </label>
            </div>
            <div class="form-check mx-2">
            <input class="form-check-input" type="radio" name="nameRegionModify"  value="kanto">
            <label class="form-check-label  text-light">
                Kanto
            </label>
            </div>
    </div>

    <div class="col-12 mb-3">   
        <label class="text-light col-12" >Image du champion</label>
        <input class="text-light" type="file" name="fileToUpload">
    </div>

        
    <div class="col-12">
        <input type="submit" name='editButtonDresseur' value="Editer le dresseur">
    </div>
        
    </form>
  </div>
  
</section> 