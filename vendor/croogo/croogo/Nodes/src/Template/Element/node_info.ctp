<div class="node-info text-muted">
<?php
    $type = $typesForLayout[$this->Nodes->field('type')];

    if ($type->format_show_author || $type->format_show_date) {
        echo __d('croogo', 'Dodano:');
    }
    if ($type->format_show_author) {
        echo ' ' . __d('croogo', 'przez') . ' ';
        if ($this->Nodes->field('user.website') != null) {
            $author = $this->Html->link($this->Nodes->field('user.name'), $this->Nodes->field('user.website'));
        } else {
            $author = $this->Nodes->field('user.name');
        }

        echo $this->Html->tag('span', $author, array(
            'class' => 'author',
        ));
    }
    if ($type->format_show_date) {
        $nodeDate = $this->Nodes->field('publish_start') ?: $this->Nodes->field('created');
        echo $this->Html->tag('span', $this->Nodes->date($nodeDate), ['class' => 'date']);
    }
?>
</div>
