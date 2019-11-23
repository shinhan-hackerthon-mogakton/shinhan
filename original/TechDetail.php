<?php
    header('Content-Type: text/html; charset=utf-8');
    
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

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>신한금융투자</title>
    <link type="text/css" rel="stylesheet" href="css/common.css">
    <link type="text/css" rel="stylesheet" href="css/notosans.css">
    <script type="text/javascript" src='http://code.jquery.com/jquery-3.1.1.min.js'></script>
    <script type="text/javascript" src="js/common.js"></script>
    <style>
        .s_button {
          background-color: #223148;
          border: none;
          color: white;
          padding: 15px 32px;
          text-align: center;
          text-decoration: none;
          display: inline-block;
          font-size: 16px;
          margin: 4px 2px;
          cursor: pointer;
        }
    </style>
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
            
            <div class="article02">
            	<h1 class="title"><?php echo $skill_name?></h1>
            	<span class="tit_bar"></span>
            	
            	<ul>
            			<div>
            				안녕하세요
                            <table>
                            	<tr>
                            		<td><?php echo $company_name?></td>
                            		<td><?php echo $skilltype_name?></td>
                            		<td><?php echo $keyword?></td>
                            		<td><?php echo $skill_detail?></td>
                            		<td><?php echo $dev_state?></td>
                            		<td><?php echo $apply_field?></td>
                            		<td><?php echo $developer_company?></td>
                            		<td><?php echo $developer_phone?></td>
                            		<td><?php echo $patent_number?></td>
                            		<td><?php echo $invent_name?></td>
                            		<td><?php echo $research_name?></td>
                            		<td><?php echo $institution_name?></td>
                            		<td><?php echo $skill_lifetime?></td>
                            		<td><?php echo $$location?></td>
                            	</tr>
                            </table>
            			</div>
            	</ul>

			<center>
	        	<a href="http://45.32.33.83/Consulting1.php" class="s_button">기술거래 컨설팅 신청</a>
	        </center>
        </div>
        <div id="footer">
        	COPYRIGHT ⓒ 신한금융투자 ALL RIGHT RESERVED.
        </div>
    </div>
</body>
</html>