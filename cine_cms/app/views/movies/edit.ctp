<div id="panku">作品マスター ＞ 編集</div>
<TABLE WIDTH="100%" ALIGN="CENTER">
	<?php echo $this->Form->create('Movie', array('type'=>'file'));?>
	<?php echo $this->Form->input('id'); ?>
	<TR><TD>
		<TABLE WIDTH="100%" ALIGN="CENTER" BORDER="1" CELLSPACING="0" CELLPADDING="2" FRAME="BOX">
			<tr>
				<TH CLASS="tableHeader" ROWSPAN="3" WIDTH="90" ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr">作品名</FONT></TH>
				<TH CLASS="tableHeader" WIDTH="60" ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr"><SPAN CLASS="t10red">(*)</SPAN>&nbsp;作品名</FONT></TH>
				<td CLASS="tableElement"><?php echo $this->Form->input('name',array('label' => false, 'error'=>false,  'div'=>false, 'error'=>false));?>　<SPAN CLASS="t10red">入力可能文字数：全角64文字</SPAN></td>
			</tr>
			<tr>
				<TH CLASS="tableHeader" WIDTH="60" ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr">かな</FONT></TH>
				<td CLASS="tableElement"><?php echo $this->Form->input('yomi',array('label' => false, 'error'=>false,  'div'=>false, 'error'=>false));?>　<SPAN CLASS="t10red">入力可能文字数：全角64文字</SPAN></td>
			</tr>
			<tr>
				<TH CLASS="tableHeader" WIDTH="60" ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr">英名（原題）</FONT></TH>
				<td CLASS="tableElement"><?php echo $this->Form->input('ename',array('label' => false, 'error'=>false,  'div'=>false, 'error'=>false));?>　<SPAN CLASS="t10red">入力可能文字数：半角128文字</SPAN></td>
			</tr>

			<tr>
				<TH CLASS="tableHeader" COLSPAN="2" WIDTH="150" ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr">画像名</FONT></TH>
				<td CLASS="tableElement">
					<?php if ($this->data['Movie']['picture'] != "") { ?>
					<?php echo $this->data['Movie']['picture'] ?><br />
					<img src="/theaters_image/movie/<?php echo $this->data['Movie']['picture'] ?>" /><br />
					<?php } ?>
					<?php echo $this->Form->file('picture',array('label' => false, 'error'=>false,  'div'=>false, 'error'=>false));?>
				</td>
			</tr>
			<tr>
				<TH CLASS="tableHeader" COLSPAN="2" WIDTH="150" ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr">画像クレジット</FONT></TH>
				<td CLASS="tableElement"><?php echo $this->Form->input('credit',array('label' => false, 'error'=>false,  'div'=>false, 'error'=>false));?>　<SPAN CLASS="t10red">入力可能文字数：半角128文字</SPAN></td>
			</tr>

			<tr>
				<TH CLASS="tableHeader" COLSPAN="2" WIDTH="150" ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr">作品紹介（解説・見所）</FONT></TH>
				<td CLASS="tableElement">
				<SPAN CLASS="t10red">入力可能文字数：全角1500文字</SPAN><br>
				<?php echo $this->Form->textarea('midokoro',array('label' => false, 'error'=>false,  'div'=>false, 'error'=>false, 'cols'=>'80','rows'=>'15'));?>　&nbsp;&nbsp;<A HREF="/kado_cms/tag_sample.html" TARGET="_BLANK">タグサンプル</A></td>
			</tr>
			<tr>
				<TH CLASS="tableHeader" COLSPAN="2" WIDTH="150" ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr">公式サイト</FONT></TH>
				<td CLASS="tableElement"><?php echo $this->Form->input('site',array('label' => false, 'error'=>false,  'div'=>false, 'error'=>false));?>　<SPAN CLASS="t10red">入力可能文字数：半角256文字</SPAN></td>
			</tr>
			<tr>
				<TH CLASS="tableHeader" COLSPAN="2" WIDTH="150" ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr">上映時間</FONT></TH>
				<td CLASS="tableElement"><?php echo $this->Form->input('running_time',array('label' => false, 'error'=>false,  'div'=>false, 'error'=>false));?>　<SPAN CLASS="t10red">入力可能文字数：半角256文字</SPAN></td>
			</tr>
			<tr>
				<TH CLASS="tableHeader" COLSPAN="2" WIDTH="150" ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr">レイティング</FONT></TH>
				<td CLASS="tableElement"><?php echo $this->Form->input('grade',array('label' => false, 'error'=>false,  'div'=>false, 'error'=>false, 'empty'=>'なし'));?>
				</td>
			</tr>
			<tr>
				<TH CLASS="tableHeader" COLSPAN="2" WIDTH="150" ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr">字幕なし</FONT></TH>
				<td CLASS="tableElement"><?php echo $this->Form->input('subtitle1',array('label' => false, 'error'=>false,  'div'=>false));?>
				</td>
			</tr>
			<tr>
				<TH CLASS="tableHeader" COLSPAN="2" WIDTH="150" ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr">字幕</FONT></TH>
				<td CLASS="tableElement"><?php echo $this->Form->input('subtitle2',array('label' => false, 'error'=>false,  'div'=>false));?>
				</td>
			</tr>
			<tr>
				<TH CLASS="tableHeader" COLSPAN="2" WIDTH="150" ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr">吹替</FONT></TH>
				<td CLASS="tableElement"><?php echo $this->Form->input('subtitle3',array('label' => false, 'error'=>false,  'div'=>false));?>
				</td>
			</tr>
			<tr>
				<TH CLASS="tableHeader" COLSPAN="2" WIDTH="150" ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr">3d</FONT></TH>
				<td CLASS="tableElement"><?php echo $this->Form->input('3d',array('label' => false, 'error'=>false,  'div'=>false));?>
				</td>
			</tr>
			<tr>
				<TH CLASS="tableHeader" COLSPAN="2" WIDTH="150" ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr">imax</FONT></TH>
				<td CLASS="tableElement"><?php echo $this->Form->input('imax',array('label' => false, 'error'=>false,  'div'=>false));?>
				</td>
			</tr>
		</table>

		<br>
		<table>
			<tr>
				<td>
					<?php echo $form->submit('修正', array('name' => 'judge')); ?>
				</td>
				<td>


				<?php echo $form->submit('削除', array('name' => 'judge','onClick'=>"disp('del');return false;")); ?>
					<?php echo $this->Form->end();?>
				</td>
			</tr>
		</table>
	</TD></TR>

</TABLE>



