
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-title">
                <h4>Thống kê doanh thu theo ngày</h4>
            </div>
            <div class="row">
                <canvas id="thongkedoanhthungay" height="400" width="400" style="display: block; width: 597px; height: 298px;"></canvas>
            </div>
        </div>
    </div>

</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-title">
                <h4>Thống kê doanh thu theo tháng</h4>
            </div>
            <div class="row">
                <canvas id="thongkedoanhthuthang" height="400" width="400" style="display: block; width: 597px; height: 298px;"></canvas>
            </div>
        </div>
    </div>

</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-title">
                <h4>Thống kê doanh thu theo năm</h4>
            </div>
            <div class="row">
                <canvas id="thongkedoanhthunam" height="400" width="400" style="display: block; width: 597px; height: 298px;"></canvas>
            </div>
        </div>
    </div>

</div>
<script>
    //Thống kê daonh thu ngày
    var postPage = 'index.php?ctl=ThongKe&act=getDoanhThuNgay';
    var postData = {
        postType: "ajax"
    };

    var post = $.post(postPage, postData)
            .done(function (data) {
                data = JSON.parse(data);
                var DoanhThu = [];
                var Ngay = [];
                var index;
                for (index = 0; index < data.length; ++index) {
                    DoanhThu.push(data[index]["DoanhThu"]);
                    Ngay.push(toDate(data[index]["NgayTao"]));
                }
                var ctx = document.getElementById("thongkedoanhthungay");
                ctx.height = 150;
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: Ngay,
                        type: 'line',
                        defaultFontFamily: 'Montserrat',
                        datasets: [{
                                data: DoanhThu,
                                label: "Doanh thu",
                                backgroundColor: 'rgba(0,103,255,.15)',
                                borderColor: 'rgba(0,103,255,0.5)',
                                borderWidth: 3.5,
                                pointStyle: 'circle',
                                pointRadius: 5,
                                pointBorderColor: 'transparent',
                                pointBackgroundColor: 'rgba(0,103,255,0.5)'
                            }]
                    },
                    options: {
                        responsive: true,
                        
                        tooltips: {
                            mode: 'index',
                            titleFontSize: 12,
                            titleFontColor: '#000',
                            bodyFontColor: '#000',
                            backgroundColor: '#fff',
                            titleFontFamily: 'Montserrat',
                            bodyFontFamily: 'Montserrat',
                            cornerRadius: 3,
                            intersect: false
                        },
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
                                    display: true,
                                    gridLines: {
                                        display: false,
                                        drawBorder: false
                                    }
                                }],
                            yAxes: [{
                                    display: true,
                                    gridLines: {
                                        display: false,
                                        drawBorder: false
                                    }
                                }]  
                        },
                        title: {
                            display: false
                        }
                    }
                });
            })
            .fail(function () {

            });
    
    
    //Thống kê daonh thu tháng
    var postPage = 'index.php?ctl=ThongKe&act=getDoanhThuThang';
    var postData = {
        postType: "ajax"
    };

    var post = $.post(postPage, postData)
            .done(function (data) {
                data = JSON.parse(data);
                var DoanhThu = [];
                var Ngay = [];
                var index;
                for (index = 0; index < data.length; ++index) {
                    DoanhThu.push(data[index]["DoanhThu"]);
                    Ngay.push( "Tháng " + (new Date(data[index]["NgayTao"]).getMonth()));
                }
                var ctx = document.getElementById("thongkedoanhthuthang");
                ctx.height = 150;
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: Ngay,
                        type: 'line',
                        defaultFontFamily: 'Montserrat',
                        datasets: [{
                                data: DoanhThu,
                                label: "Doanh thu",
                                backgroundColor: 'rgba(0,103,255,.15)',
                                borderColor: 'rgba(0,103,255,0.5)',
                                borderWidth: 3.5,
                                pointStyle: 'circle',
                                pointRadius: 5,
                                pointBorderColor: 'transparent',
                                pointBackgroundColor: 'rgba(0,103,255,0.5)'
                            }]
                    },
                    options: {
                        responsive: true,
                        
                        tooltips: {
                            mode: 'index',
                            titleFontSize: 12,
                            titleFontColor: '#000',
                            bodyFontColor: '#000',
                            backgroundColor: '#fff',
                            titleFontFamily: 'Montserrat',
                            bodyFontFamily: 'Montserrat',
                            cornerRadius: 3,
                            intersect: false
                        },
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
                                    display: true,
                                    gridLines: {
                                        display: false,
                                        drawBorder: false
                                    }
                                }],
                            yAxes: [{
                                    display: true,
                                    gridLines: {
                                        display: false,
                                        drawBorder: false
                                    }
                                }]  
                        },
                        title: {
                            display: false
                        }
                    }
                });
            })
            .fail(function () {

            }); 
    
    //Thống kê daonh thu năm
    var postPage = 'index.php?ctl=ThongKe&act=getDoanhThuNam';
    var postData = {
        postType: "ajax"
    };

    var post = $.post(postPage, postData)
            .done(function (data) {
                data = JSON.parse(data);
                var DoanhThu = [];
                var Ngay = [];
                var index;
                for (index = 0; index < data.length; ++index) {
                    DoanhThu.push(data[index]["DoanhThu"]);
                    Ngay.push(data[index]["Nam"]);
                }
                var ctx = document.getElementById("thongkedoanhthunam");
                ctx.height = 150;
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: Ngay,
                        type: 'line',
                        defaultFontFamily: 'Montserrat',
                        datasets: [{
                                data: DoanhThu,
                                label: "Doanh thu",
                                backgroundColor: 'rgba(0,103,255,.15)',
                                borderColor: 'rgba(0,103,255,0.5)',
                                borderWidth: 3.5,
                                pointStyle: 'circle',
                                pointRadius: 5,
                                pointBorderColor: 'transparent',
                                pointBackgroundColor: 'rgba(0,103,255,0.5)'
                            }]
                    },
                    options: {
                        responsive: true,
                        
                        tooltips: {
                            mode: 'index',
                            titleFontSize: 12,
                            titleFontColor: '#000',
                            bodyFontColor: '#000',
                            backgroundColor: '#fff',
                            titleFontFamily: 'Montserrat',
                            bodyFontFamily: 'Montserrat',
                            cornerRadius: 3,
                            intersect: false
                        },
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
                                    display: true,
                                    gridLines: {
                                        display: false,
                                        drawBorder: false
                                    }
                                }],
                            yAxes: [{
                                    display: true,
                                    gridLines: {
                                        display: false,
                                        drawBorder: false
                                    }
                                }]  
                        },
                        title: {
                            display: false
                        }
                    }
                });
            })
            .fail(function () {

            });
    
</script>