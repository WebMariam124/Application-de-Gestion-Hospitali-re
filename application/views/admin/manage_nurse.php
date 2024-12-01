<head>
    <link rel="stylesheet" href="template/css/admin.css">
</head>
<div class="box">
    <div class="box-header">
        <ul class="nav nav-tabs nav-tabs-left">
            <?php if (isset($edit_profile)): ?>
                <li class="nav-item">
                    <a class="nav-link active" href="#edit" data-toggle="tab"><i class="icon-wrench"></i> <?php echo ('Modifier Infermier'); ?></a>
                </li>
            <?php endif; ?>
            <li class="nav-item <?php if (!isset($edit_profile)) echo 'active'; ?>">
                <a class="nav-link" href="#list" data-toggle="tab"><i class="icon-align-justify"></i> <?php echo ('Liste des Infermiers'); ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#add" data-toggle="tab"><i class="icon-plus"></i> <?php echo ('Ajouter Infermier'); ?></a>
            </li>
        </ul>
    </div>
    <div class="box-content">
        <div class="tab-content">
            <!-- EDITING FORM -->
            <?php if (isset($edit_profile)): ?>
    <div class="tab-pane box active" id="edit">
        <div class="box-content">
            <?php foreach ($edit_profile as $row): ?>
                <?php echo form_open('admin/manage_nurse/edit/do_update/' . $row['nurse_id'], ['class' => 'form-horizontal validatable']); ?>
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
                        <label>Adresse</label>
                        <input type="text" name="address" value="<?php echo $row['address']; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Téléphone</label>
                        <input type="text" name="phone" value="<?php echo $row['phone']; ?>" class="form-control">
                    </div>
                    <div class="form-action">
               <button type="submit" class="success">Modifier Infermier</button>
               </div>
                <?php echo form_close(); ?>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>


            <div class="tab-pane box <?php if (!isset($edit_profile)) echo 'active'; ?>" id="list">
    <table class="table table-hover custom-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Adresse</th>
                <th>Téléphone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $count = 1; foreach ($nurses as $row): ?>
                <tr>
                    <td><?php echo $count++; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td>
                        <a href="<?php echo base_url(); ?>index.php?admin/manage_nurse/edit/<?php echo $row['nurse_id']; ?>" class="btn-action edit">
                            <i class="fas fa-edit"></i> Modifier
                        </a>
                        <a href="<?php echo base_url(); ?>index.php?admin/manage_nurse/delete/<?php echo $row['nurse_id']; ?>" class="btn-action delete" onclick="return confirm('Voulez-vous vraiment supprimer?')">
                            <i class="fas fa-trash"></i> Supprimer
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>


<div class="tab-pane box" id="add">
    <div class="box-content">
        <?php echo form_open('admin/manage_nurse/create', ['class' => 'form-horizontal validatable']); ?>
            <div class="form-group">
                <label>Nom</label>
                <input type="text" name="name" class="form-control" required>
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
            <div class="form-action">
               <button type="submit" class="success">Ajouter Infermier</button>
               </div>
        <?php echo form_close(); ?>
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