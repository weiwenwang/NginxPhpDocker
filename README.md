# NginxPhpDocker
docker搭建nginx+PHP环境(包括各种PHP扩展)

### 1. 如何使用
```
git clone git@github.com:weiwenwang/NginxPhpDocker.git
cd NginxPhpDocker
```

```
docker run -it  --name  myphp -v $PWD/www/php:/www/php  --privileged=true -d php:7.1-fpm
```
```
docker run -it -p 80:80 -d -v $PWD/nginx-conf/conf.d:/etc/nginx/conf.d \
-v $PWD/nginx-conf/nginx.conf:/etc/nginx/nginx.conf \
--link=myphp:myphp_alias \
-v $PWD/www/html:/www/html  --privileged=true --name=mynginx nginx
```
