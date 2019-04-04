<?php include_once('templates/header.php') ?>

    <div class="row" id="logos-prime">
        <div class="col-sm-12 bg-pblue">
            <img src="<?php echo base_url('/images/hn_logo.png') ?>" alt="hn_logo" />   
            <h1 class="white" style="font-family: Montserrat, sans-serif; font-weight: 900">Hello Neighbor</h1></div>
    </div>
    <div class="row" id="logos-alt" >
        <div class="col-sm-12 bg-pblue" style="text-align: center">
            <img src="<?php echo base_url('/images/hn_logo.png') ?>" alt="hn_logo" />
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 bg-pblue white">
            <h2 class="white">MAKING COMMUNITIES BETTER FOR ALL</h2>
            <p>Please log in with your credentials to access.</p>
            <h2 class="white" style="font-family: Montserrat, sans-serif;">Login</h2>
            <hr />

            <div id="infoMessage"><?php echo $message;?></div>

            <?php 
                $attributes = array('class' => 'form-inline', 'role' => 'form');	
                echo form_open("auth/login", $attributes);
            ?>

                <div class="form-group">
                <?php $attrib_input = array('class' => 'form-control'); ?>
                <?php echo lang('login_identity_label', 'identity');?>
                <?php echo form_input($identity, '', $attrib_input);?>
                </div>

                <div class="form-group">
                <?php echo lang('login_password_label', 'password');?>
                <?php echo form_input($password, '', $attrib_input);?>
                </div>
                <!--
                <div class="form-group">
                <?php echo lang('login_remember_label', 'remember');?>
                <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
                </div>
                -->
                <div class="form-group">
                <?php $attrib_btn = array('class' => 'btn btn-default'); ?>
                <?php echo form_submit('submit', lang('login_submit_btn'), $attrib_btn);?>
                </div>

            <?php echo form_close();?>
            <br />
            <p><a class="white" href="create_user">Register</a> &nbsp; | &nbsp; <a class="white" href="forgot_password">Forgot password?</a></p>

            <!--
            <p style="margin-top: 80px; text-align: right">
                Development of this system has been facilitated by the <a href="http://wwf.org.ph/" target="_blank">WWF-Philippines</a>, through its Sustainable 
                Whaleshark Ecotourism Program. 
            </p>
            -->
            <?php include_once('templates/footer.php') ?>
        </div> 
    </div>