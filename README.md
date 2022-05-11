## About Bluedot Laravel

laravel for bluedot 脚手架

## Docs

#### Install

```
composer create-project bluedot/laravel {项目文件夹}
```

#### Initialization

1. 更改.env
2. 更改 deploy -> helm.yaml

#### 初始化数据库

```
php artisan migrate
```

#### 初始化数据

```
php artisan db:seed
```

#### 本地开发

```
php -S 0.0.0.0:8000 -t public
```

#### 功能说明

-   微信功能配置 => [EasyWeChat](https://easywechat.com/5.x/)
-   权限配置 => [Laravel-permission](https://spatie.be/docs/laravel-permission/v5/introduction)
