<div class="importants form">
<?php echo $this->Form->create('Important');?>
	<fieldset>
		<legend><?php __('Add Important'); ?></legend>
	<?php
		echo $this->Form->input('theater_id');
		echo $this->Form->input('txt');
		echo $this->Form->input('create_time');
		echo $this->Form->input('update_time');
		echo $this->Form->input('del_flg');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Importants', true), array('action' => 'index'));?></li>
	</ul>
</div>