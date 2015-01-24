<div class="container">
    <div class="row">
        <div class="box">
            <h3>Nepiegādātie ēdieni</h3>
            <ul>
                <?php
                foreach ($orders as $order) {
                    // print_r($order);
                    $ids = '$id';
                    $id = $order['_id']->$ids;
                    if ($order['status'] != '1') {
                        continue;
                    }
                    ?><li>Pasūtījums: <?php echo $order['meal'];
                if ($order['status'] == '1') echo ' (Nav piegādāts) ';
                echo $order['table_name'] . '. galdiņš.' ?>
                        <a style="background-color: red;" onclick="window.location = '<?php echo base_url("meal/conf/$id"); ?>'">Piegādāts</a>
                    </li><?php
            }
                ?>
            </ul>
            <h3>Piegādātie</h3>
            <ul>
                <?php
                foreach ($orders as $order) {
                    // print_r($order);
                    $ids = '$id';
                    $id = $order['_id']->$ids;
                    if ($order['status'] != '2') {
                        continue;
                    }
                    ?><li>Pasūtījums: <?php echo $order['meal'];
                    if ($order['status'] == '2') echo '<label> (Piegādāts)</label> ';
                    echo $order['table_name'] . '. galdiņš.' ?>
                       
                    </li><?php
            }
                ?>
            </ul>

        </div>
    </div>
</div>
</div>




