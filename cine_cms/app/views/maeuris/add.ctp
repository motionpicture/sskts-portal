<? echo $html->script('ckeditor/ckeditor'); ?>
<div id="panku">前売券情報 ＞ 新規登録</div>
	<?php echo $this->Form->create('Maeuri', array('type'=>'file'));?>
	<?php echo $this->Form->hidden('theater_id'); ?>
<?php ini_set("date.timezone", "Asia/Tokyo"); ?>

	<TABLE WIDTH="100%" ALIGN="CENTER" BORDER="1" CELLSPACING="0" CELLPADDING="0" FRAME="BOX">
		<TR>
			<TH WIDTH="10%" CLASS="tableHeader" HEIGHT="25" ALIGN="RIGHT" COLSPAN="2" NOWRAP><FONT CLASS="tableStr">前売ID</FONT></TH>
			<TD WIDTH="57%" CLASS="tableElement" NOWRAP VALIGN="CENTER">
				自動連番
			</TD>
			<TD WIDTH="15%" ALIGN="CENTER" NOWRAP><A HREF="/cine_cms/tag_sample.html" TARGET="_BLANK">タグサンプル</A></TD>
		</TR>
		<tr>
			<TH CLASS="tableHeader" COLSPAN="2" WIDTH="150" HEIGHT="30" ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr">劇場</FONT></TH>
			<td CLASS="tableElement" COLSPAN="2"><?php echo $theaterName ?></td>
		</tr>
		<TR>
			<TH CLASS="tableHeader" ALIGN="RIGHT" COLSPAN="2" NOWRAP><FONT CLASS="tableStr"><SPAN CLASS="t10red">(*)</SPAN>&nbsp;作品</FONT></TH>
			<TD CLASS="tableElement" HEIGHT="25" NOWRAP COLSPAN="2">
				<?php echo $this->Form->select('movie_code',$movies, null, array('empty' => false)); ?>
			</TD>
		</TR>
		<TR>
			<TH CLASS="tableHeader" ALIGN="RIGHT" COLSPAN="2" NOWRAP><FONT CLASS="tableStr"><SPAN CLASS="t10red">(*)</SPAN>&nbsp;更新日</FONT></TH>
			<TD CLASS="tableElement"NOWRAP VALIGN="CENTER" COLSPAN="2">

			<?php echo $this->Form->input('start_date',array('monthNames'=>false, 'dateFormat'=>'YMD','minYear' => date('Y',strtotime("-1 year")),'maxYear' => date('Y',strtotime("+1 year")),'label' => false, 'error'=>false,  'div'=>false, 'error'=>false,'timeFormat' => '24','separator' => array('年', '月', '日　'))); ?>
			&nbsp;&nbsp;<SPAN CLASS="t10red">データの表示を開始する日</SPAN></TD>
		</TR>

		<TR>
			<TH CLASS="tableHeader" ALIGN="RIGHT" ROWSPAN="2" NOWRAP><SPAN CLASS="t10red">(*)</SPAN>&nbsp;公開予定日</FONT></FONT></TH>
			<TH CLASS="tableHeader" ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr">公開予定日</FONT></TH>
			<TD CLASS="tableElement" COLSPAN="2" NOWRAP><?php echo $this->Form->input('end_date',array('monthNames'=>false, 'dateFormat'=>'YMD','minYear' => date('Y',strtotime("-1 year")),'maxYear' => date('Y',strtotime("+1 year")),'label' => false, 'error'=>false,  'div'=>false, 'error'=>false,'timeFormat' => '24','separator' => array('年', '月', '日　'))); ?>
			<SPAN CLASS="t10red">データの表示を終了する日(この日までデータが表示されます)&nbsp;&nbsp;未定の場合は将来日を入力</SPAN>
			</TD>
		</TR>
		<TR>
			<TH CLASS="tableHeader" ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr">公開予定日上書き</FONT></TH>
			<TD CLASS="tableElement" COLSPAN="2" NOWRAP><?php echo $this->Form->input('end_date_txt',array('label' => false, 'error'=>false,  'div'=>false, 'error'=>false));?>&nbsp;&nbsp;<SPAN CLASS="t10red">作品公開日上書き用&nbsp;&nbsp;（例）2015年4月公開！</SPAN></TD>
		</TR>


		<TR>
			<TH CLASS="tableHeader" ALIGN="RIGHT" ROWSPAN="2" NOWRAP><FONT CLASS="tableStr">発売日</FONT></TH>
			<TH CLASS="tableHeader" ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr">発売日</FONT></TH>
			<TD CLASS="tableElement" COLSPAN="2" NOWRAP><?php echo $this->Form->input('roadshow_date',array('monthNames'=>false, 'dateFormat'=>'YMD','minYear' => date('Y',strtotime("-1 year")),'maxYear' => date('Y',strtotime("+1 year")),'label' => false, 'error'=>false,  'div'=>false, 'error'=>false, 'empty' => true)); ?>
			&nbsp;&nbsp;<SPAN CLASS="t10red">前売発売日</SPAN></TD>
		</TR>
		<TR>
			<TH CLASS="tableHeader" ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr">発売日上書き</FONT></TH>
			<TD CLASS="tableElement" COLSPAN="2" NOWRAP><?php echo $this->Form->input('roadshow_txt',array('label' => false, 'error'=>false,  'div'=>false, 'error'=>false));?>&nbsp;&nbsp;<SPAN CLASS="t10red">作品発売日上書き用&nbsp;&nbsp;（例）2015年4月発売！</SPAN></TD>
		</TR>

		<TR>
			<TH CLASS="tableHeader" ALIGN="RIGHT" COLSPAN="2" NOWRAP><FONT CLASS="tableStr">料金</FONT></TH>
			<TD CLASS="tableElement" HEIGHT="25" NOWRAP COLSPAN="2">
				<?php echo $this->Form->input('price',array('label' => false, 'error'=>false,  'div'=>false, 'error'=>false));?>&nbsp;&nbsp;<SPAN CLASS="t10red">(例)一般 1,300円;中小幼 800円;親子ペア 2,000円</SPAN>
			</TD>
		</TR>

		<TR>
			<TH CLASS="tableHeader" ALIGN="RIGHT" COLSPAN="2" NOWRAP><FONT CLASS="tableStr">ムビチケ</FONT></TH>
			<TD CLASS="tableElement" HEIGHT="25" NOWRAP COLSPAN="2">
				<?php echo $this->Form->input('movie_ticket_flg',array('label' => false, 'error'=>false,  'div'=>false, 'error'=>false));?>
			</TD>
		</TR>

		<TR>
			<TH CLASS="tableHeader" ALIGN="RIGHT" COLSPAN="2" NOWRAP><FONT CLASS="tableStr">備考</FONT></TH>
			<TD CLASS="tableElement" COLSPAN="2"><?php echo $this->Form->textarea('note',array('label' => false, 'error'=>false,  'div'=>false, 'error'=>false, 'cols'=>'72','rows'=>'10'));?>
			</TD>
		</TR>

	</TABLE>

	<TABLE WIDTH="100%">
		<TD>
			<?php echo $this->Form->end(__('登録', true));?>

		</TD>
	</TABLE>
<script type="text/javascript"><!--
<?php
  $dir = "maeuri";
  $ck_setting="
  filebrowserBrowseUrl      : '/cine_cms/js/kcfinder/browse.php?type=$dir',
  filebrowserImageBrowseUrl : '/cine_cms/js/kcfinder/browse.php?type=$dir',
  filebrowserFlashBrowseUrl : '/cine_cms/js/kcfinder/browse.php?type=$dir',
  filebrowserUploadUrl      : '/cine_cms/js/kcfinder/upload.php?type=$dir',
  filebrowserImageUploadUrl : '/cine_cms/js/kcfinder/upload.php?type=$dir'";

  $ck_list = array("Note");
  foreach ($ck_list as $name) {
    echo "\n";
    echo "CKEDITOR.replace('Maeuri$name',{";
    echo $ck_setting;
    echo "});";
    echo "\n";
}

?>
--></script>