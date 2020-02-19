<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>BoardList</title>
        <link rel="stylesheet" href="/boad/style.css">

    </head>
    <body>
        <h1 class="display" align = "center">BoardList</h1>
        
        <?php
            $currentPage = 1;
            if (isset($_GET["currentPage"])) {
                $currentPage = $_GET["currentPage"];
            }
 
            //mysqli_connect()함수로 커넥션 객체 생성
            $conn = mysqli_connect("localhost", "root", "1234","gnuwiz");
            //커넥션 객체 생성 확인
			/*
            if($conn) {
                echo "연결 성공<br>";
            } else {
                die("연결 실패 : " .mysqli_error());
            }*/
            
            //페이징 작업을 위한 테이블 내 전체 행 갯수 조회 쿼리
            $sqlCount = "SELECT count(*) FROM board";
            $resultCount = mysqli_query($conn,$sqlCount);
            if($rowCount = mysqli_fetch_array($resultCount)){
                $totalRowNum = $rowCount["count(*)"];   //php는 지역 변수를 밖에서 사용 가능.
            }
            //행 갯수 조회 쿼리가 실행 됐는지 여부
            if($resultCount) {
                echo "<label class = 'post'>Total posts : </label>". $totalRowNum."<br><br>";
            } else {
                echo "x: ".mysqli_error($conn);
            }
                        
            $rowPerPage = 5;   //페이지당 보여줄 게시물 행의 수
            $begin = ($currentPage -1) * $rowPerPage;
            //board 테이블을 조회해서 board_no, board_title, board_user, board_date 필드 값을 내림차순으로 정렬하여 모두 가져 오는 쿼리
            //입력된 begin값과 rowPerPage 값에 따라 가져오는 행의 시작과 갯수가 달라지는 쿼리
            $sql = "SELECT board_no, board_title, board_user, board_date FROM board order by board_no desc limit ".$begin.",".$rowPerPage."";
            $result = mysqli_query($conn,$sql);
            //쿼리 조회 결과가 있는지 확인
        ?>
        <table class="table-bordered" border = "1" align="center" bordercolor="black" width ="800" height="300">
            <tr class="table-top">
                <td>No</td>
                <td>Title</td>
                <td>User</td>
                <td>Date</td>
                <td>Modify</td>
                <td>Delete</td>
            </tr>
            <?php
                //반복문을 이용하여 result 변수에 담긴 값을 row변수에 계속 담아서 row변수의 값을 테이블에 출력한다.
                while($row = mysqli_fetch_array($result)){ 
            ?>
                <tr>
                    <td>
                        <?php
                            echo $row["board_no"];
                        ?>
                    </td>
                    <td>
                        <?php
                            echo "<a class='click-board-title' href='/boad/board_detail.php?board_no=".$row["board_no"]."'>";
                            echo $row["board_title"];
                            echo "</a>";
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $row["board_user"];
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $row["board_date"];
                        ?>
                    </td>
                        <?php
                            echo "<td><a class='click-board-mod' href='/boad/board_update_form.php?board_no=".$row["board_no"]."'>
Modify</a></td>";
                            echo "<td><a class='click-board-del' href='/boad/board_delete_form.php?board_no=".$row["board_no"]."'>Delete</a></td>";
                        ?>
                </tr>
            <?php
                }
            ?>
        </table>
        &nbsp;&nbsp;&nbsp;&nbsp;
        <?php
            //currentPage 변수가 1보다 클때만 이전 버튼이 활성화 되도록 함
            if($currentPage > 1 ) { 
                //이전 버튼이 클릭될때 GET방식으로 currentPage변수 값에 1을 뺀 값이 넘어가도록 함
                echo "<a class='click-board-page' href ='/boad/board_list.php?currentPage=".($currentPage-1)."'>of</a>&nbsp;&nbsp;&nbsp;&nbsp;";
            }
 
            $lastPage = ($totalRowNum-1) / $rowPerPage;
 
            if (($totalRowNum-1) % $rowPerPage !=0) { 
                $lastPage += 1;
            }
            //lastPage변수가 currentPage 변수보다 클때만 다음 버튼이 활성화 되도록 함
            if($currentPage < $lastPage) { 
                //다음 버튼이 클릭될때 GET방식으로 currentPage변수 값에 1을 더한 값이 넘어가도록 함
                echo "<a class='click-board-page' href='/boad/board_list.php?currentPage=".($currentPage+1)."'>Next</a>";
            }
            mysqli_close($conn);
        ?>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a class="click-board-write" href="/boad/board_add_form.php">Add Write</a><br>
		<a class="click-board-write" href="/yy/bookmain.html">GoMain</a>
    </body>
</html>
