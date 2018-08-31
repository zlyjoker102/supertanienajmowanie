
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" title="Wynajem busów - Megatanienajmowanie" href="/">Megatanienajmowanie</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <?php
            echo $this->Menus->menu('main', ['dropdown' => true, 'dropdownClass' => 'navbar-nav ml-auto']);
            ?>
        </div>
    </div>
</nav>
<header class="masthead text-center text-white d-flex">
    <div class="overlay overlay-bg"></div>
    <div class="container my-auto">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <h1 class="header">
                    Wynajem busów, wyjazdy zagraniczne z <span class="brand-color">Megatanienajmowanie</span>
                </h1>
                <hr>
            </div>
            <div class="col-lg-8 mx-auto">
                <p class="text-faded mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab consectetur doloremque laborum maiores nemo nobis quidem repudiandae sed tempore tenetur!</p>
                <a class="btn btn-primary btn-xl js-scroll-trigger" title="Wynajmij bus - Megatanienajmowanie" href="#contact">Wynajmij bus</a>
            </div>
        </div>
    </div>
</header>