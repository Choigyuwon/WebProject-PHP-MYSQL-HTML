<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>board_update.php</title>
        <link rel="stylesheet" href="/boad/style.css">
        <!-- 테이블 크기 조절용 css -->
        <style>
            table {
                table-layout: fixed;
                word-wrap: break-word;
            }
        </style>
    </head>
    <body>
        <h1 class="display">Board Update</h1>
        <?php
            //커넥션 객체 생성 (데이터 베이스 연결)
            $conn = mysqli_connect("localhost", "root", "1234","gnuwiz");
            $board_no = $_GET["board_no"];
            echo $board_no."`s Board Fixed<br>";
            //board 테이블을 조회하여 board_no의 값이 일치하는 행의 board_no, board_title, board_content, board_user, board_date 필드의 값을 가져오는 쿼리
            $sql = "SELECT board_no, board_title, board_content, board_user, board_date FROM board WHERE board_no = '".$board_no."'";
            $result = mysqli_query($conn,$sql)or die(mysqli_error($conn));
            if($row = mysqli_fetch_array($result)){
        ?>
        <br>
        <form action="/boad/board_update_action.php" method="post">
            <table class="form-horizontal" style="width:30%">
                <tr>
                    <td style="width:10%">Num</td>
                    <td style="width:20%"><input type="text" name="board_no" value="<?php echo $row["board_no"]?>" readonly></td>
                </tr>
                <tr>
                    <td style="width:10%">Title</td>
                    <td style="width:20%"><input type="text" name="board_title" value="<?php echo $row["board_title"]?>"></td>
                </tr>
                <tr>
                    <td style="width:10%">Content</td>
                    <td style="width:20%"><input type="text" name="board_content" value="<?php echo $row["board_content"]?>"></td>
                </tr>
            </table>
            <br>
        <?php
            }
            //커넥션 객체 종료
            mysqli_close($conn);
        ?>
            &nbsp;&nbsp;&nbsp;
            <button class="btn-style" type="submit">Input</button>
            &nbsp;&nbsp;
            <a class="btn-style" href="/boad/board_list.php">Come Back Board List</a>
        </form>
    </body>
</html>