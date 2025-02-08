<?php
    ob_start();
    include "../../Model/m_admin/m_ad_ql_sach.php";

    if(isset($_GET['act'])){
        switch($_GET['act']){
            
    //Hiển thị        
            case 'sach':
            //Hiển thị
                $manage_book = "quanlysach/xemsach.php";
                $sach = book_view();
                $name = "sách";
                break;
            case 'danhmuc':
            //Hiển thị
                $manage_book = "danhmuc/xemdanhmuc.php";
                $danhmuc_view = get_All_danhmuc();
                $name = "danh mục";

                break;
            case 'tacgia':
            //Hiển thị
                $manage_book = "tacgia/xemtacgia.php";
                $tacgia_view = get_All_TacGia();
                $name = "tác giả";

                break;
            case "bosach":
                $manage_book = "bosach/xembosach.php";
                $bosach_view = get_All_bosach();
                $name = "bộ sách";
                break;
    //Thêm            
            case "themsach":
                $danhmuc_view = get_All_danhmuc();
                $tacgia_view = get_All_TacGia();
                $nxb_view = get_nxb();
                $bosach_view = get_All_bosach();
                $manage_book = "quanlysach/themsach.php";
                $name = "sách";
                $useSelect2 = true;
            //Thêm sách
                if(isset($_POST["submit-add-sach"])){
                    try{
                        $tensach = trim($_POST["tensach"]);
                        if (isset($_POST["tacgia"])) {
                            $tacgia = $_POST["tacgia"];
                        } else {
                            $tacgia = array("0"); // hoặc bạn có thể đặt giá trị mặc định nếu không có gì được chọn
                        }
                        $nxb = trim($_POST["nxb"]) ?: "Đang cập nhật";
                        $ngayxb = trim($_POST["ngayxb"]) ?: null;
                        $isbn = trim($_POST["isbn"]) ?: "Đang cập nhật";
                        $vitrisach = trim($_POST["vitrisach"]) ?: "Đang cập nhật";
                        $soluong = trim($_POST["soluong"]);
                        $dongia = trim($_POST["dongia"]) ?: "Đang cập nhật";
                        $ghimsach = trim($_POST["ghimsach"]);
                        $mota = trim($_POST["mota"]) ?: "Đang cập nhật";
                        $mabosach = $_POST["mabosach"] ?: null;
                        $sachconlai= $_POST["sachconlai"];
                        if (isset($_POST['danhmuc'])) {
                            $danhmuc = $_POST['danhmuc'];
                        } else {
                            $danhmuc = array("0"); // hoặc bạn có thể đặt giá trị mặc định nếu không có gì được chọn
                        }
                        $file_name=  $_FILES['URL_HinhSach']['name'];
                        $file_tmp = $_FILES['URL_HinhSach']['tmp_name'];
                        if (!move_uploaded_file($file_tmp,"../../Assets/Upload/sach/biasach/".$file_name)) {
                            throw new Exception("Không thể tải tệp lên.");
                        }
                        if(!$result=add_book($tensach, $mota, $nxb, $ngayxb, $isbn, $file_name, $vitrisach, $ghimsach, $mabosach, $soluong,$sachconlai, $dongia, $tacgia, $danhmuc)){
                            throw new Exception("Đã xảy ra lỗi khi thêm sách: ".$result);
                        }
                        ham_thongbao('success','Thêm thành công');     
                            header("Location: ".$base_url_admin."ql_sach/sach");
                            exit();
                    }catch(Exception $e){
                        // Hiển thị thông báo lỗi
                        ham_thongbao('error', 'Xảy ra lỗi: ' . $e->getMessage() . '');
                        header("Location: ".$base_url_admin."ql_sach/sach");
                        exit();
                    }
                }
                break;
            case "themdm": 
                $manage_book = "danhmuc/themdanhmuc.php";
                $name = "danh mục";

            //Thêm danh mục     
                if(isset($_POST["add_danhmuc"])){
                    try {
                        $tendanhmuc = trim($_POST["tendanhmuc"]);
                        $mota = trim($_POST["mota"]) ;
                        $file_name = $_FILES['url_hinh_dm']['name'];
                        $file_tmp = $_FILES['url_hinh_dm']['tmp_name'];

                        // Tải tệp lên
                        if (!move_uploaded_file($file_tmp, "../../Assets/Upload/sach/danhmuc/" . $file_name)) {
                            throw new Exception("Không thể tải tệp lên.");
                        }
                
                        // Thêm danh mục
                        if (!add_danhmuc($tendanhmuc, $mota, $file_name)) {
                            throw new Exception("Đã xảy ra lỗi khi thêm danh mục.");
                        }
                
                        // Hiển thị thông báo thành công
                        ham_thongbao('success','Thêm danh muc thành công');
                        header("Location: ".$base_url_admin."ql_sach/danhmuc");
                        exit();
                    } catch (Exception $e) {
                        // Hiển thị thông báo lỗi
                        ham_thongbao('error', 'Xảy ra lỗi: ' .$e->getMessage() . '');
                        header("Location: ".$base_url_admin."ql_sach/danhmuc");
                        exit();
                    }
                }
                break;
            case "themtg":
                $manage_book = "tacgia/themtacgia.php";
                $name = "tác giả";

            //Thêm tác giả
                if(isset($_POST["submit_addtacgia"])){
                    try {
                        $tenTacGia = trim($_POST["tenTacGia"]);
                        $tieuSu = trim($_POST["tieuSu"]);
                    } catch (Exception $e) {
                        // Hiển thị thông báo lỗi
                        ham_thongbao('error', 'Xảy ra lỗi: ' . $e->getMessage() . '');
                        header("Location: ".$base_url_admin."ql_sach/tacgia");
                        exit();
                    }
                    if(add_tacgia($tenTacGia, $tieuSu)){
                        ham_thongbao('success','Thêm tác giả thành công');
                        header("Location: ".$base_url_admin."ql_sach/tacgia");
                        exit(); 
                    } else {
                        ham_thongbao('error', 'Thêm tác giả thất bại');
                        header("Location: ".$base_url_admin."ql_sach/tacgia");
                        exit(); 
                    }
                }
                break;
                case "thembosach": 
                    $manage_book = "bosach/thembosach.php";
                    $name = "bộ sách";

                //Thêm bộ sách   
                    if(isset($_POST["add_bosach"])){
                        try {
                            $tenbosach = trim($_POST["tenbosach"]);
                            $mota = trim($_POST["mota"]) ;
                            $file_name = $_FILES['url_hinh_bosach']['name'];
                            $file_tmp = $_FILES['url_hinh_bosach']['tmp_name'];
    
                            // Tải tệp lên
                            if (!move_uploaded_file($file_tmp, "../../Assets/Upload/sach/bosach/" . $file_name)) {
                                throw new Exception("Không thể tải tệp lên.");
                            }
                            
                            // Thêm bộ sách
                            if (!add_bosach($tenbosach, $mota, $file_name)) {
                                throw new Exception("Đã xảy ra lỗi khi thêm bộ sách.");
                            }
                    
                            // Hiển thị thông báo thành công
                            ham_thongbao('success','Thêm bộ sách thành công');
                            header("Location: ".$base_url_admin."ql_sach/bosach");
                            exit();
                        } catch (Exception $e) {
                            // Hiển thị thông báo lỗi
                            ham_thongbao('error', 'Xảy ra lỗi: ' .$e->getMessage() . '');
                            header("Location: ".$base_url_admin."ql_sach/bosach");
                            exit();
                        }
                    }
                    break;
    //xóa        
            case "deleteSach":
            //Xóa Sách
                $masach = $_GET["id"];
                if(deleteSach($masach)){
                    ham_thongbao('success','Xóa sách thành công');
                }else{
                    ham_thongbao('error', 'Xóa sách thất bại');
                }
                header("Location: ".$base_url_admin."ql_sach/sach");
                exit(); 
                break;
            case "deleteDanhMuc":
            //Xóa danh mục
                $name = "danh mục";
                $madanhmuc = $_GET["id"];
                if(deletedanhmuc($madanhmuc)){
                    ham_thongbao('success','Xóa '. $name .' thành công');
                }else{
                    ham_thongbao('error', 'Xóa '. $name .' thất bại');
                }
                header("Location: ".$base_url_admin."ql_sach/danhmuc");
                exit(); 
                break;
            case "deleteTacGia":
            //Xóa tác giả
                $matg = $_GET["id"];
                $name = "tác giả";
                if(deletetacgia($matg)){
                    ham_thongbao('success','Xóa '. $name .' thành công');
                }else{
                    ham_thongbao('error', 'Xóa '. $name .' thất bại');
                }
                header("Location: ".$base_url_admin."ql_sach/tacgia");
                exit(); 
                break;
            case "deleteBoSach":
                $id = $_GET["id"];
                if(deletebosach($id)){
                    ham_thongbao('success','Xóa bộ sách thành công');
                }else{
                    ham_thongbao('error', 'Xóa bộ sách thất bại');
                }
                header("Location: ".$base_url_admin."ql_sach/bosach");
                exit(); 
                break;
    //update    
            case "update_book":  
                $manage_book = "quanlysach/suasach.php";
                $masach = $_GET["id"];
                $selectSach = selectSachByID($masach);
                $danhmuc_view = get_All_danhmuc();
                $tacgia_view = get_All_TacGia();
                $nxb_view = get_nxb();
                $bosach_view = get_All_bosach();
                $name = "sách";
                $useSelect2 = true;
                if(isset($_POST["submit-update-sach"])){
                    try{
                        $tensach = trim($_POST["tensach"]);
                        if (isset($_POST["tacgia"])) {
                            $tacgia = $_POST["tacgia"];
                        } else {
                            $tacgia = array("0"); // hoặc bạn có thể đặt giá trị mặc định nếu không có gì được chọn
                        }
                        $nxb = trim($_POST["nxb"]) ?: "Đang cập nhật";
                        $ngayxb = trim($_POST["ngayxb"]) ?: null;
                        $isbn = trim($_POST["isbn"]) ?: "Đang cập nhật";
                        $vitrisach = trim($_POST["vitrisach"]) ?: "Đang cập nhật";
                        $soluong = trim($_POST["soluong"]);
                        $dongia = trim($_POST["dongia"]) ?: "Đang cập nhật";
                        $ghimsach = trim($_POST["ghimsach"]);
                        $mota = trim($_POST["mota"]) ?: "Đang cập nhật";
                        $mabosach = $_POST["mabosach"] ?: null;
                        $sachconlai= $_POST["sachconlai"];
                        if (isset($_POST['danhmuc'])) {
                            $danhmuc = $_POST['danhmuc'];
                        } else {
                            $danhmuc = array("0"); // hoặc bạn có thể đặt giá trị mặc định nếu không có gì được chọn
                        }
                        
                        if ($_FILES['URL_HinhSach']['error'] === UPLOAD_ERR_NO_FILE) {
                            // Nếu người dùng không chọn tệp mới, giữ lại tệp cũ
                            $file_name = $selectSach['URL_HinhSach'];  // Giữ tên tệp cũ
                        } else {
                            $file_name=  $_FILES['URL_HinhSach']['name'];
                            $file_tmp = $_FILES['URL_HinhSach']['tmp_name'];
                            // Tải tệp lên
                            if (!move_uploaded_file($file_tmp, "../../Assets/Upload/sach/danhmuc/" . $file_name)) {
                                throw new Exception("Không thể tải tệp lên.");
                            }
                        }
                        if(!$result = update_book($masach,$tensach, $mota, $nxb, $ngayxb, $isbn, $file_name, $vitrisach, $ghimsach, $mabosach, $soluong,$sachconlai, $dongia, $tacgia, $danhmuc)){
                            throw new Exception("Đã xảy ra lỗi khi cập nhật sách: ".$result);
                        }
                        ham_thongbao('success','cập nhật '.$name.' thành công');     
                            header("Location: ".$base_url_admin."ql_sach/update_book/".$masach);
                            exit();
                    }catch(Exception $e){
                        // Hiển thị thông báo lỗi
                        ham_thongbao('error', 'Xảy ra lỗi: ' . $e->getMessage() . '');
                        header("Location: ".$base_url_admin."ql_sach/update_book");
                        exit();
                    }
                }

                $title_bar = 'Sách: '.$selectSach["TenSach"].'Mã: ('.$masach.')';
                $DanhMucArray = explode(", ", $selectSach["TenDanhMuc"]);  // Tách mã danh mục
                $TacGiaArray = explode(", ", $selectSach["TenTacGia"]);  // Tách mã danh mục
                break;
            case "update_DanhMuc":
                $manage_book = "danhmuc/suadanhmuc.php";
                $name = "danh mục";

                $dm = $_GET["id"];
                $selectDM = selectDanhMucByID($dm);

                $title_bar = 'Danh mục: '.$selectDM["TenDanhMuc"].' (Mã: '.$dm.')';
                if(isset($_POST['submit-update-DM'])){
                    try {
                        $tendanhmuc = trim($_POST["tendanhmuc"]);
                        $mota = trim($_POST["mota"]);
                        if ($_FILES['url_hinh_dm']['error'] === UPLOAD_ERR_NO_FILE) {
                            // Nếu người dùng không chọn tệp mới, giữ lại tệp cũ
                            $file_name = $selectDM['URL_HinhDM'];  // Giữ tên tệp cũ
                        } else {
                            $file_name = $_FILES['url_hinh_dm']['name'];
                            $file_tmp = $_FILES['url_hinh_dm']['tmp_name'];
                            // Tải tệp lên
                            if (!move_uploaded_file($file_tmp, "../../Assets/Upload/sach/danhmuc/" . $file_name)) {
                                throw new Exception("Không thể tải tệp lên.");
                            }
                        }
                        
                        // Thêm danh mục
                        if (!$result=update_danhmuc($tendanhmuc, $mota, $file_name, $dm)) {
                            throw new Exception("Đã xảy ra lỗi khi cập nhật danh mục:".$result);
                        }
                
                        // Hiển thị thông báo thành công
                        ham_thongbao('success','cập nhật danh muc thành công');
                        header("Location: ".$base_url_admin."ql_sach/update_DanhMuc/".$dm."");
                        exit();
                    } catch (Exception $e) {
                        // Hiển thị thông báo lỗi
                        ham_thongbao('error', 'Xảy ra lỗi: ' .$e->getMessage() . '');
                        header("Location: ".$base_url_admin."ql_sach/danhmuc");
                        exit();
                    }
                }
                break;
            case "update_TacGia":
                $manage_book = "tacgia/suatacgia.php";
                $id_tg = $_GET['id'];
                $selecttg = get_TacGia_byID($id_tg);
                $title_bar = 'Tác giả: '.$selecttg["TenTacGia"].' (Mã: '.$id_tg.')';
                $name = "tác giả";

                if(isset($_POST['submit-update-tacgia'])){
                    try {
                        $tenTacGia = trim($_POST["tenTacGia"]);
                        $tieuSu = trim($_POST["tieuSu"]);
                        // Thêm danh mục
                        if (!$result=update_tacgia($tendanhmuc, $mota, $file_name, $dm)) {
                            throw new Exception("Đã xảy ra lỗi khi cập nhật tác giả:".$result);
                        }
                
                        // Hiển thị thông báo thành công
                        ham_thongbao('success','cập nhật tác giả thành công');
                        header("Location: ".$base_url_admin."ql_sach/update_TacGia/".$id_tg."");
                        exit();
                    } catch (Exception $e) {
                        // Hiển thị thông báo lỗi
                        ham_thongbao('error', 'Xảy ra lỗi: ' .$e->getMessage() . '');
                        header("Location: ".$base_url_admin."ql_sach/tacgia");
                        exit();
                    }
                }
                break;
            case "update_BoSach":
                $manage_book = "bosach/suabosach.php";
                $name = "bộ sách";

                $bosach = $_GET["id"];
                $selectBS = get_BoSach_ByID($bosach);

                $title_bar = 'Danh mục: '.$selectBS["TenBoSach"].' (Mã: '.$bosach.')';
                if(isset($_POST['submit-update-bosach'])){
                    try {
                        $tenbosach = trim($_POST["tenbosach"]);
                        $mota = trim($_POST["mota"]);
                        if ($_FILES['url_hinh_bosach']['error'] === UPLOAD_ERR_NO_FILE) {
                            // Nếu người dùng không chọn tệp mới, giữ lại tệp cũ
                            $file_name = $selectBS['URL_HinhBoSach'];  // Giữ tên tệp cũ
                        } else {
                            $file_name = $_FILES['url_hinh_bosach']['name'];
                            $file_tmp = $_FILES['url_hinh_bosach']['tmp_name'];
                            // Tải tệp lên
                            if (!move_uploaded_file($file_tmp, "../../Assets/Upload/sach/bosach/" . $file_name)) {
                                throw new Exception("Không thể tải tệp lên.");
                            }
                        }
                        
           
                        if (!$result=update_bosach($tenbosach,$mota,$file_name,$bosach)) {
                            throw new Exception("Đã xảy ra lỗi khi cập nhật danh mục:".$result);
                        }
                
                        // Hiển thị thông báo thành công
                        ham_thongbao('success','cập nhật bộ sách thành công');
                        header("Location: ".$base_url_admin."ql_sach/update_BoSach/".$bosach."");
                        exit();
                    } catch (Exception $e) {
                        // Hiển thị thông báo lỗi
                        ham_thongbao('error', 'Xảy ra lỗi: ' .$e->getMessage() . '');
                        header("Location: ".$base_url_admin."ql_sach/danhmuc");
                        exit();
                    }
                }
                break;
    //end            
            default:
            header("Location: ".$base_url_admin."ql_sach/sach");
            break;
        }
        include_once('Home/nav_bar.php');
    }
?>  