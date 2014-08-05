<div id="panku">特設サイトサイドバナ－ ＞ 検索</div>

<?php echo $this->Form->create('SpecialSideBanner', array('type'=>'file'));?>
<?php echo $this->Form->input('id'); ?>
<TABLE WIDTH="100%" ALIGN="CENTER" BORDER="1" CELLSPACING="0"
	CELLPADDING="0" FRAME="BOX">
	<TR>
		<TH CLASS="tableHeader" WIDTH="10%" HEIGHT="25" ALIGN="RIGHT" NOWRAP><FONT
			CLASS="tableStr">サイドバナー ID</FONT></TH>
		<TD CLASS="tableElement"  VALIGN="CENTER">
		<?php echo $echo_id ?>
		</TD>
	</TR>

	<TR>
		<TH CLASS="tableHeader" WIDTH="10%" ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr">&nbsp;&nbsp;<SPAN CLASS="t10red">(*)</SPAN>&nbsp;画像</FONT>外部リンク</FONT></TH>
		<TD CLASS="tableElement" COLSPAN="3" WIDTH="68%" NOWRAP><?php echo $this->Form->input('url',array('label' => false, 'error'=>false,  'div'=>false, 'error'=>false,'size'=>30,'maxlength'=>200)); ?>
			<?php echo $this->Form->checkbox('url_flg',array('label' => false, 'error'=>false,  'div'=>false, 'error'=>false)); ?>別ウィンド表示</TD>
	</TR>

	<TR>
		<TH CLASS="tableHeader" WIDTH="10%" ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr">&nbsp;&nbsp;<SPAN CLASS="t10red">(*)</SPAN>&nbsp;画像</FONT></TH>
		<TD CLASS="tableElement" COLSPAN="3" WIDTH="68%" NOWRAP>
		<?php if ($this->data['SpecialSideBanner']['pic_path'] != "") { ?>
		<?php echo $this->data['SpecialSideBanner']['pic_path'] ?><br /> <img
			src="/theaters_image/special_side_banner/<?php echo $this->data['SpecialSideBanner']['pic_path'] ?>" /><br />
								<?php } ?>
			<?php echo $this->Form->file('pic_path',array('label' => false, 'error'=>false,  'div'=>false, 'error'=>false));?>
			</TD>
	</TR>

	<TR>
		<TH CLASS="tableHeader" WIDTH="10%" ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr">&nbsp;&nbsp;<SPAN CLASS="t10red">(*)</SPAN>&nbsp;画像</FONT>タイトル</TH>
		<TD CLASS="tableElement" COLSPAN="3" WIDTH="68%" NOWRAP>
		<?php echo $this->Form->input('name',array('label' => false, 'error'=>false,  'div'=>false, 'error'=>false));?><SPAN CLASS="t10red">検索用</SPAN></TD>
	</TR>
</TABLE>

<TABLE>
	<tr>
		<td>

		<?php echo $form->submit('修正', array('name' => 'judge')); ?>
		</td>
		<td>
		<?php echo $form->submit('削除', array('name' => 'judge','onClick'=>"disp('del');return false;")); ?>
		</td>
		<?php echo $this->Form->end();?>
	</tr>
</TABLE>

