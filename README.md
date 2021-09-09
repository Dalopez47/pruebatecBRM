# pruebatecBRM

Aplicación de Control de Inventarios

 Descripción: 
La aplicación nos sirve para controlar los inventarios de una venta de alimentos perecederos y funciona de la siguiente manera 
Tenemos 4 interfaces con el usuario las cuales fueron creadas con el framework Angular quedando 4 componentes principales, descritos de la siguiente manera
ingreso de productos; en la cual tenemos la opción de ingresar todos los productos que están disponibles para la venta, contando con los campos Id, nombre del Producto, cantidad, número de lote, fecha de vencimiento y precio. Esto con una conexión a base de datos MySQL workbench.
Área de compras; en la cual el usuario puede elegir el producto deseado y la cantidad a comprar, al confirmar la compra, el producto se actualiza en la base de datos, descontando del inventario el producto que sale 
Actualizar producto; en la cual el usuario puede hacer actualizaciones de los productos, en temas de cantidad y fechas de vencimiento, o según la rotación de las entradas nueva en el inventario. 
Lista de productos; en la que se puede consultar y visualizar la totalidad del inventario disponible 

Para todo el tema de recepción y envío de datos se realizó una API CRUD en PHP, la cual se integra como servicio con el framework Angular 

El archivo total queda distribuido en dos carpetas 
-	base-productos: Contiene la CRUD con PHP  
-	control Inventarios: Contiene los archivos creados con Angular 
