<?php
    spl_autoload_register(function ($class_name) {
        include '../'. $class_name . '.php';
    });

    $subfolders = explode('/', $_SERVER['REQUEST_URI']);
    
    $baseUri = '/';

    // Optimized only for one subfolder, sorry
    if(count($subfolders) > 2) {
        $baseUri .= $subfolders[1] . '/';
    }

    $number = preg_replace("/[^\d]+/i", '', urldecode($_SERVER['REQUEST_URI']));
    $title = preg_replace("/[^\p{L}\s\.,]/u", '', urldecode($_SERVER['REQUEST_URI']));    
?><!DOCTYPE html>
<html lang="bg">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles.css" rel="stylesheet">
    <title><?php echo $number ? : 'Числа на Грабовой'; ?></title>
</head>
<body>
    <div class="layout">
        
<?php
 
if (!$number): ?>    
    
        <header>
            <h1 class="center">Числа на Грабовой</h1>
        </header>

        <main>
        <section class="numbers">
<?php     
    foreach(Numbers::$numbers as $key => $val):
        if($key === 0):
?>
        <h2><?php echo $val[0]; ?></h2>

            <ul>
<?php else:    
        
?>
                <li><a href="<?php echo $baseUri . $val[0]; ?>-<?php echo $val[1]; ?>"><?php echo $val[0]; ?> – <?php echo $val[1]; ?></a></li>
<?php
        endif;
    endforeach;

?>
            </ul>
        </section>

        <scrtion class="info">
            <h2>Какво, защо и как</h2>

            <p>Целта на това сайтче е простичка – да отвори едно табче на вашия браузър, където да виждате числото, върху което искате да се концентрирате. То ще си седи там, докато си бачкате с браузъра и няма да го губите от очи. Самата страничка изписва числото няколко пъти, ако ви е нужно да си направите скрийшот, да си го принтирате или нещщо подобно. Абе, малко да си начешем мързела. Ако не намирате числото в списъка в ляво, напишете си го в адрес-бара на браузъра, както това се случва с наличните числа.</p>

            <p>Какво правят тези числа – ами потърсете в гуглето, мързи ме да го правя вместо вас &#x1F609;</p>

            <p>Благодаря на хората, дето ме светнаха за тази магийка. Тепърва предстои да се убедя лично в действието ѝ.</p>

            <p>Бъдете здрави и вдъхновени!<br/>
                <i><b>Т&#x1F600;НИ</b></i></p>
        </section>
        
<?php
?>
<?php else: ?>
    <header><a href="<?php echo $baseUri; ?>"><img src="home.png" alt="home" /></a></header>

    <aside>

<?php
    for ($i = 0; $i < 50; $i ++): 
        $fontSize = rand(3, 5) . 'rem';
        $left = rand(0, 85) . '%';
        $top = rand(0, 90) . '%';
        $rotate = rand(-40, 40) . 'deg';
?>
    <span class="number-container" style="font-size: <?php echo $fontSize; ?>; left: <?php echo $left; ?>; top: <?php echo $top; ?>; transform: rotate(<?php echo $rotate; ?>)"><?php echo $number; ?></span>

<?php 
    endfor; 
?>
    <span class="number-container main">
        <span><?php echo $title; ?><br/><?php echo $number; ?></span>
    </span>
<?php
endif; 
?>
        </aside>
    </main>

    <footer>
        &copy; 2022 Антон Мицев (<a href="https://www.tonymitsev.com/">tonymitsev.com</a>)<br/> <strong>ВАЖНО!</strong> Собственикът на сайта не носи никаква отговорност, ако си причините каквото и да било! Има и някaкви кукита по сайта – ако не ви харесва, напуснете.<br/>И нека се оглеждаме, преди да скочим на пешеходната пътека!

    </footer>
</body>
</html>