<div class="container">
    <nav id="menu" class="navbar">
        <div class="navbar-header"><span id="category" class="visible-xs">{{ text_category }}</span>
            <button type="button" class="btn btn-navbar navbar-toggle" data-toggle="collapse"
                    data-target=".navbar-ex1-collapse"><i class="fa fa-bars"></i></button>
        </div>
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
                <?php foreach ($categories as $category){?>
                <li><a href="<?=$route->map['category'].$category['category_name']?>"><?=$category['category_name']?></a></li>
                <?php }?>
            </ul>
        </div>
    </nav>
</div>

