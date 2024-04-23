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
                <a class="tablinks" href="<?php echo base_url('compte/mes_commandes')?>"  >Mes commandes</a>
                <a class="tablinks" href="<?php echo base_url('compte/mes_reservations')?>">Mes reservations</a>
                <a class="tablinks active" href="<?php echo base_url('compte/mon_profil')?>" id='defaultOpen'>Mon profil</a>
                <a class="tablinks" href="<?php echo base_url('compte/deconnexion')?>">Deconnexion</a>
            </div>

            <div id="profil" class="tabcontent">
                <form action="compte/mon_profil" method="post">
                <div class="row">
                    <div class="col-lg-7">
                        <input type="text" class="form-control" name="nom_complet" placeholder="Nom Complet" value="<?php if(isset($client['nom_complet_client'])){ echo $client['nom_complet_client']; } ?>">
                    </div>
                    <div class="col-lg-5">
                        <input type="text" class="form-control" name="pseudo" placeholder="Pseudo" value="<?php if(isset($client['pseudo_client'])){ echo $client['pseudo_client']; } ?>">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="email" placeholder="Email" value="<?php if(isset($client['email_client'])){ echo $client['email_client']; } ?>">

                    </div>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="contact" placeholder="Contact" value="<?php if(isset($client['contact_client'])){ echo $client['contact_client']; } ?>">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-4">
                        <input type="text" class="form-control" name="ville" placeholder="Ville" value="<?php if(isset($client['ville_client'])){ echo $client['ville_client']; } ?>">
                    </div>
                    <div class="col-lg-4">
                        <input type="text" class="form-control" name="commune" placeholder="Commune" value="<?php if(isset($client['commune_client'])){ echo $client['commune_client']; } ?>">
                    </div>
                    <div class="col-lg-4">
                        <input type="text" class="form-control" name="quartier" placeholder="Quartier" value="<?php if(isset($client['quartier_client'])){ echo $client['quartier_client']; } ?>">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-success">Mettre a jour</button>
                    </div>
                </div>
                </form>
            </div>

            <div style="clear:both"></div>
        </div>
    </div>
</div>
</body>
</html>