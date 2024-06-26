<br><br>
<h1 class="display-3">Liste des pays</h1>
<br>
<button class="btn " onclick="afficherFormulaire('displayFormCountries')">Ouvrir/Fermer formulaire d'ajout</button>
<br><br>
<div id="displayFormCountries">
    <form action="<?= PATH ?>/Countries/newCountry" method="POST">

        <input type="text"  name="country" requiered placeholder="Nouveau pays ici" > <br><br>
        <select name="continent" requiered>
        <option value="" disabled  selected >Choisissez un continent</option>
            <?php foreach ($allContinents as $continent) : ?>
                <option value="<?= $continent['ID_CONTINENT'] ?>"><?= $continent['NOM_CONTINENT'] ?></option>
            <?php endforeach; ?>
        </select> <br><br>
        <button type="submit" class="btn btn-dark">Valider</button>
    </form>
    <br>
</div>

<!-- PAGINATION DU HAUT-->


<div class="pagination-container">
    <a href="<?= PATH ?>/countries/index/0" class="pagination-btn <?= ($page === null || $page < 1) ? 'disabled' : '' ?>"><i class="fa-solid fa-angles-left"></i></a>
    <a href="<?= PATH ?>/countries/index/<?= $page - 1 ?>" class="pagination-btn <?= ($page === null || $page < 1) ? 'disabled' : '' ?> "><i class="fa-solid fa-angle-left"></i></a>

    <div class="page-info">
        Page <?php echo @$page + 1; ?> sur <?php echo @$pages; ?>
    </div>

    <a href="<?= PATH ?>/countries/index/<?= $page + 1 ?>" class="pagination-btn <?= ($page + 2 > $pages) ? 'disabled' : '' ?>"><i class="fa-solid fa-angle-right"></i></a>
    <a href="<?= PATH ?>/countries/index/<?= $pages - 1 ?>" class="pagination-btn <?= ($page + 2 > $pages) ? 'disabled' : '' ?>"><i class="fa-solid fa-angles-right"></i></a>
</div> <br>
<!-- FIN PAGINATION DU HAUT  -->

<div class="table-container">
    <table class="table table-success table-hover">
        <tr>
            <th>Code</th>
            <th>Nom</th>
            <th>Continent</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($allCountries as $country) : ?>
            <tr>
                <td><?= $country['ID_PAYS'] ?></td>
                <td><?= $country['NOM_PAYS'] ?></td>
                <td><?= $country['NOM_CONTINENT'] ?></td>

                <td>
                    <a href="<?= PATH ?>/countries/edit/<?= $country['ID_PAYS'] ?>">
                        <button class='btn btn-warning btn-sm fas fa-pencil-alt fa-sm'></button>
                    </a>

                    <a onclick="return confirmDelete(
                    '<?= $country['NOM_PAYS'] ?>',
                    'deleteCountry',
                    'countries',
                    <?= $country['ID_PAYS']?>)">
                        <button class='btn btn-danger btn-sm fas fa-trash-alt fa-sm'></button>
                    </a>

                </td>
            </tr>
        <?php endforeach ?>

    </table>
</div>

<!-- PAGINATION DU BAS-->
<div class="pagination-container">
    <a href="<?= PATH ?>/countries/index/0" class="pagination-btn <?= ($page === null || $page < 1) ? 'disabled' : '' ?>"><i class="fa-solid fa-angles-left"></i></a>
    <a href="<?= PATH ?>/countries/index/<?= $page - 1 ?>" class="pagination-btn <?= ($page === null || $page < 1) ? 'disabled' : '' ?> "><i class="fa-solid fa-angle-left"></i></a>

    <div class="page-info">
        Page <?php echo @$page + 1; ?> sur <?php echo @$pages; ?>
    </div>

    <a href="<?= PATH ?>/countries/index/<?= $page + 1 ?>" class="pagination-btn <?= ($page + 2 > $pages) ? 'disabled' : '' ?>"><i class="fa-solid fa-angle-right"></i></a>
    <a href="<?= PATH ?>/countries/index/<?= $pages - 1 ?>" class="pagination-btn <?= ($page + 2 > $pages) ? 'disabled' : '' ?>"><i class="fa-solid fa-angles-right"></i></a>
</div> <br>

<!-- FIN PAGINATION DU BAS  -->