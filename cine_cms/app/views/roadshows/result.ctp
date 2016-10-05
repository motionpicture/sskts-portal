<div id="panku">上映作品 ＞ 作品一覧</div>
<br>
上映作品データを選択してください
<br>

<TABLE WIDTH="100%" ALIGN="CENTER">
	<TR>
		<TD>
			<TABLE WIDTH="100%" ALIGN="CENTER" BORDER="1" CELLSPACING="0"
				CELLPADDING="1">

				<tr>
					<TH CLASS="tableHeader" WIDTH="5%" ALIGN="CENTER" NOWRAP><FONT
						CLASS="tableStr">ID</FONT></TH>
					<TH CLASS="tableHeader" WIDTH="20%" ALIGN="CENTER" NOWRAP><FONT
						CLASS="tableStr">作品名</FONT></TH>
					<TH CLASS="tableHeader" WIDTH="20%" ALIGN="CENTER" NOWRAP><FONT
						CLASS="tableStr">作品名(かな)</FONT></TH>
					<TH CLASS="tableHeader" WIDTH="20%" ALIGN="CENTER" NOWRAP><FONT
						CLASS="tableStr">上映期間</FONT></TH>
					<TH CLASS="tableHeader" WIDTH="25%" ALIGN="CENTER" NOWRAP><FONT
						CLASS="tableStr">劇場</FONT></TH>
				</tr>

<?php if (count($results) > 0) { ?>
<?php foreach($results as $result) { ?>
<?php
	$style='';
	if (!is_null($result[0]['roadshow__end_date'])) {
		$current_date = date('Ymd');
		$target_date = date('Ymd',strtotime($result[0]['roadshow__end_date']));

		if ($current_date > $target_date) {
			$style = 'style="background-color: #666"';
		}
	}

?>
			<tr>
				<td <?php echo $style ?> CLASS="tableElement"><a href="/cine_cms/roadshows/edit/<?php echo $result[0]['roadshow__id']; ?>"><?php echo $result[0]['roadshow__id']; ?></a></td>
				<td <?php echo $style ?> CLASS="tableElement"><?php echo $result[0]['roadshow__movie_name']; ?></td>
				<td <?php echo $style ?> CLASS="tableElement"><?php echo $result[0]['roadshow__movie_yomi']; ?></td>
				<td <?php echo $style ?> CLASS="tableElement"><?php echo $result[0]['roadshow__start_date'].'  ('.$weekjp[date('w',strtotime($result[0]['roadshow__start_date']))].')'; ?> ～
				<?php
					if (!is_null($result[0]['roadshow__end_date'] )) {
						echo $result[0]['roadshow__end_date'].'  ('.$weekjp[date('w',strtotime($result[0]['roadshow__end_date']))].')';
					}
				?>
				</td>
				<td  <?php echo $style ?> CLASS="tableElement">
			<?php
			$theater = explode(",", $result[0]['theater__ids']);

			$theaters_txt = "";

			 foreach ($theaters as $tk => $tv) {
			 	foreach ($theater as $ttk => $ttv) {
					if($tk == $ttv){
						$theaters_txt .= $tv."　｜　";
					}
				}
			}
			if ($theaters_txt != "") {
				echo mb_substr($theaters_txt,0, -3);
			}

			?>
				</td>
			</tr>
<?php } ?>

<?php }  else { ?>
<tr>
<td colspan="5">
検索結果がありません。
</td>
</tr>
<?php } ?>
		</table>
		</TD>
	</TR>
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










