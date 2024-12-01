<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="template/css/admin.css">
</head>
<body>
<header>
    <div class="header-container">
        <a href="<?php echo base_url();?>" class="system-name">Système de Gestion Hospitalière</a>
    
        <nav class="header-menu">
            <ul>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle"><?php echo ('Compte'); ?></a>
                    <ul class="dropdown-menu">
                        <li class="with-image">
                        <span style="display: flex; align-items: center;">
                        <?php  
    $account_type = $this->session->userdata('login_type');  
    $account_id = $account_type . '_id';  
    $user_id = $this->session->userdata($account_id); 
    $name = $this->crud_model->get_type_name_by_id($account_type, $user_id, 'name');  
    
    $profile_image = $this->crud_model->get_type_name_by_id($account_type, $user_id, 'profile_image');
    if (!$profile_image) {
        if ($account_type == 'doctor') {
            $image_url = base_url('uploads/docteur.jpg'); 
        }
        if ($account_type == 'admin') {
            $image_url = base_url('uploads/admin.jpg');  
        }
        if ($account_type == 'patient'){
            $image_url = base_url('uploads/patient.jpg');  
        }
    } else {
        $image_url = base_url('uploads/' . $profile_image);
    }
    echo '<img src="' . $image_url . '" alt="' . $account_type . '" style="width: 40px; height: 40px; border-radius: 50%; margin-right: 5px;">';
    echo $name;
?>

</span>

                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php?<?php echo $this->session->userdata('login_type'); ?>/manage_profile">
                                <?php echo ('Profile'); ?>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php?login/logout"><?php echo ('Se déconnecter'); ?></a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <ul class="dropdown-menu">
                        <?php
                        $fields = $this->db->list_fields('language');
                        foreach ($fields as $field) {
                            if ($field == 'phrase_id' || $field == 'phrase') continue;
                            ?>
                            <li>
                               
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </li>
                <li>
                    <a href="#"><i></i><?php echo ($this->session->userdata('login_type')) . ' ' . get_phrase('panneau'); ?></a>
                </li>
            </ul>
        </nav>
    </div>
</header>
