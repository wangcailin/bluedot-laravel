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
-   ...

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
-   APP_URL
-   ...

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

#### 4. 开始开发

**开发规范（必读）**

-   所有应用都放到 app/Application 文件夹下
-   Http Controller Backend 为后台 CMS API
-   Http Controller Platform 为前台 API
-   原则上 Http 不承载核心业务逻辑，只做业务分发，在某些后台 CMS API 和前台 API 业务逻辑不一致的情况下在 Http 做重载处理
-   原则上遵循 **Restful API**(http://www.ruanyifeng.com/blog/2014/05/restful_api.html) 规范

**启动项目**

```shell
php -S 0.0.0.0:8000 -t public
```

注：使用 **php artisan serve**启动会有读取不到 config()配置问题

## Package Support

-   **[Laravel](https://learnku.com/docs/laravel/9.x)**
-   **[Passport OAuth 认证](https://learnku.com/docs/laravel/9.x/passport/12270)**
-   **[jwt-auth](https://jwt-auth.readthedocs.io/en/develop/)**
-   **[laravel-query-builder HTTP 查询](https://spatie.be/docs/laravel-query-builder/v5/introduction)**
-   **[laravel-permission 多权限](https://spatie.be/docs/laravel-permission/v5/introduction)**
-   **[EasyWeChat 微信 SDK](https://easywechat.com/6.x/)**
