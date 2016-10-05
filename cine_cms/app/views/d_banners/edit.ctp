<div id="panku">D Banner＞ 編集</div>


<?php echo $this->Form->create('DBanner');?>
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
					<TH CLASS="tableHeader" ALIGN="RIGHT" NOWRAP><FONT CLASS="tableStr">HTML</FONT>
					</TH>
					<TD CLASS="tableElement">
					<?php echo $this->Form->textarea('txt',array('label' => false, 'error'=>false,  'div'=>false, 'error'=>false, 'cols'=>'72','rows'=>'10')); ?>
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
