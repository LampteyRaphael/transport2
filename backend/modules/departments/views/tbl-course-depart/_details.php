<?php
use yii\widgets\DetailView;
?>
<div class="app-pers-details-index">


<fieldset>
      <legend>Department Details</legend>
      <?= DetailView::widget([
        'model' => $model,

        'attributes' => [
            // 'depart_id',
            // 'course_id',
            'depart.department_name',
            'depart.department_code',
            'depart.department_office',
        ],
    ]) ?>

      
  </fieldset>



</div>
