<?php
include("../lib/require.php");
?>
<html>
<head>
<title>BESTIA特設サイト</title>
</head>
<body>
    <h1>BESTIA特設サイト</h1>
    <h2>お知らせ一覧</h2>
    <?php
    $newsList = getSortedNews();
    ?>
    <dl>
    <?php foreach ($newsList as $news): ?>
        <dt class="midasi"><?php echo $news['midasi'] ?></dt>
        <dd class="start_date"><?php echo date('Y/m/d', strtotime($news['start_date'])) ?></dd>
        <dd class="txt"><?php echo $news['txt'] ?></dd>
    <?php endforeach; ?>
    </dl>
</body>
</html>
<?php
/**
 * ソート済みNewsを取得
 *
 * @return array
 */
function getSortedNews() {
    $sortedNewsList = array();
    $theaterId = '1005';
    $newsViews = getNewsViews($theaterId);

    if (empty($newsViews)) {
        // news_viewsに登録される前のケース
        return $sortedNewsList;
    }

    $views = explode(',', $newsViews['view']);

    $newsList = getNews($theaterId);

    if (empty($newsList)) {
        return $sortedNewsList;
    }

    foreach ($views as $id) {
        foreach ($newsList as $news) {
            if ($id == $news['id']) {
                $sortedNewsList[] = $news;
            }
        }
    }

    return $sortedNewsList;
}