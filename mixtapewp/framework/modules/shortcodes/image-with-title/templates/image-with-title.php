<div class="qodef-image-with-title <?php echo esc_attr($holder_classes); ?>">
	<?php if($link !== ''){ ?>
    <a href="<?php echo esc_url($link); ?>" target="<?php echo esc_attr($link_target); ?>">
    <?php } ?>
        <?php echo wp_get_attachment_image($image, 'full'); ?>
    <?php if($link !== ''){ ?>
    </a>
    <?php } ?>
	<<?php echo esc_attr($title_tag); ?> class="qodef-iwt-text">
        <?php if($link !== ''){ ?>
        <a href="<?php echo esc_url($link); ?>" target="_self">
        <?php } ?>
		    <?php echo wp_kses($title, array( 'br' => true )); ?>
        <?php if($link !== ''){ ?>
        </a>
        <?php } ?>
	</<?php echo esc_attr($title_tag); ?>>
</div>