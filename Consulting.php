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
    
    $sql2 = "SELECT * FROM skill_apply WHERE apply_id=0;";
    
    try {
        $result=$conn->query($sql2);
    } catch(PDOException $e) {
        die('Database error: '. $e->getMessage());
    }
    
    if ($result->num_rows > 0) {
        // output data of each row
        $row = $result->fetch_assoc();
        
        $apply_id = $row["apply_id"]; // 신청 id
        $apply_comp_code = $row["apply_comp_code"]; // 신청 기업코드
        $apply_comp_name = $row["apply_comp_name"]; // 신청 기업명
        $apply_human_name = $row["apply_human_name"]; // 신청자명
        $apply_phonenum = $row["apply_phonenum"]; // 신청자 연락처
        $apply_conseoltname = $row["apply_conseoltname"]; // 신청 영업점
        $skill_ntb_code = $row["skill_ntb_code"]; // NTB 기술코드
        $skill_title = $row["skill_title"]; // 특허정보 - 특허명칭
        $comp_phonenum = $row["comp_phonenum"]; // 기업 연락처
        $requirement = $row["requirement"]; // 요구사항
        
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
    <script type="text/javascript" src='http://code.jquery.com/jquery-3.1.1.min.js'/>
    <script type="text/javascript" src="js/common.js"/>

    <script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=9e81c59c3545ebc90541d8a1ace136b0"></script>
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

            var iwContent = '<div style="padding:5px;">영업점 정보 <br><a href="/" style="color:blue" target="_blank">영업점선택하기</a></div>', // 인포윈도우에 표출될 내용으로 HTML 문자열이나 document element가 가능합니다
                iwPosition = new kakao.maps.LatLng(37.752944411155, 128.896293031191); //인포윈도우 표시 위치입니다

// 인포윈도우를 생성합니다
            var infowindow = new kakao.maps.InfoWindow({
                position : iwPosition,
                content : iwContent
            });

// 마커 위에 인포윈도우를 표시합니다. 두번째 파라미터인 marker를 넣어주지 않으면 지도 위에 표시됩니다
            infowindow.open(map, marker);

        }


        window.onload = function() {
            document.getElementById('btn').onclick = function() {
                var location=document.getElementById('location').value;
                marker(location);
                return false;
            };

            document.getElementById('locSelect').onclick = function() {
                alert('영업점이 선택되었습니다.');
            };
        };


    </script>

</head>
<body>





	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">기술 거래 컨설팅 신청</h1>
			<input type="submit" style="float: right;" type="submit" class="panel-heading" value="신청하기">
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">

				<div class="panel-heading">신청자 정보 입력</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<form role="form" action="/board/register" method="post">
						<div class="form-group">
							<label>기업명</label> <input class="form-control" name='title'><br>
							<label>대표자명</label> <input class="form-control" name='title'><br>
							<label>연락처</label> <input class="form-control" name='title'><br>
							<label>요구 사항</label> <textarea class="form-control" rows="3" name='content'></textarea>
						</div>
					</form>
				</div>
				<!--  end panel-body -->
				
				<div class="panel-heading">신청 기술 확인</div>
				<div class="panel-body">
					<form role="form" action="/board/register" method="post">
						<div class="form-group">
							<label>기술명</label> <input class="form-control" name='title'><br>
							<label>NTB기술코드</label> <input class="form-control" name='title'><br>
							<label>출원인</label> <input class="form-control" name='title'><br>
						</div>
					</form>
				</div>


                <h1>영업점 검색</h1>
                <div id="map" style="width:300px;height:200px;"></div>

                <form>
                    <input type="text" name="location" id="location">

                    <div><input type="button" id="btn" value="검색"></div>


                </form>

			</div>
			<!--  end panel-body -->
		</div>
		<!-- end panel -->
	</div>
	<!-- /.row -->
</body>
</html>