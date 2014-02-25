<div class="user form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('añadir usuario'); ?></legend>
		<?php echo $this->Form->input('username');
		echo $this->Form->input('password');
		echo $this->Form->input('role',array('options'=>array('admin'=>'admin','author'=>'autor'))); ?>
	</fieldset>
<?php echo $this->Form->end(__('guardar')); ?>
</div>