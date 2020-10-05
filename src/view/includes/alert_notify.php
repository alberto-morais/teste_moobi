<?php if (isset($this->session['flash']['notify']) && !empty($this->session['flash']['notify'])): ?>
    <?php foreach ($this->session['flash']['notify'] as $alert): ?>
        <div class="alert alert-<?= $alert['type'] ?> fade show" role="alert">
            <span class="alert-icon"><i class="ni ni-<?= ($alert['type'] == 'success')? 'like-2' : 'settings'?>"></i></span>
            <span class="alert-text"><?= $alert['title'] ?></span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endforeach; ?>
<?php endif; ?>