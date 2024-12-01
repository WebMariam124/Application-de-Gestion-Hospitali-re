<div class="box" >

	<div class="box-header">

    

    	<!------CONTROL TABS START------->

		<ul class="nav nav-tabs nav-tabs-left">



			<li class="active">

            	<a href="#list" data-toggle="tab"><i class="icon-align-justify"></i> 

					<?php echo ('Gérer Profile');?>

                    	</a></li>

		</ul>

    	<!------CONTROL TABS END------->

        

	</div>

	<div class="box-content padded">

		<div class="tab-content">

        	<!----EDITING FORM STARTS---->

			<div class="tab-pane box active" id="list" style="padding: 5px">

                <div class="box-content padded">

					<?php 

                    foreach($edit_profile as $row):

                        ?>

                        <?php echo form_open('admin/manage_profile/update_profile_info/' , array('class' => 'form-horizontal validatable'));?>

                                <div class="control-group">

                                    <label class="control-label"><?php echo ('Nom');?></label>

                                    <div class="controls">

                                        <input type="text" class="" name="name" value="<?php echo $row['name'];?>"/>

                                    </div>

                                </div>

                                <div class="control-group">

                                    <label class="control-label"><?php echo ('Email');?></label>

                                    <div class="controls">

                                        <input type="text" class="" name="email" value="<?php echo $row['email'];?>"/>

                                    </div>

                                </div>

                                <div class="control-group">

                                    <label class="control-label"><?php echo ('Addresse');?></label>

                                    <div class="controls">

                                        <input type="text" class="" name="address" value="<?php echo $row['address'];?>"/>

                                    </div>

                                </div>

                                <div class="control-group">

                                    <label class="control-label"><?php echo ('Téléphone');?></label>

                                    <div class="controls">

                                        <input type="text" class="" name="phone" value="<?php echo $row['phone'];?>"/>

                                    </div>

                                </div>

                                <div class="form-action">

                            		<button type="submit" class="success"><?php echo ('Mise à jour ');?></button>

                        		</div>

                        <?php echo form_close();?>

						<?php

                    endforeach;

                    ?>

                </div>

			</div>

            <!----EDITING FORM ENDS--->

            

		</div>

	</div>

</div>





<!--password-->

<div class="box">

	<div class="box-header">

    

    	<!------CONTROL TABS START------->

		<ul class="nav nav-tabs nav-tabs-left">



			<li class="active">

            	<a href="#list" data-toggle="tab"><i class="icon-lock"></i> 

					<?php echo ('Changer mot de passe');?>

                    	</a></li>

		</ul>

    	<!------CONTROL TABS END------->

        

	</div>

	<div class="box-content padded">

		<div class="tab-content">

        	<!----EDITING FORM STARTS---->

			<div class="tab-pane box active" id="list" style="padding: 5px">

                <div class="box-content padded">

					<?php 

                    foreach($edit_profile as $row):

                        ?>

                        <?php echo form_open('admin/manage_profile/change_password/' , array('class' => 'form-horizontal validatable'));?>

                                <div class="control-group">

                                    <label class="control-label"><?php echo ('mot de passe');?></label>

                                    <div class="controls">

                                        <input type="password" class="" name="password" value=""/>

                                    </div>

                                </div>

                                <div class="control-group">

                                    <label class="control-label"><?php echo ('Nouvelle mot de passe');?></label>

                                    <div class="controls">

                                        <input type="password" class="" name="new_password" value=""/>

                                    </div>

                                </div>

                                <div class="control-group">

                                    <label class="control-label"><?php echo ('Confirmer mot de passe');?></label>

                                    <div class="controls">

                                        <input type="password" class="" name="confirm_new_password" value=""/>

                                    </div>

                                </div>

                                <div class="form-actions">

                            		<button type="submit" class="btn btn-primary"><?php echo ('Mise à jour');?></button>

                        		</div>
                        <?php echo form_close();?>

						<?php

                    endforeach;

                    ?>

                </div>

			</div>

            <!----EDITING FORM ENDS--->

            

		</div>

	</div>

</div>
<style>
    .form-action {
        text-align: center;
        display: flex;
        justify-content: center;
        gap: 20px;
        margin-top: 100px;
        position: relative;
       right: 700px;
    }

    button.success {
        background-color: rgb(0, 119, 255);
        color: white; 
        padding: 5px 10px; 
        font-size: 16px; 
        border: none; 
        cursor: pointer; 
        border-radius: 5px; 
        margin-bottom: 100px;
    }

    button.success:hover {
        background-color: #0073e6;
    }
</style>