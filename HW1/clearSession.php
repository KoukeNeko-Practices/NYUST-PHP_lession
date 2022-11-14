<?php session_start() ;

    unset($_SESSION['std']);
    unset($_SESSION['ch']);
    unset($_SESSION['en']);
    unset($_SESSION['math']);
    unset($_SESSION['avg']);

    // setcookie("count", 0, time() - 3600000000000)
    unset($_SESSION['login']);
    session_gc();
    setcookie('isLogin', 0, time() - 3600000000000, "/");
    session_destroy();
    header("Location: index.php");

?>
