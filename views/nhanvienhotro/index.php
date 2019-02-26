<section id="team" class="light-bg">
    <div class="row">
            <div class="col-lg-12 text-center">
                <div class="section-title">
                    <h2>Nhân viên hỗ trợ</h2>
                    <p>Mọi thắc mắc xin liên hệ nhân viên hỗ trợ của công ty sẽ giải đáp tận tình cho quý khách</p>
                </div>
            </div>
        </div>
    <div class="row">
    <?php
    if (!is_null($list)) {
        $i = 1;
        $Ids = '';
        foreach ($list as $value) {

            $Ids .= $value['Id'] . ",";
            ?>
            <!-- about module -->
            
            <!-- team member item -->
            <div class="col-md-6 text-center">
                <div class="team-item">
                    <div class="team-image">
                        <img src="<?php echo  $value['HinhAnh'] ?>" class="img-responsive" alt="author" style="    height: 100%;">
                    </div>
                    <div class="team-text">
                        <h3><?= $value['TenNV'] ?></h3>
                        <div class="team-position"><?= $value['TenCV'] ?></div>
                        <p>SDT: <?= $value['SDT'] ?> Email: <?= $value['Email'] ?></p>
                    </div>
                </div>
            </div>
            
        
            <!-- end about module -->
            <?php
        }
    }
    ?>
            </div>
</section>
