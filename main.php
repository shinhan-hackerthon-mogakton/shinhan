<?php
header('Content-Type: text/html; charset=utf-8');
session_start();
include('dbcon.php');

$sql = "SELECT * FROM stockmarket_news";

try {
    $result = $conn->query($sql);
} catch(PDOException $e) {
    die('Database error: '. $e->getMessage());

}

if ($result->num_rows > 0) {
    // output data of each row


    while($row = $result->fetch_assoc()) {
        $article_id[] = $row["news_id"];
        $article_title[] = $row["news_titl"];
        $article_data[] = $row["news_data"];
        $article_date[] = $row["news_date"];
    }
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
<script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>
<script>

    $(document).ready(function () {
            $("#login_button").click(function() {
                $.ajax({
                    type: "POST",
                    url: "login.php",
                    data: {
                        username: $("#username").val(),
                        password: $("#password").val()
                    },
                    success: function (data) {
                        alert(data);
                    },
                    error: function () {
                        alert("An error has occured. Please contact support.");
                    }
                });
            })
        });
</script>

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
    	<div class="login_wrap">
        	<div class="loginBox">
            	<h1 class="loginTitle">LOGIN</h1>
                <span class="login_bar"></span>
                <form name="login" class="login_form">
                	<input type="text" name="username" id="username" class="input" placeholder="아이디를 입력하세요.">
                    <input type="password" name="password" id="password" class="input" placeholder="비밀번호를 입력하세요.">
                    <span><input type="checkbox" class="checkbox">&nbsp;자동로그인</span>
                    <span style="text-align:right;"><a href="">아이디찾기</a> / <a href="">비밀번호찾기</a></span>
                    <input type="button" value="로그인" id="login_button" class="login_button">
                </form>
                <a href="#" class="close">x</a>
            </div>
        </div>
    	<div id="header">
        	<div class="navi">
                <ul class="gnb">
                    <li><a href="./main.php"><img src="images/top_logo.png" alt="로고"></a></li>
                    <li><?php if ($_SESSION['loggedin']) { ?><a href="" class="alarm"><img src="images/alarmIcon.png"><span class="cnt">1</span></a>
                        <a href="" class="myp"><img src="images/myicon.png"></a> <?php } ?>
                        <a href="#" class="menuBtn"><img src="images/menuBtn.png" alt="메뉴버튼"></a></li>
                </ul>
                <ul class="subNavi">
                	<?php if ($_SESSION['loggedin']) { ?>
                    <li><a href="./logout.php">로그아웃</a></li>
                    <li><a href="#">회원정보변경</a></li>                    
                     <?php }else{ ?>
                    <li><a href="#" class="loginBtn">로그인</a></li>
                    <li><a href="#">회원가입</a></li>
                     <?php } ?>
                    <li><a href="http://45.32.33.83/myCeonsult.php">기술컨설팅내역</a></li>
                    <li><a target="_blank" href="http://198.13.44.245:3000/explorer/">블록체인 전체장부</a></li>
                </ul>
            </div>
        </div>
        <div class="main_contents">
        	<div class="banner">
                <img src="images/main_banner.jpg" alt="메인배너">
            </div>
            <div class="article01">
            	<ul class="main_news">
                	<li>
                        <a href="http://45.32.33.83/skillDetail.php"><div class="newsCon">
                            <h3><?php echo $article_title[0];?></h3></h3>
                            <p>
                                <?php echo $article_data[0];?>
                            </p>
                            <span>한국경제   |    <?php echo $article_date[0]; ?></span>
                        </div>
                        </a>
                        <div class="newsImg">
                            <img src="./img/news/dowon.jpg">
                        </div>
                    </li>
                    <li>
                    	<div class="newsImg">
                            <img src="./img/news/egg.jpg">

                        </div>
                    	<div class="newsCon">
                            <a href="http://45.32.33.83/skillDetail.php"><h3>Toppick 기업명: 살충제기업(신젠타코리아) </h3></a>
                            <p>
                                <?php echo $keyword_title[0].$keyword_title[1].$keyword_title[2]; ?>
                            </p>
                            <span><?php echo $publisher[0]; ?>   |   <?php echo $regDate[0];?></span>
                        </div>                        
                    </li>
                </ul>
                <ul class="main_news2">
                	<li>
                    	<div class="newsCon2">
                            <h3><?php echo $article_title[20];?></h3>
                            <p>
                                <?php echo $article_data[20];?>
                            </p>
                            <span>한국경제   |    <?php echo $article_date[20]; ?></span>
                        </div>


                        <div class="newsImg2">
                            <img src="./img/news/23.jpg">
                        </div>
                    </li>
                </ul>
            </div>
            
            <div class="article02">
            	<ul class="coList">
                	<li>
                    	<div class="boxTitle">
                        	<span class="boxName">거래량상위</span>
                            <span class="more"><a href="">MORE +</a></span>
                        </div>
                        <ul class="company">
                        	<li>
                                <span class="name"><a href="http://45.32.33.83/skillDetail.php">도원닷컴</a></span>
                                <span class="price"><a href="">6,720</a></span>
                                <span class="percent"><a href="">100%</a></span>
                            </li>
                            <li>
                                <span class="name"><a href="">이아이디</a></span>
                                <span class="price"><a href="">247</a></span>
                                <span class="percent"><a href="">20%</a></span>
                            </li>
                            <li>
                                <span class="name"><a href="">한류AJ센터</a></span>
                                <span class="price"><a href="">1,690</a></span>
                                <span class="percent"><a href="">10%</a></span>
                            </li>
                            <li>
                                <span class="name"><a href="">SK바이오</a></span>
                                <span class="price"><a href="">19,850</a></span>
                                <span class="percent"><a href="">5%</a></span>
                            </li>
                        </ul>
                    </li>
					<li>
                    	<div class="boxTitle">
                        	<span class="boxName">주가상승률상위</span>
                            <span class="more"><a href="">MORE +</a></span>
                        </div>
                        <ul class="company">
                        	<li>
                                <span class="name"><a href="">스카이문스</a></span>
                                <span class="price"><a href="">999</a></span>
                                <span class="percent"><a href="">100%</a></span>
                            </li>
                            <li>
                                <span class="name"><a href="">SK바이오</a></span>
                                <span class="price"><a href="">19,850</a></span>
                                <span class="percent"><a href="">20%</a></span>
                            </li>
                            <li>
                                <span class="name"><a href="">화신테크</a></span>
                                <span class="price"><a href="">1,880</a></span>
                                <span class="percent"><a href="">10%</a></span>
                            </li>
                            <li>
                                <span class="name"><a href="">국일제지</a></span>
                                <span class="price"><a href="">6,720</a></span>
                                <span class="percent"><a href="">5%</a></span>
                            </li>
                        </ul>
                    </li>
                    <li>
                    	<div class="boxTitle">
                        	<span class="boxName">외국인 연속매수</span>
                            <span class="more"><a href="">MORE +</a></span>
                        </div>
                        <ul class="company">
                        	<li>
                                <span class="name"><a href="">신라에스지</a></span>
                                <span class="price"><a href="">9,699</a></span>
                                <span class="percent"><a href="">100%</a></span>
                            </li>
                            <li>
                                <span class="name"><a href="">한일네트웍스</a></span>
                                <span class="price"><a href="">4,430</a></span>
                                <span class="percent"><a href="">20%</a></span>
                            </li>
                            <li>
                                <span class="name"><a href="">만도</a></span>
                                <span class="price"><a href="">34,600</a></span>
                                <span class="percent"><a href="">10%</a></span>
                            </li>
                            <li>
                                <span class="name"><a href="">화신테크</a></span>
                                <span class="price"><a href="">1,890</a></span>
                                <span class="percent"><a href="">5%</a></span>
                            </li>
                        </ul>
                    </li>
                    <li>
                    	<div class="boxTitle">
                        	<span class="boxName">실시간 인기종목</span>
                            <span class="more"><a href="">MORE +</a></span>
                        </div>
                        <ul class="company">
                        	<li>
                                <span class="name"><a href="">디에스케이</a></span>
                                <span class="price"><a href="">9,999</a></span>
                                <span class="percent"><a href="">100%</a></span>
                            </li>
                            <li>
                                <span class="name"><a href="">SK바이오</a></span>
                                <span class="price"><a href="">19,850</a></span>
                                <span class="percent"><a href="">20%</a></span>
                            </li>
                            <li>
                                <span class="name"><a href="">국일제지</a></span>
                                <span class="price"><a href="">6,720</a></span>
                                <span class="percent"><a href="">10%</a></span>
                            </li>
                            <li>
                                <span class="name"><a href="">이아이디</a></span>
                                <span class="price"><a href="">247</a></span>
                                <span class="percent"><a href="">5%</a></span>
                            </li>
                        </ul>
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
