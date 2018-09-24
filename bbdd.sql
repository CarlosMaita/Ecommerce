/*
**
 * Author:  Maita
 * Created: 26/02/2018
 */

CREATE DATABASE ROUXA;


CREATE TABLE USUARIOS (
    IDUSUARIO INT AUTO_INCREMENT,
    NOMBRE VARCHAR(25),
    CORREO VARCHAR(30),
    CLAVE VARCHAR(50),
    NIVEL  INT,

    PRIMARY KEY (IDUSUARIO),
    UNIQUE (CORREO)
);


CREATE TABLE PRODUCTOS (
    IDPRODUCTO INT AUTO_INCREMENT,
    NOMBRE_P VARCHAR(30),
    DESCRIPCION VARCHAR(250),
    GENERO INT,
    TIPO INT,
    PRECIO FLOAT,
    IMAGEN VARCHAR(50),
    MATERIAL  VARCHAR(25),
    MARCA VARCHAR(15),
    MANGA INT,
    CUELLO INT,

    PRIMARY KEY (IDPRODUCTO)
);

CREATE TABLE MODELOS (
    IDMODELO INT AUTO_INCREMENT,
    IDPRODUCTO INT,
    COLOR1 INT,
    COLOR2 INT,
    IMAGEN VARCHAR(50),

    PRIMARY KEY (IDMODELO),
    FOREIGN KEY (IDPRODUCTO) REFERENCES PRODUCTOS(IDPRODUCTO)
    ON DELETE CASCADE
);

CREATE TABLE INVENTARIO (
    IDINVENTARIO INT AUTO_INCREMENT,
    IDMODELO INT,
    TALLA VARCHAR(4),
    CANTIDAD INT,
    PESO DOUBLE,
    PRIMARY KEY (IDINVENTARIO),
    FOREIGN KEY (IDMODELO) REFERENCES MODELOS(IDMODELO)
    ON DELETE CASCADE
);

/**C O L O R**/
CREATE TABLE COLOR (
    IDCOLOR INT AUTO_INCREMENT,
    HEX VARCHAR(7), /* Caracter # + seis (6) digitos*/
    COLOR VARCHAR(15),

    PRIMARY KEY (IDCOLOR),
    UNIQUE (HEX),
    UNIQUE (COLOR)

);
/* CATEGORIA */
CREATE TABLE CATEGORIAS(
  IDCATEGORIA INT AUTO_INCREMENT,
  NOMBRE VARCHAR(30),
  PADRE INT,

  PRIMARY KEY (IDCATEGORIA),
  UNIQUE(NOMBRE)
);


/******sistema de compra y envios Rouxa******/

/*
ESTATUS
0-'Por Pagar'
1-'Pago Fallido';
2-'Pago pendiente';
3-'Por Buscar';
4-'Por empaquetar' ;
5-'Por enviar';
6-'Enviado';
7-'Completado';
10-'Bajo Revisión';
*/


CREATE TABLE PEDIDOS (
    IDPEDIDO VARCHAR(32),
    CLIENTE VARCHAR(50),
    DOCID VARCHAR(30),
    TELEFONO VARCHAR(20),
    EMAIL VARCHAR(50),
    ESTATUS INT,
    FECHAPEDIDO DATE,

    PRIMARY KEY (IDPEDIDO)
);

CREATE TABLE COMPRAS (
    IDCOMPRA INT AUTO_INCREMENT,
    IDPEDIDO VARCHAR(32) ,
    MONTO DOUBLE,
    PESO DOUBLE,
    RAZONSOCIAL VARCHAR(100),
    RIFCI VARCHAR(40),
    DIRFISCAL VARCHAR(200),
    FECHAPAGO DATE,

    PRIMARY KEY (IDCOMPRA),
    FOREIGN KEY (IDPEDIDO) REFERENCES PEDIDOS(IDPEDIDO)
    ON DELETE CASCADE

);

CREATE TABLE ITEMS (

    IDPEDIDO VARCHAR(32),
    IDINVENTARIO INT ,
    CANTIDAD INT UNSIGNED,
    PRECIO DOUBLE,

    FOREIGN KEY (IDPEDIDO) REFERENCES PEDIDOS(IDPEDIDO)
    ON DELETE CASCADE
);


CREATE TABLE ENVIOS (
    IDENVIO  INT AUTO_INCREMENT,
    IDPEDIDO VARCHAR(32) ,
    PAIS VARCHAR(30),
    ESTADO VARCHAR(30),
    CIUDAD VARCHAR(30),
    MUNICIPIO VARCHAR(30),
    PARROQUIA VARCHAR(30),
    DIRECCION VARCHAR(200) ,
    CODIGOPOSTAL VARCHAR(20),
    RECEPTOR VARCHAR(30),
    CIRECEPTOR VARCHAR(40),
    TELFRECEPTOR VARCHAR(30),
    ENCOMIENDA VARCHAR(15),
    OBSERVACIONES VARCHAR(100),
    GUIA VARCHAR(50),

    PRIMARY KEY (IDENVIO),
    FOREIGN KEY (IDPEDIDO) REFERENCES PEDIDOS(IDPEDIDO)
    ON DELETE CASCADE

);
/******sistema de compra y envios Rouxa******/



CREATE TABLE VARIABLES (
    IDVARIABLE INT AUTO_INCREMENT,
    NOMBRE VARCHAR(10),
    VALUE INT,

    PRIMARY KEY (IDVARIABLE)
);

/*
SIMBOLOGIA

VPP-visitas de pagina principal
CS-compras solicitadas
CF-compras fallidas
CE-compras exitosas
CP-compras pendientes

*/

/*Creacion de variables iniciales */
INSERT INTO `VARIABLES`(`NOMBRE`, `VALUE`) VALUES ('VPP','0');
INSERT INTO `VARIABLES`(`NOMBRE`, `VALUE`) VALUES ('CS','0');
INSERT INTO `VARIABLES`(`NOMBRE`, `VALUE`) VALUES ('CF','0');
INSERT INTO `VARIABLES`(`NOMBRE`, `VALUE`) VALUES ('CE','0');
INSERT INTO `VARIABLES`(`NOMBRE`, `VALUE`) VALUES ('CP','0');

INSERT INTO `VARIABLES`(`NOMBRE`, `VALUE`) VALUES ('TASAUSD','1');


/*creacidon de tabla de falla - 24 de abril de 2018*/

CREATE TABLE FALLAS (
    IDFALLA  INT AUTO_INCREMENT,
    IDPEDIDO VARCHAR(32),
    REPORTERO VARCHAR (25),
    ESTATUS INT,
    ORIGEN VARCHAR(25),
    PROBLEMA VARCHAR(150),
    SOLUCION VARCHAR(150),
    FECHAFALLA DATETIME,
    FECHASOLUCION DATETIME,

    PRIMARY KEY (IDFALLA)
);
