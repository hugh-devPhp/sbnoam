<!-- JAVASCRIPT -->
<script src="<?php echo base_url() ?>assets/admin/libs/jquery/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/admin/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url() ?>assets/admin/libs/metismenu/metisMenu.min.js"></script>
<script src="<?php echo base_url() ?>assets/admin/libs/simplebar/simplebar.min.js"></script>
<script src="<?php echo base_url() ?>assets/admin/libs/node-waves/waves.min.js"></script>


<script src="<?php echo base_url() ?>assets/admin/js/notiflix.js"></script>

<script src="<?php echo base_url() ?>assets/admin/sweetalert2/sweetalert2.all.min.js"></script>


<!-- App js -->
<script src="<?php echo base_url() ?>assets/admin/js/app.js"></script>


<script>
    function logout() {
        Swal.fire({
            title: 'Êtes vous sur !!?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Je me déconnecte!!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '<?php echo base_url(); ?>user/logout'
            } else {
                swal.fire({
                    position: 'top-end',
                    icon: 'info',
                    width: 250,
                    showConfirmButton: false,
                    title: 'Annulé',
                    timer: 1500
                });
            }
        })
    }
</script>