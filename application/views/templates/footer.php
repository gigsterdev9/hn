		<?php 
			date_default_timezone_set('Asia/Manila'); 
			
			$y = date('Y'); 
			if ($y == '2019') 
			{
				$year = '2019';
			}
			else{
				$year = '2019-'.$y;
			}
		?>
		<div class="container">
            
			<p>&nbsp;</p>
			<div id="footer-div" class="small">
                <div class="row">
                    <div class="col-md-6 text-left">
                        <?php		
                        $user = $this->ion_auth->user()->row();
                        $username = ucfirst($user->username);
                        echo '<i>Logged in as '.$username.'.</i><br />';
                        ?>
                        <p>Page rendered in {elapsed_time} seconds using {memory_usage} of memory.</p>
                    </div>
                    <div class="col-md-6 text-right">
                        Version 0.01. <br />
                        &copy; <?php echo $year ?>. 
                        Hello Neighbor. All Rights Reserved.<br />
                        <!--CodeIgniter <?php echo CI_VERSION; ?>-->
                    </div>
                </div>
			</div>
		</div><!-- container -->

		<!-- SCRIPTS -->

		<script>
			$(document).ready(function(){
				
				//nav menu script 
				$('.dropdown-submenu a.test').on("click", function(e){
					$(this).next('ul').toggle();
					e.stopPropagation();
					e.preventDefault();
				});

				//initialize enhanced select dropdown fields
				$('.select2-single').select2({
					placeholder: 'Select an option'
				});


			});
		</script>


    </body>
</html>
