<!DOCTYPE html>
<html lang="en" class="light">

<head>
    <meta charset="utf-8">
    <link href="<?php base_url() ?>assets/corporate/img/logov.png" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Finasys-Technologies">
    <title>ain4ce-admin</title>
    <?php
    $this->load->view('layouts/css');
    ?>
    <link rel="stylesheet" href="<?php base_url() ?>assets/admin/mastercalendar/style.css">
</head>
<body class="main">
<?php
$this->load->view('layouts/mobile_menu');
?>

<?php
$this->load->view('layouts/top_bar');
?>


<div class="wrapper">
    <div class="wrapper-box">
        <?php
        $this->load->view('layouts/sidebar');
        ?>

        <?php
        $this->load->view('dashboard_content');
        ?>
    </div>
</div>

<?php
$this->load->view('layouts/js');
?>

<script src="<?php echo base_url() ?>assets/admin/mastercalendar/script.js"></script>


</body>
</html>