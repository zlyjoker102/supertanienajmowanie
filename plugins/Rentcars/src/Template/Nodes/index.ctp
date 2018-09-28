<?php
$this->assign('title', 'Lista');

$firstNode = $nodes->first();

?>

<section class="node-list">
    <div class="breadcrumbs-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <?php
                    $this->Breadcrumbs->templates([
                        'wrapper' => '<div aria-label="breadcrumb"><ul class="breadcrumb" {attrs}}>{{content}}</ul></div>',
                        'item' => '<li class="breadcrumb-item"{{attrs}}><a href="{{url}}"{{innerAttrs}}>{{title}}</a></li>{{separator}}',
                    ]);
                    $this->Breadcrumbs->add(
                        'Strona główna',
                        '/'
                    );
                    $this->Breadcrumbs->add(
                        'aktualności', '',
                        [
                            'class' => 'breadcrumb-item active',
                            'aria-current' => 'page',

                        ]
                    );
                    echo $this->Breadcrumbs->render(
                        ['class' => 'breadcrumbs-trail'],
                        ['separator' => '<i class="fa fa-angle-right"></i>']
                    );
                    ?>
                </div>
            </div>
        </div>
    </div>

    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>
                        Aktualności
                    </h2>
                </div>
            </div>
        </div>
    </header>
    <div class="container">
        <?php
        if (isset($type)):
            $this->assign('title', $type->title);
        endif;
        ?>

        <div>

            <?php
            if (count($nodes) == 0) {
                echo __d('croogo', 'Brak danych do wyświetlenia - dodaj artykuł.');
            }
            ?>

            <div class="row">
                <?php
                foreach ($nodes as $key => $node):
                    $this->Nodes->set($node);
                    ?>

                    <article class="article <?php echo ($key === 0) ? 'col-12' : 'col-12 col-md-6'; ?>">
                        <?php
                        $img = $node->link;

                        echo $this->Html->image($img, ['alt' => '#', 'class' => 'img-fluid']);
                        ?>

                        <h3 class="title"><?= $this->Html->link($this->Nodes->field('title'), $this->Nodes->field('url')->getUrl()) ?></h3>

                        <?php
                        echo $this->Nodes->info();
                        echo $this->Nodes->excerpt(['body' => true]);
//                        echo $this->Nodes->moreInfo();
                        ?>
                    </article>

                <?php
                endforeach;
                ?>
            </div>
            <?= $this->element('pagination', compact('nodes', 'type')) ?>
        </div>
    </div>
</section>