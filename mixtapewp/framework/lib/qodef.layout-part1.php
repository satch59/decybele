<?php

/*
   Interface: iMixtapeQodeLayoutNode
   A interface that implements Layout Node methods
*/
interface iMixtapeQodeLayoutNode
{
	public function hasChidren();
	public function getChild($key);
	public function addChild($key, $value);
}

/*
   Interface: iMixtapeQodeRender
   A interface that implements Render methods
*/
interface iMixtapeQodeRender
{
	public function render($factory);
}

/*
   Class: MixtapeQodePanel
   A class that initializes Qode Panel
*/
class MixtapeQodePanel implements iMixtapeQodeLayoutNode, iMixtapeQodeRender {

	public $children;
	public $title;
	public $name;
	public $hidden_property;
	public $hidden_value;
	public $hidden_values;

	function __construct($title="",$name="",$hidden_property="",$hidden_value="",$hidden_values=array()) {
		$this->children = array();
		$this->title = $title;
		$this->name = $name;
		$this->hidden_property = $hidden_property;
		$this->hidden_value = $hidden_value;
		$this->hidden_values = $hidden_values;
	}

	public function hasChidren() {
		return (count($this->children) > 0)?true:false;
	}

	public function getChild($key) {
		return $this->children[$key];
	}

	public function addChild($key, $value) {
		$this->children[$key] = $value;
	}

	public function render($factory) {
		$hidden = false;
		if (!empty($this->hidden_property)){
			if (mixtape_qodef_option_get_value($this->hidden_property)==$this->hidden_value)
				$hidden = true;
			else {
				foreach ($this->hidden_values as $value) {
					if (mixtape_qodef_option_get_value($this->hidden_property)==$value)
						$hidden = true;

				}
			}
		}
		?>
		<div class="qodef-page-form-section-holder" id="qodef_<?php echo esc_attr($this->name); ?>"<?php if ($hidden) { ?> style="display: none"<?php } ?>>
			<h3 class="qodef-page-section-title"><?php echo esc_html($this->title); ?></h3>
			<?php
			foreach ($this->children as $child) {
				$this->renderChild($child, $factory);
			}
			?>
		</div>
	<?php
	}

	public function renderChild(iMixtapeQodeRender $child, $factory) {
		$child->render($factory);
	}
}

/*
   Class: MixtapeQodeContainer
   A class that initializes Qode Container
*/
class MixtapeQodeContainer implements iMixtapeQodeLayoutNode, iMixtapeQodeRender {

	public $children;
	public $name;
	public $hidden_property;
	public $hidden_value;
	public $hidden_values;

	function __construct($name="",$hidden_property="",$hidden_value="",$hidden_values=array()) {
		$this->children = array();
		$this->name = $name;
		$this->hidden_property = $hidden_property;
		$this->hidden_value = $hidden_value;
		$this->hidden_values = $hidden_values;
	}

	public function hasChidren() {
		return (count($this->children) > 0)?true:false;
	}

	public function getChild($key) {
		return $this->children[$key];
	}

	public function addChild($key, $value) {
		$this->children[$key] = $value;
	}

	public function render($factory) {
		$hidden = false;
		if (!empty($this->hidden_property)){
			if (mixtape_qodef_option_get_value($this->hidden_property)==$this->hidden_value)
				$hidden = true;
			else {
				foreach ($this->hidden_values as $value) {
					if (mixtape_qodef_option_get_value($this->hidden_property)==$value)
						$hidden = true;

				}
			}
		}
		?>
		<div class="qodef-page-form-container-holder" id="qodef_<?php echo esc_attr($this->name); ?>"<?php if ($hidden) { ?> style="display: none"<?php } ?>>
			<?php
			foreach ($this->children as $child) {
				$this->renderChild($child, $factory);
			}
			?>
		</div>
	<?php
	}

	public function renderChild(iMixtapeQodeRender $child, $factory) {
		$child->render($factory);
	}
}


/*
   Class: MixtapeQodeContainerNoStyle
   A class that initializes Qode Container without css classes
*/
class MixtapeQodeContainerNoStyle implements iMixtapeQodeLayoutNode, iMixtapeQodeRender {

	public $children;
	public $name;
	public $hidden_property;
	public $hidden_value;
	public $hidden_values;

	function __construct($name="",$hidden_property="",$hidden_value="",$hidden_values=array()) {
		$this->children = array();
		$this->name = $name;
		$this->hidden_property = $hidden_property;
		$this->hidden_value = $hidden_value;
		$this->hidden_values = $hidden_values;
	}

	public function hasChidren() {
		return (count($this->children) > 0)?true:false;
	}

	public function getChild($key) {
		return $this->children[$key];
	}

	public function addChild($key, $value) {
		$this->children[$key] = $value;
	}

	public function render($factory) {
		$hidden = false;
		if (!empty($this->hidden_property)){
			if (mixtape_qodef_option_get_value($this->hidden_property)==$this->hidden_value)
				$hidden = true;
			else {
				foreach ($this->hidden_values as $value) {
					if (mixtape_qodef_option_get_value($this->hidden_property)==$value)
						$hidden = true;

				}
			}
		}
		?>
		<div id="qodef_<?php echo esc_attr($this->name); ?>"<?php if ($hidden) { ?> style="display: none"<?php } ?>>
			<?php
			foreach ($this->children as $child) {
				$this->renderChild($child, $factory);
			}
			?>
		</div>
	<?php
	}

