<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Dang_kyModel
 *
 * @author phuocnguyen
 */
class Dang_kyModel extends BaseModel {

    public function dangky($post, $Goi_dich_vu) {
        $email = isset($_POST["email"]) ? $_POST["email"] : "";
        $mat_khau = isset($_POST["mat_khau"]) ? $_POST["mat_khau"] : "";
        $gioi_tinh = isset($_POST["gioi_tinh"]) ? $_POST["gioi_tinh"] : "";
        $ho_ten = isset($_POST["ho_ten"]) ? $_POST["ho_ten"] : "";
        $alias = UtilityController::convert2Alias($ho_ten);
        $dien_thoai = isset($_POST["dien_thoai"]) ? $_POST["dien_thoai"] : "";
        $dia_chi = isset($_POST["dia_chi"]) ? $_POST["dia_chi"] : "";
        $checkDongY = isset($_POST["checkDongY"]) ? true : false;

        $dn_ten = isset($_POST["dn_ten"]) ? $_POST["dn_ten"] : "";
        $dn_alias = UtilityController::convert2Alias($dn_ten);
        $dn_dien_thoai = isset($_POST["dn_dien_thoai"]) ? $_POST["dn_dien_thoai"] : "";
        $dn_fax = isset($_POST["dn_fax"]) ? $_POST["dn_fax"] : "";
        $dn_dia_chi = isset($_POST["dn_dia_chi"]) ? $_POST["dn_dia_chi"] : "";
        $dn_tinh_thanh = isset($_POST["dn_tinh_thanh"]) ? $_POST["dn_tinh_thanh"] : "";
        $dn_quy_mo = isset($_POST["dn_quy_mo"]) ? $_POST["dn_quy_mo"] : "";
        $nganh_nghe = isset($_POST["nganh_nghe"]) ? $_POST["nganh_nghe"] : null;
        $dn_website = "";


        $Role = isset($_POST["ban_la"]) ? $_POST["ban_la"] : 3; // ứng viên 4 nhà tuyển dụng
        $ActiveCode = UtilityController::gen_uuid();
        $pdo = $this->getPDO();
        $LastNhaTuyenDungId = "";
        $LastUngVienId = "";

        try {
            $pdo->beginTransaction();
            $sql_user_user = "insert into sys_users(FullName,RoleId,Username,UserPassword,ActiveCode,CreatedBy,UpdatedBy)";
            $sql_user_user .= "VALUES('" . (($Role == 3) ? $ho_ten : $dn_ten) . "','{$Role}','{$email}','".md5($mat_khau)."','{$ActiveCode}','{$email}','{$email}')";

            $pdo->exec($sql_user_user);
            $LastId = $pdo->lastInsertId();
            if ($Role == 3) {
                $sql_ung_vien = "insert into ung_vien(UserId,HoTen,Alias,GioiTinhId,DienThoai,DiaChi,CreatedDate,UpdatedDate,CreatedBy,UpdatedBy)";
                $sql_ung_vien .= "VALUES ('{$LastId}','{$ho_ten}','{$alias}','{$gioi_tinh}','{$dien_thoai}','{$dia_chi}',now(),now(),'{$email}','{$email}')";
                $pdo->exec($sql_ung_vien);
                $LastUngVienId = $pdo->lastInsertId();
            } else {
                $Dm_goi_dich_vuModel = new Dm_goi_dich_vuModel();
                $Dm_goi_dich_vuModel->setAlias($Goi_dich_vu);
                $Obj_goi_dich_vu = $Dm_goi_dich_vuModel->getObj();
                $Goi_dich_vu_id = 1;
                if ($Obj_goi_dich_vu) {
                    $Goi_dich_vu_id = $Obj_goi_dich_vu->Id;
                }

                $sql_nha_tuyen_dung = "insert into nha_tuyen_dung(UserId,Name,Alias,DienThoai,Fax,DiaChi,TinhThanhId,Website,QuyMoId,CreatedDate,UpdatedDate,CreatedBy,UpdatedBy)";
                $sql_nha_tuyen_dung .= "VALUES ('{$LastId}','{$dn_ten}','{$dn_alias}','{$dn_dien_thoai}','{$dn_fax}','{$dn_dia_chi}','{$dn_tinh_thanh}','{$dn_website}','{$dn_quy_mo}',now(),now(),'{$email}','{$email}')";
                $pdo->exec($sql_nha_tuyen_dung);
                $LastNhaTuyenDungId = $pdo->lastInsertId();
                if (is_array($nganh_nghe)) {
                    if (!is_null($nganh_nghe)) {
                        $sql_insert_nganh_nghe = "insert into nha_tuyen_dung_nganh_nghe(NhaTuyenDungId,NganhNgheId,CreatedDate,UpdatedDate,CreatedBy,UpdatedBy) VALUES ";
                        foreach ($nganh_nghe as $value) {
                            $sql_insert_nganh_nghe .= "('{$LastNhaTuyenDungId}','{$value}',now(),now(),'{$email}','{$email}'),";
                        }
                        $sql_insert_nganh_nghe = rtrim($sql_insert_nganh_nghe, ",");
                        $pdo->exec($sql_insert_nganh_nghe);
                    }
                }
                $sql_goi_dich_vu = "insert into nha_tuyen_dung_goi_dich_vu(GoiDichVuId,NhaTuyenDungId,ApDungTu,ApDungDen,SoNgay,SoLuongTinDang,SoLuongUngVien,SoLuongTuyenGap,IsActive,ActiveDate,CreatedDate,UpdatedDate,CreatedBy,UpdatedBy)";
                $sql_goi_dich_vu .= "VALUES ('{$Goi_dich_vu_id}','{$LastNhaTuyenDungId}',now(),DATE_ADD(now(),INTERVAL (SELECT SoNgay FROM goi_dich_vu WHERE Id={$Goi_dich_vu_id}) DAY),{$Obj_goi_dich_vu->SoNgay},{$Obj_goi_dich_vu->SoLuongTinDang},{$Obj_goi_dich_vu->SoLuongUngVien},{$Obj_goi_dich_vu->SoLuongTuyenGap},1,now(),now(),now(),'{$email}','{$email}')";
                $pdo->exec($sql_goi_dich_vu);
            }
            try {
                $Template_send_mailModel = new Template_send_mailModel();
                $Template_send_mailModel->setName("ACTIVE_ACCOUNT");
                $ObjTemplate = $Template_send_mailModel->getObj();
                $StrTemplate = "";
                if ($ObjTemplate) {
                    $StrTemplate = $ObjTemplate->NoiDung;
                }
                $UrlActive = ROOT_URL . "/kich-hoat-tai-khoan/" . $ActiveCode . ".html";
                $StrTemplate = str_replace("{username}", $email, $StrTemplate);
                $StrTemplate = str_replace("{password}", $mat_khau, $StrTemplate);
                $StrTemplate = str_replace("{link_active}", $UrlActive, $StrTemplate);

                $Send_mailModel = new Send_mailModel();
                $Send_mailModel->setMail($email);
                $Send_mailModel->setName($ho_ten);
                $Send_mailModel->setSubject("KÍCH HOẠT TÀI KHOẢN VIECNET.COM");
                $Send_mailModel->setBody($StrTemplate);
                $Send_mailModel->doSend();

                $Sys_usesr_onesignalModel = new Sys_usesr_onesignalModel();
                $List_app_id = $Sys_usesr_onesignalModel->getListAppIdAdmin();
                if (!is_null($List_app_id)) {
                    $array = array();
                    foreach ($List_app_id as $value) {
                        $array[] = $value["AppId"];
                    }
                    $Tin_nhan_thong_baoModel = new Tin_nhan_thong_baoModel();
                    $url = ROOT_ADMIN_URL;
                    if ($Role == 3) {
                        $url = ROOT_ADMIN_URL . "/index.php?ctl=Ung_vien&act=update&id=" . $LastUngVienId . "&tabid=71";

                        $Tin_nhan_thong_baoModel->setNoiDung("Vừa có ứng viên " . $ho_ten . " đăng ký tài khoản viecnet.com");
                    } else {
                        $url = ROOT_ADMIN_URL . "/index.php?ctl=Tin_tuyen_dung&act=update&id=" . $LastNhaTuyenDungId . "&tabid=73";
                        $Tin_nhan_thong_baoModel->setNoiDung("Vừa có nhà tuyển dụng " . $dn_ten . " đăng ký tài khoản viecnet.com");
                    }
                    $Tin_nhan_thong_baoModel->setUserReciveds($array);
                    $Tin_nhan_thong_baoModel->sendNotificationWidthAppId($url);
                }
            } catch (Exception $exc) {
                
            }



            $pdo->commit();
            return true;
        } catch (Exception $exc) {
            $pdo->rollBack();
            echo $exc->getTraceAsString();
        }
        return false;
    }

