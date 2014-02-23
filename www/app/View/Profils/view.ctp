<div class="profils view">
<h2><?php echo __('Profil'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($profil['Profil']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Girl'); ?></dt>
		<dd>
			<?php echo $this->Html->link($profil['Girl']['id'], array('controller' => 'girls', 'action' => 'view', $profil['Girl']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Datetime'); ?></dt>
		<dd>
			<?php echo h($profil['Profil']['datetime']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pop-rate'); ?></dt>
		<dd>
			<?php echo h($profil['Profil']['pop-rate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mails'); ?></dt>
		<dd>
			<?php echo h($profil['Profil']['mails']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Charmes'); ?></dt>
		<dd>
			<?php echo h($profil['Profil']['charmes']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Visites'); ?></dt>
		<dd>
			<?php echo h($profil['Profil']['visites']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Panier'); ?></dt>
		<dd>
			<?php echo h($profil['Profil']['panier']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Left-content'); ?></dt>
		<dd>
			<?php echo $profil['Profil']['left-content']; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Right-content'); ?></dt>
		<dd>
			<?php echo $profil['Profil']['right-content']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Profil'), array('action' => 'edit', $profil['Profil']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Profil'), array('action' => 'delete', $profil['Profil']['id']), null, __('Are you sure you want to delete # %s?', $profil['Profil']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Profils'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Profil'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Girls'), array('controller' => 'girls', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Girl'), array('controller' => 'girls', 'action' => 'add')); ?> </li>
	</ul>
</div>
