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
                            <h3>DB금융투자, ISA 기존고객 대상 DLBELB 판매</h3>
                            <p>
                                DB금융투자는 신규고객과 DB금융투자 개인종합자산관리 계좌(ISA)에
                                가입중인 기존고객을 대상으로 기타파생결합사채(DLB) '마이 퍼스트 
                                DB DLB 제33회'와 주가연계파생 결합사채(ELB) 'DB 세이프 제509회 
                                ELB'를...
                            </p>
                            <span>한국경제   |   2019.09.09</span>
                        </div>
                        <div class="newsImg">
                        	<img src="http://img.newspim.com/news/2019/11/22/1911221501104760.jpg">
                        </div>
                    </li>
                    <li>
                    	<div class="newsImg">
                            <img width="300px" height="200px" src="./img/news/<?php echo $article_id . ".jpg";?>" alt="">
                        </div>
                    	<div class="newsCon">
                            <h3><?php echo $article_title?></h3>
                            <p>
                                <?php echo $article_data?>
                            </p>
                            <span>한국경제   |   2019.09.09</span>
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
