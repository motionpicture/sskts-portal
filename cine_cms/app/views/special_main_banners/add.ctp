<div id="panku">特設サイトメインバナ－ ＞ 登録</div>

	<?php echo $this->Form->create('SpecialMainBanner', array('type'=>'file'));?>

	<TABLE WIDTH="100%" ALIGN="CENTER" BORDER="1" CELLSPACING="0" CELLPADDING="0" FRAME="BOX">
		<TR>
			<TH CLASS="tableHeader" WIDTH="10%" HEIGHT="25" ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr">メインバナー  ID</FONT></TH>
			<TD CLASS="tableElement"  VALIGN="CENTER">
				自動連番
			</TD>
		</TR>

		<TR>
			<TH CLASS="tableHeader" WIDTH="10%" ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr">画像</FONT><FONT CLASS="tableStr">外部リンク(IMAX)</FONT></TH>
			<TD CLASS="tableElement" COLSPAN="3" WIDTH="68%" NOWRAP><?php echo $this->Form->input('url',array('label' => false, 'error'=>false,  'div'=>false, 'error'=>false,'size'=>30,'maxlength'=>200)); ?>
			<?php echo $this->Form->checkbox('url_flg',array('label' => false, 'error'=>false,  'div'=>false, 'error'=>false)); ?>別ウィンド表示</TD>
		</TR>

		<TR>
			<TH CLASS="tableHeader" WIDTH="10%" ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr">画像</FONT><FONT CLASS="tableStr">外部リンク(4DX)</FONT></TH>
			<TD CLASS="tableElement" COLSPAN="3" WIDTH="68%" NOWRAP><?php echo $this->Form->input('site_url1',array('label' => false, 'error'=>false,  'div'=>false, 'error'=>false,'size'=>30,'maxlength'=>200)); ?>
			<?php echo $this->Form->checkbox('site_url_flg1',array('label' => false, 'error'=>false,  'div'=>false, 'error'=>false)); ?>別ウィンド表示</TD>
		</TR>

		<TR>
			<TH CLASS="tableHeader" WIDTH="10%" ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr">画像</FONT><FONT CLASS="tableStr">外部リンク(AST)</FONT></TH>
			<TD CLASS="tableElement" COLSPAN="3" WIDTH="68%" NOWRAP><?php echo $this->Form->input('site_url2',array('label' => false, 'error'=>false,  'div'=>false, 'error'=>false,'size'=>30,'maxlength'=>200)); ?>
			<?php echo $this->Form->checkbox('site_url_flg2',array('label' => false, 'error'=>false,  'div'=>false, 'error'=>false)); ?>別ウィンド表示</TD>
		</TR>

		<TR>
			<TH CLASS="tableHeader" WIDTH="10%" ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr">画像(IMAX)</FONT></TH>
			<TD CLASS="tableElement" COLSPAN="3" WIDTH="68%" NOWRAP>
			<?php echo $this->Form->file('pic_path',array('label' => false, 'error'=>false,  'div'=>false, 'error'=>false));?>
			</TD>
		</TR>
		<TR>
			<TH CLASS="tableHeader" WIDTH="10%" ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr">画像(4DX)</FONT></TH>
			<TD CLASS="tableElement" COLSPAN="3" WIDTH="68%" NOWRAP>
			<?php echo $this->Form->file('pic_path2',array('label' => false, 'error'=>false,  'div'=>false, 'error'=>false));?>
			</TD>
		</TR>
		<TR>
			<TH CLASS="tableHeader" WIDTH="10%" ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr">画像(AST)</FONT></TH>
			<TD CLASS="tableElement" COLSPAN="3" WIDTH="68%" NOWRAP>
			<?php echo $this->Form->file('pic_path3',array('label' => false, 'error'=>false,  'div'=>false, 'error'=>false));?>
			</TD>
		</TR>

		<TR>
			<TH CLASS="tableHeader" WIDTH="10%" ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr">サムネイル</FONT></TH>
			<TD CLASS="tableElement" COLSPAN="3" WIDTH="68%" NOWRAP>
			<?php echo $this->Form->file('pic_thumb',array('label' => false, 'error'=>false,  'div'=>false, 'error'=>false));?>
			</TD>
		</TR>

		<TR>
			<TH CLASS="tableHeader" WIDTH="10%" ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr">&nbsp;&nbsp;<SPAN CLASS="t10red">(*)</SPAN>&nbsp;画像</FONT>タイトル</TH>
			<TD CLASS="tableElement" COLSPAN="3" WIDTH="68%" NOWRAP>
			<?php echo $this->Form->input('name',array('label' => false, 'error'=>false,  'div'=>false, 'error'=>false));?><SPAN CLASS="t10red">検索用</SPAN></TD>
		</TR>
	</TABLE>

	<TABLE WIDTH="100%">
		<TD>
			<?php echo $this->Form->end(__('登録', true));?>
		</TD>
	</TABLE>


