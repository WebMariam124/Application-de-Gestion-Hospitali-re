<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
        <?php include 'includes.php'; ?>
        <title><?php echo $page_title;?> | <?php echo $system_title;?></title>

        <style> 

.cote {
    display: flex;
    margin: 0;
}

     
        </style> 
    </head>

<body style ="padding-top : 10 px ">

    <?php include 'header.php'; ?>

<div class="cote">
    <?php include $this->session->userdata('login_type').'/navigation.php'; ?>
<br>
    <div class="main-content">

        <?php include 'page_info.php'; ?>

        <div class="pagename">

            <?php include $this->session->userdata('login_type').'/'.$page_name.'.php'; ?>

        </div>        

        <?php include 'footer.php'; ?>

    </div>
    </div>
</body>
</html>
