<?php 
//echo '<pre>'; print_r($individuals); echo '</pre>';
?>

<div class="container">
	<h2><span class="glyphicon glyphicon-folder-open"></span>&nbsp; CITIZEN</h2>
	<h3><span class="glyphicon glyphicon-file"></span> Lorem ipsum dolor consectitur sit amet </h3>
	<div class="panel panel-default">
		<!-- <div class="text-right back-link"><a href="javascript:history.go(-1)">&laquo; Back</a></div> -->
		<div class="panel-body">
        <div class="row main-content">
                <?php 
                //$ctr = 1;
                foreach ($individuals as $ind) {
                ?>
                    <div class="col-md-2 text-center entity-thumb">
                        <a href="<?php echo base_url('citizen/'.$ind['entity_slug']) ?>">
                            <img src="<?php echo base_url('/images/'.$ind['entity_logo_filename']) ?>" alt="placeholder_logo" class="company-logo" /><br />
                        </a>
                        <a href="<?php echo base_url('citizen/'.$ind['entity_slug']) ?>">
                            <strong><?php echo $ind['entity_name'].' ('.strtoupper($ind['entity_slug']).')'; ?></strong>
                        </a>
                        <?php //echo ($ctr % 5); ?>
                    </div>
                <?php    
                    /*
                    $ctr++;
                    if (($ctr % 5) == 0) {
                        echo '<div class="col-md-1">&nbsp;</div>';
                        echo '</div>';
                        echo '<div class="row main-content">';
                        echo '<div class="col-md-1">&nbsp;</div>';
                    }
                    */
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
