	<p>
	Below are summary statistics for your most recent <?=$num_campaigns?> <a href="http://<?=$account_name?>.createsend.com/reports">Campaign Moniter</a> campaigns.
	</p>
	
	<?php if (!empty($summaries)) : ?>
		<?php foreach($summaries as $name => $summary) : ?>
		<div class="campaign">
			<h3><?=$name?></h3>
			<ul class="bullets">
				<li>Recipients: <strong><?=$summary['Recipients']?></strong></li>
				<li>Total Opened: <strong><?=$summary['TotalOpened']?></strong></li>
				<li>Clicks: <strong><?=$summary['Clicks']?></strong></li>
				<li>Unsubscribed: <strong><?=$summary['Unsubscribed']?></strong></li>
				<li>Bounced: <strong><?=$summary['Bounced']?></strong></li>
				<li>Unique Opens: <strong><?=$summary['UniqueOpened']?></strong></li>
			</ul>
		</div>
		<?php endforeach; ?>
	<?php else : ?>
		<p>There is currently no campaign data associated with the client <?=$client_name?>.</p>
	<?php endif; ?>
	
</div>