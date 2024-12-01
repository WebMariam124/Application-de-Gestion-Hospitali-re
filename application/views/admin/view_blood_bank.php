<div class="box" >
    <div class="box-header">
        <!------CONTROL TABS START------->

        <ul class="nav nav-tabs nav-tabs-left">
            <li class="active">
                <a href="#list" data-toggle="tab">
                    <i class="icon-align-justify"></i> 
                    <?php echo ('Liste des donneurs de sang');?>
                </a>
            </li>
            <li>
                <a href="#list_blood_bank" data-toggle="tab">
                    <i class="icon-align-justify"></i>
                    <?php echo ('Banque du sang');?>
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
                            <th><div><?php echo ('Age');?></div></th>
                            <th><div><?php echo ('Sex');?></div></th>
                            <th><div><?php echo ('Groupe sanguin');?></div></th>
                            <th><div><?php echo ('Date du dernier don');?></div></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $count = 1; foreach($blood_donors as $row): ?>
                        <tr>
                            <td><?php echo $count++;?></td>
                            <td><?php echo $row['name'];?></td>
                            <td><?php echo $row['age'];?></td>
                            <td><?php echo $row['sex'];?></td>
                            <td><?php echo $row['blood_group'];?></td>
                            <td><?php echo date('d M,Y',$row['last_donation_timestamp']);?></td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
            <!----TABLE LISTING ENDS--->

            <!----CREATION FORM STARTS--->
            <div class="tab-pane box" id="list_blood_bank">
                <div class="box-content">
                    <table class="custom-table">
                        <thead>
                            <tr>
                                <th><div>#</div></th>
                                <th><div><?php echo (' Groupe Sanguin');?></div></th>
                                <th><div><?php echo ('Status');?></div></th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $count = 1; foreach($blood_bank as $row): ?>
                            <tr>
                                <td><?php echo $count++;?></td>
                                <td><?php echo $row['blood_group'];?></td>
                                <td><?php echo $row['status'];?></td>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>                 
            </div>
            <!----CREATION FORM ENDS--->
        </div>
    </div>
</div>
<style>
	/* Styles personnalisés pour améliorer la table et les boutons */
.custom-table {
    font-family: Arial, sans-serif;
    font-size: 10px;
    color: #333;
    border-collapse: collapse;
    width: 100%;
    margin: 20px 0;
}

.custom-table thead th {
    font-size: 13px;
    font-weight: bold;
    text-transform: uppercase;
    background-color: #4fa3d1;
    color: white;
    padding: 12px;
}

.custom-table tbody td {
    font-size: 16px;
    padding: 12px;
    text-align: center;
    border: 1px solid #ddd;
}



/* Style pour les liens dans les tableaux */
.custom-table tbody td a {
    text-decoration: none;
    color: #0077b6;
}

.custom-table tbody td a:hover {
    text-decoration: underline;
}

/* Style de la box */
.box {
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 5px;
    padding: 20px;
    margin-bottom: 30px;
}

/* Style de la box-header */
.box-header {
    background-color: #4fa3d1;
    padding: 10px;
    border-radius: 5px;
    color: white;
}

/* Style des onglets */
.nav-tabs-left {
    padding-left: 0;
    border-bottom: 2px solid #ddd;
}

.nav-tabs-left li {
    display: inline-block;
    margin-right: 10px;
}

.nav-tabs-left li.active {
    background-color: #0077b6;
    border-radius: 5px;
}

.nav-tabs-left li a {
    color: white;
    font-weight: bold;
    text-decoration: none;
    padding: 10px;
    display: block;
}

.nav-tabs-left li a:hover {
    background-color: #005f80;
}

/* Style du contenu de la box */
.box-content {
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 5px;
}

</style>