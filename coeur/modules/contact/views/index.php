
<?php $this->load->view('template/front-end/haut_template', array("title"=>$menu_actif))?>
<!-- ========== END HEADER ========== -->
<?php $this->load->view('template/front-end/page_head', array("title"=>$title, "menu_actif"=>$menu_actif))?>

<!-- ========== MAIN CONTENT ========== -->
    <!--====== CONTACT PART START ======-->
    <section class="contact-part pt-115 pb-115">
        <div class="container">
            <!-- Contact Info -->
            <div class="contact-info">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-sm-6 col-10">
                        <div class="info-box">
                            <div class="icon">
                                <i class="flaticon-home"></i>
                            </div>
                            <div class="desc">
                                <h4>Adresse</h4>
                                <p><?php echo $infos['localisation_info'] ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-10">
                        <div class="info-box">
                            <div class="icon">
                                <i class="flaticon-phone"></i>
                            </div>
                            <div class="desc">
                                <h4>Phone Number</h4>
                                <p><?php echo $infos['contact1_info'] ?><br> <?php echo $infos['contact2_info'] ?></p>
                                <br>
                                <p></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-10">
                        <div class="info-box">
                            <div class="icon">
                                <i class="flaticon-message"></i>
                            </div>
                            <div class="desc">
                                <h4>Email Address</h4>
                                <p><?php echo $infos['email_info'] ?> </p>
                                <br><p></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="contact-form">
                <form class="form_validate ajax_submit form_alert" action="<?php echo base_url()?>contact/message" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group mb-30">
                                <span class="icon"><i class="far fa-user"></i></span>
                                <input type="text" placeholder="Nom & Prénoms" name="name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-30">
                                <span class="icon"><i class="far fa-envelope"></i></span>
                                <input type="email" placeholder="Adresse email" name="email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-30">
                                <span class="icon"><i class="far fa-phone"></i></span>
                                <input type="text" placeholder="Telephone" name="phone" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-30">
                                <span class="icon"><i class="far fa-book"></i></span>
                                <input type="text" placeholder="Objet du message" name="subject">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-group textarea mb-30">
                                <span class="icon"><i class="far fa-pen"></i></span>
                                <textarea placeholder="Entrez votre message" name="message"></textarea>
                            </div>
                        </div>
                        <div class="col-12 text-center">
                            <button type="submit" class="main-btn btn-filled">Envoyez</button>
                            <div class="server_response w-100 mt-3">
                                <?php
                                $error = $this->session->flashdata('error');
                                if(isset($error) && !empty($error)){
                                    ?>
                                    <div class="alert alert-danger">
                                        <span><?php echo $error; ?></span>
                                    </div>
                                    <?php
                                }
                                ?>
                                <?php
                                $success = $this->session->flashdata('success');
                                if(isset($success) && !empty($success)){
                                    ?>
                                    <div class="alert alert-success">
                                        <span><?php echo $success; ?></span>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!--====== CONTACT PART END ======-->


<!-- ========== END MAIN CONTENT ========== -->


<?php $this->load->view('template/front-end/bas_template')?>