<div class="newsletter">
	<div class="container">
	    <div class="row">
	        <div class="col-xs-12 col-sm-6">
	            <h6>Newsletter</h6>
	            <p>Zapisz się do newslettera i bądź na bieżąco</p>
	        </div>
	        <div class="col-xs-12 col-sm-6">
                <?php

                    echo $this->Form->create(null, [
                        'url' => [
                            'plugin' => 'newsletter',
                            'controller' => 'subscribers',
                            'action' => 'add'
                        ],
                        'id'=>'newsForm'
                    ]);

                    echo $this->Form->input('email', [
                        'label' => false,
                        'class' => 'form-control newsletterInput',
                        'placeholder' => 'E-mail',
                        'templates' => [
                            'inputContainer' => '<div class="form-group">{{content}}</div>'
                        ]
                    ]);

                    ?>

                    <button type="submit" class="btn btn-default">Wyślij</button>

                <?php

                echo $this->Form->end();

                ?>
	        </div>
	    </div>
	</div>
</div>
<script>
$( document ).ready(function() {
   $("#newsForm").validate({
       rules: {

           'email': {
               required: true,
               email: true
           },
       },
       errorPlacement: function(error, element) {
         if (element.attr("name") == "terms") {
           error.insertAfter("#checkMessage");
         } else {
           error.insertAfter(element);
         }
       },
       messages: {
           'email': {
               required: 'Prosimy uzupełnić adres email',
               email: 'Prosimy podać poprawny adres e-mail.'
           }

       }
   });
});
</script>