	public function renderChild(iMixtapeQodeRender $child, $factory) {
		$child->render($factory);
	}
}

/*
   Class: MixtapeQodeGroup
   A class that initializes Qode Group
*/
class MixtapeQodeGroup implements iMixtapeQodeLayoutNode, iMixtapeQodeRender {

	public $children;
	public $title;
	public $description;

	function __construct($title="",$description="") {
		$this->children = array();
		$this->title = $title;
		$this->description = $description;
	}

	public function hasChidren() {
		return (count($this->children) > 0)?true:false;
	}

	public function getChild($key) {
		return $this->children[$key];
	}

	public function addChild($key, $value) {
		$this->children[$key] = $value;
	}

	public function render($factory) {
		?>

		<div class="qodef-page-form-section">


			<div class="qodef-field-desc">
				<h4><?php echo esc_html($this->title); ?></h4>

				<p><?php echo esc_html($this->description); ?></p>
			</div>
			<!-- close div.qodef-field-desc -->

			<div class="qodef-section-content">
				<div class="container-fluid">
					<?php
					foreach ($this->children as $child) {
						$this->renderChild($child, $factory);
					}
					?>
				</div>
			</div>
			<!-- close div.qodef-section-content -->

		</div>
	<?php
	}

	public function renderChild(iMixtapeQodeRender $child, $factory) {
		$child->render($factory);
	}
}

/*
   Class: MixtapeQodeNotice
   A class that initializes Qode Notice
*/
class MixtapeQodeNotice implements iMixtapeQodeRender {

	public $children;
	public $title;
	public $description;
	public $notice;
	public $hidden_property;
	public $hidden_value;
	public $hidden_values;

	function __construct($title="",$description="",$notice="",$hidden_property="",$hidden_value="",$hidden_values=array()) {
		$this->children = array();
		$this->title = $title;
		$this->description = $description;
		$this->notice = $notice;
		$this->hidden_property = $hidden_property;
		$this->hidden_value = $hidden_value;
		$this->hidden_values = $hidden_values;
	}

	public function render($factory) {
		$hidden = false;
		if (!empty($this->hidden_property)){
			if (mixtape_qodef_option_get_value($this->hidden_property)==$this->hidden_value)
				$hidden = true;
			else {
				foreach ($this->hidden_values as $value) {
					if (mixtape_qodef_option_get_value($this->hidden_property)==$value)
						$hidden = true;

				}
			}
		}
		?>

		<div class="qodef-page-form-section"<?php if ($hidden) { ?> style="display: none"<?php } ?>>


			<div class="qodef-field-desc">
				<h4><?php echo esc_html($this->title); ?></h4>

				<p><?php echo esc_html($this->description); ?></p>
			</div>
			<!-- close div.qodef-field-desc -->

			<div class="qodef-section-content">
				<div class="container-fluid">
					<div class="alert alert-warning">
						<?php echo esc_html($this->notice); ?>
					</div>
				</div>
			</div>
			<!-- close div.qodef-section-content -->

		</div>
	<?php
	}
}

/*
   Class: MixtapeQodeRow
   A class that initializes Qode Row
*/
class MixtapeQodeRow implements iMixtapeQodeLayoutNode, iMixtapeQodeRender {

	public $children;
	public $next;

	function __construct($next=false) {
		$this->children = array();
		$this->next = $next;
	}

	public function hasChidren() {
		return (count($this->children) > 0)?true:false;
	}

	public function getChild($key) {
		return $this->children[$key];
	}

	public function addChild($key, $value) {
		$this->children[$key] = $value;
	}

	public function render($factory) {
		?>
		<div class="row<?php if ($this->next) echo " next-row"; ?>">
			<?php
			foreach ($this->children as $child) {
				$this->renderChild($child, $factory);
			}
			?>
		</div>
	<?php
	}

	public function renderChild(iMixtapeQodeRender $child, $factory) {
		$child->render($factory);
	}
}

/*
   Class: MixtapeQodeTitle
   A class that initializes Qode Title
*/
class MixtapeQodeTitle implements iMixtapeQodeRender {
	private $name;
	private $title;
	public $hidden_property;
	public $hidden_values = array();

	function __construct($name="",$title="",$hidden_property="",$hidden_value="") {
		$this->title = $title;
		$this->name = $name;
		$this->hidden_property = $hidden_property;
		$this->hidden_value = $hidden_value;
	}

	public function render($factory) {
		$hidden = false;
		if (!empty($this->hidden_property)){
			if (mixtape_qodef_option_get_value($this->hidden_property)==$this->hidden_value)
				$hidden = true;
		}
		?>
		<h5 class="qodef-page-section-subtitle" id="qodef_<?php echo esc_attr($this->name); ?>"<?php if ($hidden) { ?> style="display: none"<?php } ?>><?php echo esc_html($this->title); ?></h5>
	<?php
	}
}

/*
   Class: MixtapeQodeField
   A class that initializes Qode Field
*/
class MixtapeQodeField implements iMixtapeQodeRender {
	private $type;
	private $name;
	private $default_value;
	private $label;
	private $description;
	private $options = array();
	private $args = array();
	public $hidden_property;
	public $hidden_values = array();


