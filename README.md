# 🇪🇨 Turismo y Sabor Ecuatoriano

Sitio web multipágina responsivo desarrollado como práctica de la asignatura **Programación y Plataformas Web** en la Universidad Politécnica Salesiana (UPS).

## Descripcion del Proyecto
Aplicación web diseñada para promover el turismo y la gastronomía tradicional de Ecuador. Cuenta con una estructura interactiva y un sistema seguro de contacto conectado a una base de datos relacional mediante PHP y MySQLi, implementando buenas prácticas de seguridad como consultas preparadas y prevención de XSS.

---

## Requisitos Tecnicos
* **Servidor Local:** XAMPP (con Apache y MySQL activados).
* **Navegador Web:** Google Chrome, Firefox o Edge actualizado.
* **Gestor de Base de Datos:** phpMyAdmin.

---

## Configuracion y Pasos de Ejecución en XAMPP

1. **Clonar o Descargar el Repositorio:**
   * Descarga el proyecto en formato ZIP o clónalo utilizando Git en tu terminal:
     ```bash
     git clone [https://github.com/Jenny-Vivi/Practica1_TurismoEcuador.git](https://github.com/Jenny-Vivi/Practica1_TurismoEcuador.git)
     ```

2. **Ubicar los Archivos:**
   * Copia la carpeta del proyecto dentro del directorio raíz de tu servidor local en XAMPP:
     `C:\xampp\htdocs\`

3. **Configurar la Base de Datos (`turismo_db`):**
   * Abre tu navegador y entra a **phpMyAdmin**: `http://localhost/phpmyadmin/`
   * Crea una nueva base de datos llamada con el nombre exacto: `turismo_db`
   * Entra a la base de datos creada, selecciona la pestaña **SQL** y ejecuta el siguiente código para crear la tabla de contactos:

     ```sql
     CREATE TABLE contactos (
         id INT AUTO_INCREMENT PRIMARY KEY,
         nombre VARCHAR(100) NOT NULL,
         correo VARCHAR(100) NOT NULL,
         asunto VARCHAR(150) NOT NULL,
         mensaje TEXT NOT NULL,
         fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP
     );
     ```

4. **Ejecutar el Sitio Web:**
   * Asegúrate de que los servicios **Apache** y **MySQL** estén encendidos en el panel de control de XAMPP.
   * Abre tu navegador web e ingresa a la siguiente ruta:
     http://localhost/PRACTICAS/Practica1_FPW_Gastronomia_Turismo_Ecuador(Viviana%20Carchi)/index.html 

---

* **Estudiante:** Jennifer Viviana Carchi Fajardo
* **Carrera:** Computación
* **Institución:** Universidad Politécnica Salesiana (UPS) - Cuenca, Ecuador