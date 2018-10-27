<?php

use Cake\Core\Configure;

?>

<!DOCTYPE html>
<html>
<head>


    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

<!--    --><?php
//    echo $this->Element('ogMeta');
//    ?>

    <link href="https://fonts.googleapis.com/css?family=Merriweather:300,300i,400,400i,700,900&amp;subset=latin-ext"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&amp;subset=latin-ext"
          rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css"
          integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="icon" href="/img/favicon.png">
    <title><?= $this->fetch('title'); ?> – <?php echo Configure::read('Promoted.websiteName'); ?></title>

    <?php
    echo $this->Meta->meta();
    echo $this->Layout->feed();
    echo $this->Html->css(array(
        '/css/style.css',
    ));
    ?>


</head>
<body id="page-top">
<div class="wrapper">
    <?php
    echo $this->Layout->sessionFlash();

    echo $this->Element('header');
    // echo $this->Element('socialBar');

    echo $this->fetch('content');
    ?>
</div>
<div class="push"></div>

<?php
echo $this->Element('footer');

echo $this->Html->script(array(
    '/js/app.min.js',
));
?>

</body>
</html>
