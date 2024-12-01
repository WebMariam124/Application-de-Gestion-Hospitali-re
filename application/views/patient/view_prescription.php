<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="template/css/patient.css">
   
</head>
<body>

<div class="box">

	<div class="box-header">

    	<!------ONGLETS DE CONTRÔLE DÉBUT------->

		<ul class="nav nav-tabs nav-tabs-left">

        	<?php if(isset($edit_profile)):?>

			<li class="active">
            	<a href="#edit" data-toggle="tab"><i class="icon-wrench"></i> 
					<?php echo ('Modifier l’ordonnance');?>
                </a>
            </li>

            <?php endif;?>

			<li class="<?php if(!isset($edit_profile))echo 'active';?>">
            	<a href="#list" data-toggle="tab"><i class="icon-align-justify"></i> 
					<?php echo ('Liste des ordonnances');?>
                </a>
            </li>

		</ul>

    	<!------ONGLETS DE CONTRÔLE FIN------->

	</div>

	<div class="box-content padded">

		<div class="tab-content">

        	<!----FORMULAIRE D'ÉDITION DÉBUT---->

        	<?php if(isset($edit_profile)):?>

			<div class="tab-pane box active" id="edit" style="padding: 5px">

                <div class="box-content">

                	<?php foreach($edit_profile as $row):?>

                    <form method="post" action="<?php echo base_url();?>index.php?doctor/manage_prescription/edit/do_update/<?php echo $row['prescription_id'];?>" class="form-horizontal validatable">

                        <div class="padded">
                            <!-- Traduisez ici les champs en français -->
                            <div class="control-group">
                                <label class="control-label"><?php echo ('Médecin');?></label>
                                <div class="controls" style="padding-top:5px;">
                                    <?php echo $this->crud_model->get_type_name_by_id('doctor',$row['doctor_id'],'name');?>
                                </div>
                            </div>

                            <!-- Continuez pour les autres champs -->

                        </div>

                    <?php echo form_close();?>

                    <!-- Ajoutez les sections restantes traduites ici -->

                    <?php endforeach;?>
                </div>

			</div>

            <?php endif;?>

            <!----FORMULAIRE D'ÉDITION FIN---->

            <!----LISTE TABLEAU DÉBUT---->

            <div class="tab-pane box <?php if(!isset($edit_profile))echo 'active';?>" id="list">
                <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive table-hover">
                	<thead>
                		<tr>
                    		<th><div>#</div></th>
                    		<th><div><?php echo ('Date');?></div></th>
                    		<th><div><?php echo ('Patient');?></div></th>
                    		<th><div><?php echo ('Médecin');?></div></th>
                    		<th><div><?php echo ('Options');?></div></th>
						</tr>
					</thead>

                    <tbody>
                    	<?php $count = 1;foreach($prescriptions as $row):?>
                        <tr>
                            <td><?php echo $count++;?></td>
                            <td><?php echo date('d M,Y', $row['creation_timestamp']);?></td>
							<td><?php echo $this->crud_model->get_type_name_by_id('patient',$row['patient_id'],'name');?></td>
							<td><?php echo $this->crud_model->get_type_name_by_id('doctor',$row['doctor_id'],'name');?></td>
							<td align="center">
                            	<a href="<?php echo base_url();?>index.php?patient/view_prescription/edit/<?php echo $row['prescription_id'];?>" class="btn btn-primary">
                                	<?php echo ('Voir l’ordonnance');?>
                                </a>
        					</td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
			</div>

            <!----LISTE TABLEAU FIN---->

		</div>
	</div>
</div>
