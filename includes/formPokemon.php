<section class="container">
  <div class="row justify-content-center text-center">
    <form action="index.php" method='POST' enctype="multipart/form-data">

    <div class="col-12 mb-3">
        <label class="text-light col-12">Numéro du Pokémon : </label>
        <input class="text col-8" type="number" name="numeroPokemon" placeholder="Exemple : 151">
    </div>

    <div class="col-12 mb-3">
        <label class="text-light col-12">Nom du Pokémon :</label>
        <input class="text col-8" type="text" name="namePokemon"  placeholder="Bulbizarre">
    </div>
      

    <div class="col-12 mb-3">
        <label class="text-light col-12" >Type 1</label>
        <input class="text col-8" type="text" name="type1Pokemon"  placeholder="Exemple : Plante">   
    </div>

    <div class="col-12 mb-3">
        <label class="text-light col-12" >Type 2</label>
        <input class="text col-8" type="text" name="type2Pokemon"  placeholder="Poison">   
    </div>

    <div class="col-12 mb-3">   
        <label class="text-light col-12" >Image du Pokémon</label>
        <input class="text-light" type="file" name="fileToUpload">
    </div>
        
    <div class="col-12">
        <input type="submit" name='ajoutPokemon' value="Ajouter Pokemon">
    </div>
        
    </form>
  </div>
  
</section>