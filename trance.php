<?php
            $ftp = ftp_connect("211.16.227.165");
            ftp_login($ftp, "jdssunshine", "Sun%6699mp");
            ftp_pasv($ftp, false);
            //ftp_pasv($ftp, true);

            ftp_chdir($ftp, "/jdsunshine");
var_dump(ftp_chdir($ftp, "/jdsunshine"));
var_dump(ftp_rawlist($ftp, "/jdsunshine"));
var_dump(ftp_get($ftp, "dl.txt","test.txt",FTP_BINARY));

            //ftp_put($ftp, basename($src), $src, FTP_BINARY);
            //ftp_put($ftp, "testfile.txt", "testfile.txt", FTP_BINARY);

            ftp_close($ftp);
?>