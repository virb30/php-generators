FROM nginx:alpine

RUN mkdir -p /var/www/html/public && touch /var/www/html/public/index.php

ENTRYPOINT [ "/docker-entrypoint.sh" ]
CMD ["nginx", "-g", "daemon off;"]