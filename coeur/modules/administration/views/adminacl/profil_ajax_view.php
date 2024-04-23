<div class="selectprofil" >

    <div class="mb-3">
        <select name="profil[]" class="selprofil form-control" style="display: inline-block;float: left;text-transform: uppercase" required>
            <option value="">selection</option>
            <?php foreach ($profils as $profil){ ?>
                <option value="<?php echo $profil->id_profils ;?>"><?php echo $profil->code_profils;?></option>
            <?php } ?>
        </select>
    </div>
    <div class="mb-3">
        <input name="numero[]" type="number" step="1" min=1 class="form-control" placeholder="position" required>
    </div>
    <div><span><a href="#" class="delete-p"><i class="bx bx-x-circle" style="font-size: 26px; color: red;"></i></a></span></div>


</div>