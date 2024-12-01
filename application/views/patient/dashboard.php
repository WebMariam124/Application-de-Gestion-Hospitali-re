<head>
<link rel="stylesheet" href="template/css/patient.css">
</head>
<body>
    <br>
    <div class="container-fluid padded">
    <div class="row-fluid">
        <div class="span30">
            <!-- Trouvez-moi dans partials/action_nav_normal -->
            <!-- Grands boutons normaux -->
            <div class="action-nav-normal">
                <div class="row-fluid">
                    <!-- Boutons d'action avec changement de couleur en fonction de la position -->
                    <div class="span2 action-nav-button">
                        <div class="new-class">
                            <a href="<?php echo base_url();?>index.php?patient/view_doctor">
                                <i class="icon-stethoscope"></i>
                                <span><?php echo ('Médecin');?></span>
                            </a>
                        </div>
                    </div>

                    <div class="span2 action-nav-button">
                        <div class="new-class">
                            <a href="<?php echo base_url();?>index.php?patient/view_appointment">
                                <i class="icon-exchange"></i>
                                <span><?php echo ('Rendez-vous');?></span>
                            </a>
                        </div>
                    </div>

                    <div class="span2 action-nav-button">
                        <div class="new-class">
                            <a href="<?php echo base_url();?>index.php?patient/view_prescription">
                                <i class="icon-stethoscope"></i>
                                <span><?php echo ('Prescription');?></span>
                            </a>
                        </div>
                    </div>

                    <div class="span2 action-nav-button">
                        <div class="new-class">
                            <a href="<?php echo base_url();?>index.php?patient/view_admit_history">
                                <i class="icon-hdd"></i>
                                <span><?php echo ('Historique d\'hospitalisat°');?></span>
                            </a>
                        </div>
                    </div>

                    <div class="span2 action-nav-button">
                        <div class="new-class">
                            <a href="<?php echo base_url();?>index.php?patient/view_blood_bank">
                                <i class="icon-tint"></i>
                                <span><?php echo ('Banque de sang');?></span>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!---DASHBOARD MENU BAR ENDS HERE-->

    </div>

    <hr />

  
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
</div>



  

  <script>

  $(document).ready(function() {



    // page is now ready, initialize the calendar...



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