	function __construct($type,$name,$default_value="",$label="",$description="", $options = array(), $args = array(),$hidden_property="", $hidden_values = array()) {		
		global $mixtape_qodef_Framework;
		$this->type = $type;
		$this->name = $name;
		$this->default_value = $default_value;
		$this->label = $label;
		$this->description = $description;
		$this->options = $options;
		$this->args = $args;
		$this->hidden_property = $hidden_property;
		$this->hidden_values = $hidden_values;
		$mixtape_qodef_Framework->qodefOptions->addOption($this->name,$this->default_value, $type);
	}

	public function render($factory) {
		$hidden = false;
		if (!empty($this->hidden_property)){
			foreach ($this->hidden_values as $value) {
				if (mixtape_qodef_option_get_value($this->hidden_property)==$value)
					$hidden = true;

			}
		}
		$factory->render( $this->type, $this->name, $this->label, $this->description, $this->options, $this->args, $hidden );
	}
}

/*
   Class: MixtapeQodeMetaField
   A class that initializes Qode Meta Field
*/
class MixtapeQodeMetaField implements iMixtapeQodeRender {
	private $type;
	private $name;
	private $default_value;
	private $label;
	private $description;
	private $options = array();
	private $args = array();
	public $hidden_property;
	public $hidden_values = array();


	function __construct($type,$name,$default_value="",$label="",$description="", $options = array(), $args = array(),$hidden_property="", $hidden_values = array()) {
		global $mixtape_qodef_Framework;
		$this->type = $type;
		$this->name = $name;
		$this->default_value = $default_value;
		$this->label = $label;
		$this->description = $description;
		$this->options = $options;
		$this->args = $args;
		$this->hidden_property = $hidden_property;
		$this->hidden_values = $hidden_values;
		$mixtape_qodef_Framework->qodefMetaBoxes->addOption($this->name,$this->default_value);
	}

	public function render($factory) {
		$hidden = false;
		if (!empty($this->hidden_property)){
			foreach ($this->hidden_values as $value) {
				if (mixtape_qodef_option_get_value($this->hidden_property)==$value)
					$hidden = true;

			}
		}
		$factory->render( $this->type, $this->name, $this->label, $this->description, $this->options, $this->args, $hidden );
	}
}

abstract class MixtapeQodeFieldType {

	abstract public function render( $name, $label="",$description="", $options = array(), $args = array(), $hidden = false );

}

class MixtapeQodeFieldText extends MixtapeQodeFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false, $repeat = array() ) {
		$col_width = 12;
		if(isset($args["col_width"])) {
            $col_width = $args["col_width"];
        }

        $suffix = !empty($args['suffix']) ? $args['suffix'] : false;

		$class = '';

		if (!empty($repeat)) {
			$id = $name . '-' . $repeat['index'];
			$name .= '[]';
			$value = $repeat['value'];
			$class = 'qodef-repeater-field';
		} else {
			$id = $name;
			$value = mixtape_qodef_option_get_value($name);
		}

		?>

		<div class="qodef-page-form-section  <?php echo esc_attr($class); ?>" id="qodef_<?php echo esc_attr($id); ?>"<?php if ($hidden) { ?> style="display: none"<?php } ?>>


			<div class="qodef-field-desc">
				<h4><?php echo esc_html($label); ?></h4>

				<p><?php echo esc_html($description); ?></p>
			</div>
			<!-- close div.qodef-field-desc -->

			<div class="qodef-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-<?php echo esc_attr($col_width); ?>">
                            <?php if($suffix) : ?>
                            <div class="input-group">
                            <?php endif; ?>
                                <input type="text"
                                    class="form-control qodef-input qodef-form-element"
                                    name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(htmlspecialchars($value)); ?>"
                                    placeholder=""/>
                                <?php if($suffix) : ?>
                                    <div class="input-group-addon"><?php echo esc_html($args['suffix']); ?></div>
                                <?php endif; ?>
                            <?php if($suffix) : ?>
                            </div>
                            <?php endif; ?>

                        </div>
					</div>
				</div>
			</div>
			<!-- close div.qodef-section-content -->

		</div>
	<?php

	}

}

class MixtapeQodeFieldTextSimple extends MixtapeQodeFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false, $repeat = array() ) {

		$suffix = !empty($args['suffix']) ? $args['suffix'] : false;
		$class = '';

		if (!empty($repeat)) {
			$id = str_replace(array('[',']'),'',$name) . '-' .rand();
			$name .= '[]';
			$value = $repeat['value'];
			$class = 'qodef-repeater-field';
		} else {
			$id = $name;
			$value = mixtape_qodef_option_get_value($name);
		}

		?>


		<div class="col-lg-3 <?php echo esc_attr($class); ?>" id="qodef_<?php echo esc_attr($id); ?>"<?php if ($hidden) { ?> style="display: none"<?php } ?>>
			<em class="qodef-field-description"><?php echo esc_html($label); ?></em>
			<?php if($suffix) : ?>
			<div class="input-group">
            <?php endif; ?>
				<input type="text"
				   class="form-control qodef-input qodef-form-element"
				   name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(htmlspecialchars($value)); ?>"
				   placeholder=""/>
				<?php if($suffix) : ?>
					<div class="input-group-addon"><?php echo esc_html($args['suffix']); ?></div>
				<?php endif; ?>
			<?php if($suffix) : ?>
			</div>
			<?php endif; ?>
		</div>
	<?php

	}

}

