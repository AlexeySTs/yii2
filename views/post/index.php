<?php

    use yii\widgets\ListView;
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;

    $this->title = 'Все посты';

    $searchString = yii\helpers\ArrayHelper::getValue(Yii::$app->request->queryParams, "PostFrontendSearch.text");
    if($searchString) {
        $this->title = 'Результаты поиска';
    }
?>

<div class="row">

    <?php 
        $form = ActiveForm::begin([
            'method' => 'get',
        ]);
    ?>

    <div class="col-sm-12 col-md-1">
        Поиск
    </div>

    <div class="col-sm-12 col-md-3">
        <?= $form->field($searchModel, 'text')
                 ->textInput(['placeholder' => 'Введите строку для поиска'])
                 ->label(false);
        ?>
    </div>

    <div class="col-sm-12 col-md-1">
        <?= Html::submitButton('Искать', ['class' => 'btn btm-primary'])?>
    </div>

    <?php ActiveForm::end() ?>
</div>


<?php if($searchString): ?>
    <h1>Вы искали: "<?= Html::encode($searchString); ?>"</h1>
<?php else: ?>
    <h1>Все посты</h1>
<?php endif ?>

<section>
    <?php
        echo ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => '_listitem',
        ])
    ?>
</section>
<?php
    $info = 'test i2nfo';

    $script = <<< UU
    $(function() {
        alert('Hello rom view! ' + "$info");
    });
    UU;

    $this->registerJs($script, yii\web\View::POS_READY);
    ?>

  
