<div class="container">




    <div class="row">
        <div class="box">
            <div class="col-lg-12">
                <form method="POST" action="<?php echo base_url('meal/takeadd'); ?>">
                    <div class="">
                        <label for="name">Nosaukums</label>
                        <input name="name" class="input-group" id="name" type="text">
                    </div>
                    <div class="">
                        <label for="pic">Bildes URL</label>
                        <input name="pic" class="input-group" id="pic" type="text">
                    </div>
                    <div class="">
                        <label for="price">Cena</label>
                        <input name="price" class="input-group" id="price" type="text">
                    </div>
                    <div class="">
                        <label for="description">Apraksts</label>
                        <textarea name="description" class="input-group" id="description"></textarea>
                    </div>
                    <input type="submit" type="button" value="Pievienot">
                </form> 
            </div>
        </div>
    </div>

</div>
<!-- /.container -->

