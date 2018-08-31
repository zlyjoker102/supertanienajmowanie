<?php
if (!empty($this->Breadcrumbs->getCrumbs()))
{
    $this->Breadcrumbs->templates([
        'item' => '<li class="breadcrumb-item" {{attrs}}><a href="{{url}}"{{innerAttrs}}>{{title}}</a></li>{{separator}}',
        'itemWithoutLink' => '<li class="breadcrumb-item" {{attrs}}><span{{innerAttrs}}>{{title}}</span></li>{{separator}}',
    ]);

    $this->Breadcrumbs->prepend('<img src="/img/home.png" alt="" class="img-responsive">', '/', ['escape' => false]);
    $crumbs = $this->Breadcrumbs->render([
        'class' => 'breadcrumb',
    ]);

    echo $this->Html->div('hidden-xs-down', $crumbs, ['id' => 'breadcrumb-container']);
}