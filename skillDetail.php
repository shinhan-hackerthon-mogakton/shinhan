<?php

header('Content-Type: text/html; charset=utf-8');
session_start();
include('dbcon.php');
$sql = "
    SELECT * FROM techtrade where company_code='KR2003108141';"
;
try{
    $result=$conn->query($sql);
}catch(PDOException $e){
    die('Database error: '. $e->getMessage());

}
if ($result->num_rows > 0) {
    // output data of each row

    while($row = $result->fetch_assoc()){
        $skill_id[]=$row['skill_code'];
        $skill_type_name[] = $row['skilltype_name'];
        $company_name[] = $row['company_name'];

        $skill_name[] = $row['skill_name'];
        $reg_date[] = $row['register_date'];

        $id[] = $row['id'];
        $skill_detail[]=$row['skill_deatil'];


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
    	<div class="login_wrap">
        	<div class="loginBox">
            	<h1 class="loginTitle">LOGIN</h1>
                <span class="login_bar"></span>
                <form name="login" class="login_form">
                	<input type="text" class="input" placeholder="아이디를 입력하세요.">
                    <input type="password" class="input" placeholder="비밀번호를 입력하세요.">                    
                    <span><input type="checkbox" class="checkbox">&nbsp;자동로그인</span>
                    <span style="text-align:right;"><a href="">아이디찾기</a> / <a href="">비밀번호찾기</a></span>
                    <input type="button" value="로그인" class="login_button">
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
        <div class="contents">
        	<div class="banner">
            	<img src="images/sub_banner01.jpg" alt="메인배너">
            </div>
            <div class="article01 companyInfo">
            	<span class="coName"><?php echo $company_name[0]; ?></span>
                <p class="coInfo">
                    도원닷컴(주)는 종합 정보 서비스를 지향합니다.
                    <br>정보의 창출에서 정보의 유통 그리고 정보의 관리까지 최적의 사용자 환경을 구현하기 위해 정보제공, 정보시스템개발, 정보관리 등 정보사업을 위한 종합적인 서비스의 제공과 더불어 정보서비스의 해답을 드립니다.
                    <br><br>현재 이기업의 자산규모는 세계 최고 수준이며,
                    <br>대표인 최수혁은 세계에서 가장 재산이 많기로 알려져있다.
                </p>
            </div>
            
            <div class="article02">
            	<h1 class="title">등록기술</h1>
                <span class="tit_bar"></span>
                <p class="sub_tit">NTB에 등록된 기술 목록을 확인할 수 있습니다. </p>
            	<ul class="techList">
                	<li>
                    	<div class="thumbnail">
                    		<a href="">
                                <img src="./img/skills/<?php echo $id[0] . ".jpg";?>" alt="">
                            </a>
                        </div>
                        <a href="http://45.32.33.83/TechDetail.php"><div class="item_txt">
                        	<b>[<?php echo $skill_type_name[0]; ?>]</b>
                    		<p><?php echo $skill_name[0]; ?></p>
                            <span><?php echo $company_name[0]; ?></span>
                            <span class="date"><?php echo $reg_date[0]; ?></span>
                        </div></a>
                        <a href="http://45.32.33.83/skillDetail.php" class="button">MORE +</a>
                    </li>
                    <li>
                    	<div class="thumbnail">
                    		<a href="">

                                <img src="./img/skills/<?php echo $id[3] . ".jpg";?>" alt="">
                            </a>
                                 </div>
                        <a href="http://45.32.33.83/TechDetail.php"><div class="item_txt">
                            <b>[<?php echo $skill_type_name[1]; ?>]</b>
                            <p><a href=""><?php echo $skill_name[1]; ?></a></p>
                            <span><?php echo $company_name[1]; ?></span>
                            <span class="date"><?php echo $reg_date[1]; ?></span>
                            </div></a>
                        <a href="http://45.32.33.83/skillDetail.php" class="button">MORE +</a>
                    </li>
                    <li>
                    	<div class="thumbnail">
                            <a href="">

                                <img src="./img/skills/<?php echo $id[2] . ".jpg";?>" alt="">
                            </a>                        </div>
                        <a href="http://45.32.33.83/TechDetail.php"><div class="item_txt">
                            <b>[<?php echo $skill_type_name[2]; ?>]</b>
                            <p><a href=""><?php echo $skill_name[2]; ?></a></p>
                            <span><?php echo $company_name[2]; ?></span>
                            <span class="date"><?php echo $reg_date[2]; ?></span>
                            </div></a>
                        <a href="http://45.32.33.83/skillDetail.php" class="button">MORE +</a>
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
