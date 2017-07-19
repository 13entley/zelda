<?php
/**
 * Created by PhpStorm.
 * User: 13entley
 * Date: 7/4/17
 * Time: 11:03 AM
 */
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">


    <title>Document</title>
</head>
<body>
<script src="js/jquery-3.2.1.js"></script>
<div class="zelda">
    <div class="topparallax">
        <div class="navigation">
            <img class="botwlogo" src="img/title.jpg">
            <h1 class="pagetitle">Cooking Recipes</h1>

        </div>
        <div class="middlepage">
            <div class="socialmedia">
                <iframe src="https://www.facebook.com/plugins/share_button.php?href=https%3A%2F%2Fwww.zeldacooking.com&layout=button&size=large&mobile_iframe=true&width=73&height=28&appId"
                        width="73" height="28" style="border:none;overflow:hidden" scrolling="no" frameborder="0"
                        allowTransparency="true"></iframe>
            </div>
            <div class="formstyle">
                <h1 class="formheader">Select Your Ingredient(s)</h1>
                <p class="instructions">
                    Choose an ingredient below to show all recipes that you can make with
                    that ingredient!
                </p>
                <img class="cookingpot" src="img/cookingpot.jpg">
                <form class="ingredientform">
                    <select class="select" name="IngredientList">
                        <option value="0">---------------</option>
                        <?php foreach ($ingredients as $id => $ingredient): ?>
                            <option value="<?php echo $id ?>">
                                <?php echo $ingredient['ingredients'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <select class="select2" name="IngredientList">
                        <option value="Ingredient 2">Ingredient 2</option>
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
                <a href="" id="returntotop">Return To Ingredients</a>


            </div>
        </div>
        <div class="gifpicture"></div>
    </div>
</div>


<script>

    $(document).ready(function () {
        $("#submit").click(function () {
            $('.formstyle').fadeOut(2000);
            $('.gifpicture').fadeIn(3000).fadeOut(2000);
            $('.returndata').show(2000).fadeIn(8000);

        })
    });

</script>



</body>
</html>