class MixtapeQodeFieldTextArea extends MixtapeQodeFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false, $repeat = array() ) {
		$class = '';

		if (!empty($repeat)) {
			$name .= '[]';
			$value = $repeat['value'];
			$class = 'qodef-repeater-field';
		} else {
			$value = mixtape_qodef_option_get_value($name);
		}

		?>

		<div class="qodef-page-form-section">


			<div class="qodef-field-desc">
				<h4><?php echo esc_html($label); ?></h4>

				<p><?php echo esc_html($description); ?></p>
			</div>
			<!-- close div.qodef-field-desc -->


			<div class="qodef-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12 <?php echo esc_attr($class); ?>">
							<textarea class="form-control qodef-form-element"
									  name="<?php echo esc_attr($name); ?>"
									  rows="5"><?php echo esc_html(htmlspecialchars($value)); ?></textarea>
						</div>
					</div>
				</div>
			</div>
			<!-- close div.qodef-section-content -->

		</div>
	<?php

	}

}

class MixtapeQodeFieldTextAreaSimple extends MixtapeQodeFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false, $repeat = array() ) {
		$class = '';

		if (!empty($repeat)) {
			$name .= '[]';
			$value = $repeat['value'];
			$class = 'qodef-repeater-field';
		} else {
			$value = mixtape_qodef_option_get_value($name);
		}

		?>

		<div class="col-lg-3 <?php echo esc_attr($class); ?>">
			<em class="qodef-field-description"><?php echo esc_html($label); ?></em>
			<textarea class="form-control qodef-form-element"
					  name="<?php echo esc_attr($name); ?>"
					  rows="5"><?php echo esc_html($value); ?></textarea>
		</div>
		<?php

	}

}

class MixtapeQodeFieldColor extends MixtapeQodeFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
		?>

		<div class="qodef-page-form-section" id="qodef_<?php echo esc_attr($name); ?>">


			<div class="qodef-field-desc">
				<h4><?php echo esc_html($label); ?></h4>

				<p><?php echo esc_html($description); ?></p>
			</div>
			<!-- close div.qodef-field-desc -->

			<div class="qodef-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<input type="text" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(mixtape_qodef_option_get_value($name)); ?>" class="my-color-field"/>
						</div>
					</div>
				</div>
			</div>
			<!-- close div.qodef-section-content -->

		</div>
	<?php

	}

}

class MixtapeQodeFieldColorSimple extends MixtapeQodeFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
		global $mixtape_qodef_options;
		?>

		<div class="col-lg-3" id="qodef_<?php echo esc_attr($name); ?>"<?php if ($hidden) { ?> style="display: none"<?php } ?>>
			<em class="qodef-field-description"><?php echo esc_html($label); ?></em>
			<input type="text" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(mixtape_qodef_option_get_value($name)); ?>" class="my-color-field"/>
		</div>
	<?php

	}

}

class MixtapeQodeFieldImage extends MixtapeQodeFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
		global $mixtape_qodef_options;
		?>

		<div class="qodef-page-form-section">


			<div class="qodef-field-desc">
				<h4><?php echo esc_html($label); ?></h4>

				<p><?php echo esc_html($description); ?></p>
			</div>
			<!-- close div.qodef-field-desc -->

			<div class="qodef-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<div class="qodef-media-uploader">
								<div<?php if (!mixtape_qodef_option_has_value($name)) { ?> style="display: none"<?php } ?>
									class="qodef-media-image-holder">
									<img src="<?php if (mixtape_qodef_option_has_value($name)) { echo esc_url(mixtape_qodef_get_attachment_thumb_url(mixtape_qodef_option_get_value($name))); } ?>" alt=""
										 class="qodef-media-image img-thumbnail"/>
								</div>
								<div style="display: none"
									 class="qodef-media-meta-fields">
									<input type="hidden" class="qodef-media-upload-url"
										   name="<?php echo esc_attr($name); ?>"
										   value="<?php echo esc_attr(mixtape_qodef_option_get_value($name)); ?>"/>
								</div>
								<a class="qodef-media-upload-btn btn btn-sm btn-primary"
								   href="javascript:void(0)"
								   data-frame-title="<?php esc_html_e('Select Image', 'mixtapewp'); ?>"
								   data-frame-button-text="<?php esc_html_e('Select Image', 'mixtapewp'); ?>"><?php esc_html_e('Upload', 'mixtapewp'); ?></a>
								<a style="display: none;" href="javascript: void(0)"
								   class="qodef-media-remove-btn btn btn-default btn-sm"><?php esc_html_e('Remove', 'mixtapewp'); ?></a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- close div.qodef-section-content -->

		</div>
	<?php

	}

}

class MixtapeQodeFieldFile extends MixtapeQodeFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false, $repeat = array() ) {
		global $mixtape_qodef_options;

