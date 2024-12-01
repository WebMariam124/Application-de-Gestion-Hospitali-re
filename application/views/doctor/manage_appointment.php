<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="template/css/docteur.css">
</head>
<body>
    
<br>

<div class="box">

    <div class="box-header">

        <!------CONTROL TABS START------->

        <ul class="nav nav-tabs nav-tabs-left">

            <?php if(isset($edit_profile)):?>

            <li class="active" style="color: black;">

                <a href="#edit" data-toggle="tab"><i class="icon-wrench"></i> 

                    <?php echo ('Modifier le rendez-vous');?>

                    </a></li>

            <?php endif;?>

            <li class="<?php if(!isset($edit_profile))echo 'active';?>">

                <a href="#list" data-toggle="tab" style="color: black;"><i class="icon-align-justify"></i> 

                    <?php echo ('Liste des rendez-vous');?>

                    </a></li>

            <li>

                <a href="#add" data-toggle="tab" style="color: black;"><i class="icon-plus"></i>

                    <?php echo ('Ajouter un rendez-vous');?>

                    </a></li>

        </ul>

        <!------CONTROL TABS END------->

    </div>

    <div class="box-content padded">

        <div class="tab-content">

            <!----FORMULAIRE DE MODIFICATION START---->

            <?php if(isset($edit_profile)):?>

            <div class="tab-pane box active" id="edit" >

                <div class="box-content">

                    <?php foreach($edit_profile as $row):?>

                    <?php echo form_open('doctor/manage_appointment/edit/do_update/'.$row['appointment_id'] , array('class' => 'form-horizontal validatable'));?>

                        <div class="padded">

                            <div class="control-group">

                                <label class="control-label"><?php echo ('Médecin  :');?></label>

                                <div class="controls" style="padding-top:6px;" >

                                    <?php echo $this->crud_model->get_type_name_by_id('doctor' ,$this->session->userdata('doctor_id') , 'name');?>

                                    <input type="hidden" name="doctor_id" value="<?php echo $this->session->userdata('doctor_id');?>"  />

                                </div>

                            </div>

                            <div class="control-group">

                                <label class="control-label"><?php echo ('Patient');?></label>

                                <div class="controls">

                                    <select class="chzn-select" name="patient_id">

                                        <?php 

                                        $this->db->order_by('account_opening_timestamp' , 'asc');

                                        $patients = $this->db->get('patient')->result_array();

                                        foreach($patients as $row2):

                                        ?>

                                        	<option value="<?php echo $row2['patient_id'];?>" <?php if($row2['patient_id'] == $row['patient_id'])echo 'selected';?>>

												<?php echo $row2['name'];?></option>

                                        <?php

                                        endforeach;

                                        ?>

                                    </select>

                                </div>

                            </div>

                            <div class="control-group">

                                <label class="control-label"><?php echo ('Date');?></label>

                                <div class="controls">

                                    <input type="text" class="datepicker fill-up" name="appointment_timestamp" value="<?php echo date('m/d/Y', $row['appointment_timestamp']);?>"/>

                                </div>

                            </div>

                        </div>

                        <div class="form-actions">

                            <button type="submit" class="btn btn-primary"><?php echo ('Modifier le rendez-vous');?></button>

                        </div>

                    <?php echo form_close();?>

                    <?php endforeach;?>

                </div>

            </div>

            <?php endif;?>

            <!----FORMULAIRE DE MODIFICATION END--->

            <!----LISTE DES RENDEZ-VOUS STARTS--->

            <div class="tab-pane box <?php if(!isset($edit_profile))echo 'active';?>" id="list">

                
            <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Date</th>
            <th>Patient</th>
            <th>Médecin</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
        <?php $count = 1; foreach ($appointments as $row): ?>
            <tr>
                <td><?php echo $count++; ?></td>
                <td><?php echo date('d M, Y', $row['appointment_timestamp']); ?></td>
                <td><?php echo $this->crud_model->get_type_name_by_id('patient', $row['patient_id'], 'name'); ?></td>
                <td><?php echo $this->crud_model->get_type_name_by_id('doctor', $row['doctor_id'], 'name'); ?></td>
                <td align="center">
                    <div class="button-group">
                        <a href="<?php echo base_url(); ?>index.php?doctor/manage_appointment/edit/<?php echo $row['appointment_id']; ?>"
                           rel="tooltip" data-placement="top" data-original-title="Modifier" class="btn-primary">
                           <i class="icon-wrench"></i> Modifier
                        </a>
                        <a href="<?php echo base_url(); ?>index.php?doctor/manage_appointment/delete/<?php echo $row['appointment_id']; ?>" 
                           onclick="return confirm('Supprimer ?')" rel="tooltip" data-placement="top" 
                           data-original-title="Supprimer" class="btn-danger">
                           <i class="icon-trash"></i> Supprimer
                        </a>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

              

            </div>

            <!----LISTE DES RENDEZ-VOUS END--->

            

            <!----FORMULAIRE DE CREATION STARTS---->

            <div class="tab-pane box" id="add">

                <div class="box-content">

                    <?php echo form_open('doctor/manage_appointment/create/' , array('class' => 'form-horizontal validatable'));?>

                        <div class="padded">

                            <div class="control-group">

                                <label class="control-label" style="text-align: start;"><?php echo ('Médecin');?></label>

                                <div class="controls" style="padding-top:6px;">

                                    <?php echo $this->crud_model->get_type_name_by_id('doctor' ,$this->session->userdata('doctor_id') , 'name');?>

                                    <input type="hidden" name="doctor_id" value="<?php echo $this->session->userdata('doctor_id');?>"  />

                                </div>

                            </div>

                            <div class="control-group">

                                <label class="control-label"><?php echo ('Patient');?></label>

                                <div class="controls">

                                    <select class="chzn-select" name="patient_id">

                                        <?php 

                                        $this->db->order_by('account_opening_timestamp' , 'asc');

                                        $patients = $this->db->get('patient')->result_array();

                                        foreach($patients as $row):

                                        ?>

                                        	<option value="<?php echo $row['patient_id'];?>"><?php echo $row['name'];?></option>

                                        <?php

                                        endforeach;

                                        ?>

                                    </select>

                                </div>

                            </div>

                            <div class="control-group">

                                <label class="control-label"><?php echo ('Date');?></label>

                                <div class="controls">

                                    <input type="date" class="datepicker fill-up" name="appointment_timestamp"/>

                                </div>
                                <div class="form-action">

                            <button type="submit" class="success"><?php echo ('Ajouter Rendez-vous');?></button>

                              </div>
                            </div>

                        </div>


                    <?php echo form_close();?>                 
                </div>                 
            </div>
            <!----FORMULAIRE DE CREATION END--->
        </div>

    </div>

</div>
