<?php $this->load->view('template/front-end/haut_template', array("menu_actif" => $menu_actif)) ?>

<!--====== BREADCRUMB PART START ======-->
<?php $this->load->view('template/front-end/page_head', array("title" => $title, "menu_actif" => $menu_actif)) ?>

<!--====== BREADCRUMB PART END ======-->

<!--====== BLOG DETAIL SECTION START ======-->
<section class="blog-detail-section pt-120 pb-120">
    <div class="container">
        <div class="row justify-content-center">
            <!-- Blog Detail Content -->
            <div class="col-lg-8 col-md-10">
                <div class="blog-detail-wrapper">
                    <?php if (!empty($article)): ?>
                        <article class="blog-detail-item">
                            <div class="post-thumb">
                                <img src="<?php echo base_url() ?>uploads/articles/<?php echo $article[0]['article_image']; ?>" alt="<?php echo htmlspecialchars($article[0]['title']); ?>">
                            </div>
                            <div class="post-content">
                                <div class="post-meta">
                                    <span class="post-date">
                                        <i class="far fa-calendar"></i>
                                        <?php echo date('d M, Y', strtotime($article[0]['create_at'])); ?>
                                    </span>
                                    <span class="post-category">
                                        <i class="far fa-folder"></i>
                                        <?php echo htmlspecialchars($article[0]['category']); ?>
                                    </span>
                                    <span class="post-author">
                                        <i class="far fa-user"></i>
                                        <?php echo htmlspecialchars($article[0]['edit_pseudo']); ?>
                                    </span>
                                    <?php if ($article[0]['article_like'] > 0): ?>
                                        <span class="post-likes">
                                            <i class="far fa-heart"></i>
                                            <?php echo $article[0]['article_like']; ?>
                                        </span>
                                    <?php endif; ?>
                                </div>
                                <h1 class="post-title">
                                    <?php echo htmlspecialchars($article[0]['title']); ?>
                                </h1>
                                <div class="post-content-text">
                                    <?php echo $article[0]['article_content']; ?>
                                </div>
                                
                                <!-- Article Footer -->
                                <div class="post-footer">
                                    <div class="post-tags">
                                        <h5>Tags:</h5>
                                        <a href="<?php echo base_url('blog?category=' . urlencode($article[0]['category'])); ?>">
                                            <?php echo htmlspecialchars($article[0]['category']); ?>
                                        </a>
                                    </div>
                                    <div class="post-share">
                                        <h5>Partager:</h5>
                                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(current_url()); ?>" target="_blank">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                        <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(current_url()); ?>&text=<?php echo urlencode($article[0]['title']); ?>" target="_blank">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                        <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo urlencode(current_url()); ?>" target="_blank">
                                            <i class="fab fa-linkedin-in"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </article>

                        <!-- Related Articles -->
                        <?php if (!empty($related_articles)): ?>
                            <div class="related-articles">
                                <h3>Articles similaires</h3>
                                <div class="row">
                                    <?php foreach ($related_articles as $related): ?>
                                        <div class="col-lg-4 col-md-6">
                                            <article class="related-article-item">
                                                <div class="post-thumb">
                                                    <img src="<?php echo base_url() ?>uploads/articles/<?php echo $related->article_image; ?>" alt="<?php echo htmlspecialchars($related->title); ?>">
                                                </div>
                                                <div class="post-content">
                                                    <h5>
                                                        <a href="<?php echo base_url('blog/detail/' . $related->article_id); ?>">
                                                            <?php echo htmlspecialchars($related->title); ?>
                                                        </a>
                                                    </h5>
                                                    <span class="post-date">
                                                        <?php echo date('d M, Y', strtotime($related->create_at)); ?>
                                                    </span>
                                                </div>
                                            </article>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php else: ?>
                        <div class="no-article">
                            <p>Article non trouvé.</p>
                            <a href="<?php echo base_url('blog'); ?>" class="btn btn-primary">Retour au blog</a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Blog Sidebar -->
            <div class="col-lg-4 col-md-10 col-sm-10">
                <div class="sidebar">
                    <!-- Search Widget -->
                    <div class="widget search-widget mb-40">
                        <h5 class="widget-title">Rechercher un article</h5>
                        <form action="<?php echo base_url('blog'); ?>" method="get">
                            <input type="text" name="keyword" placeholder="entrez un mot clé...">
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
                                        <a href="<?php echo base_url('blog?category=' . urlencode($cat->category)); ?>">
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
        </div>
    </div>
</section>
<!--====== BLOG DETAIL SECTION END ======-->

<?php $this->load->view('template/front-end/bas_template') ?>
