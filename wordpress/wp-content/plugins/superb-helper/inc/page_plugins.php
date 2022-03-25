<?php
		require $this->base_dir . "inc/data/free-plugins.php";
?>
<div class="wrap">
	<h2>Free plugins by SuperbThemes</h2>
	<div class="wp-list-table widefat plugin-install">
	<div class="spbhlpr-plugin-events"><?php $this->spbhlpr_eventHandler(); ?></div>
		<div id="the-list">
			<?php foreach($free_plugins as &$plugin){
				$name = esc_html($plugin['name']);
				$path = esc_attr($plugin['path']);
				$slug = esc_attr($plugin['slug']);
				?>
					<!-- List item start -->
			<div class="plugin-card plugin-card">
				<div class="plugin-card-top">
					<div class="name column-name superb-helper-page-name">
						<h3>
							<?php echo esc_html($plugin['name']);?> <img src="<?php echo $this->base_url.'assets/img/'.esc_attr($plugin['img']); ?>" class="plugin-icon superb-helper-page-plugin-icon" alt="">
						</h3>
					</div>
					<div class="desc column-description superb-helper-page-desc">
						<p><?php echo esc_html($plugin['desc']);?></p>
					</div>
				</div>
				<div class="plugin-card-bottom spbhlp-card-bottom">
					<div class="column-compatibility superbhelperpro-recommend-column-compatibility">
						<?php
						if(is_plugin_active($path)){
							echo "<span class='superbhelperpro-plugin-activated'>Activated</span>";
							if (isset($plugin['url'])) {
								$plugin_data = get_plugin_data($this->plugin_dir.$path);
								$plugin_version = $plugin_data['Version'];
								echo $plugin_version < 100 ? "<span class='superbgelperpro-pl-p-pro'><a href='".esc_attr($plugin['url'])."' target='_blank'>VIEW PRO</a></span>" : "<span>Premium Features Installed</span>";
							}

						} else {
							echo '<form method="post"><input type="hidden" name="path" value="'.$path.'" />';
							echo $this->is_plugin_installed($path)?
							'<input type="hidden" name="spbhlprq" value="activate" />'.wp_nonce_field('spbhlpr_activate_plugin','_wpnonce_spbhlpr',true,false).'<button type="submit" onclick="spbhlpr_LoadSpinner(\'Activating..\',\''.$name.'..\')" class="install-now button">Activate</button>':
							'<input type="hidden" name="spbhlprq" value="install" /><input type="hidden" name="slug" value="'.$slug.'" />'.wp_nonce_field('spbhlpr_install_plugin','_wpnonce_spbhlpr',true,false).'<button type="submit" onclick="spbhlpr_LoadSpinner(\'Installing..\',\''.$name.'..\')" class="install-now button">Install Plugin</button>';
							echo '</form>';
						}
						?>
					</div>
				</div>
			</div>
			<!-- List item end-->
				<?php
			}?>
		</div>
	</div>
</div>