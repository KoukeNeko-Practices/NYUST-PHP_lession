<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>第五週-方法及陣列</title>
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC&display=swap" rel="stylesheet">
</head>
<style>
    * {
        margin: 0;
        padding: 0;
    }

    body {
        justify-content: content;
        align-items: center;
        height: 100vh;
        display: flex;
        background-color: #2d4654;
        font-family: 'Noto Sans TC', sans-serif;
        color: #fff;
    }

    .container {
        width: 600px;
        margin: 0 auto;
        padding: 20px;
        border-radius: 5px;
        gap: 10px;
        display: grid;
        background-color: #243b4a;
        box-shadow: #243b4a 0px 0px 50px;

    }

    .scarch {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    form {
        display: flex;
        flex-direction: row;
        gap: 10px;
    }

    .result{
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    form input[type="text"] {
        padding: 5px;
        border: none;
        border-radius: 10px;
        height: 20px;
        background-color: #4e4d5c;
        color: #fff;
        width: 100%;

    }

    form input[type="submit"] {
        background-color: #805e73;
        border: none;
        color: #fff;
        font-weight: bold;
        cursor: pointer;
        padding: 6px 20px;
        height: auto;
        border-radius: 10px;
    }

    form input[type="submit"]:hover {
        background-color: #4e4d5c;
    }
</style>

<body>
    <div class="container">
        <?php
            // declare a 2d array with 4 rows and 4 columns
            $array = array(
                    array("王一", 90, 100, 80),
                    array("張二", 82, 85, 90),
                    array("Ray", 80, 65, 90),
                    array("KiKi", 60, 85, 80)
            );

            // declear a function to search the student's name
            function search($name)
            {
                global $array;
                // loop through the array
                for ($i = 0; $i < count($array); $i++) {
                    // if the name is found
                    if ($array[$i][0] == $name) {
                        // return each scores
                        return $array[$i][1] . "," . $array[$i][2] . "," . $array[$i][3];
                    }
                }
                // if the name is not found, return -1
                return -1;
            }
        ?>

        <!-- search bar for searching scores -->
        <div class="scarch">
            <form method="GET">
                <input type="text" name="name" placeholder="請輸入學生姓名">
                <input type="submit" name="submit" value="查詢">
            </form>
            <dev class="result">
                <?php
                    // if the form is submitted
                    if (isset($_GET["submit"]) && $_GET["name"] != "") {
                        // get the name from the form
                        $name = $_GET["name"];
                        // call the function
                        $score = search($name);
                        // if the name is found
                        if ($score != -1) {
                            // display the each scores
                            $score_str = explode(",", $score);
                            echo "<p>姓名：" . $name . "</p>";
                            echo "<p>國文：" . $score_str[0] . "</p>";
                            echo "<p>英文：" . $score_str[1] . "</p>";
                            echo "<p>數學：" . $score_str[2] . "</p>";
                            echo "<p>總分：" . ($score_str[0] + $score_str[1] + $score_str[2]) . "</p>";
                            echo "<p>平均：" . round(($score_str[0] + $score_str[1] + $score_str[2]) / 3, 2) . "</p>";     
                        }
                        else {
                            // display the error message
                            echo "<p> 姓名：$name <br> ！學生不存在！</p>";
                        }
                    }else{
                        echo "<p>請輸入學生姓名</p>";
                    }
                ?>
            </dev>
        </div>
    </div>
</body>

</html>