		if (!empty($repeat)) {
			$name .= '[]';
			$value = $repeat['value'];
			$class = 'qodef-repeater-field';
			$has_value = empty($value)?false:true;
		} else {
			$value = mixtape_qodef_option_get_value($name);
			$has_value = mixtape_qodef_option_has_value($name);
		}
		?>

		<div class="qodef-page-form-section">


			<div class="qodef-field-desc">
				<h4><?php echo esc_html($label); ?></h4>

				<p><?php echo esc_html($description); ?></p>
			</div>
			<!-- close div.qodef-field-desc -->

			<div class="qodef-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12 <?php echo esc_attr($class); ?>">
							<div class="qodef-media-uploader">
								<div<?php if (!$has_value) { ?> style="display: none"<?php } ?>
									class="qodef-media-image-holder">
									<img src="<?php if ($has_value) { echo esc_url(mixtape_qodef_option_get_uploaded_file_type($value)); } ?>" alt=""
										 class="qodef-media-image img-thumbnail"/>
									<?php if ($has_value) { ?> <h4 class="qodef-media-title"><?php echo mixtape_qodef_option_get_uploaded_file_title($value) ?></h4> <?php } ?>
								</div>
								<div style="display: none"
									 class="qodef-media-meta-fields">
									<input type="hidden" class="qodef-media-upload-url"
										   name="<?php echo esc_attr($name); ?>"
										   value="<?php echo esc_attr($value); ?>"/>
								</div>
								<a class="qodef-media-upload-btn btn btn-sm btn-primary"
								   href="javascript:void(0)"
								   data-frame-title="<?php esc_html_e('Select File', 'mixtapewp'); ?>"
								   data-frame-button-text="<?php esc_html_e('Select File', 'mixtapewp'); ?>"><?php esc_html_e('Upload', 'mixtapewp'); ?></a>
								<a style="display: none;" href="javascript: void(0)"
								   class="qodef-media-remove-btn btn btn-default btn-sm"><?php esc_html_e('Remove', 'mixtapewp'); ?></a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- close div.qodef-section-content -->

		</div>
		<?php

	}

}

class MixtapeQodeFieldImageSimple extends MixtapeQodeFieldType {

    public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
        ?>


        <div class="col-lg-3" id="qodef_<?php echo esc_attr($name); ?>"<?php if ($hidden) { ?> style="display: none"<?php } ?>>
            <em class="qodef-field-description"><?php echo esc_html($label); ?></em>
            <div class="qodef-media-uploader">
                <div<?php if (!mixtape_qodef_option_has_value($name)) { ?> style="display: none"<?php } ?>
                    class="qodef-media-image-holder">
                    <img src="<?php if (mixtape_qodef_option_has_value($name)) { echo esc_url(mixtape_qodef_get_attachment_thumb_url(mixtape_qodef_option_get_value($name))); } ?>" alt=""
                         class="qodef-media-image img-thumbnail"/>
                </div>
                <div style="display: none"
                     class="qodef-media-meta-fields">
                    <input type="hidden" class="qodef-media-upload-url"
                           name="<?php echo esc_attr($name); ?>"
                           value="<?php echo esc_attr(mixtape_qodef_option_get_value($name)); ?>"/>
                </div>
                <a class="qodef-media-upload-btn btn btn-sm btn-primary"
                   href="javascript:void(0)"
                   data-frame-title="<?php esc_html_e('Select Image', 'mixtapewp'); ?>"
                   data-frame-button-text="<?php esc_html_e('Select Image', 'mixtapewp'); ?>"><?php esc_html_e('Upload', 'mixtapewp'); ?></a>
                <a style="display: none;" href="javascript: void(0)"
                   class="qodef-media-remove-btn btn btn-default btn-sm"><?php esc_html_e('Remove', 'mixtapewp'); ?></a>
            </div>
        </div>
    <?php

    }

}

class MixtapeQodeFieldFileSimple extends MixtapeQodeFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false, $repeat = array() ) {

		$class = '';

		if (!empty($repeat)) {
			$id = $name . '-' . $repeat['index'];
			$name .= '[]';
			$value = $repeat['value'];
			$class = 'qodef-repeater-field';
			$has_value = empty($value)?false:true;
		} else {
			$id = $name;
			$value = mixtape_qodef_option_get_value($name);
			$has_value = mixtape_qodef_option_has_value($name);
		}

		?>


		<div class="col-lg-3 <?php echo esc_attr($class); ?>" id="qodef_<?php echo esc_attr($id); ?>"<?php if ($hidden) { ?> style="display: none"<?php } ?>>
			<em class="qodef-field-description"><?php echo esc_html($label); ?></em>
			<div class="qodef-media-uploader">
				<div<?php if (!$has_value) { ?> style="display: none"<?php } ?>
					class="qodef-media-image-holder">
					<img src="<?php if ($has_value) { echo esc_url(mixtape_qodef_option_get_uploaded_file_type($value)); } ?>" alt=""
						 class="qodef-media-image img-thumbnail"/>
					<?php if ($has_value) { ?> <h4 class="qodef-media-title"><?php echo mixtape_qodef_option_get_uploaded_file_title($value) ?></h4> <?php } ?>
				</div>
				<div style="display: none"
					 class="qodef-media-meta-fields">
					<input type="hidden" class="qodef-media-upload-url"
						   name="<?php echo esc_attr($name); ?>"
						   value="<?php echo esc_attr($value); ?>"/>
				</div>
				<a class="qodef-media-upload-btn btn btn-sm btn-primary"
				   href="javascript:void(0)"
				   data-frame-title="<?php esc_html_e('Select File', 'mixtapewp'); ?>"
				   data-frame-button-text="<?php esc_html_e('Select File', 'mixtapewp'); ?>"><?php esc_html_e('Upload', 'mixtapewp'); ?></a>
				<a style="display: none;" href="javascript: void(0)"
				   class="qodef-media-remove-btn btn btn-default btn-sm"><?php esc_html_e('Remove', 'mixtapewp'); ?></a>
			</div>
		</div>
		<?php

	}

}

