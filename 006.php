<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>第六週-表單回饋</title>
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC&display=swap" rel="stylesheet">
    <!-- load custom.css -->
    <link rel="stylesheet" href="custom.css?<?=time();?>">
</head>

<body>
    <?php
    // if this page is called by POST method
    if (!(isset($_POST["studentID"]) &&  isset($_POST["name"]) && isset($_POST["gender"]) && isset($_POST["interest"]) && isset($_POST["telent"]))){
        // return to 002.php
        header("Location: 002.php");
    }
    
    ?>
    <div class="container">
        <div>
            <h2>表單輸入內容</h2>
            <span class="title">
                <?php echo "<p>學號: " . $_POST['studentID'] ?>
            </span>
            <span class="title">
                <?php echo "<p>姓名: " . $_POST['name'] ?>
            </span>
            <span class="title">
                <?php echo "<p>性別: " . $_POST['gender'] ?>
            </span></span>
            <!-- <span class="title"><?php echo "<p>興趣: " . $_POST['interest'] ?></span> -->
            <!-- if interest isset, show all the item in that array and remove the last "," -->
            <span class="title">
                <?php echo "<p>興趣: " . (isset($_POST['interest']) ? implode(", ", $_POST['interest']) : "") ?>
            </span>
            <span class="title">
                <?php echo "<p>專長: " . $_POST['telent'] ?>
            </span>
            <!-- if suggestion is set, show -->
            <?php if (isset($_POST['suggestion'])) ?>
            <span class="title">
                <?php echo "<p>建議:</br> " . nl2br( $_POST['suggestion']) ?>
            </span>
        </div>
        <div>
            <a href="002.php"><button class="button">回上一頁</button></a>
            <!-- <a href="/"><button class="button">回首頁</button></a> -->
        </div>
    </div>


</html>
