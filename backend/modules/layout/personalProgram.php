<div class="col-md-12"><header class="text-center"><h3>Program Applied For</h3></header></div>
<table class="table table-striped table-responsive-lg bg-white table-bordered ">
    <tbody>
    
        <tr>
        <td>
                <?= $courses->program->programCategory->name??'';?>
            </td>
            <td>
                <?= $courses->program->program_name??'';?> 
            </td>
            <td>
                 <?= $courses->program->program_code??'';?>
            </td>
        </tr>
    </tbody>
</table>




