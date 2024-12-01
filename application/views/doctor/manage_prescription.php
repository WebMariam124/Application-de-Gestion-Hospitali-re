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
    <!-- ONGLETS DE CONTRÔLE -->
    <ul class="nav nav-tabs nav-tabs-left">
      <?php if (isset($edit_profile)) : ?>
        <li class="active">
          <a href="#edit" data-toggle="tab" style="color: black;">
            <i class="icon-wrench"></i> Modifier l'ordonnance
          </a>
        </li>
      <?php endif; ?>
      <li class="<?php if (!isset($edit_profile)) echo 'active'; ?>">
        <a href="#list" data-toggle="tab" style="color: black;">
          <i class="icon-align-justify"></i> Liste des ordonnances
        </a>
      </li>
      <li>
        <a href="#add" data-toggle="tab" style="color: black;">
          <i class="icon-plus"></i> Ajouter une ordonnance
        </a>
      </li>
    </ul>
  </div>

  <div class="box-content padded">
    <div class="tab-content">
      <!-- LISTE DES ORDONNANCES -->
      <div class="tab-pane box <?php if (!isset($edit_profile)) echo 'active'; ?>" id="list">
        <table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th>Date</th>
              <th>Patient</th>
              <th>Médecin</th>
              <th>Description</th>
              <th>Options</th>
            </tr>
          </thead>
          <tbody>
            <?php $count = 1; foreach ($prescriptions as $row) : ?>
              <tr>
                <td><?php echo $count++; ?></td>
                <td><?php echo date('d M,Y', $row['creation_timestamp']); ?></td>
                <td><?php echo $this->crud_model->get_type_name_by_id('patient', $row['patient_id'], 'name'); ?></td>
                <td><?php echo $this->crud_model->get_type_name_by_id('doctor', $row['doctor_id'], 'name'); ?></td>
                <td><?php echo htmlspecialchars($row['description']); ?></td>
                <td class="button-group">
                  <a href="<?php echo base_url(); ?>index.php?doctor/manage_prescription/edit/<?php echo $row['prescription_id']; ?>" 
                     rel="tooltip" data-original-title="Modifier" class="btn-primary">
                    <i class="icon-wrench"></i> Modifier
                  </a>
                  <a href="<?php echo base_url(); ?>index.php?doctor/manage_prescription/delete/<?php echo $row['prescription_id']; ?>" 
                     onclick="return confirm('Supprimer ?')" rel="tooltip" data-original-title="Supprimer" class="btn-danger">
                    <i class="icon-trash"></i> Supprimer
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

     <!-- FORMULAIRE D'AJOUT DE PRESCRIPTION -->
<div class="tab-pane box" id="add" style="padding: 20px; background-color: #f9f9f9; border-radius: 5px;">
  <div class="box-content">
    <?php echo form_open('doctor/manage_prescription/create/', array('class' => 'form-horizontal validatable')); ?>
    
    <div class="padded">

      <!-- Sélection du Médecin -->
      <div class="control-group">
        <label class="control-label" style="text-align: start;">Médecin</label>
        <div class="controls">
          <select class="chzn-select" name="doctor_id" required>
            <option value="">Sélectionnez un médecin</option>
            <?php 
            $doctors = $this->db->get('doctor')->result_array();
            foreach ($doctors as $row) : ?>
              <option value="<?php echo $row['doctor_id']; ?>"><?php echo $row['name']; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>
      <!-- Sélection du Patient -->
      <div class="control-group">
        <label class="control-label" style="text-align: start;" >Patient</label>
        <div class="controls">
          <select class="chzn-select" name="patient_id" required>
            <option value="">Sélectionnez un patient</option>
            <?php 
            $patients = $this->db->get('patient')->result_array();
            foreach ($patients as $row) : ?>
              <option value="<?php echo $row['patient_id']; ?>"><?php echo $row['name']; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>

      <!-- Date de la Prescription -->
      <div class="control-group">
        <label class="control-label" style="text-align: start; ">Date</label>
        <div class="controls">
          <input type="date" name="date" class="form-control" required />
        </div>
      </div>

      <!-- Description de la Prescription -->
      <div class="control-group">
        <label class="control-label" style="text-align: start;" >Description</label>
        <div class="controls">
          <textarea name="description" class="form-control" rows="4" placeholder="Entrez la description de la prescription" required></textarea>
        </div>
        <div class="form-action">
          <button type="submit" class="success">Ajouter prescription</button>
        </div>
      </div>


    </div>

    
    <?php echo form_close(); ?>
  </div>
</div>

    </div>
  </div>
</div>
