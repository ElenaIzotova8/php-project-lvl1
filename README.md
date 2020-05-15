# php-project-lvl1
<a href="https://codeclimate.com/github/ElenaIzotova8/php-project-lvl1/maintainability"><img src="https://api.codeclimate.com/v1/badges/b4d07e3a2f919ba5b11a/maintainability" /></a>
![PHP CI](https://github.com/ElenaIzotova8/php-project-lvl1/workflows/PHP%20CI/badge.svg)

Проект Игры разума - первый учебный проект на [Хекслете](https://hexlet.io) в рамках обучения по профессии [PHP-программист](https://ru.hexlet.io/professions/php).

Загрузка проекта - composer global require eleizotova/php-project-lvl1.
[![asciicast](https://asciinema.org/a/330577.svg)](https://asciinema.org/a/330577)

Посмотреть, в какую конкретно директорию composer складывает ссылки на исполняемые файлы, можно с помощью команды
composer global config bin-dir.
Путь к ней надо самостоятельно прописать в переменной окружения PATH. Для этого добавьте в файл .bashrc следующую строку:

export PATH=$PATH:/path/to/directory

Где /path/to/directory путь до директории с исполняемыми файлами. После нужно перезапустить терминал.

«Игры разума» — набор из пяти консольных игр, построенных по принципу популярных мобильных приложений для прокачки мозга. Каждая игра задает вопросы, на которые нужно дать правильные ответы. После трех правильных ответов считается, что игра пройдена. Неправильные ответы завершают игру и предлагают пройти ее заново. 

Игры:

Запуск игры Определение, является ли число четным (brain-even) - brain-even:
[![asciicast](https://asciinema.org/a/330579.svg)](https://asciinema.org/a/330579)

Запуск игры Определение наибольшего общего делителя (brain-gcd) - brain-gcd:
[![asciicast](https://asciinema.org/a/330580.svg)](https://asciinema.org/a/330580)

Запуск игры Определение, является ли число простым (brain-prime) - brain-prime:
[![asciicast](https://asciinema.org/a/330581.svg)](https://asciinema.org/a/330581)

Запуск игры Калькулятор (brain-calc) - brain-calc:
[![asciicast](https://asciinema.org/a/330584.svg)](https://asciinema.org/a/330584)

Запуск игры Прогрессия (brain-progression) - brain-progression:
[![asciicast](https://asciinema.org/a/330585.svg)](https://asciinema.org/a/330585)
