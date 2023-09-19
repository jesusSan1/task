<?php if (session()->getFlashdata('errors')): ?>
<?=$this->include('errors')?>
<?php endif;?>
<?php if (session()->getFlashdata('success')): ?>
<?=$this->include('success')?>
<?php endif;?>
<form action="<?=base_url('guardar')?>" method="POST">
    <?=csrf_field()?>
    <div class="form-group">
        <input type="text" name="tarea" class="form-control" placeholder="Nombre de la tarea" autofocus
            value="<?= old('tarea') ?>">
    </div>
    <br>
    <div class="form-group">
        <textarea name="descripcion" rows="2" class="form-control"
            placeholder="Descripcion"><?= old('descripcion') ?></textarea>
    </div>
    <br>
    <input type="submit" value="Guardar" class="btn btn-success btn-block" name="enviar">
</form>