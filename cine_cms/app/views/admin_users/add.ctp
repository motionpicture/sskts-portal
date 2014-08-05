<div class="adminUsers form">
<?php echo $this->Form->create('AdminUser');?>
	<fieldset>
		<legend><?php __('Add Admin User'); ?></legend>
	<?php
		echo $this->Form->input('login_id');
		echo $this->Form->input('password');
		echo $this->Form->input('theater');
		echo $this->Form->input('del_flg');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Admin Users', true), array('action' => 'index'));?></li>
	</ul>
</div>