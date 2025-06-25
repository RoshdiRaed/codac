# المرحلة الأساسية
FROM php:8.2-apache

# تثبيت الامتدادات المطلوبة
RUN apt-get update && apt-get install -y \
    git curl unzip zip libpng-dev libonig-dev libxml2-dev libzip-dev \
    && docker-php-ext-install pdo pdo_mysql zip gd

# تفعيل mod_rewrite
RUN a2enmod rewrite

# إعداد مجلد المشروع
WORKDIR /var/www/html

# نسخ الملفات
COPY . /var/www/html

# تعيين صلاحيات لـ Laravel
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage

# نسخ composer من صورة رسمية
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# تثبيت الحزم
RUN composer install --optimize-autoloader --no-dev

# إعداد ملف Apache
COPY .docker/vhost.conf /etc/apache2/sites-available/000-default.conf
