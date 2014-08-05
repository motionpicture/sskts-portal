<div id="panku">特設サイト作品情報 ＞ 登録</div>
<TABLE WIDTH="100%" ALIGN="CENTER">
	<?php echo $this->Form->create('Introduction', array('type'=>'file'));?>
		<TABLE WIDTH="100%" ALIGN="CENTER" BORDER="1" CELLSPACING="0" CELLPADDING="2" FRAME="BOX">
			<tr>
				<TH CLASS="tableHeader" COLSPAN="2" ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr"><SPAN CLASS="t10red">(*)</SPAN>&nbsp;作品名</FONT></TH>
				<td CLASS="tableElement"><?php echo $this->Form->input('name',array('label' => false, 'error'=>false,  'div'=>false, 'error'=>false));?>　<SPAN CLASS="t10red">入力可能文字数：全角64文字</SPAN></td>
			</tr>

			<TR>
				<TH CLASS="tableHeader" COLSPAN="2" WIDTH="150" ALIGN="RIGHT" NOWRAP><SPAN CLASS="t10red">(*)</SPAN><FONT CLASS="tableStr">上映予定日(IMAX)</FONT></TH>
				<TD CLASS="tableElement" COLSPAN="2" NOWRAP><?php echo $this->Form->input('start_date1',array('monthNames'=>false, 'dateFormat'=>'YMD','minYear' => date('Y',strtotime("-1 year")),'maxYear' => date('Y',strtotime("+1 year")),'label' => false, 'error'=>false,  'div'=>false, 'error'=>false,'timeFormat' => '24','separator' => array('年', '月', '日　'))); ?>&nbsp;&nbsp;<SPAN CLASS="t10red">データが上映中に移動する日</SPAN>
				</TD>
			</TR>

			<TR>
				<TH CLASS="tableHeader" COLSPAN="2" WIDTH="150" ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr"><SPAN CLASS="t10red">(*)</SPAN>&nbsp;上映終了日(IMAX)</FONT></TH>
				<TD CLASS="tableElement"NOWRAP VALIGN="CENTER" COLSPAN="2">
				<?php echo $this->Form->input('end_date1',array('monthNames'=>false, 'dateFormat'=>'YMD','minYear' => date('Y',strtotime("-1 year")),'maxYear' => date('Y',strtotime("+1 year")),'label' => false, 'error'=>false,  'div'=>false, 'error'=>false,'timeFormat' => '24','separator' => array('年', '月', '日　'))); ?>
				&nbsp;&nbsp;<SPAN CLASS="t10red">データの公開終了する日</SPAN></TD>
			</TR>

			<TR>
				<TH CLASS="tableHeader" COLSPAN="2" WIDTH="150" ALIGN="RIGHT" NOWRAP><SPAN CLASS="t10red">(*)</SPAN><FONT CLASS="tableStr">上映予定日(4DX)</FONT></TH>
				<TD CLASS="tableElement" COLSPAN="2" NOWRAP><?php echo $this->Form->input('start_date2',array('monthNames'=>false, 'dateFormat'=>'YMD','minYear' => date('Y',strtotime("-1 year")),'maxYear' => date('Y',strtotime("+1 year")),'label' => false, 'error'=>false,  'div'=>false, 'error'=>false,'timeFormat' => '24','separator' => array('年', '月', '日　'))); ?>&nbsp;&nbsp;<SPAN CLASS="t10red">データが上映中に移動する日</SPAN>
				</TD>
			</TR>

			<TR>
				<TH CLASS="tableHeader" COLSPAN="2" WIDTH="150" ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr"><SPAN CLASS="t10red">(*)</SPAN>&nbsp;上映終了日(4DX)</FONT></TH>
				<TD CLASS="tableElement"NOWRAP VALIGN="CENTER" COLSPAN="2">
				<?php echo $this->Form->input('end_date2',array('monthNames'=>false, 'dateFormat'=>'YMD','minYear' => date('Y',strtotime("-1 year")),'maxYear' => date('Y',strtotime("+1 year")),'label' => false, 'error'=>false,  'div'=>false, 'error'=>false,'timeFormat' => '24','separator' => array('年', '月', '日　'))); ?>
				&nbsp;&nbsp;<SPAN CLASS="t10red">データの公開終了する日</SPAN></TD>
			</TR>

			<TR>
				<TH CLASS="tableHeader" COLSPAN="2" WIDTH="150" ALIGN="RIGHT" NOWRAP><SPAN CLASS="t10red">(*)</SPAN><FONT CLASS="tableStr">上映予定日(AST)</FONT></TH>
				<TD CLASS="tableElement" COLSPAN="2" NOWRAP><?php echo $this->Form->input('start_date3',array('monthNames'=>false, 'dateFormat'=>'YMD','minYear' => date('Y',strtotime("-1 year")),'maxYear' => date('Y',strtotime("+1 year")),'label' => false, 'error'=>false,  'div'=>false, 'error'=>false,'timeFormat' => '24','separator' => array('年', '月', '日　'))); ?>&nbsp;&nbsp;<SPAN CLASS="t10red">データが上映中に移動する日</SPAN>
				</TD>
			</TR>

			<TR>
				<TH CLASS="tableHeader" COLSPAN="2" WIDTH="150" ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr"><SPAN CLASS="t10red">(*)</SPAN>&nbsp;上映終了日(AST)</FONT></TH>
				<TD CLASS="tableElement"NOWRAP VALIGN="CENTER" COLSPAN="2">
				<?php echo $this->Form->input('end_date3',array('monthNames'=>false, 'dateFormat'=>'YMD','minYear' => date('Y',strtotime("-1 year")),'maxYear' => date('Y',strtotime("+1 year")),'label' => false, 'error'=>false,  'div'=>false, 'error'=>false,'timeFormat' => '24','separator' => array('年', '月', '日　'))); ?>
				&nbsp;&nbsp;<SPAN CLASS="t10red">データの公開終了する日</SPAN></TD>
			</TR>
		
			<tr>
				<TH CLASS="tableHeader" COLSPAN="2" WIDTH="150" ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr">画像クレジット</FONT></TH>
				<td CLASS="tableElement"><?php echo $this->Form->input('credit',array('label' => false, 'error'=>false,  'div'=>false, 'error'=>false));?>　<SPAN CLASS="t10red">入力可能文字数：半角128文字</SPAN></td>
			</tr>
			<tr>
				<TH CLASS="tableHeader" COLSPAN="2" WIDTH="150" ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr">作品紹介（解説・見所）1</FONT></TH>
				<td CLASS="tableElement">
				<SPAN CLASS="t10red">入力可能文字数：全角1500文字</SPAN><br>
				<?php echo $this->Form->textarea('midokoro1',array('label' => false, 'error'=>false,  'div'=>false, 'error'=>false, 'cols'=>'80','rows'=>'15'));?>　&nbsp;&nbsp;
				</td>
			</tr>
			<tr>
				<TH CLASS="tableHeader" COLSPAN="2" WIDTH="150" ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr">作品紹介（解説・見所）2</FONT></TH>
				<td CLASS="tableElement">
				<SPAN CLASS="t10red">入力可能文字数：全角1500文字</SPAN><br>
				<?php echo $this->Form->textarea('midokoro2',array('label' => false, 'error'=>false,  'div'=>false, 'error'=>false, 'cols'=>'80','rows'=>'15'));?>　&nbsp;&nbsp;
				</td>
			</tr>
			<tr>
				<TH CLASS="tableHeader" COLSPAN="2" WIDTH="150" ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr">キャスト</FONT></TH>
				<td CLASS="tableElement">
				<SPAN CLASS="t10red">入力可能文字数：全角1500文字</SPAN><br>
				<?php echo $this->Form->textarea('cast',array('label' => false, 'error'=>false,  'div'=>false, 'error'=>false, 'cols'=>'80','rows'=>'15'));?>　&nbsp;&nbsp;
				</td>
			</tr>
			<tr>
				<TH CLASS="tableHeader" COLSPAN="2" WIDTH="150" ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr">公式サイト</FONT></TH>
				<td CLASS="tableElement"><?php echo $this->Form->input('site',array('label' => false, 'error'=>false,  'div'=>false, 'error'=>false));?>　<SPAN CLASS="t10red">入力可能文字数：半角256文字</SPAN></td>
			</tr>

			<tr>
				<TH CLASS="tableHeader" COLSPAN="2" WIDTH="150" ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr">URL(IMAX)</FONT></TH>
				<td CLASS="tableElement"><?php echo $this->Form->input('url',array('label' => false, 'error'=>false,  'div'=>false, 'error'=>false));?>　<SPAN CLASS="t10red">入力可能文字数：半角256文字</SPAN></td>
			</tr>

			<TR>
				<TH CLASS="tableHeader" COLSPAN="2" WIDTH="10%" ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr">画像(IMAX)</FONT></TH>
				<TD CLASS="tableElement" COLSPAN="3" WIDTH="68%" NOWRAP>
				<?php echo $this->Form->file('pic_path01',array('label' => false, 'error'=>false,  'div'=>false, 'error'=>false));?>
				</TD>
			</TR>

			<TR>
				<TH CLASS="tableHeader" COLSPAN="2" WIDTH="10%" ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr">画像(4DX,AST)</FONT></TH>
				<TD CLASS="tableElement" COLSPAN="3" WIDTH="68%" NOWRAP>
				<?php echo $this->Form->file('pic_path02',array('label' => false, 'error'=>false,  'div'=>false, 'error'=>false));?>
				</TD>
			</TR>
			<TR>
				<TH CLASS="tableHeader" COLSPAN="2" WIDTH="10%" ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr">バナー</FONT></TH>
				<TD CLASS="tableElement" COLSPAN="3" WIDTH="68%" NOWRAP>
				<?php echo $this->Form->file('pic_bnr',array('label' => false, 'error'=>false,  'div'=>false, 'error'=>false));?>
				</TD>
			</TR>
			<tr>
				<TH CLASS="tableHeader" COLSPAN="2" WIDTH="150" ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr">本番反映</FONT></TH>
				<td CLASS="tableElement"><?php echo $this->Form->input('reflection',array('label' => false, 'error'=>false,  'div'=>false));?></td>
			</tr>
			<TR>
				<TH CLASS="tableHeader" COLSPAN="2" WIDTH="10%" ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr">オプション(IMAX)</FONT></TH>
				<TD CLASS="tableElement" COLSPAN="3" WIDTH="68%" NOWRAP>
				<TABLE>

				<?php
				$i=0;
				 foreach ($statu1 as $k => $v) {
				 	echo "<td>";
					echo $v;
					if ($this->data['Introduction']['statu1'] != "") {
						$st1 = explode(",", $this->data['Introduction']['statu1']);
						$check_judge=false;
						//入力と一致するか検索
						foreach ($st1 as $s_v) {
							if ($s_v == $k ) {
								$check_judge = true;
								if (honbu == $this->Session->read('theater_type') || motion == $this->Session->read('theater_type')) {
									echo $this->Form->checkbox('Introduction.statu1.'.$k, array('value' => $k,'checked'=>true)).'&nbsp;&nbsp;&nbsp;';
								} else {
									//disableにした場合フォームの値が転送されない為、あえてhiddenを追加する
									echo $this->Form->checkbox('Introduction.statu1.'.$k, array('value' => $k,'checked'=>true,'disabled'=>true)).'&nbsp;&nbsp;&nbsp;';
									echo $this->Form->hidden('Introduction.statu1.'.$k, array('value' => $k,'checked'=>true));
								}
								break;
							}
						}
						//入力と一致するものがなければ普通に出力
						if(!$check_judge) {

							if (honbu == $this->Session->read('theater_type') || motion == $this->Session->read('theater_type')) {
								echo $this->Form->checkbox('Introduction.statu1.'.$k, array('value' => $k)).'&nbsp;&nbsp;&nbsp;';
							} else {
								echo $this->Form->checkbox('Introduction.statu1.'.$k, array('value' => $k,'checked'=>true,'disabled'=>true)).'&nbsp;&nbsp;&nbsp;';
								//echo $this->Form->hidden('Introduction.statu1.'.$k, array('value' => $k,'checked'=>true));
							}

						}
					//新規の場合
					} else {

						if (honbu == $this->Session->read('theater_type') || motion == $this->Session->read('theater_type')) {
							//普通に出力
							echo $this->Form->checkbox('Introduction.statu1.'.$k, array('value' => $k)).'&nbsp;&nbsp;&nbsp;';
						} else {
							//普通に出力
							echo $this->Form->checkbox('Introduction.statu1.'.$k, array('value' => $k,'checked'=>true,'disabled'=>true)).'&nbsp;&nbsp;&nbsp;';
							echo $this->Form->hidden('Introduction.statu1.'.$k, array('value' => $k,'checked'=>true));
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


			<TR>
				<TH CLASS="tableHeader" COLSPAN="2" WIDTH="10%" ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr">オプション(4DX)</FONT></TH>
				<TD CLASS="tableElement" COLSPAN="3" WIDTH="68%" NOWRAP>
				<TABLE>

				<?php
				$i=0;
				 foreach ($statu2 as $k => $v) {
				 	echo "<td>";
					echo $v;
					if ($this->data['Introduction']['statu2'] != "") {
						$st2 = explode(",", $this->data['Introduction']['statu1']);
						$check_judge=false;
						//入力と一致するか検索
						foreach ($st2 as $s_v) {
							if ($s_v == $k ) {
								$check_judge = true;
								if (honbu == $this->Session->read('theater_type') || motion == $this->Session->read('theater_type')) {
									echo $this->Form->checkbox('Introduction.statu2.'.$k, array('value' => $k,'checked'=>true)).'&nbsp;&nbsp;&nbsp;';
								} else {
									//disableにした場合フォームの値が転送されない為、あえてhiddenを追加する
									echo $this->Form->checkbox('Introduction.statu2.'.$k, array('value' => $k,'checked'=>true,'disabled'=>true)).'&nbsp;&nbsp;&nbsp;';
									echo $this->Form->hidden('Introduction.statu2.'.$k, array('value' => $k,'checked'=>true));
								}
								break;
							}
						}
						//入力と一致するものがなければ普通に出力
						if(!$check_judge) {

							if (honbu == $this->Session->read('theater_type') || motion == $this->Session->read('theater_type')) {
								echo $this->Form->checkbox('Introduction.statu2.'.$k, array('value' => $k)).'&nbsp;&nbsp;&nbsp;';
							} else {
								echo $this->Form->checkbox('Introduction.statu2.'.$k, array('value' => $k,'checked'=>true,'disabled'=>true)).'&nbsp;&nbsp;&nbsp;';
								//echo $this->Form->hidden('Introduction.statu2.'.$k, array('value' => $k,'checked'=>true));
							}

						}
					//新規の場合
					} else {

						if (honbu == $this->Session->read('theater_type') || motion == $this->Session->read('theater_type')) {
							//普通に出力
							echo $this->Form->checkbox('Introduction.statu2.'.$k, array('value' => $k)).'&nbsp;&nbsp;&nbsp;';
						} else {
							//普通に出力
							echo $this->Form->checkbox('Introduction.statu2.'.$k, array('value' => $k,'checked'=>true,'disabled'=>true)).'&nbsp;&nbsp;&nbsp;';
							echo $this->Form->hidden('Introduction.statu2.'.$k, array('value' => $k,'checked'=>true));
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

			<TR>
				<TH CLASS="tableHeader" COLSPAN="2" WIDTH="10%" ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr">オプション(AST)</FONT></TH>
				<TD CLASS="tableElement" COLSPAN="3" WIDTH="68%" NOWRAP>
				<TABLE>

				<?php
				$i=0;
				 foreach ($statu3 as $k => $v) {
				 	echo "<td>";
					echo $v;
					if ($this->data['Introduction']['statu1'] != "") {
						$st3 = explode(",", $this->data['Introduction']['statu3']);
						$check_judge=false;
						//入力と一致するか検索
						foreach ($st3 as $s_v) {
							if ($s_v == $k ) {
								$check_judge = true;
								if (honbu == $this->Session->read('theater_type') || motion == $this->Session->read('theater_type')) {
									echo $this->Form->checkbox('Introduction.statu3.'.$k, array('value' => $k,'checked'=>true)).'&nbsp;&nbsp;&nbsp;';
								} else {
									//disableにした場合フォームの値が転送されない為、あえてhiddenを追加する
									echo $this->Form->checkbox('Introduction.statu3.'.$k, array('value' => $k,'checked'=>true,'disabled'=>true)).'&nbsp;&nbsp;&nbsp;';
									echo $this->Form->hidden('Introduction.statu3.'.$k, array('value' => $k,'checked'=>true));
								}
								break;
							}
						}
						//入力と一致するものがなければ普通に出力
						if(!$check_judge) {

							if (honbu == $this->Session->read('theater_type') || motion == $this->Session->read('theater_type')) {
								echo $this->Form->checkbox('Introduction.statu3.'.$k, array('value' => $k)).'&nbsp;&nbsp;&nbsp;';
							} else {
								echo $this->Form->checkbox('Introduction.statu3.'.$k, array('value' => $k,'checked'=>true,'disabled'=>true)).'&nbsp;&nbsp;&nbsp;';
								//echo $this->Form->hidden('Introduction.statu3.'.$k, array('value' => $k,'checked'=>true));
							}

						}
					//新規の場合
					} else {

						if (honbu == $this->Session->read('theater_type') || motion == $this->Session->read('theater_type')) {
							//普通に出力
							echo $this->Form->checkbox('Introduction.statu3.'.$k, array('value' => $k)).'&nbsp;&nbsp;&nbsp;';
						} else {
							//普通に出力
							echo $this->Form->checkbox('Introduction.statu3.'.$k, array('value' => $k,'checked'=>true,'disabled'=>true)).'&nbsp;&nbsp;&nbsp;';
							echo $this->Form->hidden('Introduction.statu3.'.$k, array('value' => $k,'checked'=>true));
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

			<TR>
				<TH CLASS="tableHeader" COLSPAN="2" WIDTH="10%" ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr">劇場</FONT></TH>
				<TD CLASS="tableElement" COLSPAN="3" WIDTH="68%" NOWRAP>
				<TABLE>

				<?php
				$i=0;
				 foreach ($stheaters as $k => $v) {
				 	echo "<td>";
					echo $v;
					if ($this->data['Introduction']['theater_ids'] != "") {
						$theater = explode(",", $this->data['Introduction']['theater_ids']);
						$check_judge=false;
						//入力と一致するか検索
						foreach ($theater as $s_v) {
							if ($s_v == $k ) {
								$check_judge = true;
								if (honbu == $this->Session->read('theater_type') || motion == $this->Session->read('theater_type')) {
									echo $this->Form->checkbox('Introduction.theater_ids.'.$k, array('value' => $k,'checked'=>true)).'&nbsp;&nbsp;&nbsp;';
								} else {
									//disableにした場合フォームの値が転送されない為、あえてhiddenを追加する
									echo $this->Form->checkbox('Introduction.theater_ids.'.$k, array('value' => $k,'checked'=>true,'disabled'=>true)).'&nbsp;&nbsp;&nbsp;';
									echo $this->Form->hidden('Introduction.theater_ids.'.$k, array('value' => $k,'checked'=>true));
								}
								break;
							}
						}
						//入力と一致するものがなければ普通に出力
						if(!$check_judge) {

							if (honbu == $this->Session->read('theater_type') || motion == $this->Session->read('theater_type')) {
								echo $this->Form->checkbox('Introduction.theater_ids.'.$k, array('value' => $k)).'&nbsp;&nbsp;&nbsp;';
							} else {
								echo $this->Form->checkbox('Introduction.theater_ids.'.$k, array('value' => $k,'checked'=>true,'disabled'=>true)).'&nbsp;&nbsp;&nbsp;';
								//echo $this->Form->hidden('Introduction.theater_ids.'.$k, array('value' => $k,'checked'=>true));
							}

						}
					//新規の場合
					} else {

						if (honbu == $this->Session->read('theater_type') || motion == $this->Session->read('theater_type')) {
							//普通に出力
							echo $this->Form->checkbox('Introduction.theater_ids.'.$k, array('value' => $k)).'&nbsp;&nbsp;&nbsp;';
						} else {
							//普通に出力
							echo $this->Form->checkbox('Introduction.theater_ids.'.$k, array('value' => $k,'checked'=>true,'disabled'=>true)).'&nbsp;&nbsp;&nbsp;';
							echo $this->Form->hidden('Introduction.theater_ids.'.$k, array('value' => $k,'checked'=>true));
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

		</table>

		<br>
		<table>
			<tr>
				<td>
					<?php echo $this->Form->end(__('登録', true));?>
				</td>
			</tr>
		</table>
	</TD></TR>

</TABLE>



