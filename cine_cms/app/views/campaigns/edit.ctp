<div id="panku">キャンペーン ＞ 検索</div>

<?php echo $this->Form->create('Campaign', array('type'=>'file'));?>
<?php echo $this->Form->input('id'); ?>
<TABLE WIDTH="100%" ALIGN="CENTER" BORDER="1" CELLSPACING="0"
	CELLPADDING="0" FRAME="BOX">
	<TR>
		<TH CLASS="tableHeader" WIDTH="10%" HEIGHT="25" ALIGN="RIGHT" NOWRAP><FONT
			CLASS="tableStr">Campaign ID</FONT></TH>
		<TD CLASS="tableElement" COLSPAN="2" NOWRAP VALIGN="CENTER">
		<?php echo $echo_id ?>
		</TD>
	</TR>
	<TR>
		<TH CLASS="tableHeader" WIDTH="10%" ALIGN="RIGHT" NOWRAP><FONT
			CLASS="tableStr">&nbsp;&nbsp;<SPAN CLASS="t10red">(*)</SPAN>&nbsp;更新日
		</FONT></TH>
		<TD CLASS="tableElement" VALIGN="TOP" COLSPAN="3" WIDTH="68%" NOWRAP
			VALIGN="CENTER">
			<?php echo $this->Form->input('start_date',array('monthNames'=>false, 'dateFormat'=>'YMD','minYear' => date('Y',strtotime("-1 year")),'maxYear' => date('Y',strtotime("+1 year")),'label' => false, 'error'=>false,  'div'=>false, 'error'=>false)); ?>
			&nbsp;&nbsp;<SPAN CLASS="t10red">データの表示を開始する日</SPAN></TD>
	</TR>

	<TR>
		<TH CLASS="tableHeader" WIDTH="10%" ALIGN="RIGHT" NOWRAP><FONT
			CLASS="tableStr">&nbsp;&nbsp;<SPAN CLASS="t10red">(*)</SPAN>&nbsp;削除日
		</FONT></TH>
		<TD CLASS="tableElement" COLSPAN="3" WIDTH="68%" NOWRAP
			VALIGN="CENTER">
			<?php echo $this->Form->input('end_date',array('monthNames'=>false, 'dateFormat'=>'YMD','minYear' => date('Y',strtotime("-1 year")),'maxYear' => date('Y',strtotime("+1 year")),'label' => false, 'error'=>false,  'div'=>false, 'error'=>false)); ?>
			<SPAN CLASS="t10red">データの表示を終了する日(この日までデータが表示されます)&nbsp;&nbsp;未定の場合は将来日を入力&nbsp;&nbsp;</SPAN>
		</TD>
	</TR>

	<TR>
		<TH CLASS="tableHeader" WIDTH="10%" ALIGN="RIGHT" NOWRAP><FONT
			CLASS="tableStr"><SPAN CLASS="t10red">(*)</SPAN>&nbsp;見出し</FONT></TH>
		<TD CLASS="tableElement" COLSPAN="3" WIDTH="68%" NOWRAP>

	<?php echo $this->Form->input('midasi',array('label' => false, 'error'=>false,  'div'=>false, 'error'=>false,'size'=>30)); ?>
		</TD>
	</TR>

	<TR>
		<TH CLASS="tableHeader" WIDTH="10%" ALIGN="RIGHT" NOWRAP><FONT
			CLASS="tableStr">外部リンク</FONT></TH>
		<TD CLASS="tableElement" COLSPAN="3" WIDTH="68%" NOWRAP><?php echo $this->Form->input('url',array('label' => false, 'error'=>false,  'div'=>false, 'error'=>false,'size'=>30)); ?>
			<?php echo $this->Form->input('url_flg',array('label' => false, 'error'=>false,  'div'=>false, 'error'=>false)); ?>別ウィンド表示</TD>
	</TR>
	<TR>
		<TH CLASS="tableHeader" WIDTH="10%" ALIGN="RIGHT" NOWRAP><FONT
			CLASS="tableStr">外部リンク(モバイル)</FONT></TH>
		<TD CLASS="tableElement" COLSPAN="3" WIDTH="68%" NOWRAP><?php echo $this->Form->input('m_url',array('label' => false, 'error'=>false,  'div'=>false, 'error'=>false,'size'=>30)); ?>
			</TD>
	</TR>
	<TR>
		<TH CLASS="tableHeader" WIDTH="10%" ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr">&nbsp;&nbsp;<SPAN CLASS="t10red">(*)</SPAN>&nbsp;画像</FONT></TH>
		<TD CLASS="tableElement" COLSPAN="3" WIDTH="68%" NOWRAP>
		<?php if ($this->data['Campaign']['pic_path'] != "") { ?>



		<?php echo $this->data['Campaign']['pic_path'] ?><br /> <img
			src="/theaters_image/campaign/<?php echo $this->data['Campaign']['pic_path'] ?>" /><br />
								<?php } ?>
			<?php echo $this->Form->file('pic_path',array('label' => false, 'error'=>false,  'div'=>false, 'error'=>false));?>
			</TD>
	</TR>

	<TR>
		<TH CLASS="tableHeader" WIDTH="10%" ALIGN="RIGHT" NOWRAP><FONT
			CLASS="tableStr">劇場</FONT></TH>
		<TD CLASS="tableElement" COLSPAN="3" WIDTH="68%" NOWRAP>
			<TABLE>

			<?php
			$i=0;
			foreach ($theaters as $k => $v) {
				echo "<td>";
				echo $v;
				if ($this->data['Campaign']['theater_ids'] != "") {
					$theater = explode(",", $this->data['Campaign']['theater_ids']);
					$check_judge=false;
					//入力と一致するか検索
					foreach ($theater as $s_v) {
						if ($s_v == $k ) {
							$check_judge = true;
							if (honbu == $this->Session->read('theater_type') || motion == $this->Session->read('theater_type')) {
								echo $this->Form->checkbox('Campaign.theater_ids.'.$k, array('value' => $k,'checked'=>true)).'&nbsp;&nbsp;&nbsp;';

							} else {
								echo $this->Form->checkbox('Campaign.theater_ids.'.$k, array('value' => $k,'checked'=>true,'disabled'=>true)).'&nbsp;&nbsp;&nbsp;';
								echo $this->Form->hidden('Campaign.theater_ids.'.$k, array('value' => $k,'checked'=>true));

							}
							break;
						}
					}
					//入力と一致するものがなければ普通に出力
					if(!$check_judge) {
						if (honbu == $this->Session->read('theater_type') || motion == $this->Session->read('theater_type')) {
							echo $this->Form->checkbox('Campaign.theater_ids.'.$k, array('value' => $k)).'&nbsp;&nbsp;&nbsp;';
						} else {
							echo $this->Form->checkbox('Campaign.theater_ids.'.$k, array('value' => $k,'disabled'=>true)).'&nbsp;&nbsp;&nbsp;';
							//echo $this->Form->hidden('Campaign.theater_ids.'.$k, array('value' => $k));
						}
					}
				} else {
					//普通に出力
					if (honbu == $this->Session->read('theater_type') || motion == $this->Session->read('theater_type')) {
						//普通に出力
						echo $this->Form->checkbox('Campaign.theater_ids.'.$k, array('value' => $k)).'&nbsp;&nbsp;&nbsp;';
					} else {
						//普通に出力
						echo $this->Form->checkbox('Campaign.theater_ids.'.$k, array('value' => $k,'disabled'=>true)).'&nbsp;&nbsp;&nbsp;';
						echo $this->Form->hidden('Campaign.theater_ids.'.$k, array('value' => $k));
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

