<!DOCTYPE html>

<html>
<head>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <style>
        body{
            margin:30px auto;
            display:block;
            background-color:grey
        }
        .wholeform{
            width:30%;
            margin:0px auto;
            background-color:white;
            padding:10px 20px 10px 20px;
            border-radius: 5px;
        }
        .showtips{
            width:100%;
            color:blue;
            border:solid 2px;
            border-color: blue;
            background-color:white;
            margin:20px auto;
            border-radius:5px;
        }
    </style>
    <title></title>
</head>
<body>
    <div class = "wholeform">
        <h1 style="text-align:center; color:orange">Tip Calculator</h1>
        <form action = "index.php" method = "post">
            <span class = "bill">Bill subtotal: $</span>
            <input type = "text" name = "subtotal" value="<?php echo isset($_POST['subtotal'])? $_POST['subtotal'] : 0 ?>" size="5" class = "subtotalClass"><br>
            Tip percentage:<br>

            <?php
                //Using for loop to build 3 radio buttons
                for($i = 2; $i < 5; $i++){
                    $percent = $i * 5;
            ?>
                <!--$button[$i-2] = '<input type = "radio" name = "percentButton" value = "<?php echo $percent; ?>">';-->
                <input type="radio" name="percentButton" value="<?php echo $percent;?>" <?php if(isset($_POST['percentButton'])&&$_POST['percentButton'] == $percent) echo 'checked = "checked"'?>> <?php echo $percent; ?>%

            <?php
                }//end for
            ?>
                <!--Additional radio button for custom tips-->
                <input type="radio" name="percentButton" value="0" <?php if(isset($_POST['percentButton'])&&$_POST['percentButton'] == "0") echo 'checked = "checked"'?>>
                <input type="text" name="customTips" size="1" value="<?php echo isset($_POST['customTips'])? $_POST['customTips'] : 0 ?>">%
            <br>

            <input class="btn btn-secondary" type = "submit" name = "submitForm"
                vaule = "Submit" style = "margin:0px auto;display:block">


            <?php
                //Submit form
                if(isset($_POST['submitForm'])){
                    //If the radio is clicked
                    if(isset($_POST['percentButton']) && is_numeric($_POST['subtotal'])
                        && $_POST['subtotal'] > 0)
                    {
                        if($_POST['percentButton'] == "0" && $_POST['customTips'] > 0){
                            $_POST['percentButton'] = $_POST['customTips'];
                        }
                        $totaltips = $_POST['subtotal'] * $_POST['percentButton'] * 0.01;
            ?>

                <div class="showtips">
                Tips:

            <?php
                        echo $totaltips;
            ?><br>

                Total:
            <?php
                        echo $totaltips + $_POST['subtotal'];
                    }//end radio check if
                    else{
            ?>
                        <script>$(".subtotalClass").attr("value","0")</script>
                        <script>$(".bill").css("color","red")</script>
            <?php
                    }
                }//end submit form if
            ?>

            </div>
        </form>
    </div>
</ul>
</body>

</html>