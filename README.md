Aplicación creada con Laravel, Docker, livewire y Tailwindcss.

Configuraciones de la base de datos en el archivo .env

Consultas a la BD:

    1.- Realizar una consulta que permita conocer cuál es el producto que más stock tiene
    
    SELECT * FROM konecta.productos WHERE stock = (SELECT MAX(stock) FROM konecta.productos);

    2.- Realizar una consulta que permita conocer cuál es el producto más vendido.

    SELECT productos.nombre, SUM(registros.cantidad) AS cantidad FROM registros JOIN productos ON registros.producto_id = productos.id GROUP BY productos.id ORDER BY SUM(registros.cantidad) DESC LIMIT 1;