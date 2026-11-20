<?php 
    /**
     * Affichage de la partie monitoring
     */
?>

<h2>Monitoring</h2>

<table class="monitoring">
    <thead>
        <tr>
            <th>Titre</th>
            <th class="number">Vues</th>
            <th class="number">Commentaires</th>
            <th>Date de publication</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($articles as $article) : ?>
            <tr>
                <td><?= htmlspecialchars($article->getTitle()) ?></td>
                <td class="number"><?= $article->getViews() ?></td>
                <td class="number">
                    <a href="index.php?action=showComments&id=<?= $article->getId() ?>"><?= $article->getNbComments() ?></a>
                </td>
                <td><?= Utils::convertDateToFrenchFormat($article->getDateCreation()) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>