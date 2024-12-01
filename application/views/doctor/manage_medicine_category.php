<style>
        /* Style de la table */
        table {
            font-family: Arial, sans-serif;
            font-size: 10px;
            color: #333;
            border-collapse: collapse;
            width: 100%;
            margin: 10px 0;
        }

        thead th {
            font-size: 13px;
            font-weight: bold;
            text-transform: uppercase;
            background-color: #4fa3d1;
            color: white;
            padding: 12px;
            text-align: center;
        }

        tbody td {
            font-size: 16px;
            padding: 12px;
            text-align: center;
            border: 1px solid #ddd;
        }

        /* Style des boutons */
        .btn-primary, .btn-danger {
            padding: 8px 12px;
            font-size: 14px;
            text-decoration: none;
            border-radius: 5px;
            margin: 5px;
            color: white;
            display: inline-block;
        }

        .btn-primary {
            background-color: #4fa3d1;
        }

        .btn-primary:hover {
            background-color: #4fa3d1; 
        }

        .btn-danger {
            background-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #b02a37; 
        }

        /* Style des infobulles */
        [rel="tooltip"] {
            position: relative;
            cursor: pointer;
        }

        [rel="tooltip"]:hover::after {
            content: attr(data-original-title);
            position: absolute;
            top: -30px;
            left: 50%;
            transform: translateX(-50%);
            background-color: black;
            color: white;
            padding: 6px 10px;
            border-radius: 4px;
            font-size: 12px;
            white-space: nowrap;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.15);
        }

        /* Groupe de boutons pour l'alignement */
        .button-group {
            display: flex;
            gap: 10px;
            justify-content: center;
        }

        /* Style des champs de formulaire */
        input, select {
            width: 100%; /* Champs à 100% de largeur */
            padding: 8px; /* Ajouter un peu de padding */
            margin: 0; /* Éliminer l'espace entre le champ et le bord gauche */
            box-sizing: border-box; /* Inclure le padding dans la largeur */
        }

        /* Style des labels */
        label {
            font-weight: bold; /* Mettre les labels en gras */
            margin-bottom: 5px; /* Espacement sous le label */
            display: block; /* S'assurer que les labels occupent toute la largeur */
        }

        /* Supprimer l'espacement à gauche des champs de formulaire */
        .control-group {
            margin-left: 0; /* Retirer l'espace à gauche */
            margin-bottom: 10px; /* Ajouter un peu d'espace sous chaque champ pour séparer les éléments */
        }

        /* Alignement des boutons */
        .button-group {
            display: flex;
            gap: 10px; /* Espacement entre les boutons */
            justify-content: center;
        }

        /* Style général pour les formulaires */
        .form-horizontal {
            margin: 0; /* Supprimer les marges par défaut */
        }
    </style>
