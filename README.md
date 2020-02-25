# Тестовое задание в Первый Бит

Для установки, необходимо наличие установленного [Git](https://git-scm.com/) и [Composer](https://getcomposer.org/download/)

### Развёртывание проекта

1. Скачать файлы сайта
```
git clone https://github.com/vmrfriz/firstbit-laravel.git
composer i
```

2. В файле .env заполнить доступы к базе данных

3. Запустить миграцию базы данных
```
php artisan migrate
php artisan storage:link
php artisan filldatabase
```

4. Настроить корневую директорию web-сервера на папку `public`


### Тестировалось на

- PHP 7.1
- MySQL 5.5


### Страницы

`/` - страница с отзывами и формой
`/edit/1` - страница редактирования отзыва (только для администратора)
`/login` - страница входа


### Функционал по ТЗ

[x] Сделать форму обратной связи.<br>На странице должна быть форма: Имя, E-mail, текст сообщения, кнопка "Отправить", а под ней все оставленные отзывы. Сортировка по умолчанию - по дате, последние наверху. Также должна быть валидация полей.

[x] К отзыву можно прикрепить картинку.<br>Картинка должна быть не более 320х240 пикселей, при попытке залить изображение большего размера, картинка должна быть пропорционально уменьшена до заданных размеров. Допустимые форматы: JPG, GIF, PNG

------

[x] Добавить кнопку "Предварительный просмотр", рядом с кнопкой "Отправить". <br>Предварительный просмотр должен работать без перезагрузки страницы.

[x] Сделать вход для администратора (логин "admin", пароль "123"). <br>Администратор должен иметь возможность редактировать отзыв. Измененные отзывы в общем списке выводятся с пометкой "изменен администратором". `пока нет возможности публиковать и снимать с публикации`

[x] У администратора должна быть возможность модерирования.<br>
Т.е. на странице администратора показаны отзывы с миниатюрами картинок и их статусы (принят/отклонен).<br>Отзыв становится видимым для всех только после принятия админом.<br>Отклоненные отзывы остаются в базе, но не показываются обычным пользователям. Изменение картинки администратором не требуется.

[ ] Не использовать готовых фреймворков (сделать свою реализацию MVC).