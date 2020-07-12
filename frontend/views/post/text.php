<section id="blog-standard" class="section blog-standard single-blog">
    <div class="container">
        <div class="row">
            <!--blog content-->
<!--            <div class="col-md-12 col-md-push-12">-->
                <!-- ====================================================
                                Single blog Post
                ======================================================= -->

                <div class="row">
                    <div class="col-sm-6 col-xs-12">
                        <div class="author">
                            <img src="<?=Yii::$app->request->hostInfo?>/upload/moalaq.jpg" class="img-responsive img-circle" alt="Blog Author">
                            <?php
                            $user=\common\models\User::find()->where(['id'=>$model->user_id])->one();
                            ?>
                            <span>نوشته شده توسط </span><a href="#"> <?php echo $user->username;?></a>
                            <br>
                            <span style="margin-right:100px">در تاریخ: </span> <?php echo $model->time_ir?>

                        </div>
                    </div>


                </div>

                <h4 class="blog-title"><?=$model->title?></h4>

                <div class="main-description">

                    <?php echo $model->text_web;?>
                </div>

                <script>
                    /* discus */
                    /* * * CONFIGURATION VARIABLES * * */
                    var disqus_shortname = 'californiatemplate';

                    /* * * DON'T EDIT BELOW THIS LINE * * */
                    (function() {
                        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                        dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
                        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
                    })();
                </script>
<!--            </div>-->
            <!--blog content end-->
</div>
            <!--sidebar-->
        <div class="row">
<!--            <div class="col-md-12 col-md-pull-12">-->
                <!-- ==============================================
                                    Left Sidebar
                ================================================ -->

                <?php

                foreach ($post as $id_post){
                    $post_page=\frontend\models\Tblpost::find()->where(['id'=>$id_post])->one();
                    echo '<div class="sidebar left-sidebar">';
                    echo '<div class="widget author-widget">';
                    echo ' <h5>'.$post_page->title.'</h5>';
                    $img=\backend\models\Tblgallery::find()->where(['id'=>$post_page->id_img_web])->one();
                    echo '  <img src="'.$img->address.'class="img-responsive" alt="'.$img->alert.'">';
                    echo '<p>';
                    echo $post_page->text_web;

                    echo '</p>';
                    echo '</div>';
                    echo '</div>';

                }

                ?>

<!--            </div>-->
            <!--sidebar end-->
        </div>
    </div>
</section>