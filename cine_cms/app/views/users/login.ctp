<div align="center">
<?php echo $form->create('User', array('action' => 'login')); ?>
<TABLE WIDTH="300" ALIGN="CENTER" BORDER="1" CELLSPACING="0" CELLPADDING="2" FRAME="BOX">
	<tr>

		<TH CLASS="tableHeader" width="100" ALIGN="RIGHT"  nowrap><FONT CLASS="tableStr">ID</FONT></TH>
		<td CLASS="tableElement"><?php echo $form->input('username', array('label' => false, 'div'=>false)); ?></td>
	</tr>
	<tr>
		<TH CLASS="tableHeader" width="100" ALIGN="RIGHT"  nowrap><FONT CLASS="tableStr">パスワード</FONT></TH>
		<td CLASS="tableElement"><?php echo $form->input('password', array('label' => false, 'id' => 'loginpassword')); ?></td>
	</tr>
</table>
<?php echo $error; ?>
<br>
<?php echo $form->end('ログイン'); ?>
</form>
<br>
<font color="#ff0000">

</font>
</div>