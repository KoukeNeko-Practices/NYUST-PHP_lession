<?php session_start() ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <link rel='stylesheet' type='text/css' href='main.css?<?php echo time()?>'>
</head>
<body>
    
    <?php 
        // print_r($_SESSION);
        $data = file("./score.dat");
        $data_array = array();
        for ($i = 0; $i < count($data); $i++) {
            $temp = explode(" ", $data[$i]);
            $data_array[$i] = array("id" => $temp[0], "password" => $temp[1], "name" => $temp[2], "Chinese" => $temp[3], "English" => $temp[4], "Math" => $temp[5]);
        }

        if(isset($_POST['std']) && $_POST['psw']){
            $isFound = false;
            foreach($data_array as $val){
                if ($val["id"] == $_POST['std'] && $val["password"] == $_POST['psw']){
                    $isFound = true;
                    $_SESSION['std'] = $val["id"];
                    $_SESSION['ch'] = $val["Chinese"];
                    $_SESSION['en'] = $val["English"];
                    $_SESSION['math'] = $val["Math"];
                    @$_SESSION['avg'] =  round(($val["Chinese"] + $val["English"] + $val["Math"] ) / 3,2);
                    break;
                }
            }
            // print_r($isFound);
            if ($isFound == true){
                if(isset($_COOKIE['count'])){
                    
                    $counter =  !isset($_SESSION['login']) ? $_COOKIE['count'] + 1 : $_COOKIE['count'];
                    setcookie("count", $counter);
                }else{
                    $counter = 1;
                    setcookie('count', $counter, time() + 3600*24*7, "/");
                }
                $_SESSION['login'] = true;
                ?>
                <form action="./clearSession.php">
                    <h1>學生成績查詢系統</h1>
                    <label for='std'>學號</label>
                    <input type="text" name="std" value="<?php echo $_SESSION['std'] ?>"/>
                    <label for='counter'>登入次數</label>
                    <input type="text" name="counter" value="<?php echo $counter ?>"/>
                    <label for='ch'>國文</label>
                    <input type="text" name="ch" value="<?php echo $_SESSION['ch'] ?>"/>
                    <label for='eng'>英文</label>
                    <input type="text" name="eng" value="<?php echo $_SESSION['en'] ?>"/>
                    <label for='math'>數學</label>
                    <input type="text" name="math" value="<?php echo $_SESSION['math'] ?>"/>
                    <label for='avg'>平均</label>
                    <input type="text" name="avg" value="<?php echo $_SESSION['avg'] ?>"/>
                    <button type="submit">回登入畫面</button>
                </form>
                <?php 
            }else{
                $_SESSION['loginFailStd'] = $_POST['std'];
                ?>
                <form action="./clearSession.php">
                    <h1>學生成績查詢系統</h1>
                    <label for='std'>學號</label>
                    <input type="text" name="std" value="<?php echo $_SESSION['loginFailStd'] ?>"/>
                    <h2>！登入失敗！</h2>
                    <button type="submit">回登入畫面</button>
                </form>
                <?php 
                
            }
        }else{
            ?>
            <form method='post'>
                <h1>學生成績查詢系統</h1>
                <label for='std'>學號</label>
                <input type="text" name="std"/>
                <label for='psw'>密碼</label>
                <input type="password" name="psw"/>
                <button type='submit'>登入</button>
                <button type='reset'>清除</button>
            </form>
            <?php 
        }

    ?>

</body>
</html>