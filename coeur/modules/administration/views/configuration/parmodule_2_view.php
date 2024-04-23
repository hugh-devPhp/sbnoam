                        <div class="templating-select">
                                            <label class="form-label">Methode d'appel</label>
    <?php echo form_dropdown("lamethode", $option_methode, $select_action,"id='lamethode_edit' class='form-control' required"); ?>
                                                        </div>
                                    <br>
                        <label class="form-label">Position de l'onglet</label>
    <input type="number" step=1 min=1  max="<?php echo $maxi;?>" class="form-control"  name="position_onglet" id="position_onglet_edit" value="<?php echo $position;?>" required>
        <input type="hidden" name="maxpos" id="maxpos_edit" value="<?php echo $maxi;?>">