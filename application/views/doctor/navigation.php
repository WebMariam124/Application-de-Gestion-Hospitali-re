<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="template/css/docteur.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div>
        <div class="sidebar">
            <div>
                <a href="<?php echo base_url();?>">
                    <img src="<?php echo base_url();?>uploads/image.png" alt="Logo HMS">
                </a>
            
            </div>
            <br>
            <ul>
                <li>
                    <a href="<?php echo base_url();?>index.php?doctor/dashboard">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Tableau de bord</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>index.php?doctor/manage_patient">
                        <i class="fas fa-users"></i>
                        <span>Patients</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>index.php?doctor/manage_appointment">
                        <i class="fas fa-calendar-check"></i>
                        <span>Gérer les Rendez-vous</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>index.php?doctor/manage_prescription">
                        <i class="fas fa-pills"></i>
                        <span>Gérer les Prescriptions</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>index.php?doctor/manage_bed_allotment">
                        <i class="fas fa-bed"></i>
                        <span>Affectation des Lits</span>
                    </a>
                </li>
              
                <li>
                    <a href="<?php echo base_url();?>index.php?doctor/manage_report">
                        <i class="fas fa-file-medical"></i>
                        <span>Gérer les Rapports</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>index.php?doctor/manage_medicine_category">
                        <i class="fas fa-file-medical"></i>
                        <span>Gérer les ctégories des médicaments</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>index.php?doctor/manage_medicine">
                        <i class="fas fa-file-medical"></i>
                        <span>Gérer les médicaments</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>index.php?doctor/view_blood_bank">
                    <i class="fas fa-tint"></i>
                        <span>Voir banque du sang</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>index.php?doctor/manage_profile">
                        <i class="fas fa-user-cog"></i>
                        <span>Profil</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</body>
</html>
