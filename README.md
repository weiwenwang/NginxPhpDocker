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

name | header 2 | exist | type
---|---|--|--
xcache | row 1 col 2
swoole | row 2 col 2
mongo | row 2 col 2
mcrypt | row 2 col 2
mbstring | row 2 col 2|1| origin
redis | row 2 col 2|1| php7.2 install extension
gd | row 2 col 2 | sdaf| docker-php-ext-install gd
curl |jkl
memcache |jkl
mysqli |jkl|sd|docker-php-ext-install mysqli 
iconv|jkl|sd|docker-php-ext-install mysqli