    public function dangky_facebook($_FacebookId, $_FullName, $_Email) {
        $pass_rand = rand(1111, 9999);
        $pass = md5($pass_rand);
        $email = $_Email;
        $mat_khau = $pass;
        $gioi_tinh = 1;
        $ho_ten = $_FullName;
        $alias = UtilityController::convert2Alias($ho_ten);
        $dien_thoai = "";
        $dia_chi = "";
        $checkDongY = true;

        $Role = isset($array["ban_la"]) ? $array["ban_la"] : 3; // ứng viên 4 nhà tuyển dụng        
        $pdo = $this->getPDO();
        try {
            $pdo->beginTransaction();
            $sql_user_user = "insert into sys_users(FullName,RoleId,Username,UserPassword,IsActive,FacebookId,CreatedBy,UpdatedBy)";
            $sql_user_user .= "VALUES('{$ho_ten}','{$Role}','{$email}','{$mat_khau}',1,'{$_FacebookId}','{$email}','{$email}')";
            echo $sql_user_user;
            $pdo->exec($sql_user_user);
            $LastId = $pdo->lastInsertId();
            if ($Role == 3) {
                $sql_ung_vien = "insert into ung_vien(UserId,HoTen,Alias,GioiTinhId,DienThoai,DiaChi,CreatedDate,UpdatedDate,CreatedBy,UpdatedBy)";
                $sql_ung_vien .= "VALUES ('{$LastId}','{$ho_ten}','{$alias}','{$gioi_tinh}','{$dien_thoai}','{$dia_chi}',now(),now(),'{$email}','{$email}')";
                $pdo->exec($sql_ung_vien);
            } else {
                $sql_nha_tuyen_dung = "insert into nha_tuyen_dung(UserId,Name,Alias,DienThoai,Fax,DiaChi,TinhThanhId,Website,QuyMoId,CreatedDate,UpdatedDate,CreatedBy,UpdatedBy)";
                $sql_nha_tuyen_dung .= "VALUES ('{$LastId}','{$dn_ten}','{$dn_alias}','{$dn_dien_thoai}','{$dn_fax}','{$dn_dia_chi}','{$dn_tinh_thanh}','{$dn_website}','{$dn_quy_mo}',now(),now(),'{$email}','{$email}')";
                $pdo->exec($sql_nha_tuyen_dung);
                $LastNhaTuyenDungId = $pdo->lastInsertId();
                if (is_array($nganh_nghe)) {
                    if (!is_null($nganh_nghe)) {
                        $sql_insert_nganh_nghe = "insert into nha_tuyen_dung_nganh_nghe(NhaTuyenDungId,NganhNgheId,CreatedDate,UpdatedDate,CreatedBy,UpdatedBy) VALUES ";
                        foreach ($nganh_nghe as $value) {
                            $sql_insert_nganh_nghe .= "('{$LastNhaTuyenDungId}','{$value}',now(),now(),'{$email}','{$email}'),";
                        }
                        $sql_insert_nganh_nghe = rtrim($sql_insert_nganh_nghe, ",");
                        $pdo->exec($sql_insert_nganh_nghe);
                    }
                }
            }

            try {
                $Template_send_mailModel = new Template_send_mailModel();
                $Template_send_mailModel->setName("SEND_ACCOUNT_UNG_VIEN");
                $ObjTemplate = $Template_send_mailModel->getObj();
                $StrTemplate = "";
                if ($ObjTemplate) {
                    $StrTemplate = $ObjTemplate->NoiDung;
                }
                $UrlActive = ROOT_URL . "/dang-nhap.html";
                $StrTemplate = str_replace("{hoten}", $_FullName, $StrTemplate);
                $StrTemplate = str_replace("{username}", $_Email, $StrTemplate);
                $StrTemplate = str_replace("{password}", $pass_rand, $StrTemplate);
                $StrTemplate = str_replace("{link}", $UrlActive, $StrTemplate);

                $Send_mailModel = new Send_mailModel();
                $Send_mailModel->setMail($_Email);
                $Send_mailModel->setName($_FullName);
                $Send_mailModel->setSubject("THÔNG TIN TÀI KHOẢN VIECNET.COM");
                $Send_mailModel->setBody($StrTemplate);
                $Send_mailModel->doSend();
            } catch (Exception $exc) {
                
            }

            $pdo->commit();

            return true;
        } catch (Exception $exc) {
            $pdo->rollBack();
            echo $exc->getTraceAsString();
        }
        return false;
    }

