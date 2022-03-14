<?php 
ob_start(); 

if(!empty($_SESSION['alert'])) :
?>
<div class="alert alert-<?= $_SESSION['alert']['type'] ?>" role="alert">
    <?= $_SESSION['alert']['msg'] ?>
</div>
<?php 
unset($_SESSION['alert']);
endif; 
?>

<table class="table text-center">
    <tr class="table-dark">
        <th>Nom</th>
        <th>Prenom</th>
        <th>Sexe</th>
        <th>fonction</th>
        <th>Email</th>
        <th>Adresse</th>
        <th>Télephone</th>
        <th colspan="2">Actions</th>
    </tr>
    <?php 
        for($i=0;$i < count($personnels);$i++) : 
    ?>
            <tr>
                <td class="align-middle"><a href="<?= URL ?>personnels/l/<?= $personnels[$i]->getId(); ?>"><?= $personnels[$i]->getNom(); ?></a></td>
                <td class="align-middle"><?= $personnels[$i]->getPrenom(); ?></td>
                <td class="align-middle"><?= $personnels[$i]->getSexe(); ?></td>
                <td class="align-middle"><?= $personnels[$i]->getFonction(); ?></td>
                <td class="align-middle"><?= $personnels[$i]->getEmail(); ?></td>
                <td class="align-middle"><?= $personnels[$i]->getAdresse(); ?></td>
                <td class="align-middle"><?= $personnels[$i]->getTel(); ?></td>
                <td class="align-middle"><a href="<?= URL ?>personnels/m/<?= $personnels[$i]->getId(); ?>" class="btn btn-warning">Modifier</a></td>
                <td class="align-middle">
                    <form method="POST" action="<?= URL ?>personnels/s/<?= $personnels[$i]->getId(); ?>" onSubmit="return confirm('Voulez-vous vraiment supprimer le livre ?');">
                        <button class="btn btn-danger" type="submit">Supprimer</button>
                    </form>
                </td>
            </tr>
    <?php endfor; ?>
</table>
<a href="<?= URL ?>personnels/a" class="btn btn-success d-block">Ajouter</a>

<?php
$content = ob_get_clean();
$titre = "Les personnels de la boites";
require "template.php";
?>