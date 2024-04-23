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
                <a class="tablinks" href='<?php echo base_url('compte/mes_reservations')?>'>Mes reservations</a>
                <a class="tablinks" href="<?php echo base_url('compte/mon_profil')?>">Mon profil</a>
                <a class="tablinks" href="<?php echo base_url('compte/deconnexion')?>">Deconnexion</a>
            </div>

            <div id="commandes" class="tabcontent">
                <h3>Mes commandes</h3>
                <?php for($i=0; $i<count($articles); $i++){?>
                    <div class="row" style="border: 1px solid #ccc; border-radius: 5px; margin-bottom: 10px; padding-top: 10px">
                        <div class="col-lg-3">
                            <img src="<?php echo base_url('uploads/articles/').$articles[$i]["image_article"]; ?>" alt="" class="img-fluid">
                        </div>
                        <div class="col-lg-9">
                            <div style="float:left"><h5 style="font-weight: bold"><?php echo strtoupper($articles[$i]['designation_article']); ?></h5></div>
                            <div style="float:right"><a href="" style="color:#ff8401d1 !important; font-weight: bold">Detail</a></div>
                            <div style="clear: both"></div>

                            <span>Commande <?php echo strtoupper($articles[$i]['numero_commande']); ?></span>

                            <p>
                                <?php if($articles[$i]['statut_comande'] == "en attente"){?>
                                <span class="badge bg-warning">En attente</span>
                                <?php }elseif($articles[$i]['statut_comande'] == "livrer"){?>
                                    <span class="badge bg-success">livré</span>
                                <?php }elseif($articles[$i]['statut_comande'] == "en cours"){?>
                                    <span class="badge bg-success">En cours</span>
                                <?php }else{ ?>
                                    <span class="badge bg-success">Annulé</span>
                                <?php }?>
                            </p>
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