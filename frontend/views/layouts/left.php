<?php

use common\models\User;
use dmstr\widgets\Menu;

?>
<aside class="main-sidebar ">

    <section class="sidebar">

        <!-- Sidebar user panel -->

        <div class="user-panel">
            <div class="pull-left image">
                <?php if(!Yii::$app->user->isGuest) {?>
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>
                    <?php

                            $userId = Yii::$app->user->getId();
                            $user = User::findOne($userId);
                            echo $user->getUsername();
                        }
                         else { ?>
                            <h3>مهمان</h3>
                        <?php } ?>




                </p>

<!--                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>-->
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
//                    ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
                    ['label' => 'ساخت تیکت', 'icon' => 'file-code-o', 'url' => ['/ticket/create']],
                    ['label' => 'تیکت ها', 'icon' => 'dashboard', 'visible' => !Yii::$app->user->isGuest,'url' => ['/ticket/index']],
                    ['label' => 'ورود', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    ['label' => 'ثبت نام ', 'url' => ['site/signUp'], 'visible' => Yii::$app->user->isGuest],
                    [
                        'label' => 'dev tools',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                            ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
                            [
                                'label' => 'Level One',
                                'icon' => 'circle-o',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Level Two', 'icon' => 'circle-o', 'url' => '#',],
                                    [
                                        'label' => 'Level Two',
                                        'icon' => 'circle-o',
                                        'url' => '#',
                                        'items' => [
                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        ) ?>


    </section>

</aside>
