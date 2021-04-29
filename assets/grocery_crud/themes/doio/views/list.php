<?php
	$column_width = (int)(80/count($columns));
	if(!empty($list)):
?>
<div class="table-responsive" >

		<table class="table table-striped table-condensed" id="flex1">

			<thead class="text-center">
				<tr>
					<?php foreach($columns as $column){?>
					<th>
						<div class="text-uppercase text-center field-sorting <?php if(isset($order_by[0]) &&  $column->field_name == $order_by[0]){ echo $order_by[1]; }?>"rel='<?php echo $column->field_name?>'>
							<?php echo $column->display_as?>
						</div>
					</th>
					<?php }?>

					<?php if(!$unset_delete || !$unset_edit || !$unset_read || !$unset_clone || !empty($actions)){?>
					<th scope="col">
						<div class="text-uppercase text-center">
							<?php echo $this->l('list_actions'); ?>
						</div>
					</th>
					<?php }?>
				</tr>
			</thead>

			<tbody>
				<?php foreach($list as $num_row => $row): ?>
				<tr>
					<?php foreach($columns as $column): ?>
					<td class='<?php if(isset($order_by[0]) &&  $column->field_name == $order_by[0]){?><?php }?>'>
						<?php echo $row->{$column->field_name} != '' ? $row->{$column->field_name} : '&nbsp;' ; ?>
					</td>
					<?php endforeach; // COLUMNS ?>

					<?php if(!$unset_delete || !$unset_edit || !$unset_read || !empty($actions)): ?>
					<td>
						<div class="btn-group">
							<a class="btn btm-mini btn-info" href="#">
								<i class="icon-cog"></i> <?php echo $this->l('list_actions') ?>
							</a>
							<a class="btn btn-mini btn-info dropdown-toggle" data-toggle="dropdown" href="#">
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<?php if(!$unset_read): ?>
								<li>
									<a href='<?php echo $row->read_url?>' title='<?php echo $this->l('list_view')?> <?php echo $subject?>' class="edit_button">
										<i class="icon-eye-open"></i> <?php echo $this->l('list_view')?>
									</a>
								</li>
								<?php endif;?>
								<?php if(!$unset_edit): ?>
								<li>
									<a href='<?php echo $row->edit_url?>' title='<?php echo $this->l('list_edit')?> <?php echo $subject?>' class="edit_button">
										<i class="icon-pencil"></i> <?php echo $this->l('list_edit')?>
									</a>
								</li>
								<?php endif;?>
								<?php if(!$unset_delete): ?>
									<li>
										<a href='<?php echo $row->delete_url?>' title='<?php echo $this->l('list_delete')?> <?php echo $subject?>' class="delete-row" >
					            			<i class="icon-trash"></i> <?php echo $this->l('list_delete')?>
					            		</a>
									</li>
				            	<?php endif;?>
								<?php if(!empty($row->action_urls)): ?>
									<li class="divider"></li>
									<?php
									foreach($row->action_urls as $action_unique_id => $action_url):
										$action = $actions[$action_unique_id]; ?>
										<li>
											<a href="<?php echo $action_url; ?>" class="crud-action" title="<?php echo $action->label?>">
												<i class="<?php echo $action->css_class; ?>"></i> <?php echo $action->label?>
											</a>
										</li>
									<?php
									endforeach;
								endif;?>
							</ul>
						</div>
					</td>
					<?php endif; //if(!$unset_delete || !$unset_edit || !$unset_read || !empty($actions)) ?>
				</tr>
				<?php endforeach; //foreach($list as $num_row => $row) ?>
			</tbody>
		</table>
	</div>
<?php else: //if(!empty($list)) ?>
	<?php echo $this->l('list_no_items'); ?>
<?php endif; // if(!empty($list))?>
