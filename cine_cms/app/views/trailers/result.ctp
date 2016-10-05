<div id="panku">動画バナー ＞ 編集</div>
編集を行う動画バナーを選択してください
<TABLE WIDTH="100%">
	<TABLE WIDTH="100%" ALIGN="CENTER" BORDER="1" CELLSPACING="0" CELLPADDING="0" FRAME="BOX">
		<TR>
			<TH CLASS="tableHeader" WIDTH="10%" NOWRAP><FONT CLASS="tableStr">動画バナー ID</FONT></TH>
			<TH CLASS="tableHeader" WIDTH="10%" NOWRAP><FONT CLASS="tableStr">タイトル</FONT></TH>
			<TH CLASS="tableHeader" WIDTH="20%" NOWRAP><FONT CLASS="tableStr">実施劇場</FONT></TH>
		</TR>

<?php if (count($results) > 0) { ?>
		<?php foreach ($results as $k => $v) {
			$style='';
			?>

		<TR>
			<TD CLASS="tableElement" ALIGN="CENTER" VALIGN="CENTER"><?php echo $html->link($v['trailers']['id'],'edit/'.$v['trailers']['id'] ); ?></TD>
			<TD CLASS="tableElement" ALIGN="CENTER" VALIGN="CENTER"><?php echo $v['trailers']['name'] ?></TD>
			<TD CLASS="tableElement" VALIGN="CENTER">
			<?php
			$theater = explode(",", $v['trailers']['theater_ids']);

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
			</TD>
		</TR>
		<?php }?>
<?php }  else { ?>
<tr>
<td colspan="5">
検索結果がありません。
</td>
</tr>
<?php } ?>
	</TABLE>
