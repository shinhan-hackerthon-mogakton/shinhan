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
            	<img src="images/sub_banner03.jpg" alt="메인배너">
            </div>
             <ul class="consultingBox">
             <li class="consultingBox">
            <form name="consultingForm">
            

                	<h3 class="consultingTitle">신청자 정보입력</h3>       	
                      <table cellpadding="0" cellspacing="0" border="0;" class="consultingForm">
                          <tr>
                              <th>신청자 성함</th>
                              <td><input type="text" class="input2"></td>                            
                              <th>연락처</th>
                              <td><input type="text" class="input2"></td>
                          </tr>
                          <tr>
                              <th>이메일</th>
                              <td><input type="text" class="input2"></td>                            
                              <th>회사 주소</th>
                              <td><input type="text" class="input2"></td>
                          </tr>
                          <tr>
                              <th>응용분야</th>
                              <td colspan="5"><input type="text" class="input2"></td>
                          </tr>
                          <tr>
                              <th>요구사항</th>
                              <td colspan="5"><input type="text" class="input2"></td>
                          </tr>

                      </table>

                      <h3 class="consultingTitle">신청기술확인</h3>
                    	<table cellpadding="0" cellspacing="0" border="0;" class="consultingForm">
                        <tr>
                            <th>기술명</th>
                            <td colspan="3"><?php echo $skill_name?></td>
                        </tr>
                        <tr>
                            <th>기술개발 상태</th>
                            <td><?php echo $dev_state?></td>                            
                            <th>응용분야</th>
                            <td><?php echo $apply_field?></td>
                        </tr>
                        <tr>
                            <th>NTB기술코드</th>
                            <td><?php echo $skill_code?></td>
                            <th>연구기관명</th>
                            <td><?php echo $research_name?></td>
                        </tr>
                        <tr>
                            <th>키워드</th>
                            <td colspan="3"><?php echo $keyword?></td>
                        </tr>
                        <tr>
                            <th>판매자정보</th>
                            <td colspan="3"><?php echo $developer_company?>&nbsp;&nbsp;|&nbsp;&nbsp;연락처 : <?php echo $developer_phone?></td>
                        </tr>
                    </table>
                
            </form>
				</li>
                <li>
                    <h1 class="consultingTitle">영업점 검색</h1>
                    <div id="map" style="width:410px;height:300px;"></div>

                    <script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=9e81c59c3545ebc90541d8a1ace136b0
"></script>
                    <script>

                        var mapContainer = document.getElementById('map'), // 지도를 표시할 div
                            mapOption = {
                                center: new kakao.maps.LatLng(37.752944411155, 128.896293031191), // 지도의 중심좌표
                                level: 3 // 지도의 확대 레벨
                            };

                        var map = new kakao.maps.Map(mapContainer, mapOption); // 지도를 생성합니다

                        function  marker(location) {

                            // 마커가 표시될 위치입니다
                            var markerPosition  = new kakao.maps.LatLng(37.752944411155, 128.896293031191);

                            // 마커를 생성합니다
                            var marker = new kakao.maps.Marker({
                                position: markerPosition
                            });

                            // 마커가 지도 위에 표시되도록 설정합니다
                            marker.setMap(map);

                            // 아래 코드는 지도 위의 마커를 제거하는 코드입니다
                            // marker.setMap(null);




//                             var iwContent = '<div>미아점<br><a id="locSelect" href="#" style="color:blue" target="_blank">영업점선택하기</a></div>', // 인포윈도우에 표출될 내용으로 HTML 문자열이나 document element가 가능합니다
//                                 iwPosition = new kakao.maps.LatLng(37.752944411155, 128.896293031191); //인포윈도우 표시 위치입니다
//
// // 인포윈도우를 생성합니다
//                             var infowindow = new kakao.maps.InfoWindow({
//                                 position : iwPosition,
//                                 content : iwContent
//                             });
//
// // 마커 위에 인포윈도우를 표시합니다. 두번째 파라미터인 marker를 넣어주지 않으면 지도 위에 표시됩니다
//                             infowindow.open(map, marker);

                        }


                        window.onload = function() {
                            document.getElementById('btn').onclick = function() {
                                var location=document.getElementById('location').value;
                                marker(location);
                                return false;
                            };

                            document.getElementById('btn2').onclick = function() {
                                var location=document.getElementById('location').value;
                                alert(location+'영업점이 선택되었습니다.');
                            };
                        };


                    </script>
                    <form>
                        <input type="text" name="location" id="location">
                        <input type="button" id="btn" value="검색">
                        <input type="button" id="btn2" value="장소선택">


                    </form>
                </li>
                </ul>
            <a href="http://45.32.33.83/myCeonsult.php" class="conBtn">신청하기</a>
        </div>
        <div id="footer">
        	COPYRIGHT ⓒ 신한금융투자 ALL RIGHT RESERVED.
        </div>
    </div>
</body>
</html>
