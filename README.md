# NginxPhpDocker
docker搭建nginx+PHP环境(包括各种PHP扩展)

### 1. 如何使用
```
git clone git@github.com:weiwenwang/NginxPhpDocker.git
cd NginxPhpDocker
```

```
docker run -it  --name  myphp -v $PWD/www/php:/www/php  --privileged=true -d php:7.2-fpm
```
```
docker run -it -p 80:80 -d -v $PWD/nginx-conf/conf.d:/etc/nginx/conf.d \
-v $PWD/nginx-conf/nginx.conf:/etc/nginx/nginx.conf \
--link=myphp:myphp_alias \
-v $PWD/www/html:/www/html  --privileged=true --name=mynginx nginx
```


### 2. php extension

extension | header 2| exist | type
---|---|--|--
Core | row 1 col 2
ctype | row 2 col 2
curl | row 2 col 2
date | row 2 col 2
dom | row 2 col 2
fileinfo| row 2 col 2
filter | row 2 col 2
ftp | row 2 col 2
hash | row 2 col 2
iconv | row 2 col 2
json | row 2 col 2
libxml | row 2 col 2
mbstring | row 2 col 2
mysqlnd | row 2 col 2
openssl | row 2 col 2
pcre| row 2 col 2
PDO| row 2 col 2
pdo_sqlite| row 2 col 2
Phar| row 2 col 2
posix | row 2 col 2
readline | row 2 col 2
Reflection | row 2 col 2
session | row 2 col 2
SimpleXML | row 2 col 2
sodium | row 2 col 2
SPL | row 2 col 2
sqlite3 | row 2 col 2
standard | row 2 col 2
tokenizer | row 2 col 2
xml | row 2 col 2
xmlreader | row 2 col 2
xmlwriter | row 2 col 2
zlib | row 2 col 2