<div id="panku">前売券情報 ＞ 編集</div>
編集を行う前売券を選択してください

	<TABLE WIDTH="100%" ALIGN="CENTER" BORDER="1" CELLSPACING="1" CELLPADDING="1" FRAME="BOX">

		<TR>
			<TH CLASS="tableHeader" WIDTH="10%" NOWRAP><FONT CLASS="tableStr">前売り ID</FONT></TH>
			<TH CLASS="tableHeader" WIDTH="10%" NOWRAP><FONT CLASS="tableStr">更新日</FONT></TH>
			<TH CLASS="tableHeader" WIDTH="10%" NOWRAP><FONT CLASS="tableStr">公開予定日</FONT></TH>
			<TH CLASS="tableHeader" WIDTH="10%" NOWRAP><FONT CLASS="tableStr">発売日</FONT></TH>
			<TH CLASS="tableHeader" WIDTH="10%" NOWRAP><FONT CLASS="tableStr">劇場</FONT></TH>
			<TH CLASS="tableHeader" WIDTH="20%" NOWRAP><FONT CLASS="tableStr">作品</FONT></TH>
			<TH CLASS="tableHeader" WIDTH="20%" NOWRAP><FONT CLASS="tableStr">料金</FONT></TH>
			<TH CLASS="tableHeader" WIDTH="20%" NOWRAP><FONT CLASS="tableStr">備考</FONT></TH>
			<TH CLASS="tableHeader" WIDTH="20%" NOWRAP><FONT CLASS="tableStr">ムビチケ</FONT></TH>
		</TR>

	<?php foreach ($results as $k => $v) {
		$style='';
		if (date('Ymd',strtotime($v['Maeuri']['end_date'])) < date('Ymd') ) {
			$style = 'style="background-color: #666"';
		}
		?>

		<TR>
			<TD <?php echo $style ?> CLASS="tableElementGray" ALIGN="CENTER" VALIGN="CENTER"><?php echo $html->link($v['Maeuri']['id'],'edit/'.$v['Maeuri']['id'] ); ?></TD>
			<TD <?php echo $style ?> CLASS="tableElementGray" ALIGN="CENTER" VALIGN="CENTER"><?php echo date("Y-m-d H:i",strtotime($v['Maeuri']['start_date'])) ?></TD>
			<TD <?php echo $style ?> CLASS="tableElementGray" ALIGN="CENTER" VALIGN="CENTER"><?php echo date("Y-m-d H:i",strtotime($v['Maeuri']['end_date'])) ?></TD>
			<TD <?php echo $style ?> CLASS="tableElementGray" ALIGN="CENTER" VALIGN="CENTER"><?php echo $v['Maeuri']['roadshow_date'] ?></TD>
			<TD <?php echo $style ?> CLASS="tableElementGray" ALIGN="CENTER" VALIGN="CENTER"><?php echo $theaters[$v['Maeuri']['theater_id']] ?></TD>
			<TD <?php echo $style ?> CLASS="tableElementGray" VALIGN="CENTER"><?php echo $movies[$v['Maeuri']['movie_code']] ?></TD>
			<TD <?php echo $style ?> CLASS="tableElementGray" ALIGN="CENTER" VALIGN="CENTER"><?php echo $v['Maeuri']['price'] ?></TD>
			<TD <?php echo $style ?> CLASS="tableElementGray" ALIGN="CENTER" VALIGN="CENTER"><?php echo $v['Maeuri']['note'] ?></TD>
			<TD <?php echo $style ?> CLASS="tableElementGray" ALIGN="CENTER" VALIGN="CENTER"><?php echo $v['Maeuri']['movie_ticket_flg'] ==1 ? "○" : "×"?></TD>
		</TR>
	<?php } ?>
	</TABLE>

