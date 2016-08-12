    <!-- Publicidad -->
      <?php if ( of_get_option( 'image_ad_header' ) ) { ?>
       <div class="adHeader">
         <a href="<?php echo of_get_option( 'link_ad_header', 'no entry' ); ?>">
            <img src="<?php echo of_get_option( 'image_ad_header' ); ?>" />
         </a>
       </div>
     <?php } ?>
                     <!-- Publicidad -->
                <?php get_template_part('/templates/adsense-footer'); ?>
                <?php if ( of_get_option( 'image_ad_footer' ) ) { ?>
                 <div class="widget">
                   <a href="<?php echo of_get_option( 'link_ad_footer', 'no entry' ); ?>">
                      <img src="<?php echo of_get_option( 'image_ad_footer' ); ?>" />
                   </a>
                 </div>
               <?php } ?>
               <!-- Fin de Publicidad -->