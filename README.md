<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Bluedot for Laravel

基于 Laravel 二次封装的脚手架，集成了 [bluedot-composer](https://gitee.com/blue-dot-cn_cailin__wang/bluedot-composer.git) 基类包来实现一些基本功能:

-   多管理员
-   多权限
-   微信 SDK

详细请查阅 [bluedot-composer](https://gitee.com/blue-dot-cn_cailin__wang/bluedot-composer.git) .

## 开始使用

#### 1. 创建项目

```shell
composer create-project bluedot/laravel your-project-name
```

#### 2. 更改配置

.env

-   数据库连接
-   缓存

#### 3. 初始化数据

初始化数据库

```shell
php artisan migrate
```

填充数据

> Oauth Client，后台超管账号密码等，具体填充内容给可查看 database/seeders/DatabaseSeeder.php

```shell
php artisan db:seed
```

## Package Support

-   **[Laravel](https://learnku.com/docs/laravel/9.x)**
-   **[Passport OAuth 认证](https://learnku.com/docs/laravel/9.x/passport/12270)**
-   **[Sanctum API 授权](https://learnku.com/docs/laravel/9.x/sanctum/12272)**
-   **[EasyWeChat](https://easywechat.com/6.x/)**
