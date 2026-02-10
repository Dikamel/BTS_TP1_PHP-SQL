<?php

namespace App\views;

include_once __DIR__ . '/../../templates/head.html';
?>

<div class="m-4 bg-secondary text-white">
    <h1 class="m-3"><?= isset($produit) ? 'Modifier' : 'Ajouter' ?> un produit</h1>
</div>

<div class="card-body">
    <form method="post" action="index.php?action=save">
        <input type="hidden" name="id" value="<?= $produit['id_product'] ?? null ?>">

        <!-- Nom du produit -->
        <div class="m-3">
            <div class="col-5">
                <label for="nom" class="form-label">Nom : *</label>
                <input type="text" name="nom" id="nom" class="form-control" value="<?= $produit['name'] ?? '' ?>"
                    required>
            </div>
        </div>


        <!-- Description du produit -->
        <div class="m-3">
            <div class="col-5">
                <label for="description" class="form-label">Description :</label>
                <textarea name="description" id="description" class="form-control"><?= $produit['description'] ?? ''
                                                                                    ?></textarea>
            </div>
        </div>


        <!-- Prix -->
        <div class="m-3">
            <div class="col-5">
                <label for="prix" class="form-label">Prix : *</label>
                <input type="number" id="prix" min="0" class="form-control" step="0.01" name="prix" value="<?= $produit['price']
                                                                                                        ?? '' ?>" required>
            </div>
        </div>

        <!-- Stock -->
        <div class="m-3">
            <div class="col-5">
                <label for="stock" class="form-label">Stock : </label>
                <input type="number" id="stock" class="form-control" step="1" min="0" name="stock" value="<?= $produit['stock']
                                                                                                        ?? '' ?>" required>
            </div>
        </div>

        <!-- Fournisseur -->
        <div class="m-3">
            <div class="col-5">
                <label for="supplier" class="form-label">Fournisseur : *</label>
                <select id="fournisseur" id="supplier" class="form-control" name="fournisseur" required>
                    <?php foreach ($suppliers as $s) : ?>
                        <option value="<?= $s['id_supplier'] ?>" <?= ($s['name'] == ($produit['supplier'] ?? 0)) ? 'selected' : '' ?>><?= $s['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <!-- Bouton submit -->
        <div class="'mt-6">
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </div>


    </form>
</div>