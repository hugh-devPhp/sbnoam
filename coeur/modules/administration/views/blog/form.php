<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?php echo ($action == 'edit') ? 'Editer' : 'Ajouter'; ?> un article</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/css/style.css'); ?>">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4"><?php echo ($action == 'edit') ? 'Editer' : 'Ajouter'; ?> un article de blog</h2>
    <?php if (!empty($upload_error)): ?>
        <div class="alert alert-danger"><?php echo $upload_error; ?></div>
    <?php endif; ?>
    <form method="post" enctype="multipart/form-data" action="<?php echo base_url('administration/blog/save_article_blog'); ?>">
        <?php if ($action == 'edit' && !empty($article[0]['article_id'])): ?>
            <input type="hidden" name="article_id" value="<?php echo $article[0]['article_id']; ?>">
        <?php endif; ?>
        <div class="mb-3">
            <label for="title" class="form-label">Titre</label>
            <input type="text" class="form-control" id="title" name="title" value="<?php echo set_value('title', $action == 'edit' ? $article[0]['title'] : ''); ?>" required>
        </div>
        <div class="mb-3">
            <label for="article_content" class="form-label">Contenu</label>
            <textarea class="form-control" id="article_content" name="article_content" rows="8" required><?php echo set_value('article_content', $action == 'edit' ? $article[0]['article_content'] : ''); ?></textarea>
        </div>
        <div class="mb-3">
            <label for="edit_pseudo" class="form-label">Auteur</label>
            <input type="text" class="form-control" id="edit_pseudo" name="edit_pseudo" value="<?php echo set_value('edit_pseudo', $action == 'edit' ? $article[0]['edit_pseudo'] : ''); ?>" required>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Catégorie</label>
            <input type="text" class="form-control" id="category" name="category" value="<?php echo set_value('category', $action == 'edit' ? $article[0]['category'] : ''); ?>" required>
        </div>
        <div class="mb-3">
            <label for="etat" class="form-label">Etat</label>
            <select class="form-control" id="etat" name="etat" required>
                <option value="1" <?php echo set_select('etat', '1', ($action == 'edit' && $article[0]['etat'] == 1)); ?>>Publié</option>
                <option value="0" <?php echo set_select('etat', '0', ($action == 'edit' && $article[0]['etat'] == 0)); ?>>Brouillon</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="article_like" class="form-label">Likes</label>
            <input type="number" class="form-control" id="article_like" name="article_like" value="<?php echo set_value('article_like', $action == 'edit' ? $article[0]['article_like'] : 0); ?>">
        </div>
        <div class="mb-3">
            <label for="article_image" class="form-label">Image principale</label>
            <input type="file" class="form-control" id="article_image" name="article_image" accept="image/*">
            <?php if ($action == 'edit' && !empty($article[0]['article_image'])): ?>
                <div class="mt-2">
                    <img src="<?php echo base_url('uploads/articles/' . $article[0]['article_image']); ?>" alt="Image actuelle" style="max-width: 200px;">
                </div>
            <?php endif; ?>
        </div>
        <button type="submit" class="btn btn-success"><?php echo ($action == 'edit') ? 'Mettre à jour' : 'Ajouter'; ?></button>
        <a href="<?php echo base_url('administration/blog'); ?>" class="btn btn-secondary">Annuler</a>
    </form>
</div>
</body>
</html> 