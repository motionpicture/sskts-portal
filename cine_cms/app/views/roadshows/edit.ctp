<div id="panku">上映作品 ＞ 修正</div>
<TABLE WIDTH="100%" ALIGN="CENTER">


<?php echo $this->Form->create('Roadshow');?>
<?php echo $this->Form->input('id'); ?>
	<TR>
		<TD>
			<TABLE WIDTH="100%" ALIGN="CENTER" BORDER="1" CELLSPACING="0"
				CELLPADDING="1" FRAME="BOX">
				<tr>
					<TH CLASS="tableHeader" COLSPAN="2" WIDTH="150" HEIGHT="30"
						ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr">作品</FONT></TH>
					<td CLASS="tableElement">
					<?php echo $this->Form->select('movie_code',$movies, null, array('empty' => false)); ?>

					</td>
				</tr>
				<tr>
					<TH CLASS="tableHeader" WIDTH="1%" rowspan="2" ALIGN="CENTER"
						NOWRAP><FONT CLASS="tableStr">上映期間</FONT></TH>
					<TH CLASS="tableHeader" WIDTH="1%" HEIGHT="30" ALIGN="RIGHT" NOWRAP><FONT
						CLASS="tableStr">期間</FONT></TH>
					<td CLASS="tableElement">

					<?php echo $this->Form->input('start_date',array('monthNames'=>false, 'dateFormat'=>'YMD','minYear' => date('Y',strtotime("-1 year")),'maxYear' => date('Y',strtotime("+1 year")),'label' => false, 'error'=>false,  'div'=>false, 'error'=>false)); ?>
						<SPAN class="t10red">(*)</SPAN> ～
						<?php echo $this->Form->input('end_date',array('monthNames'=>false, 'dateFormat'=>'YMD','minYear' => date('Y',strtotime("-1 year")),'maxYear' => date('Y',strtotime("+1 year")),'label' => false, 'error'=>false,  'div'=>false, 'error'=>false, 'empty' => true)); ?>
						<span class="t10red">データの表示を終了する日(この日までデータが表示されます)</span>
</td>
				</tr>
				<tr>
					<TH CLASS="tableHeader" WIDTH="1%" HEIGHT="30" ALIGN="RIGHT" NOWRAP><FONT
						CLASS="tableStr">追加表示用</FONT></TH>
					<td CLASS="tableElement"><?php echo $this->Form->textarea('tuika',array('label' => false, 'error'=>false,  'div'=>false, 'error'=>false, 'cols'=>'72','rows'=>'10')); ?>
						<span class="t10red">（例）（例）池袋ー6/25まで</span></td>
				</tr>
<TR>
			<TH CLASS="tableHeader" WIDTH="10%" ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr">劇場</FONT></TH>
			<TD CLASS="tableElement" COLSPAN="3" WIDTH="68%" NOWRAP>
			<TABLE>
			<?php
			$i=0;
			foreach ($theaters as $k => $v) {
				echo "<td>";
				echo $v;
				if ($this->data['Roadshow']['theater_ids'] != "") {
					$theater = explode(",", $this->data['Roadshow']['theater_ids']);
					$check_judge=false;
					//入力と一致するか検索
					foreach ($theater as $s_v) {
						if ($s_v == $k ) {
							$check_judge = true;
							if (honbu == $this->Session->read('theater_type') || motion == $this->Session->read('theater_type')) {
								echo $this->Form->checkbox('Roadshow.theater_ids.'.$k, array('value' => $k,'checked'=>true)).'&nbsp;&nbsp;&nbsp;';

							} else {
								echo $this->Form->checkbox('Roadshow.theater_ids.'.$k, array('value' => $k,'checked'=>true,'disabled'=>true)).'&nbsp;&nbsp;&nbsp;';
								echo $this->Form->hidden('Roadshow.theater_ids.'.$k, array('value' => $k,'checked'=>true));

							}
							break;
						}
					}
					//入力と一致するものがなければ普通に出力
					if(!$check_judge) {
						if (honbu == $this->Session->read('theater_type') || motion == $this->Session->read('theater_type')) {
							echo $this->Form->checkbox('Roadshow.theater_ids.'.$k, array('value' => $k)).'&nbsp;&nbsp;&nbsp;';
						} else {
							echo $this->Form->checkbox('Roadshow.theater_ids.'.$k, array('value' => $k,'disabled'=>true)).'&nbsp;&nbsp;&nbsp;';
							//echo $this->Form->hidden('Roadshow.theater_ids.'.$k, array('value' => $k));
						}
					}
				} else {
					//普通に出力
					if (honbu == $this->Session->read('theater_type') || motion == $this->Session->read('theater_type')) {
						//普通に出力
						echo $this->Form->checkbox('Roadshow.theater_ids.'.$k, array('value' => $k)).'&nbsp;&nbsp;&nbsp;';
					} else {
						//普通に出力
						echo $this->Form->checkbox('Roadshow.theater_ids.'.$k, array('value' => $k,'disabled'=>true)).'&nbsp;&nbsp;&nbsp;';
						echo $this->Form->hidden('Roadshow.theater_ids.'.$k, array('value' => $k));
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
			</table>

			<table>
				<tr>
					<td>

					<?php echo $form->submit('修正', array('name' => 'judge')); ?>
					</td>
					<td>
					<?php echo $form->submit('削除', array('name' => 'judge','onClick'=>"disp('del');return false;")); ?>
					</td>
				<?php echo $this->Form->end();?>
			</tr>
			</table>

		</td>
	</tr>
</table>


