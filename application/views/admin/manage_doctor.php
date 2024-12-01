<head>
    <link rel="stylesheet" href="template/css/admin.css">
</head>
<div class="box" >
    <div class="box-header">
        <ul class="nav nav-tabs nav-tabs-left">
            <?php if (isset($edit_profile)): ?>
                <li class="nav-item">
                    <a class="nav-link active" href="#edit" data-toggle="tab"><i class="icon-wrench"></i> <?php echo ('Modifier Docteur'); ?></a>
                </li>
            <?php endif; ?>
            <li class="nav-item <?php if (!isset($edit_profile)) echo 'active'; ?>">
                <a class="nav-link" href="#list" data-toggle="tab"><i class="icon-align-justify"></i> <?php echo ('Liste des Docteurs'); ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#add" data-toggle="tab"><i class="icon-plus"></i> <?php echo ('Ajouter Docteur'); ?></a>
            </li>
        </ul>
    </div>
    <div class="box-content">
        <div class="tab-content">
            <!-- EDITING FORM -->
            <?php if (isset($edit_profile)): ?>
                <div class="tab-pane active" id="edit">
                    <?php foreach ($edit_profile as $row): ?>
                        <?php echo form_open('admin/manage_doctor/edit/do_update/' . $row['doctor_id'], ['class' => 'form-horizontal validatable']); ?>
                        <div class="form-group">
                            <label>Nom</label>
                            <input type="text" name="name" value="<?php echo $row['name']; ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Adresse Email</label>
                            <input type="email" name="email" value="<?php echo $row['email']; ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Mot de Passe</label>
                            <input type="password" name="password" value="<?php echo $row['password']; ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Addresse</label>
                            <input type="text" name="address" value="<?php echo $row['address']; ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Téléphone</label>
                            <input type="text" name="phone" value="<?php echo $row['phone']; ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Départment</label>
                            <select name="department_id" class="form-control">
                                <?php foreach ($this->db->get('department')->result_array() as $row2): ?>
                                    <option value="<?php echo $row2['department_id']; ?>" <?php if ($row['department_id'] == $row2['department_id']) echo 'selected'; ?>>
                                        <?php echo $row2['name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Profile</label>
                            <input type="text" name="profile" value="<?php echo $row['profile']; ?>" class="form-control">
                        </div>
                        <div class="form-action">
                          <button type="submit" class="success">Modifier Docteur</button>
                       </div>
                        <?php echo form_close(); ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <!-- DOCTOR LIST -->
            <div class="tab-pane <?php if (!isset($edit_profile)) echo 'active'; ?>" id="list">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nom de Docteur</th>
                            <th>Adresse email</th>
                            <th>Mot de Passe</th>
                            <th>Adresse</th>
                            <th>Téléphone</th>
                            <th>Département</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 1; foreach ($doctors as $row): ?>
                            <tr>
                                <td><?php echo $count++; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['password']; ?></td>
                                <td><?php echo $row['address']; ?></td>
                                <td><?php echo $row['phone']; ?></td>
                                <td><?php echo $this->crud_model->get_type_name_by_id('department', $row['department_id']); ?></td>
                                <td>
                                <a href="<?php echo base_url('index.php?admin/manage_doctor/edit/' . $row['doctor_id']); ?>" class="btn btn-primary">
                                    <i class="fa fa-pencil-alt"></i> Modifier
                                </a>
                                <a href="<?php echo base_url('index.php?admin/manage_doctor/delete/' . $row['doctor_id']); ?>" onclick="return confirm('Delete?');" class="btn btn-danger">
                                   <i class="fa fa-trash"></i> Supprimer
                                </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <!-- ADD DOCTOR FORM -->
            <div class="tab-pane" id="add">
                <?php echo form_open('admin/manage_doctor/create', ['class' => 'form-horizontal validatable']); ?>
                <div class="form-group">
                    <label>Nom</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Adresse Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Mot de Passe</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Addresse</label>
                    <input type="text" name="address" class="form-control">
                </div>
                <div class="form-group">
                    <label>Téléphone</label>
                    <input type="text" name="phone" class="form-control">
                </div>
                <div class="form-group">
                    <label>Départment</label>
                    <select name="department_id" class="form-control">
                        <?php foreach ($this->db->get('department')->result_array() as $row): ?>
                            <option value="<?php echo $row['department_id']; ?>"><?php echo $row['name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Profile</label>
                    <input type="text" name="profile" class="form-control">
                </div>
                <div class="form-action">
               <button type="submit" class="success">Ajouter Docteur</button>
               </div>
                <?php echo form_close(); ?>
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
       right: 860px;
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

