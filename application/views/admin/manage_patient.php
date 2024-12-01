<head>
    <link rel="stylesheet" href="template/css/admin.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

</head>
<div class="box" >

<div class="box-header">
    <ul class="nav-tabs-custom" style="display: flex; margin: 5px; gap:15px;list-style: none; ">
    <?php if (isset($edit_profile)): ?>
        <li class="active">
            <a href="#edit" data-toggle="tab">
                <i class="fas fa-edit"></i> Modifier Patient
            </a>
        </li>
    <?php endif; ?>
    <li class="<?php if (!isset($edit_profile)) echo 'active'; ?>">
        <a href="#list" data-toggle="tab">
            <i class="fas fa-list"></i> Liste des Patients
        </a>
    </li>
    <li>
        <a href="#add" data-toggle="tab">
            <i class="fas fa-plus"></i> Ajouter Patient
        </a>
    </li>
    </ul>
</div>

    <div class="box-content padded">
        <div class="tab-content">
            <!-- FORMULAIRE DE MODIFICATION -->
            <?php if (isset($edit_profile)): ?>
                <div class="tab-pane box active" id="edit">
                    <div class="box-content">
                            <?php echo form_open('admin/manage_patient/edit/do_update/' . $row['patient_id'], ['class' => 'form-horizontal validatable']); ?>
                            <div class="form-group">
                                <label>Nom</label>
                                <input type="text" name="name" value="<?php echo $row['name']; ?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" value="<?php echo $row['email']; ?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Mot de Passe</label>
                                <input type="password" name="password" value="<?php echo $row['password']; ?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Adresse</label>
                                <input type="text" name="address" value="<?php echo $row['address']; ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Téléphone</label>
                                <input type="text" name="phone" value="<?php echo $row['phone']; ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Sexe</label>
                                <select name="sex" class="form-control">
                                    <option value="male" <?php if ($row['sex'] == 'male') echo 'selected'; ?>>Masculin</option>
                                    <option value="female" <?php if ($row['sex'] == 'female') echo 'selected'; ?>>Féminin</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Date de Naissance</label>
                                <input type="date" name="birth_date" value="<?php echo $row['birth_date']; ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Groupe Sanguin</label>
                                <select name="blood_group" class="form-control">
                                    <?php 
                                    $blood_groups = ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'];
                                    foreach ($blood_groups as $group): ?>
                                        <option value="<?php echo $group; ?>" <?php if ($row['blood_group'] == $group) echo 'selected'; ?>>
                                            <?php echo $group; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-action">
                         <button type="submit" class="success">Modifier Patient</button>
                        </div>
                            <?php echo form_close(); ?>
                    </div>
                </div>
            <?php endif; ?>

            <!-- FORMULAIRE D'AJOUT -->
            <div class="tab-pane box" id="add">
                <div class="box-content">
                <?php echo form_open('admin/manage_patient/create', ['class' => 'form-horizontal validatable']); ?>
                        <div class="form-group">
                            <label>Nom</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Age</label>
                            <input type="number" name="age" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Mot de Passe</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Adresse</label>
                            <input type="text" name="address" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Téléphone</label>
                            <input type="text" name="phone" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Sexe</label>
                            <select name="sex" class="form-control">
                                <option value="male">Masculin</option>
                                <option value="female">Féminin</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Date de Naissance</label>
                            <input type="date" name="birth_date" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Groupe Sanguin</label>
                            <select name="blood_group" class="form-control">
                                <?php 
                                $blood_groups = ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'];
                                foreach ($blood_groups as $group): ?>
                                    <option value="<?php echo $group; ?>"><?php echo $group; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-action">
                         <button type="submit" class="success">Ajouter Patient</button>
                        </div>
                        <?php echo form_close(); ?>
                </div>
            </div>

            <!-- LISTE DES PATIENTS -->
            <div class="tab-pane box <?php if (!isset($edit_profile)) echo 'active'; ?>" id="list">
                <table class="table table-hover custom-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Age</th>
                            <th>Sexe</th>
                            <th>Groupe Sanguin</th>
                            <th>Date de Naissance</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 1; foreach ($patients as $row): ?>
                            <tr>
                                <td><?php echo $count++; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['age']; ?></td>
                                <td><?php echo $row['sex']; ?></td>
                                <td><?php echo $row['blood_group']; ?></td>
                                <td><?php echo $row['birth_date']; ?></td>
                                <td>
                                    <a  href="<?php echo base_url(); ?>index.php?admin/manage_patient/edit/<?php echo $row['patient_id']; ?>" class="btn-action edit" >
                                        <i class="fas fa-edit"></i> Modifier
                                    </a>
                                    <a href="<?php echo base_url(); ?>index.php?admin/manage_patient/delete/<?php echo $row['patient_id']; ?>" class="btn-action delete" onclick="return confirm('Voulez-vous vraiment supprimer?')">
                                        <i class="fas fa-trash"></i> Supprimer
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<style>
    .form-action {
        text-align: center;
        display: flex;
        justify-content: center;
        gap: 20px;
        margin-top: 100px;
        position: relative;
       right: 800px;
    }

    button.success {
        background-color: rgb(0, 119, 255);
        color: white; 
        padding: 5px 10px; 
        font-size: 16px; 
        border: none; 
        cursor: pointer; 
        border-radius: 5px; 
        margin-bottom: 100px;
    }

    button.success:hover {
        background-color: #0073e6;
    }
</style>