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
                <a class="tablinks " href="<?php echo base_url('compte/mes_commandes')?>"  id='defaultOpen'>Mes commandes</a>
                <a class="tablinks active"  href="<?php echo base_url('compte/mes_reservations')?>>">Mes reservations</a>
                <a class="tablinks" href="<?php echo base_url('compte/mon_profil')?>">Mon profil</a>
                <a class="tablinks" href="<?php echo base_url('compte/deconnexion')?>">Deconnexion</a>
            </div>

            <div id="reservations" class="tabcontent">
                <h3>Mes reservations</h3>

                <?php for($i=0; $i<count($reservations); $i++){?>
                    <div class="row" style="border: 1px solid #ccc; border-radius: 5px; margin-bottom: 10px; padding-top: 10px">
                        <div class="col-lg-3">
                            <img src="<?php echo base_url('uploads/vehicules/').$reservations[$i]["image_principale_auto"]; ?>" alt="" style="width:100%; height:120px">
                        </div>
                        <div class="col-lg-9">
                            <div style="float:left"><h5 style="font-weight: bold"><?php $marque = infos_marque($reservations[$i]['marque_id']); $serie = infos_model($reservations[$i]['model_id']); echo strtoupper($marque['code_marque'])." ".strtoupper($serie['code_model']); ?></h5></div>
                            <div style="float:right"><a href="" style="color:#ff8401d1 !important; font-weight: bold">Voir</a></div>
                            <div style="clear: both"></div>
                            <div><span>Prix: <?php echo strtoupper($reservations[$i]['prix_reserv']); ?></span></div>
                            <div><span>Destination: <?php echo strtoupper($reservations[$i]['destination']); ?></span></div>
                            <div><span>Date: debut <?php echo strtoupper($reservations[$i]['date_debut']); ?></span></div>
                            <div><span>Date: fin <?php echo strtoupper($reservations[$i]['date_fin']); ?></span></div>


                            <p>
                                <?php if($reservations[$i]['statut'] == 0){?>
                                <span class="badge bg-warning">En attente</span>
                                <?php }elseif($reservations[$i]['statut'] == 1){?>
                                    <span class="badge bg-success">livré</span>
                                <?php }elseif($reservations[$i]['statut'] == 2){?>
                                    <span class="badge bg-success">En cours</span>
                                <?php }else{ ?>
                                    <span class="badge bg-success">Annulé</span>
                                <?php }?>
                            </p>
                            <p style="margin-bottom: 5px !important;"><span>Le <?php echo persodate_en_fr($reservations[$i]['date_add']); ?></span></p>
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