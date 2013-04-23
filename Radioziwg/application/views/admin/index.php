<div class="span3">
    <div class="btn-group btn-group-vertical span3">
        <a href="<?php echo base_url() ?>" class="btn">Homepage</a>
        <a href="<?php echo base_url().'admin' ?>" class="btn">Admin panel</a>
        <?php foreach($aMenu as $sKey => $sVal) : ?>
        <a href="<?php echo base_url().$sVal ?>" class="btn"><?php echo $sKey ?></a>
        <?php endforeach; ?>
    </div>
</div>


<div class="span9">
    <?php $this->load->view($viewContent) ?>
</div>