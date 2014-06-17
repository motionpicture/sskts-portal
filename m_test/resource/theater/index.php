<?php
/*
 * Emoji変換用スクリプト
 * GET値に遷移先のファイルの拡張子をとったものを指定すると
 * resourceフォルダから対象のファイルを読み込み、各キャリアに合った絵文字に変換後出力します。
 * @author     Sota Ogoh <s.ogoh@rock-partners.com>
 */

$BASE = dirname(dirname(__FILE__));
$resourcePath = $BASE . '/resource/' . basename(dirname(__FILE__)) . '/';
include $BASE . '/lib/resource.php';

