<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>第四週-簡單流程</title>
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

    section {
        display: flex;
        flex-direction: row;
        gap: 10px;
    }

    .number {
        background-color: #4e4d5c;
        height: auto;
        border-radius: 10px;
        padding: 10px;
        color: #fff;
        display: flex;
        padding: auto 0;
    }

    .container {
        width: 500px;
        margin: 0 auto;
        padding: 20px;
        border-radius: 5px;
        gap: 10px;
        display: grid;
        background-color: #243b4a;
        box-shadow: #243b4a 0px 0px 50px;
    }

    .question {
        display: flex;
        gap: 10px;
        flex-direction: column;;
    }

    .question--titlebar{
        display: flex;
        flex-direction: row;
        align-items: center;
        gap: 10px;
    }

    .question--titlebar > h2 {
        font-weight: bold;
        font-size: 20px;
        background-color: #87bcde;
        padding: 0px 10px;
        height: 100%;
        border-radius: 10px;
    }

    .question--title {
        font-size: 20px;
        font-weight: bold;
        margin-bottom: 10px;
        color: #fff;
        display: flex;
    }

    .answer--bar {
        display: flex;
        flex-direction: row;
        align-items: center;
        gap: 10px;
    }

    .answer--bar > h2 {
        font-weight: bold;
        font-size: 20px;
        background-color: #87bcde;
        padding: 0px 11px;
        height: 100%;
        border-radius: 10px;
    }
    
</style>

<body>
    <div class="container">
        <section>
            <div class="number">
                1
            </div>
            <div class="question">
                <div class="question--titlebar">
                    <h2>Q</h2>
                    <span class="question--title">計算 250 個蛋是多少打又幾個?</span>
                </div>
                <div class="answer--bar">
                    <h2>A</h2>
                    <div class="answer">
                        <?php echo "250 個蛋 = " .(int)(250 / 12) . " 打又 " . 250 % 12 . " 個"; ?>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="number">
                2
            </div>
            <div class="question">
                <div class="question--titlebar">
                    <h2>Q</h2>
                    <span class="question--title">依身高檢查需付門票， 120 公分以下免費、 121~151 公分半價及 151 公分以上全票。</span>
                </div>
                <div class="answer--bar">
                    <h2>A</h2>
                    <div class="answer">
                        <?php
                        $height = [90, 140, 170];
                        foreach ($height as $value) {
                            switch ($value) {
                                case $value < 121:
                                    echo $value . " 公分 -- 免費<br>";
                                    break;
                                case $value > 151:
                                    echo $value . " 公分 -- 全票<br>";
                                    break;
                                default:
                                    echo $value . " 公分 -- 半票<br>";
                                    break;
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="number">
                3
            </div>
            <div class="question">
                <div class="question--titlebar">
                    <h2>Q</h2>
                    <span class="question--title">計算金額 10000 元 5 年複利 3% 的本利和。</span>
                </div>
                <div class="answer--bar">
                    <h2>A</h2>
                    <div class="answer">
                        <?php  echo "10000元 年複利 3% 5年 的本利和為 ". 10000 * pow(1 + 0.03, 5) ." 元" ?>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>
