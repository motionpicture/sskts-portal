<?php echo $html->script('ckeditor/ckeditor'); ?>
<div id="panku">NEWS ＞ 登録</div>

	<?php echo $this->Form->create('News', array('type'=>'file'));?>
	<?php ini_set("date.timezone", "Asia/Tokyo"); ?>

	<TABLE WIDTH="100%" ALIGN="CENTER" BORDER="1" CELLSPACING="0" CELLPADDING="0" FRAME="BOX">
		<TR>
			<TH CLASS="tableHeader" WIDTH="10%" HEIGHT="25" ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr">NEWS  ID</FONT></TH>
			<TD CLASS="tableElement" COLSPAN="2" NOWRAP VALIGN="CENTER">
				自動連番
			</TD>
			<TD CLASS="tableElement" NOWRAP ALIGN="CENTER" VALIGN="CENTER"><A HREF="/cine_cms/tag_sample.html" TARGET="_BLANK">タグサンプル</A>
		</TR>
		<TR>
			<TH CLASS="tableHeader" WIDTH="10%" ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr">&nbsp;&nbsp;<SPAN CLASS="t10red">(*)</SPAN>&nbsp;更新日</FONT></TH>
			<TD CLASS="tableElement" VALIGN="TOP" COLSPAN="3" WIDTH="68%" NOWRAP VALIGN="CENTER">
			<?php echo $this->Form->input('start_date',array('monthNames'=>false, 'dateFormat'=>'YMD','separator' => array('年', '月', '日　'), 'minYear' => date('Y',strtotime("-1 year")),'maxYear' => date('Y',strtotime("+1 year")),'timeFormat' => '24','label' => false, 'error'=>false,  'div'=>false, 'error'=>false)); ?>
			&nbsp;&nbsp;<SPAN CLASS="t10red">データの表示を開始する日</SPAN></TD>
		</TR>

		<TR>
			<TH CLASS="tableHeader" WIDTH="10%" ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr">&nbsp;&nbsp;<SPAN CLASS="t10red">(*)</SPAN>&nbsp;削除日</FONT></TH>
			<TD CLASS="tableElement" COLSPAN="3" WIDTH="68%" NOWRAP VALIGN="CENTER">
			<?php echo $this->Form->input('end_date',array('monthNames'=>false, 'dateFormat'=>'YMD','separator' => array('年', '月', '日　'),'minYear' => date('Y',strtotime("-1 year")),'maxYear' => date('Y',strtotime("+1 year")),'timeFormat' => '24','label' => false, 'error'=>false,  'div'=>false, 'error'=>false)); ?>
			<SPAN CLASS="t10red">データの表示を終了する日(この日までデータが表示されます)&nbsp;&nbsp;未定の場合は将来日を入力&nbsp;&nbsp;</SPAN></TD>
		</TR>
		<TR>
			<TH CLASS="tableHeader" WIDTH="10%" ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr"><SPAN CLASS="t10red">(*)</SPAN>&nbsp;見出し</FONT></TH>
			<TD CLASS="tableElement" COLSPAN="3" WIDTH="68%" NOWRAP>
			<?php echo $this->Form->textarea('midasi',array('label' => false, 'error'=>false,  'div'=>false, 'error'=>false, 'cols'=>'72','rows'=>'3'));?><SPAN CLASS="t10red">入力可能文字数：全角100文字</SPAN></TD>
		</TR>

		<TR>
			<TH CLASS="tableHeader" WIDTH="10%" ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr">本文</FONT></TH>
			<TD CLASS="tableElement" COLSPAN="3" WIDTH="68%" NOWRAP><?php echo $this->Form->textarea('txt',array('label' => false, 'error'=>false,  'div'=>false, 'error'=>false, 'cols'=>'72','rows'=>'10'));?>&nbsp;&nbsp;<SPAN CLASS="t10red">入力可能文字数：全角5000文字</SPAN></TD>
		</TR>

		<TR>
			<TH CLASS="tableHeader" WIDTH="10%" ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr">画像</FONT></TH>
			<TD CLASS="tableElement" COLSPAN="3" WIDTH="68%" NOWRAP>
			<?php echo $this->Form->file('pic_path',array('label' => false, 'error'=>false,  'div'=>false, 'error'=>false));?>
			</TD>
		</TR>

		<TR>
			<TH CLASS="tableHeader" WIDTH="10%" ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr">劇場</FONT></TH>
			<TD CLASS="tableElement" COLSPAN="3" WIDTH="68%" NOWRAP>
			<TABLE>

			<?php
			$i=0;
			 foreach ($stheaters as $k => $v) {
			 	echo "<td>";
				echo $v;
				if ($this->data['News']['theater_ids'] != "") {
					$theater = explode(",", $this->data['News']['theater_ids']);
					$check_judge=false;
					//入力と一致するか検索
					foreach ($theater as $s_v) {
						if ($s_v == $k ) {
							$check_judge = true;
							if (honbu == $this->Session->read('theater_type') || motion == $this->Session->read('theater_type')) {
								echo $this->Form->checkbox('News.theater_ids.'.$k, array('value' => $k,'checked'=>true)).'&nbsp;&nbsp;&nbsp;';
							} else {
								//disableにした場合フォームの値が転送されない為、あえてhiddenを追加する
								echo $this->Form->checkbox('News.theater_ids.'.$k, array('value' => $k,'checked'=>true,'disabled'=>true)).'&nbsp;&nbsp;&nbsp;';
								echo $this->Form->hidden('News.theater_ids.'.$k, array('value' => $k,'checked'=>true));
							}
							break;
						}
					}
					//入力と一致するものがなければ普通に出力
					if(!$check_judge) {

						if (honbu == $this->Session->read('theater_type') || motion == $this->Session->read('theater_type')) {
							echo $this->Form->checkbox('News.theater_ids.'.$k, array('value' => $k)).'&nbsp;&nbsp;&nbsp;';
						} else {
							echo $this->Form->checkbox('News.theater_ids.'.$k, array('value' => $k,'checked'=>true,'disabled'=>true)).'&nbsp;&nbsp;&nbsp;';
							//echo $this->Form->hidden('News.theater_ids.'.$k, array('value' => $k,'checked'=>true));
						}

					}
				//新規の場合
				} else {

					if (honbu == $this->Session->read('theater_type') || motion == $this->Session->read('theater_type')) {
						//普通に出力
						echo $this->Form->checkbox('News.theater_ids.'.$k, array('value' => $k)).'&nbsp;&nbsp;&nbsp;';
					} else {
						//普通に出力
						echo $this->Form->checkbox('News.theater_ids.'.$k, array('value' => $k,'checked'=>true,'disabled'=>true)).'&nbsp;&nbsp;&nbsp;';
						echo $this->Form->hidden('News.theater_ids.'.$k, array('value' => $k,'checked'=>true));
					}


				}

				$i++;


				echo "</td>";
				if($i%5==0) {
					echo '</tr>';
				}
			} ?>
			</TABLE>
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
  $dir = "news";
  $ck_setting="
  filebrowserBrowseUrl      : '/cine_cms/js/kcfinder/browse.php?type=$dir',
  filebrowserImageBrowseUrl : '/cine_cms/js/kcfinder/browse.php?type=$dir',
  filebrowserFlashBrowseUrl : '/cine_cms/js/kcfinder/browse.php?type=$dir',
  filebrowserUploadUrl      : '/cine_cms/js/kcfinder/upload.php?type=$dir',
  filebrowserImageUploadUrl : '/cine_cms/js/kcfinder/upload.php?type=$dir'";

  $ck_list = array("Txt");
  foreach ($ck_list as $name) {
    echo "\n";
    echo "CKEDITOR.replace('News$name',{";
    echo $ck_setting;
    echo "});";
    echo "\n";
}

?>
--></script>