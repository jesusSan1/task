<?=$this->extend('layout\index')?>
<?=$this->section('contenido')?>
<div class="container p-4">
    <div class="row">
        <div class="col-md-4">
            <div class="card card-body">
                <?=view('form')?>
            </div>
        </div>
        <div class="col-md-8">
            <?=view('table')?>
        </div>
    </div>
</div>
<?=$this->endSection()?>