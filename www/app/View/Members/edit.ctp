<div class="members form">
<?php echo $this->Form->create('Member'); ?>
	<fieldset>
		<legend><?php echo __('Edit Member'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('datetime');
		echo $this->Form->input('login');
		echo $this->Form->input('mod_level');
		echo $this->Form->input('first_cnx');
		echo $this->Form->input('last_cnx');
		echo $this->Form->input('cover');
		echo $this->Form->input('pseudo');
		echo $this->Form->input('sex');
		echo $this->Form->input('birthday');
		echo $this->Form->input('country');
		echo $this->Form->input('zip');
		echo $this->Form->input('region');
		echo $this->Form->input('city');
		echo $this->Form->input('alert');
		echo $this->Form->input('table');
		echo $this->Form->input('dead');
		echo $this->Form->input('isBan');
		echo $this->Form->input('path');
		echo $this->Form->input('shard');
		echo $this->Form->input('url');
		echo $this->Form->input('age');
		echo $this->Form->input('new');
		echo $this->Form->input('inContact');
		echo $this->Form->input('can_chat');
		echo $this->Form->input('isOnline');
		echo $this->Form->input('thumb');
		echo $this->Form->input('can_mail');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Member.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Member.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Members'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Profils'), array('controller' => 'profils', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Profil'), array('controller' => 'profils', 'action' => 'add')); ?> </li>
	</ul>
</div>
