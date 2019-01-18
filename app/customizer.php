<?php

namespace App;

add_action( 'customize_register', function() {

  global $wp_customize;

     // Theme variation setting

     		class Select_Control extends \WP_Customize_Control {
     			public $type = 'select';

     			public function render_content() {
            $themes = array(
              'corporate' => 'Corporate',
              'electronics' => 'Electronics',
              'sticklers' => 'Sticklers',
              'precisioncleaners' => 'Precision Cleaners',
              'medical' => 'Medical',
            );
          ?>
     			<label>
     				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
     				<select <?php $this->link(); ?>>
              <?php foreach($themes as $theme => $name) { ?>
                <option value="<?=$theme?>" <?php if($this->value() == $theme) echo 'selected="selected"'; ?>><?=$name?></option>
              <?php } ?>
     				</select>
     			</label>
     		<?php
     			} //render_content()
     		} //Select_Control()

     		$wp_customize->add_section('theme_colors', array('title'=>'Sub Theme'));

     		$wp_customize->add_setting('subtheme_setting', array('default'=>'corporate'));

     		$wp_customize->add_control( new Select_Control($wp_customize, 'subtheme_setting', array(
     			'label' => 'Color scheme',
     			'section' => 'theme_colors',
     			'setting' => 'subtheme_setting'
     		) ) );
});
