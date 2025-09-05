<?php
// Charger le modèle pour récupérer les articles de blog
$this->load->model('administration/article_model');
$recent_blog_articles = $this->article_model->get_recent_blog_articles('app_blog_article', 4);
?>

<section class="pt-115 pb-115 blog-style-2">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-8 col-sm-7">
                <div class="section-title">
                    <span class="title-tag">Blog</span>
                    <h2>Fil d'actualité</h2>
                </div>
            </div>
            <div class="col-lg-6 col-md-4 col-sm-5 d-none d-sm-block">
                <div class="latest-post-arrow arrow-style text-right">
                </div>
            </div>
        </div>
        <!-- Blog post loop -->
        <div class="row no-gutters latest-post-slider mt-80">
            <?php if (!empty($recent_blog_articles)): ?>
                <?php foreach ($recent_blog_articles as $article): ?>
                    <div class="col-lg-12">
                        <article class="blog-post" style="background-image: url('<?php echo base_url() ?>uploads/articles/<?php echo $article->article_image; ?>');">
                            <div class="blog-data">
                                <div class="post-date">
                                    <?php echo date('d M, Y', strtotime($article->create_at)); ?>
                                </div>
                                <h3 class="post-title">
                                    <a href="<?php echo base_url('blog/detail/' . $article->article_id); ?>">
                                        <?php echo htmlspecialchars($article->title); ?>
                                    </a>
                                </h3>
                                <a href="<?php echo base_url('blog/detail/' . $article->article_id); ?>" class="post-link">
                                    <span>Lecture</span>
                                </a>
                            </div>
                            <a href="<?php echo base_url('blog/detail/' . $article->article_id); ?>"></a>
                        </article>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <!-- Fallback content if no blog articles -->
                <div class="col-lg-12">
                    <article class="blog-post" style="background-image: url('<?php echo base_url()?>assets/front-end/img/blog/blog-1.png');">
                        <div class="blog-data">
                            <div class="post-date">
                                15 Avril, 2024
                            </div>
                            <h3 class="post-title"><a href="#">Accessoires rubis sur rose et pierres précieuses bleues.</a></h3>
                            <a href="blog-details.html" class="post-link"><span>Lecture</span></a>
                        </div>
                        <a href="blog-details.html"></a>
                    </article>
                </div>
                <div class="col-lg-12">
                    <article class="blog-post" style="background-image: url('<?php echo base_url()?>assets/front-end/img/blog/blog-2.png');">
                        <div class="blog-data">
                            <div class="post-date">
                                20 Avril, 2024
                            </div>
                            <h3 class="post-title"><a href="#">Des ensembles de bijoux assortis à vos vêtements d'extérieur.</a></h3>
                            <a href="blog-details.html" class="post-link"><span>Lecture</span></a>
                        </div>
                        <a href="blog-details.html"></a>
                    </article>
                </div>
                <div class="col-lg-12">
                    <article class="blog-post" style="background-image: url('<?php echo base_url()?>assets/front-end/img/blog/blog-3.png');">
                        <div class="blog-data">
                            <div class="post-date">
                                01 Mai, 2024
                            </div>
                            <h3 class="post-title"><a href="#">Nouvelle collection rétro de pendentifs et ensembles de bagues.</a></h3>
                            <a href="blog-details.html" class="post-link"><span>Lecture</span></a>
                        </div>
                        <a href="blog-details.html"></a>
                    </article>
                </div>
                <div class="col-lg-12">
                    <article class="blog-post" style="background-image: url('<?php echo base_url()?>assets/front-end/img/blog/blog-4.png');">
                        <div class="blog-data">
                            <div class="post-date">
                                06 Mai, 2024
                            </div>
                            <h3 class="post-title"><a href="#">
                                    Ensembles d'alliances spéciaux pour elle et lui.</a></h3>
                            <a href="blog-details.html" class="post-link"><span>Lecture</span></a>
                        </div>
                        <a href="blog-details.html"></a>
                    </article>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
