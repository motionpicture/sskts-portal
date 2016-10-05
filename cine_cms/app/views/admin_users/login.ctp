<div align="center">
 <?php if  ($session->check('Message.auth')) $session->flash('auth'); ?>
<?php echo $this->Form->create('AdminUser', array('action' => 'login'));?>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<TABLE WIDTH="300" ALIGN="CENTER" BORDER="1" CELLSPACING="0" CELLPADDING="2" FRAME="BOX">
	<tr>

		<TH CLASS="tableHeader" width="100" ALIGN="RIGHT"  nowrap><FONT CLASS="tableStr">ID</FONT></TH>
		<td CLASS="tableElement"><?php echo $form->input('username'); ?></td>
	</tr>
	<tr>
		<TH CLASS="tableHeader" width="100" ALIGN="RIGHT"  nowrap><FONT CLASS="tableStr">パスワード</FONT></TH>
		<td CLASS="tableElement"><?php echo $form->input('password'); ?></td>
	</tr>
</table>

<br>
<?php echo $form->end('Login'); ?>
</form>
<br>
<font color="#ff0000">

</font>
</div>