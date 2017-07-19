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

$api = new ZeldaApi();

$zelda = new Zelda();
$ingredients = $zelda->getIngredients();


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Zelda | Cooking Recipes</title>
</head>
<body>
<script src="js/jquery-3.2.1.js"></script>
<div class="zelda">
    <div class="topparallax">
        <div class="navigation">
            <img class="botwlogo" src="img/title.jpg">
            <h1 class="pagetitle">Cooking Recipes</h1>
            <div class="links"><a href="tables/library.php">Library of Ingredients, Dishes, & Elixirs</a></div>
        </div>
        <div class="middlepage">
            <div class="socialmedia">
                <iframe src="https://www.facebook.com/plugins/share_button.php?href=https%3A%2F%2Fwww.zeldacooking.com&layout=button&size=large&mobile_iframe=true&width=73&height=28&appId"
                        width="73" height="28" style="border:none;overflow:hidden" scrolling="no" frameborder="0"
                        allowTransparency="true"></iframe>
            </div>
            <div class="formstyle">
                <div class="formstyleheader">
                    <h1 class="formheader">Select Your Ingredient(s)</h1>
                      <p class="instructions">
                            Choose an ingredient below to show all recipes that you can make with
                            that ingredient!
                      </p>
                </div>
                <form class="ingredientform">
                    <select id="ingredientlist" class="select" name="IngredientList">
                        <option value="0">---------------</option>
                        <?php foreach ($ingredients as $ingredient): ?>
                            <option value="<?php echo $ingredient->id ?>">
                                <?php echo $ingredient->name ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <select id="ingredientlist" class="select" name="IngredientList">
                        <option value="0">---------------</option>
                        <?php foreach ($ingredients as $ingredient): ?>
                            <option value="<?php echo $ingredient->id ?>">
                                <?php echo $ingredient->name ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <select class="select2" name="IngredientList">
                        <option value="Ingredient 3">Ingredient 3</option>
                    </select>

                    <br><br>
                    <button id="submit" type="button" name="submit">Let's Cook!</button>
                </form>
            </div>
            <div class="returndata">
                <h2 class="formheader">Recipes</h2>
                <a id="returntotop">Return To Ingredients</a>
                <div class="container">
                    <div id="dishreturn">DISHES</div>

<!--                    <table id="list" cellpadding="0" cellspacing="0" border="0" class="display" id="dishes" width="100%">-->
<!--                        <thead>-->
<!--                        <tr>-->
<!--                            <th>Dishes</th>-->
<!--                            <td>-->
                                <div id="disheslist"></div>
<!--                            </td>-->
<!--                            <th>Effects</th>-->
<!--                            <td></td>-->
<!--                            <th>Ingredients</th>-->
<!--                            <td></td>-->
<!--                            <th>Notes</th>-->
<!--                            <td></td>-->
<!--                        </tr>-->
<!--                        </thead>-->
<!--                    </table>-->
                    <div id="elixirreturn">ELIXIRS</div>
<!--                    <table cellpadding="0" cellspacing="0" border="0" class="display" id="dishes" width="100%">-->
<!--                        <thead>-->
<!--                        <tr>-->
<!--                            <th>Elixir</th>-->
<!--                            <td></td>-->
<!--                            <th>Effects</th>-->
<!--                            <td></td>-->
                                <div id="elixirslist"></div>
<!--                            <th>Ingredients</th>-->
<!--                            <td></td>-->
<!--                            <th>Notes</th>-->
<!--                            <td></td>-->
<!--                        </tr>-->
<!--                        </thead>-->
<!--                    </table>-->

                </div>


            </div>
        </div>
        <div class="gifpicture"></div>
    </div>
<!--    <div class="footer">-->
<!--        <img class="bitlink" src="img/link_16_bit.png">-->
<!--    </div>-->
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
    $(document).ready(function(){
        $(".bitlink").click(function(){
            $(".middlepage").fadeOut(5000);
            $(".footer").fadeIn(3000);
            $(".bitlink").animate({
                left: '1000em;',
                top: '500px',
                height: '500px',
                width: '350px'
            });
        })
    });

    $(document).ready(function () {
        $("#submit").click(function () {
            $('.formstyle').fadeOut(2000);
            let id = $('#ingredientlist').val();

            loadIngredientData(id);
            loadIngredientDataForElixirs(id);


            $('.gifpicture').fadeIn(3000).fadeOut(2000);
            $('.returndata').show(2000).fadeIn(8000);
        });
    });
    $(document).ready(function () {
        $("#returntotop").click(function(){
        $('.returndata').fadeOut(3000);
        $('.formstyle').fadeIn(3000);
        })
    });


</script>


</body>
</html>