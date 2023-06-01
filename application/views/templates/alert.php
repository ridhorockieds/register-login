<?php if ($this->session->flashdata('error')) : ?>
    <div class="row">
        <div class="col-12">
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-ban"></i> Error!</h5>
                <?= $this->session->flashdata('error'); ?>
            </div>
        </div>
    </div>
<?php elseif ($this->session->flashdata('success')) : ?>
    <div class="row">
        <div class="col-12">
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> Success!</h5>
                <?= $this->session->flashdata('success'); ?>
            </div>
        </div>
    </div>
<?php endif; ?>