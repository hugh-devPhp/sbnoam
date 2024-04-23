<p>&nbsp;</p>
 <h4 class="card-title text-center"> <span style="text-transform:uppercase; color: blue;"><?php echo $info_profil->code_profils; ?></span> sur module <span style="text-transform:uppercase; color: blue;"><?php echo $info_module->designation_module; ?></span></h4>
 <p>&nbsp;</p>
                                        <!-- <p class="card-title-desc">This is an experimental awesome solution for responsive tables with complex data.</p> -->


<div class="col-sm-12">

    <?php
    if (count($actions) > 0) { ?>


        <input type="hidden" value="<?php echo $id_module ?>" id="module">
        <input type="hidden" value="<?php echo $id_profil ?>" id="profil">


        <table class="table table-striped table-bordered dt-responsive  nowrap w-100">
            <thead>
            <tr>
                <th width="5%" class="text-center">N&ordm;</th>
                <th class="text-center">Actions</th>
                <th class="text-center">Description</th>
                <th class="text-center" style="width:8%;">Etat</th>
                <th class="text-center" style="width:6%;">
                    <input type="checkbox" name="checkAllNiveau" id="checkAlldesactive" class="checkAllNiveau desactiver" data-check="checkbox1">
                    <?php if(in_array('desactive_action', is_inarray())) { ?>
                    <div class="btn-group" data-toggle="buttons-radio">
                        <a class="red" href="Javascript:void(0);" id="desactive-action">
                            <button class="btn btn-danger btn-mini"><i class="bx bx-x" style="font-size:16px;"></i></button>
                        </a>
                    </div>
                    <?php } ?>

                </th>
                <th class="text-center" style="width:6%;">
                    <input type="checkbox" name="checkAllNiveau" id="checkAllactive" class="checkAllNiveau activer" data-check="checkbox2">
                    <?php if(in_array('active_action', is_inarray())) { ?>
                    <div class="btn-group" data-toggle="buttons-radio">
                        <a class="red" href="Javascript:void(0);" id="active-action">
                            <button class="btn btn-success btn-mini"><i class="bx bx-check" style="font-size:16px;"></i></button>
                        </a>
                    </div>
                    <?php } ?>


                </th>

            </tr>
            </thead>
            <tbody>
            <?php
            $n = 1;
            foreach ($actions as $action) {
                ?>
                <tr>
                    <td>
                        <?php
                        echo $n++;
                        ?>
                    </td>
                    <td><?php
                        echo $action->nom_action;
                        ?></td>
                    <td>
                        <?php
                        echo $action->description_action;
                        ?>

                    </td>
                    <td class="text-center">

                        <?php
                        if (isset($actions_active[$action->nom_module_action][$action->nom_action]) && $actions_active[$action->nom_module_action][$action->nom_action] == "1") {
                            ?>
                            <span class="fa fa-thumbs-up " style="color:#0aa699"></span>

                        <?php } else { ?>

                            <span class="fa fa-thumbs-down " style="color:#f35958"></span>

                        <?php } ?>

                    </td>
                    <td class="text-center" style="vertical-align: middle">

                        <?php if (isset($actions_active[$action->nom_module_action][$action->nom_action]) && $actions_active[$action->nom_module_action][$action->nom_action] == "1") {
                            ?>

                            <input type="checkbox" class="checkbox1 checkbox-elt checkbox-noactiv"
                                   data-module="<?php echo $action->nom_module_action ?>"
                                   data-id="<?php echo $action->id_liste_action;?>" name="check_id" value=""
                                   data-parent="desactiver">

                        <?php } ?>


                    </td>
                    <td class="text-center" style="vertical-align: middle">


                        <?php if (!isset($actions_active[$action->nom_module_action][$action->nom_action]) || $actions_active[$action->nom_module_action][$action->nom_action] != "1") {
                            ?>

                            <input type="checkbox" class="checkbox2 checkbox-elt checkbox-activ"
                                   data-module="<?php echo $action->nom_module_action ?>"
                                   data-id="<?php echo $action->id_liste_action;?>" name="check_id" value=""
                                   data-parent="activer">

                        <?php } ?>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>

        </table>


    <?php } else { ?>


        <div class="jumbotron text-center">
            <h3>aucune action</h3>


        </div>


    <?php } ?>

</div>

