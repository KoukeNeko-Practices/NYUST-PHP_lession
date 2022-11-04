<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>第七週-Session</title>
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC&display=swap" rel="stylesheet">
    <!-- load custom.css -->
    <link rel="stylesheet" href="custom.css?<?=time();?>">
</head>
<body>
    <div class="container">
        <?php
        //save the accounts with name, student ID and password in an 2d array
        $accounts = array(
            array("name" => "黃一", "studentID" => "9923701", "password" => "1073299"),
            array("name" => "吳二", "studentID" => "9923702", "password" => "2073299"),
        );

        // if the user is not logged in
        if (!isset($_SESSION['login'])){

            if (isset($_POST['studentID']) && isset($_POST['password'])){
                // if user is try to login
                // check if the student ID and password is correct
                foreach ($accounts as $account){
                    if ($account['studentID'] == $_POST['studentID'] && $account['password'] == $_POST['password'] && $_POST['name'] == $account['name']){
                        // if the student ID and password is correct, set the session
                        $_SESSION['login'] = true;
                        $_SESSION['studentID'] = $account['studentID'];
                        $_SESSION['name'] = $account['name'];
                        
                        // refresh the page
                        // unset session "failed"
                        unset($_SESSION['failed']);

                        header("Location: 007.php");
                        exit();
                        echo "登入成功";
                    }
                }
                // if the student ID and password is not correct, show the error message
                $_SESSION['Failed'] = true;
                $_SESSION['studentID'] = $_POST['studentID'];
                $_SESSION['name'] = $_POST['name'];
                // refresh the page
                header("Location: 007.php");
                exit();
                echo "登入失敗";
            

            }
            // if user not login , redirect to login page
            if (@$_SESSION['Failed'] != true){
                ?>
                <form method="post" action="/007.php" class="form">
                    <!-- 學號 -->
                    <label for="studentID">學號</label>
                    <input type="text" id="studentID" name="studentID" placeholder="請輸入學號" required>
                    <!-- 姓名 -->
                    <label for="name">姓名</label>
                    <input type="text" id="name" name="name" placeholder="請輸入姓名" required>
                    <!-- 密碼 -->
                    <label for="password">密碼</label>
                    <input type="password" id="password" name="password" placeholder="請輸入密碼" required>
                    <!-- 登入 -->
                    <input type="submit" value="登入">
                    <!-- 重設 -->
                    <input type="reset" value="重設">
                </form>
            <?php
            }
            

        }
        
        if(isset($_POST['logout'])){

            echo "登出成功";

            session_destroy();
            header("Location: 007.php");
            exit();
        
        }
        
        if (@$_SESSION['Failed'] && @$_SESSION['login'] == false){
            // if the user is not logged in and the login is failed, show the error message
                // print_r($_SESSION);
            ?>
                <h2>登入失敗</h2>
                <p>學號:<?php echo $_SESSION['studentID'] ?></p>
                <p>姓名:<?php echo $_SESSION['name'] ?></p><br/>
                <br/>
                <!-- logout button -->
                <form method="post" action="/007.php" class="form">
                    <input type="submit" name="logout" value="回系統登入畫面">
                </form>
                
            <?php
        

        }else if (isset($_SESSION['login'] )){
            // if user is logged in, show the content
            ?>
                <h2>登入成功</h2>
                <p>學號:<?php echo $_SESSION['studentID'] ?></p>
                <p>姓名:<?php echo $_SESSION['name'] ?></p><br/>
                <p>！系統登入成功！</p>
                <!-- logout button -->
                <form method="post" action="/007.php" class="form">
                    <input type="submit" name="logout" value="回系統登入畫面">
                </form>
            <?php
        
        }
        ?>
    </div>
</body>
