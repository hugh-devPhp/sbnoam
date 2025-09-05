<?php $this->load->view('template/front-end/haut_template', array("menu_actif" => $menu_actif)) ?>

<!--====== BREADCRUMB PART START ======-->
<?php $this->load->view('template/front-end/page_head', array("title" => $title, "menu_actif" => $menu_actif)) ?>

<!--====== BREADCRUMB PART END ======-->

<!--====== BLOG GRID SECTION START ======-->
<section class="blog-section pt-120 pb-120">
    <div class="container">
        <div class="row justify-content-center">
            <!-- Blog Sidebar -->
            <div class="col-lg-4 col-md-10 col-sm-10">
                <div class="sidebar">
                    <!-- Search Widget -->
                    <div class="widget search-widget mb-40">
                        <h5 class="widget-title">Rechercher un article</h5>
                        <form action="<?php echo base_url('blog/grid'); ?>" method="get">
                            <input type="text" name="keyword" placeholder="entrez un mot clé..." value="<?php echo isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : ''; ?>">
                            <button type="submit"><i class="far fa-search"></i></button>
                        </form>
                    </div>

                    <!-- Categories Widget -->
                    <div class="widget categories-widget mb-40">
                        <h5 class="widget-title">Catégories</h5>
                        <ul class="categories-list">
                            <?php if (!empty($categories)): ?>
                                <?php foreach ($categories as $cat): ?>
                                    <li>
                                        <a href="<?php echo base_url('blog/grid?category=' . urlencode($cat->category)); ?>">
                                            <?php echo htmlspecialchars($cat->category); ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <li>Aucune catégorie disponible</li>
                            <?php endif; ?>
                        </ul>
                    </div>

                    <!-- Recent Posts Widget -->
                    <div class="widget recent-posts-widget mb-40">
                        <h5 class="widget-title">Articles récents</h5>
                        <div class="recent-posts-list">
                            <?php if (!empty($recent_articles)): ?>
                                <?php foreach ($recent_articles as $recent): ?>
                                    <div class="single-recent-post">
                                        <div class="post-thumb">
                                            <img src="<?php echo base_url() ?>uploads/articles/<?php echo $recent->article_image; ?>" alt="<?php echo htmlspecialchars($recent->title); ?>">
                                        </div>
                                        <div class="post-content">
                                            <h6>
                                                <a href="<?php echo base_url('blog/detail/' . $recent->article_id); ?>">
                                                    <?php echo htmlspecialchars($recent->title); ?>
                                                </a>
                                            </h6>
                                            <span class="post-date">
                                                <?php echo date('d M, Y', strtotime($recent->create_at)); ?>
                                            </span>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <p>Aucun article récent</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Blog Grid Content -->
            <div class="col-lg-8 col-md-10">
                <div class="blog-content-wrapper">
                    <?php if ($total > 0): ?>
                        <div class="blog-top-info">
                            <p>Affichage 1–<?php echo count($articles_page); ?> sur <?php echo $total; ?> total</p>
                        </div>
                    <?php endif; ?>

                    <?php if (isset($keyword) && !empty($keyword) && empty($articles_page)): ?>
                        <div class="alert alert-info text-center" role="alert">
                            <i class="far fa-search"></i> Aucun article trouvé pour le mot-clé "<strong><?php echo htmlspecialchars($keyword); ?></strong>"
                        </div>
                    <?php endif; ?>

                    <div class="blog-grid-wrapper">
                        <div class="row">
                            <?php if (!empty($articles_page)): ?>
                                <?php foreach ($articles_page as $article): ?>
                                    <div class="col-lg-6 col-md-6">
                                        <article class="blog-grid-item">
                                            <div class="post-thumb">
                                                <img src="<?php echo base_url() ?>uploads/articles/<?php echo $article->article_image; ?>" alt="<?php echo htmlspecialchars($article->title); ?>">
                                                <div class="post-overlay">
                                                    <a href="<?php echo base_url('blog/detail/' . $article->article_id); ?>" class="read-more-btn">
                                                        <i class="far fa-arrow-right"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="post-content">
                                                <div class="post-meta">
                                                    <span class="post-date">
                                                        <i class="far fa-calendar"></i>
                                                        <?php echo date('d M, Y', strtotime($article->create_at)); ?>
                                                    </span>
                                                    <span class="post-category">
                                                        <i class="far fa-folder"></i>
                                                        <?php echo htmlspecialchars($article->category); ?>
                                                    </span>
                                                </div>
                                                <h4 class="post-title">
                                                    <a href="<?php echo base_url('blog/detail/' . $article->article_id); ?>">
                                                        <?php echo htmlspecialchars($article->title); ?>
                                                    </a>
                                                </h4>
                                                <div class="post-excerpt">
                                                    <?php 
                                                    $excerpt = strip_tags($article->article_content);
                                                    echo strlen($excerpt) > 150 ? substr($excerpt, 0, 150) . '...' : $excerpt;
                                                    ?>
                                                </div>
                                                <div class="post-footer">
                                                    <span class="post-author">
                                                        <i class="far fa-user"></i>
                                                        <?php echo htmlspecialchars($article->edit_pseudo); ?>
                                                    </span>
                                                    <?php if ($article->article_like > 0): ?>
                                                        <span class="post-likes">
                                                            <i class="far fa-heart"></i>
                                                            <?php echo $article->article_like; ?>
                                                        </span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <div class="col-12">
                                    <div class="no-posts">
                                        <p>Aucun article disponible pour le moment.</p>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Pagination -->
                    <?php if ($total > 0): ?>
                        <div class="pagination-wrap">
                            <?php echo $this->pagination->create_links(); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!--====== BLOG GRID SECTION END ======-->

<?php $this->load->view('template/front-end/bas_template') ?>
