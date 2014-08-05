<div id="panku">Coming Soon＞ 編集</div>


<?php echo $this->Form->create('NextShowing');?>
<?php echo $this->Form->input('id'); ?>
 <?php echo $this->Form->hidden('theater_id'); ?>
<TABLE WIDTH="100%" ALIGN="CENTER">
	<TR>
		<TD>

			<TABLE WIDTH="100%" ALIGN="CENTER" BORDER="1" CELLSPACING="0"
				CELLPADDING="0" FRAME="BOX">
				<TR>
					<TH CLASS="tableHeader" ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr">劇場</FONT>
					</TH>
					<TD CLASS="tableElement">
					<?php echo $theaterName ?>
				</TR>
				<TR>
					<TH CLASS="tableHeader" ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr">COMING SOON対象作品１</FONT>
					</TH>
					<TD CLASS="tableElement">
					<?php echo $this->Form->select('movie_code1',$movie_code, null, array('empty' => false)); ?>
				</TR>
				<TR>
					<TH CLASS="tableHeader" ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr">COMING SOON対象作品２</FONT>
					</TH>
					<TD CLASS="tableElement">
					<?php echo $this->Form->select('movie_code2',$movie_code, null, array('empty' => false)); ?>
				</TR>
				<!--
				<TR>
					<TH CLASS="tableHeader" ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr">NOW SHOWING対象作品３</FONT>
					</TH>
					<TD CLASS="tableElement">
					<?php //echo $this->Form->select('mo_code3',$mo_code, null, array('empty' => '▼選択してください')); ?>
				</TR>
				<TR>
					<TH CLASS="tableHeader" ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr">NOW SHOWING対象作品４</FONT>
					</TH>
					<TD CLASS="tableElement">
					<?php //echo $this->Form->select('mo_code4',$mo_code, null, array('empty' => '▼選択してください')); ?>
				</TR>
				 -->
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
