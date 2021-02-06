<h3>Тестовое задание</h3>
<ui>
    <li>Сделать форму обратной связи</li>
    <li>При сохранении заявки использовать паттерн фабрика:</li>
    <ul>
        <li>Абстрактный класс - <a href="https://github.com/andrusha10t500/Envybox/blob/master/app/Bids.php">Bids</a></li>
    </ul>
    <li>Реализовать структуру, чтобы можно было добавлять новые места для хранения заявок, например другая база данных или email</li>
    <li>Изначально реализовать сохранение в базу и в файл</li>
    <ul>
        <li>Класс для сохранения в файл - <a href="https://github.com/andrusha10t500/Envybox/blob/master/app/Bids_in_File.php">Bids_in_File</a></li>
        <li>Класс для сохранения в бд - <a href="https://github.com/andrusha10t500/Envybox/blob/master/app/Bids_in_DB.php">Bids_in_DB</a></li>
    </ul>
    <li>Валидация данных на бэкенде</li>
    <ul>
        <li>Контроллер - <a href="https://github.com/andrusha10t500/Envybox/blob/master/app/Http/Controllers/BidController.php">BidController</a></li>
    </ul>
</ui>
<h3>Использованные инструменты</h3>
<ui>
    <li>Laravel 5.8</li>
    <li>Vue.js</li>
    <li>MySQL</li>
    <li>Docker</li>
    <li>Bootstrap</li>
    <li>axios</li>
</ui>
<h3>Для запуска</h3>
<ui>
    <li>docker-compose build</li>
    <li>docker-compose up -d</li>
    <li>docker-compose exec -T backend php artisan key:generate</li>
    <li>docker-compose exec -T backend npm run dev</li>
    <li>docker-compose exec -T backend php artisan migrate</li>
    <li>на http://localhost:9090 должна появиться форма</li>
</ui>

