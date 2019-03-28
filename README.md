# NginxPhpDocker
基于docker, 快速搭建Nginx+Php本地开发环境(包括大部分常用PHP扩展)

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
-v $PWD/www/example:/www/example \
--privileged=true \
--name=mynginx nginx
```

#### 1.4 注意事项， 非常重要

- 1.2, 1.3的两个指令必须在NginxPhpDocker目录下执行
- PHP代码的文件夹, 必须挂在到PHP容器里面, 有小伙伴使用的时候挂到nginx容器里面了, nginx和PHP俩容器是隔离的, php只会按地址在他们自己的容器里面找文件, 和nginx只是通过fastcgi通信, nginx告诉PHP文件地址, PHP在自己的容器去找对应的文件


### 3. 如何把现有的项目跑起来呢？

  这里我举例个例子， 假如我们现在的项目(thinkphp_3.2.3_full)就是thinkphp框架写的, 我如何把它运行起来呢?
  第一步: 把代码放在www/example/目录下
  第二步: 添加配置文件nginx-conf/conf.d/example-thinkphp.conf, 剩下的就是单纯的nginx配置问题了.
  本地做一个host绑定: 127.0.0.1 thinkphp-full.com
  浏览器访问: http://thinkphp-full.com/index.php?c=index&a=index


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