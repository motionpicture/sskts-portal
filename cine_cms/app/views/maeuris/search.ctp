<div id="panku">前売券 ＞ 検索</div>

<TABLE WIDTH="100%" ALIGN="CENTER" BORDER="1" CELLSPACING="0"
	CELLPADDING="0" FRAME="BOX">


	<?php echo $this->Form->create('Maeuri',array('type'=>'GET','action'=>'result'));?>
	<TR>
		<TH CLASS="tableHeader" WIDTH="10%" ALIGN="RIGHT" NOWRAP><FONT
			CLASS="tableStr">更新日</FONT></TH>
		<TD CLASS="tableElement" NOWRAP VALIGN="CENTER">
		<?php echo $this->Form->input('start_date',array('monthNames'=>false, 'dateFormat'=>'YMD','minYear' => date('Y',strtotime("-1 year")),
				'maxYear' => date('Y',strtotime("+1 year")),'label' => false, 'error'=>false,  'div'=>false, 'error'=>false, 'empty' => true,'timeFormat' => 'none')); ?>
			<span class="t10red">年月日を全部入力しないと検索されません。</span></TD>
	</TR>
	<TR>
	<TH CLASS="tableHeader" WIDTH="10%" ALIGN="RIGHT" NOWRAP><FONT
	CLASS="tableStr">作品</FONT></TH>
	<TD CLASS="tableElement" NOWRAP VALIGN="CENTER">
		<?php echo $this->Form->input('movie',array('label' => false, 'error'=>false,  'div'=>false, 'error'=>false, 'empty' => true));?>
		</TR>

	<TR>
		<TH CLASS="tableHeader" WIDTH="10%" ALIGN="RIGHT" NOWRAP><FONT
			CLASS="tableStr">劇場</FONT></TH>
		<TD CLASS="tableElement" WIDTH="68%" NOWRAP>
			<TABLE>
			<?php
			$i=0;
			foreach ($stheaters as $k => $v) {
				echo "<td>";
				echo $v;
				if (honbu == $this->Session->read('theater_type') || motion == $this->Session->read('theater_type')) {
					echo $this->Form->checkbox('Maeuri.theater_ids.'.$k, array('value' => $k)).'&nbsp;&nbsp;&nbsp;';
				} else {
					echo $this->Form->checkbox('Maeuri.theater_ids.'.$k, array('value' => $k,'checked'=>true,'disabled'=>true)).'&nbsp;&nbsp;&nbsp;';
					echo $this->Form->hidden('Maeuri.theater_ids.'.$k, array('value' => $k));
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

	<?php echo $form->submit('検索', array('label' => false, 'error'=>false,  'div'=>false)); ?>
		<input type="button" value="　クリア　" onClick="javascritp:reset();">


		<?php echo $this->Form->end();?>
		</TD>
</TABLE>







