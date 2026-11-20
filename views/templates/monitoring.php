<?php 
    /**
     * Affichage de la partie monitoring
     */
?>

<h2>Monitoring</h2>

<table class="monitoring">
    <thead>
        <tr>
            <?php
                $columns = [
                    'title' => 'Titre',
                    'views' => 'Vues',
                    'comments' => 'Commentaires',
                    'date' => 'Date de publication',
                ];

                foreach ($columns as $column => $label) {
                    $isActive = ($sort === $column);
                    $nextOrder = ($isActive && $order === 'asc') ? 'desc' : 'asc';
                    $arrow = '';
                    if ($isActive) {
                        $arrow = $order === 'asc' ? '↑' : '↓';
                    }

                    $class = in_array($column, ['views', 'comments']) ? 'number' : '';

            ?>
                <th class="<?= $class ?>">
                    <a href="index.php?action=monitoring&sort=<?= $column ?>&order=<?= $nextOrder ?>"><?= $label . $arrow ?></a>
                </th>   
            <?php } ?>
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