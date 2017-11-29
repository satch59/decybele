<?php if(have_posts()): while(have_posts()) : the_post(); ?>
		<div class="qodef-container">
		    <div class="qodef-container-inner clearfix">
				<?php do_action('mixtape_qodef_after_container_inner_open'); ?>
		    	<?php if(post_password_required()) {
	                echo get_the_password_form();
	            } else {
	                //album single html
	                ?>
	            <div class="qodef-album-comprehensive">
	                <div class="qodef-two-columns-50-50 clearfix">
						<div class="qodef-two-columns-50-50-inner clearfix">
							<div class="qodef-column">
								<div class="qodef-column-inner">
									<?php
									//get album featured image
									mixtape_qodef_get_module_template_part('templates/single/parts/image','albums');

									//get album player
									mixtape_qodef_get_module_template_part('templates/single/parts/player','albums');

									?>

                                    <div class="qodef-album-tracks-holder ">
										<?php
										//get album tracks
										mixtape_qodef_get_module_template_part('templates/single/parts/tracks','albums');
										?>
                                    </div>

									<?php
									//get album available on
									mixtape_qodef_get_module_template_part('templates/single/parts/available-on','albums','', array('store_type' => $store_type));

									?>

								</div>
							</div>
							<div class="qodef-column">
								<div class="qodef-column-inner">
                                    <div class="qodef-about-album-holder">
										<?php
										//get about album
										mixtape_qodef_get_module_template_part('templates/single/parts/about','albums');
										?>
                                    </div>
                                    <div class="qodef-album-details-holder">
										<?php
										//get album artist
										mixtape_qodef_get_module_template_part('templates/single/parts/artist','albums');

										//get album label
										mixtape_qodef_get_module_template_part('templates/single/parts/label','albums');

										//get album date
										mixtape_qodef_get_module_template_part('templates/single/parts/date','albums');

										//get album genre
										mixtape_qodef_get_module_template_part('templates/single/parts/genre','albums');

										//get album people
										mixtape_qodef_get_module_template_part('templates/single/parts/people','albums');
										?>
                                    </div>

									<div class="qodef-lyrics-holder">
										<?php
											//get lyrics
											mixtape_qodef_get_module_template_part('templates/single/parts/lyrics','albums');
										?>
									</div>

                                    <?php
									//get album review
									mixtape_qodef_get_module_template_part('templates/single/parts/album-review','albums');
                                    ?>

									<?php
                                    //get album review
                                    mixtape_qodef_get_module_template_part('templates/single/parts/follow_and_share','albums');
                                    ?>

								</div>
							</div>
						</div>
					</div>
					<div class="qodef-latest-video-holder">
						<?php
						//get album latest video
						mixtape_qodef_get_module_template_part('templates/single/parts/latest-video','albums');
						?>
					</div>
				</div>
	            <?php }  
					//load comments
					mixtape_qodef_get_module_template_part('templates/single/parts/comments', 'albums');
	            ?>
	        </div>
	    </div>
	    <div class="qodef-album-navigation-holder">
			<?php
				//get navigation
				mixtape_qodef_get_module_template_part('templates/single/parts/navigation','albums','',$params);
			?>
		</div>
<?php
	endwhile;
	endif;
?>