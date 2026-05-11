# SISTEMA DE GESTIÓN INTEGRAL Y DIFUSIÓN PARA LA FUNDACIÓN DE PROTECCIÓN ANIMAL "SOMOS ÁNGELES"

Sistema web desarrollado en **PHP + PostgreSQL + Firebase**, orientado a la **gestión administrativa**, **registro de animales rescatados**, **voluntarios**, **adopciones** y **difusión pública** de la Fundación **Somos Ángeles**.

El sistema está completamente **dockerizado**, lo que permite ejecutarlo en cualquier equipo sin configuraciones manuales complejas.

---

## 🚀 Tecnologías utilizadas

| Tecnología | Propósito |
|------------|-----------|
| PHP 8.2 + Apache | Backend del sistema |
| PostgreSQL 16 | Base de datos relacional |
| Firebase Authentication | Autenticación segura |
| Docker & Docker Compose | Entorno de ejecución |
| HTML5 + CSS3 | Interfaz de usuario |
| MVC básico | Organización del proyecto |

---

## Requisitos

Antes de ejecutar el proyecto, es necesario contar con:

- Docker Desktop
- Docker Compose
- Una cuenta de Firebase

---

## Configuración de Firebase

1. Crear un proyecto en Firebase.
2. Ir a **Authentication → Sign-in method** y habilitar **Email/Password**.
3. Desde la configuración del proyecto, obtener:
   - `apiKey`
   - `authDomain`
   - `projectId`
4. Colocar estos valores en el archivo `/config/firebase.php`:

```php
return [
    'apiKey' => 'API_KEY',
    'authDomain' => 'AUTH_DOMAIN',
    'projectId' => 'PROJECT_ID'
];
```

---

## 🐘 Configuración de la Base de Datos

Las credenciales ya están definidas en el archivo `docker-compose.yml`:

```yaml
POSTGRES_USER: admin
POSTGRES_PASSWORD: 1234
POSTGRES_DB: midb
```

Al iniciar los contenedores, los scripts SQL ubicados en la carpeta `/database` se ejecutan automáticamente para crear las tablas necesarias.

---

## ▶️ Ejecución del proyecto

1. Clonar el repositorio:
2. Construir y levantar los contenedores:
```
docker-compose up --build
```
3. Abrir en el navegador:

```
http://localhost/9724 para las frontend
http://localhost/5050 para el gestor de base de datos
```

---

## 🔐 Credenciales de Administrador

- **Correo:** `admin@admin.com`
- **Contraseña:** `123456`

> Este usuario debe existir tanto en Firebase Authentication como en la base de datos con rol `admin`.

---

## 🎯 Objetivo del proyecto

- Centralizar la información operativa de la fundación
- Facilitar el control administrativo
- Mejorar la difusión de animales en adopción
- Digitalizar el proceso de rescate y adopción
- Proveer una herramienta tecnológica real y funcional a la fundación

---

## 👨‍💻 Autor

Proyecto desarrollado como Walter Chilin, Valeria Hernández, José Vega, Alejandra Álvarez y Javier Castillo.
