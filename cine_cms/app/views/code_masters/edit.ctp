<div class="codeMasters form">
<?php echo $this->Form->create('CodeMaster');?>
	<fieldset>
		<legend><?php __('Edit Code Master'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('type');
		echo $this->Form->input('code');
		echo $this->Form->input('value');
		echo $this->Form->input('disp_order');
		echo $this->Form->input('description');
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

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('CodeMaster.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('CodeMaster.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Code Masters', true), array('action' => 'index'));?></li>
	</ul>
</div>