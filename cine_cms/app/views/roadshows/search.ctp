<div id="panku">上映作品 ＞ 検索</div>


<TABLE WIDTH="100%" ALIGN="CENTER">
	<?php echo $this->Form->create('Roadshow',array('type'=>'GET','action'=>'result'));?>
	<TR><TD>
		<TABLE WIDTH="100%" ALIGN="CENTER" BORDER="1" CELLSPACING="0" CELLPADDING="2" FRAME="BOX">


			<tr>
				<TH CLASS="tableHeader" WIDTH="150" HEIGHT="30" ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr">劇場</FONT></TH>
				<TD CLASS="tableElement"><?php echo $this->Form->select('theater',$theaters, null, array('empty' => '▼選択してください')); ?></td>
			</tr>
			<tr>
				<TH CLASS="tableHeader" WIDTH="150" HEIGHT="30" ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr">作品名</FONT></TH>
				<TD CLASS="tableElement"><?php echo  $this->Form->input('movie_name',array('label' => false, 'error'=>false,  'div'=>false, 'error'=>false, 'maxlength'=>200)); ?>　<span class="t10red">部分一致</span></td>
			</tr>
			<tr>
				<TH CLASS="tableHeader" WIDTH="150" HEIGHT="30" ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr">作品名（かな）</FONT></TH>
				<TD CLASS="tableElement"><?php echo  $this->Form->input('movie_kana',array('label' => false, 'error'=>false,  'div'=>false, 'error'=>false, 'maxlength'=>200)); ?>　<span class="t10red">部分一致</span></td>
			</tr>
			<tr>
				<TH CLASS="tableHeader" WIDTH="150" HEIGHT="30" ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr">上映開始日</FONT></TH>
				<TD CLASS="tableElement"><?php echo $this->Form->input('start_date',array('monthNames'=>false, 'dateFormat'=>'YMD','minYear' => date('Y',strtotime("-1 year")),
				'maxYear' => date('Y',strtotime("+1 year")),'label' => false, 'error'=>false,  'div'=>false, 'error'=>false, 'empty' => true)); ?> 　<span class="t10red">年月日を全部入力しないと検索されません。</span></td>
			</tr>
		</table>
		<br>
		<?php echo $form->submit('検索', array('label' => false, 'error'=>false,  'div'=>false)); ?>　<input type="button" value="　クリア　" onClick="javascritp:reset();">
		<?php echo $this->Form->end();?>
	</td></tr>
	</form>
</table>




