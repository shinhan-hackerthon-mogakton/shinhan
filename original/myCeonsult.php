<?php

header('Content-Type: text/html; charset=utf-8');
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
        $contract_phonenum[]=$row['contract_phonenum'];
        $ceonsult_name[]=$row['ceonsult_name'];
        $ceonsultant_phonenum[]=$row['ceonsultant_phonenum'];
        $contract_state[]=$row['contract_state'];


    }



} else {
    echo "0 results";
}



$conn->close();


?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title></title>

    <style media="screen">
        table.type04 {
            border-collapse: separate;
            border-spacing: 1px;
            text-align: left;
            line-height: 1.5;
            border-top: 1px solid #ccc;
            margin : 20px 10px;
        }
        table.type04 th {
            width: 150px;
            padding: 10px;
            font-weight: bold;
            vertical-align: top;
            border-bottom: 1px solid #ccc;
        }
        table.type04 td {
            width: 350px;
            padding: 10px;
            vertical-align: top;
            border-bottom: 1px solid #ccc;
        }
    </style>
</head>
<body>
<header>

    <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
            <div class="row">
            </div>
        </div>
    </div>
    <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container d-flex justify-content-between">
            <a href="#" class="navbar-brand d-flex align-items-center">
                <strong>Banner</strong>
            </a>
            <button style="float: right;" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">menu</span>
            </button>
        </div>
    </div>
</header>
<br><br><br>


<main>
    <div class="album py-5 bg-light">
        <div class="container">
            <h2>대상 기술</h2>

            <div class="row">

                    <div style="float:left; width:30%; margin:10px;" class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <img src="./img/skills/<?php echo $apply_id[0]+1 . ".jpg";?>" alt="">
                            <div class="card-body">
                                <p class="card-text"><?php echo $skill_title[0]; ?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                    </div>
                                    <small class="text-muted">9 mins</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="c">
                        <a href="">더보기</a>
                    </div>
                </div>
            </div>
        </div>
        <div style="width:100%;float:left;" class="">
            <h2>기술 거래 현황</h2>
            <h4>모든 거래 내역은 블록체인에 존재합니다.</h4>
            <span class="">
      <table style="width:100%;" class="type04">
     <tr>
         <th scope="row">번호</th>
         <th scope="row">기술명</th>
         <th scope="row">거래 연락처</th>
         <th scope="row">컨설턴트 지점</th>
         <th scope="row">컨설턴트 연락처</th>
         <th scope="row">상태</th>
         <th scope="row">블록체인 장부확인</th>

     </tr>
     <tr>
         <td><?php echo $contract_id[0]; ?></td>
         <td><?php echo $skill_name[0]; ?></td>
         <td><?php echo $contract_phonenum[0]; ?></td>
         <td><?php echo $ceonsult_name[0]; ?></td>
         <td><?php echo $ceonsultant_phonenum[0]; ?></td>
         <td><?php echo $contract_state[0]; ?></td>
         <td>
           <button type="button" name="button">거래 확인</button>
         </td>

     </tr>
     <tr>
         <td>이모씨</td>
         <td>공공안전연구2</td>
         <td>031-123-4578</td>
         <td>신논혁 지점</td>
         <td>010-2587-1234</td>
         <td>컨설팅 신청 승인</td>
         <td>
           <button type="button" name="button">거래 확인</button>
         </td>

     </tr>
  </table>
    </span>


        </div>
    </div>
</main>

</body>
</html>
