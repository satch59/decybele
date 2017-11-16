<?php if(have_posts()): while(have_posts()) : the_post(); ?>
		<div class="qodef-container">
		    <div class="qodef-container-inner clearfix">
				<?php do_action('mixtape_qodef_after_container_inner_open'); ?>
                <?php if(post_password_required()) {
	                echo get_the_password_form();
	            } else {
	                //event single html
	                ?>
	            <div <?php mixtape_qodef_class_attribute($holder_class); ?>>
	                <div class="qodef-two-columns-33-66 clearfix">
					    <div class="qodef-column1">
					        <div class="qodef-column-inner">
					           <div class="qodef-event-image-buy-tickets-holder">
						           	<?php
						                //get event featured image
						                mixtape_qodef_get_module_template_part('templates/single/parts/image','events');

									//get event details section
									mixtape_qodef_get_module_template_part('templates/single/parts/details', 'events', '', array('date' => $date,'time' => $time,'website' => $website,'organized_by' => $organized_by, 'location' => $location));

						                //get event but tickets section
						                mixtape_qodef_get_module_template_part('templates/single/parts/buy_tickets','events','', array('link' => $link, 'target' => $target, 'tickets_status' => $tickets_status));
						            ?>
					           </div>
					        </div>
					    </div>
					    <div class="qodef-column2">
					        <div class="qodef-column-inner">
					            <div class="qodef-event-info-holder">
					                <?php
                                        //get event map section
                                        mixtape_qodef_get_module_template_part('templates/single/parts/google_map', 'events', '', array('pin'=>$pin, 'location' => $location ));

						                //get event about tour section
						                mixtape_qodef_get_module_template_part('templates/single/parts/about_tour', 'events');

						                //get event follow and share section
						                mixtape_qodef_get_module_template_part('templates/single/parts/follow_and_share', 'events');
					                ?>
					            </div>
					        </div>
					    </div>
					</div>
				</div>
	            <?php }
					//load event comments
					mixtape_qodef_get_module_template_part('templates/single/parts/comments', 'events');
	             ?>

	        </div>
	    </div>
		<?php

			//load event navigation
			mixtape_qodef_get_module_template_part('templates/single/parts/navigation', 'events', '', array('back_to_link' => $back_to_link));

			
		?>
<?php
	endwhile;
	endif;
?>