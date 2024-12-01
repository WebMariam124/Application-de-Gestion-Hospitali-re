<head>
    <link rel="stylesheet" href="template/css/admin.css">
</head>
<div class="box" >
    <div class="box-header">
        <!------CONTROL TABS START------->

        <ul class="nav nav-tabs nav-tabs-left">
            <li class="active">
                <a href="#list" data-toggle="tab">
                    <i class="icon-align-justify"></i> 
                    <?php echo ('Medicament');?>
                </a>
            </li>
        </ul>

        <!------CONTROL TABS END------->

    </div>

    <div class="box-content padded">
        <div class="tab-content">
            <!----TABLE LISTING STARTS--->
            <div class="tab-pane box active" id="list">
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th><div>#</div></th>
                            <th><div><?php echo ('Nom');?></div></th>
                            <th><div><?php echo ('Catégorie');?></div></th>
                            <th><div><?php echo ('Description');?></div></th>
                            <th><div><?php echo ('Prix');?></div></th>
                            <th><div><?php echo ('Entreprise de fabrication');?></div></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $count = 1; foreach($medicines as $row): ?>
                        <tr>
                            <td><?php echo $count++;?></td>
                            <td><?php echo $row['name'];?></td>
                            <td><?php echo $this->crud_model->get_type_name_by_id('medicine_category', $row['medicine_category_id'], 'name');?></td>
                            <td><?php echo $row['description'];?></td>
                            <td><?php echo $row['price'];?></td>
                            <td><?php echo $row['manufacturing_company'];?></td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
            <!----TABLE LISTING ENDS--->
        </div>
    </div>
</div>
