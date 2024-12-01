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

					<?php echo ('Liste des docteurs'); ?>

                </a>
            </li>

		</ul>

    	<!------FIN DES ONGLETS DE CONTRÔLE------->

	</div>

	<div class="box-content padded">

		<div class="tab-content">

            <!----LISTE DES DOCTEURS---->

            <div class="tab-pane box active" id="list">
                <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive table-hover">
                    <thead>
                        <tr>
                            <th><div>#</div></th>
                            <th><div><?php echo ('Nom du docteur'); ?></div></th>
                            <th><div><?php echo ('Département'); ?></div></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 1; foreach($doctors as $row): ?>
                        <tr>
                            <td><?php echo $count++; ?></td>
							<td><?php echo $row['name']; ?></td>
							<td><?php echo $this->crud_model->get_type_name_by_id('department', $row['department_id']); ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
			</div>

            <!----FIN DE LA LISTE DES DOCTEURS---->

		</div>

	</div>

</div>
</body>
</html>
