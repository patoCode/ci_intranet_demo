<table class="table table-hover groceryCrudTable" id="<?php echo uniqid(); ?>">
	<thead>
		<tr>
			<?php foreach($columns as $column){?>
				<th><?php echo $column->display_as; ?></th>
			<?php }?>
			<?php if(!$unset_delete || !$unset_edit || !$unset_read || !empty($actions)){?>
			<th class='actions'><?php echo $this->l('list_actions'); ?></th>
			<?php }?>
		</tr>
	</thead>
	<tbody>
		<?php foreach($list as $num_row => $row){ ?>
		<tr id='row-<?php echo $num_row?>'>
			<?php foreach($columns as $column){?>
				<td><?php echo $row->{$column->field_name}?></td>
			<?php }?>
			<?php if(!$unset_delete || !$unset_edit || !$unset_read || !empty($actions)){ ?>
			<td class='actions'>
				<div class="btn-group" role="group" aria-label="Grupo de acciones">

					<?php if(!$unset_read):?>
						<a href="<?php echo $row->read_url?>" class="edit_button btn btn-outline-primary btn-sm " role="button" alt="<?php echo $this->l('list_view'); ?>">
							<i class="icofont icofont-eye-alt"></i>
						</a>
					<?php endif; ?>



					<?php if(!$unset_edit){?>
						<a href="<?php echo $row->edit_url?>" class="edit_button btn btn-outline-primary btn-sm " role="button" alt="<?php echo $this->l('list_edit'); ?>">
							<i class="icofont icofont-edit"></i>
						</a>
					<?php }?>

					<?php if(!$unset_delete){?>
						<a onclick = "javascript: return delete_row('<?php echo $row->delete_url?>', '<?php echo $num_row?>')"
							href="javascript:void(0)" class="delete_button btn btn-outline-primary btn-sm " role="button" alt="<?php echo $this->l('list_delete'); ?>">
							<i class="icofont icofont-trash"></i>
						</a>
					<?php }?>
				</div>
				<?php if(!empty($row->action_urls)): ?>
					<div class="btn-group dropdown-split-primary">
	                    <button type="button" class="btn btn-outline-primary btn-sm"><i class="icofont icofont-options"></i></button>
	                    <button type="button" class="btn btn-outline-primary btn-sm dropdown-toggle dropdown-toggle-split waves-effect waves-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                        <span class="sr-only">Toggle primary</span>
	                    </button>
	                    <div class="dropdown-menu">
	                    	<?php
	                    		foreach($row->action_urls as $action_unique_id => $action_url):
								$action = $actions[$action_unique_id];
	                    	 ?>

	                    	<a href="<?php echo $action_url; ?>" class="edit_button dropdown-item waves-effect waves-light" >
								<?php echo $action->label?>
							</a>
						<?php endforeach; ?>

	                    </div>
	                </div>
            	<?php endif; ?>
			</td>
			<?php }?>
		</tr>
		<?php }?>
	</tbody>
	<tfoot>
		<tr>
			<?php foreach($columns as $column){?>
				<th>
					<input type="text" name="<?php echo $column->field_name; ?>" placeholder="<?php echo $this->l('list_search').' '.$column->display_as; ?>" class="search_<?php echo $column->field_name; ?> form-control" />
				</th>
			<?php }?>
			<?php if(!$unset_delete || !$unset_edit || !$unset_read || !empty($actions)){?>
				<th>
					<button class="btn btn-primary btn-sm floatR refresh-data" role="button" data-url="<?php echo $ajax_list_url; ?>">
						<i class="icofont icofont-refresh"></i>
					</button>

					<a href="javascript:void(0)" role="button" class="btn btn-primary btn-sm clear-filtering floatR">
						<i class="icofont icofont-delete"></i> <?php echo $this->l('list_clear_filtering');?>

					</a>
				</th>
			<?php }?>
		</tr>
	</tfoot>
</table>
