<?php

namespace App\views;

include_once __DIR__ . '/../../templates/head.html';
?>

<div class="m-4 bg-primary text-white">
    <h1>Liste des produits</h1>
</div>

<div class="card-body">
    <a class="btn btn-success mb-3" href="index.php?action=form">Ajouter un produit</a>
    <a class="btn btn-secondary mb-3" href="index.php?action=suppliers_list">Voir la liste des fournisseurs</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Description</th>
                <th>Prix</th>
                <th>Stock</th>
                <th>Fournisseur</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($produits as $p): ?>
            <tr>
                <td><?= htmlspecialchars($p['name']) ?></td>
                <td><?= htmlspecialchars($p['description'] ?? '') ?></td>
                <td><?= htmlspecialchars($p['price']) ?> €</td>
                <td><?= $p['stock'] ?? 'N/A'?></td>
                <td><?= htmlspecialchars($p['supplier'] ?? '') ?></td>
                <td>
                    <a class="btn btn-sm btn-primary" href="index.php?action=form&id=<?= $p['id_product'] ?>">Modifier</a>
                    <a class="btn btn-sm btn-danger" href="index.php?action=delete_product&id=<?= $p['id_product'] ?>">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>