class MixtapeQodeFieldFont extends MixtapeQodeFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
		global $mixtape_qodef_options;
		global $mixtape_qodef_fonts_array;
		?>

		<div class="qodef-page-form-section">


			<div class="qodef-field-desc">
				<h4><?php echo esc_html($label); ?></h4>

				<p><?php echo esc_html($description); ?></p>
			</div>
			<!-- close div.qodef-field-desc -->



			<div class="qodef-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-3">
							<select class="form-control qodef-form-element"
									name="<?php echo esc_attr($name); ?>">
								<option value="-1">Default</option>
								<?php foreach($mixtape_qodef_fonts_array as $fontArray) { ?>
									<option <?php if (mixtape_qodef_option_get_value($name) == str_replace(' ', '+', $fontArray["family"])) { echo "selected='selected'"; } ?>  value="<?php echo esc_attr(str_replace(' ', '+', $fontArray["family"])); ?>"><?php echo esc_html($fontArray["family"]); ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div>
			</div>
			<!-- close div.qodef-section-content -->

		</div>
	<?php

	}

}

class MixtapeQodeFieldFontSimple extends MixtapeQodeFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
		global $mixtape_qodef_options;
		global $mixtape_qodef_fonts_array;
		?>


		<div class="col-lg-3">
			<em class="qodef-field-description"><?php echo esc_html($label); ?></em>
			<select class="form-control qodef-form-element"
					name="<?php echo esc_attr($name); ?>">
				<option value="-1">Default</option>
				<?php foreach($mixtape_qodef_fonts_array as $fontArray) { ?>
					<option <?php if (mixtape_qodef_option_get_value($name) == str_replace(' ', '+', $fontArray["family"])) { echo "selected='selected'"; } ?>  value="<?php echo esc_attr(str_replace(' ', '+', $fontArray["family"])); ?>"><?php echo esc_html($fontArray["family"]); ?></option>
				<?php } ?>
			</select>
		</div>
	<?php

	}

}

class MixtapeQodeFieldSelect extends MixtapeQodeFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false, $repeat = array() ) {

		$class = '';

		if (!empty($repeat)) {
			$id = $name . '-' . $repeat['index'];
			$name .= '[]';
			$rvalue = $repeat['value'];
			$class = 'qodef-repeater-field';
		} else {
			$id = $name;
			$rvalue = mixtape_qodef_option_get_value($name);
		}

		$dependence = false;
		if(isset($args["dependence"]))
			$dependence = true;
		$show = array();
		if(isset($args["show"]))
			$show = $args["show"];
		$hide = array();
		if(isset($args["hide"]))
			$hide = $args["hide"];
		?>

		<div class="qodef-page-form-section <?php echo esc_attr($class); ?>" id="qodef_<?php echo esc_attr($id); ?>" <?php if ($hidden) { ?> style="display: none"<?php } ?>>


			<div class="qodef-field-desc">
				<h4><?php echo esc_html($label); ?></h4>

				<p><?php echo esc_html($description); ?></p>
			</div>
			<!-- close div.qodef-field-desc -->



			<div class="qodef-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-3">
							<select class="form-control qodef-form-element<?php if ($dependence) { echo " dependence"; } ?>"
								<?php foreach($show as $key=>$value) { ?>
									data-show-<?php echo str_replace(' ', '',$key); ?>="<?php echo esc_attr($value); ?>"
								<?php } ?>
								<?php foreach($hide as $key=>$value) { ?>
									data-hide-<?php echo str_replace(' ', '',$key); ?>="<?php echo esc_attr($value); ?>"
								<?php } ?>
									name="<?php echo esc_attr($name); ?>">
								<?php foreach($options as $key=>$value) { if ($key == "-1") $key = ""; ?>
									<option <?php if ($rvalue == $key) { echo "selected='selected'"; } ?>  value="<?php echo esc_attr($key); ?>"><?php echo esc_html($value); ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div>
			</div>
			<!-- close div.qodef-section-content -->

		</div>
		<?php

	}

}

