<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Système de Gestion Hospitalière</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="template/css/admin.css">
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <div style="text-align: center; padding-bottom: 20px;">
            <a href="<?php echo base_url(); ?>">
                <img src="<?php echo base_url(); ?>uploads/image.png" alt="Logo HMS"/>
            </a>
        </div>
        <ul>
            <li class="<?php if($page_name == 'dashboard') echo 'active'; ?>">
                <a href="<?php echo base_url(); ?>index.php?admin/dashboard">
                    <i class="fas fa-tachometer-alt"></i> <span>Tableau de bord</span>
                </a>
            </li>
            <li class="<?php if($page_name == 'manage_patient') echo 'active'; ?>">
                <a href="<?php echo base_url(); ?>index.php?admin/manage_patient">
                    <i class="fas fa-users"></i> <span>Patients</span>
                </a>
            </li>
           
            <li class="<?php if($page_name == 'manage_doctor') echo 'active'; ?>">
                <a href="<?php echo base_url(); ?>index.php?admin/manage_doctor">
                    <i class="fas fa-user-md"></i> <span>Docteurs</span>
                </a>
            </li>
            <li class="<?php if($page_name == 'manage_nurse') echo 'active'; ?>">
                <a href="<?php echo base_url(); ?>index.php?admin/manage_nurse">
                    <i class="fas fa-plus-circle"></i> <span>Infirmiers</span>
                </a>
            </li>

                    <li class="<?php if($page_name == 'view_appointment') echo 'active'; ?>">
                        <a href="<?php echo base_url(); ?>index.php?admin/view_appointment">
                            <i class="fas fa-exchange-alt"></i> Voir les rendez-vous
                        </a>
                    </li>
                   
                    <li class="<?php if($page_name == 'view_blood_bank') echo 'active'; ?>">
                        <a href="<?php echo base_url(); ?>index.php?admin/view_blood_bank">
                            <i class="fas fa-tint"></i> Voir la banque de sang
                        </a>
                    </li>
                    <li class="<?php if($page_name == 'view_medicine') echo 'active'; ?>">
                        <a href="<?php echo base_url(); ?>index.php?admin/view_medicine">
                            <i class="fas fa-pills"></i> Voir les médicaments
                        </a>
                    </li>
                    <li class="<?php if($page_name == 'view_report') echo 'active'; ?>">
                        <a href="<?php echo base_url(); ?>index.php?admin/view_report">
                            <i class="fas fa-file-medical"></i> Voir les rapports
                        </a>
                    </li>
                    <li class="<?php if($page_name == 'system_settings') echo 'active'; ?>">
                        <a href="<?php echo base_url(); ?>index.php?admin/manage_profile">
                        <i class="fas fa-user-cog"></i> Profile
                        </a>
                    </li>

                    <li class="<?php if($page_name == 'system_settings') echo 'active'; ?>">
                        <a href="<?php echo base_url(); ?>index.php?admin/system_settings">
                            <i class="fas fa-cogs"></i> Paramètres système
                        </a>
                    </li>
            </li>
        </ul>
    </div>

</body>
</html>
<script>
    // Fonction pour ajouter l'effet de rotation sur l'icône au survol
    const menuItems = document.querySelectorAll('#view_hospital_submenu li a, #settings_submenu li a');

    menuItems.forEach(item => {
        item.addEventListener('mouseover', function () {
            const icon = this.querySelector('i');
            icon.style.transform = 'rotate(15deg)';
        });

        item.addEventListener('mouseout', function () {
            const icon = this.querySelector('i');
            icon.style.transform = 'rotate(0deg)';
        });
    });
</script>
