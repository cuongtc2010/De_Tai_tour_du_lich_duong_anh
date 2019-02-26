<?php

class Sys_rolesController {

    const FOLDER_VIEW = 'Sys_roles';

    public function index() {
        if (isset($_SESSION["user_info_admin"])) {
            $tabid = '';
            if (isset($_GET["tabid"])) {
                $tabid = $_GET["tabid"];
            }
            $obj_check_role = UtilityController::checkRole();
            $_IsView = $obj_check_role["view"];
            $_IsUpdate = $obj_check_role["update"];
            $_IsDelete = $obj_check_role["delete"];
            if (!$_IsView) {
                UtilityController::gotoPage("index.php");
            }


            // Get số trang
            $page = isset($_POST["page"]) ? ((intval($_POST["page"]) < 0) ? 0 : intval($_POST["page"])) : 1;
            $start = ($page - 1) * SOTRANG;
            $num_rows_per_page = SOTRANG;

            $Sys_roles_model = new Sys_rolesModel();


            // lấy giá trị search

            $_Name = isset($_POST["Name"]) ? $_POST["Name"] : "";


            // delete
            if ($_IsDelete) {
                if (isset($_POST["btnDelete"])) {
                    if (isset($_POST["checklist"])) {
                        $array_id = $_POST["checklist"];
                        if ($array_id != null) {
                            $array_delete = array();
                            foreach ($array_id as $value) {
                                $array_delete[] = $value;
                            }
                            if ($Sys_roles_model->delete_array($array_delete)) {

                                UtilityController::messageSuccess();
                            } else {
                                UtilityController::messageError();
                            }
                        }
                    }
                }
            }


            // get list            
            if (!empty($_Name)) {
                $Sys_roles_model->setName($_Name);
            }



            $Sys_roles_model->setRowStart($start);
            $Sys_roles_model->setNumLinePerPage($num_rows_per_page);
            $list = $Sys_roles_model->getList();

            $rowrount = $Sys_roles_model->getCount();
            $phantrang = UtilityController::phantrang($rowrount, $num_rows_per_page, $page);
            require_once ADMIN_VIEW_DIRECTORY . DS . Sys_rolesController::FOLDER_VIEW . DS . "List.php";
        }
    }

    public function update() {
        if (isset($_SESSION["user_info_admin"])) {
            $tabid = '';
            if (isset($_GET["tabid"])) {
                $tabid = $_GET["tabid"];
            }
            $obj_check_role = UtilityController::checkRole();
            $_IsView = $obj_check_role["view"];
            $_IsUpdate = $obj_check_role["update"];
            if (!$_IsView) {
                UtilityController::gotoPage("index.php");
            }

            $_Id = "";
            $_Name = "";
            $_CompanyId = "";

            if (isset($_GET["id"])) {
                $_Id = $_GET["id"];
                $Sys_roles_model = new Sys_rolesModel();
                $Sys_roles_model->setId($_Id);
                $obj = $Sys_roles_model->getObj();
                if (!is_null($obj)) {
                    $_Id = $obj->getId();
                    $_Name = $obj->getName();
                }
            }
            require_once ADMIN_VIEW_DIRECTORY . DS . Sys_rolesController::FOLDER_VIEW . DS . "Update.php";
        }
    }

    public function doUpdate() {
        if (isset($_SESSION["user_info_admin"])) {
            $tabid = '';
            if (isset($_GET["tabid"])) {
                $tabid = $_GET["tabid"];
            }
            $obj_check_role = UtilityController::checkRole();
            $_IsUpdate = $obj_check_role["update"];
            if (!$_IsUpdate) {
                UtilityController::gotoPage("index.php");
                return;
            }

            $username = $_SESSION["user_info_admin"]["username"];
            $_Name = isset($_POST["Name"]) ? $_POST["Name"] : "";
            $_CompanyId = isset($_POST["CompanyId"]) ? $_POST["CompanyId"] : "";

            $Sys_roles_model = new Sys_rolesModel();
            if (!empty($_Name)) {
                $Sys_roles_model->setName($_Name);
            }

            $Sys_roles_model->setCreatedDate(date('Y-m-d H:i:s'));
            $Sys_roles_model->setUpdatedDate(date('Y-m-d H:i:s'));
            $Sys_roles_model->setCreatedBy($username);
            $Sys_roles_model->setUpdatedBy($username);
            $_Id = "";
            if (isset($_GET["id"])) {
                $_Id = $_GET["id"];
            }
            if (!empty($_Id)) {
                $Sys_roles_model->setId($_Id);
                if ($Sys_roles_model->update()) {
                    UtilityController::message("Đã cập nhật thành công");
                } else {
                    UtilityController::messageError();
                }
                UtilityController::gotoPage("index.php?ctl=Sys_roles&act=update&id=" . $_Id . "&tabid=" . $tabid);
            } else {
                if ($Sys_roles_model->insert()) {
                    UtilityController::message("Đã thêm mới thành công");
                } else {
                    UtilityController::messageError();
                }
                UtilityController::gotoPage("index.php?ctl=Sys_roles&act=update&tabid=" . $tabid);
            }
        }
    }

}
