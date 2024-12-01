<div class="box">
  <div class="box-header">
    <!------DÉBUT DES ONGLETS DE CONTRÔLE------->

    <ul class="nav nav-tabs nav-tabs-left">

      <?php if(isset($edit_profile)):?>
      <li class="active">
        <a href="#edit" data-toggle="tab"><i class="icon-wrench"></i>
          <?php echo ('Modifier le patient');?>
        </a>
      </li>
      <?php endif;?>

      <li class="<?php if(!isset($edit_profile))echo 'active';?>">
        <a href="#list" data-toggle="tab"><i class="icon-align-justify"></i>
          <?php echo ('Liste des patients');?>
        </a>
      </li>

      <li>
        <a href="#add" data-toggle="tab"><i class="icon-plus"></i>
          <?php echo ('Ajouter un patient');?>
        </a>
      </li>

    </ul>

    <!------FIN DES ONGLETS DE CONTRÔLE------->

  </div>

  <div class="box-content padded">
    <div class="tab-content">

      <!----DÉBUT DU FORMULAIRE DE MODIFICATION---->
      <?php if(isset($edit_profile)):?>
      <div class="tab-pane box active" id="edit" style="padding: 5px">
        <div class="box-content">
          <?php foreach($edit_profile as $row):?>
          <?php echo form_open('patient/manage_patient/edit/do_update/'.$row['patient_id'] , array('class' => 'form-horizontal validatable'));?>
          <div class="padded">
            <div class="control-group">
              <label class="control-label"><?php echo ('Nom');?></label>
              <div class="controls">
                <input type="text" class="validate[required]" name="name" value="<?php echo $row['name'];?>"/>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label"><?php echo ('Email');?></label>
              <div class="controls">
                <input type="text" class="validate[required]" name="email" value="<?php echo $row['email'];?>"/>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label"><?php echo ('Mot de passe');?></label>
              <div class="controls">
                <input type="password" class="validate[required]" name="password" value="<?php echo $row['password'];?>"/>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label"><?php echo ('Adresse');?></label>
              <div class="controls">
                <input type="text" class="" name="address" value="<?php echo $row['address'];?>"/>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label"><?php echo ('Téléphone');?></label>
              <div class="controls">
                <input type="text" class="" name="phone" value="<?php echo $row['phone'];?>"/>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label"><?php echo ('Sexe');?></label>
              <div class="controls">
                <select name="sex" class="uniform" style="width:100%;">
                  <option value="male" <?php if($row['sex']=='male')echo 'selected';?>><?php echo ('Homme');?></option>
                  <option value="female" <?php if($row['sex']=='female')echo 'selected';?>><?php echo ('Femme');?></option>
                </select>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label"><?php echo ('Date de naissance');?></label>
              <div class="controls">
                <input type="date" class="" name="birth_date" value="<?php echo $row['birth_date'];?>"/>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label"><?php echo ('Âge');?></label>
              <div class="controls">
                <input type="text" class="" name="age" value="<?php echo $row['age'];?>"/>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label"><?php echo ('Groupe sanguin');?></label>
              <div class="controls">
                <select name="blood_group" class="uniform" style="width:100%;">
                  <option value="A+" <?php if($row['blood_group']=='A+')echo 'selected';?>>A+</option>
                  <option value="A-" <?php if($row['blood_group']=='A-')echo 'selected';?>>A-</option>
                  <option value="B+" <?php if($row['blood_group']=='B+')echo 'selected';?>>B+</option>
                  <option value="B-" <?php if($row['blood_group']=='B-')echo 'selected';?>>B-</option>
                  <option value="AB+" <?php if($row['blood_group']=='AB+')echo 'selected';?>>AB+</option>
                  <option value="AB-" <?php if($row['blood_group']=='AB-')echo 'selected';?>>AB-</option>
                  <option value="O+" <?php if($row['blood_group']=='O+')echo 'selected';?>>O+</option>
                  <option value="O-" <?php if($row['blood_group']=='O-')echo 'selected';?>>O-</option>
                </select>
              </div>
            </div>
          </div>

          <div class="form-actions">
            <button type="submit" class="btn btn-primary"><?php echo ('Modifier le patient');?></button>
          </div>

          <?php echo form_close();?>
          <?php endforeach;?>
        </div>
      </div>
      <?php endif;?>
      <!----FIN DU FORMULAIRE DE MODIFICATION---->
