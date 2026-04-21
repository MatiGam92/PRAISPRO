
# PRAISPRO - Calculador Inteligente de Precios

PRAISPRO es una aplicación robusta desarrollada en Laravel 12 diseñada para facilitar la cotización de productos destinados a la reventa. Permite a pequeñas empresas y emprendedores calcular precios finales de manera precisa, integrando impuestos (IVA), márgenes de ganancia y conversión de divisas en tiempo real.

Si bien funciona como una herramienta independiente, su arquitectura modular la hace totalmente escalable para integrarse como un microservicio en sistemas de gestión (ERP) más complejos.

🚀 Funcionalidades Principales
Calculador de Precios Dinámico: Procesamiento en tiempo real de costos base, aplicación de tasas impositivas (IVA) y márgenes de beneficio configurables.

Historial de Cotizaciones: Registro detallado de todos los cálculos realizados, con capacidad de consulta, edición y eliminación (CRUD completo).

Módulo de Divisas: Conversión automática de monedas para cotizaciones internacionales o en moneda extranjera.

Integración con API Externa: Consumo de datos en tiempo real desde DolarApi.com para obtener las cotizaciones de divisas más recientes.

Gestión de Medios: Capacidad para adjuntar y visualizar imágenes de productos asociados a las cotizaciones.

Interfaz Reactiva: Construido con Livewire, ofreciendo una experiencia de usuario fluida sin recargas de página innecesarias.

🛠️ Stack Tecnológico
Framework: Laravel 12

Frontend: Livewire 3 & Tailwind CSS

Base de Datos: MySQL / PostgreSQL

Entorno de Desarrollo: Laragon / PHP 8.4

API de Terceros: DolarApi (v1)

📦 Instalación y Configuración
Sigue estos pasos para poner en marcha el proyecto en tu entorno local:

1 -Clonar el repositorio:

git clone https://github.com/tu-usuario/praispro.git
cd praispro

2 -Instalar dependencias:

composer install
npm install && npm run build

3 -Configurar el entorno:
Crea una copia del archivo .env:

cp .env.example .env

Configura tus credenciales de base de datos en el archivo .env recién creado.

4 -Generar clave de aplicación:

php artisan key:generate

5 -Ejecutar migraciones:

php artisan migrate

6 -Enlace de almacenamiento (para fotos):

php artisan storage:link

🔧 Uso de la API de Divisas
El sistema consume el endpoint de https://dolarapi.com/v1/dolares a través del servicio ExchangeRateService. Asegúrate de tener conexión a internet para que los componentes PriceCalculator y CurrencyConverter puedan obtener las tasas actualizadas al momento de cargar el módulo.

📈 Escalabilidad
PRAISPRO ha sido diseñado bajo principios de código limpio. Aunque actualmente no gestiona stock, su estructura de base de datos y modelos permite la fácil implementación de:

Módulos de Inventario.

Generación de presupuestos en PDF.

Gestión de Roles y Permisos (Spatie).

API Restful para consumo desde aplicaciones móviles.

>>>>>>> 859b67ee87f7f03466d818c0b5df08b095edf043
