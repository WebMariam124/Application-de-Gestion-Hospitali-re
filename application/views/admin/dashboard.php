<head>
    <link rel="stylesheet" href="template/css/admin.css">
</head>

<div class="container-fluid padded">

	<div class="row-fluid">

        <div class="span30">
            <div class="action-nav-normal">

                <div class="row-fluid">

                    <div class="span2 action-nav-button">

                        <a href="<?php echo base_url();?>index.php?admin/manage_doctor">

                        <i class="icon-user-md"></i>

                        <span><?php echo ('Docteur');?></span>

                        </a>

                    </div>

                    <div class="span2 action-nav-button">

                        <a href="<?php echo base_url();?>index.php?admin/manage_patient">

                        <i class="icon-user"></i>

                        <span><?php echo ('Patient');?></span>

                        </a>

                    </div>

                    <div class="span2 action-nav-button">

                        <a href="<?php echo base_url();?>index.php?admin/manage_nurse">

                        <i class="icon-plus-sign-alt"></i>

                        <span><?php echo ('Infèrmiers');?></span>

                        </a>

                    </div>



                
                    <div class="span2 action-nav-button">

                    <a href="<?php echo base_url();?>index.php?admin/view_report/death">

                     <i class="icon-minus-sign"></i>

                      <span><?php echo ('Rapport de décès');?></span>

                      </a>

                    </div>
                </div>

                <div class="row-fluid">

                    <div class="span2 action-nav-button">

                        <a href="<?php echo base_url();?>index.php?admin/view_appointment">

                        <i class="icon-exchange"></i>

                        <span><?php echo ('Rendez-vous');?></span>

                        </a>

                    </div>

                  


                    <div class="span2 action-nav-button">

                        <a href="<?php echo base_url();?>index.php?admin/view_medicine">

                        <i class="icon-medkit"></i>

                        <span><?php echo ('Médicament');?></span>

                        </a>

                    </div>

                    <div class="span2 action-nav-button">

                        <a href="<?php echo base_url();?>index.php?admin/view_report/operation">

                        <i class="icon-reorder"></i>

                        <span><?php echo ('Rapport d\'Opération');?></span>

                        </a>

                    </div>

                    <div class="span2 action-nav-button">

                        <a href="<?php echo base_url();?>index.php?admin/view_report/birth">

                        <i class="icon-github-alt"></i>

                        <span><?php echo ('Rapport de Naissance');?></span>

                        </a>

                    </div>

                </div>

                <div class="row-fluid">


                </div>

            </div>

        </div>

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




















