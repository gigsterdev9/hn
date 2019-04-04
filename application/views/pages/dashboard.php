<?php //echo '<pre>'; print_r($total_entities); echo '</pre>'; ?>

<div class="container">
	<h1><span class="glyphicon glyphicon-dashboard"></span> DASHBOARD</h1>
	<p>&nbsp;</p>
	<div class="alert alert-info" id="user-info-notif" >
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<?php		
		$user = $this->ion_auth->user()->row();
		$username = ucfirst($user->username);
		echo 'You are logged in as user '.$username.'.';
		?>
    </div>
    <!-- Give notice if there are partner submitted entries -->
    <?php 
    $partner_entries = 0;
    if ($partner_entries > 0 && ($this->ion_auth->in_group('admin') || $this->ion_auth->in_group('supervisor'))) { ?>
    <div class="alert alert-warning" id="partner-entry-notif" >
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<?php		
		if ($partner_entries == 1) {
            echo $partner_entries . ' new entry entered by a partner. ';
        }
        else {
            echo $partner_entries . ' new entries entered by partners. ';
        }
        ?>
        <a href="<?php echo base_url('visitors/partner_entries') ?>">Click to manage entries now.</a>
    </div>
    <?php } ?>
    <!-- Give notice if there are entry edits submitted for review -->
    
    <?php 
    $allowed_groups = array('admin','supervisor'); 
    if ($this->ion_auth->in_group($allowed_groups)) {
    ?>

    <div class="row">
		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-heading">
					<strong><span class="glyphicon glyphicon-th-list"></span> Top Trending</strong>
				</div>
				
				<div class="panel-body">
					<div class="row">
						<div class="col-md-6">
							<p><strong><span class="glyphicon glyphicon-folder-open"></span>&nbsp; Government Reviews</strong></p>
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
                            <ul class="list-group">
                            <?php
                                $latest_visitors = 0;
                                if ($latest_visitors == NULL)
								{
									//echo '<li class="list-group-item">No entry.</li>';
								}
								else{
									foreach ($latest_visitors as $latest_visitor) 
									{
										$link = base_url('visitors/view/'.$latest_visitor['visitor_id']);
										$display = strtoupper($latest_visitor['fname'].' '.$latest_visitor['lname']).', '.$latest_visitor['age'].' ('.$latest_visitor['nationality'].')';
										echo '<li class="list-group-item"><a href="'.$link.'">'.$display.'</a></li>';
									}
								}
							?>
							</ul>
						</div>
						<div class="col-md-6">
                            <p><strong><span class="glyphicon glyphicon-folder-open"></span>&nbsp; Business Reviews</strong></p>
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
							<ul class="list-group">
                                <?php 
                                    $recent_visits = 0;
                                    if ($recent_visits == NULL) {
                                        //echo '<li class="list-group-item">No entry.</li>';
                                    }
                                    else{
                                        foreach ($recent_visits as $rsa) 
                                        {
                                            $link = base_url('visits/view/'.$rsa['visit_id']);
                                            $display = '('.$rsa['visit_date'].') &nbsp;'.strtoupper($rsa['fname'].' '.$rsa['lname']);
                                            echo '<li class="list-group-item"><a href="'.$link.'">'.$display.'</a></li>';
                                        }
                                    }
								?>
							</ul>
						</div>
					</div>
				</div>

			</div>
		</div>
		
		<div class="col-md-4">
            <div class="panel panel-default">
				<div class="panel-heading">
					<strong><span class="glyphicon glyphicon-th-list"></span> Figures</strong>
				</div>
				<div class="panel-body">
                    <table class="table-bordered table-condensed" style="width: 100%">
						<tr>
                            <td class="text-center"  valign="top">
                                Agencies <br /> <span style="font-size: 2em"><?php echo count($agencies); ?></span>
        					</td>
							<td class="text-center"  valign="top">
                                Businesses <br /> <span style="font-size: 2em"><?php echo count($businesses); ?></span><br />
							</td>
                            <td class="text-center"  valign="top">
                                Citizens <br /> <span style="font-size: 2em"><?php echo count($individuals); ?></span><br />
							</td>
                        </tr>
                    </table>
                <div class="buffer">&nbsp;</div>
                <strong>Top 5 Agencies</strong><br />
                    <ul>
                        <!-- 
                        <li><a href="<?php echo base_url('government-denr'); ?>">Dept of Environment and Natural Resources</a></li>
                        <li><a href="#">Dept of Education</a></li>
                        <li><a href="#">Metropolitan Manila Development Authority</a></li>
                        <li><a href="#">Dept of Interior and Local Government</a></li>
                        <li><a href="#">Land Transportation Office</a></li>           
                        -->
                        <?php 
                        foreach ($agencies as $agency) {
                            echo '<li><a href="government/'.$agency['entity_slug'].'">'.$agency['entity_name'].'</li>';
                        }
                        ?>
                    </ul>
                <div class="buffer">&nbsp;</div>
                <strong>Top 5 Businesses</strong><br />
                    <ul>
                        <!-- 
                        <li><a href="#">ABC Company</a></li>
                        <li><a href="#">DEF Company</a></li>
                        <li><a href="#">GHI Company</a></li>
                        <li><a href="#">JKL Company</a></li>
                        <li><a href="#">MNO Company</a></li>
                        -->
                        <?php 
                        foreach ($businesses as $biz) {
                            echo '<li><a href="business/'.$biz['entity_slug'].'">'.$biz['entity_name'].'</li>';
                        }
                        ?>
                    </ul>
				</div>
			</div>
		</div>

	</div>


	<div class="row">
	    <div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<strong><span class="glyphicon glyphicon-stats"></span> Charts</strong>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-6" id="pie_age" style="text-align: center"></div>
						<div class="col-md-6" id="pie_nationality" style="text-align: center"></div>
					</div>
                    <div class="row">
                        <div class="col-md-6">
                            <canvas id="visitorsByMonth" width="400" height="200"></canvas>
                        </div>
                        <div class="col-md-6">
                            <canvas id="revenueByMonth" width="400" height="200"></canvas>
                        </div>
                    </div>
                    <small>*All values in the charts above are for demo purposes.</a></small>
				</div>
			</div>
		</div>
	</div>
    <!--
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<strong><span class="glyphicon glyphicon-th-list"></span> Summaries</strong>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-6 text-center">
							<h5><b>Today</b></h5>
							<div class="panel panel-default">
								<div class="panel-body" >
									<table class="table-bordered table-condensed desktop-view">
										<tr>
											<td class="text-center" width="16%" valign="top">
												<span style="font-size: 2em"><?php echo $today['total_visits']['result_count']?></span>
												<br />Total Visits
											</td>
											<td class="text-center" width="16%" valign="top">
												<span style="font-size: 2em">2</span>
												<br />New Visitors
											</td>
											<td class="text-center" width="16%" valign="top">
												<span style="font-size: 2em">3</span>
												<br />Butanding Interactions
											</td>
											<td class="text-center" width="16%" valign="top">
												<span style="font-size: 2em">3</span>
												<br />Girawan Tours
											</td>
											<td class="text-center" width="16%" valign="top">
												<span style="font-size: 2em">3</span>
												<br />River and Firefly Tours
											</td>
											<td class="text-center" width="16%" valign="top">
												<span style="font-size: 2em">3</span>
												<br />Island Hopping Trips
											</td>
										</tr>
                                    </table>	
                                    <table class="table-bordered table-condensed mobile-view">
										<tr>
											<td class="text-center" width="16%" valign="top">
												<span style="font-size: 2em"><?php echo $today['total_visits']['result_count']?></span>
												<br />Total Visits
											</td>
											<td class="text-center" width="16%" valign="top">
												<span style="font-size: 2em">2</span>
												<br />New Visitors
											</td>
											<td class="text-center" width="16%" valign="top">
												<span style="font-size: 2em">3</span>
												<br />Butanding Interactions
                                            </td>
                                        </tr><tr>
											<td class="text-center" width="16%" valign="top">
												<span style="font-size: 2em">3</span>
												<br />Girawan Tours
											</td>
											<td class="text-center" width="16%" valign="top">
												<span style="font-size: 2em">3</span>
												<br />River and Firefly Tours
											</td>
											<td class="text-center" width="16%" valign="top">
												<span style="font-size: 2em">3</span>
												<br />Island Hopping Trips
											</td>
										</tr>
									</table>	
								</div>
							</div>
						</div>
						<div class="col-md-6 text-center">
							<h5><b>This Week</b></h5>
							<div class="panel panel-default">
								<div class="panel-body" >
									<table class="table-bordered table-condensed desktop-view">
										<tr>
											<td class="text-center" width="16%" valign="top">
												<span style="font-size: 2em"><?php echo $week['total_visits']['result_count']?></span>
												<br />Total Visits
											</td>
											<td class="text-center" width="16%" valign="top">
												<span style="font-size: 2em">2</span>
												<br />New Visitors
											</td>
											<td class="text-center" width="16%" valign="top">
												<span style="font-size: 2em">3</span>
												<br />Butanding Interactions
											</td>
											<td class="text-center" width="16%" valign="top">
												<span style="font-size: 2em">3</span>
												<br />Girawan Tours
											</td>
											<td class="text-center" width="16%" valign="top">
												<span style="font-size: 2em">3</span>
												<br />River and Firefly Tours
											</td>
											<td class="text-center" width="16%" valign="top">
												<span style="font-size: 2em">3</span>
												<br />Island Hopping Trips
											</td>
										</tr>
                                    </table>		
                                    <table class="table-bordered table-condensed mobile-view">
										<tr>
											<td class="text-center" width="16%" valign="top">
												<span style="font-size: 2em"><?php echo $week['total_visits']['result_count']?></span>
												<br />Total Visits
											</td>
											<td class="text-center" width="16%" valign="top">
												<span style="font-size: 2em">2</span>
												<br />New Visitors
											</td>
											<td class="text-center" width="16%" valign="top">
												<span style="font-size: 2em">3</span>
												<br />Butanding Interactions
                                            </td>
                                        </tr><tr>
											<td class="text-center" width="16%" valign="top">
												<span style="font-size: 2em">3</span>
												<br />Girawan Tours
											</td>
											<td class="text-center" width="16%" valign="top">
												<span style="font-size: 2em">3</span>
												<br />River and Firefly Tours
											</td>
											<td class="text-center" width="16%" valign="top">
												<span style="font-size: 2em">3</span>
												<br />Island Hopping Trips
											</td>
										</tr>
									</table>		
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 text-center">
							<h5><b>This Month</b></h5>
							<div class="panel panel-default">
								<div class="panel-body" >
									<table class="table-bordered table-condensed desktop-view">
										<tr>
											<td class="text-center" width="16%" valign="top">
												<span style="font-size: 2em"><?php echo $month['total_visits']['result_count']?></span>
												<br />Total Visits
											</td>
											<td class="text-center" width="16%" valign="top">
												<span style="font-size: 2em">40</span>
												<br />New Visitors
											</td>
											<td class="text-center" width="16%" valign="top">
												<span style="font-size: 2em">39</span>
												<br />Butanding Interactions
											</td>
											<td class="text-center" width="16%" valign="top">
												<span style="font-size: 2em">29</span>
												<br />Girawan Tours
											</td>
											<td class="text-center" width="16%" valign="top">
												<span style="font-size: 2em">26</span>
												<br />River and Firefly Tours
											</td>
											<td class="text-center" width="16%" valign="top">
												<span style="font-size: 2em">21</span>
												<br />Island Hopping Trips
											</td>
										</tr>
                                    </table>
                                    <table class="table-bordered table-condensed mobile-view">
										<tr>
											<td class="text-center" width="16%" valign="top">
												<span style="font-size: 2em"><?php echo $month['total_visits']['result_count']?></span>
												<br />Total Visits
											</td>
											<td class="text-center" width="16%" valign="top">
												<span style="font-size: 2em">40</span>
												<br />New Visitors
											</td>
											<td class="text-center" width="16%" valign="top">
												<span style="font-size: 2em">39</span>
												<br />Butanding Interactions
                                            </td>
                                        </tr><tr>
											<td class="text-center" width="16%" valign="top">
												<span style="font-size: 2em">29</span>
												<br />Girawan Tours
											</td>
											<td class="text-center" width="16%" valign="top">
												<span style="font-size: 2em">26</span>
												<br />River and Firefly Tours
											</td>
											<td class="text-center" width="16%" valign="top">
												<span style="font-size: 2em">21</span>
												<br />Island Hopping Trips
											</td>
										</tr>
									</table>		
								</div>
							</div>
						</div>
						<div class="col-md-6 text-center">
							<h5><b>This Year</b></h5>
							<div class="panel panel-default">
								<div class="panel-body" >
									<table class="table-bordered table-condensed desktop-view">
										<tr>
											<td class="text-center" width="16%" valign="top">
												<span style="font-size: 2em"><?php echo $year['total_visits']['result_count']?></span>
												<br />Total Visits
											</td>
											<td class="text-center" width="16%" valign="top">
												<span style="font-size: 2em">460</span>
												<br />New Visitors
											</td>
											<td class="text-center" width="16%" valign="top">
												<span style="font-size: 2em">450</span>
												<br />Butanding Interactions
											</td>
											<td class="text-center" width="16%" valign="top">
												<span style="font-size: 2em">310</span>
												<br />Girawan Tours
											</td>
											<td class="text-center" width="16%" valign="top">
												<span style="font-size: 2em">411</span>
												<br />River and Firefly Tours
											</td>
											<td class="text-center" width="16%" valign="top">
												<span style="font-size: 2em">290</span>
												<br />Island Hopping Trips
											</td>
										</tr>
                                    </table>
                                    <table class="table-bordered table-condensed mobile-view">
										<tr>
											<td class="text-center" width="16%" valign="top">
												<span style="font-size: 2em"><?php echo $year['total_visits']['result_count']?></span>
												<br />Total Visits
											</td>
											<td class="text-center" width="16%" valign="top">
												<span style="font-size: 2em">460</span>
												<br />New Visitors
											</td>
											<td class="text-center" width="16%" valign="top">
												<span style="font-size: 2em">450</span>
												<br />Butanding Interactions
                                            </td>
                                        </tr><tr>
											<td class="text-center" width="16%" valign="top">
												<span style="font-size: 2em">310</span>
												<br />Girawan Tours
											</td>
											<td class="text-center" width="16%" valign="top">
												<span style="font-size: 2em">411</span>
												<br />River and Firefly Tours
											</td>
											<td class="text-center" width="16%" valign="top">
												<span style="font-size: 2em">290</span>
												<br />Island Hopping Trips
											</td>
										</tr>
									</table>			
								</div>
							</div>
						</div>
					</div>
					<small>*All figures in the tables above are for demo purposes.</small>
				</div>
			</div>
		</div>
	</div>
    -->
    
    <?php
    } //end: section exclusive for allowed groups
    ?>

    <div class="alert alert-danger" id="base-url-notif" >
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>Alert!</strong> Set base url. 
	</div>
	
