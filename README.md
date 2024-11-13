# API REST para CRUD de Usuarios

Este proyecto proporciona una API RESTful para gestionar usuarios en una base de datos MySQL. Puedes realizar operaciones de consulta, inserción y eliminación de usuarios a través de solicitudes HTTP.

## URL base

La API está disponible en el siguiente dominio de Clever Cloud:

https://app-ed8cc97a-7bfd-4bca-99cf-ca1b766fa79d.cleverapps.io/


---

## Endpoints

### 1. Obtener todos los usuarios (GET)
- **Método:** `GET`
- **URL:** `https://app-ed8cc97a-7bfd-4bca-99cf-ca1b766fa79d.cleverapps.io/database.php`
- **Descripción:** Obtiene la lista completa de usuarios en la base de datos.

---

### 2. Crear un nuevo usuario (POST)
- **Método:** `POST`
- **URL:** `https://app-ed8cc97a-7bfd-4bca-99cf-ca1b766fa79d.cleverapps.io/database.php`
- **Descripción:** Inserta un nuevo usuario en la base de datos.

#### Ejemplo de solicitud (Body en Postman):
```json
{
  "first_name": "Alicia",
  "last_name": "Ramirez",
  "age": 28,
  "curp": "CAMR280128HDFRRR03"
}


3. Eliminar un usuario (DELETE)
Método: DELETE
URL: https://app-ed8cc97a-7bfd-4bca-99cf-ca1b766fa79d.cleverapps.io/database.php/{id}
Descripción: Elimina un usuario de la base de datos según su id.
Ejemplo de solicitud:
URL: https://app-ed8cc97a-7bfd-4bca-99cf-ca1b766fa79d.cleverapps.io/database.php/3
Método: DELETE


Cómo probar la API en Postman
Para probar esta API usando Postman:

Abre Postman.
Crea una nueva solicitud (Request).
Selecciona el método HTTP (GET, POST, DELETE).
Especifica la URL de la API:
Para obtener usuarios: GET https://app-ed8cc97a-7bfd-4bca-99cf-ca1b766fa79d.cleverapps.io/database.php
Para crear un nuevo usuario: POST https://app-ed8cc97a-7bfd-4bca-99cf-ca1b766fa79d.cleverapps.io/database.php y agrega el JSON en el cuerpo de la solicitud.
Para eliminar un usuario: DELETE https://app-ed8cc97a-7bfd-4bca-99cf-ca1b766fa79d.cleverapps.io/database.php/{id}, donde {id} es el ID del usuario a eliminar.
Haz clic en Send para enviar la solicitud y ver la respuesta.