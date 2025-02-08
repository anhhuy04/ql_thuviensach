<?php
    if(isset($_GET['act'])){
        switch($_GET['act']){
            case 'home':
                $getSachGhim = get_ALL_SachGhim(5);
                $getSachMoi = get_sach_moi(5);
                $getSachXemNhieu = get_sach_xemnhieu(5);
                $getSachMuonNhieu = get_sach_muonnhieu(5);
                break;
            case 'login':
                header('Location: '.$base_url.'login');
                exit();
                break;
            
            case 'trangadmin':
                header('Location: /do_an_quanlythuvien/View/Admin/index.php');
                break;
            case 'logout':
                    if(isset($_SESSION['user'])&&isset($_SESSION['user']) != ''){
                        unset($_SESSION['user']);
                    }
                    if(isset($_SESSION['last_name_user'])&&isset($_SESSION['last_name_user']) != ''){
                        unset($_SESSION['last_name_user']);
                    }
                    header('Location: '.$base_url.'login');
                    break;
            case 'gio-sach':
                    if(isset($_GET['masach'])){
                        $MaSach = $_GET['masach'];
                        if(isset($_SESSION['user'])&&isset($_SESSION['user']) != ''){
                            $MaTaiKhoan = $_SESSION['user']["MaTaiKhoan"];
                            $GiaMuon = max($_GET['dongia']*0.5/100,500);
                            
                            $result = insert_GioHang($MaTaiKhoan, $MaSach, $GiaMuon, 1);
                            if($result !== true){
                                echo "<script>
                                    alert('Thêm vào giỏ sách thất bại');
                                    window.location.href = '".$_SERVER['HTTP_REFERER']."';
                                </script>";
                            }else{
                                echo "<script>
                                    alert('Thêm vào giỏ sách thành công');
                                    window.location.href = '".$_SERVER['HTTP_REFERER']."';
                                </script>";
                            }
                        }else{
                            header('Location: '.$base_url.'login');
                            
                        }
                    }else{
                        echo "<script>
                        alert('Thêm vào giỏ sách thất bại');
                        window.location.href = '".$base_url."login';
                    </script>";                    }
                break;
            case 'detail':
                $view_name = "book/chitietsach";
                $masach = $_GET['id'];
                $getOneSach = get_One_Sach($masach);
                $getDM_Sach = get_DanhMuc_1Sach($masach);
                break;
            case 'danh-muc':
                $view_name = "book/danhmuc";
                $madanhmuc = $_GET['id'];
                $getSach = get_Sach_in_DM($madanhmuc);
                $getDM = get_danhmuc_BY_madm($madanhmuc);
                break;
            case 'search':
                if (isset($_POST['keyword'])){
                    header("Location: ".$base_url."book/search/".$_POST['keyword']."/page/1");
                }
                $page=1;
                if(isset($_GET['page'])){
                    $page = $_GET['page'];
                }
                $keyword = $_GET['keyword'];
                $kq = book_search($keyword,$page);
                $sotrang = ceil(book_search_page_number($keyword)/12);
                $view_name = "book/search";
                break;
            default:
                header('Location: '.$base_url.'book/home');
                break;
        }

    }if (isset($view_name)) {
        include_once('View/User/Home/' . $view_name . '.php');
    }
?>  