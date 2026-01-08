# お問い合わせフォーム

## 概要

・問い合わせ内容の作成
・ユーザー登録、ログイン
・問い合わせ内容一覧の閲覧、詳細確認および削除

## 使用技術

Laravel Framework 8.83.29
php:8.1-fpm
nginx:1.21.1
mysql:8.0.32
phpMyAdmin

## 環境構築

- Docker のビルドからマイグレーション、シーディングまでを記述

### Docker 　ビルド

下記コマンドを 1 行ずつ実行してください

1.git clone git@github.com:Yu-Sasaki451/contact-form.git
2.docker compose up -d --build

### Laravel 　環境構築

「contact-form」ディレクトリにチェンジディレクトリし、下記コマンドを 1 行ずつ実行してください

1.docker compose exec php bash
2.composer install
3.cp .env.example .env.　※環境変数は適宜変更してください
4.php artisan key:generate
5.php artisan migrate
6.php artisan db:seed

## URL

開発環境：http://localhost/
phpMyAdmin：http://localhost:8080/

## ER 図

![ER Diagram](src/public/er.svg)
