<?php 
use Cake\Core\Configure; 
$this->append('title');
    echo 'Kontakt';
$this->end();

$email = Configure::read('Promoted.contactEmail');
$phone = Configure::read('Promoted.contactPhone');
$phone2 = Configure::read('Promoted.contactPhone2');
?>

<section class="contact-view">
    <div class="container">
        <div class="row">
            <header class="col-12 text-center">
                <p>
                    ZAINTERESOWANY?
                </p>
                <h2 class="brand-color section-heading">
                    <?php
                    echo __('SKONTAKTUJ SIĘ Z NAMI');
                    ?>
                </h2>
                <hr>
            </header>
            <div class="colxs-12 col-md-8 mx-auto">
                <div class="contact-wrapper text-center">
                    <p><a href="mailto:<?php echo $email; ?>"><?php echo$email; ?></a> </p>
                    <p><b><a href="tel:<?php echo $phone; ?>"><?php echo $phone; ?></a></b></p>
                    <p><b><a href="tel:<?php echo $phone2; ?>"><?php echo $phone2; ?></a></b></p>
                </div>
                <div id="contact-<?= $contact->id ?>" class="">
                    <div class="contact-body">
                        <?= $contact->body ?>
                    </div>

                    <?php if ($contact->message_status): ?>
                        <div class="contact-form">
                            <?php
                            echo $this->Form->create($message);
                            echo $this->Form->input('name', [
                                'label' => __d('croogo', 'Imię i Nazwisko'),
                                'type' => 'text',
                                'class' => 'form-control',
                                'required' => true,
                                'templates' => [
                                    'inputContainer' => '<div class="form-group {{type}}{{required}}">{{content}}</div>'
                                ]
                            ]);
                            echo $this->Form->input('email', [
                                'label' => __d('croogo', 'E-mail'),
                                'templates' => [
                                    'inputContainer' => '<div class="form-group {{type}}{{required}}">{{content}}</div>'
                                ]

                            ]);
                            echo $this->Form->input('title', [
                                'label' => __d('croogo', 'Temat'),
                                'templates' => [
                                    'inputContainer' => '<div class="form-group {{type}}{{required}}">{{content}}</div>'
                                ]
                            ]);
                            echo $this->Form->input('body', [
                                'label' => __d('croogo', 'Wiadomość'),
                                'templates' => [
                                    'inputContainer' => '<div class="form-group {{type}}{{required}}">{{content}}</div>'
                                ]
                            ]);
                            if ($contact->message_captcha):
                                echo $this->Recaptcha->display();
                            endif;
                            ?>

                            <div class="text-center">
                                <?php
                                echo $this->Form->submit('Wyślij wiadomość', [
                                        'class' => 'btn btn-primary btn-xl',
                                        'title' => __d('croogo', 'Wyślij wiadomość')
                                    ]
                                );
                                ?>
                            </div>

                            <?php
                            echo $this->Form->end();
                            ?>
                        </div>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
    <div class="map">

    </div>
</section>