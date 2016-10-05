<div id="panku">動画バナー ＞ 登録</div>

	<?php echo $this->Form->create('Trailer', array('type'=>'file'));?>

	<TABLE WIDTH="100%" ALIGN="CENTER" BORDER="1" CELLSPACING="0" CELLPADDING="0" FRAME="BOX">
		<TR>
			<TH CLASS="tableHeader" WIDTH="10%" HEIGHT="25" ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr">TOPバナー  ID</FONT></TH>
			<TD CLASS="tableElement"  VALIGN="CENTER">
				自動連番
			</TD>
		</TR>

<TR>
			<TH CLASS="tableHeader" WIDTH="10%" ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr">&nbsp;&nbsp;<SPAN CLASS="t10red">(*)</SPAN>&nbsp;タイトル</FONT></TH>
			<TD CLASS="tableElement" COLSPAN="3" WIDTH="68%" NOWRAP><?php echo $this->Form->input('name',array('label' => false, 'error'=>false,  'div'=>false, 'error'=>false,'size'=>30)); ?>
			</TD>
		</TR>
		<TR>
			<TH CLASS="tableHeader" WIDTH="10%" ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr">&nbsp;&nbsp;<SPAN CLASS="t10red">(*)</SPAN>&nbsp;画像リンク</FONT></TH>
			<TD CLASS="tableElement" COLSPAN="3" WIDTH="68%" NOWRAP><?php echo $this->Form->input('url',array('label' => false, 'error'=>false,  'div'=>false, 'error'=>false,'size'=>30)); ?>
			</TD>
		</TR>

		<TR>
			<TH CLASS="tableHeader" WIDTH="10%" ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr">&nbsp;&nbsp;<SPAN CLASS="t10red">(*)</SPAN>&nbsp;画像</FONT></TH>
			<TD CLASS="tableElement" COLSPAN="3" WIDTH="68%" NOWRAP>
			<?php echo $this->Form->file('pic_path',array('label' => false, 'error'=>false,  'div'=>false, 'error'=>false));?>
			</TD>
		</TR>

		<TR>
			<TH CLASS="tableHeader" WIDTH="10%" ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr">&nbsp;&nbsp;<SPAN CLASS="t10red">(*)</SPAN>&nbsp;動画</FONT></TH>
			<TD CLASS="tableElement" COLSPAN="3" WIDTH="68%" NOWRAP>
			<?php echo $this->Form->file('trailer_path',array('label' => false, 'error'=>false,  'div'=>false, 'error'=>false));?>
			</TD>
		</TR>
		<TR>
			<TH CLASS="tableHeader" WIDTH="10%" ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr">劇場</FONT></TH>
			<TD CLASS="tableElement" COLSPAN="3" WIDTH="68%" NOWRAP>
			<TABLE>

			<?php
			$i=0;
			foreach ($theaters as $k => $v) {
				echo "<td>";
				echo $v;
				if ($this->data['Trailer']['theater_ids'] != "") {
					$theater = explode(",", $this->data['Trailer']['theater_ids']);
					$check_judge=false;
					//入力と一致するか検索
					foreach ($theater as $s_v) {
						if ($s_v == $k ) {
							$check_judge = true;
							if (honbu == $this->Session->read('theater_type') || motion == $this->Session->read('theater_type')) {
								echo $this->Form->checkbox('Trailer.theater_ids.'.$k, array('value' => $k,'checked'=>true)).'&nbsp;&nbsp;&nbsp;';

							} else {
								echo $this->Form->checkbox('Trailer.theater_ids.'.$k, array('value' => $k,'checked'=>true,'disabled'=>true)).'&nbsp;&nbsp;&nbsp;';
								echo $this->Form->hidden('Trailer.theater_ids.'.$k, array('value' => $k,'checked'=>true));

							}
							break;
						}
					}
					//入力と一致するものがなければ普通に出力
					if(!$check_judge) {
						if (honbu == $this->Session->read('theater_type') || motion == $this->Session->read('theater_type')) {
							echo $this->Form->checkbox('Trailer.theater_ids.'.$k, array('value' => $k)).'&nbsp;&nbsp;&nbsp;';
						} else {
							echo $this->Form->checkbox('Trailer.theater_ids.'.$k, array('value' => $k,'disabled'=>true)).'&nbsp;&nbsp;&nbsp;';
							//echo $this->Form->hidden('Trailer.theater_ids.'.$k, array('value' => $k));
						}
					}
				} else {
					//普通に出力
					if (honbu == $this->Session->read('theater_type') || motion == $this->Session->read('theater_type')) {
						//普通に出力
						echo $this->Form->checkbox('Trailer.theater_ids.'.$k, array('value' => $k)).'&nbsp;&nbsp;&nbsp;';
					} else {
						//普通に出力
						echo $this->Form->checkbox('Trailer.theater_ids.'.$k, array('value' => $k,'disabled'=>true)).'&nbsp;&nbsp;&nbsp;';
						echo $this->Form->hidden('Trailer.theater_ids.'.$k, array('value' => $k));
					}

				}

				$i++;
				echo "</td>";

				if($i%5==0) {
					echo '</tr>';
				}
			}
			?>


			</TABLE>
			</TD>
		</TR>
	</TABLE>

	<TABLE WIDTH="100%">
		<TD>
			<?php echo $this->Form->end(__('登録', true));?>
		</TD>
	</TABLE>