class MixtapeQodeFieldSelectBlank extends MixtapeQodeFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
		global $mixtape_qodef_options;
		$dependence = false;
		if(isset($args["dependence"]))
			$dependence = true;
		$show = array();
		if(isset($args["show"]))
			$show = $args["show"];
		$hide = array();
		if(isset($args["hide"]))
			$hide = $args["hide"];
		?>

		<div class="qodef-page-form-section"<?php if ($hidden) { ?> style="display: none"<?php } ?>>


			<div class="qodef-field-desc">
				<h4><?php echo esc_html($label); ?></h4>

				<p><?php echo esc_html($description); ?></p>
			</div>
			<!-- close div.qodef-field-desc -->



			<div class="qodef-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-3">
							<select class="form-control qodef-form-element<?php if ($dependence) { echo " dependence"; } ?>"
								<?php foreach($show as $key=>$value) { ?>
									data-show-<?php echo str_replace(' ', '',$key); ?>="<?php echo esc_attr($value); ?>"
								<?php } ?>
								<?php foreach($hide as $key=>$value) { ?>
									data-hide-<?php echo str_replace(' ', '',$key); ?>="<?php echo esc_attr($value); ?>"
								<?php } ?>
									name="<?php echo esc_attr($name); ?>">
								<option <?php if (mixtape_qodef_option_get_value($name) == "") { echo "selected='selected'"; } ?>  value=""></option>
								<?php foreach($options as $key=>$value) { if ($key == "-1") $key = ""; ?>
									<option <?php if (mixtape_qodef_option_get_value($name) == $key) { echo "selected='selected'"; } ?>  value="<?php echo esc_attr($key); ?>"><?php echo esc_html($value); ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div>
			</div>
			<!-- close div.qodef-section-content -->

		</div>
	<?php

	}

}

class MixtapeQodeFieldSelectSimple extends MixtapeQodeFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
		global $mixtape_qodef_options;
        $dependence = false;
        if(isset($args["dependence"]))
            $dependence = true;
        $show = array();
        if(isset($args["show"]))
            $show = $args["show"];
        $hide = array();
        if(isset($args["hide"]))
            $hide = $args["hide"];
        ?>


		<div class="col-lg-3">
			<em class="qodef-field-description"><?php echo esc_html($label); ?></em>
            <select class="form-control qodef-form-element<?php if ($dependence) { echo " dependence"; } ?>"
                <?php foreach($show as $key=>$value) { ?>
                    data-show-<?php echo str_replace(' ', '',$key); ?>="<?php echo esc_attr($value); ?>"
                <?php } ?>
                <?php foreach($hide as $key=>$value) { ?>
                    data-hide-<?php echo str_replace(' ', '',$key); ?>="<?php echo esc_attr($value); ?>"
                <?php } ?>
                    name="<?php echo esc_attr($name); ?>">
                <option <?php if (mixtape_qodef_option_get_value($name) == "") { echo "selected='selected'"; } ?>  value=""></option>
                <?php foreach($options as $key=>$value) { if ($key == "-1") $key = ""; ?>
                    <option <?php if (mixtape_qodef_option_get_value($name) == $key) { echo "selected='selected'"; } ?>  value="<?php echo esc_attr($key); ?>"><?php echo esc_html($value); ?></option>
                <?php } ?>
            </select>
		</div>
	<?php

	}

}

class MixtapeQodeFieldSelectBlankSimple extends MixtapeQodeFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
		global $mixtape_qodef_options;
        $dependence = false;
        if(isset($args["dependence"]))
            $dependence = true;
        $show = array();
        if(isset($args["show"]))
            $show = $args["show"];
        $hide = array();
        if(isset($args["hide"]))
            $hide = $args["hide"];
        ?>


		<div class="col-lg-3">
			<em class="qodef-field-description"><?php echo esc_html($label); ?></em>
            <select class="form-control qodef-form-element<?php if ($dependence) { echo " dependence"; } ?>"
                <?php foreach($show as $key=>$value) { ?>
                    data-show-<?php echo str_replace(' ', '',$key); ?>="<?php echo esc_attr($value); ?>"
                <?php } ?>
                <?php foreach($hide as $key=>$value) { ?>
                    data-hide-<?php echo str_replace(' ', '',$key); ?>="<?php echo esc_attr($value); ?>"
                <?php } ?>
                    name="<?php echo esc_attr($name); ?>">
                <option <?php if (mixtape_qodef_option_get_value($name) == "") { echo "selected='selected'"; } ?>  value=""></option>
                <?php foreach($options as $key=>$value) { if ($key == "-1") $key = ""; ?>
                    <option <?php if (mixtape_qodef_option_get_value($name) == $key) { echo "selected='selected'"; } ?>  value="<?php echo esc_attr($key); ?>"><?php echo esc_html($value); ?></option>
                <?php } ?>
            </select>
		</div>
	<?php

	}

}

class MixtapeQodeFieldMultiSelect extends MixtapeQodeFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false, $repeat = array() ) {

		$class = '';

		if (!empty($repeat)) {
			$id = $name . '-' . $repeat['index'];
			$name .= '[]';
			$rvalue = $repeat['value'];
			$class = 'qodef-repeater-field';
		} else {
			$id = $name;
			$rvalue = mixtape_qodef_option_get_value($name);
		}

		$dependence = false;
		if(isset($args["dependence"]))
			$dependence = true;
		$show = array();
		if(isset($args["show"]))
			$show = $args["show"];
		$hide = array();
		if(isset($args["hide"]))
			$hide = $args["hide"];
		?>

		<div class="qodef-page-form-section <?php echo esc_attr($class); ?>" id="qodef_<?php echo esc_attr($id); ?>" <?php if ($hidden) { ?> style="display: none"<?php } ?>>


