# NginxPhpDocker
基于docker, 快速搭建Nginx+Php开发环境(包括大部分常用PHP扩展)

### 1. 如何使用呢?

#### 1.1 cloen code
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
--privileged=true \
wangnan188/nginx-php-docker:v7.2-v1
```

#### 1.3 启动nginx容器
```
docker run -it -p 80:80 -d \
-v $PWD/nginx-conf/conf.d:/etc/nginx/conf.d \
-v $PWD/nginx-conf/nginx.conf:/etc/nginx/nginx.conf \
--link=myphp:myphp_alias \
-v $PWD/www/html:/www/html \
--privileged=true \
--name=mynginx nginx
```

### 3. 如何把现有的项目跑起来呢？

这里我举例个例子， 假如我们现在的项目就是thinkphp框架写的


### 2. wangnan188/nginx-php-docker php镜像包含了哪些extension呢?

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
