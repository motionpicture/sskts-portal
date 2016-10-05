<div id="panku">TOPバナー  ＞ 編集</div>
編集を行うTOPバナー を選択してください
<TABLE WIDTH="100%">
	<TABLE WIDTH="100%" ALIGN="CENTER" BORDER="1" CELLSPACING="0" CELLPADDING="0" FRAME="BOX">
		<TR>
			<TH CLASS="tableHeader" WIDTH="10%" NOWRAP><FONT CLASS="tableStr">TOPバナー  ID</FONT></TH>
			<TH CLASS="tableHeader" WIDTH="10%" NOWRAP><FONT CLASS="tableStr">タイトル</FONT></TH>
			<TH CLASS="tableHeader" WIDTH="10%" NOWRAP><FONT CLASS="tableStr">順番</FONT></TH>
			<TH CLASS="tableHeader" WIDTH="20%" NOWRAP><FONT CLASS="tableStr">実施劇場</FONT></TH>
		</TR>

<?php foreach ($results as $k => $v) { ?>

		<TR>
			<TD CLASS="tableElement" ALIGN="CENTER" VALIGN="CENTER"><?php echo $html->link($v['Topimages']['id'],'edit/'.$v['Topimages']['id'] ); ?></TD>
			<TD CLASS="tableElement" ALIGN="CENTER" VALIGN="CENTER"><?php echo $v['Topimages']['name'] ?></TD>
			<TD CLASS="tableElement" ALIGN="CENTER" VALIGN="CENTER"><?php echo $v['Topimages']['orders'] ?></TD>
			<TD CLASS="tableElement" VALIGN="CENTER">
			<?php
			$theater = explode(",", $v['Topimages']['theater_ids']);

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
	</TABLE>
