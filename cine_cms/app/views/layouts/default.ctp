<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>




<?php echo $this->Html->charset(); ?>
<title>
<?php echo $title_for_layout; ?>
</title>


	<?php
		echo $this->Html->css('cine.css');
		echo $scripts_for_layout;
	?>

<script type="text/javascript">
<!--
var submitFlg = false;
function submit(){
	if( submitFlg == false ){
		submitFlg = true;
		document.form.submit();

	}else{

		alert( "現在処理中です" );
	}
}


function disp(act){
	if(window.confirm('本当実行しますか？？')){
		document.form.sumit();

	}
}

// -->
</script>
</head>
<body>
	<div id="container">
		<div id="header">
			<h1>
				<?php echo $this->Session->read('user.User.username'); ?>


			<?php echo $html->link('ログアウト','/users/logout/'); ?></h1>
		</div>
		<div id="content">
			<div class="index">


			<?php echo $this->Session->flash(); ?>


			<?php echo $content_for_layout; ?>
			</div>
	<div class="actions">
		<h3>サイト</h3>
		<ul>
		<?php
		//本部
		if (honbu ==  $this->Session->read('theater_type') || motion ==  $this->Session->read('theater_type')) {
			echo
			'<li><a href="'.sunshine_domain.'" target="_blank">シネマサンシャイン　トップ</a></li>';
		} else {
			echo '<li><a href="'.sunshine_domain.'theater/'.$this->Session->read('theater_type').'" target="_blank">劇場　トップ</a></li>';
		}
		?>

		</ul>

		<?php if (honbu ==  $this->Session->read('theater_type')  || motion ==  $this->Session->read('theater_type')) { ?>
		<h3>作品マスター</h3>
		<ul>
			<li><a href="/cine_cms/movies/add">新規登録</a></li>
			<li><a href="/cine_cms/movies/search">検索／編集</a></li>
		</ul>

		<?php //} ?>

		<?php  //if (motion ==  $this->Session->read('theater_type')) { ?>
		<h3> 上映作品</h3>
		<ul>
		<li><a href="/cine_cms/roadshows/add">新規登録</a></li>
		<li><a href="/cine_cms/roadshows/search">検索／編集</a></li>
		</ul>
		<h3>キャンペーン情報</h3>
		<ul>
		<li><a href="/cine_cms/campaigns/add">新規登録</a></li>
		<li><a href="/cine_cms/campaigns/search">検索／編集</a></li>
		</ul>
		<h3>TOPランキング</h3>
		<ul>
		<li><a href="/cine_cms/rankings/edit">編集 </a></li>
		</ul>
		<h3>各劇場動画バナー</h3>
		<ul>
		<li><a href="/cine_cms/trailers/add">新規登録</a></li>
		<li><a href="/cine_cms/trailers/search">検索／編集</a></li>
		</ul>
	        <h3>各劇場TOPバナー</h3>
	        <ul>
	        <li><a href="/cine_cms/topsliders/add">新規登録</a></li>
	        <li><a href="/cine_cms/topsliders/search">検索／編集</a></li>
	        </ul>
	        <h3>ピックアップバナー</h3>
	        <ul>
	        <li><a href="/cine_cms/picks/add">新規登録</a></li>
	        <li><a href="/cine_cms/picks/search">検索／編集</a></li>
	        </ul>
	        <h3>特設サイトメインバナ－</h3>
	        <ul>
	        <li><a href="/cine_cms/special_main_banners/add">新規登録</a></li>
	        <li><a href="/cine_cms/special_main_banners/search">検索／編集</a></li>
	        </ul>
	        <h3>特設サイトサイドバナ－</h3>
	        <ul>
	        <li><a href="/cine_cms/special_side_banners/add">新規登録</a></li>
	        <li><a href="/cine_cms/special_side_banners/search">検索／編集</a></li>
	        </ul>
	        <h3>特設サイト作品紹介</h3>
	        <ul>
	        <li><a href="/cine_cms/introductions/add">新規登録</a></li>
	        <li><a href="/cine_cms/introductions/search">検索／編集</a></li>
	        </ul>
	        <h3>確認用</h3>
	        <ul>
	        <li><a href="/cine_cms/confirms/check">確認</a></li>
	        </ul>

 	<?php } ?>
		<h3>NEWS</h3>
		<ul>
			<li><a href="/cine_cms/news/add">新規登録</a></li>
			<li><a href="/cine_cms/news/search">検索／編集</a></li>
		</ul>
		<h3>開館時間</h3>
		<ul>
			<li><a href="/cine_cms/importants/lists">編集 </a></li>
		</ul>

		<h3>前売券情報</h3>
		<ul>
			<li><a href="/cine_cms/maeuris/select">新規登録</a></li>
			<li><a href="/cine_cms/maeuris/search">検索／編集</a></li>
		</ul>
	</div>


	</div>
	</div>




	<?php //echo $this->element('sql_dump'); ?>
</body>
</html>