</div>
<script language="javascript" >
$(function() {
	
    /** Time-delay modal close **/
    setTimeout(function() {
        $('#user-info-notif').fadeOut('fast');
        $('#base-url-notif').fadeOut('fast');
    }, 5000);
    
    //Target indicator percentage chart
	//$("#bar_indicators").jChart();
	
	//Visitors grouping by Nationality
	var pie = new d3pie("pie_nationality", {
	"header": {
			"title": {
				"text": "Entry Distribution",
				"fontSize": 12,
				"font": "verdana"
			},
			"subtitle": {
				"color": "#999999",
				"fontSize": 10,
				"font": "verdana"
			},
			"titleSubtitlePadding": 12
		},
		"footer": {
			"color": "#999999",
			"fontSize": 11,
			"font": "open sans",
			"location": "bottom-center"
		},
		"size": {
			"canvasHeight": 250,
			"canvasWidth": 300,
			"pieOuterRadius": "80%"
		},
		"data": {
			"content": [
				{
					"label": "Govt",
					"value": <?php echo '5' ?>,
					"color": "#66cff6"
				},
				{
					"label": "Business",
					"value": <?php echo '20'; ?>,
					"color": "#00B0F0"
				},
				{
					"label": "Citizen",
					"value": <?php echo '30'; ?>,
					"color": "#99dff9"
				}
				]
		},
		"labels": {
			"outer": {
				"format": "label-value2",
				"pieDistance": 0
			},
			"mainLabel": {
				"font": "verdana"
			},
			"percentage": {
				"color": "#e1e1e1",
				"font": "verdana",
				"decimalPlaces": 0
			},
			"value": {
				"color": "#7e7a7a",
				"font": "verdana"
			},
			"lines": {
				"enabled": true,
				"color": "#cccccc"
			},
			"truncation": {
				"enabled": true
			}
		},
		"effects": {
			"pullOutSegmentOnClick": {
				"effect": "linear",
				"speed": 400,
				"size": 8
			}
		}
	});

	
	
	
	//Grouping by age
	var pie = new d3pie("pie_age", {
	"header": {
			"title": {
				"text": "User Age Group",
				"fontSize": 12,
				"font": "verdana"
			},
			"subtitle": {
				"color": "#999999",
				"fontSize": 10,
				"font": "verdana"
			},
			"titleSubtitlePadding": 12
		},
		"footer": {
			"color": "#999999",
			"fontSize": 11,
			"font": "open sans",
			"location": "bottom-center"
		},
		"size": {
			"canvasHeight": 250,
			"canvasWidth": 300,
			"pieOuterRadius": "80%"
		},
		"data": {
			"content": [
				{
					"label": "25 and below",
					"value": <?php echo '2000'  ?>,
					"color": "#b2e7fa"
				},
                {
					"label": "26-35",
					"value": <?php echo '10000' ?>,
                    "color": "#99dff9"
				},
				{
					"label": "36-50",
					"value": <?php echo '40000' ?>,
                    "color": "#00B0F0"
				},
                {
					"label": "50 and above",
					"value": <?php echo '20000' ?>,
					"color": "#66cff6"
				}
			]
		},
		"labels": {
			"outer": {
				"format": "label-value2",
				"pieDistance": 0
			},
			"mainLabel": {
				"font": "verdana"
			},
			"percentage": {
				"color": "#e1e1e1",
				"font": "verdana",
				"decimalPlaces": 0
			},
			"value": {
				"color": "#7e7a7a",
				"font": "verdana"
			},
			"lines": {
				"enabled": true,
				"color": "#cccccc"
			},
			"truncation": {
				"enabled": true
			}
		},
		"effects": {
			"pullOutSegmentOnClick": {
				"effect": "linear",
				"speed": 400,
				"size": 8
			}
		}
	});
    

});

var ctx = document.getElementById("visitorsByMonth").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "July", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
            label: 'Site visitors per month',
            data: [4000, 5000, 4500, 3800, 2500, 3000, 2900, 3200, 4000, 4500, 4400, 3900],
            /*data: [<?php echo $v_jan ?>, <?php echo $v_feb  ?>, <?php echo $v_mar  ?>, 
                    <?php echo $v_apr  ?>, <?php echo $v_may  ?>, <?php echo $v_jun  ?>, 
                    <?php echo $v_jul  ?>, <?php echo $v_aug  ?>, <?php echo $v_sep  ?>, 
                    <?php echo $v_oct  ?>, <?php echo $v_nov  ?>, <?php echo $v_dec  ?>], */
            backgroundColor: 'rgba(0, 176, 240, 0.2)',
            borderColor: 'rgba(0, 176, 240, 1)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});

var ctx = document.getElementById("revenueByMonth").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "July", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
            label: 'Monthly Review Count',
            data: [86, 120, 100, 60, 50, 30, 18, 50, 40, 35, 80, 85],
            /*data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],*/
            backgroundColor: 'rgba(0, 176, 240, 0.2)',
            borderColor: 'rgba(0, 176, 240, 1)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});

</script>
