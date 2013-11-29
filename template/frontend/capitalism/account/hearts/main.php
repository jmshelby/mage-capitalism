

<?php echo $this->getMessagesBlock()->getGroupedHtml() ?>


<?php $player = $this->getPlayer(); ?>

<br />

<p>Current Hearts: <b><?php echo $player->getPointsCurrent() ?></b></p>
<p>Current Money: <b><?php echo $player->getMoneyCurrent() ?></b></p>


<br />

<form action="<?php echo $this->getUrl('capitalism/account_hearts/addPoints') ?>" method="post">
	<input type="submit" value="Get Another Point"/>
</form>






