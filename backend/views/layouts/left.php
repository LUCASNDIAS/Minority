<?php use yii\helpers\Html;?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
            	<?php echo Html::img(Yii::$app->user->identity['foto'], ['class'=>'img-circle']);?>
            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->user->identity['guerra']; ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i>Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Busca..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'Menu', 'options' => ['class' => 'header']],
                    //['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii']],
                    //['label' => 'Debug', 'icon' => 'fa fa-dashboard', 'url' => ['/debug']],
                    //['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    [
                        'label' => 'Admin',
                        'icon' => 'cog',
                        'url' => '#',
                        'visible' => Yii::$app->user->can('admLND'),
                        'items' => [
                            ['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii'], 'visible' => Yii::$app->user->can('admLND')],
                            ['label' => 'Debug', 'icon' => 'fa fa-dashboard', 'url' => ['/debug'],'visible' => Yii::$app->user->can('admLND')],
                        	['label' => 'Update', 'icon' => 'fa fa-recycle', 'url' => ['/update/index'],'visible' => Yii::$app->user->can('admLND')],
                        	['label' => 'Mensagens', 'icon' => 'fa fa-envelope-o', 'url' => '#', 'visible' => Yii::$app->user->can('admLND'), 'items' => [
                        			['label' => 'Adcionar', 'icon' => 'fa fa-plus-square-o', 'url' => ['/mensagens/create'], 'visible' => Yii::$app->user->can('admLND')],
                        			['label' => 'Buscar', 'icon' => 'fa fa-search', 'url' => ['/mensagens'], 'visible' => Yii::$app->user->can('admLND')],
                        		],
                        	],
                        ],
                    ],
                    [
                        'label' => 'Locais',
                        'icon' => 'glyphicon glyphicon-globe',
                        'url' => '#',
                        'visible' => Yii::$app->user->can('admin'),
                        'items' => [
                            ['label' => 'Adcionar', 'icon' => 'fa fa-plus-square-o', 'url' => ['/local/default/create'], 'visible' => Yii::$app->user->can('admin')],
                            ['label' => 'Buscar', 'icon' => 'fa fa-search', 'url' => ['/local'], 'visible' => Yii::$app->user->can('admin')],
                            ['label' => 'Tipo de local', 'icon' => 'glyphicon glyphicon-road', 'url' => '#', 'visible' => Yii::$app->user->can('adminLND'), 'items' => [
                                ['label' => 'Adcionar', 'icon' => 'fa fa-plus-square-o', 'url' => ['/tipolocal/default/create'], 'visible' => Yii::$app->user->can('adminLND')],
                                ['label' => 'Buscar', 'icon' => 'fa fa-search', 'url' => ['/tipolocal'], 'visible' => Yii::$app->user->can('adminLND')],
                                ],
                            ],
                            ['label' => 'Tipo de atividades', 'icon' => 'fa fa-usd', 'url' => '#', 'visible' => Yii::$app->user->can('adminLND'), 'items' => [
                                ['label' => 'Adcionar', 'icon' => 'fa fa-plus-square-o', 'url' => ['/atividade/default/create'], 'visible' => Yii::$app->user->can('adminLND')],
                                ['label' => 'Buscar', 'icon' => 'fa fa-search', 'url' => ['/atividade'], 'visible' => Yii::$app->user->can('adminLND')],
                                ],
                            ],
                        ],
                    ],
                    [
                        'label' => 'Pessoas',
                        'icon' => 'fa fa-user',
                        'url' => '#',
                        'visible' => Yii::$app->user->can('admin'),
                        'items' => [
                            ['label' => 'Adcionar', 'icon' => 'fa fa-user-plus', 'url' => ['/pessoas/default/create'], 'visible' => Yii::$app->user->can('admin')],
                            ['label' => 'Buscar', 'icon' => 'fa fa-search', 'url' => ['/pessoas'],'visible' => Yii::$app->user->can('admin')],
                        ],
                    ],
                    [
                        'label' => 'Veiculos',
                        'icon' => 'fa fa-truck',
                        'url' => '#',
                        'visible' => Yii::$app->user->can('admin'),
                        'items' => [
                            ['label' => 'Adcionar', 'icon' => 'fa fa-plus-square-o', 'url' => ['/veiculos/default/create'], 'visible' => Yii::$app->user->can('adminLND')],
                            ['label' => 'Buscar', 'icon' => 'fa fa-search', 'url' => ['/veiculos'], 'visible' => Yii::$app->user->can('admin')],
                        ],
                    ],
                    [
                            'label' => 'Telefones',
                            'icon' => 'fa fa-phone',
                            'url' => '#',
                            'visible' => Yii::$app->user->can('admin'),
                            'items' => [
                                    ['label' => 'Adcionar', 'icon' => 'fa fa-user-plus', 'url' => ['/telefones/default/create'], 'visible' => Yii::$app->user->can('adminLND')],
                                    ['label' => 'Buscar', 'icon' => 'fa fa-search', 'url' => ['/telefones'],'visible' => Yii::$app->user->can('admin')],
                            ]
                    ],
                    [
                        'label' => 'Usuarios',
                        'icon' => 'glyphicon glyphicon-cog',
                        'url' => '#',
                        'visible' => Yii::$app->user->can('adminLND'),
                        'items' => [
                            ['label' => 'Emitir', 'icon' => 'fa fa-plus', 'url' => ['/usuarios/default/create'], 'visible' => Yii::$app->user->can('adminLND')],
                            ['label' => 'Buscar', 'icon' => 'fa fa-search', 'url' => ['/usuarios'],'visible' => Yii::$app->user->can('adminLND')],
                        ],
                    ],
                    [
                        'label' => 'Relatorios',
                        'icon' => 'fa fa-bar-chart',
                        'url' => ['/relatorios/default/relatorios'],
                        'visible' => Yii::$app->user->can('adminLND'),
                    ],
                ],

            ]
        ) ?>

    </section>

</aside>
