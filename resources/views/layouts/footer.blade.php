
<footer>
    <div class="container">
        <div class="row">
            <div class="logo col-12">
                <div class="row">
                    @include('assets.logo')
                </div>
            </div>
            <div class="col-md-3">
                <div class="row">
                    <ul class="footer-menu">
                        <li><a href="">О проекте</a></li>
                        <li><a href="">Помощь</a></li>
                        <li><a href="">Пользовательские соглашения</a></li>
                        <li><a href="">Подарочные сертификаты</a></li>
                        <li><a href="">Билеты в подарок</a></li>
                        <li><a href="">Возврат билета</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-5">
                <div class="row">
                    <ul class="footer-menu">
                        <li><a href="">Партнерам и организаторам</a></li>
                        <li><a href="">Корпоративным клиентам</a></li>
                        <li><a href="">Контакты</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="subscribe-block">
                        <p>Подпишись на новости об акциях и предстоящих событиях</p>
                            <form class="subscribe-form" action="/subscribe" method="POST">
                                @csrf
                                <div class="input-group">
                                    <input type="email" required placeholder="Введите ваш Email" class="subscribe-input form-control" />
                                    <div class="input-group-prepend">
                                        <input type="submit" class="input-group-text btn-blue" value="Подписаться" />
                                    </div>
                                </div>
                                <div class="input-message"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 copyright-wrapper">
                <div class="row justify-content-end">
                    <div class="copyright">
    					<a href="http://axiomadigital.ru" target="_blank" title="Разработка и продвижение сайтов">Разработано в студии <span>Axioma.Digital</span></a>
    				</div>
                </div>
            </div>
        </div>
    </div>
</footer>
