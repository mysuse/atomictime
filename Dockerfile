FROM yiisoftware/yii2-php:7.2-apache

ENV TZ=Asia/Jakarta
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

#COPY confg file
COPY 000-default.conf /etc/apache2/sites-available/000-default.conf

RUN a2enmod rewrite
