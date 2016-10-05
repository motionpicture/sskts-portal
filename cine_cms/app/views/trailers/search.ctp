<div id="panku">動画バナー ＞ 検索</div>

<TABLE WIDTH="100%" ALIGN="CENTER" BORDER="1" CELLSPACING="0"
	CELLPADDING="0" FRAME="BOX">

	<?php echo $this->Form->create('Trailer',array('type'=>'GET','action'=>'result'));?>
	<TR>
		<TH CLASS="tableHeader" WIDTH="10%" ALIGN="RIGHT" NOWRAP><FONT
			CLASS="tableStr">タイトル</FONT></TH>
		<TD CLASS="tableElement" NOWRAP VALIGN="CENTER">
		<?php echo $this->Form->input('name',array('label' => false, 'error'=>false,  'div'=>false, 'error'=>false));?></TD>
	</TR>
	<TR>
		<TH CLASS="tableHeader" WIDTH="10%" ALIGN="RIGHT" NOWRAP><FONT
			CLASS="tableStr">劇場</FONT></TH>
		<TD CLASS="tableElement" WIDTH="68%" NOWRAP>
			<TABLE>



			<?php
			$i=0;
			//debug($theaters);
			foreach ($theaters as $k => $v) {
				echo "<td>";
				echo $v;
				echo $this->Form->checkbox('Campaign.theater_ids.'.$k, array('value' => $k)).'&nbsp;&nbsp;&nbsp;';
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







