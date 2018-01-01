<?php
/**
 * Created by PhpStorm.
 * User: 13entley
 * Date: 7/10/17
 * Time: 6:21 PM
 */
ini_set("display_errors", "on");
error_reporting(E_ALL);
use Api\ZeldaApi;
use Api\Zelda;
require 'lib/ZeldaApi.php';
require 'lib/Zelda.php';
$api = new ZeldaApi();

$elixirs = [];
$ingredient_id = $_GET['id'];

$zelda = new Zelda();
$elixirs = $zelda->getElixirsForIngredient($ingredient_id);

$elixir_ids = [];
foreach($elixirs as $elixir) {
    $elixir_ids[] = $elixir->id;
}
$ingredients_by_elixir = $zelda->getIngredientsForElixirIds($elixir_ids);

?>




<thead>
<?php foreach($elixirs as $elixir) : ?>
    <tr>
        <!--    <th>Elixirs</th>-->
        <td>
            <div class="elixir">
                <!-- elixir info -->
                <?php echo($elixir->name); ?>
            </div>
        </td>
        <br>
        <!--    <th>Effects</th>-->
        <td>
            <div class="effect">
                <?php echo($elixir->effect)?>
            </div>
        </td>
        <br>
        <!--    <th>Ingredients</th>-->
        <td>
            <div class="ingredients">
                <?php foreach($ingredients_by_elixir[$elixir->id] as $ingredient) : ?>
                    <div class="ingredient">
                        <!-- ingredient info -->
                        <?php echo($ingredient->name)?>
                        <?php echo($ingredient->quantity)?>
                    </div>
                <?php endforeach; ?>

            </div>
        </td>
        <br>
        <!--    <th>Notes</th>-->
        <td>
            <div class="elixir_notes">
                <?php echo($elixir->notes)?>
            </div>
        </td>
        <br>
        <td>
            <div class="duration">
                Duration:<br><?php echo($elixir->duration)?>
            </div>
        </td>
    </tr>
<?php endforeach; ?>

</thead>

