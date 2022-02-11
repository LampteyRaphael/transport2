<?php   
use kartik\detail\DetailView;
?>
<?= DetailView::widget([
    'model' => $model,
    'mode' => 'view',
    'bordered' => true,
    'striped' => true,
    'condensed' => true,
    'responsive' => true,
    'hover' => true,
    'vAlign'=>true,
    'fadeDelay'=>true,
    'panel' => [
        'heading'=>'Vehicle Details',
        'type'=>DetailView::TYPE_PRIMARY,
        'footer' => '<div class="text-center text-muted"></div>'
    ],
    'attributes' => [
        'make',
        'regNo',
        'chasisNo',
        'yearMade',
        'purchaseDate',
        'colour',
        'countryOfOrigin',
        'cubicCentimeter',
        'fuel',
        'created_at',
        'updated_at',  
    ],
    'buttons1' => '',
]) 
?>