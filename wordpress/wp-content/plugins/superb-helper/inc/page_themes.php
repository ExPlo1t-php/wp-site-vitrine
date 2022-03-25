<?php
        require $this->base_dir . "inc/data/free-themes.php";
?>
<div class="superb-helper-page">
	<div class="wrap">
		<h2>Popular free themes by SuperbThemes</h2>
		<div class="spbhlpr-plugin-events"><?php $this->spbhlpr_eventHandlerTheme(); ?></div>
		<div class="theme-browser rendered">
			<?php foreach ($free_themes as &$theme) {
    $name = esc_html($theme['name']);
    $slug = esc_attr($theme['slug']); ?>
				<!-- Theme start -->
			<div class="theme">
				<div class="theme-screenshot">
					<img src="<?php echo $this->base_url.'assets/img/'.esc_attr($theme['img']); ?>" alt="">
				</div>
				<div class="theme-id-container theme-info">
					<h2 class="theme-name"><?php echo $name; ?></h2>
					<?php
					$theme_data = wp_get_theme();
                    if (($theme_data->get_stylesheet() == $slug)) {
                        echo "<span class='spbhlpr-activated'>Activated</span>";
                        if (isset($theme['url'])) {
                            $theme_version = $theme_data->parent() ? $theme_data->parent()->Version : $theme_data->Version;
                            echo $theme_version < 100 ? "<span class='spbhlpr-chckut-p'><a href='".esc_attr($theme['url'])."' target='_blank'>VIEW PREMIUM VERSION</a></span>" : "<span>Premium Features Installed</span>";
                        }
                    } else {
                        echo '<form method="post"><input type="hidden" name="slug" value="'.$slug.'" />';
                        echo $this->is_theme_installed($slug)?
                        '<input type="hidden" name="spbhlprq" value="activate" />'.wp_nonce_field('spbhlpr_activate_theme', '_wpnonce_spbhlpr', true, false).'<button type="submit" onclick="spbhlpr_LoadSpinner(\'Activating..\',\''.$name.'..\')" class="install-now button">Activate</button>':
                        '<input type="hidden" name="spbhlprq" value="install" />'.wp_nonce_field('spbhlpr_install_theme', '_wpnonce_spbhlpr', true, false).'<button type="submit" onclick="spbhlpr_LoadSpinner(\'Installing..\',\''.$name.'..\')" class="install-now button">Install Theme</button>';
                        echo '</form>';
                    } ?>
				</div>
			</div>
			<!-- Theme end -->
			<?php
} ?>

		</div>
	</div>

</div>