<div align="center">
<?php echo $form->create('User'); ?>
<TABLE ALIGN="CENTER" BORDER="0" CELLSPACING="0">
	<tr>

		<td CLASS="tableElement">
		<?php echo $form->submit('シネプレックス', array('name' => 'judge')); ?>
		<?php echo $form->submit('角川シネマ', array('name' => 'judge')); ?>
		</td>
	</tr>
</table>
<br>
<?php echo $form->end(); ?>
</div>