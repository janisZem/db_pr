<div class="container">
    <div class="row">
        <div class="box">
            <h2>Pasūtīt ēdienu <?php echo $meal; ?></h2>
            <form method="POST" action="<?php echo base_url('meal/takeorder'); ?>">
                <?php if (count($persons) != 0) { ?>
                    <h4>Esošie galdiņa pasūtītāji</h4>
                    <?php
                    foreach ($persons as $person) {
                        echo 'Pasūtītājs: <a onclick="setPerson(\'' . $person['name'] . '\', \'' . $person['personId'] . '\')">' . $person['name'] . ' id: ' . $person['personId'] . '<br> </a>';
                    }
                }
                ?>
                <br>
                <label for="name">Jūsu vārds</label>
                <input name="name" onblur="removeValue()" id="name" type="text">
                <input name="personId" id="personId" type="hidden" value="">
                <input type="hidden" name="meal" id="meal" value="<?php echo $meal ?>">
                <input type="hidden" name="table" id="table" value="<?php echo $table; ?>">
                <br>
                <input type="submit" type="button" value="Pasūtīt">
            </form>
        </div>
    </div>
</div>
</div>
<script>
    function setPerson(name, personId) {
        $("#personId").val(personId);
        $("#name").val(name);
    }
    function removeValue() {
        $('#personId').val('');
    }
</script>



