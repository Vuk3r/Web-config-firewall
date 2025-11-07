# syntax=docker/dockerfile:1
FROM php:8.2-apache

ARG DEBIAN_FRONTEND=noninteractive

# 1) Cài các gói hệ thống cần thiết và PHP extensions phổ biến
RUN apt-get update && apt-get install -y --no-install-recommends \
      build-essential \
      libpng-dev \
      libjpeg-dev \
      libfreetype6-dev \
      libonig-dev \
      libxml2-dev \
      libzip-dev \
      zip \
      unzip \
      curl \
      git \
      libicu-dev \
      libpq-dev \
      libcurl4-openssl-dev \
      # ModSecurity (optional) - cài nếu bạn có modsecurity config; nếu không cần có thể bỏ
      libapache2-mod-security2 \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd mbstring xml zip intl mysqli pdo pdo_mysql \
    && a2enmod rewrite headers security2 \
    && rm -rf /var/lib/apt/lists/*

# 2) ModSecurity baseline copy (if package present)
RUN if [ -f /etc/modsecurity/modsecurity.conf-recommended ]; then \
      cp /etc/modsecurity/modsecurity.conf-recommended /etc/modsecurity/modsecurity.conf || true; \
    fi && mkdir -p /var/log/modsecurity && chmod 755 /var/log/modsecurity

# 3) ServerName to avoid Apache warning
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

###########

# Cài và bật mod_security nếu chưa có
RUN apt-get update && apt-get install -y libapache2-mod-security2 && a2enmod security2

# Tạo thư mục log + phân quyền
RUN mkdir -p /var/log/apache2 /var/log/modsecurity \
    && chown -R www-data:www-data /var/log/apache2 /var/log/modsecurity

###########

# 4) Copy modsecurity override from build context if provided (optional)
#    If you don't have modsecurity/ folder, COPY will fail; but compose mounts override it.
COPY ./modsecurity/modsecurity.conf /etc/modsecurity/modsecurity.conf
COPY ./modsecurity/unicode.mapping /etc/modsecurity/unicode.mapping

# 5) Copy web app
COPY ./public /var/www/html
RUN chown -R www-data:www-data /var/www/html

# 6) Healthcheck
HEALTHCHECK --interval=8s --timeout=3s --start-period=10s --retries=5 \
  CMD curl -fsS http://localhost/ -o /dev/null || exit 1

EXPOSE 80

CMD ["apache2-foreground"]
