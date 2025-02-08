<?php
//Hàm kết nối CSDL
    function connectdb(){
        $servername = "localhost";
        $username   = "root";
        $password   = "";
        $dbname     = "ql_thuvien";
        $conn   = mysqli_connect($servername, $username, $password, $dbname);
        return $conn;
    }

//Hàm xử lý truy vấn UPDATE, DELETE và INSERT
    function execute($sql) {
        $conn = connectdb();
        mysqli_query($conn, $sql);
        return true;
    }

//Hàm lấy tất cả danh sách 
    function get_all($sql) {
        $conn = connectdb();
        $list = [];
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)){
            array_push($list, $row);
        }
        return $list;
    }

    //Lấy 1 bản ghi
    function get_one($sql)
    {
        $conn = connectdb();
        $result = mysqli_query($conn, $sql);
        $result = mysqli_fetch_assoc($result);
        return $result;
    }
    // Hàm lấy lấy số dòng
    function get_query_value($sql){
        $conn = connectdb();
        $result = mysqli_query($conn, $sql);
        $result = mysqli_fetch_assoc($result);
        return array_values($result)[0];
    }
    // Hàm kiểm tra giá trị có tôn tại hay không
    function check_exists($table, $condition) {
        $conn = connectdb();
        $sql = "SELECT 1 FROM $table WHERE $condition LIMIT 1";
        $result = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($result) > 0) {
            return true;
        } else {
            return false;
        }
    }
    //Hàm tìm kiếm
    function search_data($table, $keyword, $columns) {
        $conn = connectdb();
        $search_conditions = [];
        
        foreach ($columns as $column) {
            $search_conditions[] = "$column LIKE '%$keyword%'";
        }
        
        $search_str = implode(" OR ", $search_conditions);
        $sql = "SELECT * FROM $table WHERE $search_str";
        return get_all($sql);
    }
    
    function ham_thongbao($kieutb, $message){
        //kieutb: success,error
        $_SESSION['thongbao'] = "<script>window.onload = function() { showToast('$kieutb','$message'); };</script>";
    }
?>