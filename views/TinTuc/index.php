<?php
$root_ctl = "TinTuc";
?>
<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no-padding" style="margin-bottom: 10px">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->


                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                        <img src="<?= TEMPLATE_HOME_URL ?>/images/hinhnenbanner.jpg" alt="Los Angeles" style="width:100%;height: auto">
                    </div>
                    <div class="item">
                        <img src="<?= TEMPLATE_HOME_URL ?>/images/hinhnenbanner.jpg" alt="Los Angeles" style="width:100%;height: auto">
                    </div>
                    <div class="item">
                        <img src="<?= TEMPLATE_HOME_URL ?>/images/hinhnenbanner.jpg" alt="Los Angeles" style="width:100%;height: auto">
                    </div>
                </div>
                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no-padding">
            
            <?php
            if (!is_null($list)) {
                $i = 1;
                $Ids = '';
                foreach ($list as $value) {

                    $Ids .= $value['Id'] . ",";
                    ?>
                    <!-- about module -->
                    <a href="index.php?ctl=TinTuc&act=Chitiet&id=<?= $value["Id"] ?>">
                    <div class="row grow">
                        <div class="w3-container">
                            <div class="w3-panel w3-card no-padding" style="background-color: #fff; margin-top: 0">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no-padding">
                                    <div>
                                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 tourItemImage">
                                            <a href="index.php?ctl=TinTuc&act=Chitiet&id=<?= $value["Id"] ?>">

                                                <img class="img-responsive"  src="<?php echo $value["HinhAnh"] ?>">
                                            </a>
                                        </div>
                                        <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
                                            <div class="row v-margin-top-10">
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                    <span class="tourItemName">
                                                        <a href="index.php?ctl=TinTuc&act=Chitiet&id=<?= $value["Id"] ?>">
                                                            <?= $value["TenTinTuc"] ?>
                                                        </a>
                                                    </span><br>
                                                </div>
                                            </div>
                                            <div class="row v-margin-top-10">
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text_here">
                                                    <span class="ellipsis_text">
                                                        <?= $value["NoiDung"] ?>
                                                    </span><br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        </a>
                    <!-- end about module -->
                    <?php
                }
            }
            ?>

        </div>

    </div>
    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 tourSideBar" >
        <div class="panel panel-default">
            <div class="panel-heading" role="tab">
                <h4 class="panel-title">Tìm bài viết</h4>
            </div>
            <form name="myform" role="form" method="post" action="<?= ROOT_URL ?>/index.php?ctl=TinTuc">
                <div class="panel-collapse">
                    <div class="panel-body">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no-padding typeAHeadDiv" id="typeAHeadDiv">
                            <label></label>
                            <div class="input-group">
                                <input type="text" name="txtSearch" class="form-control input-group" >

                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-primary btn-flat" id="searchButton" style="padding: 6px 12px;"><i class="glyphicon glyphicon-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading" role="tab">
                <h4 class="panel-title">Các tin du lịch khác</h4>
            </div>
            <div class="panel-collapse">
                <div class="panel-body">
                    <?php
                    if (!is_null($listTinMoi)) {
                        foreach ($listTinMoi as $value) {
                            ?>
                            <div class="row">
                                <div class="col-xs-12 col-sm-3 col-md-12 col-lg-12">
                                    <a href="<?= ROOT_URL ?>/index.php?ctl=TinTuc&act=ChiTiet&Id=<?= $value["Id"] ?>">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no-padding">
                                            <?= $value["TenTinTuc"] ?>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>


    </div>

</div>
<script type="text/javascript">
    $(document).ready(function () {
        // SECTION ONE: basic demos/tests //

        // row 1 & 1.5
        var the_obj = $('.text_here').ThreeDots({
            max_rows: 5.5
        });
    });
</script>