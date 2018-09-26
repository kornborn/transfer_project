## Задача
Используя любой PHP-фреймворк создать приложение, которое имеет следующие возможности: любой пользователь приложения может выбрать любого другого пользователя приложения (кроме себя), чтобы сделать отложенный перевод денежных средств со своего счета на счет выбранного пользователя. При планировании такого перевода пользователь указывает сумму перевода в рублях, дату и время, когда нужно произвести перевод. Сумма перевода ограничена балансом клиента на момент планирования перевода с учетом ранее запланированных и невыполненных его исходящих переводов. Дата и время выбирается с точностью до часа с использованием календаря. Способ выбора пользователя - любой (можно просто ввод ID). Ввод данных должен валидироваться как на стороне клиента, так и на стороне сервера с выводом ошибок пользователю.
Показать на сайте список всех пользователей и информацию об их одном последнем переводе с помощью одного SQL-запроса к БД.
Реализовать сам процесс выполнения запланированных переводов. Не допустить ситуации, при которой у какого-либо пользователя окажется отрицательный баланс.
Написанный для решения задачи код не должен содержать уязвимостей. Процесс регистрации и проверки прав доступа можно не реализовывать. Для этого допустимо добавить дополнительное поле ввода для указания текущего пользователя. Внешний вид страниц значения не имеет.
Решение задачи должно содержать:
Весь текст поставленного тестового задания. 
Четкую инструкцию по развертыванию проекта с целью проверки его работоспособности. Приветствуется использование Docker. 
Миграции и сиды для наполнения БД демонстрационными данными.
Решение можно прислать ссылкой на хранилище исходного кода (GitHub, Bitbucket и др.), либо в виде архива.

# Установка
## Требования
* docker
* docker-compose
* npm

## Процесс установки
1. Перейти в нужную папку и склонировать проект:
    ```bash
        git clone https://github.com/kornborn/transfer_project.git
    ```
2. Перейти в папку с проектом и установить зависимости:
    ```bash
        cd transfer_project \
        && docker run --rm -v $(pwd):/app composer install
    ```
3. Настроить порты в docker-compose.yml. Поднять докер контейнеры:
    ```bash
        docker-compose up -d --build
    ```
4. Копировать .env.example в .env
    ```bash
        cp .env.example .env
    ```
    и настроить .env
5. Дать доступ к папкам vendor, bootstrap, storage:
    ```bash
        chmod -R 777 vendor/ \
        && chmod -R 777 bootstrap/ \
        && chmod -R 777 storage/ \
    ```
6. Подготовить artisan
    ```bash
        docker-compose exec app php artisan key:generate \
        && docker-compose exec app php artisan optimize
    ```
7. Собрать стили, скрипты:
   ```bash
       npm install
   ```
8. Заполнить БД тестовыми данными:
    ```bash
        docker-compose exec app php artisan migrate --seed
    ```
9. Для выполнения отложенных переводом используется cron. Перевод осуществляется по системному
    времени контейнера transfer_app_1. Чтобы включить переводы необходимо:
    * выполнить bash команду `crontab -e`
    * добавить в конец файла `* * * * * docker exec final_project_app_1 php artisan schedule:run >> /dev/null 2>&1`
    * сохранить и выйти
    
После этого сайт будет доступен (по умолчанию порт 8080) на http://localhost:8080/
    
## Тесты

Для запуска тестов в корне проекта необходимо ввести следующую команду:
    ```bash
        docker exec -it transfer_project_app_1 ./vendor/bin/phpunit
    ```