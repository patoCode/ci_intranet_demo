<?php

	$column_width = (int)(80/count($columns));

	if(!empty($list)){
?>
<div class="table-responsive" >
		<table class="table table-sm table-bordered" id="flex1">
			<thead class="thead-dark text-center">
				<tr class='hDiv'>
					<?php foreach($columns as $column){?>
					<th scope="col">
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
<?php foreach($list as $num_row => $row){ ?>
		<tr>
			<?php foreach($columns as $column){?>
			<td width='<?php echo $column_width?>%' class='<?php if(isset($order_by[0]) &&  $column->field_name == $order_by[0]){?><?php }?>'>
				<?php echo $row->{$column->field_name} != '' ? $row->{$column->field_name} : '&nbsp;' ; ?>
			</td>
			<?php }?>
			<?php if(!$unset_delete || !$unset_edit || !$unset_read || !empty($actions)){?>
			<td align="center" width='20%'>
				<div class='tools'>
					<?php if(!$unset_delete){?>
                    	<a href='<?php echo $row->delete_url?>' title='<?php echo $this->l('list_delete')?> <?php echo $subject?>' class="delete-row btn btn-danger" >
                    		<i class=" icon-star-empty "></i>
                    	</a>
                    <?php }?>
                    <?php if(!$unset_edit){?>
						<a href='<?php echo $row->edit_url?>' title='<?php echo $this->l('list_edit')?> <?php echo $subject?>' class="edit_button btn btn-warning">
							<i class=" icon-star-empty "></i>
						</a>
					<?php }?>
                    <?php if(!$unset_clone){?>
                        <a href='<?php echo $row->clone_url?>' title='Clone <?php echo $subject?>' class="clone_button btn btn-info">
							<i class=" icon-star-empty "></i>
                        </a>
                    <?php }?>
					<?php if(!$unset_read){?>
						<a href='<?php echo $row->read_url?>' title='<?php echo $this->l('list_view')?> <?php echo $subject?>' class="edit_button btn btn-primary">
							<i class=" icon-star-empty "></i>
						</a>
					<?php }?>
					<?php
					if(!empty($row->action_urls)){
						foreach($row->action_urls as $action_unique_id => $action_url){
							$action = $actions[$action_unique_id];
					?>
							<a href="<?php echo $action_url; ?>" class="<?php echo $action->css_class; ?> crud-action" title="<?php echo $action->label?>"><?php
								if(!empty($action->image_url))
								{
									?><img src="<?php echo $action->image_url; ?>" alt="<?php echo $action->label?>" /><?php
								}
							?></a>
					<?php }
					}
					?>
				</div>
			</td>
			<?php }?>
		</tr>
<?php } ?>
		</tbody>
		</table>
	</div>
<?php }else{?>
	<br/>
	<?php echo $this->l('list_no_items'); ?>
	<br/>
	<br/>
<?php }?>
