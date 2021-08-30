# Guía de Contribución

## Equipo de Desarrollo

## Autores
### - [Integrante Tania Raema Valentina Sepulveda Castro](@19364443-0) - Líder de Proyecto
- Correo electronico: tania.sepulveda1501@alumnos.ubiobio.cl
- Casos de uso: 
    - Mostrar Asignaciones a Editar
    - Editar Asignación
    - Inhabilitar Equipo

### - [Integrante Carlos Gaubert Quijada](@18685588-4) - Ingeniero de Base de Datos
- Correo electronico: carlos.gaubert1801@alumnos.ubiobio.cl
- Casos de uso:
    - Asignar Equipo
    - Realizar Búsqueda
    - Mostrar Historial de Asignaciones

### - [Integrante Victor Arévalo Villegas](@19663060-0) - Analista de Sistemas
- Correo electronico: victor.arevalo1501@alumnos.ubiobio.cl
- Casos de uso:
    - Mostrar Asignaciones a Eliminar
    - Finalizar Mantenciones
    - Mostrar Estado de Equipos

### - [Integrante Bryan Paredes Suazo](@19595932-3) - Ingeniero de Desarrollo
- Correo electronico: bryan.paredes1701@alumnos.ubiobio.cl
- Casos de uso:
    - Home
    - Mostrar Mantenciones a Editar
    - Editar Mantención
    - Mostrar Mantenciones a Eliminar
    - Eliminar Mantención

### - [Integrante Antonio Mardones San Martin](@19906834-2) - Ingeniero de Desarrollo
- Correo electronico: antonio.mardones1601@alumnos.ubiobio.cl
- Casos de uso:
    - Login
    - Finalizar Asignación
    - Agregar Mantención
    - Mostrar Mantenciones

## Estándar de Codificación

### Estilo de Codificación


### Configuraciones para editores de código

- Codificación de Archivos de Código = UTF-8

## Desarrollo del código

### Arquitectura del Sistema - Patrones de Diseño

- El proyecto se compone de las capas: 
    1. Routes: Es la capa donde se hacen las consultas a la base de datos.
    2. Views: Es la capa que muestra el contenido al usuario.
    3. Controller: Es la capa que actua como intermediaria entre routes y views.

### Namespaces para Autoload con el estándar PSR-4


### Archivos/Directorios que no deben ser versionados o enviados al repositorio (**no** incluir en los **commit's**)

- env.php
- .vscode

### Archivos/Directorios que no deben estar en ambientes de Producción

- .vscode
- .gitignore
- CONTRIBUTING.md 
- Dockerfile
- php.ini 
- README.md
- Script_Asignaciones.sql
