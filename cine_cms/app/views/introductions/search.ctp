<div id="panku">特設サイト作品情報 ＞ 検索</div>


<TABLE WIDTH="100%" ALIGN="CENTER">
<?php echo $this->Form->create('Introduction',array('type'=>'GET','action'=>'result'));?>

		<TABLE WIDTH="100%" ALIGN="CENTER" BORDER="1" CELLSPACING="0" CELLPADDING="2" FRAME="BOX">
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
		</table>
		<br>
						<?php echo $form->submit('検索', array('label' => false, 'error'=>false,  'div'=>false)); ?>
					　<input type="button" value="　クリア　" onClick="javascritp:reset();">

	</TD></TR>
	<?php echo $this->Form->end();?>
</TABLE>




