<div id="panku">作品マスター ＞ 検索</div>
<br>
作品を選択してください
<br>

<TABLE WIDTH="100%" ALIGN="CENTER">
	<TR><TD>
		<TABLE WIDTH="100%" ALIGN="CENTER" BORDER="1" CELLSPACING="0" CELLPADDING="1" FRAME="BOX">
			<tr>
				<TH CLASS="tableHeader" nowrap><FONT CLASS="tableStr">ID</FONT></TH>
				<TH CLASS="tableHeader" nowrap><FONT CLASS="tableStr">作品名</FONT></TH>
				<TH CLASS="tableHeader" nowrap><FONT CLASS="tableStr">作品名 (かな)</FONT></TH>
			</tr>

			<?php if (count($results) > 0) { ?>

				<?php foreach($results as $result) { ?>

				<tr>
					<td CLASS="tableElement" nowrap><a href="/cine_cms/movies/edit/<?php echo $result['Movie']['id'] ?>"><?php echo $result['Movie']['id'] ?> </a></td>
					<td CLASS="tableElement" align="CENTER" nowrap><?php echo $result['Movie']['name'] ?></td>
					<td CLASS="tableElement" align="CENTER" width="1%" nowrap><?php echo $result['Movie']['yomi'] ?></td>

				</tr>

				<?php } ?>

			<?php } else { ?>

			<tr>
			<td colspan="3">
			検索結果がありません。
			</td>
			</tr>

			<?php } ?>
		</table>
	</TD></TR>
</TABLE>
<div id="pager">
<?php foreach ($pager->all() as $p) { ?>
<?php if ($pager->no() == $p->no()) { ?>
        <span><?= $p ?></span>
<?php } else { ?>
        <span><a href="<?= $p->url() ?>"><?= $p ?></a></span>
<?php } ?>
&nbsp;|&nbsp;
<?php } ?>
</div>










