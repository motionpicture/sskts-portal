<?PHP
  // 作成するファイル名の指定
  $file_name = 'file.txt';

    touch( $file_name );


  // ファイルのパーティションの変更
  chmod( $file_name, 0666 );
  echo('Info - ファイル作成完了。 file name:['.$file_name.']');
  echo $_SERVER["REMOTE_ADDR"];
?>
