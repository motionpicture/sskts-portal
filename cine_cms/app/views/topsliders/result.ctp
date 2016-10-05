<div id="panku">TOPバナー  ＞ 編集</div>

<?php echo $this->Form->create('Topslider', array('type'=>'POST','action'=>"result?".http_build_query(Set::remove($this->params['url'],'url'),'','&')));?>
<TABLE WIDTH="800px" ALIGN="CENTER" BORDER="1" CELLSPACING="0"
	CELLPADDING="0" FRAME="BOX" style="float:left">
	<TR>
		<TH CLASS="tableHeader" WIDTH="200px" NOWRAP><FONT CLASS="tableStr">劇場</FONT>
		</TH>
		<TH CLASS="tableHeader" WIDTH="600px" NOWRAP><FONT CLASS="tableStr">TOPバナー 
				ID</FONT></TH>
	</TR>

<?php
foreach ($theaters as $k => $v) {

	if (!(honbu ==  $this->Session->read('theater_type') || motion ==  $this->Session->read('theater_type'))) {
		$skey = array_keys($stheaters);
		 if ($k != ($skey[0])) {
		 	continue;
		 }


	}
	?>
		<TR>
			<TD style="padding:1px"> <?php echo $v ?></TD>
			<TD style="padding:1px;background:#E6E49F;align:center"><?php echo $this->Form->input('theater_'.$k,array('label' => false, 'error'=>false,'class'=>'input_' . $theaters2[$k],  'div'=>false,'style'=>'font-size:100%;width:600px',
			 'error'=>false));?></TD>
		</TR>
<?php } ?>
	</TABLE>

	<div class="err">
	</div>


	<div class="free" style="padding:0;">
		<textarea id="textValue" style="height:200px;width:800px;clear:both;margin:0 0 20px;"></textarea><br />
		<input type="button" class="autoNum" value="順番を反映">
	</div>

	<?php echo $form->submit('修正'); ?>
	<?php echo $this->Form->end();?>


編集を行うTOPバナー を選択してください
<TABLE WIDTH="100%">
	<TABLE WIDTH="800" ALIGN="CENTER" BORDER="1" CELLSPACING="0" CELLPADDING="0" FRAME="BOX">
		<TR>
			<TH CLASS="tableHeader" WIDTH="10%" NOWRAP><FONT CLASS="tableStr">TOPバナー  ID</FONT></TH>
			<TH CLASS="tableHeader" WIDTH="10%" NOWRAP><FONT CLASS="tableStr">タイトル</FONT></TH>
		</TR>

<?php foreach ($results as $k => $v) { ?>

		<TR>
			<TD CLASS="tableElement leftCell <?php echo 'left_' . $v['Topsliders']['id']; ?>" ALIGN="CENTER" VALIGN="CENTER"><?php echo $html->link($v['Topsliders']['id'],'edit/'.$v['Topsliders']['id'],array('class' => 'bnrNum','target' => '_blank')); ?></TD>
			<TD CLASS="tableElement rightCell <?php echo 'right_' . $v['Topsliders']['id']; ?>" ALIGN="CENTER" VALIGN="CENTER"><p class="bnrTitle"><?php echo $v['Topsliders']['name'] ?></p></TD>
		</TR>
		<?php }?>
	</TABLE>
