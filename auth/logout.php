<?php
setcookie("login","0",time()-1);
setcookie("user","",time()-1);
setcookie("id_user","",time()-1);
setcookie("role","Guest",time()-1);
header("location:/");
?>
