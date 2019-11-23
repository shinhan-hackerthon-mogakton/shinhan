<?php

    header('Content-Type: text/html; charset=utf-8');
    include('dbcon.php');
    $sql = "
    SELECT * FROM stockmarket_news WHERE news_id=1;
    ";
    try{
        $result=$conn->query($sql);
    }catch(PDOException $e){
        die('Database error: '. $e->getMessage());

    }
    if ($result->num_rows > 0) {
        // output data of each row
        $row = $result->fetch_assoc();
        $article_id=$row["news_id"];
        $article_title=$row["news_titl"];
        $article_data=$row["news_data"];

    } else {
        echo "0 results";
    }


    $conn->close();


?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">    <title>Document</title>
</head>
<body>
<div style="width:auto; height:auto;"  class="col-md-6">
    <div  class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div style="float:left; width:30%;"  class="col-auto d-none d-lg-block">
            <img width="300px" height="200px" src="./img/news/<?php echo $article_id . ".jpg";?>" alt="">
        </div>
        <div  style="float:left; width:50%; margin:30px; " class="col p-4 d-flex flex-column position-static">
            <h3 class="mb-0"><?php echo $article_title?></h3>

            <p class="mb-auto"><?php echo $article_data?></p>
        </div>

    </div>
</div>
</body>
</html>