### Домашнее задание: разработка системы рассылки email сообщений с помощью очереди (queue)

#### Требования
Реализовать очередь для простой рассылки уведомлений пользователям об изменении курса валюты в БД используя фреймворк Laravel.

***


Проверьте и настройте очереди в [config/queue.php](config/queue.php):
- Connection type: beanstalkd
- Queue name: notification

#### Задание

Необходимо создать ресурс изменения курса валют:
```
PUT /api/currencies/{id}/rate
{
    rate: <float>
}
```

Курс валют может изменять только администратор. При изменении курса валюты необходимо проинформировать с помощью информационного e-mail (App\Mail\RateChanged) всех
пользователей из таблицы users по соответствующим email-адресам. Для отправки e-mail используйте фасад `Mail`.

* Реализовать job класс App\Jobs\SendRateChangedEmail для отправки Email об изменении курса валюты всем пользователям из таблицы users
* Job должен получать модель User, Currency и предыдущее значение курса, и отправлять следующий текст:
```
Dear <user name>,

<currency name> exchange rate has been changed from <old rate> to <new rate>!

Thanks,
Crypto Market Service!
```

#### Проверка

Вы можете проверить себя запустив тест в директории проекта:
```
./vendor/bin/phpunit
```
