<?php
	$this->set_css($this->default_theme_path.'/doio/css/flexigrid.css');
	$this->set_js_lib($this->default_javascript_path.'/'.grocery_CRUD::JQUERY);

	if ($dialog_forms) {
        $this->set_js_lib($this->default_javascript_path.'/jquery_plugins/jquery.noty.js');
        $this->set_js_lib($this->default_javascript_path.'/jquery_plugins/config/jquery.noty.config.js');
        $this->set_js_lib($this->default_javascript_path.'/common/lazyload-min.js');
    }

    $this->set_js_lib($this->default_javascript_path.'/common/list.js');

	$this->set_js($this->default_theme_path.'/doio/js/cookies.js');
	$this->set_js($this->default_theme_path.'/doio/js/flexigrid.js');

    $this->set_js($this->default_javascript_path.'/jquery_plugins/jquery.form.min.js');

	$this->set_js($this->default_javascript_path.'/jquery_plugins/jquery.numeric.min.js');
	$this->set_js($this->default_theme_path.'/doio/js/jquery.printElement.min.js');

	/** Jquery UI */
	$this->load_js_jqueryui();
?>

<script type='text/javascript'>
	var base_url = '<?php echo base_url();?>';

	var subject = '<?php echo addslashes($subject); ?>';
	var ajax_list_info_url = '<?php echo $ajax_list_info_url; ?>';
	var unique_hash = '<?php echo $unique_hash; ?>';
	var export_url = '<?php echo $export_url; ?>';
	var message_alert_delete = "<?php echo $this->l('alert_delete'); ?>";
</script>
<div class="col-md-12">
	<div id='list-report-error' class='report-div error'></div>

	<?php if($success_message !== null):?>
		<div id='list-report-success' class='alert alert-success'>
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			<?php echo $success_message; ?>
		</div>
	<?php endif; //if($success_message !== null)?>
</div>

