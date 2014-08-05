<div id="panku">トップ　ランキング ＞ 編集</div>


<?php echo $this->Form->create('Ranking');?>
<?php echo $this->Form->input('id'); ?>
<TABLE WIDTH="100%" ALIGN="CENTER">
	<TR>
		<TD>

			<TABLE WIDTH="100%" ALIGN="CENTER" BORDER="1" CELLSPACING="0"
				CELLPADDING="0" FRAME="BOX">
				<TR>
					<TH CLASS="tableHeader" ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr">集計 開始日</FONT>
					</TH>
					<TD CLASS="tableElement">
					<?php echo $this->Form->input('start_date',array('monthNames'=>false, 'dateFormat'=>'YMD','minYear' => date('Y',strtotime("-1 year")),'maxYear' => date('Y',strtotime("+1 year")),'label' => false, 'error'=>false,  'div'=>false, 'error'=>false)); ?>
				</TR>
				<TR>
					<TH CLASS="tableHeader" ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr">集計 終了日</FONT>
					</TH>
					<TD CLASS="tableElement">
					<?php echo $this->Form->input('end_date',array('monthNames'=>false, 'dateFormat'=>'YMD','minYear' => date('Y',strtotime("-1 year")),'maxYear' => date('Y',strtotime("+1 year")),'label' => false, 'error'=>false,  'div'=>false, 'error'=>false)); ?>
				</TR>
				<TR>
					<TH CLASS="tableHeader" ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr">ランキング　１</FONT>
					</TH>
					<TD CLASS="tableElement">
					<?php echo $this->Form->select('movie_code1',$movie_code1, null, array('empty' => false)); ?>
				</TR>
				<TR>
					<TH CLASS="tableHeader" ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr">ランキング　２</FONT>
					</TH>
					<TD CLASS="tableElement">
					<?php echo $this->Form->select('movie_code2',$movie_code1, null, array('empty' => false)); ?>
				</TR>
				<TR>
					<TH CLASS="tableHeader" ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr">ランキング　３</FONT>
					</TH>
					<TD CLASS="tableElement">
					<?php echo $this->Form->select('movie_code3',$movie_code1, null, array('empty' => false)); ?>
				</TR>
				<TR>
					<TH CLASS="tableHeader" ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr">ランキング　４</FONT>
					</TH>
					<TD CLASS="tableElement">
					<?php echo $this->Form->select('movie_code4',$movie_code1, null, array('empty' => false)); ?>
				</TR>
				<TR>
					<TH CLASS="tableHeader" ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr">ランキング　５</FONT>
					</TH>
					<TD CLASS="tableElement">
					<?php echo $this->Form->select('movie_code5',$movie_code1, null, array('empty' => false)); ?>
				</TR>
			</TABLE>
		</TD>
	</TR>
</TABLE>

<TABLE>
	<tr>
		<td>
		<?php echo $form->submit('修正', array('name' => 'judge')); ?>
		</td>
				<?php echo $this->Form->end();?>
			</tr>
</TABLE>

