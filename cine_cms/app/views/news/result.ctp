<div id="panku">NEWS ＞ 編集</div>


実際表示するNEWSを登録してください。
<br />
<span style="color: red">※半角数字、半角コンマ以外は入力できません。</span><br />
<span style="color: red">※半角スペースも使えません。</span><br />
<span style="color: red">ex)1,2,30,50</span>
<br />

<?php echo $this->Form->create('News', array('type'=>'POST','action'=>"result?".http_build_query(Set::remove($this->params['url'],'url'),'','&')));?>
<TABLE WIDTH="800px" ALIGN="CENTER" BORDER="1" CELLSPACING="0"
	CELLPADDING="0" FRAME="BOX" style="float:left">
	<TR>
		<TH CLASS="tableHeader" WIDTH="200px" NOWRAP><FONT CLASS="tableStr">劇場</FONT>
		</TH>
		<TH CLASS="tableHeader" WIDTH="600px" NOWRAP><FONT CLASS="tableStr">NEWS
				ID</FONT></TH>
	</TR>

<?php
foreach ($theaters as $k => $v) {

	if (!(honbu ==  $this->Session->read('theater_type') || motion ==  $this->Session->read('theater_type'))) {
		$skey = array_keys($stheaters);
		 if ($k != ($skey[0])) {
		 	continue;
		 }


	}
	?>
		<TR>
			<TD style="padding:1px"> <?php echo $v ?></TD>
			<TD style="padding:1px;background:#E6E49F;align:center"><?php echo $this->Form->input('theater_'.$k,array('label' => false, 'error'=>false,  'div'=>false,'style'=>'font-size:100%;width:600px',
			 'error'=>false));?></TD>
		</TR>
<?php } ?>
	</TABLE>

	<?php echo $form->submit('修正'); ?>
	<?php echo $this->Form->end();?>

ニュースの編集場合は修正を行うニュースを選択してください
<TABLE WIDTH="100%" ALIGN="CENTER" BORDER="1" CELLSPACING="0"
	CELLPADDING="0" FRAME="BOX">
	<TR>
		<TH CLASS="tableHeader" WIDTH="10%" NOWRAP><FONT CLASS="tableStr">NEWS
				ID</FONT></TH>
		<TH CLASS="tableHeader" WIDTH="10%" NOWRAP><FONT CLASS="tableStr">更新日</FONT>
		</TH>
		<TH CLASS="tableHeader" WIDTH="10%" NOWRAP><FONT CLASS="tableStr">削除日</FONT>
		</TH>
		<TH CLASS="tableHeader" WIDTH="50%" NOWRAP><FONT CLASS="tableStr">見出し</FONT>
		</TH>
		<TH CLASS="tableHeader" WIDTH="20%" NOWRAP><FONT CLASS="tableStr">実施劇場</FONT>
		</TH>
	</TR>

		<?php if (count($results) > 0) { ?>

		<?php foreach ($results as $k => $v) {
			$style='';
			if (date('Ymd',strtotime($v['news']['end_date'])) < date('Ymd') ) {
				$style = 'style="background-color: #666"';
			}
			?>
		<TR>
			<TD <?php echo $style ?> CLASS="tableElement" ALIGN="CENTER" VALIGN="CENTER"><?php echo $html->link($v['news']['id'],'edit/'.$v['news']['id'] ); ?></TD>
			<TD <?php echo $style ?> CLASS="tableElement" ALIGN="CENTER" VALIGN="CENTER"><?php echo date("Y-m-d H:i",strtotime($v['news']['start_date'])) ?></TD>
			<TD <?php echo $style ?> CLASS="tableElement" ALIGN="CENTER" VALIGN="CENTER"><?php echo date("Y-m-d H:i",strtotime($v['news']['end_date'])) ?></TD>
			<TD <?php echo $style ?> CLASS="tableElement" VALIGN="CENTER"><?php echo $v['news']['midasi'] ?></TD>
			<TD <?php echo $style ?> CLASS="tableElement" VALIGN="CENTER">
			<?php
			$theater = explode(",", $v['news']['theater_ids']);

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
		<?php } ?>
					<?php } else { ?>

			<tr>
			<td colspan="3">
			検索結果がありません。
			</td>
			</tr>

			<?php } ?>
	</TABLE>
