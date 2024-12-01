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
    	<!------ONGLETS DE CONTRÔLE------->

		<ul class="nav nav-tabs nav-tabs-left">
			<li class="active">
            	<a href="#list" data-toggle="tab"><i class="icon-align-justify"></i> 
					<?php echo ('Liste des lits attribués'); ?>
                </a>
            </li>
		</ul>

    	<!------FIN DES ONGLETS DE CONTRÔLE------->
	</div>

	<div class="box-content padded">
		<div class="tab-content">
            <!----LISTE DES LITS ATTRIBUÉS---->
            <div class="tab-pane box active" id="list">
                <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive table-hover">
                    <thead>
                        <tr>
                            <th><div>#</div></th>
                            <th><div><?php echo ('Numéro du lit'); ?></div></th>
                            <th><div><?php echo ('Type de lit'); ?></div></th>
                            <th><div><?php echo ('Patient'); ?></div></th>
                            <th><div><?php echo ('Date et heure d\'attribution'); ?></div></th>
                            <th><div><?php echo ('Date et heure de sortie'); ?></div></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 1; foreach($bed_allotments as $row): ?>
                        <tr>
                            <td><?php echo $count++; ?></td>
							<td><?php echo $this->crud_model->get_type_name_by_id('bed', $row['bed_id'], 'bed_number'); ?></td>
                            <td><?php echo $this->crud_model->get_type_name_by_id('bed', $row['bed_id'], 'type'); ?></td>
							<td><?php echo $this->crud_model->get_type_name_by_id('patient', $row['patient_id'], 'name'); ?></td>
                            <td><?php echo ($row['allotment_timestamp']); ?></td>
                            <td><?php echo ($row['discharge_timestamp']); ?></td>
							
        					<!-- Ajouter des boutons ou options ici -->
        					</td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
			</div>
            <!----FIN DE LA LISTE DES LITS ATTRIBUÉS---->
		</div>
	</div>
</div>

</body>
</html>
