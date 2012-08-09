php-fizz-buzz
=============

Fizz Buzz Question Library on PHP. yes, It's a bit jest :)

What's this
-----------

FizzBuzzがバズっていたので、お遊びがてら準備してみたファイル群。

通常はできるだけ短く用意するFizzBuzzQをできるだけ大げさにしてみる試み。

Jenkins で CI をするベタなサンプルの一つになるようにしている。

How to use
----------

srcフォルダの run.php を実行すれば実行結果が確認できる。

    cd php-fizz-buzz/src
    php run.php

How to CI
---------

CI にはJenkinsを使用している。
[Template for Jenkins Jobs for PHP Projects](http://jenkins-php.org/) に従っている。

コマンドラインでなら、

    cd php-fizz-buzz
    phpcs -v ./src
    phpmd ./src text codesize,unusedcode,design,naming
    phpcpd ./src
    phpunit

などで確認できる。

