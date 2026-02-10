<?php

namespace App\views;

include_once __DIR__ . '/../../templates/head.html';
?>

<div class="m-4 bg-primary text-white">
    <h1><?= isset($supplier) ? 'Modifier' : 'Ajouter' ?> un fournisseur</h1>
</div>

<div class="card-body">
    <form method="post" action="index.php?action=save_form_supplier">
        <input type="hidden" name="id" value="<?= $supplier['id_supplier'] ?? null ?>">

        <div class="mb-3 col-5">
            <label for="nom" class="form-label">Nom :</label>
            <input type="text" name="nom" id="nom" class="form-control" value="<?= $supplier['name'] ?? '' ?>" required>
        </div>

        <div class="mb-3 col-5">
            <label for="email" class="form-label">Email :</label>
            <input type="email" name="email" id="email" class="form-control" value="<?= $supplier['email'] ?? '' ?>">
        </div>

        <div class="mb-3 col-5">
            <label for="telephone" class="form-label">Téléphone :</label>
            <input type="text" name="telephone" id="telephone" class="form-control" value="<?= $supplier['phone'] ?? '' ?>">
        </div>

        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </div>
    </form>
</div>