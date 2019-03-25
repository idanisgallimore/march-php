<div class="jumbotron">
    <div class="jumbotron__content">
        <p class="jumbotron__text">Find Adventure<br> Shop Summer 2019 Collection</p>
        <a class="jumbotron__link" href="index.php?page=men">SHOP MEN</a>
    </div>
</div>
<div class="landing-categories">
    <h3 class="landing__title">Our Box of Goodies</h3>
    <div class="landing-categories__links">
        <?php 
            $links = array("WOMEN" => "women", "MEN" => "men","JEWELRY" =>"jewelry","HOME" => "homes", "BEAUTY" => "beauty", "WATCHES" => "watches", "SUNGLASSES" => "sunglasses", "SHOES" => "shoes" );
            foreach($links as $key => $value){
                echo  
                // <img class=\"category_item__image\" src=\"images/landing/$value.jpg\"></img>
                "<div class=\"category__item\">
                    <a class=\"category_item__link category_item__link--$value\" href=\"index.php?page=$value\"></a>
                    <h4 class=\"category-name\">$key</h4>
                </div>";
            } 
        ?>
    </div>
</div>
<div class="landing-section3">
    <div class="landing-section3__1">
        <div class="landing-section3-pic"></div>
    </div>
    <div class="landing-section3__2">
        <div class="landing-section3-pic2"></div>
        <h3 class="landing-section3__title">Elegant Clothes in <br> Strong, Vibrant Colors.</h3>
        <div class="landing-section3__buttons">
            <a class="btn btn-white btn-long btn-long1" href="index.php?page=women">WOMEN</a>
            <a class="btn btn-white btn-long" href="index.php?page=men">MEN</a>
        </div>
    </div>
</div>
<div class="landing-section4">
    <div class="landing-section4__text">
        <h3 class="landing-section4__title">AN ENDLESS JOURNEY</h3>
        <p class="landing-section4__subtitle">Take the next step. Throw fear away.</p>
        <a class="landing-section4__link" href="index.php?page=women">Dare to dream</a>
    </div> 
    <video class="landing-section4__video" autoplay muted loop>
        <source src="images/video/woman.mp4" type="video/mp4">
    </video>
</div>
<div class="landing-section5">
    <div class="landing-section5__content">
        <h4 class="landing-section5__text">The New Gem</h4>
        <p class="landing-section5__subtext">A new discovery. Beautiful gems that shine as brightly as your soul. These gems will make you stand out in ways you never imagined.</p>
        <a class="landing-section5__link" href="index.php?page=jewelry">Discover More &#8594;</a>
    </div>            
</div>
