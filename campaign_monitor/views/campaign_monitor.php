<h3>
<?=lang('campain_monitor_intro', $num_campaigns, $account_name)?>
</h3>

<?php if (!empty($summaries)) : ?>
	<?php foreach($summaries as $name => $summary) : ?>
	<div class="campaign">
		<h3><?=$name?></h3>
		<ul class="bullets">
			<li><?=lang('campaign_monitor_recipients')?>: <strong><?=$summary['Recipients']?></strong></li>
			<li><?=lang('campaign_monitor_total_opened')?>: <strong><?=$summary['TotalOpened']?></strong></li>
			<li><?=lang('campaign_monitor_clicks')?>: <strong><?=$summary['Clicks']?></strong></li>
			<li><?=lang('campaign_monitor_unsubscribed')?>: <strong><?=$summary['Unsubscribed']?></strong></li>
			<li><?=lang('campaign_monitor_bounced')?>: <strong><?=$summary['Bounced']?></strong></li>
			<li><?=lang('campaign_monitor_unique_opens')?> Opens: <strong><?=$summary['UniqueOpened']?></strong></li>
		</ul>
	</div>
	<?php endforeach; ?>
<?php else : ?>
	<p><?=lang('campaign_monitor_no_data', $client_name)?></p>
<?php endif; ?>
<div class="clear"></div>
