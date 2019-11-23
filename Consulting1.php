<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>마커 생성하기</title>

</head>
<body>

</head>





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




                        var iwContent = '<div style="padding:5px;">영업점 정보 <br><a id="locSelect" href="#" style="color:blue" target="_blank">영업점선택하기</a></div>', // 인포윈도우에 표출될 내용으로 HTML 문자열이나 document element가 가능합니다
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
                <form>
                    <input type="text" name="location" id="location">

                    <div><input type="button" id="btn" value="검색"></div>


                </form>

			</div>
			<!--  end panel-body -->
		</div>
		<!-- end panel -->
	</div>
</body>
</html>
