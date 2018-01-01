# select dishes


<?php/*
function getDishesForIngredient($x_ingredient_id)
{
    $query = "
    SELECT `dishes`.*
    FROM `dish_has_ingredient`
    LEFT JOIN `dishes`
    ON `dish_has_ingredient`.`dishes_id` = `dishes`.`id`
    WHERE `dish_has_ingredient`.`ingredients_id` = ?
    ";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$x_ingredient_id]);
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $dishes = $stmt->fetchAll();

    return $dishes;
}

function getIngredientsForDishIds(array $dish_ids)
{
    // create a string like (1, 2, 3, 4) from the $dish_ids
    $dish_ids_string = '(' . join(', ', $dish_ids). ')';

    // select all ingredients for all the dishes selected above
    $next_query = "
    SELECT `ingredients`.*,
        `dish_has_ingredient`.`dishes_id`, `dish_has_ingredient`.`quantity`
    FROM `dish_has_ingredient`
    LEFT JOIN `ingredients`
    ON `dish_has_ingredient`.`ingredient_id` = `ingredients`.`id`
    WHERE `dish_has_ingredient`.`dishes_id` IN {$dish_ids_string}
    ";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $ingredients = $stmt->fetchAll();

    $ingredients; // all ingredients for all dishes selected above

    // create a list of lists of ingredients indexed by the dish ids
    $ingredients_by_dish = array_fill_keys($dish_ids, []);
    foreach($ingredients as $ingredient)
    {
        $ingredients_by_dish[$ingredient->dishes_id][] = $ingredient;
    }

    return $ingredients_by_dish;
}

$dishes = getDishesForIngredient(1);

// create list of ids
$dish_ids = [];
foreach($dishes as $dish)
{
    $dish_ids[] = $dish->id;
}

$dishes; // array of complete objects
$dish_ids; // array of just id columns

$ingredients_by_dish = getIngredientsForDishIds($dish_ids);

$dishes;              // array of complete objects
$ingredients_by_dish; // multidimensional array of ingredients indexed by dish ids 
// with qty and everything

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Output</title>
</head>
<body>

<div id="list">
    <?php foreach($dishes as $dish) : ?>
    <div class="dish">
        <!-- dish info -->
        <?php var_dump($dish); ?>

        <div class="ingredients">
            <?php foreach($ingredients_by_dish[$dish->id] as $ingredient) : ?>
            <div class="ingredient">
                <!-- ingredient info -->
                <?php var_dump($ingredient); ?>
            </div>
            <?php enforeach; ?>
        </div>
    </div>
<?php endforeach; ?>
</div>

</body>
</html>
