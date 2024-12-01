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
					<?php echo ('Liste des donneurs de sang'); ?>
                </a>
            </li>
			<li>
            	<a href="#list_blood_bank" data-toggle="tab"><i class="icon-align-justify"></i>
					<?php echo ('Banque de sang'); ?>
                </a>
            </li>
		</ul>

    	<!------FIN DES ONGLETS DE CONTRÔLE------->
	</div>

	<div class="box-content padded">
		<div class="tab-content">

            <!----LISTE DES DONNEURS DE SANG---->
            <div class="tab-pane box active" id="list">
                <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive table-hover">
                    <thead>
                        <tr>
                            <th><div>#</div></th>
                            <th><div><?php echo ('Nom'); ?></div></th>
                            <th><div><?php echo ('Âge'); ?></div></th>
                            <th><div><?php echo ('Sexe'); ?></div></th>
                            <th><div><?php echo ('Groupe sanguin'); ?></div></th>
                            <th><div><?php echo ('Dernier don'); ?></div></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 1; foreach($blood_donors as $row): ?>
                        <tr>
                            <td><?php echo $count++; ?></td>
							<td><?php echo $row['name']; ?></td>
							<td><?php echo $row['age']; ?></td>
							<td><?php echo $row['sex']; ?></td>
							<td><?php echo $row['blood_group']; ?></td>
							<td><?php echo date('d M,Y', $row['last_donation_timestamp']); ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
			</div>
            <!----FIN DE LA LISTE DES DONNEURS---->

			<!----LISTE DE LA BANQUE DE SANG---->
			<div class="tab-pane box" id="list_blood_bank">
                <div class="box-content">
                    <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive table-hover">
                        <thead>
                            <tr>
                                <th><div>#</div></th>
                                <th><div><?php echo ('Groupe sanguin'); ?></div></th>
                                <th><div><?php echo ('Statut'); ?></div></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $count = 1; foreach($blood_bank as $row): ?>
                            <tr>
                                <td><?php echo $count++; ?></td>
                                <td><?php echo $row['blood_group']; ?></td>
                                <td><?php echo $row['status']; ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>  
                </div>                
			</div>
			<!----FIN DE LA LISTE DE LA BANQUE DE SANG---->
		</div>
	</div>
</div>
</body>
</html>
