<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;


$url=yii::$app->urlManager;

AppAsset::register($this);
?>
<?php $this->beginPage()?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">



    <link href="../Content/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../Content/bootstrap-theme.min.css" />
    <link rel="stylesheet" href="../Content/MdBootstrapPersianDateTimePicker/jquery.Bootstrap-PersianDateTimePicker.css" />

    <script src="../Scripts/jquery-3.1.0.min.js" type="text/javascript"></script>
    <script src="../Scripts/bootstrap.min.js" type="text/javascript"></script>




    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDytiHbT4YB3wvR10fJFcvHPoILnZCrILQ&callback=initMap"
            type="text/javascript"></script>
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="nav">
<?php $this->beginBody() ?>
 
<div class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 right_col">
                <div class="right_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="index-rtl.html" class="site_title"> <span>فروشگاه مریم بانو</span></a>

                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile">
                        <div class="profile_pic">

                        </div>
                        <div class="profile_info">
                            <span>خوش آمدید،</span>
<!--                            <img src="" style="width: 150px ;">-->
                            
                        </div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />
                    <br />

                    <br />
                    <br />
                    <br/>
                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
<!--                            <h3>مدیر</h3>-->
                            <ul class="nav side-menu">
                                <li><a><i class="fa fa-home"></i> خانه </a>
                                </li>
                                <li><a href="<?=$url->createAbsoluteUrl(['addresphone/update','id'=>1])?>"><i class="fa fa-home"></i> ویرایش آدرس</a>
                                </li>

                                <li><a><i class="fa fa-female"></i>دسته بندی محصولات<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="<?=$url->createAbsoluteUrl('categoryproduct/create')?>">ثبت دسته جدید</a></li>
                                        <li><a href="<?=$url->createAbsoluteUrl('categoryproduct/index')?>">مدیریت دسته ها</a></li>
                                    </ul>
                                </li>

                                <li><a><i class="fa fa-group"></i>جنس<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="<?=$url->createAbsoluteUrl('typeproduct/create')?>">ثبت جنس جدید</a></li>
                                        <li><a href="<?=$url->createAbsoluteUrl('typeproduct/index')?>">مدیریت جنس ها</a></li>
                                    </ul>
                                </li>


                                <li><a><i class="fa fa-file-text-o"></i>رنگ بندی<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="<?=$url->createAbsoluteUrl(['color/create','id'=>0])?>">ثبت رنگ جدید</a></li>
                                        <li><a href="<?=$url->createAbsoluteUrl(['color/index','id'=>0])?>">مدیریت رنگ ها</a></li>
                                    </ul>
                                </li>

                                <li><a><i class="fa fa-file-text-o"></i>برند<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="<?=$url->createAbsoluteUrl('brand/create')?>">ثبت برند جدید</a></li>
                                        <li><a href="<?=$url->createAbsoluteUrl('brand/index')?>">مدیریت برند ها</a></li>
                                    </ul>
                                </li>

                                <li><a><i class="fa fa-file-text-o"></i>انبار<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="<?=$url->createAbsoluteUrl('exist/index')?>">مدیریت انبار</a></li>
                                    </ul>
                                </li>


                                <li><a><i class="fa fa-gift"></i>تخفیفات<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="<?=$url->createAbsoluteUrl('discount/create')?>">ثبت تخفیف جدید</a></li>
                                        <li><a href="<?=$url->createAbsoluteUrl('discount/index')?>">مدیریت تخفیفات ها</a></li>
                                    </ul>
                                </li>

                                <li><a><i class="fa fa-suitcase "></i> محصولات<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="<?=$url->createAbsoluteUrl('product/create')?>">ثبت محصول جدید</a></li>
                                        <li><a href="<?=$url->createAbsoluteUrl('product/index')?>">مدیریت محصول ها</a></li>
                                    </ul>
                                </li>

                                <li><a><i class="fa fa-file-text-o"></i>برگه <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="<?=$url->createAbsoluteUrl('page/create')?>">ثبت برگه جدید</a></li>
                                        <li><a href="<?=$url->createAbsoluteUrl('page/index')?>">مدیریت برگه ها</a></li>
                                    </ul>
                                </li>

                                <li><a><i class="fa fa-edit"></i>پست<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="<?=$url->createAbsoluteUrl('طططشة/create')?>"> ثبت پست جدید</a></li>
                                        <li><a href="<?=$url->createAbsoluteUrl('post/index')?>">مدیریت پست ها</a></li>
                                    </ul>
                                </li>

                                <li><a><i class="fa fa-tags"></i>مدیریت دسته بندی<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="<?=$url->createAbsoluteUrl('category/index')?>">مدیریت دسته بندی</a></li>
                                        <li><a href="<?=$url->createAbsoluteUrl('category/create')?>">افزودن دسته جدید</a></li>
                                    </ul>
                                </li>

                                <li><a><i class="fa fa-tags"></i>تعریف هزینه ارسال<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="<?=$url->createAbsoluteUrl(['deliver/view','id'=>1])?>">تیپاکس</a></li>
                                        <li><a href="<?=$url->createAbsoluteUrl(['deliver/view','id'=>2])?>">پست</a></li>
                                        <li><a href="<?=$url->createAbsoluteUrl(['deliver/view','id'=>3])?>"> پیک موتوری</a></li>
                                    </ul>
                                </li>


                                <li><a><i class="fa fa-file-image-o"></i>گالری<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="<?=$url->createAbsoluteUrl('gallery/create')?>">آپلود عکس جدید</a></li>
                                        <li><a href="<?=$url->createAbsoluteUrl('gallery/index')?>">مدیریت عکس ها</a></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-group"></i>کاربران <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="<?=$url->createAbsoluteUrl('site/signup')?>">ثبت کاربر جدید</a></li>
                                        <li><a href="<?=$url->createAbsoluteUrl('profile/index')?>">مدیریت کاربران</a></li>
                                    </ul>
                                </li>






                                <li><a href="<?=$url->createAbsoluteUrl(['pardakht/index','flag'=>1])?>">درخواست افزایش اعتبار</span></a></a>
                                   
                                </li>


                                <li><a href="<?=$url->createAbsoluteUrl(['site/list'])?>">شماره تماس مشتریان</span></a></a>

                                </li>

                                </li>
                                <?php
                                $query=\backend\models\TblSodorFactor::find()->where(['visibel'=>0])->andwhere(['resive'=>0])->andwhere(['confirm'=>1])->count();
                                

                                ?>
                                <li><a><i class="fa fa-shopping-bag"></i>   فاکتور<span class="badge bg-red"><?=$query?></span> <span class="fa fa-chevron-down"></span></span></a></a>
                                    <ul class="nav child_menu">
                                        <li><a href="<?=$url->createAbsoluteUrl(['pardakht/index','flag'=>0])?>">فاکتور های در انتظار تایید </a>
                                        <li><a href="<?=$url->createAbsoluteUrl(['factor/index','resive'=>0 ,'visibel'=>0,'print'=>0])?>">فاکتور های جدید</li>
                                        <li><a href="<?=$url->createAbsoluteUrl(['factor/index','resive'=>0 ,'visibel'=>1,'print'=>0])?>">  بسته بندی فاکتور</a></li>
                                        <li><a href="<?=$url->createAbsoluteUrl(['factor/index','resive'=>0 ,'visibel'=>1,'print'=>1])?>">فاکتور های در حال ارسال</a></li>
                                        <li><a href="<?=$url->createAbsoluteUrl(['factor/index','resive'=>1 ,'visibel'=>1,'print'=>1])?>">فاکتور های ارسال شده</a></li>
                                        <li><a href="<?=$url->createAbsoluteUrl(['pardakht/index','flag'=>3])?>">فاکتور های  تایید نشده </a>

                                    </ul>
                                </li>



                                <li><a href="<?=$url->createAbsoluteUrl('message/index')?>" ><i class="fa fa-comments"></i>مدیریت پیام ها</span></a>
                                </li>



                                <li><a><i class="fa fa-shopping-bag"></i>  مرجوعی<span class="fa fa-chevron-down"></span></span></a></a>
                                    <ul class="nav child_menu">
                                        <li><a href="<?=$url->createAbsoluteUrl(['replace/index'])?>">مدیریت جنس های برگشتی</li>

                                    </ul>
                                </li>

                            </ul>
                        </div>

                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="تنظیمات">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Lock">
                            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Logout">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav" >
                <div class="nav_menu">
                    <nav>

                        <ul class="nav navbar-nav navbar-left">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle"         data-toggle="dropdown" aria-expanded="false">

                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu pull-left">
                                    
                                    <?php $profile=\backend\models\Tblprofile::find()->where(['user_id'=>Yii::$app->user->getId()])->one()?>
                                    
                                    
                                   <li><a href="<?=$url->createAbsoluteUrl(['profile/update','id'=>$profile->id])?>"> پروفایل</a></li>
                                    <li><a href="javascript:;">کمک</a></li>
                                    <li><a href="<?=$url->createAbsoluteUrl('site/logout')?>"><i class="fa fa-sign-out pull-left"></i> خروج</a></li>
                                </ul>
                            </li>

                            <li role="presentation" class="dropdown">
                                <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-envelope-o"></i>
                                    <span class="badge bg-green">6</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="left_col" role="main" >
                <div class="" style="height: 100%">

                    <div  >
                        <?= Breadcrumbs::widget([
                            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        ]) ?>
                        <?= Alert::widget()?>
                        <div class="row" style="height: 100%"><?= $content ?></div>

                    </div>
                </div>
            </div>
            <!-- /page content -->

            <!-- footer content -->

        </div>
    </div>
    <footer class="footer" >
        <div class="pull-right">
            طراحی و توسعه توسط <a href="https://no-et.com">شرکت برنامه نویسی توسعه گروپ</a>
        </div>
        <div class="clearfix"></div>
    </footer>
