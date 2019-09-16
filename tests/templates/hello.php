<?php $this->layout('base') ?>
<?php $this->start('greeting') ?>
<b>Hello <?=$this->e($name)?>!</b>
<?php $this->stop() ?>
