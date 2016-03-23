ALTER VIEW vw_orden_cabecero AS(
SELECT
	a.`id` AS id_orden,
	c.`nombre`,
	c.`ape_paterno`,
	c.`ape_materno`,
	CONCAT_WS(' ', c.`nombre`,c.`ape_paterno`,c.`ape_materno`) AS nombre_completo,
	c.`correo`,
	c.`telefono`,
	a.`total`,
	a.`id_respuesta`,
	a.`autorizacion_respuesta`,
	IFNULL(a.`status_respuesta`,1) AS status_respuesta,
	a.`fecha_orden`
FROM `orden_cabecero` a
LEFT JOIN `cat_clientes` c ON (c.`id`=a.`cod_cliente`))

ALTER VIEW vw_orden_detalle AS (
SELECT
	a.`id` AS id_orden,
	b.`cod_paquete`,
	b.`subtotal`,
	b.`tipo_orden`,
	b.`tipo_tarifa`,
	CASE b.`tipo_orden` WHEN 'tour' THEN d.`nombre_tour` ELSE c.`nombre_paquete` END nombre,
	CASE b.`tipo_orden` WHEN 'tour' THEN d.`ciudad_lugar` ELSE c.`lugar` END ciudad_lugar,
	b.`cantidad`,
	b.`fecha_reservacion`
FROM `orden_cabecero` a
LEFT JOIN `orden_detalle` b ON (a.`id`=b.`cod_cab`)
LEFT JOIN `cat_paquetes` c ON (b.`cod_paquete`=c.`id`)
LEFT JOIN `cat_tours` d ON (b.`cod_paquete`=d.`id`)
LEFT JOIN `cat_clientes` e ON (a.`cod_cliente` = e.`id`)
)
