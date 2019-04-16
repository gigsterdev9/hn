<?php 
$allowed_groups = array('admin'); 
//echo '<pre>'; print_r($agencies); echo '</pre>';
?>

<div class="container">
	<h2><span class="glyphicon glyphicon-folder-open"></span>&nbsp; GOVERNMENT</h2>
	<h3><span class="glyphicon glyphicon-file"></span> Lorem ipsum dolor consectitur sit amet </h3>
    <?php
        if ($this->ion_auth->in_group($allowed_groups)) {
            echo '<div class="container-fluid text-right new-entry"><a href="'.base_url('government/add').'"><i class="fas fa-plus-circle"></i> New entry </a></div>';
        }
	?>
	<div class="panel panel-default">
		<div class="text-right back-link"><a href="javascript:history.go(-1)">&laquo; Back</a></div>
		<div class="panel-body">
        <div class="row main-content" >
                <?php 
                foreach ($agencies as $agency) {
                    $entity_logo = ( $agency['entity_logo_filename'] ) ? $agency['entity_logo_filename'] : 'generic-logo.png' ;
                ?>
                    <div class="col-md-2 text-center entity-thumb" >
                    <a href="<?php echo base_url('government/'.$agency['entity_slug']) ?>">
                    <img src="<?php echo base_url('/images/'.$entity_logo) ?>" alt="agency-logo" class="company-logo" /><br />
                    </a>
                    <a href="<?php echo base_url('government/'.$agency['entity_slug']) ?>">
                        <strong>
                            <?php 
                                echo $agency['entity_name'];
                                if ( $agency['entity_alias'] != NULL ) echo ' ('.strtoupper($agency['entity_alias']).')'; 
                            ?>
                        </strong>
                    </a>
                    </div>
                <?php 
                }
                ?>
                <!-- 
                <div class="col-md-2 text-center">
                    <a href="<?php echo base_url('/government/denr') ?>">
                    <img src="<?php echo base_url('/images/denr-logo.jpg') ?>" alt="placeholder_logo" class="company-logo" /><br />
                    </a>
                    <a href="<?php echo base_url('/government-denr') ?>">
                    <strong>Dept. of Environment and Natural Resources (DENR)</strong>
                    </a>
                </div>
                <div class="col-md-2 text-center">
                    <a href="">
                    <img src="<?php echo base_url('/images/deped_logo.png') ?>" alt="placeholder_logo" class="company-logo" /><br />
                    </a>
                    <a href="">
                    <strong>Dept. of Education (DepEd)</strong>
                    </a>
                </div>
                <div class="col-md-2 text-center">
                    <a href="">
                    <img src="<?php echo base_url('/images/dilg-logo.png') ?>" alt="placeholder_logo" class="company-logo" /><br />
                    </a>
                    <a href="">
                    <strong>Dept. of Interior and Local Government (DILG)</strong>
                    </a>
                </div>
                <div class="col-md-2 text-center">
                    <a href="">
                    <img src="<?php echo base_url('/images/lto_logo.png') ?>" alt="placeholder_logo" class="company-logo" /><br />
                    </a>
                    <a href="">
                    <strong>Land Transportation Office (LTO)</strong>
                    </a>
                </div>
                <div class="col-md-2 text-center">
                    <a href="">
                    <img src="<?php echo base_url('/images/mmda_logo.png') ?>" alt="placeholder_logo" class="company-logo" /><br />
                    </a>
                    <a href="">
                    <strong>Metropolitan Manila Development Authority (MMDA)</strong>
                    </a>
                </div>
                -->

                
			</div>
		</div>
		
        <!--
		<div class="service-history-details text-left">
		<div class="text-right back-link"><a href="javascript:history.go(-1)">&laquo; Back</a></div>	
            
		</div>
        -->

	</div>
</div>
