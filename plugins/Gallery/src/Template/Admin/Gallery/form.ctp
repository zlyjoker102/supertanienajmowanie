<?php

$this->Croogo->adminScript('Gallery.SimpleAjaxUploader');
$this->Html->css('Gallery.gallery_admin', array('block' => true));

$this->extend('Croogo/Core./Common/admin_edit');

$this->Breadcrumbs->add('Galerie', ['action' => 'index']);
$action = $this->request->param('action');

if ($action == 'edit'):
    $this->Breadcrumbs->add('Edytuj galerię');
else:
    $this->Breadcrumbs->add('Dodaj galerię', $this->request->here());
endif;

$this->append('form-start', $this->Form->create($gallery));

$this->append('tab-heading');
echo $this->Croogo->adminTab('Informacje o albumie', '#album');
echo $this->Croogo->adminTab('Zdjęcia', '#photos');
$this->end();

$this->append('tab-content');
echo $this->Html->tabStart('album');
echo $this->Form->input('title', [
    'label' => 'Tytuł galerii',
    'data-slug' => '#slug',
]);
echo $this->Form->input('slug', [
    'label' => 'Slug galerii'
]);
echo $this->Form->input('description', [
    'label' => 'Opis'
]);
echo $this->Form->input('author', [
    'label' => 'Autor'
]);
echo $this->Form->input('status', [
    'label' => 'Aktywna galeria',
    'type' => 'checkbox'
]);
echo $this->Html->tabEnd();
echo $this->Html->tabStart('photos');

$images_container = '<div class="row-fluid"><div class="images_container span12">';
$images_container .= '<div class="row-fluid"><button id="uploadBtn" class="btn btn-primary">Dodaj zdjęcie</button></div>';
$images_counter = 0;

if (isset($gallery->photos)) {
    foreach ($gallery->photos as $photo) {
        $images_container .= '<div class="image">' .
            $this->Form->input('photos.' . $images_counter . '.id', array('type' => 'hidden', 'value' => $photo->id)) .
            '<a href="' . $photo->path . '" data-lightbox="galeria"><img src="' . (!empty($photo->thumbnail) ? $photo->thumbnail : $this->Image2->source($photo->path)->crop(200, 150)->imagePath()) . '" /></a><br/>' .
            $this->Form->input('photos.' . $images_counter . '.album_id', array('type' => 'hidden', 'value' => $photo->album_id)) .
            '</div>';

        $images_counter++;
    }
}
$images_container .= '</div></div>';

$images_container .= '<script type="text/javascript">
        $(document).ready(function(){
            var btn = document.getElementById("uploadBtn");
            var album_id = ' . ($gallery->isNew() ? 'null' : $gallery->id) . ';
            var media_amount = ' . count($gallery->photos) . ';

            var uploader = new ss.SimpleUpload({
                button: btn,
                url: "/admin/gallery/gallery/upload",
                allowedExtensions: ["jpg", "jpeg", "png", "gif"],
                responseType: "json",
                name: "uploadfile",
                onComplete:   function(filename, response) {
                    if( response.success ) {
                        $(".images_container").append(
                            \'<div class="image">\' +
                                \'<input type="hidden" name="photos[\' + media_amount + \'][id]" class="input-block-level" value="\' + response.media_id + \'" id="photos-\' + media_amount + \'-id">\' +
                                \'<input type="hidden" name="photos[\' + media_amount + \'][album_id]" class="input-block-level" value="\' + album_id + \'" id="photos-\' + media_amount + \'album-id">\' +
                                \'<a href="\' + response.full + \'"><img src="\' + response.thumbnail + \'"></a><br>\' +
                            \'</div>\'
                        );
                    }
                    media_amount++;

                    return false;
                }
            });
        });
        </script>';
echo $this->Form->label('Node.images_container', 'Zdjęcia w albumie') . $images_container;
echo $this->Html->tabEnd();
echo $this->Croogo->adminTabs();
$this->end();