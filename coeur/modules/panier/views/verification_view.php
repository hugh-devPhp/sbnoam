<div class="container">
  <div class="mb-5">
    <h1 class="text-center">Verification</h1>
  </div>

  <form action="<?php echo base_url()?>panier/commande" method="post" id="form_commander">
    <div class="row">
      <div class="col-lg-5 order-lg-2 mb-7 mb-lg-0">
        <div class="pl-lg-3 ">
          <div class="bg-gray-1 rounded-lg">
            <!-- Order Summary -->
            <div class="p-4 mb-4 checkout-table">
              <!-- Title -->
              <div class="border-bottom border-color-1 mb-5">
                <h3 class="section-title mb-0 pb-2 font-size-25">Votre Commande</h3>
              </div>
              <!-- End Title -->

              <!-- Product Content -->
              <table class="table">
                <thead>
                <tr>
                  <th class="product-name">Produit</th>
                  <th class="product-total">Total</th>
                </tr>
                </thead>
                <tbody>
                <?php if(!empty($articles)){
                  $sub_total = 0;
                  foreach ($articles as $article){
                    if((int)$article['prix_promo']>0){ $prix =  $article['prix_promo']; }else{ $prix = $article['prix']; }
                    ?>
                    <tr class="cart_item">
                      <td><?php echo $article['designation']; ?>&nbsp;<strong class="product-quantity">× <?php echo $article['qty']; ?></strong></td>
                      <td><?php $sub_total += (int)$article['qty'] * (int)$prix; echo (int)$article['qty'] * (int)$prix;?></td>
                    </tr>
                  <?php  }
                }?>

                </tbody>
                <tfoot>
                <tr>
                  <th>Total</th>
                  <td><strong><?php echo $sub_total; ?></strong></td>
                </tr>
                </tfoot>
              </table>
              <!-- End Product Content -->
              <div class="border-top border-width-3 border-color-1 pt-3 mb-3">
                <!-- Basics Accordion -->
                <div id="basicsAccordion1">

                  <!-- Card -->
                  <div class="border-bottom border-color-1 border-dotted-bottom">
                    <div class="p-3" id="basicsHeadingThree">
                      <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="thirdstylishRadio1" name="mode_livraison" value="à domicile">
                        <label class="custom-control-label form-label" for="thirdstylishRadio1"
                               data-toggle="collapse"
                               data-target="#basicsCollapseThree"
                               aria-expanded="false"
                               aria-controls="basicsCollapseThree">
                          Livraison à domicile
                        </label>
                      </div>
                    </div>

                  </div>
                  <!-- End Card -->

                  <!-- Card -->
                  <div class="border-bottom border-color-1 border-dotted-bottom">
                    <div class="p-3" id="basicsHeadingFour">
                      <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="FourstylishRadio1" name="mode_livraison" value="en boutique" checked>
                        <label class="custom-control-label form-label" for="FourstylishRadio1"
                               data-toggle="collapse"
                               data-target="#basicsCollapseFour"
                               aria-expanded="false"
                               aria-controls="basicsCollapseFour">
                          Recuperation en boutique
                        </label>
                      </div>
                    </div>
                  </div>
                  <!-- End Card -->
                </div>
                <!-- End Basics Accordion -->
              </div>
