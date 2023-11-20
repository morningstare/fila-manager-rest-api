<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>morningstare:)</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            direction: rtl;
        }

        .father {
            position: relative;
            width: 100%;
            height: 90vh;
            background-color: lightgreen;
            color: white;
        }

        .father > div {
            position: absolute;
            top: 10%;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 2rem;
        }

        .father >div >div{
            display: flex;
            gap: 2rem;
            font-size: 24px;
        }
        .father h1{
            font-size: 50px;
        }

        .father a{
            text-decoration: none;
            color: white;
            background-color: #333333;
            width: 100px;
            height: 45px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: .5rem;
        }
        footer{
            width: 100%;
            height: 10vh;
            background-color: lightgreen;
            color: #333333;
            direction: ltr;
            text-align: center;
        }
        /*.button{*/
        /*    position: absolute;*/
        /*    top: 10rem;*/
        /*    left: 10rem;*/
        /*}*/
    </style>
</head>
<body>
<section class="father">
    <div>
        <h1>سلام تو کونی هستی؟</h1>
        <div>
            <a href="response.html">آره:)</a>
            <a href="responseno.html" class="button">نه</a>
        </div>
    </div>
</section>
<footer>
    <span>designed by moringstare:)</span>
</footer>
<script>

    const button = document.querySelector('.button');
    button.addEventListener('mouseover',function (e){
        button.style.position = 'absolute';
        var x = Math.floor(Math.random() * 500);
        var y = Math.floor(Math.random() * 600);
        button.style.left = x + 'px';
        button.style.top = y + 'px';
    });





</script>
</body>
</html>
<?php /**PATH C:\Users\ASUS\Desktop\dock bar\laravel\resources\views/index.blade.php ENDPATH**/ ?>