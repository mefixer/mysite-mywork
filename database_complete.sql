-- Crear todas las tablas necesarias para la aplicación

-- Tabla post
CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `descripcion` text,
  `img` varchar(255),
  `activo` tinyint(1) DEFAULT 1,
  `fecha_alta` timestamp DEFAULT CURRENT_TIMESTAMP,
  `fecha_edicion` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabla anuncios
CREATE TABLE IF NOT EXISTS `anuncios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `descripcion` text,
  `img` varchar(255),
  `activo` tinyint(1) DEFAULT 1,
  `fecha_alta` timestamp DEFAULT CURRENT_TIMESTAMP,
  `fecha_edicion` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabla posteos
CREATE TABLE IF NOT EXISTS `posteos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `descripcion` text,
  `img` varchar(255),
  `activo` tinyint(1) DEFAULT 1,
  `fecha_alta` timestamp DEFAULT CURRENT_TIMESTAMP,
  `fecha_edicion` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabla unidades
CREATE TABLE IF NOT EXISTS `unidades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `activo` tinyint(1) DEFAULT 1,
  `fecha_alta` timestamp DEFAULT CURRENT_TIMESTAMP,
  `fecha_edicion` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabla regiones
CREATE TABLE IF NOT EXISTS `regiones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `activo` tinyint(1) DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabla ciudades
CREATE TABLE IF NOT EXISTS `ciudades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `region_id` int(11),
  `activo` tinyint(1) DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `fk_region` (`region_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabla clientes
CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rut` varchar(20),
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100),
  `email` varchar(100),
  `telefono` varchar(20),
  `direccion` text,
  `region_id` int(11),
  `ciudad_id` int(11),
  `activo` tinyint(1) DEFAULT 1,
  `fecha_alta` timestamp DEFAULT CURRENT_TIMESTAMP,
  `fecha_edicion` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabla imagenes
CREATE TABLE IF NOT EXISTS `imagenes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `activo` tinyint(1) DEFAULT 1,
  `fecha_alta` timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_producto_imagen` (`id_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabla destacados
CREATE TABLE IF NOT EXISTS `destacados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto` int(11) NOT NULL,
  `activo` tinyint(1) DEFAULT 1,
  `fecha_alta` timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_producto_destacado` (`id_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabla envios
CREATE TABLE IF NOT EXISTS `envios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `region` varchar(100) NOT NULL,
  `valor` decimal(10,2) NOT NULL DEFAULT 0,
  `activo` tinyint(1) DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabla estado_pedido
CREATE TABLE IF NOT EXISTS `estado_pedido` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `activo` tinyint(1) DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabla pedidos
CREATE TABLE IF NOT EXISTS `pedidos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cliente_id` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL DEFAULT 0,
  `estado_id` int(11) DEFAULT 1,
  `fecha_alta` timestamp DEFAULT CURRENT_TIMESTAMP,
  `fecha_edicion` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_cliente_pedido` (`cliente_id`),
  KEY `fk_estado_pedido` (`estado_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabla detalle_pedido
CREATE TABLE IF NOT EXISTS `detalle_pedido` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pedido_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL DEFAULT 1,
  `precio` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pedido_detalle` (`pedido_id`),
  KEY `fk_producto_detalle` (`producto_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabla rol_usuarios
CREATE TABLE IF NOT EXISTS `rol_usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `activo` tinyint(1) DEFAULT 1,
  `fecha_alta` timestamp DEFAULT CURRENT_TIMESTAMP,
  `fecha_edicion` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Actualizar tabla productos para agregar campo destacado si no existe
ALTER TABLE `productos` ADD COLUMN `destacado` tinyint(1) DEFAULT 0;

-- Insertar datos de prueba básicos
INSERT INTO `post` (`titulo`, `descripcion`, `activo`) VALUES
('Post de bienvenida', 'Bienvenido a nuestro blog', 1);

INSERT INTO `anuncios` (`titulo`, `descripcion`, `activo`) VALUES
('Anuncio especial', 'Promoción especial del mes', 1);

INSERT INTO `posteos` (`titulo`, `descripcion`, `activo`) VALUES
('Nuevo posteo', 'Contenido interesante', 1);

INSERT INTO `regiones` (`nombre`) VALUES
('Región Metropolitana'),
('Valparaíso'),
('Bio Bio');

INSERT INTO `ciudades` (`nombre`, `region_id`) VALUES
('Santiago', 1),
('Valparaíso', 2),
('Concepción', 3);

INSERT INTO `unidades` (`nombre`) VALUES
('Unidad'),
('Kilogramo'),
('Metro');

INSERT INTO `estado_pedido` (`nombre`) VALUES
('Pendiente'),
('Procesando'),
('Enviado'),
('Entregado');

INSERT INTO `rol_usuarios` (`nombre`) VALUES
('Administrador'),
('Usuario');
