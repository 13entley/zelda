<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">

    <title>Zelda | Cooking Recipes</title>
</head>
<body>
<script src="js/jquery-3.2.1.js"></script>
<div class="zelda">
    <div class="topparallax">
        <div class="navigation">
            <img src="img/title.jpg" style="width:300px; height:140px;">
            <h1 class="pagetitle">Cooking Recipes</h1>
        </div>
        <div class="middlepage">
            <div class="socialmedia">
                <iframe src="https://www.facebook.com/plugins/share_button.php?href=https%3A%2F%2Fwww.zeldacooking.com&layout=button&size=large&mobile_iframe=true&width=73&height=28&appId" width="73" height="28" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>            </div>
                <div class="formstyle">
                <h1 class="formheader">Select Your Ingredient(s)</h1>
                <p class="instructions">
                    Choose an ingredient below to show all recipes that you can make with
                    that ingredient!
                </p>
                <img class="cookingpot" src="img/cookingpot.jpg" style="width:250px; height:200px;"
                <form class="ingredientform">
                    <select class="select" name="IngredientList" style="width:10em; height:2em;  margin-left:18em">
                        <option value="Ingredient 1">Ingredient 1</option>
                    </select>
                    <select class="select"  name="IngredientList" style="width:10em; height:2em; margin-top:3em; margin-left:4em">
                        <option value="Ingredient 2">Ingredient 2</option>
                    </select>
                    <select class="select" name="IngredientList" style="width:10em; height:2em;  margin-left:4em">
                        <option value="Ingredient 3">Ingredient 3</option>
                    </select>
                    <button id="submit" name="submit">Let's Cook!</button>
                </form>
            </div>
        </div>
    </div>
    <div class="midparallax">
        <div class="parallaxpicture">

        </div>
    </div>
    <div class="botparallax">
        <br><br><br><br><br><br><br><br><br><br>
        <br><br><br><br><br>
        <div id="myDiv"></div>
        <br><br><br><br><br>
        <div class="bottompage">

            <div class="returndata">
                <?php // return the results from a selected ingredient / ingredients?>
                <h2 class="formheader">Recipes</h2>
                <a href="" id="returntotop">Return To Ingredients</a>


            </div>

        </div>
    </div>


</div>


<script>
    //                        $('#submit').onclick(function()
    //
    //                        {
    //                            $('#submit').animate({
    //                                scrollBottom: target.offset().bottom}
    //                                ,5000,)
    //                            }
    //                        })
    $('.midparallax').hide();
    $('.botparallax').hide();
    $("#submit").click(function() {
        $('.midparallax').show();
        $('.botparallax').show();
        $('html, body').animate({
            scrollTop: $("#myDiv").offset().top
        }, 1500);
    });
</script>

</body>
</html>