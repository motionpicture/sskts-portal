<div id="panku">開館時間 ＞ 編集</div>

		<TABLE WIDTH="100%" ALIGN="CENTER">
		<?php foreach ($theaters as $k => $v) { ?>
			<TR>
				<TD NOWRAP><B><?php echo $html->link($v['theater_name'],'edit/'.$v['theater_id'] ); ?> </B></TD>
			</TR>
			<TR>
				<TD>
					<TABLE WIDTH="100%" ALIGN="CENTER" BORDER="1" CELLSPACING="0"
						CELLPADDING="0" FRAME="BOX">
						<!-- <TR>
							<TH CLASS="tableHeader" WIDTH="125" ALIGN="RIGHT" NOWRAP><FONT
								CLASS="tableStr">本文(PC・モバイル兼用)</FONT></TH>
							<TD CLASS="tableElement" HEIGHT="75" VALIGN="CENTER"><?php echo $v['txt'] ?></TD>
						</TR>
						 -->
						<TR>
							<TH CLASS="tableHeader" WIDTH="125" ALIGN="RIGHT" NOWRAP><FONT
								CLASS="tableStr">開館時間</FONT></TH>
							<TD CLASS="tableElement" HEIGHT="75" VALIGN="CENTER"><?php echo $v['open_txt'] ?></TD>
						</TR>
					</TABLE>
				</TD>
			</TR>
			<?php } ?>
		</TABLE>

