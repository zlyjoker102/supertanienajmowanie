<?php
$this->append('title');
echo $node['title'];
$this->end();

if ($type->show_breadcrumbs == 1) {
    $nodeType = $node['url']['type'];
    $this->Breadcrumbs
        ->add(__d('croogo', $type['title']), $nodeType);
    $this->Breadcrumbs
        ->add(__d('croogo', $node['title']));
}
?>
<section class="views page-view">
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
                        $node->title, '',
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
    <div class="container">
        <div class="row">
            <article class="col-12 mt-5">
                <div class="page-body">
                    <div class="img-wrapper">
                        <?php
                        $imgSrc = $node->link ?? '/uploads/6.jpg';
                        if ($imgSrc === 'value') {
                            $imgSrc = '/uploads/6.jpg';
                        }

                        echo $this->Html->image($this->Image2->source($imgSrc)->resizeit(1100, 5000)->imagePath(), [
                                'class' => 'img-fluid',
                                'alt' => $node->alt ?? '#'
                            ]
                        );
                        ?>
                    </div>
                    <header class="header">
                        <h1 class="page-title"><?php echo $node->title; ?></h1>
                    </header>
                    <?php echo $node->body; ?>
                </div>
            </article>
        </div>
    </div>
</section>
