<head>
    <link rel="stylesheet" href="template/css/docteur.css">
</head>
<div class="box">

	<div class="box-header">

    	<!------CONTROL TABS START------->

		<ul class="nav nav-tabs nav-tabs-left">

        	<?php if(isset($edit_profile)):?>

			<li class="active">

            	<a href="#edit" data-toggle="tab" style="color: #333;"><i class="icon-wrench"></i> 

					<?php echo ('Modifier le médicament');?> 

                    	</a></li>

            <?php endif;?> 

			<li class="<?php if(!isset($edit_profile))echo 'active';?>">

            	<a href="#list" data-toggle="tab"  style="color: #333;"><i class="icon-align-justify"></i> 

					<?php echo ('Liste des médicaments');?> 

                    	</a></li>

			<li>

            	<a href="#add" data-toggle="tab"  style="color: #333;"><i class="icon-plus"></i>

					<?php echo ('Ajouter un médicament');?> 

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

                    <?php echo form_open('doctor/manage_medicine/edit/do_update/'.$row['medicine_id'] , array('class' => 'form-horizontal validatable'));?>

                        <div class="padded">

                            <div class="control-group">

                                <label class="control-label"><?php echo ('Nom');?></label>

                                <div class="controls">

                                    <input type="text" class="validate[required]" name="name" value="<?php echo $row['name'];?>"/>

                                </div>

                            </div>

                            <div class="control-group">

                                <label class="control-label"><?php echo ('Catégorie du médicament');?></label>

                                <div class="controls">

                                    <select name="medicine_category_id" class="uniform" style="width:100%;">

                                    	<?php 

										$medicine_categories = $this->db->get('medicine_category')->result_array();

										foreach($medicine_categories as $row2):

										?>

                                    		<option value="<?php echo $row['medicine_category_id'];?>" <?php if($row2['medicine_category_id']==$row['medicine_category_id'])echo 'selected';?>> 

												<?php echo $row2['name'];?> 

                                                	</option>

                                        <?php

										endforeach;

										?>

                                    </select>

                                </div>

                            </div>

                            <div class="control-group">

                                <label class="control-label"><?php echo ('Description');?></label>

                                <div class="controls">

                                    <input type="text" class="" name="description" value="<?php echo $row['description'];?>"/>

                                </div>

                            </div>

                            <div class="control-group">

                                <label class="control-label"><?php echo ('Prix');?></label>

                                <div class="controls">

                                    <input type="text" class="" name="price" value="<?php echo $row['price'];?>"/>

                                </div>

                            </div>

                            <div class="control-group">

                                <label class="control-label"><?php echo ('Entreprise de fabrication');?></label>

                                <div class="controls">

                                    <input type="text" class="" name="manufacturing_company" value="<?php echo $row['manufacturing_company'];?>"/>

                                </div>

                            </div>

                            <div class="control-group">

                                <label class="control-label"><?php echo ('Statut');?></label>

                                <div class="controls">

                                    <input type="text" class="" name="status" value="<?php echo $row['status'];?>"/>

                                </div>

                            </div>

                        </div>

                        <div class="form-actions">

                            <button type="submit" class="btn btn-primary"><?php echo ('Modifier le médicament');?></button>

                        </div>

                    <?php echo form_close();?> 

                    <?php endforeach;?>

                </div>

			</div>

            <?php endif;?> 

            <!----FORMULAIRE DE MODIFICATION END--->

            

            <!----LISTE DES MÉDICAMENTS STARTS--->

            <div class="tab-pane box <?php if(!isset($edit_profile))echo 'active';?>" id="list">

			

                <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive table-hover">

                	<thead>

                		<tr>

                    		<th><div>#</div></th>

                    		<th><div><?php echo ('Nom du médicament');?></div></th>

                    		<th><div><?php echo ('Catégorie du médicament');?></div></th>

                    		<th><div><?php echo ('Description');?></div></th>

                    

                    		<th><div><?php echo ('Options');?></div></th>

						</tr>

					</thead>

                    <tbody>

                    	<?php $count = 1;foreach($medicines as $row):?>

                        <tr>

                            <td><?php echo $count++;?></td>

							<td><?php echo $row['name'];?></td>

							<td><?php echo $this->crud_model->get_type_name_by_id('medicine_category',$row['medicine_category_id'],'name');?></td>

							<td><?php echo $row['description'];?></td>
							<td align="center">

                            	<a href="<?php echo base_url();?>index.php?doctor/manage_medicine/edit/<?php echo $row['medicine_id'];?>"

                                	rel="tooltip" data-placement="top" data-original-title="<?php echo ('Modifier');?>" class="btn btn-primary">

                                    <i class="icon-wrench"></i> Modifier

                                </a>

                            	<a href="<?php echo base_url();?>index.php?doctor/manage_medicine/delete/<?php echo $row['medicine_id'];?>" onclick="return confirm('Voulez-vous supprimer?')"

                                	rel="tooltip" data-placement="top" data-original-title="<?php echo ('Supprimer');?>" class="btn btn-danger">

                                    <i class="icon-trash"></i> Supprimer

                                </a>

        					</td>

                        </tr>

                        <?php endforeach;?>

                    </tbody>

                </table>

			</div>

            <!----LISTE DES MÉDICAMENTS END--->

            

            

			<!----FORMULAIRE DE CRÉATION STARTS---->

			<div class="tab-pane box" id="add" style="padding: 5px">

                <div class="box-content">

                    <?php echo form_open('doctor/manage_medicine/create/' , array('class' => 'form-horizontal validatable'));?>

                        <div class="padded">

                            <div class="control-group">

                                <label class="control-label" style="text-align: start;"><?php echo ('Nom');?></label>

                                <div class="controls">

                                    <input type="text" class="fill-up-input" name="name"/>

                                </div>

                            </div>

                            <div class="control-group">

                                <label class="control-label" style="text-align: start;"><?php echo ('Catégorie du médicament');?></label>

                                <div class="controls">

                                    <select name="medicine_category_id" class="uniform">

                                    	<?php 

										$medicine_categories = $this->db->get('medicine_category')->result_array();

										foreach($medicine_categories as $row):

										?>

                                    		<option value="<?php echo $row['medicine_category_id'];?>"><?php echo $row['name'];?></option>

                                        <?php

										endforeach;

										?>

                                    </select>

                                </div>

                            </div>

                            <div class="control-group">

                                <label class="control-label" style="text-align: start;"><?php echo ('Description');?></label>

                                <div class="controls">
          <textarea name="description" class="form-control" rows="4" placeholder="Entrez la description de la prescription" required></textarea>
        </div>
                                <div class="form-action">

                            <button type="submit" class="success"><?php echo ('Ajouter le médicament');?></button>

                              </div>
                            </div>

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
