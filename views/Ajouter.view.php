<?php 
ob_start(); 
?>
      <form action="<?= URL ?>personnels/av" method="POST">
        <div class="container mt-5">
          
        
        <fieldset>
       <div>
          <label for="">Nom:</label>
            <input type="text" name="nom" id=""class="form-control">
          </div>

          <div>
          <label for="">Prenom</label>
            <input type="text" name="prenom" id=""class="form-control">
          </div>

          <div>
           <div class="form-group">
             <label for="">Sexe</label>
             <select class="form-control" name="sexe" id="">
               <option></option>
               <option name="Masculin">Masculin</option>
               <option  name="Feminin">Feminin</option>
             </select>
           </div>
          </div>

          <div>
          <label for="">Fonction :</label>
          <select class="form-control" name="fonction" id="">
               <option></option>
               <option value="directeur">Directeur</option>
               <option value="employer">Employer</option>
               <option value="technicien">Technicien de surface</option>
             </select>
          </div>
          <div>
          <label for="">Email</label>
            <input type="text" name="email" id=""class="form-control">
          </div>
          <div>
          <label for="">Adresse</label>
            <input type="text" name="adresse" id=""class="form-control">
          </div>
          <div>
          <label for="">Télephone</label>
            <input type="" name="tel" id=""class="form-control">
          </div>

          <div>
            </div>
            <div class="form-group">
             <br>
             <button type="submit" class="btn btn-success">Valider</button>
             
              <input type="submit"
                class="btn btn-danger" value="Supprimer">
            </div>
            
          </div>
        </fieldset>
      </form>

      
<?php
$content = ob_get_clean();
$titre = "Ajout d'un employer";
require "template.php";
?>