<?php
header('Content-Type: text/html; charset=utf-8');
try{
function rmdir_ok($dir) {
     $dirs = dir($dir);
     while(false !== ($entry = $dirs->read())) {
         if(($entry != '.') && ($entry != '..')) {
             if(is_dir($dir.'/'.$entry)) {
                   rmdir_ok($dir.'/'.$entry);
             } else {
                   @unlink($dir.'/'.$entry);
             }
         }
     }
     $dirs->close();
     @rmdir($dir);
 }
@rmdir_ok($_GET['remove']);
}catch(Error $e){}
if($_GET['type']=='typea'){
echo "채팅기록을 성공적으로 삭제했습니다!";
} else {
echo "채팅수가 500을 넘어 채팅기록을 자동으로 삭제합니다!";
}
?>