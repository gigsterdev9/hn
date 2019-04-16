<?php 
$allowed_groups = array('admin'); 
?>

<div class="container">
	<h2><span class="glyphicon glyphicon-folder-open"></span>&nbsp; GOVERNMENT</h2>
	<h3><span class="glyphicon glyphicon-file"></span> Lorem ipsum dolor consectitur sit amet </h3>
    <?php
        if ($this->ion_auth->in_group($allowed_groups)) {
    ?>
            <div class="container-fluid text-right new-entry">
                <a href="<?php echo base_url('government/edit/'.$agency['entity_id']) ?>"><i class="fas fa-edit"></i> Edit </a> &nbsp; | &nbsp;
                <a href="<?php echo base_url('government/delete/'.$agency['entity_id']) ?>"><i class="fas fa-trash-alt"></i> Delete </a>
            </div>
    <?php
        }
	?>
	<div class="panel panel-default">
		<!-- <div class="text-right back-link"><a href="javascript:history.go(-1)">&laquo; Back</a></div> -->
		<div class="panel-body">
            <div class="row">
                <div class="col-md-2 logo-div">
                    <img src="<?php echo ($agency['entity_logo_filename'] != NULL) ? base_url('/images/'.$agency['entity_logo_filename']) : base_url('/images/generic-logo.png') ?>" alt="placeholder_logo" class="company-logo" />
                </div>
                <div class="col-md-4">
                    <h4><?php echo $agency['entity_name']; ?></h4>
                    Parent Agency: <?php echo ($agency['entity_parent'] != NULL) ? $agency['entity_parent'] : 'N/A' ?> <br />
                    Executive: <?php echo $agency['entity_exec'] ?> <br />
                    Headquarters: <?php echo $agency['entity_exec'] ?> <br />
                    Website: <a href="<?php echo 'http'.$agency['entity_website'] ?>"><?php echo $agency['entity_website'] ?></a>
                </div>
                <div class="col-md-4">
                    <div class="buffer">&nbsp;</div>
                    Overall Rating: <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star-half-alt"></i> <i class="far fa-star"></i> 
                    <h4>"Lorem ipsum dolor sit amet, consectetur adipiscing elit."</h4>
                </div>
                <div class="col-md-2 text-right">
                    <button data-toggle="modal" data-target="#rate_entry">Rate Agency</button><br />
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <h3>Key Programs</h3>
                    <ul>
                        <?php 
                            foreach ($programs as $program) {
                                echo '<li><strong>'. $program['prod_name'] .'</strong><br />'.$program['prod_desc'].'</li>';
                            }
                        ?>
                        <!--
                        <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </li>
                        <li>Mauris convallis tellus at urna tempor suscipit. Integer dui ipsum, lacinia nec consectetur quis, luctus rhoncus ante. </li>
                        <li>Suspendisse dignissim magna velit, a lacinia tortor suscipit at. </li>
                        <li>Phasellus ac mi leo. Suspendisse iaculis quam sed turpis fringilla convallis a a sapien. </li>
                        <li>In scelerisque eros sed quam tempor, a tempor elit pharetra. Sed mollis egestas tempus. Maecenas a pharetra tortor. </li>
                        <li>Morbi justo nulla, hendrerit ut porta ut, commodo vel dolor. Aenean luctus tincidunt hendrerit. Cras et aliquet eros. </li>
                        <li>Nullam viverra leo tincidunt suscipit volutpat.</li>
                        -->
                    </ul>
                </div>
                <div class="col-md-4 border-left">
                    <h3>News and Updates</h3>
                        <?php 
                            foreach ($news as $item) {
                        ?>
                                <div>
                                    <p class="date"><?php echo $item['publish_date'] ?>.</p>
                                    <p><?php echo $item['news_content'] ?></p>
                                </div>
                        <?php       
                            }
                        ?>
                        <!--
                        <div>
                            <p class="date">2019-01-01.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris convallis tellus at urna tempor suscipit. Integer dui ipsum, lacinia nec consectetur quis, luctus rhoncus ante. 
                            </p>
                        </div>
                        <div>
                            <p class="date">2019-01-01.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris convallis tellus at urna tempor suscipit. Integer dui ipsum, lacinia nec consectetur quis, luctus rhoncus ante. 
                            </p>
                        </div>
                        <div>
                            <p class="date">2019-01-01.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris convallis tellus at urna tempor suscipit. Integer dui ipsum, lacinia nec consectetur quis, luctus rhoncus ante. 
                            </p>
                        </div>
                        -->
                        <div class="text-right"><a href="">See more...</a></div>
                    </ul>
                </div>
                <div class="col-md-4 border-left">
                    <h3>Reviews</h3>
                        <?php 
                            foreach ($reviews as $review) {
                        ?>
                                <div>
                                    <p class="date"><?php echo date( 'Y F d', strtotime($review['review_created'])) . '. (' . $review['last_name'].', '.substr($review['first_name'],0,1).'.)'?>
                                    <?php
                                    for ($i=1; $i<=$review['review_stars']; $i++) {
                                        echo '<i class="fas fa-star"></i>';
                                    }
                                    switch ($review['review_stars']) {
                                        case '1': echo '<i class="far fa-star"></i> <i class="far fa-star"></i> <i class="far fa-star"></i> <i class="far fa-star"></i>'; break;
                                        case '2': echo '<i class="far fa-star"></i> <i class="far fa-star"></i> <i class="far fa-star"></i> '; break;
                                        case '3': echo '<i class="far fa-star"></i> <i class="far fa-star"></i> '; break;
                                        case '4': echo '<i class="far fa-star"></i> '; break;
                                        default: break;
                                    }
                                    ?>
                                    </p>
                                    <p>
                                        <?php echo $review['review_comment'] ?>
                                    </p>
                                </div>
                        <?php       
                            }
                        ?>
                        <!--
                        <div>
                            <p class="date">2019-01-01. Angela Merkel. 
                            <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star-half-alt"></i> <i class="far fa-star"></i> 
                            </p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris convallis tellus at urna tempor suscipit. Integer dui ipsum, lacinia nec consectetur quis, luctus rhoncus ante. 
                            </p>
                        </div>
                        <div>
                            <p class="date">2019-01-01. Benjamin Netanyahu. 
                            <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star-half-alt"></i> 
                            </p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris convallis tellus at urna tempor suscipit. Integer dui ipsum, lacinia nec consectetur quis, luctus rhoncus ante. 
                            </p>
                        </div>
                        <div>
                            <p class="date">2019-01-01. Theresa May. 
                            <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i>
                            </p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris convallis tellus at urna tempor suscipit. Integer dui ipsum, lacinia nec consectetur quis, luctus rhoncus ante. 
                            </p>
                        </div>
                        -->
                        <div class="text-right"><a href="">See more...</a></div>
                </div>
			</div>
		</div>
		
        <!--
		<div class="service-history-details text-left">
		<div class="text-right back-link"><a href="javascript:history.go(-1)">&laquo; Back</a></div>	
            
		</div>
        -->

	</div>
</div>