</div>




<?php $this->endBody() ?>

<!--<script src="../Scripts/MdBootstrapPersianDateTimePicker/jalaali.js" type="text/javascript"></script>-->
<!--<script src="../Scripts/MdBootstrapPersianDateTimePicker/jquery.Bootstrap-PersianDateTimePicker.js" type="text/javascript"></script>-->
<!--<script>-->
<!--    $(document).ready(function() {-->
<!--        //define chart clolors ( you maybe add more colors if you want or flot will add it automatic )-->
<!--        var chartColours = ['#96CA59', '#3F97EB', '#72c380', '#6f7a8a', '#f7cb38', '#5a8022', '#2c7282'];-->
<!---->
<!--        //generate random number for charts-->
<!--        randNum = function() {-->
<!--            return (Math.floor(Math.random() * (1 + 40 - 20))) + 20;-->
<!--        };-->
<!---->
<!--        var d1 = [];-->
<!--        //var d2 = [];-->
<!---->
<!--        //here we generate data for chart-->
<!--        for (var i = 0; i < 30; i++) {-->
<!--            d1.push([new Date(Date.today().add(i).days()).getTime(), randNum() + i + i + 10]);-->
<!--            //    d2.push([new Date(Date.today().add(i).days()).getTime(), randNum()]);-->
<!--        }-->
<!---->
<!--        var chartMinDate = d1[0][0]; //first day-->
<!--        var chartMaxDate = d1[20][0]; //last day-->
<!---->
<!--        var tickSize = [1, "day"];-->
<!--        var tformat = "%d/%m/%y";-->
<!---->
<!--        //graph options-->
<!--        var options = {-->
<!--            grid: {-->
<!--                show: true,-->
<!--                aboveData: true,-->
<!--                color: "#3f3f3f",-->
<!--                labelMargin: 10,-->
<!--                axisMargin: 0,-->
<!--                borderWidth: 0,-->
<!--                borderColor: null,-->
<!--                minBorderMargin: 5,-->
<!--                clickable: true,-->
<!--                hoverable: true,-->
<!--                autoHighlight: true,-->
<!--                mouseActiveRadius: 100-->
<!--            },-->
<!--            series: {-->
<!--                lines: {-->
<!--                    show: true,-->
<!--                    fill: true,-->
<!--                    lineWidth: 2,-->
<!--                    steps: false-->
<!--                },-->
<!--                points: {-->
<!--                    show: true,-->
<!--                    radius: 4.5,-->
<!--                    symbol: "circle",-->
<!--                    lineWidth: 3.0-->
<!--                }-->
<!--            },-->
<!--            legend: {-->
<!--                position: "ne",-->
<!--                margin: [0, -25],-->
<!--                noColumns: 0,-->
<!--                labelBoxBorderColor: null,-->
<!--                labelFormatter: function(label, series) {-->
<!--                    // just add some space to labes-->
<!--                    return label + '&nbsp;&nbsp;';-->
<!--                },-->
<!--                width: 40,-->
<!--                height: 1-->
<!--            },-->
<!--            colors: chartColours,-->
<!--            shadowSize: 0,-->
<!--            tooltip: true, //activate tooltip-->
<!--            tooltipOpts: {-->
<!--                content: "%s: %y.0",-->
<!--                xDateFormat: "%d/%m",-->
<!--                shifts: {-->
<!--                    x: -30,-->
<!--                    y: -50-->
<!--                },-->
<!--                defaultTheme: false-->
<!--            },-->
<!--            yaxis: {-->
<!--                min: 0-->
<!--            },-->
<!--            xaxis: {-->
<!--                mode: "time",-->
<!--                minTickSize: tickSize,-->
<!--                timeformat: tformat,-->
<!--                min: chartMinDate,-->
<!--                max: chartMaxDate-->
<!--            }-->
<!--        };-->
<!--        var plot = $.plot($("#placeholder33x"), [{-->
<!--            label: "ایمیل ارسال شده",-->
<!--            data: d1,-->
<!--            lines: {-->
<!--                fillColor: "rgba(150, 202, 89, 0.12)"-->
<!--            }, //#96CA59 rgba(150, 202, 89, 0.42)-->
<!--            points: {-->
<!--                fillColor: "#fff"-->
<!--            }-->
<!--        }], options);-->
<!--    });-->
<!--</script>-->
<!--<!-- /Flot -->-->
<!---->
<!--<!-- jQuery Sparklines -->-->
<!--<script>-->
<!--    $(document).ready(function() {-->
<!--        $(".sparkline_one").sparkline([2, 4, 3, 4, 5, 4, 5, 4, 3, 4, 5, 6, 4, 5, 6, 3, 5, 4, 5, 4, 5, 4, 3, 4, 5, 6, 7, 5, 4, 3, 5, 6], {-->
<!--            type: 'bar',-->
<!--            height: '125',-->
<!--            barWidth: 13,-->
<!--            colorMap: {-->
<!--                '7': '#a1a1a1'-->
<!--            },-->
<!--            barSpacing: 2,-->
<!--            barColor: '#26B99A'-->
<!--        });-->
<!---->
<!--        $(".sparkline11").sparkline([2, 4, 3, 4, 5, 4, 5, 4, 3, 4, 6, 2, 4, 3, 4, 5, 4, 5, 4, 3], {-->
<!--            type: 'bar',-->
<!--            height: '40',-->
<!--            barWidth: 8,-->
<!--            colorMap: {-->
<!--                '7': '#a1a1a1'-->
<!--            },-->
<!--            barSpacing: 2,-->
<!--            barColor: '#26B99A'-->
<!--        });-->
<!---->
<!--        $(".sparkline22").sparkline([2, 4, 3, 4, 7, 5, 4, 3, 5, 6, 2, 4, 3, 4, 5, 4, 5, 4, 3, 4, 6], {-->
<!--            type: 'line',-->
<!--            height: '40',-->
<!--            width: '200',-->
<!--            lineColor: '#26B99A',-->
<!--            fillColor: '#ffffff',-->
<!--            lineWidth: 3,-->
<!--            spotColor: '#34495E',-->
<!--            minSpotColor: '#34495E'-->
<!--        });-->
<!--    });-->
<!--</script>-->
<!--<!-- /jQuery Sparklines -->-->
<!---->
<!--<!-- Doughnut Chart -->-->
<!--<script>-->
<!--    $(document).ready(function() {-->
<!--        var canvasDoughnut,-->
<!--            options = {-->
<!--                legend: false,-->
<!--                responsive: false-->
<!--            };-->
<!---->
<!--        new Chart(document.getElementById("canvas1i"), {-->
<!--            type: 'doughnut',-->
<!--            tooltipFillColor: "rgba(51, 51, 51, 0.55)",-->
<!--            data: {-->
<!--                labels: [-->
<!--                    "سیمبیان",-->
<!--                    "بلک بری",-->
<!--                    "سایر",-->
<!--                    "اندروید",-->
<!--                    "IOS"-->
<!--                ],-->
<!--                datasets: [{-->
<!--                    data: [15, 20, 30, 10, 30],-->
<!--                    backgroundColor: [-->
<!--                        "#BDC3C7",-->
<!--                        "#9B59B6",-->
<!--                        "#E74C3C",-->
<!--                        "#26B99A",-->
<!--                        "#3498DB"-->
<!--                    ],-->
<!--                    hoverBackgroundColor: [-->
<!--                        "#CFD4D8",-->
<!--                        "#B370CF",-->
<!--                        "#E95E4F",-->
<!--                        "#36CAAB",-->
<!--                        "#49A9EA"-->
<!--                    ]-->
<!---->
<!--                }]-->
<!--            },-->
<!--            options: options-->
<!--        });-->
<!---->
<!--        new Chart(document.getElementById("canvas1i2"), {-->
<!--            type: 'doughnut',-->
<!--            tooltipFillColor: "rgba(51, 51, 51, 0.55)",-->
<!--            data: {-->
<!--                labels: [-->
<!--                    "سیمبین",-->
<!--                    "بلاک بری",-->
<!--                    "سایر",-->
<!--                    "اندروید",-->
<!--                    "IOS"-->
<!--                ],-->
<!--                datasets: [{-->
<!--                    data: [15, 20, 30, 10, 30],-->
<!--                    backgroundColor: [-->
<!--                        "#BDC3C7",-->
<!--                        "#9B59B6",-->
<!--                        "#E74C3C",-->
<!--                        "#26B99A",-->
<!--                        "#3498DB"-->
<!--                    ],-->
<!--                    hoverBackgroundColor: [-->
<!--                        "#CFD4D8",-->
<!--                        "#B370CF",-->
<!--                        "#E95E4F",-->
<!--                        "#36CAAB",-->
<!--                        "#49A9EA"-->
<!--                    ]-->
<!---->
<!--                }]-->
<!--            },-->
<!--            options: options-->
<!--        });-->
<!---->
<!--        new Chart(document.getElementById("canvas1i3"), {-->
<!--            type: 'doughnut',-->
<!--            tooltipFillColor: "rgba(51, 51, 51, 0.55)",-->
<!--            data: {-->
<!--                labels: [-->
<!--                    "سمبین",-->
<!--                    "بلاک بری",-->
<!--                    "سایر",-->
<!--                    "اندروید",-->
<!--                    "IOS"-->
<!--                ],-->
<!--                datasets: [{-->
<!--                    data: [15, 20, 30, 10, 30],-->
<!--                    backgroundColor: [-->
<!--                        "#BDC3C7",-->
<!--                        "#9B59B6",-->
<!--                        "#E74C3C",-->
<!--                        "#26B99A",-->
<!--                        "#3498DB"-->
<!--                    ],-->
<!--                    hoverBackgroundColor: [-->
<!--                        "#CFD4D8",-->
<!--                        "#B370CF",-->
<!--                        "#E95E4F",-->
<!--                        "#36CAAB",-->
<!--                        "#49A9EA"-->
<!--                    ]-->
<!---->
<!--                }]-->
<!--            },-->
<!--            options: options-->
<!--        });-->
<!--    });-->
<!--</script>-->
<!--<!-- /Doughnut Chart -->-->
<!---->
<!--<!-- bootstrap-daterangepicker -->-->
<!--<script type="text/javascript">-->
<!--    $(document).ready(function() {-->
<!--        moment.locale('fa');-->
<!--        var cb = function(start, end, label) {-->
<!--            console.log(start.toISOString(), end.toISOString(), label);-->
<!--            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));-->
<!--        };-->
<!---->
<!--        var optionSet1 = {-->
<!--            startDate: moment().subtract(29, 'days'),-->
<!--            endDate: moment(),-->
<!--            minDate: '01/01/2012',-->
<!--            maxDate: '12/31/2015',-->
<!--            dateLimit: {-->
<!--                days: 60-->
<!--            },-->
<!--            showDropdowns: true,-->
<!--            showWeekNumbers: true,-->
<!--            timePicker: false,-->
<!--            timePickerIncrement: 1,-->
<!--            timePicker12Hour: true,-->
<!--            ranges: {-->
<!--                'امروز': [moment(), moment()],-->
<!--                'دیروز': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],-->
<!--                '7 روز گذشته': [moment().subtract(6, 'days'), moment()],-->
<!--                '30 روز گذشته': [moment().subtract(29, 'days'), moment()],-->
<!--                'این ماه': [moment().startOf('month'), moment().endOf('month')],-->
<!--                'ماه پیش': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]-->
<!--            },-->
<!--            opens: 'left',-->
<!--            buttonClasses: ['btn btn-default'],-->
<!--            applyClass: 'btn-small btn-primary',-->
<!--            cancelClass: 'btn-small',-->
<!--            format: 'MM/DD/YYYY',-->
<!--            separator: ' to ',-->
<!--            locale: {-->
<!--                applyLabel: 'Submit',-->
<!--                cancelLabel: 'Clear',-->
<!--                fromLabel: 'From',-->
<!--                toLabel: 'To',-->
<!--                customRangeLabel: 'Custom',-->
<!--                daysOfWeek: ['شنبه', 'یک', 'دو', 'سه', 'چهار', 'چنج', 'جمعه'],-->
<!--                monthNames: ['ژانویه', 'فبریه', 'مارس', 'فروردین', 'می', 'جون', 'جولای', 'آگوست', 'سپتابر', 'اوکتبر', 'نووامبر', 'دسامبر'],-->
<!--                firstDay: 1-->
<!--            }-->
<!--        };-->
<!--        $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));-->
<!--        $('#reportrange').daterangepicker(optionSet1, cb);-->
<!--        $('#reportrange').on('show.daterangepicker', function() {-->
<!--            console.log("show event fired");-->
<!--        });-->
<!--        $('#reportrange').on('hide.daterangepicker', function() {-->
<!--            console.log("hide event fired");-->
<!--        });-->
<!--        $('#reportrange').on('apply.daterangepicker', function(ev, picker) {-->
<!--            console.log("apply event fired, start/end dates are " + picker.startDate.format('MMMM D, YYYY') + " تا " + picker.endDate.format('MMMM D, YYYY'));-->
<!--        });-->
<!--        $('#reportrange').on('cancel.daterangepicker', function(ev, picker) {-->
<!--            console.log("cancel event fired");-->
<!--        });-->
<!--        $('#options1').click(function() {-->
<!--            $('#reportrange').data('daterangepicker').setOptions(optionSet1, cb);-->
<!--        });-->
<!--        $('#options2').click(function() {-->
<!--            $('#reportrange').data('daterangepicker').setOptions(optionSet2, cb);-->
<!--        });-->
<!--        $('#destroy').click(function() {-->
<!--            $('#reportrange').data('daterangepicker').remove();-->
<!--        });-->
<!--    });-->
<!--</script>-->
</body>
</html>
<?php $this->endPage() ?>
