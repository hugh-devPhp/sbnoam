<!DOCTYPE html>
<html lang="en" class="light">

<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>Ivoire-lagune-service</title>
    <?php
    $this->load->view('layouts/css');
    ?>

</head>

<body data-sidebar="dark">

    <!-- Begin page -->
    <div id="layout-wrapper">

        <?php
        $this->load->view('layouts/top_bar');
        ?>

        <!-- ========== Left Sidebar Start ========== -->
        <?php
        $this->load->view('layouts/sidebar');
        ?>

        <div class="main-content">
            <?php
            $this->load->view('dashboard/dashboard_content');
            ?>

            <!-- Transaction Modal -->
            <div class="modal fade transaction-detailModal" tabindex="-1" role="dialog" aria-labelledby="transaction-detailModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="transaction-detailModalLabel">Order Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p class="mb-2">Product id: <span class="text-primary">#SK2540</span></p>
                            <p class="mb-4">Billing Name: <span class="text-primary">Neal Matthews</span></p>

                            <div class="table-responsive">
                                <table class="table align-middle table-nowrap">
                                    <thead>
                                        <tr>
                                            <th scope="col">Product</th>
                                            <th scope="col">Product Name</th>
                                            <th scope="col">Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">
                                                <div>
                                                    <img src="assets/images/product/img-7.png" alt="" class="avatar-sm">
                                                </div>
                                            </th>
                                            <td>
                                                <div>
                                                    <h5 class="text-truncate font-size-14">Wireless Headphone (Black)</h5>
                                                    <p class="text-muted mb-0">$ 225 x 1</p>
                                                </div>
                                            </td>
                                            <td>$ 255</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <div>
                                                    <img src="assets/images/product/img-4.png" alt="" class="avatar-sm">
                                                </div>
                                            </th>
                                            <td>
                                                <div>
                                                    <h5 class="text-truncate font-size-14">Phone patterned cases</h5>
                                                    <p class="text-muted mb-0">$ 145 x 1</p>
                                                </div>
                                            </td>
                                            <td>$ 145</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <h6 class="m-0 text-right">Sub Total:</h6>
                                            </td>
                                            <td>
                                                $ 400
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <h6 class="m-0 text-right">Shipping:</h6>
                                            </td>
                                            <td>
                                                Free
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <h6 class="m-0 text-right">Total:</h6>
                                            </td>
                                            <td>
                                                $ 400
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end modal -->

            <?php
            $this->load->view('layouts/footer');
            ?>
        </div>
    </div>
    <?php
    $this->load->view('layouts/js');
    ?>


</body>

</html>