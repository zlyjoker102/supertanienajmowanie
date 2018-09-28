<?php
use Cake\Core\Plugin;
?>

<section class="view">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8 offset-md-2">
                <?php
                $this->assign('title', $node->title);
                $this->Nodes->set($node);
                ?>

                <h2 class="mb-3"><?= $this->Nodes->field('title') ?></h2>

                <div class="mb-3">
                    <?php echo $this->Nodes->field('excerpt'); ?>
                </div>
                <?php
                echo $this->Nodes->body();
                echo $this->Nodes->moreInfo();
                ?>

                <?php if (Plugin::loaded('Croogo/Comments')): ?>
                    <div id="comments" class="node-comments">
                        <?php
                        $type = $typesForLayout[$this->Nodes->field('type')];

                        if ($type->comment_status > 0 && $this->Nodes->field('comment_status') > 0) {
                            echo $this->cell('Croogo/Comments.Comments::node', [$node->id]);
                        }

                        if ($type->comment_status == 2 && $this->Nodes->field('comment_status') == 2) {
                            echo $this->cell('Croogo/Comments.Comments::commentFormNode', [
                                'mode' => $node,
                                'type' => $type
                            ]);
                        }
                        ?>
                    </div>
                <?php endif ?>

            </div>
        </div>
    </div>
</section>
