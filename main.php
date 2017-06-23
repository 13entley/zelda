<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Zelda | Cooking Recipes</title>
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
            <div class="returndata">
                <?php

                $pdo = new PDO('mysql:host=localhost;dbname=zelda;charset=utf8', 'root', 'rootroot');

                $stmt = $pdo->prepare('SELECT ingredients FROM zelda');
                $stmt->execute();
                $tags = $stmt->fetchAll();
                var_dump($stmt->fetchAll());
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


                ?>
                <h2 class="formheader">Recipes</h2>
                <a href="" id="returntotop">Return To Ingredients</a>



            </div>
        </div>
        <div class="gifpicture"></div>
    </div>
</div>


<script>
//    $(document).ready(function(){
//        $('.midparallax').hide();
//        $('.botparallax').hide();
//        $("#submit").click(function() {
//            $('.gifpicture').show();
//            $('.midparallax').show();
//            $('.botparallax').show();
//            $('html, body').animate({
//                scrollTop: $("#myDiv").offset().top
//            }, 5000);
//            function hideDiv(){
//                $('.gifpicture').hide();
//                $('.midparallax').hide();
//                $('.botparallax').hide();
//            }
//        });
//    });
        $(document).ready(function(){
            $("#submit").click(function(){
                $('.formstyle').fadeOut(2000);
                $('.gifpicture').fadeIn(3000).fadeOut(2000);
                $('.returndata').show(2000).fadeIn(8000);

            })
        });

</script>
<!-- The JavaScript -->
<script type="text/javascript" src="jquery.easing.1.3.js"></script>
<script type="text/javascript">
    $(function() {
        $('ul.nav a').bind('click',function(event){
            var $anchor = $(this);
            /*
             if you want to use one of the easing effects:
             $('html, body').stop().animate({
             scrollLeft: $($anchor.attr('href')).offset().left
             }, 1500,'easeInOutExpo');
             */
            $('html, body').stop().animate({
                scrollLeft: $($anchor.attr('href')).offset().left
            }, 1000);
            event.preventDefault();
        });
    });
</script>
</body>
</html>