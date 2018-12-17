#
# Sistema para Triaje
#

# Se construye sobre la base de la imagen nginx
FROM httpd:2.4

# Se agregan metadatos a la imagen
LABEL Descripción="Sistema de Triaje " Autor="Franklin Lara" Versión="v1.0.0"

# Se copian los ficheros hacia la carpeta de nginx
COPY static-html /var/www/html