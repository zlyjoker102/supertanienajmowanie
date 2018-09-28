<?php if (isset($excerpt)): ?>
    <?php
    echo $this->Text->truncate(
        $excerpt,
        250,
        [
            'ellipsis' => '...',
            'exact' => false
        ]
    );
    ?>

    <div class="button-wrapper">
        <?=
        $this->Html->link(__d('croogo', 'Zobacz więcej'), [
            'action' => 'view',
            'type' => $node->type,
            'slug' => $node->slug,
        ], [
            'class' => 'btn btn-primary',
        ])
        ?>
    </div>
<?php endif ?>
