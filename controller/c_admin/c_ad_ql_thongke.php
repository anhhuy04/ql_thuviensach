<?php
    ob_start();
    include "../../Model/m_admin/m_ad_ql_thongke.php";

    if(isset($_GET['act'])){
        switch($_GET['act']){
            case "home":
                $manage ='thongkehome';
                break;
            case "tk_doanhthu":
                $manage ='tk_doanhthu';
                $title_bar = "Thống kê doanh thu";
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $thongke_theo = $_POST['thongke_theo'] ?? '';
                    $start_date = $_POST['start_date'] ?? '';
                    $end_date = $_POST['end_date'] ?? '';
                    $month_start = $_POST['month_start'] ?? '';
                    $month_end = $_POST['month_end'] ?? '';
                    $year_start = $_POST['year_start'] ?? '';
                    $year_end = $_POST['year_end'] ?? '';
                    $quarter = $_POST['quarter'] ?? '';
                    $year_quarter = $_POST['year_quarter'] ?? '';
                
                    $result = [];
                
                    // Gọi model để lấy dữ liệu thống kê
                    if ($thongke_theo === 'ngay') {
                        $result = thongKeTheoNgay($start_date, $end_date);
                    } elseif ($thongke_theo === 'thang') {
                        $result = thongKeTheoThang($month_start, $month_end);
                    } elseif ($thongke_theo === 'nam') {
                        $result = thongKeTheoNam($year_start, $year_end);
                    } elseif ($thongke_theo === 'quy') {
                        $quarter = $_POST['quarter']; // Quý được chọn (1, 2, 3, hoặc 4)
                        $year_quarter = $_POST['year_quarter']; // Năm của quý được chọn

                        // Xác định khoảng thời gian của quý
                        switch ($quarter) {
                            case '1': // Quý 1: Tháng 1-3
                                $start_date = "$year_quarter-01-01";
                                $end_date = "$year_quarter-03-31";
                                break;
                            case '2': // Quý 2: Tháng 4-6
                                $start_date = "$year_quarter-04-01";
                                $end_date = "$year_quarter-06-30";
                                break;
                            case '3': // Quý 3: Tháng 7-9
                                $start_date = "$year_quarter-07-01";
                                $end_date = "$year_quarter-09-30";
                                break;
                            case '4': // Quý 4: Tháng 10-12
                                $start_date = "$year_quarter-10-01";
                                $end_date = "$year_quarter-12-31";
                                break;
                            default:
                                $error = "Quý không hợp lệ!";
                        }

                        // Truy vấn doanh thu theo từng ngày trong quý
                        if (empty($error)) {
                            $result = thongKeTheoNgay($start_date, $end_date); // Hàm gọi từ Model
                        }
                        
                    }
                    elseif ($_POST['thongke_theo'] === 'tongquan') {
                        // Xử lý thống kê tổng quan
                        $thongKeTongQuan = thongKeTongQuan();
                        
                    }
                }
                break;
            case 'tk_tongquan':
                $manage ='tk_tongquan';
                $title_bar = "Thống kê tông quan";
                $thongKeTongQuan = frmthongKeTongQuan();
                
                if(isset($_POST['submit'])){
                    $start_date = $_POST['start_date'];
                    $end_date = $_POST['end_date'];
                    echo $end_date;
                    $thongKeTongQuan = frmthongKeTongQuan($start_date,$end_date);
                }
                break;
            case 'tk_sach':
                $manage ='tk_sach';
                $title_bar = "Thống kê tông quan";
                $conn = connectdb();
                $categories = $conn->query("SELECT MaDanhMuc,TenDanhMuc FROM danhmuc")->fetch_all(MYSQLI_ASSOC);

                if(isset($_POST['submit'])){
                    $start_date = $_POST['start_date'] ?? null;
                    $end_date = $_POST['end_date'] ?? null;
                    $category_id = $_POST['category'] ?? null;
                    $filter = $_POST['filter'] ?? 'most';
                    $limit = $_POST['limit'] ?? 5;
                    // Gọi hàm thống kê trong model
                    $thong_ke_sach = thongKeSach($start_date, $end_date, $category_id , $filter, $limit);
                }
                break;
            case 'tk_docgia':
                $manage ='tk_docgia';
                $title_bar = "Thống kê độc giả";
                $thongKeTongQuan = frmthongKeTongQuan();
                $conn = connectdb();
                $categories = $conn->query("SELECT MaDanhMuc,TenDanhMuc FROM danhmuc")->fetch_all(MYSQLI_ASSOC);

                if(isset($_POST['submit'])){
                    $start_date = $_POST['start_date'] ?? null;
                    $end_date = $_POST['end_date'] ?? null;
                    $filter = $_POST['filter'] ?? 'most';
                    $limit = $_POST['limit'] ?? 5;

                    // Gọi hàm thống kê
                    $thong_ke_doc_gia = thongKeDocGia($start_date, $end_date, $filter, $limit);
                }
                break;
            case 'tk_sachdocgiamuon':
                $manage ='tk_sachdocgiamuon';
                $title_bar = "Thống kê sách được đọc giả mượn";
                if(isset($_POST['submit'])){
                    $start_date = $_POST['start_date'] ?? null;
                    $end_date = $_POST['end_date'] ?? null;
                    $book_status = $_POST['book_status'] ?? 'all';
                    // Gọi hàm thống kê
                    $thong_ke_sach = sachdocgiamuon($start_date, $end_date, $book_status);

                }
                break;
        }
        include_once('Home/nav_bar.php');
    }
?>