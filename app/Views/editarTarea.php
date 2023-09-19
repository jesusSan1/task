<?=$this->extend('layout\index')?>
<?=$this->section('contenido')?>
<?php if (session()->getFlashdata('errors')): ?>
<?=$this->include('errors')?>
<?php endif;?>
<?php if (session()->getFlashdata('success')): ?>
<?=$this->include('success')?>
<?php endif;?>
<?php foreach ($datos as $task): ?>
<div class="container p-4">
    <div class="row">
        <div class="col-md-4">
            <div class="card card-body">
                <form action="<?=base_url('update/' . $task['id'])?>" method="POST">
                    <?=csrf_field()?>
                    <div class="form-group">
                        <input type="text" name="tarea" class="form-control" placeholder="Nombre de la tarea" autofocus
                            value="<?=set_value('tarea', $task['nombre'])?>">
                    </div>
                    <br>
                    <div class="form-group">
                        <textarea name="descripcion" rows="2" class="form-control"
                            placeholder="Descripcion"><?=set_value('descripcion', $task['descripcion'])?></textarea>
                    </div>
                    <br>
                    <input type="submit" value="editar" class="btn btn-success btn-block" name="enviar">
                </form>
            </div>
        </div>
    </div>
</div>

<?php endforeach;?>
<?=$this->endSection()?>