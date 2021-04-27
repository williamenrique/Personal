/* seleccionar al azar*/
SELECT * FROM db_tienda.table_producto ORDER BY rand() limit 3;

/*insert producto varias filas*/
INSERT INTO `db_tienda`.`table_producto` 
(`product_img`, `product_nombre`, `product_descripcion`, `product_categoria`, `product_precio`, `product_condicion`, `product_status`)
 VALUES 
 ('2.jpg', 'Tapas de puerta', 'Tapas de maleta palsticas de corsa', '1', '20', '1', '1'),
 ('3.jpg', 'Cajetin de direccion', 'Tapas de maleta palsticas de corsa', '1', '40', '1', '1'),
 ('9.jpg', 'Tapas CBR', 'Tapas de maleta palsticas de corsa', '1', '100', '1', '1'),
 ('11.jpg', 'Flauta de injectores', 'Flauta de Injectores de corsa', '1', '10', '1', '1');