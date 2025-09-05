<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin - Blog</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/css/style.css'); ?>">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Gestion des articles de blog</h2>
    <a href="<?php echo base_url('admin_blog/add'); ?>" class="btn btn-primary mb-3">Ajouter un article</a>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titre</th>
                <th>Auteur</th>
                <th>Catégorie</th>
                <th>Etat</th>
                <th>Date création</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php if (!empty($articles)): ?>
            <?php foreach ($articles as $article): ?>
                <tr>
                    <td><?php echo $article->article_id; ?></td>
                    <td><?php echo htmlspecialchars($article->title); ?></td>
                    <td><?php echo htmlspecialchars($article->edit_pseudo); ?></td>
                    <td><?php echo htmlspecialchars($article->category); ?></td>
                    <td><?php echo $article->etat == 1 ? '<span class="badge bg-success">Publié</span>' : '<span class="badge bg-secondary">Brouillon</span>'; ?></td>
                    <td><?php echo date('d/m/Y', strtotime($article->create_at)); ?></td>
                    <td>
                        <a href="<?php echo base_url('admin_blog/edit/' . $article->article_id); ?>" class="btn btn-sm btn-warning">Editer</a>
                        <a href="<?php echo base_url('admin_blog/delete/' . $article->article_id); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Supprimer cet article ?');">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="7" class="text-center">Aucun article trouvé.</td></tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>
</body>
</html> 