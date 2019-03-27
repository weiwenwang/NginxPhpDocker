# NginxPhpDocker
基于docker, 快速搭建Nginx+Php开发环境(包括大部分常用PHP扩展)

### 1. 如何使用

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


### 2. php包含了哪些extension呢?

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
