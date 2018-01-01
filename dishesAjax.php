<?php

ini_set("display_errors", "on");
error_reporting(E_ALL);
use Api\ZeldaApi;
use Api\Zelda;
require 'lib/ZeldaApi.php';
require 'lib/Zelda.php';

$ingredients = [];
$elixirs = [];
$dishes = [];

$ingredient_id = $_GET['id'];

$api = new ZeldaApi();

$zelda = new Zelda();
$dishes = $zelda->getDishesForIngredient($ingredient_id);
$dish_ids = [];
foreach($dishes as $dish){
    $dish_ids[] = $dish->id;
}
$ingredients_by_dish = $zelda->getIngredientsForDishIds($dish_ids);



?>

<thead>
<?php foreach($dishes as $dish) : ?>
<tr>
<!--    <th>Dishes</th>-->
    <td>
            <div class="dish">
                <!-- dish info -->
                <?php echo($dish->name); ?>
            </div>
    </td>
    <br>
<!--    <th>Effects</th>-->
    <td>
        <div class="effect">
            <?php echo($dish->effect)?>
        </div>
    </td>
    <br>
<!--    <th>Ingredients</th>-->
    <td>
        <div class="ingredients">
            <?php foreach($ingredients_by_dish[$dish->id] as $ingredient) : ?>
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
        <div class="notes">
            <?php echo($dish->notes)?>
        </div>
    </td>
    <br>
    <td>
        <div class="strength">
            <?php echo($dish->strength)?>
        </div>
    </td>
    <br>
    <td>
        <div class="duration">
            <?php echo($dish->duration)?>
        </div>
    </td>

</tr>
<?php endforeach; ?>

</thead>


