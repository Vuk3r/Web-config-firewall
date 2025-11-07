FROM php:8.2-apache

# Cài đặt các gói phụ thuộc cần thiết
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    && docker-php-ext-install mysqli

# Thiết lập ServerName để loại bỏ cảnh báo
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Copy mã nguồn vào thư mục web
COPY ./public /var/www/html/

# Mở cổng 80
EXPOSE 80

# Khởi động Apache trong chế độ foreground
CMD ["apache2-foreground"]
