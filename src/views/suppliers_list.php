<?php

namespace App\views;

include_once __DIR__ . '/../../templates/head.html';
?>

<div class="m-4 bg-primary text-white">
    <h1>Liste des fournisseurs</h1>
</div>

<div class="card-body">
    <a class="btn btn-success mb-3" href="index.php?action=supplier_form">Ajouter un fournisseur</a>
    <a class="btn btn-secondary mb-3" href="index.php?action=products_list">Voir la liste des produits</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Email</th>
                <th>Téléphone</th>
                <th>Nb de produits</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($suppliers as $s): ?>
            <tr>
                <td><?= htmlspecialchars($s['name']) ?></td>
                <td><?= htmlspecialchars($s['email'] ?? '') ?></td>
                <td><?= htmlspecialchars($s['phone'] ?? '') ?></td>
                <td><?= htmlspecialchars(($s['nb_products']) ?? 'N/A') ?></td>
                <td>
                    <a class="btn btn-sm btn-primary" href="index.php?action=supplier_form&id=<?= $s['id_supplier'] ?>">Modifier</a>
                    <a class="btn btn-sm btn-danger" href="index.php?action=delete_supplier&id=<?= $s['id_supplier'] ?>">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>