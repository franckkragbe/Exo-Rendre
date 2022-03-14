<?php 
ob_start(); 
?>
      <form action="<?= URL ?>personnels/mv" method="POST">
        <div class="container mt-5">
          
        
        <fieldset>
       <div>
          <label for="">Nom:</label>
            <input type="text" name="nom" id=""class="form-control" value="<?= $personnel->getNom() ?>">
          </div>

          <div>
          <label for="">Prenom</label>
            <input type="text" name="prenom" id=""class="form-control"  value="<?= $personnel->getPrenom() ?>">
          </div>

          <div>
           <div class="form-group">
             <label for="">Sexe</label>
             <select class="form-control" name="sexe" id="" <?= $personnel->getSexe() ?>>
               <option></option>
               <option name="Masculin"  value="<?= $personnel->getSexe() ?>">Masculin</option>
               <option  name="Feminin"  value="<?= $personnel->getSexe() ?>">Feminin</option>
             </select>
           </div>
          </div>

          <div>
          <label for="">Fonction :</label>
          <select class="form-control" name="fonction" id="">
               <option></option>
               <option value="<?= $personnel->getFonction() == 'Directeur' ?>">Directeur</option>
               <option value="<?= $personnel->getFonction() == 'employer' ?>">Employer</option>
               <option value="<?= $personnel->getFonction() == 'technicien' ?>">Technicien de surface</option>
             </select>
          </div>
          <div>
          <label for="">Email</label>
            <input type="text" name="email" id=""class="form-control"  value="<?= $personnel->getEmail() ?>">
          </div>
          <div>
          <label for="">Adresse</label>
            <input type="text" name="adresse" id=""class="form-control"  value="<?= $personnel->getAdresse() ?>">
          </div>
          <div>
          <label for="">Télephone</label>
            <input type="" name="tel" id=""class="form-control"  value="<?= $personnel->getTel() ?> ">
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