    public function dangky_google($_GoogleId, $_FullName, $_Email, $_Sex) {
        $pass_rand = rand(1111, 9999);
        $pass = md5($pass_rand);
        $email = $_Email;
        $mat_khau = $pass;
        $gioi_tinh = $_Sex;
        $ho_ten = $_FullName;
        $alias = UtilityController::convert2Alias($ho_ten);
        $dien_thoai = "";
        $dia_chi = "";
        $checkDongY = true;

        $Role = isset($array["ban_la"]) ? $array["ban_la"] : 3; // ứng viên 4 nhà tuyển dụng        
        $pdo = $this->getPDO();
        try {
            $pdo->beginTransaction();
            $sql_user_user = "insert into sys_users(FullName,RoleId,Username,UserPassword,IsActive,GoogleId,CreatedBy,UpdatedBy)";
            $sql_user_user .= "VALUES('{$ho_ten}','{$Role}','{$email}','{$mat_khau}',1,'{$_GoogleId}','{$email}','{$email}')";
            $pdo->exec($sql_user_user);
            $LastId = $pdo->lastInsertId();
            if ($Role == 3) {
                $sql_ung_vien = "insert into ung_vien(UserId,HoTen,Alias,GioiTinhId,DienThoai,DiaChi,CreatedDate,UpdatedDate,CreatedBy,UpdatedBy)";
                $sql_ung_vien .= "VALUES ('{$LastId}','{$ho_ten}','{$alias}','{$gioi_tinh}','{$dien_thoai}','{$dia_chi}',now(),now(),'{$email}','{$email}')";
                $pdo->exec($sql_ung_vien);
            } else {
                $sql_nha_tuyen_dung = "insert into nha_tuyen_dung(UserId,Name,Alias,DienThoai,Fax,DiaChi,TinhThanhId,Website,QuyMoId,CreatedDate,UpdatedDate,CreatedBy,UpdatedBy)";
                $sql_nha_tuyen_dung .= "VALUES ('{$LastId}','{$dn_ten}','{$dn_alias}','{$dn_dien_thoai}','{$dn_fax}','{$dn_dia_chi}','{$dn_tinh_thanh}','{$dn_website}','{$dn_quy_mo}',now(),now(),'{$email}','{$email}')";
                $pdo->exec($sql_nha_tuyen_dung);
                $LastNhaTuyenDungId = $pdo->lastInsertId();
                if (is_array($nganh_nghe)) {
                    if (!is_null($nganh_nghe)) {
                        $sql_insert_nganh_nghe = "insert into nha_tuyen_dung_nganh_nghe(NhaTuyenDungId,NganhNgheId,CreatedDate,UpdatedDate,CreatedBy,UpdatedBy) VALUES ";
                        foreach ($nganh_nghe as $value) {
                            $sql_insert_nganh_nghe .= "('{$LastNhaTuyenDungId}','{$value}',now(),now(),'{$email}','{$email}'),";
                        }
                        $sql_insert_nganh_nghe = rtrim($sql_insert_nganh_nghe, ",");
                        $pdo->exec($sql_insert_nganh_nghe);
                    }
                }
            }

            try {
                $Template_send_mailModel = new Template_send_mailModel();
                $Template_send_mailModel->setName("SEND_ACCOUNT_UNG_VIEN");
                $ObjTemplate = $Template_send_mailModel->getObj();
                $StrTemplate = "";
                if ($ObjTemplate) {
                    $StrTemplate = $ObjTemplate->NoiDung;
                }
                $UrlActive = ROOT_URL . "/dang-nhap.html";
                $StrTemplate = str_replace("{hoten}", $_FullName, $StrTemplate);
                $StrTemplate = str_replace("{username}", $_Email, $StrTemplate);
                $StrTemplate = str_replace("{password}", $pass_rand, $StrTemplate);
                $StrTemplate = str_replace("{link}", $UrlActive, $StrTemplate);

                $Send_mailModel = new Send_mailModel();
                $Send_mailModel->setMail($_Email);
                $Send_mailModel->setName($_FullName);
                $Send_mailModel->setSubject("THÔNG TIN TÀI KHOẢN VIECNET.COM");
                $Send_mailModel->setBody($StrTemplate);
                $Send_mailModel->doSend();
            } catch (Exception $exc) {
                
            }

            $pdo->commit();

            return true;
        } catch (Exception $exc) {
            $pdo->rollBack();
            echo $exc->getTraceAsString();
        }
        return false;
    }

}
