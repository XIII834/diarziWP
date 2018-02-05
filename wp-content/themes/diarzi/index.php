<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Diarzi</title>
	<link rel="stylesheet" href="/wp-content/themes/diarzi/css/style.css">
	<link rel="stylesheet" href="/wp-content/themes/diarzi/css/font-awesome.css">

	<link rel="stylesheet" href="/wp-content/themes/diarzi/css/site.css">
	<link rel="stylesheet" href="/wp-content/themes/diarzi/css/site2.css">
</head>
<body>
	<?php 
		$categories = $wpdb -> get_results("SELECT * FROM category");
		$products = $wpdb -> get_results("SELECT * FROM products");
	?>
	<div class="header">
    <div class="header__logo"></div>
    <!-- <div class="nav-buttons">
        <a class="header-button" href="index.php?r=site%2Fadmin-category">Перейти в категории</a>
        <span> | </span>
        <a href="index.php?r=site%2Fadmin-products">Перейти в товары</a>
    </div> -->
    
    <div class="header__info">
        <p class="text text_big-phone-number">8 800 707 91 69</p>
        <p class="text text_font-bigger">Звонки по России бесплатно</p>
        <div class="header__delimiter"></div>
        <p class="text text_left-phone text_font-bigger">8 909 692 87 26, 8 498 705 53 14</p>
        <p class="text text_left-envelope text_font-bigger">diarzi@mail.ru</p>
    </div>

    <div class="header__button">
        <button class="header__button-link">оставить заявку</button>
    </div>
</div>

<p style="font-style: normal;" class="text text_slogan">Мы занимаемся текстильным оснащением ресторанов и гостиниц  с 2009г., являемся
 непосредствено производителями, что дает нам возможность отслеживать качество продукции на
 всех этапах производства и предложить вам самые приемлемые цены. <br> <b>Работаем со всеми городами РФ. Доставим образцы в любой уголок России.</b></p>

  <div class="category-wrapper">
    <?php foreach ($categories as $category) {
        $flag = false; 
        foreach ($products as $product) {
            if ($product->categoryID == $category->id) {
                $flag = true;
                break;
            }
        }
        if ($flag) { ?>
            <div class="category">
                <a href=<?= '#' . $category->id ?>>
                    <div class="category__img-wrapper">
                        <img class="category__img" src=<?= $category->img ?> alt=<?= $category->name ?>>
                    </div>
                    <p class="text text_category-title"><?= $category->name ?></p>
                </a>
            </div>
        <?php $flag = false; } ?>
     <?php } ?>
 </div>

 <div class="products-wrapper">
    <?php foreach ($categories as $category) {
        $flag = false;
        foreach ($products as $product) {
            if ($product->categoryID == $category->id) {
                $flag = true;
                break;
            }
        }
        if ($flag) { ?>
            <p class="products__title"><?= $category->name ?></p>
            <div class="products__title-description-wrapper">
            	<pre class="text text__slogan products__title-description"><?= $category->description ?></pre>
            </div>
            <a class="products__anchor" name=<?= $category->id ?>></a>
            <div class="products-one-category-wrapper">
                <?php foreach ($products as $product) {
                    if ($product->categoryID == $category->id) { ?>
                        <div title='<?= strval($product->title) ?>' class="product" data-name='<?= strval($product->name) ?>' data-main-photo='<?= strval($product->mainImg) ?>' data-mini-photos='<?= strval($product->imgs) ?>' data-price='<?= strval($product->price) ?>' data-article='<?= strval($product->article) ?>' data-description='<?= strval($product->description) ?>'>
                            <div class="product__img-wrapper">
                                <img class="product__img" src=<?= 'img/' . $product->mainImg ?> alt="">
                            </div>
                            <p class="text text_product-article"><?= '' . $product->article ?></p>
                            <p class="text text_product-price"><?= 'Цена от ' . $product->price . ' ₽' ?></p>
                            <button class="product__button">подробнее</button>
                        </div>
                    <?php } ?>
                <?php $flag = false; } ?>
            </div>
        <?php } ?>
    <?php } ?>
</div>

 <div class="footer">
    <p class="text text_footer-title">мы находимся тут</p>
    <div class="footer__map">
        <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3AxD8BJPd75qz0QCimcRkuIeEk7sGDvOhB&amp;width=100%25&amp;height=500&amp;lang=ru_RU&amp;scroll=true"></script>
    </div>
    <div class="footer__info">
        <div class="footer__info-phones text">
            <p>Телефоны:</p>
            <p>8 800 707 91 69</p>
            <p>8 909 692 87 26</p>
            <p>8 498 705 53 14</p>
        </div>
        <div class="footer__info-address text">
            <p>Адрес: Лихачёвский проспект, 28/35 Долгопрудный, Московская область,Россия, 141707</p>
            <p>© Производитель профессионального текстиля и униформы “Diarzi”, 2012</p>
        </div>
    </div>
</div>

<div class="modal">
    <div class="modal__order-form">
        <p class="modal__title">оставить заявку</p>
        <div class="modal__order-close"></div>
        <?php
            $order_form = ActiveForm::begin([
                'options' => ['class' => 'form-horizontal order-form', 'enctype' => 'multipart/form-data'],
                'method' => 'post',
                'action' => ['site/order-form'],
            ]); ?>
            <?= $order_form -> field($model, 'name') -> textInput(['placeholder' => 'Ваше имя', 'class' => 'order-form__field order-form__field_required']) -> label(false) ?>
            <?= $order_form -> field($model, 'email') -> textInput(['placeholder' => 'Ваш email', 'class' => 'order-form__field']) -> label(false) ?>
            <p class="or">или</p>
            <?= $order_form -> field($model, 'phone') -> textInput(['placeholder' => 'Ваш номер телефона', 'class' => 'order-form__field']) -> label(false) ?>
            <?= $order_form->field($model, 'comment') -> textarea(['rows' => 6, 'placeholder' => 'Ваш комментарий', 'class' => 'order-form__field']) -> label(false); ?>


            <div class="form-group">
                <div class="col-lg-offset-1 col-lg-11">
                    <?= Html::submitButton('Отправить', ['class' => 'order-form__button']) ?>
                </div>
            </div>
            <?php ActiveForm::end() ?>
    </div>
</div>


<script src="/wp-content/themes/diarzi/js/scripts.js"></script>
<script src="/wp-content/themes/diarzi/js/zoom.js"></script>
</body>
</html>