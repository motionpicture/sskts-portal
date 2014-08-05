<div id="panku">特設サイトメインバナ－ ＞ 検索</div>

<TABLE WIDTH="100%" ALIGN="CENTER" BORDER="1" CELLSPACING="0" CELLPADDING="0" FRAME="BOX">
	<?php echo $this->Form->create('SpecialMainBanner',array('type'=>'GET','action'=>'result'));?>
	<TR>
		<TH CLASS="tableHeader" WIDTH="10%" ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr">タイトル</FONT></TH>
		<TD CLASS="tableElement" NOWRAP VALIGN="CENTER"><?php echo $this->Form->input('name',array('label' => false, 'error'=>false,  'div'=>false, 'error'=>false));?></TD>
	</TR>
</TABLE>

<TABLE WIDTH="100%">
	<TD>
		<?php echo $form->submit('検索', array('label' => false, 'error'=>false,  'div'=>false)); ?>
		<input type="button" value="　クリア　" onClick="javascritp:reset();">
		<?php echo $this->Form->end();?>
	</TD>
</TABLE>
