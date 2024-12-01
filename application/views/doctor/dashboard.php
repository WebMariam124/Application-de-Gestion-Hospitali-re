<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Management System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.2.0/fullcalendar.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.2.0/fullcalendar.min.js"></script>
    <link rel="stylesheet" href="template/css/docteur.css">
</head>
<body>
    <div class="container-fluid padded">
        <!-- Action Nav Buttons Section -->
        <div class="row-fluid">
            <div class="span12">
                <div class="action-nav-normal">
                    <div class="row-fluid">
                        <div class="span2 action-nav-button">
                            <a href="<?php echo base_url();?>index.php?doctor/manage_patient">
                                <i class="icon-user"></i>
                                <span><?php echo ('Patient');?></span>
                            </a>
                        </div>
                        <div class="span2 action-nav-button">
                            <a href="<?php echo base_url();?>index.php?doctor/manage_appointment">
                                <i class="icon-exchange"></i>
                                <span><?php echo ('Appointment');?></span>
                            </a>
                        </div>
                        <div class="span2 action-nav-button">
                            <a href="<?php echo base_url();?>index.php?doctor/manage_prescription">
                                <i class="icon-stethoscope"></i>
                                <span><?php echo ('Prescription');?></span>
                            </a>
                        </div>
                        <div class="span2 action-nav-button">
                            <a href="<?php echo base_url();?>index.php?doctor/view_blood_bank">
                                <i class="icon-tint"></i>
                                <span><?php echo ('banque du sang');?></span>
                            </a>
                        </div>
                        <div class="span2 action-nav-button">
                            <a href="<?php echo base_url();?>index.php?doctor/manage_report">
                                <i class="icon-hospital"></i>
                                <span><?php echo ('Gérer Rapport');?></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

      
<div class="row-fluid" style="width: 100%;">
<div class="span12"> <!-- Changed to span12 to make it take full width -->
    <div class="box">
        <div class="box-header">
            <div class="title">
                <i class="icon-calendar" style="width: 100%;"></i>
                <?php echo ('Calendar Schedule');?>
            </div>
        </div>
        <div class="box-content">
            <div id="schedule_calendar"></div>
        </div>
    </div>
</div>
<script>

$(document).ready(function() {


$("#schedule_calendar").fullCalendar({

        header: {

            left: 	"prev,next",

            center: "title",

            right: 	"month,agendaWeek,agendaDay"

        },

        editable: 0,

        droppable: 0,

        events: [

                <?php 

                $appointments	=	$this->db->get_where('appointment' , array('patient_id' => $this->session->userdata('patient_id')))->result_array();

                foreach($appointments as $row):

                ?>{

                    title: "<?php echo ('Appointment').' : '.$this->crud_model->get_type_name_by_id('doctor' ,$row['doctor_id'], 'name' );?>",

                    start: new Date(<?php echo date('Y',$row['appointment_timestamp']);?>, <?php echo date('m',$row['appointment_timestamp'])-1;?>, <?php echo date('d',$row['appointment_timestamp']);?>),

                    end:	new Date(<?php echo date('Y',$row['appointment_timestamp']);?>, <?php echo date('m',$row['appointment_timestamp'])-1;?>, <?php echo date('d',$row['appointment_timestamp']);?>)  

                },

                <?php

                endforeach;

                ?>

                ]

    })



});
</script>



    <hr />

    <div class="row-fluid">




    </div>

</div>




















