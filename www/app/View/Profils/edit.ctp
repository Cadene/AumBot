<div class="profils form">
<?php echo $this->Form->create('Profil'); ?>
	<fieldset>
		<legend><?php echo __('Edit Profil'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('girl_id');
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Profil.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Profil.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Profils'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Girls'), array('controller' => 'girls', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Girl'), array('controller' => 'girls', 'action' => 'add')); ?> </li>
	</ul>
</div>
