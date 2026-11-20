<?php 
    /**
     * Affichage des commentaires d'un article
     */
?>

<a class="backLink" href="index.php?action=monitoring">← Retour au monitoring</a>

<h2>Commentaires de « <?= htmlspecialchars($article->getTitle()) ?> »</h2>

<?php if ($message) { ?>
    <p class="successMessage"><?= htmlspecialchars($message) ?></p>
<?php } ?>

<?php if (empty($comments)) { ?>
    <p class="info">Aucun commentaire pour cet article.</p>
<?php } else { ?>
    <table class="monitoring">
        <thead>
            <tr>
                <th>Pseudo</th>
                <th>Commentaire</th>
                <th>Date</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($comments as $comment) { ?>
                <tr>
                    <td><?= htmlspecialchars($comment->getPseudo()) ?></td>
                    <td><?= htmlspecialchars($comment->getContent()) ?></td>
                    <td><?= Utils::convertDateToFrenchFormat($comment->getDateCreation()) ?></td>
                    <td>
                        <a class="submit"
                           href="index.php?action=deleteComment&id=<?= $comment->getId() ?>"
                           <?= Utils::askConfirmation("Êtes-vous sûr de vouloir supprimer ce commentaire ?") ?>>
                            Supprimer
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
<?php } ?>