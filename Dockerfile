# استخدم صورة PHP 8.1 مع Apache
FROM php:8.1-apache

# تحديث النظام وتثبيت الإضافات المطلوبة
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# تمكين mod_rewrite للـ Apache
RUN a2enmod rewrite

# نسخ ملفات المشروع إلى مجلد Apache
COPY . /var/www/html

# تعيين مجلد العمل
WORKDIR /var/www/html

# تثبيت Composer (مدير الحزم ل PHP)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# تثبيت الاعتمادات بدون بيئة التطوير وبكفاءة
RUN composer install --optimize-autoloader --no-dev

# تعديل صلاحيات المجلدات الهامة
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# فتح المنفذ 80
EXPOSE 80

# بدء تشغيل Apache في المقدمة
CMD ["apache2-foreground"]
