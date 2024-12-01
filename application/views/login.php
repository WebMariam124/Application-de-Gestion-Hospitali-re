<!DOCTYPE html>
<html lang="fr">
<head>
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <title>Login | <?php echo $system_title;?></title>
    <link rel="stylesheet" href="template/css/login.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <?php include 'includes.php'; ?>
  
</head>
<body>

    <?php if($this->session->flashdata('flash_message') != ""):?>
        <script>
            $(document).ready(function() {
                Growl.info({title:"<?php echo $this->session->flashdata('flash_message');?>", text:" "});
            });
        </script>
    <?php endif; ?>

    <div class="login-box">
        <h4>Système de Gestion d'Hopitale</h4>
        <form method="post" action="<?php echo base_url('index.php/login'); ?>" class="separate-sections">
            <!-- CSRF Token -->
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
            
            <!-- Type de compte -->
            <div class="row">
                <div class="col">
                    <a href="#" onclick="selectImage(this, 'admin');">
                        <img src="<?php echo base_url('uploads/admin.jpg'); ?>" alt="Admin" id="admin-img">
                        <p>Admin</p>
                    </a>
                </div>
                <div class="col">
                    <a href="#" onclick="selectImage(this, 'doctor');">
                        <img src="<?php echo base_url('uploads/docteur.jpg'); ?>" alt="Doctor" id="doctor-img">
                        <p>Docteur</p>
                    </a>
                </div>
                <div class="col">
                    <a href="#" onclick="selectImage(this, 'patient');">
                        <img src="<?php echo base_url('uploads/patient.jpg'); ?>" alt="Patient" id="patient-img">
                        <p>Patient</p>
                    </a>
                </div>
            </div>

            <!-- Champ caché pour type de compte -->
            <input type="hidden" name="login_type" id="login_type" value="">

            <!-- Email et mot de passe -->
            <input name="email" type="text" placeholder="Email" required>
            <input name="password" type="password" placeholder="Password" required>
            
            <button type="submit">
                <?php echo ('Se Connecter');?>
            </button>
        </form>

        <div>
            <a data-toggle="modal" href="#modal-simple"><?php echo ('Mot de Passe?');?></a>
        </div>
    </div>

    <!-- Modal pour réinitialiser le mot de passe -->
    <div id="modal-simple" class="modal hide fade">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h6><?php echo ('Reset Password');?></h6>
        </div>
        <div class="modal-body">
        <form action="<?php echo base_url('index.php/login/reset_password'); ?>" method="post">
        <!-- CSRF Protection -->
        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" 
               value="<?php echo $this->security->get_csrf_hash(); ?>">

        <!-- Type de compte -->
        <label for="account_type">Account Type:</label>
        <select name="account_type" id="account_type" required>
            <option value="">Select Account Type</option>
            <option value="admin">Admin</option>
            <option value="doctor">Doctor</option>
            <option value="patient">Patient</option>
        </select>

        <!-- Email -->
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" placeholder="Enter your email" required>

        <!-- Bouton Reset -->
        <button type="submit">Reset</button>
    </form>

        </div>
        <div class="modal-footer">
            <button class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
    </div>
    <script>
        function selectImage(element, type) {
            // Supprime la classe 'selected' de toutes les images
            document.querySelectorAll('.login-box img').forEach(img => img.classList.remove('selected'));

            // Ajoute la classe 'selected' à l'image cliquée
            const image = element.querySelector('img');
            image.classList.add('selected');

            // Met à jour le champ caché avec le type sélectionné
            document.getElementById('login_type').value = type;
        }
    </script>
<style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('<?php echo base_url('uploads/loge.jpg'); ?>');
            background-size: cover;
            overflow: hidden;
        }

        .login-box {
            background: rgba(255, 255, 255, 0.8);
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            width: 350px;
            height: 500px;
            text-align: center;
            position: relative;
            animation: slideIn 1s ease-in-out;
        }

        .login-box h4 {
            font-size: 28px;
             font-weight: 600;
             color: #333;
             margin-bottom: -20px;
             line-height: 1.4; /* Augmente l'espacement entre les lignes si le texte se déplace sur plusieurs lignes */
             word-wrap: break-word; /* Assure que le texte long se divise correctement */
       }



        .login-box img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            margin: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .login-box img:hover {
            transform: scale(1.1);
        }

        .login-box img.selected {
            transform: scale(1.2);  /* Augmente la taille de l'image pour montrer la sélection */
            box-shadow: 0 6px 15px rgba(0, 123, 255, 0.6);  /* Ajoute une ombre bleue pour un effet visuel */
        }

        .login-box .row {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin-bottom: 20px;
        }

        .login-box input[type="text"],
        .login-box input[type="password"],
        .login-box select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            background-color: #f4f4f4;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .login-box input[type="text"]:focus,
        .login-box input[type="password"]:focus,
        .login-box select:focus {
            border: 2px solid #007bff;
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 123, 255, 0.3);
        }

        .login-box button {
            width: 105%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;      
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .login-box button:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        .login-box a {
            color: #007bff;
            font-size: 14px;
            text-decoration: none;
            margin-top: 15px;
            display: inline-block;
            transition: color 0.3s ease;
        }

        .login-box a:hover {
            color: #0056b3;
            text-decoration: underline;
        }

        @keyframes slideIn {
            0% { opacity: 0; transform: translateY(-50px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        /* Modal Styles */
        .modal-body input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        .modal-footer {
            padding-top: 10px;
        }

        @media screen and (max-width: 768px) {
            .login-box {
                width: 90%;
                padding: 25px;
            }

            .login-box img {
                width: 100px;
                height: 100px;
            }
        }
</style>
</body>
</html>
