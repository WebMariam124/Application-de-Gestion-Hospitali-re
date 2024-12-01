<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="template/css/patient.css">
</head>
<body>
<div style="	background-color: rgb(72, 110, 170);">
<div class="sidebar">

    <div style="text-align: center; padding-bottom: 20px;">
        <a href="<?php echo base_url();?>">
            <img src="<?php echo base_url();?>uploads/image.png" alt="Logo HMS"/>
        </a>
    </div>
    <ul>
        <li><a href="<?php echo base_url();?>index.php?patient/dashboard"><i class="fas fa-tachometer-alt"></i> <span>Tableau de bord</span></a></li>
        <li><a href="<?php echo base_url();?>index.php?patient/view_appointment"><i class="fas fa-calendar-check"></i> <span>Voir les Rendez-vous</span></a></li>
        <li><a href="<?php echo base_url();?>index.php?patient/view_prescription"><i class="fas fa-pills"></i> <span>Voir les Prescriptions</span></a></li>
        <li><a href="<?php echo base_url();?>index.php?patient/view_doctor"><i class="fas fa-user-md"></i> <span>Voir les Médecins</span></a></li>
        <li><a href="<?php echo base_url();?>index.php?patient/view_blood_bank"><i class="fas fa-tint"></i> <span>Voir la Banque de Sang</span></a></li>
        <li><a href="<?php echo base_url();?>index.php?patient/view_admit_history"><i class="fas fa-bed"></i> <span>Historique d'Admission</span></a></li>
        <li><a href="<?php echo base_url();?>index.php?patient/manage_profile"><i class="fas fa-user-cog"></i> <span>Profile</span></a></li>
    </ul>
</div></div>
</body>
</html>
