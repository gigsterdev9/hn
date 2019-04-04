<?php include_once('templates/header.php') ?>

    <div class="row" id="logos-prime">
        <div class="col-sm-6"><img src="<?php echo base_url('/images/donsol_seal.png') ?>" alt="donsol_seal" /></div>
        <div class="col-sm-6" style="text-align: right"><img src="<?php echo base_url('/images/wwf_logo.png') ?>" alt="wwf_logo" /></div>
    </div>
    <div class="row" id="logos-alt">
        <div class="col-sm-12" style="text-align: center">
            <img src="<?php echo base_url('/images/donsol_seal.png') ?>" alt="donsol_seal" />
             <img src="<?php echo base_url('/images/wwf_logo.png') ?>" alt="wwf_logo" />
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h1><?php echo lang('reset_password_heading');?></h1>
            
            <hr />

            <div id="infoMessage"><?php echo $message;?></div>

            <?php 
                $attributes = array('class' => 'form-inline', 'role' => 'form');	
                echo form_open('auth/reset_password/' . $code);
            ?>

                <div class="form-group">
                    <label for="new_password"><?php echo sprintf(lang('reset_password_new_password_label'), $min_password_length);?></label> <br />
		            <?php echo form_input($new_password);?>
                </div>

                <div class="form-group">
                    <?php echo lang('reset_password_new_password_confirm_label', 'new_password_confirm');?> <br />
                    <?php echo form_input($new_password_confirm);?>
                </div>
                
                <div class="form-group">
                    <?php echo form_input($user_id);?>
                    <?php echo form_hidden($csrf); ?>
                    <?php echo form_submit('submit', lang('reset_password_submit_btn'));?>
                </div>

            <?php echo form_close();?>
            <br />
            <p><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p>

            <p style="margin-top: 80px; text-align: right">
                Development of this system has been facilitated by the <a href="http://wwf.org.ph/" target="_blank">WWF-Philippines</a>, through its Sustainable 
                Whaleshark Ecotourism Program. 
            </p>
            <?php include_once('templates/footer.php') ?>
        </div> 
    </div>