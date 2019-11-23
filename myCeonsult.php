<?php

header('Content-Type: text/html; charset=utf-8');
session_start();
include('dbcon.php');
$sql = "
    SELECT * FROM skill_apply where apply_id='0';"
;
try{
    $result=$conn->query($sql);
}catch(PDOException $e){
    die('Database error: '. $e->getMessage());

}
if ($result->num_rows > 0) {
    // output data of each row

    while($row = $result->fetch_assoc()){
        $apply_id[]=$row['apply_id'];
        $skill_title[] = $row['skill_title'];
        $skill_detail[]=$row['skill_deatil'];
        $require[]=$row['requirement'];

    }



} else {
    echo "0 results";
}


$sql = "
    SELECT * FROM contract_info "
;
try{
    $result=$conn->query($sql);
}catch(PDOException $e){
    die('Database error: '. $e->getMessage());

}
if ($result->num_rows > 0) {
    // output data of each row

    while($row = $result->fetch_assoc()){
        $contract_id[]=$row['contract_id'];
        $skill_name[] = $row['skill_name'];
        $contract_phonenum[]=$row['comp_phonenum'];
        $ceonsult_name[]=$row['ceonsult_name'];
        $ceonsultant_phonenum[]=$row['ceonsultant_phonenum'];
        $contract_state[]=$row['contract_state'];


    }



} else {
    echo "0 results";
}

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
            	<img src="images/sub_banner04.jpg" alt="메인배너">
            </div>
            <div class="myCon01">
            	<h1 class="myConTitle">대상기술</h1>
            	<ul class="news_list techList techList02">
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

                </ul>
            </div>
            <div class="myCon02">
            	<h1 class="myConTitle">대상기술</h1>
                <span class="sub_myConTitle">모든 거래 내역은 블록체인에 존재합니다.</span>
            	<table cellpadding="0" cellspacing="0" border="0;" class="myConsult">
                          <tr>
                              <th>이용자</th>
                              <th>기술명</th>
                              <th>기업 연락처</th>
                              <th>컨설턴트 지점</th>
                              <th>컨설턴트 연락처</th>
                              <th>상태</th>
                              <th>블록체인 거래확인</th>
                          </tr>
                          <tr>
                              <td><?php echo $contract_id[0]; ?></td>
                              <td><?php echo $skill_name[0]; ?></td>
                              <td><?php echo $contract_phonenum[0]; ?></td>
                              <td><?php echo $ceonsult_name[0]; ?></td>
                              <td><?php echo $ceonsultant_phonenum[0]; ?></td>
                              <td><?php echo $contract_state[0]; ?></td>
                              <td align="center" valign="middle"><a  target="_blank" href="http://198.13.44.245:3000/explorer/#!/System/System_getAllHistorianRecords" class="consultBtn">거래확인</a></td>
                          </tr>
                      </table>
            </div>
        </div>
        <div id="footer">
        	COPYRIGHT ⓒ 신한금융투자 ALL RIGHT RESERVED.
        </div>
    </div>
</body>
</html>
