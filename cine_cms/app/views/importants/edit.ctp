<? echo $html->script('ckeditor/ckeditor'); ?>
<div id="panku">開館時間 ＞ 修正</div>
<?php echo $this->Form->create('Important', array('url' => 'edit/'.$this->data['Important']['theater_id']));?>
<TABLE WIDTH="100%" ALIGN="CENTER">
	<TR>
		<TD NOWRAP><B><?php echo $theater_name ?> </B>

			<?php echo $this->Form->input('id'); ?>
			<?php echo $this->Form->hidden('theater_id'); ?>
		</TD>
	</TR>
	<TR>
		<TD>

			<TABLE WIDTH="100%" ALIGN="CENTER" BORDER="1" CELLSPACING="0"
				CELLPADDING="0" FRAME="BOX">
				<!-- <TR>
					<TH CLASS="tableHeader" ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr">本文(PC・モバイル兼用)</FONT>
					</TH>
					<TD CLASS="tableElement">
					<?php echo $this->Form->textarea('txt',array('label' => false, 'error'=>false,  'div'=>false, 'error'=>false, 'cols'=>'72','rows'=>'3'));?>
						<BR> <SPAN CLASS="t10red">800文字</SPAN> <A
						HREF="/cine_cms/tag_sample.html" TARGET="_BLANK">タグサンプル</A></TD>
				</TR>
				 -->
				<TR>
					<TH CLASS="tableHeader" ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr">開館時間</FONT>
					</TH>
					<TD CLASS="tableElement">
					<?php echo $this->Form->textarea('open_txt',array('label' => false, 'error'=>false,  'div'=>false, 'error'=>false, 'cols'=>'72','rows'=>'3'));?>
						<BR> <SPAN CLASS="t10red">5000文字</SPAN></TD>
				</TR>
				<TR>
					<TH CLASS="tableHeader" WIDTH="150" ALIGN="RIGHT" NOWRAP><SPAN CLASS="t10red">(*)</SPAN><FONT CLASS="tableStr">予約日時</FONT></TH>
					<TD CLASS="tableElement" NOWRAP><?php echo $this->Form->input('reserv_date',array('monthNames'=>false, 'dateFormat'=>'YMD','minYear' => date('Y',strtotime("-1 year")),'maxYear' => date('Y',strtotime("+1 year")),'label' => false, 'error'=>false,  'div'=>false, 'error'=>false,'timeFormat' => '24','separator' => array('年', '月', '日　'))); ?>&nbsp;&nbsp;<SPAN CLASS="t10red">設定された時間以降の日付だと予約の内容が優先されます</SPAN>
					</TD>
				</TR>

				<TR>
					<TH CLASS="tableHeader" ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr">開館時間</FONT>
					</TH>
					<TD CLASS="tableElement">
					<?php echo $this->Form->textarea('reserv_txt',array('label' => false, 'error'=>false,  'div'=>false, 'error'=>false, 'cols'=>'72','rows'=>'3'));?>
						<BR> <SPAN CLASS="t10red">1000文字</SPAN></TD>
				</TR>

			</TABLE>
		</TD>
	</TR>
</TABLE>

<TABLE>
	<tr>
		<td>
		<?php echo $form->submit('修正', array('name' => 'judge')); ?>
		</td>
				<?php echo $this->Form->end();?>
			</tr>
</TABLE>
<script type="text/javascript"><!--
<?php
  $dir = "important";
  $ck_setting="
  filebrowserBrowseUrl      : '/cine_cms/js/kcfinder/browse.php?type=$dir',
  filebrowserImageBrowseUrl : '/cine_cms/js/kcfinder/browse.php?type=$dir',
  filebrowserFlashBrowseUrl : '/cine_cms/js/kcfinder/browse.php?type=$dir',
  filebrowserUploadUrl      : '/cine_cms/js/kcfinder/upload.php?type=$dir',
  filebrowserImageUploadUrl : '/cine_cms/js/kcfinder/upload.php?type=$dir'";

  $ck_list = array("OpenTxt");
  foreach ($ck_list as $name) {
    echo "\n";
    echo "CKEDITOR.replace('Important$name',{";
    echo $ck_setting;
    echo "});";
    echo "\n";
}

?>
--></script>
