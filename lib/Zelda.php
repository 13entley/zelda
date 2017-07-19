<?php
namespace Api;
use \PDO;
class Zelda extends ZeldaApi
{
    public function getIngredients()
    {
        $query_getIng = "
        SELECT `id`, `name`
        FROM `ingredients`
    ";
        $stmt = static::$pdo->prepare($query_getIng);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $ingredients = $stmt->fetchAll();
        return $ingredients;

    }
    public function getDishesForIngredient($x_ingredient_id)
    {
        $query = "
    SELECT `dishes`.*
    FROM `dish_has_ingredient`
    LEFT JOIN `dishes`
    ON `dish_has_ingredient`.`dishes_id` = `dishes`.`id`
    WHERE `dish_has_ingredient`.`ingredient_id` = ?
    ";
        $stmt = static::$pdo->prepare($query);
        $stmt->execute([$x_ingredient_id]);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $dishes = $stmt->fetchAll();

        return $dishes;
    }

    public function getIngredientsForDishIds(array $dish_ids)
    {
        if(!$dish_ids) return [];

        // create a string like (1, 2, 3, 4) from the $dish_ids
        $dish_ids_string = '(' . join(', ', $dish_ids) . ')';

        // select all ingredients for all the dishes selected above
        $next_query = "
    SELECT `ingredients`.*,
        `dish_has_ingredient`.`dishes_id`, `dish_has_ingredient`.`quantity`
    FROM `dish_has_ingredient`
    LEFT JOIN `ingredients`
    ON `dish_has_ingredient`.`ingredient_id` = `ingredients`.`id`
    WHERE `dish_has_ingredient`.`dishes_id` IN {$dish_ids_string}
    ";
        $stmt = static::$pdo->prepare($next_query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $ingredients = $stmt->fetchAll();


//        $ingredients; // all ingredients for all dishes selected above

        // create a list of lists of ingredients indexed by the dish ids
        $ingredients_by_dish = array_fill_keys($dish_ids, []);

        foreach ($ingredients as $ingredient) {
            $ingredients_by_dish[$ingredient->dishes_id][] = $ingredient;
        }

        return $ingredients_by_dish;

    }

    public function getElixirsForIngredient($x_ingredient_id)
    {
        $elixirQuery = "
    SELECT `elixirs`.*
    FROM `elixir_has_ingredient`
    LEFT JOIN `elixirs`
    ON `elixir_has_ingredient`.`elixirs_id` = `elixirs`.`id`
    WHERE `elixir_has_ingredient`.`ingredient_id` = ?
    ";
        $stmt = static::$pdo->prepare($elixirQuery);
        $stmt->execute([$x_ingredient_id]);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $elixirs = $stmt->fetchAll();

        return $elixirs;
    }

    public function getIngredientsForElixirIds(array $elixir_ids)
    {
        if(!$elixir_ids) return [];

        // create a string like (1, 2, 3, 4) from the $elixir_ids
        $elixir_ids_string = '(' . join(', ', $elixir_ids) . ')';

        // select all ingredients for all the elixirs selected above
        $next_query = "
    SELECT `ingredients`.*,
        `elixir_has_ingredient`.`elixirs_id`, `elixir_has_ingredient`.`quantity`
    FROM `elixir_has_ingredient`
    LEFT JOIN `ingredients`
    ON `elixir_has_ingredient`.`ingredient_id` = `ingredients`.`id`
    WHERE `elixir_has_ingredient`.`elixirs_id` IN {$elixir_ids_string}
    ";
        $stmt = static::$pdo->prepare($next_query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $ingredients = $stmt->fetchAll();



        $ingredients_by_elixir = array_fill_keys($elixir_ids, []);

        foreach ($ingredients as $ingredient) {
            $ingredients_by_elixir[$ingredient->elixirs_id][] = $ingredient;
            return $ingredients_by_elixir;
        }

        return $ingredients_by_elixir;

    }


}



