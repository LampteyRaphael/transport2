<?php use yii\bootstrap4\Nav; ?>
<?php
echo Nav::widget([
  'options'=>['class'=>'nav nav-tabs nav-pills','id'=>"nav-tab",'style'=>'background-color:inherit; position:relative; font-size:15px; '],
  'items'=>[
    ['label'=>'Personal Information','url'=>['site/application'],['class'=>'nav-link active','id'=>'pers','role'=>'tab']],
    ['label'=>'Program Applying For','url'=>['site/program'],['class'=>'nav-link','id'=>'pro','role'=>'tab']],
    ['label'=>'Education','url'=>['site/education'],['class'=>'nav-link','id'=>'edu','role'=>'tab']],
    ['label'=>'Employment','url'=>['site/employment'],['class'=>'nav-link','id'=>'emp','role'=>'tab']],
    ['label'=>'Document','url'=>['site/document'],['class'=>'nav-link','id'=>'doc','role'=>'tab']],
    ['label'=>'Summary And Declaration','url'=>['site/declaration'],['class'=>'nav-link','id'=>'dec','role'=>'tab']],
  ]
  
]);

?>

<div class="container1" style="padding-bottom: 100px;">
    <ul class="progressbar">
        <li class="active">
            Personal Information 
        </li>
        <li id="program">
            Program Applying For
        </li>
        <li id="education">Education</li>
        <li id="employment">Employment</li>
        
        <li id="document">Document</li>
    </ul>
</div>

<h5 class="text-left text-danger">All field mark * are required</h5>
