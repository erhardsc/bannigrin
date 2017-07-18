<script type="text/html" id="tmpl-builder_column">
	<div class="themify_builder_col {{ data.newclass }}">
                <div class="themify_grid_drag themify_drag_right"></div>
                <div class="themify_grid_drag themify_drag_left"></div>
		<ul class="themify_builder_column_action">
			<li><a href="#" class="themify_builder_option_column" data-title="<?php esc_html_e( 'Styling', 'themify' );?>" rel="themify-tooltip-bottom"><span class="ti-brush"></span></a></li>
			<li class="separator"></li>
			<li><a href="#" class="themify_builder_export_component" data-title="<?php esc_html_e( 'Export', 'themify' );?>" rel="themify-tooltip-bottom" data-component="{{ data.component }}"><span class="ti-export"></span></a></li>
			<li><a href="#" class="themify_builder_import_component" data-title="<?php esc_html_e( 'Import', 'themify' );?>" rel="themify-tooltip-bottom" data-component="{{ data.component }}"><span class="ti-import"></span></a></li>
			<li class="separator"></li>
			<li><a href="#" class="themify_builder_copy_component" data-title="<?php esc_html_e( 'Copy', 'themify' );?>" rel="themify-tooltip-bottom" data-component="{{ data.component }}"><span class="ti-files"></span></a></li>
			<li><a href="#" class="themify_builder_paste_component" data-title="<?php esc_html_e( 'Paste', 'themify' );?>" rel="themify-tooltip-bottom" data-component="{{ data.component }}"><span class="ti-clipboard"></span></a></li>
			<li class="separator last-sep"></li>
			<li class="themify_builder_column_dragger_li"><a href="#" class="themify_builder_column_dragger"><span class="ti-arrows-horizontal"></span></a></li>
		</ul>
		<div class="themify_module_holder">
                    <div class="empty_holder_text">{{ data.placeholder }}</div>
		</div>
		<div class="column-data-styling" data-styling=""></div>
	</div>
</script>

<script type="text/html" id="tmpl-builder_grid_menu">
	<?php themify_builder_grid_lists('module'); ?>
</script>

<script type="text/html" id="tmpl-builder_lightbox">
	<div id="themify_builder_lightbox_parent" class="themify_builder themify_builder_admin builder-lightbox clearfix {{ data.is_themify_theme }}">
		<div class="themify_builder_lightbox_top_bar clearfix">
			<ul class="themify_builder_options_tab clearfix">
			</ul>

			<div class="themify_builder_lightbox_actions">
				<a class="builder_cancel_lightbox"><?php _e( 'Cancel', 'themify' ) ?><i class="ti ti-close"></i></a>
			</div>
		</div>
		<div id="themify_builder_lightbox_container"></div>
	</div>
	<div id="themify_builder_overlay"></div>
</script>

<script type="text/html" id="tmpl-builder_lite_lightbox_confirm">
	<p>{{ data.message }}</p>
	<p>
	<# _.each(data.buttons, function(value, key) { #> 
		<button data-type="{{ key }}">{{ value.label }}</button> 
	<# }); #>
	</p>
</script>

<script type="text/html" id="tmpl-builder_lite_lightbox_prompt">
	<p>{{ data.message }}</p>
	<p><input type="text" class="themify_builder_litelightbox_prompt_input"></p>
	<p>
	<# _.each(data.buttons, function(value, key) { #> 
		<button data-type="{{ key }}">{{ value.label }}</button> 
	<# }); #>
	</p>
</script>

<script type="text/html" id="tmpl-builder_add_element">
	<div class="themify_builder_module_front clearfix module-{{ data.slug }} active_module" data-module-name="{{ data.slug }}">
		<div class="themify_builder_module_front_overlay"></div>
		<div class="module_menu_front">
			<ul class="themify_builder_dropdown_front">
				<li class="themify_module_menu"><span class="ti-menu"></span>
					<ul>
						<li>
							<a href="#" data-title="<?php esc_html_e('Edit', 'themify'); ?>" rel="themify-tooltip-bottom" class="themify_module_options" data-module-name="{{ data.slug }}"><?php esc_html_e( 'Edit', 'themify' ); ?></a>
						</li>
					</ul>
				</li>
			</ul>
			<div class="front_mod_settings mod_settings_{{ data.slug }}" data-mod-name="{{ data.slug }}">
				<# print("<sc" + "ript type='text/json'>"); #>
				<# print("</sc"+"ript>"); #>
			</div>
		</div>
		<div class="themify_builder_data_mod_name">{{ data.name }}</div>
	</div>
</script>

<script type="text/html" id="tmpl-builder_module_item_draggable">
	<div class="themify_builder_module_outer search_able_item">
		<div class="themify_builder_module module-type-{{data.slug}}" data-module-slug="{{data.slug}}" data-module-name="{{data.name}}">
			<strong class="module_name search_able_title">{{data.name}}</strong> <a href="#" class="add_module_btn" title="<?php esc_html_e( 'Add module', 'themify' );?>"><?php esc_html_e( 'Add', 'themify' );?></a>
		</div>
	</div>
</script>

<script type="text/html" id="tmpl-builder_addon_popover">
	<div class="tb_plus_btn_popover">
		<div class="module_search_wrap">
			<ul class="tb_module_types">
				<li class="active"><a href="#" data-target="tb_pc_module_holder">Modules</a></li>
				<li><a href="#" data-target="tb_module_panel_rows_wrap">Rows</a></li>
			</ul>
			<div id="tb_module_panel_search">
				<input type="text" class="tb_module_panel_search_text">
			</div>
		</div>
		<div class="tb_popover_content tb_pc_module_holder"></div>
		<div class="tb_popover_content tb_module_panel_rows_wrap" style="display:none;">
			<div class="tb_row_cat_filter_wrap">
				<span class="tb_row_cat_filter_active">All</span>
				<!-- /tb_row_cat_filter_active -->
				<ul class="tb_row_cat_filter">
					<li><a href="#">All</a></li>
					<!-- Fetch Testimonials from themify server with JS -->
				</ul>
				<!-- /tb_row_cat_filter -->
			</div>
			<!-- /tb_row_cat_filter_wrap -->
			
			<div class="tb_predesigned_rows_list">
			
				<!-- Fetch Pre-Design Rows from themify server with JS -->
				
			</div>
			<!-- /tb_predesigned_rows_list -->
		</div>
	</div>
</script>