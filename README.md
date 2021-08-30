## Modulo de gestión y asignación de equipos
El módulo de gestión de asignación de equipos se genera en la necesidad de mejorar los procesos de trabajo de los funcionarios de la Universidad del Sur.
El proyecto se desarrolla en varios modulos, los cuales se organizan para crear un sistema de información que registre el proceso completo del proyecto, es decir, desde la concepción de éste hasta su finalización. Aquí es donde nuestro módulo se encarga de gestionar todos los procesos de asignaciones de equipos.

## Software stack
El proyecto Módulo Asignaciones es una aplicación web que corre sobre el siguiente software:

- Debian GNU/Linux 10 Buster
- Apache 2.4.38
- PHP 7.3.19 (ext: json, mysqli)
- Base de Datos MySQL 5
- Git

## Configuraciones de Ejecución para Entorno de Desarrollo
### Pre-requisitos de instalación del software
- Docker
- Git
- Visual Studio Code
### Instrucciones de Instalación

- Abrir una ventana terminal de git, para situarte en la carpeta donde desea guardar el proyecto. 
- Situarse dentro de las carpetas con los comandos (cd, cd .. )
- Dentro de la carpeta ejecutar el siguiente comando:  
```bash
  git clone "http://gitlabtrans.face.ubiobio.cl:8081/19364443/asignaciones-equipos.git"
```

  ### Docker


  Si va a realizar la instalación con Docker siga las siguientes instrucciones:
- Desde una terminal situarse dentro del directorio raiz donde fue clonado este repositorio.
- En la raiz del proyecto, ejecute el siguiente comando:

```bash
docker build -t asignaciones .
```

- Luego, dependiendo del sistema operativo:

### Windows
```bash
 docker run -d --rm -p 80:80 -v ${pwd}/src:/var/www/html --name asig asignaciones
```


### Linux
```bash
docker run -d --rm -p 80:80 -v "$(pwd)"/src:/var/www/html --name asig asignaciones
```



### Configuración de la Base de Datos.

- Importe el script "Script_Asignaciones.sql", el cual se encuentra en el directorio principal y ejecútelo en su base de datos. 
- Dirigase a la carpeta del repositorio llamada "src" y configure las credenciales de acceso a su base de datos creando un archivo llamado
 **env.php** con el siguiente esquema:
 
```bash
<?php
    $HOST = "";
    $USER = "";
    $PASSWORD = "";
    $BD = "";
?>
```
- Tras finalizadas las configuraciones se inicializarán las imágenes.
 De esta forma podrá ejecutar el software, para esto diríjase al siguiente enlace:
(http://localhost)

## Configuraciones de Ejecución para Entorno de Producción
### Instalación de herramientas/librerías del software
- Instalación **Apache** y **PHP**:
```bash
apt-get update && \
    apt-get install -y \
    apache2 \
    php7.3
```
- Instalación de librería **Mysqli**:
```bash
apt install php-mysqli
```
- Configuración de zona horaria en **PHP**:
```bash
apt-get install -y vim locales wget &&\
rm /etc/localtime && \
    ln -snf /usr/share/zoneinfo/America/Santiago /etc/localtime && \
    echo "America/Santiago" > /etc/timezone && \
    echo "LC_ALL=es_CL.UTF-8" >> /etc/environment && \
    echo "es_CL.UTF-8 UTF-8" >> /etc/locale.gen && \
    echo "LANG=es_CL.UTF-8" > /etc/locale.conf && \
    locale-gen es_CL.UTF-8 && \
    dpkg-reconfigure -f noninteractive tzdata
```
- Reiniciar el servicio: **apache2**:
```bash
/etc/init.d/apache2 restart
```
- Instalación **GIT**:
```bash
apt install git
```
Luego, situarse en la carpeta raíz del repositorio y navegar hasta el directorio **"/var/www/html"** con los comandos (cd, cd .. )
- Ejecutar el siguiente comando: 
```bash
rm /var/www/html/index.html
```
- Dentro de la carpeta ejecutar el siguiente comando:  
```bash
  git clone "http://gitlabtrans.face.ubiobio.cl:8081/19364443/asignaciones-equipos.git"
```
- Desde el directorio **"/var/www/html"** ejecutar el siguiente comando:
```bash
cp -r /var/www/html/asignaciones-equipos/src/* /var/www/html/
```
- Dentro del actual directorio, crear un archivo llamado **env.php** con el siguiente esquema e ingrese sus credenciales:
```bash
<?php
    $HOST = "";
    $USER = "";
    $PASSWORD = "";
    $BD = "";
?>
```

- Con estas instrucciones el servidor ya está configurado y podrá visualizar el proyecto con la ip pública. 
## Construido con


- [SweetAlert 2](https://sweetalert2.github.io/) - Libreria de alertas y notificaciones
- [Bootstrap 5](https://getbootstrap.com/) - Framework de HTML, CSS y JS
- [Jquery](https://jquery.com/) - JS Framework
- [Bootswatch](https://bootswatch.com/yeti/) - Templates de Bootstrap
- [Data Tables](https://datatables.net/) - Libreria de tablas




## Contribuir al Proyecto

- Contribuciones al proyecto se encuentran en [CONTRIBUTING.md](CONTRIBUTING.md)


