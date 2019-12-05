
<div id="page-container" class="row">

	<div id="sidebar" class="col-sm-3">



	</div><!-- /#sidebar .col-sm-3 -->

	<div id="page-content" class="col-sm-9">

		<div class="surveys index">

			<h2><?php echo __('Surveys to Take'); ?></h2>

			<div class="table-responsive">
				<table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
					<thead>
						<tr>
							<th><?php echo $this->Paginator->sort('title'); ?></th>
							<th><?php echo $this->Paginator->sort('Added By'); ?></th>
							<th class="actions"><?php echo __('Actions'); ?></th>
						</tr>
					</thead>
					<tbody>
<?php foreach ($surveys as $survey): ?>
	<tr>
		<td><?php echo h($survey['Survey']['title']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($survey['User']['username'], array('controller' => 'users', 'action' => 'view', $survey['User']['id'])); ?>
		</td>
		<?php if (AuthComponent::user('type') == 'normal'): ?>
		 <td class="actions">
			<?php echo $this->Html->link(__('Take Survey'), array('action' => 'take', $survey['Survey']['id'])); ?>
		</td>
		<?php endif?>
	</tr>
<?php endforeach; ?>
					</tbody>
				</table>
			</div><!-- /.table-responsive -->

			<p><small>
				<?php
					echo $this->Paginator->counter(array(
					'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
					));
				?>
			</small></p>

			<ul class="pagination">
				<?php
					echo $this->Paginator->prev('< ' . __('Previous'), array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
					echo $this->Paginator->numbers(array('separator' => '', 'currentTag' => 'a', 'tag' => 'li', 'currentClass' => 'disabled'));
					echo $this->Paginator->next(__('Next') . ' >', array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
				?>
			</ul><!-- /.pagination -->

		</div><!-- /.index -->

	</div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->
