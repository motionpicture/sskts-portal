<div id="panku">作品マスター ＞ 検索</div>


<TABLE WIDTH="100%" ALIGN="CENTER">
<?php echo $this->Form->create('Movie',array('type'=>'GET','action'=>'result'));?>
	<TR><TD>
		<TABLE WIDTH="100%" ALIGN="CENTER" BORDER="1" CELLSPACING="0" CELLPADDING="2" FRAME="BOX">
			<tr>
				<TH CLASS="tableHeader" WIDTH="150" ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr">作品名</FONT></TH>
				<td CLASS="tableElement"><?php echo $this->Form->input('name',array('label' => false, 'error'=>false,  'div'=>false, 'error'=>false));?></td>
			</tr>
			<tr>
				<TH CLASS="tableHeader" WIDTH="150" ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr">作品名（かな）</FONT></TH>
				<td CLASS="tableElement"><?php echo $this->Form->input('yomi',array('label' => false, 'error'=>false,  'div'=>false, 'error'=>false));?></td>
			</tr>
		</table>
		<br>
						<?php echo $form->submit('検索', array('label' => false, 'error'=>false,  'div'=>false)); ?>
					　<input type="button" value="　クリア　" onClick="javascritp:reset();">

	</TD></TR>
	<?php echo $this->Form->end();?>
</TABLE>




