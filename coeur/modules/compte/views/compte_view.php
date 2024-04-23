<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<div class="container">
    <div class="mb-4">

        <h1 class="text-center">Mon Compte</h1>

    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="tab">
                <a class="tablinks active" href="<?php echo base_url('compte/mes_commandes')?>"  id='defaultOpen'>Mes commandes</a>
                <a class="tablinks" href="<?php echo base_url('compte/mes_reservations')?>">Mes reservations</a>
                <a class="tablinks" href="<?php echo base_url('compte/mon_profil')?>">Mon profil</a>
                <a class="tablinks" href="<?php echo base_url('compte/deconnexion')?>">Deconnexion</a>
            </div>

            <div id="commandes" class="tabcontent">
                <h3>Mes commandes</h3>
                <?php for($i=0; $i<5; $i++){?>
                    <div class="row" style="border: 1px solid #ccc; border-radius: 5px; margin-bottom: 10px; padding-top: 10px">
                        <div class="col-lg-3">

                        </div>
                        <div class="col-lg-9">
                            <div style="float:left"><h5 style="font-weight: bold">Chargeur Adapter PC IBM Lenovo Bout USB - Noir</h5></div>
                            <div style="float:right"><a href="" style="color:#ff8401d1 !important; font-weight: bold">Detail</a></div>
                            <div style="clear: both"></div>

                            <span>Commande 345722948</span>

                            <p><span class="badge bg-success">Livré</span></p>
                            <p style="margin-bottom: 5px !important;"><span>Le 30-11</span></p>
                        </div>
                    </div>
                <?php } ?>
            </div>

            <div style="clear:both"></div>
        </div>
    </div>
</div>
</body>
</html>