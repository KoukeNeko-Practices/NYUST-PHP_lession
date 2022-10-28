<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>第三週-表單設計</title>
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC&display=swap" rel="stylesheet">
</head>
<style>
    * {
        margin: 0;
        padding: 0;
    }

    *:focus {
        outline: none;
    }

    body {
        font-family: "微軟正黑體";
        justify-content: content;
        align-items: center;
        height: 100vh;
        display: flex;
        background-color: #2d4654;
        font-family: 'Noto Sans TC', sans-serif;
        color: #fff;
    }

    .form {
        width: 500px;
        margin: 0 auto;
        padding: 20px;
        /* border: 1px solid #ccc; */
        border-radius: 5px;
        gap: 10px;
        display: grid;
        background-color: #243b4a;
        box-shadow: #243b4a 0px 0px 50px;
    }

    .title {
        font-weight: bold;
        font-size: 20px;
    }

    .form input {
        padding: 5px;
        border: none;
        border-radius: 10px;
        height: 20px;
        background-color: #4e4d5c;
        color: #fff
    }

    /* 移除 input foucus 的外誆 */
    .form input:focus {
        outline: none;
    }

    /* hide radio click btn */
    .form input[type="radio"] {
        display: none;
    }

    /* custom radio text border */
    .form input[type="radio"]+label {
        display: inline-block;
        padding: 5px 10px;
        border: none;
        border-radius: 30px;
        margin-right: 10px;
        cursor: pointer;
        background-color: #4e4d5c;
    }

    /* custom radio text border when click */
    .form input[type="radio"]:checked+label {
        background: #87bcde;
    }

    /* hide check box btn */
    .form input[type="checkbox"] {
        display: none;
    }

    /* custom check box text border */
    .form input[type="checkbox"]+label {
        display: inline-block;
        padding: 5px 10px;
        border: none;
        background-color: #4e4d5c;
        margin-right: 10px;
        cursor: pointer;
    }

    /* custom check box text border when click */
    .form input[type="checkbox"]:checked+label {
        background: #87bcde;
    }

    .form select {
        -webkit-appearance: none;
        padding: 8px;
        border: none;
        border-radius: 10px;
        color: #fff;
        background-color: #4e4d5c;
    }

    .form selected:focus {
        outline: none;
    }

    .form textarea {
        padding: 5px;
        border: none;
        border-radius: 10px;
        background-color: #4e4d5c;
        padding: 10px 10px;
        color: #fff;
        resize: none;
        overflow-y: scroll;

    }

    /* 移除 textarea foucus 的外誆 */
    .form textarea:focus {
        outline: none;
    }

    .form input[type="submit"] {
        background-color: #805e73;
        border: none;
        color: #fff;
        font-weight: bold;
        cursor: pointer;
        padding: 10px 20px;
        height: auto;
    }

    .form input[type="submit"]:hover {
        background-color: #4e4d5c;
    }

    .form input[type="reset"] {
        background-color: #243b4a;
        border: none;
        color: #fff;
        font-weight: bold;
        cursor: pointer;
        padding: 10px 20px;
        height: auto;
    }

    .form input[type="reset"]:hover {
        background-color: #4e4d5c;
    }

    .bar {
        display: flex;
        flex-direction: row;
        gap: 5px;
    }
</style>

<body>
    <form class="form" method="post" action="006.php">
        <!-- 學號 -->
        <label for="studentID" class="title">學號</label>
        <input type="text" name="studentID" id="studentID" placeholder="請輸入學號">
        <!-- 姓名 -->
        <label for="name" class="title">姓名</label>
        <input type="text" name="name" id="name" placeholder="請輸入姓名">
        <!-- 性別 -->
        <p class="title">性別</p>
        <div class="bar">
            <input type="radio" id="male" name="gender" value="男">
            <label for="male">男</label><br>
            <input type="radio" id="female" name="gender" value="女">
            <label for="female">女</label><br>
            <input type="radio" id="other" name="gender" value="其他">
            <label for="other">其他</label><br>
        </div>
        <!-- 興趣 -->
        <p class="title">興趣</p>
        <div class="bar">
            <input type="checkbox" id="html" name="interest[]" value="寫程式">
            <label for="html">寫程式</label><br>
            <input type="checkbox" id="css" name="interest[]" value="上網">
            <label for="css">上網</label><br>
            <input type="checkbox" id="javascript" name="interest[]" value="逛街">
            <label for="javascript">逛街</label><br>
            <input type="checkbox" id="php" name="interest[]" value="運動">
            <label for="php">運動</label><br>
        </div>

        <!-- 專長 -->
        <label for="telent" class="title">專長</label>
        <select name="telent" id="telent">
            <option value="資訊技術" selected>資訊技術</option>
            <option value="資訊管理">資訊管理</option>
            <option value="體育項目">體育項目</option>
            <option value="金融市場">金融市場</option>
            <option value="農業科技">農業科技</option>
        </select>
        <!-- 建議 -->
        <label for="suggestion" class="title">建議</label>
        <textarea name="suggestion" id="suggestion" cols="30" rows="10" placeholder="給點建議吧"></textarea>
        <div class="bar">
            <!-- 送出 -->
            <input type="submit" name="submit" value="送出">
            <!-- 清除 -->
            <input type="reset" value="清除">
        </div>
    </form>
</body>

</html>
