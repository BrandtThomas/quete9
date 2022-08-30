<section class="container">
                <h2 class="text-light text-center">Modifier le Pokemon</h2>
  <div class="row justify-content-center text-center">
    <form action="index.php" method='POST' enctype="multipart/form-data">

    <div class="col-12 mb-3">
        <label class="text-light col-12">ID du Pokémon : </label>
        <input class="text col-8" type="text" name="idPokemonModify" value="<?php echo $_SESSION['pokemon']['id']; ?>">
    </div>

    <div class="col-12 mb-3">
        <label class="text-light col-12">Numéro du Pokémon : </label>
        <input class="text col-8" type="text" name="numéroPokemonModify" value="<?php echo $_SESSION['pokemon']['numero']; ?>">
    </div>

    <div class="col-12 mb-3">
        <label class="text-light col-12">Nom du Pokémon : </label>
        <input class="text col-8" type="text" name="namePokemonModify" value="<?php echo $_SESSION['pokemon']['name']; ?>">
    </div>

    <div class="col-12 mb-3">
        <label class="text-light col-12">Type 1 :</label>
        <input class="text col-8" type="text" name="type1PokemonModify" value="<?php echo $_SESSION['pokemon']['type1']; ?>">
    </div>
      

    <div class="col-12 mb-3">
        <label class="text-light col-12" >Type 2</label>
        <input class="text col-8" type="text" name="type2PokemonModify" value="<?php echo $_SESSION['pokemon']['type2']; ?>">   
    </div>

    <div class="col-12 mb-3">   
        <label class="text-light col-12" >Image du champion</label>
        <input class="text-light" type="file" name="fileToUpload">
    </div>
        
    <div class="col-12">
        <input type="submit" name='editButtonPokemon' value="Editer le Pokémon">
    </div>
        
    </form>
  </div>
  
</section> 
        