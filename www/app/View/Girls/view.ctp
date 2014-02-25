<div class="girls view">
<h2><?php echo __('Girl'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($girl['Girl']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('DMails'); ?></dt>
		<dd>
			<?php echo h($girl['Girl']['dMails']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('DCharmes'); ?></dt>
		<dd>
			<?php echo h($girl['Girl']['dCharmes']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('DVisites'); ?></dt>
		<dd>
			<?php echo h($girl['Girl']['dVisites']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('DPanier'); ?></dt>
		<dd>
			<?php echo h($girl['Girl']['dPanier']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lastupdate'); ?></dt>
		<dd>
			<?php echo h($girl['Girl']['lastupdate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ratio'); ?></dt>
		<dd>
			<?php echo h($girl['Girl']['ratio']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Girl'), array('action' => 'edit', $girl['Girl']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Girl'), array('action' => 'delete', $girl['Girl']['id']), null, __('Are you sure you want to delete # %s?', $girl['Girl']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Girls'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Girl'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Members'), array('controller' => 'members', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Member'), array('controller' => 'members', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Profils'), array('controller' => 'profils', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Profil'), array('controller' => 'profils', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Members'); ?></h3>
	<?php if (!empty($girl['Member'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Girl Id'); ?></th>
		<th><?php echo __('Datetime'); ?></th>
		<th><?php echo __('Login'); ?></th>
		<th><?php echo __('Mod Level'); ?></th>
		<th><?php echo __('First Cnx'); ?></th>
		<th><?php echo __('Last Cnx'); ?></th>
		<th><?php echo __('Cover'); ?></th>
		<th><?php echo __('Pseudo'); ?></th>
		<th><?php echo __('Sex'); ?></th>
		<th><?php echo __('Birthday'); ?></th>
		<th><?php echo __('Country'); ?></th>
		<th><?php echo __('Zip'); ?></th>
		<th><?php echo __('Region'); ?></th>
		<th><?php echo __('City'); ?></th>
		<th><?php echo __('Alert'); ?></th>
		<th><?php echo __('Table'); ?></th>
		<th><?php echo __('Dead'); ?></th>
		<th><?php echo __('IsBan'); ?></th>
		<th><?php echo __('Path'); ?></th>
		<th><?php echo __('Shard'); ?></th>
		<th><?php echo __('Url'); ?></th>
		<th><?php echo __('Age'); ?></th>
		<th><?php echo __('New'); ?></th>
		<th><?php echo __('InContact'); ?></th>
		<th><?php echo __('Can Chat'); ?></th>
		<th><?php echo __('IsOnline'); ?></th>
		<th><?php echo __('Thumb'); ?></th>
		<th><?php echo __('Can Mail'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($girl['Member'] as $member): ?>
		<tr>
			<td><?php echo $member['id']; ?></td>
			<td><?php echo $member['girl_id']; ?></td>
			<td><?php echo $member['datetime']; ?></td>
			<td><?php echo $member['login']; ?></td>
			<td><?php echo $member['mod_level']; ?></td>
			<td><?php echo $member['first_cnx']; ?></td>
			<td><?php echo $member['last_cnx']; ?></td>
			<td><?php echo $member['cover']; ?></td>
			<td><?php echo $member['pseudo']; ?></td>
			<td><?php echo $member['sex']; ?></td>
			<td><?php echo $member['birthday']; ?></td>
			<td><?php echo $member['country']; ?></td>
			<td><?php echo $member['zip']; ?></td>
			<td><?php echo $member['region']; ?></td>
			<td><?php echo $member['city']; ?></td>
			<td><?php echo $member['alert']; ?></td>
			<td><?php echo $member['table']; ?></td>
			<td><?php echo $member['dead']; ?></td>
			<td><?php echo $member['isBan']; ?></td>
			<td><?php echo $member['path']; ?></td>
			<td><?php echo $member['shard']; ?></td>
			<td><?php echo $member['url']; ?></td>
			<td><?php echo $member['age']; ?></td>
			<td><?php echo $member['new']; ?></td>
			<td><?php echo $member['inContact']; ?></td>
			<td><?php echo $member['can_chat']; ?></td>
			<td><?php echo $member['isOnline']; ?></td>
			<td><?php echo $member['thumb']; ?></td>
			<td><?php echo $member['can_mail']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'members', 'action' => 'view', $member['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'members', 'action' => 'edit', $member['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'members', 'action' => 'delete', $member['id']), null, __('Are you sure you want to delete # %s?', $member['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Member'), array('controller' => 'members', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Profils'); ?></h3>
	<?php if (!empty($girl['Profil'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Girl Id'); ?></th>
		<th><?php echo __('Datetime'); ?></th>
		<th><?php echo __('Pop-rate'); ?></th>
		<th><?php echo __('Mails'); ?></th>
		<th><?php echo __('Charmes'); ?></th>
		<th><?php echo __('Visites'); ?></th>
		<th><?php echo __('Panier'); ?></th>
		<th><?php echo __('Left-content'); ?></th>
		<th><?php echo __('Right-content'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($girl['Profil'] as $profil): ?>
		<tr>
			<td><?php echo $profil['id']; ?></td>
			<td><?php echo $profil['girl_id']; ?></td>
			<td><?php echo $profil['datetime']; ?></td>
			<td><?php echo $profil['pop-rate']; ?></td>
			<td><?php echo $profil['mails']; ?></td>
			<td><?php echo $profil['charmes']; ?></td>
			<td><?php echo $profil['visites']; ?></td>
			<td><?php echo $profil['panier']; ?></td>
			<td><?php echo $profil['left-content']; ?></td>
			<td><?php echo $profil['right-content']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'profils', 'action' => 'view', $profil['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'profils', 'action' => 'edit', $profil['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'profils', 'action' => 'delete', $profil['id']), null, __('Are you sure you want to delete # %s?', $profil['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Profil'), array('controller' => 'profils', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