<div class="box">

	<div class="box-header">

    	<!------CONTROL TABS START------->

		<ul class="nav nav-tabs nav-tabs-left">

        	<?php if(isset($edit_profile)):?>

			<li class="active">

            	<a href="#edit" data-toggle="tab" style="color: #333;"><i class="icon-wrench"></i> 

					<?php echo ('Modifier la catégorie de médicament');?> 

                    	</a></li>

            <?php endif;?> 

			<li class="<?php if(!isset($edit_profile))echo 'active';?>">

            	<a href="#list" data-toggle="tab" style="color: #333;"><i class="icon-align-justify"></i> 

					<?php echo ('Liste des catégories de médicaments');?> 

                    	</a></li>

			<li>

            	<a href="#add" data-toggle="tab" style="color: #333;"><i class="icon-plus"></i>

					<?php echo ('Ajouter une catégorie de médicament');?> 

                    	</a></li>

		</ul>

    	<!------CONTROL TABS END------->

	</div>

	<div class="box-content padded">

		<div class="tab-content">

        	<!----FORMULAIRE DE MODIFICATION START---->

        	<?php if(isset($edit_profile)):?>

			<div class="tab-pane box active" id="edit" style="padding: 5px">

                <div class="box-content">

                	<?php foreach($edit_profile as $row):?>

                    <?php echo form_open('doctor/manage_medicine_category/edit/do_update/'.$row['medicine_category_id'] , array('class' => 'form-horizontal validatable'));?>

                        <div class="padded">

                            <div class="control-group">

                                <label class="control-label"><?php echo ('Nom de la catégorie de médicament');?></label>

                                <div class="controls">

                                    <input type="text" class="validate[required]" name="name" value="<?php echo $row['name'];?>"/>

                                </div>

                            </div>

                            <div class="control-group">

                                <label class="control-label"><?php echo ('Description de la catégorie de médicament');?></label>

                                <div class="controls">

                                    <input type="text" class="" name="description" value="<?php echo $row['description'];?>"/>

                                </div>

                            </div>

                        </div>

                        <div class="form-actions">

                            <button type="submit" class="btn btn-primary"><?php echo ('Modifier');?></button>

                        </div>

                    <?php echo form_close();?> 

                    <?php endforeach;?>

                </div>

			</div>

            <?php endif;?> 

            <!----FORMULAIRE DE MODIFICATION END--->

            

            <!----LISTE DES CATÉGORIES STARTS--->

            <div class="tab-pane box <?php if(!isset($edit_profile))echo 'active';?>" id="list">

			

                <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive table-hover">

                	<thead>

                		<tr>

                    		<th><div>#</div></th>

                    		<th><div><?php echo ('Nom de la catégorie de médicament');?></div></th>

                    		<th><div><?php echo ('Description');?></div></th>

                    		<th><div><?php echo ('Options');?></div></th>

						</tr>

					</thead>

                    <tbody>

                    	<?php $count = 1;foreach($medicine_categories as $row):?>

                        <tr>

                            <td><?php echo $count++;?></td>

							<td><?php echo $row['name'];?></td>

							<td><?php echo $row['description'];?></td>

							<td align="center">

                            	<a href="<?php echo base_url();?>index.php?doctor/manage_medicine_category/edit/<?php echo $row['medicine_category_id'];?>"

                                	rel="tooltip" data-placement="top" data-original-title="<?php echo ('Modifier');?>" class="btn btn-primary">

                                    <i class="icon-wrench"></i>Modifier

                                </a>

                            	<a href="<?php echo base_url();?>index.php?doctor/manage_medicine_category/delete/<?php echo $row['medicine_category_id'];?>" onclick="return confirm('Voulez-vous supprimer cette catégorie ?')"

                                	rel="tooltip" data-placement="top" data-original-title="<?php echo ('Supprimer');?>" class="btn btn-danger">

                                    <i class="icon-trash"></i>Supprimer

                                </a>

        					</td>

                        </tr>

                        <?php endforeach;?>

                    </tbody>

                </table>

			</div>

            <!----LISTE DES CATÉGORIES END--->

            

            

			<!----FORMULAIRE DE CRÉATION STARTS---->

			<div class="tab-pane box" id="add" style="padding: 5px">

                <div class="box-content">

                    <?php echo form_open('doctor/manage_medicine_category/create/' , array('class' => 'form-horizontal validatable'));?>

                        <div class="padded">

                            <div class="control-group">

                                <label class="control-label"><?php echo ('Nom de la catégorie de médicament');?></label>

                                <div class="controls">

                                    <input type="text" class="validate[required]" name="name"/>

                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label"><?php echo ('Description de la catégorie de médicament');?></label>
                                <div class="controls">
                                    <input type="text" class="" name="description"/>
                                </div>
                                <div class="form-action">
                            <button type="submit" class="success"><?php echo ('Ajouter une catégorie de médicament');?></button>
                            </div>
                            </div>

                        </div>

                    <?php echo form_close();?>                

                </div>                

			</div>

			<!----FORMULAIRE DE CRÉATION END--->

		</div>

	</div>

</div>
