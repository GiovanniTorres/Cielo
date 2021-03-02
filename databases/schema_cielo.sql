CREATE DATABASE IF NOT EXISTS cielo ;
USE cielo ;
CREATE TABLE administradores (
    adminDNI INT NOT NULL AUTO_INCREMENT ,
    ad_nombre VARCHAR (15) ,
    ad_apellidos VARCHAR (35) ,
    ad_edad INT ,
    ad_rfc VARCHAR (14) ,
    ad_mail VARCHAR (30) ,
    ad_telefono VARCHAR (10) ,
    ad_direccion VARCHAR (70) ,
    ad_cp INT ,
    PRIMARY KEY (adminDNI)
) ;
CREATE TABLE articulos (
    articuloDNI INT NOT NULL AUTO_INCREMENT ,
    ar_imagen VARCHAR (80) ,
    ar_nombre VARCHAR (25) ,
    ar_descripcion TEXT (200) ,
    ar_precio DECIMAL (7,2) ,
    PRIMARY KEY (articuloDNI)
) ;
CREATE TABLE clientes (
    clienteDNI INT NOT NULL AUTO_INCREMENT ,
    adminDNI INT NOT NULL ,
    cl_nombre VARCHAR (15) ,
    cl_apellidos VARCHAR (35) ,
    cl_usuario VARCHAR (15) UNIQUE ,
    cl_password VARCHAR (20) ,
    cl_edad INT ,
    cl_rfc VARCHAR (14) ,
    cl_telefono VARCHAR (10) ,
    cl_mail VARCHAR (30) UNIQUE ,
    cl_direccion VARCHAR (70) ,
    cl_cp INT ,
    cl_sello_digital TEXT (300) ,
    cl_razon_social VARCHAR (20) ,
    cl_mensaje TEXT (500) ,
    PRIMARY KEY (clienteDNI) ,
    FOREIGN KEY (adminDNI) REFERENCES administradores (adminDNI) ON UPDATE CASCADE ON DELETE CASCADE
) ;
CREATE TABLE ventas (
    ventaDNI INT NOT NULL AUTO_INCREMENT ,
    clienteDNI INT NOT NULL ,
    adminDNI INT NOT NULL ,
    ve_fecha_hora TIMESTAMP ,
    ve_total DECIMAL (7,2) ,
    ve_statpaq VARCHAR (14) ,
    PRIMARY KEY (ventaDNI) ,
    FOREIGN KEY (clienteDNI) REFERENCES clientes (clienteDNI) ON UPDATE CASCADE ON DELETE CASCADE ,
    FOREIGN KEY (adminDNI) REFERENCES administradores (adminDNI) ON UPDATE CASCADE ON DELETE CASCADE
) ;
CREATE TABLE carrito (
    carritoDNI INT NOT NULL AUTO_INCREMENT ,
    articuloDNI INT NOT NULL ,
    clienteDNI INT NOT NULL,
    ventaDNI INT NOT NULL ,
    ca_cantidad INT ,
    ca_precio_cant DECIMAL (7,2) ,
    PRIMARY KEY (carritoDNI) ,
    FOREIGN KEY (articuloDNI) REFERENCES articulos (articuloDNI) ON UPDATE CASCADE ON DELETE CASCADE ,
    FOREIGN KEY (clienteDNI) REFERENCES clientes (clienteDNI) ON UPDATE CASCADE ON DELETE CASCADE ,
    FOREIGN KEY (ventaDNI) REFERENCES ventas (ventaDNI) ON UPDATE CASCADE ON DELETE CASCADE
) ;
INSERT INTO administradores (adminDNI, ad_nombre, ad_apellidos, ad_edad, ad_rfc, ad_mail, ad_telefono, ad_direccion, ad_cp) VALUES
(NULL, 'Giovanni', 'Torres Miranda', 33, 'TOMJ8708018F8', 'giovannitorres@gmail.com', '1111111111', 'calle 1, colonia, municipio, estado', '52040') ,
(NULL, 'Guadalupe', 'Caballero Juárez', 25, 'CAJG9412118F8', 'guadalupecaballero@gmail.com', '2222222222', 'calle 2, colonia, municipio, estado', '52040') ;
INSERT INTO articulos (articuloDNI, ar_imagen, ar_nombre, ar_descripcion, ar_precio) VALUES 
(NULL, './imagenes/imagen1', 'Chessecake Zarzamora', 'Rico Chessecake d Zarzamora', 250) ,
(NULL, './imagenes/imagen2', 'Pastel Selva Negra', 'Rico Pastel de Selva Negra', 250) ,
(NULL, './imagenes/imagen3', 'Gelatina Vainilla', 'Rica Gelatina de Vainilla', 250) ,
(NULL, './imagenes/imagen4', 'CupCake Chocolate', 'Rico CupCake de Chocolate', 250) ,
(NULL, './imagenes/imagen5', 'Chessecake Chocolate', 'Rico Chessecake de Chocolate', 250) ,
(NULL, './imagenes/imagen6', 'Pastel Mil Hojas', 'Rico Pastel de Mil Hojas', 250) ,
(NULL, './imagenes/imagen7', 'Gelatina Chocolate', 'Rica Gelatina de Chocolate', 250) ,
(NULL, './imagenes/imagen8', 'CupCake Canela', 'Rico CupCake de Canela', 250) ,
(NULL, './imagenes/imagen9', 'Chessecake Mango', 'Rico Chessecake de Mango', 250) ,
(NULL, './imagenes/imagen10', 'Pastel de tres Leches', 'Rico Pastel de tres Leches', 250) ,
(NULL, './imagenes/imagen11', 'Gelatina Mosaico', 'Rica Gelatina de Mosaico', 250) ,
(NULL, './imagenes/imagen12', 'CupCake Vainilla', 'Rico CupCake de Vainilla', 250) ,
(NULL, './imagenes/imagen13', 'Chessecake Fresa', 'Rico Chessecake de Fresa', 250) ,
(NULL, './imagenes/imagen14', 'Pastel Chocolate', 'Rico Pastel de Chocolate', 250) ,
(NULL, './imagenes/imagen15', 'Gelatina Fresa', 'Rica Gelatina de Fresa', 250) ,
(NULL, './imagenes/imagen16', 'CupCake Limón', 'Rico CupCake de Limón', 250) ,
(NULL, './imagenes/imagen17', 'Chessecake Oreo', 'Rico Chessecake de Oreo', 250) ,
(NULL, './imagenes/imagen18', 'Gelatina Frutas', 'Rica Gelatina de Frutas', 250) ,
(NULL, './imagenes/imagen19', 'CupCake Moka', 'Rico CupCake Moka', 250) ;
INSERT INTO clientes (clienteDNI, adminDNI, cl_nombre, cl_apellidos, cl_usuario, cl_password, cl_edad, cl_rfc, cl_telefono, cl_mail, cl_direccion, cl_cp, cl_sello_digital, cl_razon_social, cl_mensaje) VALUES
(NULL, 2, 'Daniela', 'Torres Caballero', 'Dani', 'root', 7, 'TOCD1305278D8', '3333333333', 'danielatorresc@gmail.com', 'calle 11, colonia, municipio, estado, pais', '52040', 'mvcxdfyujmvfr567uyr456yhbvcde45tgvcde4tgvfr6yhgyuhgtyuhyuhgyhbgtyhyghuyghuyhuyhju7hu76ty654r4er54edrewdredfgtrfghuyhji8io98yhji876wqazxcvbhji8765re', 'Daniela Torres Caballero', 'gtdhhggtyutfh nhv nhv  njhgbhg nbv  nb  mjuygb jhgc njgv njhytdxcvbgresx gfredxc bgredxc bgfv gdc nhujbnkkn nmkokmnkkn nkn cfv vfdcv vdscvcsscvdfv ggb byb hujn kn mm mlm mlmmplmplmkoknjkjnnjij bhjjhb bhhb hv vgv cfc cfrccc cdccdwsdccsqscvcdefvvffv gg bh nn njjn  njn jn knkkkokmkmkokkjn jijhuhvccffc cf cdwdcwdc cdwdc  cdwdv vfrrgb hujn  mkoplm  ,lujmnhg vdedc cxswdc frfv bhyujn okm kjhy.9876rfvh865rfvbj8tfvnj8.') ,
(NULL, 1, 'Clara', 'Miranda Gonzaga', 'Clarita', 'root', 51, 'MIGC6704778D8', '4444444444', 'claramirandag@gmail.com', 'calle 12, colonia, municipio, estado, pais', '52040', 'mvcxdfyujmvfr567uyr456yhbvcde45tgvcde4tgvfr6yhgyuhgtyuhyuhgyhbgtyhyghuyghuyhuyhju7hu76ty654r4er54edrewdredfgtrfghuyhji8io98yhji876wqazxcvbhji8765re', 'Daniela Torres Caballero', 'gtdhhggtyutfh nhv nhv  njhgbhg nbv  nb  mjuygb jhgc njgv njhytdxcvbgresx gfredxc bgredxc bgfv gdc nhujbnkkn nmkokmnkkn nkn cfv vfdcv vdscvcsscvdfv ggb byb hujn kn mm mlm mlmmplmplmkoknjkjnnjij bhjjhb bhhb hv vgv cfc cfrccc cdccdwsdccsqscvcdefvvffv gg bh nn njjn  njn jn knkkkokmkmkokkjn jijhuhvccffc cf cdwdcwdc cdwdc  cdwdv vfrrgb hujn  mkoplm  ,lujmnhg vdedc cxswdc frfv bhyujn okm kjhy.9876rfvh865rfvbj8tfvnj8.') ,
(NULL, 1, 'Ricardo', 'Torres Caballero', 'Chichald', 'root', 53, 'MIGC6704778D8', '4444444444', 'ricardotorresf@gmail.com', 'calle 12, colonia, municipio, estado, pais', '52040', 'mvcxdfyujmvfr567uyr456yhbvcde45tgvcde4tgvfr6yhgyuhgtyuhyuhgyhbgtyhyghuyghuyhuyhju7hu76ty654r4er54edrewdredfgtrfghuyhji8io98yhji876wqazxcvbhji8765re', 'Daniela Torres Caballero', 'gtdhhggtyutfh nhv nhv  njhgbhg nbv  nb  mjuygb jhgc njgv njhytdxcvbgresx gfredxc bgredxc bgfv gdc nhujbnkkn nmkokmnkkn nkn cfv vfdcv vdscvcsscvdfv ggb byb hujn kn mm mlm mlmmplmplmkoknjkjnnjij bhjjhb bhhb hv vgv cfc cfrccc cdccdwsdccsqscvcdefvvffv gg bh nn njjn  njn jn knkkkokmkmkokkjn jijhuhvccffc cf cdwdcwdc cdwdc  cdwdv vfrrgb hujn  mkoplm  ,lujmnhg vdedc cxswdc frfv bhyujn okm kjhy.9876rfvh865rfvbj8tfvnj8.') ;
INSERT INTO ventas (ventaDNI, clienteDNI, adminDNI, ve_fecha_hora, ve_total, ve_statpaq) VALUES 
(NULL, 3, 1, '2020-11-17 00:00:01', 500, 'Pendiente') ,
(NULL, 1, 1, '2020-11-18 00:00:01', 750, 'Enviado') ;
INSERT INTO carrito (carritoDNI, articuloDNI, clienteDNI, ventaDNI, ca_cantidad, ca_precio_cant) VALUES 
(NULL, 3, 1, 1, 2, 500) ,
(NULL, 7, 1, 1, 1, 250) ;
USE cielo ;
DROP DATABASE cielo ;
