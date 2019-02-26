<?php
session_start();
require_once '../../config.php';
require_once '../autoload.php';
$hopdong_model = new HopDongModel();
$Id = "";
if (isset($_GET["id"])) {
    $Id = $_GET["id"];
}
$hopdong_model->setId($Id);
$hopdong_obj = $hopdong_model->getObj();
?>
<html>
    <head>
        <title>In hợp đồng</title>
        <style type="text/css">
            #frmHopDong{
                font-family: "Time news Roman";
            }
            .f16{
                font-size: 16pt;
            }
            .f13{
                font-size: 13pt;
            }
            .bold{
                font-weight: bold;
            }
            .tabs{
                padding-left: 120px;
            }
            .jus{ text-align: justify}
        </style>
        <script type="text/javascript">
            function _print() {
                window.print();
                
            }
           
        </script>
    </head>
    <body onload="_print()" onfocus="window.close()">

        <table width="100%" id="frmHopDong">
            <tr>
                <td align="center">
                    <p class="f13 bold">
                        CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM<br>
                        Độc lập - Tự do - Hạnh phúc
                    </p>
                    <BR>
                    <p class="f16 bold">HỢP ĐỒNG HỢP TÁC<br>
                        <span class="f13 bold">Số: <?= (!is_null($hopdong_obj->getSoHD())) ? $hopdong_obj->getSoHD() : "" ?></span>
                    </p>
                </td>
            </tr>
            <tr>
                <td>
                    <p class="f13"><i>Căn cứ: </i></p>
                    <p class="f13 tabs jus"><i>- Bộ luật dân sự số 33/2005/QH11 ngày 14/6/2006</i></p>
                    <p class="f13 tabs jus"><i>- Nghị định 72/2013/NĐ-CP ngày 15/7/2013 quản lý, cung cấp, sử dụng dịch vụ Internet và thông tin trên mạng.</i></p>
                    <p class="f13 tabs jus"><i>- Thông tư số 09/2014/TT-BTTTT ngày 19/8/2014 quy định chi tiết hoạt động quản lý, cung cấp, sử dụng thông tin trên trang thông tin điện tử và Mạng xã hội của Bộ Thông tin và Truyền thông.</i></p>
                    <p class="f13 tabs jus"><i>- Xét nhu cầu của hai bên.</i></p>
                    </p>
                </td>
            </tr>
            <tr>
                <td><p class="f13">Hôm nay, ngày <?= date('d') ?> tháng <?= date('m') ?> năm <?= date('Y') ?>, chúng tôi gồm:</p></td>
            </tr>
            <tr>
                <td><strong>BÊN A: <?= COMPANY_TEN ?></strong></td>
            </tr>
            <tr>
                <td>
                    <table width="100%" class="f13">
                        <tr>
                            <td width="120px">Người đại diện:</td>
                            <td width="200px"><?= $hopdong_obj->getBenA_HoTen() ?></td>
                            <td>Chức vụ: </td>
                            <td><?= COMPANY_CHUCVU ?></td>
                        </tr>
                        <tr>
                            <td>Số CMND:</td>
                            <td colspan="3" ><?= $hopdong_obj->getBenA_SoCMND() ?></td>
                        </tr>
                        <tr>
                            <td>Địa chỉ:</td>
                            <td colspan="3"><?= $hopdong_obj->getBenA_DiaChi() ?></td>
                        </tr>
                        <tr>
                            <td>Điện thoại:</td>
                            <td colspan="3"><?= $hopdong_obj->getBenA_DienThoai() ?></td>
                        </tr>
                        <tr>
                            <td>Mã số thuế:</td>
                            <td colspan="3"><?= $hopdong_obj->getBenA_MST() ?></td>
                        </tr>

                        <tr>
                            <td>Tài khoản số:</td>
                            <td width="120px"><?= $hopdong_obj->getBenA_STK() ?></td>
                            <td width="120px">tại ngân hàng: </td>
                            <td><?= $hopdong_obj->getBenA_NganHang() ?></td>
                        </tr>

                    </table>
                </td>
            </tr>
            <tr>
                <td><strong>BÊN B: <?= $hopdong_obj->getBenB_HoTen() ?></strong></td>
            </tr>
            <tr>
                <td>
                    <table width="100%" class="f13">
                        <tr>
                            <td width="120px">Số CMND:</td>
                            <td ><?= $hopdong_obj->getBenB_SoCMND() ?></td>
                            <td width="200px">Chức vụ: </td>
                            <td><?= $hopdong_obj->getBenB_ChucVu() ?></td>
                        </tr>
                        <tr>
                            <td >Địa chỉ:</td>
                            <td colspan="3" ><?= $hopdong_obj->getBenB_DiaChi() ?></td>
                        </tr>
                        <tr>
                            <td>Điện thoại:</td>
                            <td colspan="3"><?= $hopdong_obj->getBenB_DienThoai() ?></td>
                        </tr>
                        <tr>
                            <td>Mã số thuế:</td>
                            <td colspan="3"><?= $hopdong_obj->getBenB_MST() ?></td>
                        </tr>

                        <tr>
                            <td>Tài khoản số:</td>
                            <td width="120px"><?= $hopdong_obj->getBenB_STK() ?></td>
                            <td> &nbsp; tại ngân hàng: </td>
                            <td><?= $hopdong_obj->getBenB_NganHang() ?></td>
                        </tr>

                    </table>
                </td>
            </tr>
            <tr>
                <td class="f13">
                    <i><strong>Hai bên cùng thống nhất ký kết Hợp đồng cộng tác với các điều khoản và nội dung như sau:</strong> </i>
                </td>
            </tr>
            <tr class="f13">
                <td><strong>Điều 1: </strong></td>
            </tr>
            <tr class="f13">
                <td>
                    <p>sadasdada</p>
                </td>
            </tr>
            <tr class="f13">
                <td><strong>Điều 2: </strong></td>
            </tr>
            <tr class="f13">
                <td>
                    <p>sadasdada</p>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%">
                        <tr>
                            <td width="50%" align="center">
                                <strong>ĐẠI DIỆN BÊN A</strong>
                                <br>
                                <br>
                                <i><?= (($hopdong_obj->getBenA_IsDaKy())) ? "(Đã ký)" : "" ?></i>
                                <br>
                                <br>
                                <strong><?= (!is_null($hopdong_obj->getBenA_HoTen())) ? $hopdong_obj->getBenA_HoTen() : "" ?></strong>
                            </td>
                            <td width="50%" align="center">
                                <strong>ĐẠI DIỆN BÊN B</strong>
                                <br>
                                <br>

                                <br>
                                <br>
                                <strong><?= $hopdong_obj->getBenB_HoTen() ?></strong>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </body>
</html>