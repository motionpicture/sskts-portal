<div id="panku">キャンペーン ＞ 編集</div>
編集を行うキャンペーンを選択してください
<TABLE WIDTH="100%">
	<TABLE WIDTH="100%" ALIGN="CENTER" BORDER="1" CELLSPACING="0" CELLPADDING="0" FRAME="BOX">
		<TR>
			<TH CLASS="tableHeader" WIDTH="10%" NOWRAP><FONT CLASS="tableStr">Campaign ID</FONT></TH>
			<TH CLASS="tableHeader" WIDTH="10%" NOWRAP><FONT CLASS="tableStr">更新日</FONT></TH>
			<TH CLASS="tableHeader" WIDTH="10%" NOWRAP><FONT CLASS="tableStr">削除日</FONT></TH>
			<TH CLASS="tableHeader" WIDTH="50%" NOWRAP><FONT CLASS="tableStr">見出し</FONT></TH>
			<TH CLASS="tableHeader" WIDTH="20%" NOWRAP><FONT CLASS="tableStr">実施劇場</FONT></TH>
		</TR>


		<?php foreach ($results as $k => $v) {
			$style='';
			if (date('Ymd',strtotime($v['campaigns']['end_date'])) < date('Ymd') ) {
				$style = 'style="background-color: #666"';
			}
			?>
		<TR>
			<TD <?php echo $style ?> CLASS="tableElement" ALIGN="CENTER" VALIGN="CENTER"><?php echo $html->link($v['campaigns']['id'],'edit/'.$v['campaigns']['id'] ); ?></TD>
			<TD <?php echo $style ?> CLASS="tableElement" ALIGN="CENTER" VALIGN="CENTER"><?php echo $v['campaigns']['start_date'] ?></TD>
			<TD <?php echo $style ?> CLASS="tableElement" ALIGN="CENTER" VALIGN="CENTER"><?php echo $v['campaigns']['end_date'] ?></TD>
			<TD <?php echo $style ?> CLASS="tableElement" VALIGN="CENTER"><?php echo $v['campaigns']['midasi'] ?></TD>
			<TD <?php echo $style ?> CLASS="tableElement" VALIGN="CENTER">
			<?php
			$theater = explode(",", $v['campaigns']['theater_ids']);

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
