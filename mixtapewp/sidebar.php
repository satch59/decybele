<?php
$mixtape_qodef_sidebar = mixtape_qodef_get_sidebar();
?>
<div class="qodef-column-inner">
    <aside class="qodef-sidebar">
        <?php
            if (is_active_sidebar($mixtape_qodef_sidebar)) {
                dynamic_sidebar($mixtape_qodef_sidebar);
            }
        ?>
    </aside>
</div>
