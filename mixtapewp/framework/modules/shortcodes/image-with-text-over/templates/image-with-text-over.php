<div class="qodef-image-with-text-over">
    <div class="qodef-imto-image-holder">
        <?php echo wp_get_attachment_image($image, 'full'); ?>
    </div>
    <div class="qodef-imto-text-holder">
        <div class="qodef-imto-text-holder-inner">
            <div class="qodef-imto-text-holder-inner2">
                <?php if($subtitle !== ''){ ?>
                    <span class="qodef-imto-subtitle"><?php echo esc_html($subtitle); ?></span>
                <?php } ?>
                <?php if($title !== ''){ ?>
                    <h1 class="qodef-imto-title"><?php echo esc_html($title); ?></h1>
                <?php } ?>
                <?php if($show_button !== ''){ ?>
                    <?php echo mixtape_qodef_get_button_html(array(
                        'link' => $button_link,
                        'text' => $button_text,
                        'target' => $button_target,
                        'type' => 'outline',
                        'button_skin' => 'light',
						'hover_color' => "#000",
                        'hover_background_color' => "#fff",
                        'hover_border_color' => "#fff"
                    )); ?>
                <?php } ?>
            </div>
        </div>
    </div>

</div>