#
# Sistema para Triaje
#

# Se construye sobre la base de la imagen apache
FROM nginx:1.11-alpine

# Se agregan metadatos a la imagen
LABEL Descripción="Sistema de Triaje " Autor="Franklin Lara" Versión="v1.0.0"

# Se copian los ficheros hacia la carpeta de nginx
COPY triaje /usr/share/nginx/html
