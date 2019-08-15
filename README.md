# NginxPhpDocker
基于docker, 快速搭建Nginx+Php+Https本地开发环境(已含常用PHP扩展), nginx、php配置文件,日志文件和php工程代码都在宿主机上, 方便修改

### 1. 如何使用呢?

#### 1.1 download code
```
git clone git@github.com:weiwenwang/NginxPhpDocker.git
cd NginxPhpDocker
```

#### 1.2 启动php容器
```
docker run -it -d \
--name myphp \
-v $PWD/www/php:/www/php \
-v $PWD/www/example:/www/example \
-v $PWD/../Apps:/www/Apps \
-v $PWD/php-fpm-conf:/usr/local/etc/php-fpm.d \
-v $PWD/php-conf:/usr/local/etc/php \
-v $PWD/log/php:/var/log/php/ \
--privileged=true \
wangnan188/nginx-php-docker:v7.2-v3
```

#### 1.3 启动nginx容器
```
docker run -it -d \
-p 80:80 \
-p 443:443 \
-v $PWD/nginx-conf/conf.d:/etc/nginx/conf.d \
-v $PWD/nginx-conf/nginx.conf:/etc/nginx/nginx.conf \
-v $PWD/www/html:/www/html \
-v $PWD/www/example:/www/example \
-v $PWD/../Apps:/www/Apps \
-v $PWD/ssl/server.crt:/etc/nginx/ssl/server.crt \
-v $PWD/ssl/server.key:/etc/nginx/ssl/server.key \
-v $PWD/log/nginx:/var/log/nginx/ \
--link=myphp:myphp_alias \
--privileged=true \
--name=mynginx \
nginx
```

#### 1.4 注意事项， 非常重要

- 1.2, 1.3的两个指令必须在NginxPhpDocker目录下执行
- PHP代码的文件夹, 必须挂在到PHP容器里面, 有小伙伴使用的时候挂到nginx容器里面了, nginx和PHP俩容器是隔离的, php只会按地址在他们自己的容器里面找文件, 和nginx只是通过fastcgi通信, nginx告诉php用户请求的文件地址, php在自己的容器去找对应的文件
- 这边我在NginxPhpDocker平行的位置放了一个Apps(Apps/nieta-admin), 里面放我们开发的一个个项目, 每个项目一个conf文件, 放在NginxPhpDocker/nginx-conf/conf.d/下面(authorApiNieta-local.conf)
#### 1.5 执行1.2、1.3之后效果是什么样子的呢?
![446601B2-F933-40F1-8588-AC9F3F26E17E.png](https://i.loli.net/2019/03/28/5c9c36453f75e.png)
![602C7C2D-5793-4805-BE64-1B8EDA958CB0.png](https://i.loli.net/2019/03/28/5c9c36452cb09.png)
![2240481F-4CC0-48C8-B6BA-398A26B8A938.png](https://i.loli.net/2019/03/28/5c9c36454b755.png)

### 3. 如何把现有的项目跑起来呢？

  这里我举例个例子， 假如我们现在的项目(thinkphp_3.2.3_full)就是thinkphp框架写的, 我如何把它运行起来呢?
  第一步: 把代码放在www/example/目录下
  第二步: 添加配置文件nginx-conf/conf.d/example-thinkphp.conf, 剩下的就是单纯的nginx配置问题了.
  本地做一个host绑定: "127.0.0.1 thinkphp-full.com"
  浏览器访问: http://thinkphp-full.com/index.php?c=index&a=index

![A40B8438-28B1-4023-BC42-FE28E435F724.png](https://i.loli.net/2019/03/28/5c9c389f4a322.png)

### 4. wangnan188/nginx-php-docker现在包含了哪些extension呢?

extension | status| remark |- | extension | status|remark |- |
---|---|--|-- |--|--|--|--
Core | YES|- |-|redis|YES|-|-
ctype | YES|-|-|gd|YES|-|-
curl | YES|-|-|xdebug|YES|-|-
date | YES|-|-|mongodb|YES|-|-
dom | YES|-|-|swoole|YES|-|-
fileinfo| YES|-|-|memcached|YES|-|-
filter | YES|-|-|memcache|NO|-|-
ftp | YES|-|-||
hash | YES|-|-||
iconv | YES|-|-||
json | YES|-|-||
libxml | YES|-|-||
mbstring | YES|-|-||
mysqlnd | YES|-|-||
openssl | YES|-|-||
pcre| YES|-|-||
PDO| YES|-|-||
pdo_sqlite| YES|-|-||
Phar| YES|-|-||
posix | YES|-|-||
readline | YES|-|-||
Reflection | YES|-|-||
session | YES|-|-||
SimpleXML | YES|-|-||
sodium | YES|-|-||
SPL | YES|-|-||
sqlite3 | YES|-|-||
standard | YES|-|-||
tokenizer | YES|-|-||
xml | YES|-|-||
xmlreader | YES|-|-||
xmlwriter | YES|-|-||
zlib | YES|-|-||

### 5. 其他

感谢你看到这里, 有问题, email我(wangweiwen200@gmail.com)
