<div class="container">
    <div class="row">
        <div class="box">
            <?php
            foreach ($meals as $doc) {
            $id = '$id';
            $ids = $doc['_id']->$id;
            $name = $doc['name'];
                ?>  
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center"><?php echo $doc['name']; ?>
                    </h2>
                    <hr>
                    <img class="img-responsive img-border img-left" src="<?php echo $doc['pic']; ?>" alt="">
                    <hr class="visible-xs">
                    <?php echo 'Cena: '.$doc['price'].'<br>'; ?>
                    <?php echo $doc['description']; ?>
                    <br>
                    <br>
                    <a href="#" class="btn btn-default btn-lg" onclick="window.location = '<?php echo base_url("/user/index/$ids/$name"); ?>';">Pasūtīt</a>
                    <br>
                    <br>
                    <a href="https://twitter.com/share" class="twitter-share-button" data-url="http://praktiskais_darbs.lv" data-text="Praktiskais darbs" data-via="prDarbs">Pačivināt</a>                    

                </div><?php
            }
            ?>

        </div>
    </div>


</div>
<script>!function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
        if (!d.getElementById(id)) {
            js = d.createElement(s);
            js.id = id;
            js.src = p + '://platform.twitter.com/widgets.js';
            fjs.parentNode.insertBefore(js, fjs);
        }
    }(document, 'script', 'twitter-wjs');</script>
<!-- /.container -->

