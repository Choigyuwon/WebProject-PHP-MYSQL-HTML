</<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>board_detail.php</title>
        <link rel="stylesheet" href="/boad/style.css">
        <style>
            table {
                table-layout: fixed;
                word-wrap: break-word;
            }
        </style>
    </head>
    <body>
        <h1 class="display">Board Detail</h1>
        <?php
            //mysql 커넥션 객체 생성
            $conn = mysqli_connect("localhost", "root", "1234","gnuwiz");
            //커넥션 객체 생성 여부 확인
            
            //board_list.php 에서 넘어온 글 번호 저장 및 출력
            $board_no = $_GET["board_no"];
            echo $board_no."`s Content<br>";
            //board 테이블에서 board_no값이 일치하는 board_no, board_title, board_content, board_user, board_date 필드 값 조회 쿼리
            $sql = "SELECT board_no, board_title, board_content, board_user, board_date FROM board WHERE board_no = '".$board_no."'";
            $result = mysqli_query($conn,$sql);
            //조회 성공 여부 확인
        ?>
        <table class ="form2" style="width:50%">
            <?php
                //result 변수에 담긴 값을 row 변수에 저장하여 테이블에 출력
                if($row = mysqli_fetch_array($result)) {
            ?>
            <tr class="form2">
                <th style="width:25%" class="form1">Writer</th>
                <th style="width:35%" class="form3">
                    <?php
                        echo $row["board_user"];
                    ?>
                </th>
            </tr>
            <tr>
                <th style="width:10%" class="form1">Title</th>
                <th style="width:15%" class="form2">
                    <?php
                        echo $row["board_title"];
                    ?>
                </th>
                <th style="width:5%" class="form1">Num</th>
                <th style="width:3%" class="form2">
                        <?php
                            echo $row["board_no"];
                        ?>
                </th>
                <th  style="width:5%" class="form1">Date</th>
                <th  style="width:3%" class="form2">
                    <?php
                        echo $row["board_date"];
                    ?>
                </th>
                
            </tr>
            <tr>
                <th colspan="6" class="form2">
                    <?php
                        echo $row["board_content"];
                    ?>
                </th>
            </tr>
            <?php
                }
            ?>
        </table>
        <br>
        &nbsp;&nbsp;&nbsp;
        <a class="btn-style" href="/boad/board_list.php">ComeBackList</a>
        <script type="text/javascript" src="js/bootstrap.js"></script>
    </body>
</html>
