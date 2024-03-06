Tareas Implementadas
Perfil Docente: Selección de Curso, Materia y Carga de Notas (B)

Generación de Usuarios para Docentes al Crearlos (B)

Se implementó la generación automática de usuarios para los docentes al momento de crear sus perfiles:

    Luego de completar el proceso de registro de un docente, se genera un usuario asociado automáticamente.
    Se envía un correo de activación al docente, informándole sobre la creación de su cuenta en la plataforma.
    El correo de activación incluye un mensaje de bienvenida y las instrucciones pertinentes para el uso del sistema.

Proceso de Implementación

Para habilitar estas funcionalidades, se realizaron los siguientes pasos:

    Desarrollo de Interfaz de Usuario
        Se diseñó la interfaz de usuario para permitir al docente seleccionar curso y materia.
        Se implementó la pantalla de carga de notas, incluyendo la selección de instancias para la carga.(Actualmente en curso, no finalizada)

    Gestión de Datos
        Se escribieron las consultas SQL para obtener la lista de alumnos asignados a una materia y curso determinados.
        Se estableció la lógica para registrar las notas ingresadas por el docente en las diferentes instancias.

    Integración de Creación de Usuarios
        Se configuró el sistema para generar automáticamente un usuario para el docente al finalizar el registro en el sistema.
        Se implementó la generación de una contraseña aleatoria y su asociación con el usuario creado.
        Se agregó la lógica para enviar un correo electrónico al docente con la información de la cuenta generada y las instrucciones de uso.

    Pruebas y Validación
        Se realizaron pruebas exhaustivas para asegurar el correcto funcionamiento de las nuevas funcionalidades.
        Se verificó el envío de correos de activación y la correcta creación de usuarios para docentes.

Notas Adicionales

Estas implementaciones se realizaron para mejorar la experiencia del docente en la plataforma, permitiéndole una gestión más eficiente de las notas de los alumnos y facilitando su acceso a través de cuentas de usuario generadas automáticamente.
