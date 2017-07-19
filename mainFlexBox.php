<?php
/**
 * Created by PhpStorm.
 * User: 13entley
 * Date: 7/18/17
 * Time: 1:12 PM
 */
ini_set("display_errors", "on");
error_reporting(E_ALL);
use Api\ZeldaApi;
use Api\Zelda;

require 'lib/ZeldaApi.php';
require 'lib/Zelda.php';

$ingredients = [];
$elixirs = [];
$dishes = [];

$api = new ZeldaApi();

$zelda = new Zelda();
$ingredients = $zelda->getIngredients();


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/StyleFLEX.css">
    <title>Zelda | Cooking Recipes</title>
</head>
<body>
<script src="js/jquery-3.2.1.js"></script>
<div class="zelda">
    <div class="header">
        <img class="logo" src="img/title.jpg">
        <h1 class="page_title">Cooking Recipes</h1>
        I made this for my love of the Zelda franchise.
    </div>
    <div class="middle_page_container">
        <div class="middle_page_select">
            <h1 class="form_title">Select Your Ingredient(s)</h1>
            <p class="form_instructions">
                Choose an ingredient below to show all recipes that you can make with
                that ingredient!
            </p>
            <form class="ingredientform">
                <select id="ingredientlist" class="select" name="IngredientList"><option value="0">---------------</option><?php foreach ($ingredients as $ingredient): ?><option value="<?php echo $ingredient->id ?>"><?php echo $ingredient->name ?></option><?php endforeach; ?></select>
                <select id="ingredientlist" class="select" name="IngredientList"><option value="1">---------------</option><?php foreach ($ingredients as $ingredient): ?><option value="<?php echo $ingredient->id ?>"><?php echo $ingredient->name ?></option><?php endforeach; ?></select>
                <select id="ingredientlist" class="select" name="IngredientList"><option value="2">---------------</option><?php foreach ($ingredients as $ingredient): ?><option value="<?php echo $ingredient->id ?>"><?php echo $ingredient->name ?></option><?php endforeach; ?></select>

                <br><br>
                <button id="submit" type="button" name="submit">Let's Cook!</button>
            </form>
        </div>
    </div>
    <div class="return_container">
        <div class="middle_page_return">
            <div class="return_data_header">
                <h2 class="formheader">Recipes</h2>
                <a id="returntotop">Return To Ingredients</a>
                <div id="dishreturn">DISHES</div>
            </div>
            <div class="dish_container">
                <div id="disheslist"></div>
            </div>
            <div class="elixir_container"
                <div id="elixirreturn">ELIXIRS</div>
                <div id="elixirslist"></div>
            </div>
        </div>
    </div>
</div>

<script>
    function loadIngredientData(id) {
        $.ajax({
            'url': 'dishesAjax.php',
            'type': 'get',
            'data': {
                'id': id
            }
        })
            .done(function (data) {
                $('#disheslist').html(data)
            });
    }
    function loadIngredientDataForElixirs(id) {
        $.ajax({
            'url': 'elixirsAjax.php',
            'type': 'get',
            'data': {
                'id': id
            }
        })
            .done(function (data) {
                $('#elixirslist').html(data)
            });
    }
    $(document).ready(function () {
        $('.return_container').hide();
    });
    $(document).ready(function () {
        $("#submit").click(function () {
            $('.middle_page_container').fadeOut(2000);
            let id = $('#ingredientlist').val();

            loadIngredientData(id);
            loadIngredientDataForElixirs(id);


            $('.gifpicture').fadeIn(3000).fadeOut(2000);
            $('.return_container').show().fadeIn(8000);
        });
    });
    $(document).ready(function () {
        $("#returntotop").click(function(){
            $('.return_container').fadeOut(3000);
            $('.middle_page_container').fadeIn(3000);
        })
    });


</script>
</body>
</html>

