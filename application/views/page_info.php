<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title>

    <!-- Include FullCalendar CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.2.0/fullcalendar.min.css" rel="stylesheet">

<!-- Include jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Include FullCalendar JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.2.0/fullcalendar.min.js"></script>

</head>
<body>

    <div class="main-content">
        <div class="container">
            <div class="header">
                <h3>
                    <i class="fas fa-info-circle"></i>
                    <?php echo $page_title; ?>
                </h3>
                <ul>
               <!--  <li style="background-color: green;"> -->
                <li>
                        <h4>
                            <span style ="color: green ">Médecin</span>
                            <span class="count-doctor"><?php echo $this->db->count_all_results('doctor'); ?></span>
                        </h4>
                    </li>
<!--                     <li style="background-color: red;"> <!-- Red for Patient -->
     <li>
                        <h4>
                            <span style ="color: red" >Patient</span>
                            <span class="count-patient"><?php echo $this->db->count_all_results('patient'); ?></span>
                        </h4>
                    </li>
<!--                     <li style="background-color: blue;"> <!-- Blue for Nurse -->
     <li>
                    <h4>
                            <span style ="color: blue " >Infirmier/ière</span>
                            <span class="count-nurse"><?php echo $this->db->count_all_results('nurse'); ?></span>
                        </h4>
                    </li>                 
                </ul>
            </div>

            <!-- Flash message handling -->
            <?php if($this->session->flashdata('flash_message') != ""):?>
                <script>
                    $(document).ready(function() {
                        Growl.info({
                            title: "<?php echo $this->session->flashdata('flash_message'); ?>", 
                            text: ""
                        });
                    });
                </script>
            <?php endif; ?>
        </div>
    </div>
<br>
<style>
        /* Main content section */
        .main-content {
            box-sizing: border-box;
            margin-left: 1px;
            width: 100%;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* Container styling */
        .container {
            background-color: #eeeeee;
            font-family: Arial, sans-serif;
            width: 100%;
            box-sizing: border-box;
            padding: 5px;
        }

        /* Title section styling */
        .container h3 {
            display: flex;
            align-items: center;
            font-size: 15px;
            font-weight: bold;
            color: #007acc;
        }

        .container h3 i {
            background-color: #4da6ff;
            color: white;
            font-size: 20px;
            border-radius: 50%;
            width: 24px;
            height: 24px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-right: 10px;
        }

        /* List styling */
        .container ul {
            display: flex;
            margin: 0;
            padding: 0;
            list-style: none;
            gap: 20px;
            justify-content: space-between;
        }

        .container ul li {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 1, 0.1);
            width: 130px;
          
            text-align: center;
        }

        /* Role label styling */
        .container ul li h4 {
            font-size: 16px;
            color: #777;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 5px;
        }

        .container ul li h4 span {
            color: #777;
            font-weight: bold;
        }

        /* Count styling */
        .container ul li h4 .count-doctor {
            color: green; /* Green */
        }

        .container ul li h4 .count-patient {
            color: red; /* Green */

        }

        .container ul li h4 .count-nurse {
            color: blue; /* Orange */

        }

        .container ul li h4 .count-accountant {
            color: orange; /* Orange */

        }
</style>
</body>
</html>
