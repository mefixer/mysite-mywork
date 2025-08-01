-- Crear tablas básicas para la aplicación

CREATE TABLE IF NOT EXISTS `portadas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `descripcion` text,
  `img` varchar(255),
  `activo` tinyint(1) DEFAULT 1,
  `fecha_alta` timestamp DEFAULT CURRENT_TIMESTAMP,
  `fecha_edicion` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text,
  `activo` tinyint(1) DEFAULT 1,
  `fecha_alta` timestamp DEFAULT CURRENT_TIMESTAMP,
  `fecha_edicion` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text,
  `precio` decimal(10,2) NOT NULL,
  `categoria_id` int(11),
  `stock` int(11) DEFAULT 0,
  `activo` tinyint(1) DEFAULT 1,
  `fecha_alta` timestamp DEFAULT CURRENT_TIMESTAMP,
  `fecha_edicion` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_categoria` (`categoria_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nombre` varchar(100),
  `email` varchar(100),
  `activo` tinyint(1) DEFAULT 1,
  `fecha_alta` timestamp DEFAULT CURRENT_TIMESTAMP,
  `fecha_edicion` timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario` (`usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insertar algunos datos de prueba
INSERT INTO `portadas` (`titulo`, `descripcion`, `img`, `activo`) VALUES
('Portada Principal', 'Bienvenido a nuestra tienda', 'portada1.jpg', 1);

INSERT INTO `categorias` (`nombre`, `descripcion`, `activo`) VALUES
('General', 'Categoría general de productos', 1);

INSERT INTO `productos` (`nombre`, `descripcion`, `precio`, `categoria_id`, `stock`, `activo`) VALUES
('Producto de prueba', 'Este es un producto de prueba', 10.99, 1, 100, 1);

INSERT INTO `usuarios` (`usuario`, `password`, `nombre`, `email`, `activo`) VALUES
('admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Administrador', 'admin@test.com', 1);
