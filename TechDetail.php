<?php
    header('Content-Type: text/html; charset=utf-8');
    session_start();
    include ('dbcon.php');
    
    $sql = "SELECT * FROM techtrade WHERE id=1;";
    
    try {
        $result = $conn->query($sql);
    } catch (PDOException $e) {
        die('Database error: ' . $e->getMessage());
    }
    
    if ($result->num_rows > 0) {
        // output data of each row
        $row = $result->fetch_assoc();
        
        $skill_code = $row["skill_code"]; // 기술코드
        $company_code = $row["company_code"]; // 기업코드
        $company_name = $row["company_name"]; // 기업명
        $skilltype_code = $row["skilltype_code"]; // 기술분야코드
        $skilltype_name = $row["skilltype_name"]; // 기술분야명
        $skill_name = $row["skill_name"]; // 기술명
        $register_date = $row["register_date"];
        $keyword = $row["keyword"]; // 키워드
        $skill_detail = $row["skill_detail"]; // 상세정보 > 개요 및 특징
        $dev_state = $row["dev_state"]; // 기술개발 상태
        $apply_field = $row["apply_field"]; // 응용 분야
        $developer_company = $row["developer_company"]; // 연구개발자 - 회사명
        $developer_phone = $row["developer_phone"]; // 연구개발자 - 전화번호
        $patent_number = $row["patent_number"]; //
        $invent_name = $row["invent_name"]; // 특허정보 - 특허명칭
        $research_name = $row["research_name"]; // 과제정보 - 주관연구기관명
        $institution_name = $row["institution_name"]; // 과제정보 - 전문기관명
        $skill_lifetime = $row["skill_lifetime"]; // 과제정보 - 기술수명주기
        $location = $row["location"]; // 과제정보 - 지역구분        
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
            	<img src="images/sub_banner02.jpg" alt="메인배너">
            </div>
            <div class="article01">
            	<h3 class="techTitle">[<?php echo $skill_name?>]</h3>
            	<table align="center" cellpadding="0" cellspacing="0" border="0;" class="techDetail">
                	<tr>
                    	<th>기업명</th>
                        <td colspan="5"><?php echo $company_name?></td>
                    </tr>
                    	<th>특허명칭</th>
                    	<td colspan="5"><?php echo $invent_name?></td>
                    <tr>
                    </tr>
                    <tr>
                    </tr>
                    <tr>
                        <th>기술분야</th>
                        <td><?php echo $skilltype_name?></td>
                    	<th>기술개발 상태</th>
                        <td><?php echo $dev_state?></td>
                    	<th>NTB기술코드</th>
                        <td ><?php echo $skill_code?></td>
                    </tr>
                        <th>응용분야</th>
                        <td><?php echo $apply_field?></td>
                    	<th>키워드</th>
                        <td colspan="3"><?php echo $keyword?></td>
                    </tr>
                    <tr>
                    	<th>전문기관명</th>
                    	<td><?php echo $institution_name?></td>
                    	<th>기술수명주기</th>
                    	<td><?php echo $skill_lifetime?></td>
                    	<th>지역구분</th>
                    	<td><?php echo $location?></td>
                    </tr>
                    <tr>
                    	<th>주관연구기관명</th>
                    	<td><?php echo $research_name?></td>
                    	<th>판매자 정보</th>
                        <td colspan="3">회사명 : <?php echo $developer_company?>&nbsp;&nbsp;|&nbsp;&nbsp;연락처 : <?php echo $developer_phone?></td>
                    </tr>
                    <tr>
                    	<th colspan="6" align="center">개요 및 특징</th>
                    </tr>
                </table>                
                <p class="techInfo"><?php echo $skill_detail?></p>
                <div style="text-align:center;"><a href="Consulting.php" class="techBtn">기술거래 컨설팅 신청 ></a></div>
            </div>
        </div>
        <div id="footer">
        	COPYRIGHT ⓒ 신한금융투자 ALL RIGHT RESERVED.
        </div>
    </div>
</body>
</html>
