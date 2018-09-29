<?php

use Cake\Core\Configure;

?>

<?php
if (!isset($contact)):
    ?>
    <span class="pulse">
    <a href="/contact">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40" width="40"><style>.a {
                }</style><path
                    d="M20 2c9.9 0 18 8.1 18 18s-8.1 18-18 18c-9.9 0-18-8.1-18-18S10.1 2 20 2M20 0C9 0 0 9 0 20c0 11 9 20 20 20 11 0 20-9 20-20C40 9 31 0 20 0L20 0z"
                    class="a"/><path
                    d="M14.4 9.8c1.2-0.2 2 1.1 2.6 2.1 0.6 0.9 1.3 2 1 3.2 -0.2 0.7-0.8 1-1.2 1.4 -0.4 0.4-1.1 0.7-1.3 1.3 -0.3 1 0.3 2 0.7 2.6 0.8 1.3 1.8 2.5 3.1 3.5 0.6 0.5 1.5 1.2 2.4 1 1.3-0.3 1.6-1.9 3-2.1 1.3-0.2 2.3 0.8 3 1.4 0.7 0.6 1.9 1.4 1.8 2.5 0 0.6-0.5 1-1 1.4 -0.4 0.4-0.8 0.8-1.3 1.1 -1.1 0.7-2.3 1-3.8 1 -1.5 0-2.6-0.5-3.7-1.1 -2.1-1.1-3.7-2.6-5.2-4.3 -1.5-1.7-2.9-3.7-3.7-5.9 -1-2.8-0.5-5.6 1.1-7.4 0.3-0.3 0.7-0.6 1.1-0.9C13.5 10.3 13.8 9.9 14.4 9.8z"
                    class="a"/></svg>
    </a>
</span>
<?php endif; ?>

<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p>
                    @copyright <?php echo Configure::read('Promoted.websiteName'); ?>
                    <span class="d-block">
                        Realizacja strony <a href="mailto:marcin.szut@gmail.com" title="marcin.szut@gmail.com">Marcin Szut</a>
                    </span>
                </p>
            </div>
        </div>
    </div>
</footer>