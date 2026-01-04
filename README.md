# お問い合わせフォーム

## 環境構築

- Docker のビルドからマイグレーション、シーディングまでを記述

環境構築

Docker ビルド
・git clone git@github.com:Yu-Sasaki451/contact-form.git
・docker compose up -d --build

Laravel 環境構築
・docker compose exec php bash
・composer install
・cp .env.example .env. ,環境変数は適宜変更
・php artisan key:generate

#er
![ER Diagram](src/public/er.svg)