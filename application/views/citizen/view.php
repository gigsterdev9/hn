<div class="container">
	<h2><span class="glyphicon glyphicon-folder-open"></span>&nbsp; CITIZEN</h2>
	<h3><span class="glyphicon glyphicon-file"></span> Lorem ipsum dolor consectitur sit amet </h3>
	<div class="panel panel-default">
		<!-- <div class="text-right back-link"><a href="javascript:history.go(-1)">&laquo; Back</a></div> -->
		<div class="panel-body">
            <div class="row">
                <div class="col-md-2 logo-div">
                    <img src="<?php echo base_url('/images/'.$ind['entity_logo_filename']) ?>" alt="placeholder_logo" class="company-logo" />
                </div>
                <div class="col-md-4">
                    <h4><?php echo $ind['entity_name']; ?></h4>
                    Short blurb: <?php echo $ind['entity_desc'] ?> <br />
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
                    <h3>Contributions</h3>
                    <ul>
                        <?php 
                            foreach ($products as $product) {
                                echo '<li><strong>'. $product['prod_name'] .'</strong><br />'.$product['prod_desc'].'</li>';
                            }
                        ?>
                    </ul>
                </div>
                <div class="col-md-4 border-left">
                    <h3>Reviews Made</h3>
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
                    <h3>Reviews on Citizen</h3>
                        <?php 
                            foreach ($reviews as $review) {
                        ?>
                                <div>
                                    <p class="date"><?php echo $review['review_created'] . '. ' . $review['reviewer'] ?>
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
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris convallis tellus at urna tempor suscipit. Integer dui ipsum, lacinia nec consectetur quis, luctus rhoncus ante. 
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
