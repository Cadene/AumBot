<div class="profils form">
<?php echo $this->Form->create('Profil'); ?>
	<fieldset>
		<legend><?php echo __('Add Profil'); ?></legend>
	<?php
		echo $this->Form->input('member_id');
		echo $this->Form->input('datetime');
		echo $this->Form->input('pop-rate');
		echo $this->Form->input('mails');
		echo $this->Form->input('charmes');
		echo $this->Form->input('visites');
		echo $this->Form->input('panier');
		echo $this->Form->input('left-content');
		echo $this->Form->input('right-content');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Profils'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Members'), array('controller' => 'members', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Member'), array('controller' => 'members', 'action' => 'add')); ?> </li>
	</ul>
</div>
