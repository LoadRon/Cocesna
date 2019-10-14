DROP PROCEDURE IF EXISTS SP_INENCUESTA;
DELIMITER $$
CREATE PROCEDURE SP_INENCUESTA(
	IN	pcnombreSupervisor varchar(255))
SP:BEGIN
	        
       /**/
       
       INSERT INTO encuesta(fecha_encuesta,usuarioSupervisor)
       VALUES((select current_timestamp()),pcnombreSupervisor);
        
        /**/
        
END $$
DELIMITER ;