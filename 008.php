<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>第八週-檔案讀寫</title>
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC&display=swap" rel="stylesheet">
    <!-- load custom.css -->
    <link rel="stylesheet" href="custom.css?<?=time();?>">
</head>
<body>
    <?php 

        function remove_utf8_bom($text)
        {
            $bom = pack('H*','EFBBBF');
            $text = preg_replace("/^$bom/", '', $text);
            return $text;
        }

        try {
            // $file = fopen("./p6_input.dat", "r") or die("Unable to open file!");
            $file_output = fopen("./p6_output.dat", "w") or die("Unable to open file!");
            $data = file("./p6_input.dat"); // read file into array
            // print_r($data);
        } catch (\Throwable $th) {
            
        }
    ?>
    <div class="container">
        <?php
            // $save = array();
            foreach ($data as $key => $value) {
                // $value = preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $value);

                fprintf($file_output, "%s %s", $key, remove_utf8_bom($value));
            }
            print_r($save);
            
        ?>
    </div>
</div>
<?php
    fclose($file_output);
?>
