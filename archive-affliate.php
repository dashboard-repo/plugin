<?php get_header(); ?>    
    
    <div class="row blogContent clearAfter marginTopLrg marginBtmLrg">
        <div class="large-9 left medium-9 small-12 borderGreyRight paddingRightLrg">                       
                <div class="large-12 clearAfter marginBtmMed">
                    <?php
					$i = 1;
                    while ( have_posts() ) : the_post(); 
					$attachID = get_post_meta(get_the_ID(),'_info_logo','true'); 
					$profilePic = wp_get_attachment_image_src( $attachID,'medium');
					$profilePic = $profilePic[0];
					if ($i == 1) {
						echo '
						<div class="large-12 clearBoth clearAfter marginBtmMed">
							<div class="left large-10 medium-10 small-12">
								<h3 class="textBold textUpper">
									<a class="textBlue" href="'.get_the_permalink().'">'.get_the_title().'</a>
								</h3>
								<h6 class="textUpper textThin">
									'.get_post_meta(get_the_ID(),'_info_tagline',true).'
								</h6>
							</div>
							<div class="left large-2 medium-2 small-12">
								<img src="'.$profilePic.'"/>
							</div>
							'.get_the_post_thumbnail(get_the_ID(),'full').'
							<div class="BGGrey paddingMed"><p class="textWhite">'.excerptCustom(get_the_ID(),20).'</p></div>
						</div>';
					}else {
						echo '
						<div class="large-6 left paddingSm marginBtmMed">
							<h3 class="textBold textBlue textUpper">
								'.get_the_title().'
							</h3>
							<h6 class="textUpper textThin">
								'.get_post_meta(get_the_ID(),'_info_tagline',true).'
							</h6>
							'.get_the_post_thumbnail(get_the_ID(),'full').'
							<div class="BGGrey paddingSm"><p class="textWhite">'.excerptCustom(get_the_ID(),10).'</p></div>
						</div>';
					}
					$i++; endwhile; wp_reset_query(); ?>
            	</div>   
            </article>        
        </div> 
          
        <div class="large-3 left medium-3 paddingLeftLrg small-12"> 
        	<?php 
				if (!is_user_logged_in() ) { 
                    echo '<img src="'.$smof_data["loggedOutAd"].'"/>'.
                    btnStyle ('Red','#','pencil','marginTopSm','sign up now'); 
				} else {
					echo '<img src="'.$smof_data["loggedInAd"].'"/>';
				}
				
				echo '<img src="'.getAd ('box',get_current_user_id()).'"/>';
				echo '<p class="marginNone textBold">'.$smof_data["ctaSideAd"].'</p>';
				?>
        </div>   
    </div>		
<?php get_footer(); ?>