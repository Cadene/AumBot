<div class="girls form">
<?php echo $this->Form->create('Girl'); ?>
	<fieldset>
		<legend><?php echo __('Edit Girl'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('dMails');
		echo $this->Form->input('dCharmes');
		echo $this->Form->input('dVisites');
		echo $this->Form->input('dPanier');
		echo $this->Form->input('lastupdate');
		echo $this->Form->input('ratio');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Girl.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Girl.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Girls'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Members'), array('controller' => 'members', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Member'), array('controller' => 'members', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Profils'), array('controller' => 'profils', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Profil'), array('controller' => 'profils', 'action' => 'add')); ?> </li>
	</ul>
</div>