<div class="flexigrid" data-unique-hash="<?php echo $unique_hash; ?>">
	<div id="hidden-operations" class="hidden-operations"></div>
	<div id='main-table-box' class="responsive-table">

	<?php if(!$unset_add || !$unset_export || !$unset_print): ?>

		<div class="col-md-12">

			<?php if(!$unset_add):?>
	        	<a href='<?php echo $add_url?>' title='<?php echo $this->l('list_add').' '.$subject?>' class='btn btn-small'>
	        		<i class="icon-plus-sign"></i>
					<?php echo $this->l('list_add').' '.$subject;?>
	            </a>
			<?php endif; //if(!$unset_add) ?>


			<?php if(!$unset_export || !$unset_print): ?>
				<div class="pull-right btn-group">
					<a class="btn btn-small" href="#">
						<i class="icon-print"></i> Documentos
					</a>
			  		<a class="btn btn dropdown-toggle" data-toggle="dropdown" href="#">
			  			<span class="caret"></span>
			  		</a>
			  		<ul class="dropdown-menu">
						<?php if(!$unset_export): ?>
						<li>
				        	<a class="export-anchor" href="<?php echo $export_url; ?>" download>
								<?php echo $this->l('list_export');?>
				            </a>
						</li>
						<?php endif; //if(!$unset_export) ?>
						<?php if(!$unset_print): ?>
						<li>
				        	<a class="print-anchor" data-url="<?php echo $print_url; ?>">
								<?php echo $this->l('list_print');?>
				            </a>
						</li>
						<?php endif; //if(!$unset_print)?>
					</ul>
				</div>
			<?php endif; ?>

		</div>

	<?php endif; //if(!$unset_add || !$unset_export || !$unset_print) ?>
	<hr>

	<div id='ajax_list' class="ajax_list">
		<?php echo $list_view?>
	</div>


	<?php
		echo form_open( $ajax_list_url, 'method="post" id="filtering_form" class="filtering_form" autocomplete = "off" data-ajax-list-info-url="'.$ajax_list_info_url.'"');
	?>

	<div class="sDiv quickSearchBox" id='quickSearchBox'>
		<div class="sDiv2">
			<?php echo $this->l('list_search');?>: <input type="text" class="qsbsearch_fieldox search_text" name="search_text" size="30" id='search_text'>
			<select name="search_field" id="search_field">
				<option value=""><?php echo $this->l('list_search_all');?></option>
				<?php foreach($columns as $column){?>
				<option value="<?php echo $column->field_name?>"><?php echo $column->display_as?>&nbsp;&nbsp;</option>
				<?php }?>
			</select>
            <input type="button" value="<?php echo $this->l('list_search');?>" class="crud_search" id='crud_search'>
		</div>
        <div class='search-div-clear-button'>
        	<input type="button" value="<?php echo $this->l('list_clear_filtering');?>" id='search_clear' class="search_clear">
        </div>
	</div>
	<div class="pDiv">
		<div class="pDiv2">
			<div class="pGroup">
				<span class="pcontrol">
					<?php list($show_lang_string, $entries_lang_string) = explode('{paging}', $this->l('list_show_entries')); ?>
					<?php echo $show_lang_string; ?>
					<select name="per_page" id='per_page' class="per_page">
						<?php foreach($paging_options as $option){?>
							<option value="<?php echo $option; ?>" <?php if($option == $default_per_page){?>selected="selected"<?php }?>><?php echo $option; ?>&nbsp;&nbsp;</option>
						<?php }?>
					</select>
					<?php echo $entries_lang_string; ?>
					<input type='hidden' name='order_by[0]' id='hidden-sorting' class='hidden-sorting' value='<?php if(!empty($order_by[0])){?><?php echo $order_by[0]?><?php }?>' />
					<input type='hidden' name='order_by[1]' id='hidden-ordering' class='hidden-ordering'  value='<?php if(!empty($order_by[1])){?><?php echo $order_by[1]?><?php }?>'/>
				</span>
			</div>
			<div class="btnseparator">
			</div>
			<div class="pGroup">
				<div class="pFirst pButton first-button">
					<span></span>
				</div>
				<div class="pPrev pButton prev-button">
					<span></span>
				</div>
			</div>
			<div class="btnseparator">
			</div>
			<div class="pGroup">
				<span class="pcontrol"><?php echo $this->l('list_page'); ?> <input name='page' type="text" value="1" size="4" id='crud_page' class="crud_page">
				<?php echo $this->l('list_paging_of'); ?>
				<span id='last-page-number' class="last-page-number"><?php echo ceil($total_results / $default_per_page)?></span></span>
			</div>
			<div class="btnseparator">
			</div>
			<div class="pGroup">
				<div class="pNext pButton next-button" >
					<span></span>
				</div>
				<div class="pLast pButton last-button">
					<span></span>
				</div>
			</div>
			<div class="btnseparator">
			</div>
			<div class="pGroup">
				<div class="pReload pButton ajax_refresh_and_loading" id='ajax_refresh_and_loading'>
					<span></span>
				</div>
			</div>
			<div class="btnseparator">
			</div>
			<div class="pGroup">
				<span class="pPageStat">
					<?php $paging_starts_from = "<span id='page-starts-from' class='page-starts-from'>1</span>"; ?>
					<?php $paging_ends_to = "<span id='page-ends-to' class='page-ends-to'>". ($total_results < $default_per_page ? $total_results : $default_per_page) ."</span>"; ?>
					<?php $paging_total_results = "<span id='total_items' class='total_items'>$total_results</span>"?>
					<?php echo str_replace( array('{start}','{end}','{results}'),
											array($paging_starts_from, $paging_ends_to, $paging_total_results),
											$this->l('list_displaying')
										   ); ?>
				</span>
			</div>
		</div>
		<div style="clear: both;">
		</div>
	</div>
	<?php echo form_close(); ?>
	</div>
</div>
