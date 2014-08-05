<div id="panku">上映作品 ＞ 劇場選択</div>
<TABLE WIDTH="100%" ALIGN="CENTER">
	<TR><TD>
		<TABLE WIDTH="30%" ALIGN="LEFT" BORDER="1" CELLSPACING="0" >

			<tr>
				<TH CLASS="tableHeader" nowrap><FONT CLASS="tableStr">劇場名</FONT></TH>
			</tr>


			<?php foreach($theaters as $k => $v) { ?>

			<tr>
				<td CLASS="tableElement" nowrap><a href="./add/<?php echo $k ?>"><?php echo $v ?></a></td>
			</tr>

			<?php } ?>
		</table>
	</td></tr>
</table>
