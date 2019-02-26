
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card-title">
                        <h4>Thống kê số lượng tour được đặt</h4>
                    </div>
                </div>
            </div>
            <table id="myTable" class="table table-bordered table-striped dataTable no-footer" role="grid" aria-describedby="myTable_info">
                <thead>
                    <tr role="row">
                        <th class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" style="width: 250px;">Tên tour</th>
                        <th class="text-center sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" style="width: 107.4px;">Số lượng đặt</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!is_null($list)) {
                        $i = 1;
                        $Ids = '';
                        foreach ($list as $value) {
                            ?>
                            <tr>

                                <td><?= $value["TenTour"] ?></td>
                                <td class="text-right"><?php echo (number_format($value["so_luong_dat"])) ?></td>

                            </tr>
                            <?php
                        }
                    }
                    ?>                
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-title">
                <h4>10 tour được đặt nhiều nhất</h4>
            </div>
            <div class="row">
                <canvas id="soluongtourdat" height="400" width="400" style="display: block; width: 597px; height: 298px;"></canvas>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-title">
                <h4>Tour theo địa điểm</h4>
            </div>
            <div class="row">
                <canvas id="tourdiadiem" height="400" width="400" style="display: block; width: 597px; height: 298px;"></canvas>
            </div>
        </div>
    </div>
</div>

<script>
    //Thống kê daonh thu ngày
    var postPage = 'index.php?ctl=ThongKe&act=getSoLuongDatTour';
    var postData = {
        postType: "ajax"
    };

    var post = $.post(postPage, postData)
            .done(function (data) {
                data = JSON.parse(data);
                var TenTour = [];
                var SoLuong = [];
                var index;
                for (index = 0; index < data.length; ++index) {
                    TenTour.push(data[index]["TenTour"]);
                    SoLuong.push(data[index]["so_luong_dat"]);
                }
                // single bar chart
                var ctx = document.getElementById("soluongtourdat");
                ctx.height = 150;
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: TenTour,
                        datasets: [
                            {
                                label: "Số lần đặt",
                                data: SoLuong,
                                borderColor: "rgba(0, 123, 255, 0.9)",
                                borderWidth: "0",
                                backgroundColor: "rgba(0, 123, 255, 0.5)"
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        legend: {
                            display: false,
                            position: 'top',
                            labels: {
                                usePointStyle: true,
                                fontFamily: 'Montserrat'
                            }


                        },
                        scales: {
                            xAxes: [{
                display: false
            }],
                            yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                        }
                    }
                });
            })
            .fail(function () {

            });


//Thong Ke Tour Theo dia diem
    var postPage = 'index.php?ctl=ThongKe&act=getTourTheoDiaDiem';
    var postData = {
        postType: "ajax"
    };

    var post = $.post(postPage, postData)
            .done(function (data) {
                data = JSON.parse(data);
                var TenDiaDiem = [];
                var SoLuong = [];
                var index;
                for (index = 0; index < data.length; ++index) {
                    TenDiaDiem.push(data[index]["TenDiaDiem"]);
                    SoLuong.push(data[index]["SoLuong"]);
                }
                // single bar chart
                var ctx = document.getElementById("tourdiadiem");
                ctx.height = 100;
                var myChart = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        datasets: [{
                                data: SoLuong,
                                backgroundColor: [
                                    "#FF3366",
                                    "rgba(0, 123, 255,0.9)",
                                    "rgba(0, 123, 255,0.7)",
                                    "rgba(0, 123, 255,0.5)",
                                    "#66FFFF",
                                    "#FF6699",
                                    "rgba(0,0,0,0.07)"
                                ],
                                hoverBackgroundColor: [
                                    "#FF3366",  
                                    "rgba(0, 123, 255,0.9)",
                                    "rgba(0, 123, 255,0.7)",
                                    "rgba(0, 123, 255,0.5)",
                                    "#66FFFF",
                                    "#FF6699",
                                    "rgba(0,0,0,0.07)"
                                ]

                            }],
                        labels: TenDiaDiem
                    },
                    options: {
                        responsive: true
                    }
                });
            })
            .fail(function () {

            });
</script>