<!--              <div class="form-group d-flex align-items-center justify-content-between px-3 mb-5">-->
<!--                <div class="form-check">-->
<!--                  <input class="form-check-input" type="checkbox" value="" id="defaultCheck10" required-->
<!--                         data-msg="Please agree terms and conditions."-->
<!--                         data-error-class="u-has-error"-->
<!--                         data-success-class="u-has-success">-->
<!--                  <label class="form-check-label form-label" for="defaultCheck10">-->
<!--                    J’ai Lu Et J’accepte Les <a href="#" class="text-blue">Conditions D’utilisation </a> Du Site Web-->
<!--                    <span class="text-danger">*</span>-->
<!--                  </label>-->
<!--                </div>-->
<!--              </div>-->
              <button type="submit" id="command"  class="btn btn-primary-dark-w btn-block btn-pill font-size-20 mb-3 py-3">Commander</button>
            </div>
            <!-- End Order Summary -->
          </div>
        </div>
      </div>

      <div class="col-lg-7 order-lg-1">
        <div class="pb-7 mb-7">
          <!-- Title -->
          <div class="border-bottom border-color-1 mb-5">
            <h3 class="section-title mb-0 pb-2 font-size-25">Détails de facturation</h3>
          </div>
          <!-- End Title -->

          <!-- Billing Form -->
          <div class="row">
            <div class="col-md-12">
              <!-- Input -->
              <div class="js-form-message mb-6">
                <label class="form-label">
                  Nom & Prenoms
                  <span class="text-danger">*</span>
                </label>
                <input   type="text" class="form-control" name="nom_complet" placeholder="Jack" value="<?php if(isset($client['nom_complet_client'])){ echo $client['nom_complet_client']; } ?>" aria-label="Jack" required >
              </div>
              <!-- End Input -->
            </div>

            <div class="w-100"></div>

            <div class="col-md-12">
              <!-- Input -->
              <div class="js-form-message mb-6">
                <label class="form-label">
                  Ville
                  <span class="text-danger">*</span>
                </label>
                <input type="text" class="form-control" name="ville" value="<?php if(isset($client['ville_client'])){ echo $client['ville_client']; } ?>" placeholder="Ville" aria-label="London" required="" data-msg="Please enter a valid address." data-error-class="u-has-error" data-success-class="u-has-success" autocomplete="off">
              </div>
              <!-- End Input -->
            </div>

            <div class="col-md-6">
              <!-- Input -->
              <div class="js-form-message mb-6">
                <label class="form-label">
                  Commune
                  <span class="text-danger">*</span>
                </label>
                <input type="text" class="form-control" name="commune" value="<?php if(isset($client['commune_client'])){ echo $client['commune_client']; } ?>" placeholder="Commune" aria-label="London" required="" data-msg="Please enter a valid address." data-error-class="u-has-error" data-success-class="u-has-success" autocomplete="off">
              </div>
              <!-- End Input -->
            </div>

            <div class="col-md-6">
              <!-- Input -->
              <div class="js-form-message mb-6">
                <label class="form-label">
                  Quartier
                  <span class="text-danger">*</span>
                </label>
                <input type="text" class="form-control" name="quartier" value="<?php if(isset($client['quartier_client'])){ echo $client['quartier_client']; } ?>" placeholder="Kingston City" aria-label="Kingston City" required="" data-msg="Please enter a postcode or zip code." data-error-class="u-has-error" data-success-class="u-has-success">
              </div>
              <!-- End Input -->
            </div>

            <div class="w-100"></div>

            <div class="col-md-6">
              <!-- Input -->
              <div class="js-form-message mb-6">
                <label class="form-label">
                  Email
                  <span class="text-danger">*</span>
                </label>
                <input type="email" class="form-control" name="email" value="<?php if(isset($client['email_client'])){ echo $client['email_client']; } ?>" placeholder="jackwayley@gmail.com" aria-label="jackwayley@gmail.com" required="" data-msg="Please enter a valid email address." data-error-class="u-has-error" data-success-class="u-has-success" disabled>
              </div>
              <!-- End Input -->
            </div>

            <div class="col-md-6">
              <!-- Input -->
              <div class="js-form-message mb-6">
                <label class="form-label">
                  Contact
                </label>
                <input type="text" class="form-control" name="contact" value="<?php if(isset($client['contact_client'])){ echo $client['contact_client']; } ?>" placeholder="+225 07 782 817 52" aria-label="+1 (062) 109-9222" data-msg="Please enter your last name." data-error-class="u-has-error" data-success-class="u-has-success">
              </div>
              <!-- End Input -->
            </div>

            <div class="w-100"></div>
          </div>
          <!-- End Billing Form -->

          <!-- Title -->
          <div class="border-bottom border-color-1 mb-5">
            <h3 class="section-title mb-0 pb-2 font-size-25">Detail de livraison</h3>
          </div>
          <!-- End Title -->
          <!-- Input -->
          <div class="js-form-message mb-6">
            <label class="form-label">
              Notes De Commande (Facultatif)
            </label>

            <div class="input-group">
              <textarea class="form-control p-5" rows="4" name="text" placeholder="Des notes sur votre commande, par exemple des notes spéciales pour la livraison."></textarea>
            </div>
          </div>
          <!-- End Input -->
        </div>
      </div>
    </div>
  </form>
</div>
<!-- JS Global Compulsory -->
<script src="<?php echo base_url()?>assets/front-end/vendor/jquery/dist/jquery.min.js"></script>
<script>
  $(document).ready(function (){

    $('#command').on('click', function(e) {
      e.preventDefault();
      var connected = in_connected();
      if(connected){
        $('#form_commander').submit();
      }
      console.log(connected);
      // in_connected();
      // alert('ok');
      // $('#form_commander').submit();
    })
  })

</script>