			<div class="qodef-field-desc">
				<h4><?php echo esc_html($label); ?></h4>

				<p><?php echo esc_html($description); ?></p>
			</div>
			<!-- close div.qodef-field-desc -->



			<div class="qodef-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-3">
							<select multiple="multiple" class="form-control qodef-form-element<?php if ($dependence) { echo " dependence"; } ?>"
								<?php foreach($show as $key=>$value) { ?>
									data-show-<?php echo str_replace(' ', '',$key); ?>="<?php echo esc_attr($value); ?>"
								<?php } ?>
								<?php foreach($hide as $key=>$value) { ?>
									data-hide-<?php echo str_replace(' ', '',$key); ?>="<?php echo esc_attr($value); ?>"
								<?php } ?>
									name="<?php echo esc_attr($name); ?>">
								<?php foreach($options as $key=>$value) { if ($key == "-1") $key = ""; ?>
									<option <?php if ($rvalue == $key) { echo "selected='selected'"; } ?>  value="<?php echo esc_attr($key); ?>"><?php echo esc_html($value); ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div>
			</div>
			<!-- close div.qodef-section-content -->

		</div>
		<?php

	}

}


class MixtapeQodeFieldYesNo extends MixtapeQodeFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false, $repeat = array() ) {
		global $mixtape_qodef_options;

		$class = '';
		$rname = $name;
		if (!empty($repeat)) {
			$id = $name . '-' . $repeat['index'];
			$name .= '[]';
			$rvalue = $repeat['value'];
			$class = 'qodef-repeater-field';
			$rname .= '_yesno[]';
		} else {
			$id = $name;
			$rvalue = mixtape_qodef_option_get_value($name);
		}

		$dependence = false;
		if(isset($args["dependence"]))
			$dependence = true;
		$dependence_hide_on_yes = "";
		if(isset($args["dependence_hide_on_yes"]))
			$dependence_hide_on_yes = $args["dependence_hide_on_yes"];
		$dependence_show_on_yes = "";
		if(isset($args["dependence_show_on_yes"]))
			$dependence_show_on_yes = $args["dependence_show_on_yes"];
		?>

		<div class="qodef-page-form-section" id="qodef_<?php echo esc_attr($id); ?>">


			<div class="qodef-field-desc">
				<h4><?php echo esc_html($label); ?></h4>

				<p><?php echo esc_html($description); ?></p>
			</div>
			<!-- close div.qodef-field-desc -->



			<div class="qodef-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12 <?php echo esc_attr($class); ?>">
							<p class="field switch">
								<label data-hide="<?php echo esc_attr($dependence_hide_on_yes); ?>" data-show="<?php echo esc_attr($dependence_show_on_yes); ?>"
									   class="cb-enable<?php if ($rvalue == "yes") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('Yes', 'mixtapewp') ?></span></label>
								<label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
									   class="cb-disable<?php if ($rvalue == "no") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('No', 'mixtapewp') ?></span></label>
								<input type="checkbox" id="checkbox" class="checkbox"
									   name="<?php echo esc_attr($rname); ?>" value="yes"<?php if ($rvalue == "yes") { echo " selected"; } ?>/>
								<input type="hidden" class="checkboxhidden_yesno" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr($rvalue); ?>"/>
							</p>
						</div>
					</div>
				</div>
			</div>
			<!-- close div.qodef-section-content -->

		</div>
		<?php

	}
}

class MixtapeQodeFieldYesNoSimple extends MixtapeQodeFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false, $repeat =  array() ) {
		global $mixtape_qodef_options;

		$class = '';

		if (!empty($repeat)) {
			$name .= '[]';
			$rvalue = $repeat['value'];
			$class = 'qodef-repeater-field';
		} else {
			$rvalue = mixtape_qodef_option_get_value($name);
		}

		$dependence = false;
		if(isset($args["dependence"]))
			$dependence = true;
		$dependence_hide_on_yes = "";
		if(isset($args["dependence_hide_on_yes"]))
			$dependence_hide_on_yes = $args["dependence_hide_on_yes"];
		$dependence_show_on_yes = "";
		if(isset($args["dependence_show_on_yes"]))
			$dependence_show_on_yes = $args["dependence_show_on_yes"];
		?>

		<div class="col-lg-3 <?php echo esc_attr($class); ?>">
			<em class="qodef-field-description"><?php echo esc_html($label); ?></em>
			<p class="field switch">
				<label data-hide="<?php echo esc_attr($dependence_hide_on_yes); ?>" data-show="<?php echo esc_attr($dependence_show_on_yes); ?>"
					   class="cb-enable<?php if ($rvalue == "yes") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('Yes', 'mixtapewp') ?></span></label>
				<label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
					   class="cb-disable<?php if ($rvalue == "no") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('No', 'mixtapewp') ?></span></label>
				<input type="checkbox" id="checkbox" class="checkbox"
					   name="<?php echo esc_attr($name); ?>_yesno" value="yes"<?php if ($rvalue == "yes") { echo " selected"; } ?>/>
				<input type="hidden" class="checkboxhidden_yesno" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr($rvalue); ?>"/>
			</p>
		</div>
		<?php

	}
}