ROM php:8.0-cli

# Server code copy karein
COPY . /usr/src/myapp
WORKDIR /usr/src/myapp

# PHP ka built-in server start karein (Port 80 par)
# Railway is port ko automatically expose kar dega
CMD [ "php", "-S", "0.0.0.0:80" ]