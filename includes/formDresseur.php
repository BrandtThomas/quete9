<section class="container">
  <div class="row justify-content-center text-center">
    <form action="index.php" method='POST' enctype="multipart/form-data">

    <div class="col-12 mb-3">
        <label class="text-light col-12">Nom du dresseur : </label>
        <input class="text col-8" type="text" name="nameDresseur" placeholder="Exemple : Ondine">
    </div>

    <div class="col-12 mb-3">
        <label class="text-light col-12">Ville :</label>
        <input class="text col-8" type="text" name="nameVille"  placeholder="Exemple : Azuria">
    </div>
      

    <div class="col-12 mb-3">
        <label class="text-light col-12" >Type</label>
        <input class="text col-8" type="text" name="typeDresseur"  placeholder="Exemple : Eau">   
    </div>

    <div class="col-12 mb-3">
        <label class="text-light col-12" >Badge</label>
        <input class="text col-8" type="text" name="nameBadge"  placeholder="Exemple : Badge Cascade">   
    </div>

    <div class="row justify-content-center my-2">
        <div class="form-check mx-2">
            <input class="form-check-input" type="radio" name="nameRegion" value="johto" checked>
            <label class="form-check-label  text-light">
                Johto
            </label>
            </div>
            <div class="form-check mx-2">
            <input class="form-check-input" type="radio" name="nameRegion"  value="kanto">
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
        <input type="submit" name='ajoutDresseur' value="Ajouter dresseur">
    </div>
        
    </form>
  </div>
  
</section>
