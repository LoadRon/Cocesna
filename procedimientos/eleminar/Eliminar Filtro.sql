DROP PROCEDURE IF EXISTS SP_BORRARFILTRO;
DELIMITER $$
CREATE PROCEDURE SP_BORRARFILTRO(
								IN pIdFiltro INT)
BEGIN
    DELETE FROM log_pregunta_filtro WHERE pregunta_filtro_idFiltro=pIdFiltro;
	DELETE FROM pregunta_filtro WHERE idFiltro=pIdFiltro;
END$$
DELIMITER ;

/*
CALL SP_BORRARFILTRO(1);
*/