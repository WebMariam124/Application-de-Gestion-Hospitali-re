<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="template/css/docteur.css">
</head>
<body>
    <br>
    <div class="box">
        <div class="box-header">
            <!-- TABS DE CONTRÔLE DE DÉBUT -->
            <ul class="nav nav-tabs nav-tabs-left">
                <?php if (isset($edit_profile)): ?>
                    <li class="active">
                        <a href="#edit" data-toggle="tab" style="color: black;"><i class="icon-wrench"></i> 
                            <?php echo ('Modifier le patient'); ?>
                        </a>
                    </li>
                <?php endif; ?>

                <li class="<?php if (!isset($edit_profile)) echo 'active'; ?>">
                    <a href="#list" data-toggle="tab" style="color: black;"><i class="icon-align-justify"></i> 
                        <?php echo ('Liste des patients'); ?>
                    </a>
                </li>

                <li>
                    <a href="#add" data-toggle="tab" style="color: black;"><i class="icon-plus"></i>
                        <?php echo ('Ajouter un patient'); ?>
                    </a>
                </li>
            </ul>
            <!-- TABS DE CONTRÔLE DE FIN -->
        </div>

        <div class="box-content padded">
            <div class="tab-content">
                <!-- FORMULAIRE DE MODIFICATION DE DÉBUT -->
                <?php if (isset($edit_profile)): ?>
                    <div class="tab-pane box active" id="edit" style="padding: 5px">
                        <div class="box-content">
                            <?php foreach ($edit_profile as $row): ?>
                                <?php echo form_open('doctor/manage_patient/edit/do_update/'.$row['patient_id'], array('class' => 'form-horizontal validatable')); ?>
                                    <div class="padded">
                                        <div class="control-group">
                                            <label class="control-label"><?php echo ('Nom'); ?></label>
                                            <div class="controls">
                                                <input type="text" class="validate[required]" name="name" value="<?php echo $row['name']; ?>" />
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label"><?php echo ('Email'); ?></label>
                                            <div class="controls">
                                                <input type="text" class="validate[required]" name="email" value="<?php echo $row['email']; ?>" />
                                            </div>
                                        </div>

                                        <!-- Autres champs identiques à ceux mentionnés précédemment -->

                                    </div>

                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-primary"><?php echo ('Modifier le patient'); ?></button>
                                    </div>
                                <?php echo form_close(); ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
                <!-- FORMULAIRE DE MODIFICATION DE FIN -->

                <!-- LISTE DES PATIENTS DE DÉBUT -->
                <div class="tab-pane box <?php if (!isset($edit_profile)) echo 'active'; ?>" id="list">
                    <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nom du patient</th>
                                <th>Âge</th>
                                <th>Sexe</th>
                                <th>Groupe sanguin</th>
                                <th>Date de naissance</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $count = 1; foreach ($patients as $row): ?>
                                <tr>
                                    <td style="width: 5%;"><?php echo $count++; ?></td>
                                    <td style="width: 20%;"><?php echo $row['name']; ?></td>
                                    <td style="width: 20%;"><?php echo $row['age']; ?></td>
                                    <td style="width: 15%;"><?php echo $row['sex']; ?></td>
                                    <td style="width: 10%;"><?php echo $row['blood_group']; ?></td>
                                    <td style="width: 20%;"><?php echo $row['birth_date']; ?></td>
                                    <td align="center">
                                        <div class="button-group">
                                            <a href="<?php echo base_url(); ?>index.php?doctor/manage_patient/edit/<?php echo $row['patient_id']; ?>" 
                                               rel="tooltip" data-placement="top" data-original-title="<?php echo ('Modifier'); ?>" 
                                               class="btn-primary">
                                                <i class="icon-wrench"></i>
                                                Modifier
                                            </a>
                                            <a href="<?php echo base_url(); ?>index.php?doctor/manage_patient/delete/<?php echo $row['patient_id']; ?>" 
                                               onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce patient ?')" rel="tooltip" 
                                               data-placement="top" data-original-title="<?php echo ('Supprimer'); ?>" class="btn-danger">
                                                Supprimer
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <!-- LISTE DES PATIENTS DE FIN -->

                <!-- FORMULAIRE D'AJOUT DE DÉBUT -->
                <div class="tab-pane box" id="add" style="padding: 5px">
                    <div class="box-content">
                        <?php echo form_open('doctor/manage_patient/create/', array('class' => 'form-horizontal validatable')); ?>

                            <div class="padded">
                            <div class="form-group" style="width: 600%;">
                            <label >Nom</label>
                            <input type="text" name="name" class="form-controle" required>
                        </div>
                        <div class="form-group">
                            <label>Age</label>
                            <input type="number" name="age" class="form-controle" required>
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-controle" required>
                        </div>

                        <div class="form-group">
                            <label>Mot de Passe</label>
                            <input type="password" name="password" class="form-controle" required>
                        </div>

                        <div class="form-group">
                            <label>Adresse</label>
                            <input type="text" name="address" class="form-controle">
                        </div>

                        <div class="form-group">
                            <label>Téléphone</label>
                            <input type="text" name="phone" class="form-controle">
                        </div>

                        <div class="form-group">
                            <label>Sexe</label>
                            <select name="sex" class="form-controle" >
                                <option value="male">Masculin</option>
                                <option value="female">Féminin</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Date de Naissance</label>
                            <input type="date" name="birth_date" class="form-controle">
                        </div>
                        <div class="form-group">
                            <label>Groupe Sanguin</label>
                            <select name="blood_group" class="form-controle">
                                <?php 
                                $blood_groups = ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'];
                                foreach ($blood_groups as $group): ?>
                                    <option value="<?php echo $group; ?>"><?php echo $group; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="form-action">
                              <button type="submit" class="success">Ajouter patient</button>
                           </div>
                        </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
            </div>
        </div>
    </div>
</body>
</html>
