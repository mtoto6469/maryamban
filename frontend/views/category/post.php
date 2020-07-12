<?php
$url=Yii::$app->urlManager;
?>
<section id="services-small" class="section mild-bg">

<div class="row">
    <?php
    foreach ($cat as $category){
        echo '<div class="col-md-2"> <p><a href="'.$url->createAbsoluteUrl(['category/post','id'=>$category->id_category]).'" class="btn btn-default btn-block">'.$category->title_category.'</a></p></div>';
    }
    ?>



<hr>
<div class="container">

    <?php
    foreach ($post as $p){
        ?>


    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="section-content2 text-right">
                <header class="section-heading2 mt-0" >
                    <h6><?=$category_title->title_category?></h6>
                    <h4><?=$p->title?></h4>
                </header>
                <div class="section-content-desc2">
                    <div style="height:150px ;width: 100%;overflow: hidden"><?=$p->text_web?></div>
                </div>
                <br>
                <div class="btn2" >
                    <a  href="<?=$url->createAbsoluteUrl(['post/text','id'=>$p->id])?>'" class="btn btn-cal-default  ">

                       ادامه مطلب

                       </a>

       </div>

       </div>

       </div>

       </div>

        <?php
    }?>

</div>

    </div>
    </section>
