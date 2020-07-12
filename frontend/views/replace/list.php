
<?php  $url=Yii::$app->urlManager; ?>
<div class="container">
    <div class="row col-md-10 col-md-offset-2 custyle">
        <table class="table table-striped custab">
            <thead>
            <tr>

                <th>نام محصول</th>
                <th class="text-center">Action</th>
            </tr>
            </thead>
            <tr>

                <?php foreach ($fac as $f) {
                $time = date_create($f->date_deliver);



                date_add($time, date_interval_create_from_date_string("10 days"));
                $date = strtotime(date_format($time, "Y-m-d"));

                $today_date = strtotime(date('Y/m/d'));

                if ($today_date <= $date) {

                $bag = \frontend\models\Tblbag::find()->where(['id_fac' => $f->id])->all();
                foreach ($bag as $b) {
                $pro = \frontend\models\Tblproduct::find()->where(['id' => $b->id_pro])->one();

                ?>
                
                <td style="text-align: left"><?=$pro->name?></td>
                <td class="text-center">
                    <?php
                    $check=\frontend\models\Tblreplace::find()->where(['id_bag'=>$b->id])->one();


                    if($check==null){
                  echo '<a class="btn btn-warning btn-xs" href="'.$url->createAbsoluteUrl(['replace/create','id_fac'=>$f->id,'id_pro'=>$pro->id,'id_bag'=>$b->id]).'"><span class="glyphicon glyphicon-edit"></span> ثبت</a>';

                    }
                    else {

                    if ($check->confirm == null) {
                        echo ' <a class="btn btn-info btn-xs" href="' . $url->createAbsoluteUrl(['replace/update', 'id' => $check->id]) . '"><span class="glyphicon glyphicon-remove"></span> ویرایش</a>';
                    }elseif ($check->confirm == 0) {

                            echo ' <a class="btn btn-danger  btn-xs" href="' . $url->createAbsoluteUrl(['replace/view2', 'id' => $check->id]) . '"><span class="glyphicon glyphicon-remove"></span> وضعیت تایید</a>';


                        } elseif ($check->confirm == 1) {
                            echo ' <a class="btn btn-success btn-xs" href="' . $url->createAbsoluteUrl(['replace/view2', 'id' => $check->id]) . '"><span class="glyphicon glyphicon-remove"></span> وضعیت تایید</a>';

                        }
                    }
                    ?>



                </td>
            </tr>
            <?php


            }


            }

            } ?>



        </table>
    </div>
</div>