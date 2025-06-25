FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# نسخ ملف إعدادات Apache الخاص بنا
COPY apache.conf /etc/apache2/sites-available/000-default.conf

# تفعيل mod_rewrite للـ Apache
RUN a2enmod rewrite

# نسخ ملفات المشروع إلى مجلد Apache
COPY . /var/www/html

# تعيين مجلد العمل
WORKDIR /var/www/html

# تثبيت Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# تثبيت الاعتمادات بدون بيئة التطوير وبكفاءة
RUN composer install --optimize-autoloader --no-dev

# تعديل صلاحيات المجلدات الهامة + مجلد public
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/public

# عمل كاش لإعدادات لارافيل
RUN php artisan config:cache

# فتح المنفذ 80
EXPOSE 80

# بدء تشغيل Apache في المقدمة
CMD ["apache2-foreground"]
