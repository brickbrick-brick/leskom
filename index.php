<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ООО "ЛЕСКОМ"</title>
    <link rel="stylesheet" href="style.css">
</head>


<body>
    <div class="wrapper">
	<div class="modalreg">
            <div id="openModal" class="modal">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <a href="#close" title="Close" class="close">✖</a>
                    <div class="modal-header">
                        
                        <div class="modal-block-title">
                            <h3 class="modal-title vert-header__logo">ЛЕС<br>КОМ</h3>
                        </div>
                        
                    </div>
                    <div class="modal-label">личный кабинет</div>
                    <div class="modal-body">    
					<div class="content">
			<!-- notification message -->
						<?php if (isset($_SESSION['success'])) : ?>
						<div class="error success" >
							<h3>
							<?php 
								echo $_SESSION['success']; 
								unset($_SESSION['success']);
							?>
							</h3>
						</div>
						<?php endif ?>

						<!-- logged in user information -->
						<?php  if (isset($_SESSION['username'])) : ?>
							<p class="lcabinet">Ваш номер: <strong class="lcabinet-user"><?php echo $_SESSION['username']; ?></strong></p>
							<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
						<?php endif ?>


		</div>
                            
                            
                            
                            
                            
                            
                        </form>
                    </div>
                  </div>
                </div>
              </div>
        </div>
		
        <header class="header">
            <div class="header__cont">
                <nav class="header__menu menu">
                    <ul class="menu__list">
                        <li class="menu__item">
                            <a href="catalog.php" class="menu__link">Каталог</a>
                        </li>
                        <li class="menu__item">
                            <a href="" class="menu__link">Доставка</a>
                        </li>
                        <li class="menu__item">
                            <a href="" class="menu__link">Оплата</a>
                        </li>
                    </ul>
                </nav>
                <a href="#openModal" class="btn header__lk" onclick="document.querySelector('.windowauth__input').focus()">Личный кабинет</a>
                
            </div>
        </header>
        <?php include('server.php') ?>
        <div class="modalreg">
            <div id="openModal" class="modal">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <a href="#close" title="Close" class="close">✖</a>
                    <div class="modal-header">
                        
                        <div class="modal-block-title">
                            <h3 class="modal-title vert-header__logo">ЛЕС<br>КОМ</h3>
                        </div>
                        
                    </div>
                    <div class="modal-label">личный кабинет</div>
                    <div class="modal-body">    
                        <form method="post" action="login.php">
                            <?php include('errors.php'); ?>
                            <div class="input-group">
                                <div class="windowauth" onclick="document.querySelector('input').focus()">
                                    <!-- <form> -->
                                    <label class="windowauth__label">Телефон</label>
                                    <input class="windowauth__input" type="text" name="username" maxlength="12">
                                    <!-- </form> -->
                                    
                                </div>
                            </div>
                            <div class="input-group">
                                <div class="windowauth" onclick="document.querySelector('#pass').focus()">
                                    <label class="windowauth__label--pass">Пароль</label>
                                    <input class="windowauth__input" type="password" name="password" id="pass">
                                </div>
                            </div>
                            
                            <div class="input-group">
                                <button type="submit" class="btnlogin" name="login_user">Войти</button>
                            </div>
                            <p class="coloracc">
                                Нет аккаунта?<a href="#openReg" class="colorreg" href="register.php">Зарегистрироваться</a>
                            </p>
                        </form>
                    </div>
                  </div>
                </div>
              </div>
        </div>

        <div class="modalreg">
            <div id="openReg" class="modal">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <a href="#close" title="Close" class="close">✖</a>
                    <div class="modal-header">
                        
                        <div class="modal-block-title">
                            <h3 class="modal-title vert-header__logo">ЛЕС<br>КОМ</h3>
                        </div>
                        
                    </div>
                    <div class="modal-label">Регистрация</div>
                    <div class="modal-body">    
                        


                        <form method="post" action="register.php">
                            <?php include('errors.php'); ?>
                            <div class="input-group">
                                <div class="windowauth">
                                    <label class="windowauth__label">Телефон</label>
                                    
                                    <input class="windowauth__input" type="text" name="username" value="<?php echo $username; ?>">
                                </div>
                                
                            </div>
                            <div class="input-group">
                                <div class="windowauth">
                                    <label class="windowauth__label--pass">Email</label>
                                    <input class="windowauth__input" type="email" name="email" value="<?php echo $email; ?>">
                                </div>
                            </div>
                            
                            <div class="input-group">
                                <div class="windowauth">
                                    <label class="windowauth__label--pass">Пароль</label>
                                    <input class="windowauth__input" type="password" name="password_1" id="pass_1">
                                </div>
                            </div>
                            <div class="input-group">
                                <div class="windowauth">
                                    <label class="windowauth__label--pass">Повторите пароль</label>
                                    <input class="windowauth__input" type="password" name="password_2" id="pass_2">
                                </div>
                            </div>
                            <div class="input-group">
                                
							<button type="submit" class="btnreg" name="reg_user">Регистрация</button>
                            </div>
                            <p class="coloracc-2">
                                Уже зарегистрированы?<a href="#openModal" class="colorreg" href="login.php">Войти</a>
                            </p>
                        </form>
                    </div>
                  </div>
                </div>
              </div>
        </div>

        <main class="page">
            <div class="page__main-block main-block">
                <div class="main-block__image _ibg">
                    <img src="img/cover_leskom.png" alt="cover">
                </div>
                <div class="vert">
                    <div class="vert-header">
                        <div class="vert-header__img">
                            <a href="index.php" class="vert-header__logo">
                                ЛЕС<br>КОМ
                            </a>
                        </div>
                        <div class="vert-header__icons">
                            <div class="vert-header__item--none">
                                <div class="vert-header__block">
                                    <div class="vert-header__ico">
                                        <!-- <div class="vert-header__icon-tel">
                                            <img src="img/ico/tel.svg" alt="telephone">
                                        </div> -->
                                    </div>
                                    <div class="tel hidden">
                                        <p id="p1">support@leskom.ru</p>
                                        <p id="p2">+79141112233</p>
                                        <pre class="vert-header__text--mail"><code>               </code></pre>
                                    </div>
                                </div>
                            </div>
                            <div class="vert-header__item">
                                <div class="vert-header__block">
                                    <div class="vert-header__ico">
                                        <div onclick="copyToClipboard('#p2')" class="vert-header__icon-tel">
                                            <img src="img/ico/tel.svg" alt="telephone">
                                        </div>
                                    </div>
                                    <div class="tel hidden--tel">
                                        <pre class="vert-header__text--tel"><code>          +7(914)111-22-33</code></pre>
                                    </div>
                                </div>
                            </div>
                            <div class="vert-header__item">
                                <div class="vert-header__block">
                                    <div class="vert-header__ico">
                                        <div onclick="copyToClipboard('#p1')" class="vert-header__icon-mail">
                                            <img src="img/ico/mail.svg" alt="mail">
                                        </div>
                                    </div>
                                    <div class="mail hidden--mail">
                                        <p id="p1">support@leskom.ru</p>
                                        <pre class="vert-header__text--mail"><code>          support@leskom.ru</code></pre>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main-block__label">
                    Лесная и деревообрабатывающая промышленность в Тымовском районе
                </div>     
            </div>
            <section class="page__info info">
                <div class="info__container _container">
                    <div class="info__blocks blocks">
                        <div class="info__item">
                            <div class="info__strip">
                                <div class="info__label">о предприятии</div>
                                <span class="strip"></span>
                            </div>
                            <div class="info__content">
                                <div class="info__lab">
                                    <div class="info__logolabel">ЛЕС<br>КОМ</div> 
                                </div> 
                                <div class="info__text">
                                    ООО «Леском» — это общество с ограниченной ответственностью, которое занимается лесозаготовкой и лесопереработкой. Организация осуществляет свою деятельность на территории Тымовского района, Сахалинской области. Была организована в 2003 году.
                                </div>
                            </div>
                        </div>
                        <div class="info__item">
                            <div class="info__strip">
                                <div class="info__label">Срок доставки</div>
                                <span class="strip"></span>
                            </div>
                            <div class="info__content">
                                <div class="info__lab">
                                    <div class="info__labs">доставка</div> 
                                </div> 
                                <div class="info__text">
                                    Доставка осуществляется по всей Сахалинской области. Дата и время доставки обговариваются при личном звонке с сотрудником предприятия.
                                </div>
                            </div>
                            <div class="btn--detail">
                                <a href="" class="btn header__lk--det">Подробнее</a>
                            </div>
                        </div>
                        <div class="info__item">
                            <div class="info__strip">
                                <div class="info__label">Способы оплаты</div>
                                <span class="strip"></span>
                            </div>
                            <div class="info__content">
                                <div class="info__lab">
                                    <div class="info__labs">оплата</div> 
                                </div> 
                                <div class="info__text">
                                    Оплата товара или услуги возможна банковской картой любого банка РФ, наличными и по мобильному переводу.
                                </div>
                            </div>
                            <div class="btn--detail">
                                <a href="" class="btn header__lk--det">Подробнее</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="page__contacts contacts">
                <div class="contacts__container _container">
                    <div class="contacts__block">
                        <div class="info__strip">
                            <div class="info__label">Контакты</div>
                            <span class="strip"></span>
                        </div>
                        <div class="contacts__info">
                            <div class="contacts__counting">
                                <div class="counting__item">
                                    <div class="counting__label"><span class="minutes">30</span>мин</div>
                                    <div class="counting__text">из пгт. Тымовское</div>
                                </div>
                                <div class="counting__item">
                                    <div class="counting__label"><span class="minutes">120</span>мин</div>
                                    <div class="counting__text">из пгт. Ноглики</div>
                                </div>
                                <div class="counting__item">
                                    <div class="counting__label"><span class="minutes">20</span>мин</div>
                                    <div class="counting__text">из с. Воскресеновка</div>
                                </div>
                                <div class="counting__item">
                                    <div class="counting__label"><span class="minutes">80</span>мин</div>
                                    <div class="counting__text">из города Александровск-Сахалинский</div>
                                </div>
                            </div>

                            <div class="contacts__gray gray">
                                <div class="gray__contact">
                                    <div class="gray__item">
                                        <img src="img/contacts/geo.svg" alt="Geo">
                                        <div class="gray__text">Сахалинская область, с. Молодёжное,
                                            Советская ул., 13 </div>
                                    </div>
                                    <div class="gray__item">
                                        <img src="img/contacts/phone.svg" alt="">
                                        <div class="gray__text">+7 (914) 111-22-33</div>
                                    </div>
                                </div>
                                <div class="gray__working">
                                    <div class="gray__label">Время работы</div>
                                    <div class="gray__work">
                                        <div class="gray__days">Пн-Пт</div>
                                        <div class="gray__hours">с 10:00 до 22:00</div>
                                    </div>
                                    <div class="gray__work">
                                        <div class="gray__days">Сб-Вс</div>
                                        <div class="gray__hours">с 12:00 до 21:00</div>
                                    </div>
                                </div>
                                <div class="gray__btns">
                                    <a target="_blank" href="https://yandex.ru/maps/11450/sakhalin-district/house/sovetskaya_ulitsa_13/ZU0EaAFkQEwPVEJvYmJxcHtnbA4=/?from=tabbar&ll=142.651767%2C51.017297&source=serp_navig&z=17.4" class="btn header__lk--openmap">Открыть карту</a>
                                    <a href="mailto:support@leskom.ru" class="btn header__lk--mail">Написать письмо</a>
                                </div>
                            </div>
                            <div class="contacts__map-image">
                                <img class="map" src="img/map/map.png" alt="Map">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <footer class="footer">
            <div class="footer__container _container">
                <div class="footer__block">
                    <div class="footer__logo">
                        <a href="index.php" class="footer__img">
                            ЛЕС<br>КОМ
                        </a>
                    </div>
                    <div class="footer__years">2003-2023</div>
                </div>
            </div>
        </footer>
    </div>
    <script src="js/catalog.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

</body>
</html>