<?php 
//echo '<pre>'; print_r($businesses); echo '</pre>';
?>

<div class="container">
	<h2><span class="glyphicon glyphicon-folder-open"></span>&nbsp; BUSINESS</h2>
	<h3><span class="glyphicon glyphicon-file"></span> Lorem ipsum dolor consectitur sit amet </h3>
	<div class="panel panel-default">
		<!-- <div class="text-right back-link"><a href="javascript:history.go(-1)">&laquo; Back</a></div> -->
		<div class="panel-body">
        <div class="row main-content">
                <?php 
                foreach ($businesses as $biz) {
                    $logo_filename = ($biz['entity_logo_filename'] == '') ? 'abc_logo_3.png' : $biz['entity_logo_filename'] ;
                ?>
                    <div class="col-md-2 text-center entity-thumb">
                    <a href="<?php echo base_url('business/'.$biz['entity_slug']) ?>">
                    <img src="<?php echo base_url('/images/'.$logo_filename) ?>" alt="placeholder_logo" class="company-logo" /><br />
                    </a>
                    <a href="<?php echo base_url('business/'.$biz['entity_slug']) ?>">
                    <strong><?php echo $biz['entity_name'].' ('.strtoupper($biz['entity_slug']).')'; ?></strong>
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
