<?php
header('Content-Type: text/html; charset=utf-8');

include('dbcon.php');

$sql = "SELECT * FROM stockmarket_news WHERE news_id=1;";

try {
    $result = $conn->query($sql);
} catch(PDOException $e) {
    die('Database error: '. $e->getMessage());
    
}

if ($result->num_rows > 0) {
    // output data of each row
    $row = $result->fetch_assoc();
    
    $article_id=$row["news_id"];
    $article_title=$row["news_titl"];
    $article_data=$row["news_data"];
    $article_date=$row["news_date"];

} else {
    echo "0 results";
}

$sql2 = "SELECT * FROM keyword_news ;";
try{
    $result=$conn->query($sql2);
}catch(PDOException $e){
    die('Database error: '. $e->getMessage());

}
if ($result->num_rows > 0) {
    // output data of each row

    while($row = $result->fetch_assoc()){
        $keyword[]=$row['$keyword'];
        $keyword_title[] = $row['title'];
        $id[] = $row['id'];
        $skill_detail[]=$row['skill_deatil'];
        $publisher[]=$row['publisher'];
        $regDate[]=$row['regDate'];


    }



} else {
    echo "0 results";
}




$conn->close();

?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>신한금융투자</title>
    <link type="text/css" rel="stylesheet" href="css/common.css">
    <link type="text/css" rel="stylesheet" href="css/notosans.css">
    <script type="text/javascript" src='http://code.jquery.com/jquery-3.1.1.min.js'></script>
    <script type="text/javascript" src="js/common.js"></script>
</head>
<body>
	<div id="wrap">
		<div id="header">
			<ul class="gnb">
				<li><a href=""><img src="images/top_logo.png" alt="로고"></a></li>
                <li><a href="#"><img src="images/menuBtn.png" alt="메뉴버튼"></a></li>
            </ul>
        </div>
        <div class="main_contents">
			<div class="banner">
				<img src="images/main_banner.jpg" alt="메인배너">
            </div>
            <div class="article01">
				<ul class="main_news">
					<li>
						<div class="newsCon">
							<h3>Toppick 기업명: <?php echo $keyword;?>기업:신젠타코리아 </h3>
							<p>
                                <?php echo $keyword_title[0].$keyword_title[1].$keyword_title[2]; ?>
                            </p>
                            <span><?php echo $publisher[0]; ?>   |   <?php echo $regDate[0];?></span>
                        </div>
                        <div class="newsImg">
                        	<img src="./img/news/egg.jpg">
                        </div>
                    </li>
                    <li>
                    	<div class="newsImg">
                            <img src="./img/news/dowon.jpg">
                        </div>
                    	<div class="newsCon">
                            <a href="http://45.32.33.83/skillDetail.php">

                                <h3><?php echo $article_title;?></h3></a>
                            <p>
                                <?php echo $article_data;?>
                            </p>
                            <span>한국경제   |    <?php echo $article_date; ?></span>
                        </div>                        
                    </li>
                </ul>
            </div>
            <div class="article02">
            	<h1 class="title">등록기술</h1>
                <span class="tit_bar"></span>
                <p class="sub_tit">NTB에 등록된 기술 목록을 확인할 수 있습니다. </p>
            	<ul class="news_list">
                	<li>
                    	<div class="thumbnail">
                    		<a href=""><img src="https://www.ntb.kr/img/upload/ntb/TechInfo/TechAttach/239114/[20191122111210555]ed896c3365494b6a81d3586732183e24.jpg"></a>
                        </div>
                        <div class="item_txt">
                        	<b>[화학공정]</b>                     	
                    		<p><a href="">리튬 공기 전지, 및 그 제조 방법</a></p>
                            <span>한양대학교 산학협력단</span>
                            <span class="date">2019-11-22</span>
                        </div>
                        <a href="" class="button">MORE +</a>
                    </li>
                    <li>
                    	<div class="thumbnail">
                    		<a href=""><img src="https://www.ntb.kr/img/upload/ntb/TechInfo/TechAttach/239114/[20191122111210555]ed896c3365494b6a81d3586732183e24.jpg"></a>
                        </div>
                        <div class="item_txt">
                        	<b>[화학공정]</b>                     	
                    		<p><a href="">리튬 공기 전지, 및 그 제조 방법</a></p>
                            <span>한양대학교 산학협력단</span>
                            <span class="date">2019-11-22</span>
                        </div>
                        <a href="" class="button">MORE +</a>
                    </li>
                    <li>
                    	<div class="thumbnail">
                    		<a href=""><img src="https://www.ntb.kr/img/upload/ntb/TechInfo/TechAttach/239114/[20191122111210555]ed896c3365494b6a81d3586732183e24.jpg"></a>
                        </div>
                        <div class="item_txt">
                        	<b>[화학공정]</b>                     	
                    		<p><a href="">리튬 공기 전지, 및 그 제조 방법</a></p>
                            <span>한양대학교 산학협력단</span>
                            <span class="date">2019-11-22</span>
                        </div>
                        <a href="" class="button">MORE +</a>
                    </li>
                </ul>
            </div>
        </div>
        <div id="footer">
        	COPYRIGHT ⓒ 신한금융투자 ALL RIGHT RESERVED.
        </div>
    </div>
</body>
</html>
