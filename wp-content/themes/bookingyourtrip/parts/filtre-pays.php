<?php $pays = get_terms(["taxonomy" => "pays"]); ?>
<?php if(is_array($pays)): ?>
    <ul class="nav nav-pills my-4">
        <?php foreach($pays as $unPays): ?>
            <li class="nav-item">
                <a href="<?= get_term_link($unPays) ?>" class="nav-link <?= is_tax('pays',$unPays->term_id) ? "active" : "" ?>"><?= $unPays->name ?></a>
            </li>
        <?php endforeach ?>
    </ul>
<?php endif ?>