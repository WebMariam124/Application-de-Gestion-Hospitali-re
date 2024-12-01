<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>

    <head>

        <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0">

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

        <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">

        <?php include 'includes.php';?>

        <title>Page non trouvée | <?php echo $system_title;?></title>

    </head>

<body>

    <div class="navbar navbar-top navbar-inverse">

        <div class="navbar-inner">

            <div class="container-fluid">

                <a class="brand" href="<?php echo base_url();?>"><?php echo $system_name;?></a>

            </div>

        </div>

    </div>

    <div class="container">

        <div class="row-fluid">

            <div class="span8 offset2">

                <div class="error-box">

                    <div class="message-small">

                    Wouah ! Qu'est-ce que tu fais ici ?

                    </div>

                    <div class="message-big">

                        404

                    </div>

                    <div class="message-small">

                    Tu n'es pas là où tu es censé être

                    </div>

                    <div style="margin-top: 50px">

                        <a class="btn btn-blue" href="<?php echo base_url();?>">

                        <i class="icon-arrow-left"></i> retourner au tableau de bord </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</html>