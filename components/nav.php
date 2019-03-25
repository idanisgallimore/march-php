<nav class="navigation">
    <div class="navigation__box navigation__box--short">
    <!-- Leave empty? -->
    </div>
    <div class="navigation__box navigation__box--long">
        <div class="navigation__brand">
            <h1 class="navigation__logo">PARMLÈES</hi>
        </div>
        <ul class="navigation_links">
        <!-- add php code to loop through list of links -->
        <?php 
            $links = array("search" => "search", "Home" => "main", "Women" => "women", "Men" => "men","Jewelry" =>"jewelry","Home Goods" => "homes" );
            foreach($links as $key => $value){
            echo  
            "<li class=\"navigation__item\">
                <a class=\"navigation__link navigation__link--larger\" href=\"index.php?page=$value\">$key</a>
            </li>";
            } 
        ?>
        </ul>
    </div>
    <div class="navigation__box navigation__box--short">
            <div class="navigation__icons">
                <a class="navigation__link navigation__link--small" href="#">Sign in/Register</a>
                <a class="navigation__link navigation__link--small" href="#"><i class="navigation_icon navigation__wishlist far fa-heart"></i></a>
                <a class="navigation__link navigation__link--small" href="#"><i class="navigation_icon navigation_shopping-bag fas fa-shopping-bag"></i> Bag</a>
            </div>
            <div class="navigation__search-bar">
                <i class="navigation__search-icon fas fa-search"></i>
            </div>
    </div>
</nav>