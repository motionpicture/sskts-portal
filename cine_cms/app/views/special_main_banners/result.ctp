<div id="panku">特設サイトメインバナ－  ＞ 編集</div>

<?php echo $this->Form->create('SpecialMainBanner', array('type'=>'POST','action'=>"result?".http_build_query(Set::remove($this->params['url'],'url'),'','&')));?>
<TABLE WIDTH="800px" ALIGN="CENTER" BORDER="1" CELLSPACING="0"
	CELLPADDING="0" FRAME="BOX" style="float:left">
	<TR>
		<TH CLASS="tableHeader" WIDTH="200px" NOWRAP><FONT CLASS="tableStr">劇場</FONT>
		</TH>
		<TH CLASS="tableHeader" WIDTH="600px" NOWRAP><FONT CLASS="tableStr">メインバナー 
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
			<TD style="padding:1px;background:#E6E49F;align:center"><?php echo $this->Form->input('theater_'.$k,array('label' => false, 'error'=>false,  'div'=>false,'style'=>'font-size:100%;width:600px',
			 'error'=>false));?></TD>
		</TR>
<?php } ?>
	</TABLE>

	<?php echo $form->submit('修正'); ?>
	<?php echo $this->Form->end();?>


編集を行うサイドバナー を選択してください
<TABLE WIDTH="100%">
	<TABLE WIDTH="100%" ALIGN="CENTER" BORDER="1" CELLSPACING="0" CELLPADDING="0" FRAME="BOX">
		<TR>
			<TH CLASS="tableHeader" WIDTH="10%" NOWRAP><FONT CLASS="tableStr">メインバナー  ID</FONT></TH>
			<TH CLASS="tableHeader" WIDTH="10%" NOWRAP><FONT CLASS="tableStr">タイトル</FONT></TH>
		</TR>

<?php foreach ($results as $k => $v) { ?>

		<TR>
			<TD CLASS="tableElement" ALIGN="CENTER" VALIGN="CENTER"><?php echo $html->link($v['SpecialMainBanners']['id'],'edit/'.$v['SpecialMainBanners']['id'] ); ?></TD>
			<TD CLASS="tableElement" ALIGN="CENTER" VALIGN="CENTER"><?php echo $v['SpecialMainBanners']['name'] ?></TD>
		</TR>
		<?php }?>
	</TABLE>
