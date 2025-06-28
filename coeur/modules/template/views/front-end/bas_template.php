<!-- ========== FOOTER ========== -->
<footer>
    <?php $this->load->view('template/front-end/footer')?>
</footer>
<!-- ========== END FOOTER ========== -->


<!-- Go to Top -->
<a class="js-go-to u-go-to" href="#"
   data-position='{"bottom": 15, "right": 15 }'
   data-type="fixed"
   data-offset-top="400"
   data-compensation="#header"
   data-show-effect="slideInUp"
   data-hide-effect="slideOutDown">
    <span class="fas fa-arrow-up u-go-to__inner"></span>
</a>
<!-- End Go to Top -->

<!-- Quick View Modal Start -->
<div class="modal fade quick-view-modal" id="quickViewModal" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="close-btn" data-dismiss="modal">
                    <a href="#" class="remove"><i class="fal fa-times"></i></a>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="shop-detail-image">
                                <img src="<?php echo base_url("assets/front-end/img/shop/detail-1.png") ?>" class="img-fluid" alt="img">
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="shop-detail-content">
                                <h3 class="product-title mb-20">Handmade Golden Ring</h3>
                                <span class="rating mb-20">
                    <span class="text-yellow"><i class="far fa-star"></i></span>
                    <span class="text-yellow"><i class="far fa-star"></i></span>
                    <span class="text-yellow"><i class="far fa-star"></i></span>
                    <span class="text-dark-white"><i class="far fa-star"></i></span>
                    <span class="text-dark-white"><i class="far fa-star"></i></span>
                    <span class="pro-review"> <span>1 Reviews</span>
                    </span>
                  </span>
                                <div class="desc mb-20 pb-20 border-bottom">
                                    <span class="price">$390 <span>$480</span></span>
                                </div>
                                <div class="mt-20 mb-20">
                                    <div class="d-inline-block other-info">
                                        <h6>Availability:
                                            <span class="text-success ml-2">In Stock</span>
                                        </h6>
                                    </div>
                                    <div class="ml-2 d-inline-block other-info">
                                        <h6>SKU:
                                            <span class="grey ml-2">006-bhg</span>
                                        </h6>
                                    </div>
                                </div>
                                <div class="short-descr mb-20">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip</p>
                                </div>
                                <div class="color-sec mb-20">
                                    <label>Color</label>
                                    <div class="color-box">
                                        <label class="m-0">
                                            <input type="radio" name="color">
                                            <span class="choose-color red"></span>
                                        </label>
                                        <label class="m-0">
                                            <input type="radio" name="color">
                                            <span class="choose-color yellow"></span>
                                        </label>
                                        <label class="m-0">
                                            <input type="radio" name="color">
                                            <span class="choose-color blue"></span>
                                        </label>
                                        <label class="m-0">
                                            <input type="radio" name="color">
                                            <span class="choose-color green"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="color-sec mb-20">
                                    <label>Material</label>
                                    <div class="color-box">
                                        <label class="m-0">
                                            <input type="radio" name="material">
                                            <span class="choose-material">Gold</span>
                                        </label>
                                        <label class="m-0">
                                            <input type="radio" name="material">
                                            <span class="choose-material">Diamond</span>
                                        </label>
                                        <label class="m-0">
                                            <input type="radio" name="material">
                                            <span class="choose-material">Silver</span>
                                        </label>
                                        <label class="m-0">
                                            <input type="radio" name="material">
                                            <span class="choose-material">Stone</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="quantity-cart d-block d-sm-flex">
                                    <div class="quantity-box">
                                        <button type="button" class="minus-btn">
                                            <i class="fal fa-minus"></i>
                                        </button>
                                        <input type="text" class="input-qty" name="name" value="1">
                                        <button type="button" class="plus-btn">
                                            <i class="fal fa-plus"></i>
                                        </button>
                                    </div>
                                    <div class="cart-btn pl-40">
                                        <a href="#" class="main-btn btn-border">Add to Cart</a>
                                    </div>
                                </div>
                                <div class="other-info flex mt-20">
                                    <h6>Category:</h6>
                                    <ul>
                                        <li class="list-inline-item mr-2">
                                            <a href="#" class="grey">Bracelets</a>
                                        </li>
                                        <li class="list-inline-item mr-2">
                                            <a href="#" class="grey">Rings</a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#" class="grey">Silver Bracelet</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="other-info flex mt-20">
                                    <h6>Tags:</h6>
                                    <ul>
                                        <li class="list-inline-item mr-2">
                                            <a href="#" class="grey">rings</a>
                                        </li>
                                        <li class="list-inline-item mr-2">
                                            <a href="#" class="grey">necklaces</a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#" class="grey">bracelet</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Quick View Modal End -->
<!--====== Modal Popup Start ======-->
<!-- The Modal -->
<div class="modal fade on-load-modal" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="background-image: url(assets/front-end/img/popup.jpg)">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close popup-trigger" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="modal-inner">
                    <h3 class="title">Newsletter</h3>
                    <p>Subscribe to our newsletter to recieve exclusive offers</p>

                    <form>
                        <input type="email" placeholder="Email Address" name="email" value="">
                        <button type="submit" class="main-btn btn-filled" name="button">Subscribe</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<!--====== Modal Popup End ======-->
<?php $this->load->view('template/front-end/base_js')?>
</body>


</html>