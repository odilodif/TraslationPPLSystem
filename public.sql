/*
Navicat PGSQL Data Transfer

Source Server         : 192.168.1.185
Source Server Version : 90324
Source Host           : 192.168.1.185:5432
Source Database       : traslation
Source Schema         : public

Target Server Type    : PGSQL
Target Server Version : 90324
File Encoding         : 65001

Date: 2019-10-19 07:15:17
*/


-- ----------------------------
-- Sequence structure for center_crs_crs_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."center_crs_crs_id_seq";
CREATE SEQUENCE "public"."center_crs_crs_id_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 2147483647
 START 73
 CACHE 1;
SELECT setval('"public"."center_crs_crs_id_seq"', 73, true);

-- ----------------------------
-- Sequence structure for direction_area_area_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."direction_area_area_id_seq";
CREATE SEQUENCE "public"."direction_area_area_id_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 8
 CACHE 1;
SELECT setval('"public"."direction_area_area_id_seq"', 8, true);

-- ----------------------------
-- Sequence structure for file_document_file_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."file_document_file_id_seq";
CREATE SEQUENCE "public"."file_document_file_id_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 2147483647
 START 95
 CACHE 1;
SELECT setval('"public"."file_document_file_id_seq"', 95, true);

-- ----------------------------
-- Sequence structure for menu_description_menu_description_id
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."menu_description_menu_description_id";
CREATE SEQUENCE "public"."menu_description_menu_description_id"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 2147483647
 START 24
 CACHE 1;
SELECT setval('"public"."menu_description_menu_description_id"', 24, true);

-- ----------------------------
-- Sequence structure for menu_menu_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."menu_menu_id_seq";
CREATE SEQUENCE "public"."menu_menu_id_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 19
 CACHE 1;
SELECT setval('"public"."menu_menu_id_seq"', 19, true);

-- ----------------------------
-- Sequence structure for prison_person_prison_per_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."prison_person_prison_per_id_seq";
CREATE SEQUENCE "public"."prison_person_prison_per_id_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 2147483647
 START 447
 CACHE 1;
SELECT setval('"public"."prison_person_prison_per_id_seq"', 447, true);

-- ----------------------------
-- Sequence structure for profile_prfle_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."profile_prfle_id_seq";
CREATE SEQUENCE "public"."profile_prfle_id_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 2147483647
 START 11
 CACHE 1;
SELECT setval('"public"."profile_prfle_id_seq"', 11, true);

-- ----------------------------
-- Sequence structure for profile_saved_prfl_saved_id
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."profile_saved_prfl_saved_id";
CREATE SEQUENCE "public"."profile_saved_prfl_saved_id"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 2147483647
 START 59
 CACHE 1;
SELECT setval('"public"."profile_saved_prfl_saved_id"', 59, true);

-- ----------------------------
-- Sequence structure for rol_rol_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."rol_rol_id_seq";
CREATE SEQUENCE "public"."rol_rol_id_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 2147483647
 START 9
 CACHE 1;
SELECT setval('"public"."rol_rol_id_seq"', 9, true);

-- ----------------------------
-- Sequence structure for traslation_details_trasl_det_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."traslation_details_trasl_det_id_seq";
CREATE SEQUENCE "public"."traslation_details_trasl_det_id_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 236
 CACHE 1;
SELECT setval('"public"."traslation_details_trasl_det_id_seq"', 236, true);

-- ----------------------------
-- Sequence structure for traslation_head_trasl_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."traslation_head_trasl_id_seq";
CREATE SEQUENCE "public"."traslation_head_trasl_id_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 2147483647
 START 679
 CACHE 1;
SELECT setval('"public"."traslation_head_trasl_id_seq"', 679, true);

-- ----------------------------
-- Sequence structure for traslation_type_trasl_type_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."traslation_type_trasl_type_id_seq";
CREATE SEQUENCE "public"."traslation_type_trasl_type_id_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 2147483647
 START 11
 CACHE 1;
SELECT setval('"public"."traslation_type_trasl_type_id_seq"', 11, true);

-- ----------------------------
-- Sequence structure for ui_view_trasl_ui_view_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."ui_view_trasl_ui_view_id_seq";
CREATE SEQUENCE "public"."ui_view_trasl_ui_view_id_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 9223372036854775807
 START 5
 CACHE 1;
SELECT setval('"public"."ui_view_trasl_ui_view_id_seq"', 5, true);

-- ----------------------------
-- Sequence structure for user_login_usr_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."user_login_usr_id_seq";
CREATE SEQUENCE "public"."user_login_usr_id_seq"
 INCREMENT 1
 MINVALUE 1
 MAXVALUE 2147483647
 START 17
 CACHE 1;
SELECT setval('"public"."user_login_usr_id_seq"', 17, true);

-- ----------------------------
-- Table structure for center_crs
-- ----------------------------
DROP TABLE IF EXISTS "public"."center_crs";
CREATE TABLE "public"."center_crs" (
"crs_id" int4 DEFAULT nextval('center_crs_crs_id_seq'::regclass) NOT NULL,
"crs_id_sgp" int4,
"crs_description" varchar(100) COLLATE "default",
"crs_state" char(1) COLLATE "default"
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of center_crs
-- ----------------------------
INSERT INTO "public"."center_crs" VALUES ('1', '1', 'CRS RSCN MIXTO - COTOPAXI', 't');
INSERT INTO "public"."center_crs" VALUES ('2', '1', ' CPPL QUEVEDO', 't');
INSERT INTO "public"."center_crs" VALUES ('3', '1', ' CC TURI', 't');
INSERT INTO "public"."center_crs" VALUES ('4', '1', 'CRS MIXTO - TULCAN', 't');
INSERT INTO "public"."center_crs" VALUES ('5', '1', 'CDP - CDC RSCS MIXTO - TURI', 't');
INSERT INTO "public"."center_crs" VALUES ('7', '1', 'CRS RSCS MIXTO - TURI', 't');
INSERT INTO "public"."center_crs" VALUES ('8', '1', 'CDP - CDC MASCULINO - GUARANDA', 't');
INSERT INTO "public"."center_crs" VALUES ('9', '1', 'CRS MIXTO - GUARANDA', 't');
INSERT INTO "public"."center_crs" VALUES ('10', '1', 'CDP - CDC MASCULINO - AZOGUES', 't');
INSERT INTO "public"."center_crs" VALUES ('11', '1', 'CRS GUAYAQUIL VARONES 1', 't');
INSERT INTO "public"."center_crs" VALUES ('12', '1', 'CRS MASCULINO - CAÑAR', 't');
INSERT INTO "public"."center_crs" VALUES ('13', '1', 'UAT-QUITUMBE', 't');
INSERT INTO "public"."center_crs" VALUES ('14', '1', 'CDP - CDC RSCN MIXTO - COTOPAXI', 't');
INSERT INTO "public"."center_crs" VALUES ('15', '1', ' UAT FLAGRANCIA DURAN', 't');
INSERT INTO "public"."center_crs" VALUES ('16', '1', 'CDP - CDC MIXTO - RIOBAMBA', 't');
INSERT INTO "public"."center_crs" VALUES ('17', '1', 'CRS MIXTO - RIOBAMBA', 't');
INSERT INTO "public"."center_crs" VALUES ('18', '1', 'CRS MASCULINO - MACHALA', 't');
INSERT INTO "public"."center_crs" VALUES ('19', '1', 'CRS FEMENINO - ZARUMA', 't');
INSERT INTO "public"."center_crs" VALUES ('20', '1', 'CDP - CDC MIXTO - ESMERALDAS', 't');
INSERT INTO "public"."center_crs" VALUES ('21', '1', 'CRS MASCULINO - ESMERALDAS', 't');
INSERT INTO "public"."center_crs" VALUES ('22', '1', 'CC MIXTO - GUAYAQUIL', 't');
INSERT INTO "public"."center_crs" VALUES ('23', '1', 'CRS FEMENINO - GUAYAQUIL', 't');
INSERT INTO "public"."center_crs" VALUES ('24', '1', 'CRS MASCULINO - IBARRA', 't');
INSERT INTO "public"."center_crs" VALUES ('25', '1', 'CDP - CDC MIXTO - LOJA', 't');
INSERT INTO "public"."center_crs" VALUES ('26', '1', 'CRS MIXTO - LOJA', 't');
INSERT INTO "public"."center_crs" VALUES ('27', '1', 'CDP - CDC MASCULINO - BABAHOYO', 't');
INSERT INTO "public"."center_crs" VALUES ('28', '1', 'CRS MASCULINO - BABAHOYO', 't');
INSERT INTO "public"."center_crs" VALUES ('29', '1', 'CDP - CDC MIXTO - PORTOVIEJO', 't');
INSERT INTO "public"."center_crs" VALUES ('30', '1', 'CC LAGO AGRIO', 't');
INSERT INTO "public"."center_crs" VALUES ('31', '1', 'CDP - CDC MASCULINO - BAHIA', 't');
INSERT INTO "public"."center_crs" VALUES ('32', '1', 'CRS FEMENINO - PORTOVIEJO', 't');
INSERT INTO "public"."center_crs" VALUES ('33', '1', 'CRS MASCULINO - EL RODEO', 't');
INSERT INTO "public"."center_crs" VALUES ('34', '1', 'CRS MASCULINO - JIPIJAPA', 't');
INSERT INTO "public"."center_crs" VALUES ('35', '1', 'CRS MASCULINO - BAHIA', 't');
INSERT INTO "public"."center_crs" VALUES ('36', '1', 'CRS MIXTO - MACAS', 't');
INSERT INTO "public"."center_crs" VALUES ('37', '1', 'CC MIXTO - ARCHIDONA', 't');
INSERT INTO "public"."center_crs" VALUES ('38', '1', 'CDP - CDC MIXTO - ARCHIDONA', 't');
INSERT INTO "public"."center_crs" VALUES ('39', '1', 'CRS MIXTO - ARCHIDONA', 't');
INSERT INTO "public"."center_crs" VALUES ('40', '1', 'CDP - CDC - MIXTO - PUYO', 't');
INSERT INTO "public"."center_crs" VALUES ('41', '1', 'CC MIXTO - QUITO', 't');
INSERT INTO "public"."center_crs" VALUES ('42', '1', 'CDP - CDC MASCULINO - EL INCA', 't');
INSERT INTO "public"."center_crs" VALUES ('43', '1', 'CRS QUITO VARONES NRO. 4', 't');
INSERT INTO "public"."center_crs" VALUES ('44', '1', 'CRS FEMENINO - QUITO (Ate.Pri)', 't');
INSERT INTO "public"."center_crs" VALUES ('45', '1', ' CDP - CDC MIXTO - AMBATO', 't');
INSERT INTO "public"."center_crs" VALUES ('46', '1', 'CRS MIXTO - AMBATO', 't');
INSERT INTO "public"."center_crs" VALUES ('47', '1', 'CDP - CDC - MIXTO - SUCUMBIOS', 't');
INSERT INTO "public"."center_crs" VALUES ('48', '1', 'CRS MASCULINO - SUCUMBIOS', 't');
INSERT INTO "public"."center_crs" VALUES ('49', '1', 'CDP - CDC MIXTO - SANTO DOMINGO', 't');
INSERT INTO "public"."center_crs" VALUES ('50', '1', 'CRS MASCULINO - SANTO DOMINGO', 't');
INSERT INTO "public"."center_crs" VALUES ('51', '1', 'CRS MIXTO - QUEVEDO ', 't');
INSERT INTO "public"."center_crs" VALUES ('52', '1', 'CRS FEMENINO ESMERALDAS', 't');
INSERT INTO "public"."center_crs" VALUES ('53', '1', 'UAT FLAGRANCIA QUITO', 't');
INSERT INTO "public"."center_crs" VALUES ('54', '1', 'CDP CDC MIXTO GUAYAQUIL', 't');
INSERT INTO "public"."center_crs" VALUES ('55', '1', 'UAT FLAGRANCIA QUITUMBE', 't');
INSERT INTO "public"."center_crs" VALUES ('56', '1', 'CDP - CDC - MIXTO - ALAUSI', 't');
INSERT INTO "public"."center_crs" VALUES ('57', '1', 'PLANTA CENTRAL-NACIONAL', 't');
INSERT INTO "public"."center_crs" VALUES ('58', '1', 'CRS 4 VARONES', 't');
INSERT INTO "public"."center_crs" VALUES ('59', '1', 'UAT FLAGRANCIA GUAYAQUIL', 't');
INSERT INTO "public"."center_crs" VALUES ('60', '1', 'UAT FLAGRANCIA ESMERALDAS', 't');
INSERT INTO "public"."center_crs" VALUES ('61', '1', 'UAT FLAGRANCIA EL EMPALME', 't');
INSERT INTO "public"."center_crs" VALUES ('62', '1', 'CDP - CDC MASCULINO - JIPIJAPA', 't');
INSERT INTO "public"."center_crs" VALUES ('63', '1', 'CC MACAS', 't');
INSERT INTO "public"."center_crs" VALUES ('64', '1', 'CRS REGIONAL GUAYAS', 't');
INSERT INTO "public"."center_crs" VALUES ('65', '1', 'UAT FLAGRANCIA AMBATO', 't');
INSERT INTO "public"."center_crs" VALUES ('66', '1', 'CDP - CDC MASCULINO - CAÑAR', 't');
INSERT INTO "public"."center_crs" VALUES ('67', '1', 'CDP MIXTO - MACAS', 't');
INSERT INTO "public"."center_crs" VALUES ('68', '1', ' CC RIOBAMBA', 't');
INSERT INTO "public"."center_crs" VALUES ('69', '1', 'UAT FLAGRANCIA ALAUSI', 't');
INSERT INTO "public"."center_crs" VALUES ('70', '1', 'CRS ALAUSI', 't');
INSERT INTO "public"."center_crs" VALUES ('71', '1', ' CRS MASCULINO - AZOGUES', 't');

-- ----------------------------
-- Table structure for direction_area
-- ----------------------------
DROP TABLE IF EXISTS "public"."direction_area";
CREATE TABLE "public"."direction_area" (
"area_id" int4 DEFAULT nextval('direction_area_area_id_seq'::regclass) NOT NULL,
"area_desription" varchar(255) COLLATE "default",
"area_state" varchar(255) COLLATE "default",
"area_parent" int4
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of direction_area
-- ----------------------------
INSERT INTO "public"."direction_area" VALUES ('1', 'DIRECCÍON TÉCNICA DE RÉGIMEN CERRADO', 't', '2');
INSERT INTO "public"."direction_area" VALUES ('2', 'SUBDIRECCIÓN TÉCNICA DE REHABILITACIÓN SOCIAL', 't', null);
INSERT INTO "public"."direction_area" VALUES ('3', 'SUBDIRECCIÓN TÉCNICA DE PROTECCIÓN Y SEGURIDAD PENITENCIARIA', 't', null);
INSERT INTO "public"."direction_area" VALUES ('4', 'DIRECCIÓN TÉCNICA DE OPERATIVOS, LOGÍSTICA, EQUIPAMIENTO E INFRAESTRUCTURA', 't', '3');
INSERT INTO "public"."direction_area" VALUES ('5', 'SUBDIRECCIÓN TÉCNICA DE PROTECCIÓN Y SEGURIDAD PENITENCIARIA ANALISTA', 't', '3');
INSERT INTO "public"."direction_area" VALUES ('6', 'DIRECCÍON TÉCNICA DE RÉGIMEN CERRADO ANALISTA', 't', '1');

-- ----------------------------
-- Table structure for file_document
-- ----------------------------
DROP TABLE IF EXISTS "public"."file_document";
CREATE TABLE "public"."file_document" (
"file_id" int4 DEFAULT nextval('file_document_file_id_seq'::regclass) NOT NULL,
"prison_per_id" int4,
"file_state" char(1) COLLATE "default",
"file_path" varchar(200) COLLATE "default",
"file_description_name" varchar(255) COLLATE "default"
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of file_document
-- ----------------------------
INSERT INTO "public"."file_document" VALUES ('86', '228', 't', 'View/documents/PPL/trabajo para examen sistemas operativos3.pdf', 'Trabajo Para Examen Sistemas Operativos3.pdf');
INSERT INTO "public"."file_document" VALUES ('87', '51', 't', 'View/documents/PPL/informe de factibilidad.pdf', 'Informe de Factibilidad.pdf');
INSERT INTO "public"."file_document" VALUES ('88', '51', 'f', 'View/documents/PPL/informe de factibilidad.pdf', 'Informe de Factibilidad.pdf');
INSERT INTO "public"."file_document" VALUES ('89', '51', 'f', 'View/documents/PPL/informe de factibilidad.pdf', 'Informe de Factibilidad.pdf');
INSERT INTO "public"."file_document" VALUES ('90', '51', 'f', 'View/documents/PPL/informe de factibilidad.pdf', 'Informe de Factibilidad.pdf');
INSERT INTO "public"."file_document" VALUES ('91', '51', 'f', 'View/documents/PPL/informe de factibilidad.pdf', 'Informe de Factibilidad.pdf');
INSERT INTO "public"."file_document" VALUES ('92', '238', 't', 'View/documents/PPL/informe de factibilidad.pdf', 'Informe de Factibilidad.pdf');
INSERT INTO "public"."file_document" VALUES ('93', '228', 't', 'View/documents/PPL/trabajo para examen sistemas operativos3.pdf', 'Trabajo Para Examen Sistemas Operativos3.pdf');
INSERT INTO "public"."file_document" VALUES ('94', '437', 't', 'View/documents/PPL/certificado-desde-crs (7).pdf', 'certificado-desde-crs (7).pdf');
INSERT INTO "public"."file_document" VALUES ('95', '438', 't', 'View/documents/PPL/certificado-desde-crs (7).pdf', 'certificado-desde-crs (7).pdf');

-- ----------------------------
-- Table structure for foo
-- ----------------------------
DROP TABLE IF EXISTS "public"."foo";
CREATE TABLE "public"."foo" (
"unlimited" varchar COLLATE "default"
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of foo
-- ----------------------------

-- ----------------------------
-- Table structure for menu_objects
-- ----------------------------
DROP TABLE IF EXISTS "public"."menu_objects";
CREATE TABLE "public"."menu_objects" (
"menu_description_id" int4 DEFAULT nextval('menu_description_menu_description_id'::regclass) NOT NULL,
"menu_description_description" varchar(255) COLLATE "default",
"menu_description_href" text COLLATE "default",
"menu_description_state" varchar(1) COLLATE "default",
"menu_traslation_path_img" text COLLATE "default"
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of menu_objects
-- ----------------------------
INSERT INTO "public"."menu_objects" VALUES ('1', 'Traslado por Seguridad', './?page=AnalysView&typ=2', 't', '<img src="./View/images/photo383103369498175460.jpg" alt="..." />');
INSERT INTO "public"."menu_objects" VALUES ('2', 'Inicio', './?page=home', 't', '<img src="./View/images/inicio.png" alt="...">');
INSERT INTO "public"."menu_objects" VALUES ('3', 'Traslado por Salud', './?page=AnalysView&typ=3', 't', '<img src="./View/images/salud-OMS-e1551914081412.jpg" alt="...">');
INSERT INTO "public"."menu_objects" VALUES ('4', 'Lista Cercanía Familiar', './?page=AnalysView&typ=4', 't', '<img src="./View/images/semFYC_Familia3.jpg" alt="...">');
INSERT INTO "public"."menu_objects" VALUES ('5', 'Hacinamiento', './?page=AnalysView&typ=5', 't', '<img src="./View/images/hacinamiento.jpeg" alt="...">');
INSERT INTO "public"."menu_objects" VALUES ('6', 'Separación', './?page=AnalysView&typ=6', 't', '<img src="./View/images/separacion.jpeg" alt="...">');
INSERT INTO "public"."menu_objects" VALUES ('7', 'Madres Con Niños Mres', './?page=AnalysView&typ=7', 't', '<img src="./View/images/niños.jpg" alt="...">');
INSERT INTO "public"."menu_objects" VALUES ('8', 'Lista Traslados PPL', './?page=DirectorView', 't', '<img src="./View/images/resquesttraslation.jpeg" alt="...">');
INSERT INTO "public"."menu_objects" VALUES ('9', 'Director Planta Central  (Aprobar )', './?page=DirectorPltCtr1lView', 't', '<img src="./View/images/directoraprobation.jpeg" alt="...">');
INSERT INTO "public"."menu_objects" VALUES ('10', 'Subdirección Técnica de Rehabilitación Social', './?page=DirectorPltCtr2lView', 't', '<img src="./View/images/rehabilicion_social.jpg" alt="...">');
INSERT INTO "public"."menu_objects" VALUES ('11', 'Reportes', './?page=Reports', 't', '<img src="./View/images/Stacked-Column-Chart.png" alt="...">');
INSERT INTO "public"."menu_objects" VALUES ('13', 'Reportes2', './?page=Reports2', 't', '<img src="./View/images/Stacked-Column-Chart.png" alt="...">');
INSERT INTO "public"."menu_objects" VALUES ('14', 'CrearPPL', './?page=CreatePPLView', 't', '<img src="./View/images/certificado-bancario-chile.jpg" alt="...">');
INSERT INTO "public"."menu_objects" VALUES ('15', 'ListaPPL', './?page=ListPPLView', 't', '<img src="./View/images/list.jpg" alt="...">');
INSERT INTO "public"."menu_objects" VALUES ('16', 'Crear Solicitud  Traslado', './?page=CreateRequestTraslationView', 't', '<img src="./View/images/clientes3.png" alt="...">');
INSERT INTO "public"."menu_objects" VALUES ('17', 'Orden Judicial', './?page=AnalysView&typ=1', 't', '<img src="./View/images/abrtion.jpg" alt="..." /></a>');
INSERT INTO "public"."menu_objects" VALUES ('18', 'DIRECCIÓN TÉCNICA DE OPERATIVOS, LOGÍSTICA, EQUIPAMIENTO E INFRAESTRUCTURA', './?page=DirectorPltCtr3lView', 't', '<img src="./View/images/rehabilicion_social.jpg" alt="...">');
INSERT INTO "public"."menu_objects" VALUES ('19', 'Botnes de Desplazamiento ', null, 't', '<button id="btnFirstRecord">
        <li>
            <span class="glyphicon glyphicon-step-backward" aria-hidden="true"></span>
            <span class="glyphicon-class">Primer </span>
        </li>
    </button>
    <button id="btnBackwardRecord">
        <li>
            <span class="glyphicon glyphicon-fast-backward" aria-hidden="true"></span>
            <span class="glyphicon-class">Anterior</span>
        </li>
    </button>
    <button id="btnForwardRecord"> 
        <li>
            <span class="glyphicon glyphicon-fast-forward" aria-hidden="true"id=""></span>
            <span class="glyphicon-class">Siguiente</span>
        </li>
    </button>
    <button id="btnLastRecord">
        <li>
            <span class="glyphicon glyphicon-step-forward" aria-hidden="true"></span>
            <span class="glyphicon-class">Ultimo</span>
        </li>
    </button>');
INSERT INTO "public"."menu_objects" VALUES ('20', 'Combobox Tipo de Traslados', null, 't', '<label class="input col-md-4" style="margin-left: 5px;"   >
                            <input type="text" id="txt_trasl_type"  name="trasl_type_iew" readonly="" hidden="" />
                            <select id="trasl_type_id" name="trasl_type_id" required="" >
                                <option value="0">Selecionar Tipo de Traslados </option>
                            </select>
                        </label>');
INSERT INTO "public"."menu_objects" VALUES ('21', 'ComboBox Crs Destino', null, 't', '  <label class="input col-md-4" style="margin-left: 5px;" >
                            <input  id="txt_crs_id_destination" name="txt_crs_id_destination" type="text" value="" readonly="" hidden="">
                            <select id="crs_id_destination" name="crs_id_destination"  >
                                <option value="0">Selecionar Crs </option>
                            </select>
                        </label>');
INSERT INTO "public"."menu_objects" VALUES ('24', 'Ver Lista Detalle Traslados', './?page=ListDetailsTraslatiosView', 't', '<img src="./View/images/directoraprobation.jpeg" alt="...">');

-- ----------------------------
-- Table structure for prison_person
-- ----------------------------
DROP TABLE IF EXISTS "public"."prison_person";
CREATE TABLE "public"."prison_person" (
"prison_per_id" int4 DEFAULT nextval('prison_person_prison_per_id_seq'::regclass) NOT NULL,
"prison_per_name" varchar(50) COLLATE "default",
"prison_per_lastname" varchar(50) COLLATE "default",
"prison_per_identification" varchar(16) COLLATE "default" NOT NULL,
"prison_per_photo" varchar(200) COLLATE "default",
"prison_per_fingerprinter" varchar(200) COLLATE "default",
"prison_per_state" char(1) COLLATE "default",
"prison_per_observations" varchar(200) COLLATE "default",
"id_sgp" int4,
"sex" varchar(255) COLLATE "default",
"prontuario" varchar(255) COLLATE "default",
"status_sgp" varchar(255) COLLATE "default"
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of prison_person
-- ----------------------------
INSERT INTO "public"."prison_person" VALUES ('51', 'MOMBRE PRUEBA', 'APELLIDO APELLIDO', '19', null, null, 't', 'revisión obs', '56212', null, null, null);
INSERT INTO "public"."prison_person" VALUES ('224', 'name', 'apellido', '1723344444', null, null, 't', null, '1234', 'mujer', 'MJDHC-22222', 'precesed');
INSERT INTO "public"."prison_person" VALUES ('226', 'nam', 'lastna', '123455', null, null, 't', null, '1234555', 'hombre', 'mjdhc', 'preocess');
INSERT INTO "public"."prison_person" VALUES ('227', 'JIMMY ROBERTO', '', '0911729077', null, null, 't', null, '56086', 'hombre', 'MJDHC-A-00000166', 'free');
INSERT INTO "public"."prison_person" VALUES ('228', 'OVIDIO AGUSTIN', 'LOOR DELGADO', '1720390895', null, null, 't', 'null', '56614', 'hombre', 'MJDHC-A-00000681', 'free');
INSERT INTO "public"."prison_person" VALUES ('229', 'ALEXIS JAVIER', 'MERA GILER', '0910420975', null, null, 't', null, '268911', 'hombre', 'MJDHC-A-00200132', 'procesado');
INSERT INTO "public"."prison_person" VALUES ('230', 'DANNY ALEXIS', 'HERRERA MAMARANDI', '1721345138', null, null, 't', null, '81940', 'hombre', 'MJDHC-A-00024680', 'sentenciado');
INSERT INTO "public"."prison_person" VALUES ('231', 'MARIO RODRIGO', 'CEVALLOS LOACHAMIN', '0909498701', null, null, 't', null, '81966', 'hombre', 'MJDHC-A-00024706', 'sentenciado');
INSERT INTO "public"."prison_person" VALUES ('232', 'IVAN MARCELO', 'ROSERO ENRIQUEZ', '0401547427', null, null, 't', null, '83025', 'hombre', 'MJDHC-A-00025721', 'sentenciado');
INSERT INTO "public"."prison_person" VALUES ('233', 'CHRISTIAN EDUARDO', 'ARAUJO SALGADO', '1717774853', null, null, 't', null, '83235', 'hombre', 'MJDHC-A-00025920', 'sentenciado');
INSERT INTO "public"."prison_person" VALUES ('234', 'VICTOR MANUEL', 'ENRIQUEZ CABRERA', '1711966935', null, null, 't', null, '83550', 'hombre', 'MJDHC-A-00026233', 'sentenciado');
INSERT INTO "public"."prison_person" VALUES ('235', 'MARIA BELEN', 'CAMPAÑA FIALLOS', '1717131484', null, null, 't', 'null', '81738', 'mujer', 'MJDHC-A-00024510', 'sentenciado');
INSERT INTO "public"."prison_person" VALUES ('236', 'CARLA ALEXANDRA', 'ORTIZ PARRA', '0104696091', null, null, 't', 'null', '81612', 'mujer', 'MJDHC-A-00024398', 'preso');
INSERT INTO "public"."prison_person" VALUES ('237', 'CARLOS EDUARDO', 'SAMANIEGO REASCOS', '0107182362', null, null, 't', 'null', '81631', 'hombre', 'MJDHC-A-00024417', 'procesado');
INSERT INTO "public"."prison_person" VALUES ('238', 'CARLOS VINICIO', 'CHUMAÑA PACHECO', '1715128805', null, null, 't', 'obs.', '81501', 'hombre', 'MJDHC-A-00024301', 'procesado');
INSERT INTO "public"."prison_person" VALUES ('239', 'DIEGO ENRIQUE', 'CALDERON ROSADO', '1250278874', null, null, 't', 'obs.', '81566', 'hombre', 'MJDHC-A-00024361', 'sentenciado');
INSERT INTO "public"."prison_person" VALUES ('240', 'MIGUEL ANGEL', 'MATUTE MATUTE', '0107171100', null, null, 't', 'null', '81473', 'hombre', 'MJDHC-A-00024273', 'sentenciado');
INSERT INTO "public"."prison_person" VALUES ('241', 'HECTOR SANTIAGO', 'CUJI CORREA', '0302135603', null, null, 't', 'null', '81507', 'hombre', 'MJDHC-A-00024307', 'procesado');
INSERT INTO "public"."prison_person" VALUES ('242', 'GEOVANNY FABIAN', 'CELDO CAYAMBI', '0302353305', null, null, 't', 'null', '81491', 'hombre', 'MJDHC-A-00024291', 'sentenciado');
INSERT INTO "public"."prison_person" VALUES ('243', 'ERWIN VICENTE', 'LUCIN CARVACHE', '0916155864', null, null, 't', 'null', '81589', 'hombre', 'MJDHC-A-00024384', 'procesado');
INSERT INTO "public"."prison_person" VALUES ('244', 'CARLOS EDUARDO', 'PARDO LARA', '0921197711', null, null, 't', 'null', '81004', 'hombre', 'MJDHC-A-00023856', 'sentenciado');
INSERT INTO "public"."prison_person" VALUES ('245', 'GRACIELA DEL CARMEN', 'CAJAMARCA FLORES', '0103257929', null, null, 't', 'null', '81727', 'mujer', 'MJDHC-A-00024499', 'preso');
INSERT INTO "public"."prison_person" VALUES ('246', 'LUZ PATRICIA', 'CAJAS VELE', '1712106374', null, null, 't', 'null', '81729', 'mujer', 'MJDHC-A-00024501', 'sentenciado');
INSERT INTO "public"."prison_person" VALUES ('247', 'ALEX FABRICIO', 'BRAVO PANCHANO', '0802332239', null, null, 't', 'null', '81655', 'hombre', 'MJDHC-A-00024441', 'procesado');
INSERT INTO "public"."prison_person" VALUES ('248', 'MARIA DELIA', 'ASITIMBAY PACHECO', '0300883311', null, null, 't', 'null', '81718', 'mujer', 'MJDHC-A-00024490', 'sentenciado');
INSERT INTO "public"."prison_person" VALUES ('249', 'LIDIA NATALIA', 'BENAVIDES MENECES', '0401374913', null, null, 't', 'null', '81719', 'mujer', 'MJDHC-A-00024491', 'sentenciado');
INSERT INTO "public"."prison_person" VALUES ('250', 'OSWALDO JAVIER', 'MOPOSITA SUPE', '1850224567', null, null, 't', 'null', '81490', 'hombre', 'MJDHC-A-00024290', 'preso');
INSERT INTO "public"."prison_person" VALUES ('253', 'JOSE EDUARDO', 'SEGOVIA PEÑA', '0103826731', null, null, 't', null, null, null, null, null);
INSERT INTO "public"."prison_person" VALUES ('298', 'JUAN FRANCISCO', 'SIMISTERRA PADILLA', '0922168042', null, null, 't', null, '56227', 'hombre', 'MJDHC-A-00000301', 'free');
INSERT INTO "public"."prison_person" VALUES ('437', 'LEONARDO ISRAEL', 'INTRIAGO MARTINEZ', '0928481795', null, null, 't', 'enfermo', '55984', 'hombre', 'MJDHC-A-00000064', 'free');
INSERT INTO "public"."prison_person" VALUES ('438', 'JOSE ANTONIO', 'CAMACHO TOBAR', '0914494620', null, null, 't', 'irracible', '55972', 'hombre', 'MJDHC-A-00000052', 'free');
INSERT INTO "public"."prison_person" VALUES ('439', 'BRAULIO', 'YUNDA VILEMA', '0922513080', null, null, 't', null, '56245', 'hombre', 'MJDHC-A-00000319', 'sentenciado');
INSERT INTO "public"."prison_person" VALUES ('440', 'DILSON EDUARDO', 'MENDOZA TUAREZ', '1722450812', null, null, 't', null, '57232', 'hombre', 'MJDHC-A-00001297', 'procesado');
INSERT INTO "public"."prison_person" VALUES ('441', 'JORGE CRISTOBAL', 'GILER MUÑOZ', '1722491485', null, null, 't', null, '58703', 'hombre', 'MJDHC-A-00002754', 'procesado');
INSERT INTO "public"."prison_person" VALUES ('442', 'ANGEL ISMAEL', 'ORTEGA PRECIADO', '0909971723', null, null, 't', null, '58484', 'hombre', 'MJDHC-A-00002537', 'sentenciado');
INSERT INTO "public"."prison_person" VALUES ('443', 'DANIEL FERNANDO', 'ESTUPIÑAN CEDEÑO', '0918323924', null, null, 't', null, '56169', 'hombre', 'MJDHC-A-00000245', 'procesado');
INSERT INTO "public"."prison_person" VALUES ('444', 'WILSON ABAD', 'VERA CRESPO', '0930010236', null, null, 't', null, '56220', 'hombre', 'MJDHC-A-00000294', 'procesado');
INSERT INTO "public"."prison_person" VALUES ('445', 'test', 'aaa', '12222222', null, null, 't', null, null, null, null, null);
INSERT INTO "public"."prison_person" VALUES ('446', 'JAIRON MIGUEL', 'MONAGA SEVILLANO', '1722096318', null, null, 't', null, '58385', 'hombre', 'MJDHC-A-00002441', 'sentenciado');
INSERT INTO "public"."prison_person" VALUES ('447', 'FRANKLIN ESTALIN', 'MALAVE GUERRERO', '1725196222', null, null, 't', null, '59456', 'hombre', 'MJDHC-A-00003485', 'procesado');

-- ----------------------------
-- Table structure for profile
-- ----------------------------
DROP TABLE IF EXISTS "public"."profile";
CREATE TABLE "public"."profile" (
"prfle_id" int4 DEFAULT nextval('profile_prfle_id_seq'::regclass) NOT NULL,
"rol_id" int4,
"prfle_description" varchar(200) COLLATE "default",
"prfle_state" char(1) COLLATE "default",
"create_date" date,
"write_date" date,
"write_idu" int4,
"create_idu" int4
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of profile
-- ----------------------------
INSERT INTO "public"."profile" VALUES ('1', '1', 'Administrador', 't', null, null, null, null);
INSERT INTO "public"."profile" VALUES ('2', '1', 'Analista', 't', null, null, null, null);
INSERT INTO "public"."profile" VALUES ('3', '1', 'Director Crs', 't', null, null, null, null);
INSERT INTO "public"."profile" VALUES ('4', '1', 'SubdirectorTécnico Planta Central ', 't', null, null, null, null);
INSERT INTO "public"."profile" VALUES ('5', '1', 'SUBDIRECCIÓN TÉCNICA DE REHABILITACIÓN SOCIAL', 't', null, null, null, null);
INSERT INTO "public"."profile" VALUES ('6', '1', 'Asesor', 't', null, null, null, null);
INSERT INTO "public"."profile" VALUES ('7', '1', 'SUBDIRECCIÓN TÉCNICA DE PROTECCIÓN Y SEGURIDAD PENITENCIARIA', 't', null, null, null, null);
INSERT INTO "public"."profile" VALUES ('9', '1', 'DIRECCÍON TÉCNICA DE RÉGIMEN CERRADO', 't', null, null, null, null);

-- ----------------------------
-- Table structure for profile_saved
-- ----------------------------
DROP TABLE IF EXISTS "public"."profile_saved";
CREATE TABLE "public"."profile_saved" (
"prfl_saved_id" int4 DEFAULT nextval('profile_saved_prfl_saved_id'::regclass) NOT NULL,
"usr_id" int4,
"menu_description_id" int4,
"prfl_saved_state" char(1) COLLATE "default"
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of profile_saved
-- ----------------------------
INSERT INTO "public"."profile_saved" VALUES ('1', '4', '2', 't');
INSERT INTO "public"."profile_saved" VALUES ('2', '4', '5', 't');
INSERT INTO "public"."profile_saved" VALUES ('3', '4', '6', 't');
INSERT INTO "public"."profile_saved" VALUES ('4', '3', '1', 't');
INSERT INTO "public"."profile_saved" VALUES ('5', '3', '2', 't');
INSERT INTO "public"."profile_saved" VALUES ('6', '3', '3', 't');
INSERT INTO "public"."profile_saved" VALUES ('7', '3', '4', 't');
INSERT INTO "public"."profile_saved" VALUES ('8', '3', '5', 't');
INSERT INTO "public"."profile_saved" VALUES ('9', '3', '6', 't');
INSERT INTO "public"."profile_saved" VALUES ('10', '3', '7', 't');
INSERT INTO "public"."profile_saved" VALUES ('11', '2', '2', 't');
INSERT INTO "public"."profile_saved" VALUES ('12', '1', '2', 't');
INSERT INTO "public"."profile_saved" VALUES ('13', '3', '8', 't');
INSERT INTO "public"."profile_saved" VALUES ('14', '13', '9', 't');
INSERT INTO "public"."profile_saved" VALUES ('15', '6', '9', 't');
INSERT INTO "public"."profile_saved" VALUES ('16', '3', '11', 't');
INSERT INTO "public"."profile_saved" VALUES ('17', '3', '9', 't');
INSERT INTO "public"."profile_saved" VALUES ('18', '3', '10', 't');
INSERT INTO "public"."profile_saved" VALUES ('20', '8', '18', 't');
INSERT INTO "public"."profile_saved" VALUES ('21', '3', '13', 't');
INSERT INTO "public"."profile_saved" VALUES ('22', '1', '8', 't');
INSERT INTO "public"."profile_saved" VALUES ('23', '1', '14', 't');
INSERT INTO "public"."profile_saved" VALUES ('24', '1', '16', 't');
INSERT INTO "public"."profile_saved" VALUES ('25', '1', '15', 't');
INSERT INTO "public"."profile_saved" VALUES ('26', '9', '2', 't');
INSERT INTO "public"."profile_saved" VALUES ('27', '9', '8', 't');
INSERT INTO "public"."profile_saved" VALUES ('28', '9', '14', 't');
INSERT INTO "public"."profile_saved" VALUES ('29', '9', '16', 't');
INSERT INTO "public"."profile_saved" VALUES ('30', '9', '15', 't');
INSERT INTO "public"."profile_saved" VALUES ('31', '2', '4', 't');
INSERT INTO "public"."profile_saved" VALUES ('32', '10', '2', 't');
INSERT INTO "public"."profile_saved" VALUES ('33', '4', '1', 't');
INSERT INTO "public"."profile_saved" VALUES ('34', '5', '2', 't');
INSERT INTO "public"."profile_saved" VALUES ('35', '5', '10', 't');
INSERT INTO "public"."profile_saved" VALUES ('37', '2', '13', 't');
INSERT INTO "public"."profile_saved" VALUES ('38', '4', '13', 't');
INSERT INTO "public"."profile_saved" VALUES ('39', '10', '3', 't');
INSERT INTO "public"."profile_saved" VALUES ('40', '10', '13', 't');
INSERT INTO "public"."profile_saved" VALUES ('41', '11', '2', 't');
INSERT INTO "public"."profile_saved" VALUES ('42', '11', '17', 't');
INSERT INTO "public"."profile_saved" VALUES ('43', '11', '13', 't');
INSERT INTO "public"."profile_saved" VALUES ('44', '12', '2', 't');
INSERT INTO "public"."profile_saved" VALUES ('45', '12', '7', 't');
INSERT INTO "public"."profile_saved" VALUES ('46', '13', '13', 't');
INSERT INTO "public"."profile_saved" VALUES ('48', '16', '2', 't');
INSERT INTO "public"."profile_saved" VALUES ('49', '16', '8', 't');
INSERT INTO "public"."profile_saved" VALUES ('50', '16', '14', 't');
INSERT INTO "public"."profile_saved" VALUES ('51', '16', '16', 't');
INSERT INTO "public"."profile_saved" VALUES ('52', '16', '15', 't');
INSERT INTO "public"."profile_saved" VALUES ('53', '17', '2', 't');
INSERT INTO "public"."profile_saved" VALUES ('54', '17', '8', 't');
INSERT INTO "public"."profile_saved" VALUES ('55', '17', '14', 't');
INSERT INTO "public"."profile_saved" VALUES ('56', '17', '16', 't');
INSERT INTO "public"."profile_saved" VALUES ('57', '17', '15', 't');
INSERT INTO "public"."profile_saved" VALUES ('58', '13', '2', 't');
INSERT INTO "public"."profile_saved" VALUES ('59', '9', '24', 't');

-- ----------------------------
-- Table structure for rol
-- ----------------------------
DROP TABLE IF EXISTS "public"."rol";
CREATE TABLE "public"."rol" (
"rol_id" int4 DEFAULT nextval('rol_rol_id_seq'::regclass) NOT NULL,
"rol_description" varchar(100) COLLATE "default",
"rol_state" char(1) COLLATE "default",
"create_idu" int4,
"create_date" date,
"write_date" date,
"write_idu" int4
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of rol
-- ----------------------------
INSERT INTO "public"."rol" VALUES ('1', 'CRUD', 't', null, null, null, null);
INSERT INTO "public"."rol" VALUES ('2', 'CRU', 't', null, null, null, null);
INSERT INTO "public"."rol" VALUES ('3', 'CR', 't', null, null, null, null);
INSERT INTO "public"."rol" VALUES ('4', 'C', 't', null, null, null, null);
INSERT INTO "public"."rol" VALUES ('5', 'R', 't', null, null, null, null);
INSERT INTO "public"."rol" VALUES ('6', 'RU', 't', null, null, null, null);

-- ----------------------------
-- Table structure for traslation_details
-- ----------------------------
DROP TABLE IF EXISTS "public"."traslation_details";
CREATE TABLE "public"."traslation_details" (
"trasl_det_id" int4 DEFAULT nextval('traslation_details_trasl_det_id_seq'::regclass) NOT NULL,
"trasl_id" int4,
"prison_per_id" int4,
"trasl_det_status" char(1) COLLATE "default"
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of traslation_details
-- ----------------------------
INSERT INTO "public"."traslation_details" VALUES ('168', '650', '56212', 't');
INSERT INTO "public"."traslation_details" VALUES ('170', '654', '56086', 't');
INSERT INTO "public"."traslation_details" VALUES ('171', '655', '56614', 't');
INSERT INTO "public"."traslation_details" VALUES ('172', '656', '268911', 't');
INSERT INTO "public"."traslation_details" VALUES ('173', '656', '81940', 't');
INSERT INTO "public"."traslation_details" VALUES ('174', '656', '81966', 't');
INSERT INTO "public"."traslation_details" VALUES ('175', '656', '83025', 't');
INSERT INTO "public"."traslation_details" VALUES ('176', '656', '83235', 't');
INSERT INTO "public"."traslation_details" VALUES ('177', '656', '83550', 't');
INSERT INTO "public"."traslation_details" VALUES ('178', '656', '268911', 't');
INSERT INTO "public"."traslation_details" VALUES ('179', '656', '81940', 't');
INSERT INTO "public"."traslation_details" VALUES ('180', '656', '81966', 't');
INSERT INTO "public"."traslation_details" VALUES ('181', '656', '83025', 't');
INSERT INTO "public"."traslation_details" VALUES ('182', '656', '83235', 't');
INSERT INTO "public"."traslation_details" VALUES ('183', '656', '83550', 't');
INSERT INTO "public"."traslation_details" VALUES ('184', '656', '268911', 't');
INSERT INTO "public"."traslation_details" VALUES ('185', '656', '81940', 't');
INSERT INTO "public"."traslation_details" VALUES ('186', '656', '81966', 't');
INSERT INTO "public"."traslation_details" VALUES ('187', '656', '83025', 't');
INSERT INTO "public"."traslation_details" VALUES ('188', '656', '83235', 't');
INSERT INTO "public"."traslation_details" VALUES ('189', '656', '83550', 't');
INSERT INTO "public"."traslation_details" VALUES ('190', '656', '268911', 't');
INSERT INTO "public"."traslation_details" VALUES ('191', '656', '81940', 't');
INSERT INTO "public"."traslation_details" VALUES ('192', '656', '81966', 't');
INSERT INTO "public"."traslation_details" VALUES ('193', '656', '83025', 't');
INSERT INTO "public"."traslation_details" VALUES ('194', '656', '83235', 't');
INSERT INTO "public"."traslation_details" VALUES ('195', '656', '83550', 't');
INSERT INTO "public"."traslation_details" VALUES ('196', '656', '268911', 't');
INSERT INTO "public"."traslation_details" VALUES ('197', '656', '81940', 't');
INSERT INTO "public"."traslation_details" VALUES ('198', '656', '81966', 't');
INSERT INTO "public"."traslation_details" VALUES ('199', '656', '83025', 't');
INSERT INTO "public"."traslation_details" VALUES ('200', '656', '83235', 't');
INSERT INTO "public"."traslation_details" VALUES ('201', '656', '83550', 't');
INSERT INTO "public"."traslation_details" VALUES ('202', '652', '83550', 't');
INSERT INTO "public"."traslation_details" VALUES ('203', '651', '81738', 't');
INSERT INTO "public"."traslation_details" VALUES ('204', '651', '81612', 't');
INSERT INTO "public"."traslation_details" VALUES ('205', '651', '81631', 't');
INSERT INTO "public"."traslation_details" VALUES ('206', '651', '81501', 't');
INSERT INTO "public"."traslation_details" VALUES ('207', '651', '81566', 't');
INSERT INTO "public"."traslation_details" VALUES ('208', '651', '81473', 't');
INSERT INTO "public"."traslation_details" VALUES ('209', '651', '81507', 't');
INSERT INTO "public"."traslation_details" VALUES ('210', '651', '81491', 't');
INSERT INTO "public"."traslation_details" VALUES ('211', '651', '81589', 't');
INSERT INTO "public"."traslation_details" VALUES ('212', '651', '81004', 't');
INSERT INTO "public"."traslation_details" VALUES ('213', '651', '81738', 't');
INSERT INTO "public"."traslation_details" VALUES ('214', '651', '81727', 't');
INSERT INTO "public"."traslation_details" VALUES ('215', '651', '81729', 't');
INSERT INTO "public"."traslation_details" VALUES ('216', '651', '81631', 't');
INSERT INTO "public"."traslation_details" VALUES ('217', '651', '81655', 't');
INSERT INTO "public"."traslation_details" VALUES ('218', '651', '81718', 't');
INSERT INTO "public"."traslation_details" VALUES ('219', '651', '81719', 't');
INSERT INTO "public"."traslation_details" VALUES ('220', '651', '81490', 't');
INSERT INTO "public"."traslation_details" VALUES ('221', '657', '81718', 't');
INSERT INTO "public"."traslation_details" VALUES ('222', '660', '56227', 't');
INSERT INTO "public"."traslation_details" VALUES ('223', '664', '81612', 't');
INSERT INTO "public"."traslation_details" VALUES ('224', '667', '81966', 't');
INSERT INTO "public"."traslation_details" VALUES ('225', '669', '56614', 't');
INSERT INTO "public"."traslation_details" VALUES ('226', '670', '55984', 't');
INSERT INTO "public"."traslation_details" VALUES ('227', '670', '55972', 't');
INSERT INTO "public"."traslation_details" VALUES ('228', '671', '56245', 't');
INSERT INTO "public"."traslation_details" VALUES ('229', '672', '57232', 't');
INSERT INTO "public"."traslation_details" VALUES ('230', '673', '58703', 't');
INSERT INTO "public"."traslation_details" VALUES ('231', '674', '58484', 't');
INSERT INTO "public"."traslation_details" VALUES ('232', '675', '56169', 't');
INSERT INTO "public"."traslation_details" VALUES ('233', '676', '56220', 't');
INSERT INTO "public"."traslation_details" VALUES ('234', '677', '58385', 't');
INSERT INTO "public"."traslation_details" VALUES ('235', '678', '58484', 't');
INSERT INTO "public"."traslation_details" VALUES ('236', '679', '59456', 't');

-- ----------------------------
-- Table structure for traslation_head
-- ----------------------------
DROP TABLE IF EXISTS "public"."traslation_head";
CREATE TABLE "public"."traslation_head" (
"trasl_id" int4 DEFAULT nextval('traslation_head_trasl_id_seq'::regclass) NOT NULL,
"usr_id" int4,
"trasl_type_id" int4,
"crs_id_source" int4,
"crs_id_destination" int4,
"trasl_date_request" date,
"trasl_descripcion" varchar(200) COLLATE "default",
"trasl_state_process" varchar(10) COLLATE "default",
"trasl_state" char(1) COLLATE "default",
"trasl_date_approved" date,
"trasl_date_confirm" date,
"trasl_path" varchar(255) COLLATE "default",
"trasl_observations_analyst" varchar(255) COLLATE "default",
"trasl_direction_assigned" int4,
"trasl_commentary_dir_pltactral" varchar(255) COLLATE "default",
"trasl_executed_by" int4,
"trasl_approved_by" int4,
"trasl_analyzed_by" int4,
"tras_date_analyst_send" date,
"trasl_authorized_by" int4,
"trasl_director_assigned" int4,
"trasl_date_authorized" date
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of traslation_head
-- ----------------------------
INSERT INTO "public"."traslation_head" VALUES ('650', '1', '4', '1', '7', '2019-10-04', ' test1', 'authorized', 't', '2019-10-17', null, 'View/documents/trabajo para examen sistemas operativos3.pdf', 'comentario', '2', 'test', null, '13', '2', '2019-10-10', '5', '13', '2019-10-17');
INSERT INTO "public"."traslation_head" VALUES ('651', '9', '4', '7', '1', '2019-10-04', ' test', 'revision', 't', null, null, 'View/documents/trabajo para examen sistemas operativos3.pdf', 'comentario Cris', null, null, null, null, '2', '2019-10-10', null, '13', null);
INSERT INTO "public"."traslation_head" VALUES ('652', '16', '4', '43', '7', '2019-10-04', ' pruebas', 'sent', 't', null, null, 'View/documents/trabajo para examen sistemas operativos3.pdf', null, null, null, null, null, null, null, null, null, null);
INSERT INTO "public"."traslation_head" VALUES ('653', '1', '5', '1', '4', '2019-10-05', ' iuuiu', 'sent', 't', null, null, 'View/documents/trabajo para examen sistemas operativos3.pdf', null, null, null, null, null, null, null, null, null, null);
INSERT INTO "public"."traslation_head" VALUES ('654', '1', '1', '1', '4', '2019-10-05', ' sas', 'sent', 't', null, null, 'View/documents/trabajo para examen sistemas operativos3.pdf', null, null, null, null, null, null, null, null, null, null);
INSERT INTO "public"."traslation_head" VALUES ('655', '1', '4', '1', '4', '2019-10-05', ' vbbb', 'revision', 't', null, null, 'View/documents/trabajo para examen sistemas operativos3.pdf', 'test', null, 'aprobado', null, null, '2', '2019-10-05', null, '13', null);
INSERT INTO "public"."traslation_head" VALUES ('656', '16', '4', '43', '7', '2019-10-06', ' test', 'sent', 't', null, null, 'View/documents/trabajo para examen sistemas operativos3.pdf', null, null, null, null, null, null, null, null, null, null);
INSERT INTO "public"."traslation_head" VALUES ('657', '9', '4', '7', '1', '2019-10-06', ' test', 'sent', 't', null, null, 'View/documents/trabajo para examen sistemas operativos3.pdf', null, null, null, null, null, null, null, null, null, null);
INSERT INTO "public"."traslation_head" VALUES ('658', '9', null, '7', null, '2019-10-06', null, 'start', 'f', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO "public"."traslation_head" VALUES ('659', '9', '4', '7', '2', '2019-10-07', ' Esta es una prueba desde Turi', 'sent', 't', null, null, 'View/documents/equipos.pdf', null, null, null, null, null, null, null, null, null, null);
INSERT INTO "public"."traslation_head" VALUES ('660', '9', '4', '7', '1', '2019-10-07', ' test', 'sent', 't', null, null, 'View/documents/trabajo para examen sistemas operativos3.pdf', null, null, null, null, null, null, null, null, null, null);
INSERT INTO "public"."traslation_head" VALUES ('661', '9', null, '7', null, '2019-10-07', null, 'start', 'f', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO "public"."traslation_head" VALUES ('662', '9', '5', '7', '2', '2019-10-07', ' Esta es una prueba desde Turi', 'sent', 't', null, null, 'View/documents/equipos.pdf', null, null, null, null, null, null, null, null, null, null);
INSERT INTO "public"."traslation_head" VALUES ('663', '9', '4', '7', '18', '2019-10-07', ' Esta es una prueba desde Turi', 'sent', 't', null, null, 'View/documents/equipos.pdf', null, null, null, null, null, null, null, null, null, null);
INSERT INTO "public"."traslation_head" VALUES ('664', '9', '6', '7', '19', '2019-10-07', ' Esta es una prueba desde Turi', 'sent', 't', null, null, 'View/documents/equipos.pdf', null, null, null, null, null, null, null, null, null, null);
INSERT INTO "public"."traslation_head" VALUES ('665', '9', '5', '7', '21', '2019-10-07', ' Esta es una prueba desde Turi', 'sent', 't', null, null, 'View/documents/equipos.pdf', null, null, null, null, null, null, null, null, null, null);
INSERT INTO "public"."traslation_head" VALUES ('666', '9', '6', '7', '26', '2019-10-08', ' Esta es una prueba desde Turi', 'sent', 't', null, null, 'View/documents/constancia_cai.pdf', null, null, null, null, null, null, null, null, null, null);
INSERT INTO "public"."traslation_head" VALUES ('667', '9', '6', '7', '18', '2019-10-08', ' Esta es una prueba desde Turi', 'sent', 't', null, null, 'View/documents/constancia_cai.pdf', null, null, null, null, null, null, null, null, null, null);
INSERT INTO "public"."traslation_head" VALUES ('668', '17', null, '64', null, '2019-10-10', null, 'start', 't', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO "public"."traslation_head" VALUES ('669', '9', '5', '7', '1', '2019-10-15', 'prueba', 'approved', 't', '2019-10-15', null, 'View/documents/trabajo para examen sistemas operativos3.pdf', 'comentario', null, 'ddd', null, '6', '4', '2019-10-15', null, '6', null);
INSERT INTO "public"."traslation_head" VALUES ('670', '9', '4', '7', '4', '2019-10-15', ' PROBANDO', 'executed', 't', '2019-10-15', null, 'View/documents/rmu_septiembre0568907001567528625.pdf', 'Seguro', '2', 'todo OK', '8', '13', '2', '2019-10-15', '5', '13', '2019-10-15');
INSERT INTO "public"."traslation_head" VALUES ('671', '9', '4', '7', '9', '2019-10-16', ' test', 'sent', 't', null, null, 'View/documents/trabajo para examen sistemas operativos3.pdf', null, null, null, null, null, null, null, null, null, null);
INSERT INTO "public"."traslation_head" VALUES ('672', '9', '3', '7', null, '2019-10-16', ' test', 'sent', 't', null, null, 'View/documents/trabajo para examen sistemas operativos3.pdf', null, null, null, null, null, null, null, null, null, null);
INSERT INTO "public"."traslation_head" VALUES ('673', '9', '2', '7', null, '2019-10-16', 'test', 'sent', 't', null, null, 'View/documents/trabajo para examen sistemas operativos3.pdf', null, null, null, null, null, null, null, null, null, null);
INSERT INTO "public"."traslation_head" VALUES ('674', '9', '1', '7', '4', '2019-10-16', 'test', 'sent', 't', null, null, 'View/documents/trabajo para examen sistemas operativos3.pdf', null, null, null, null, null, null, null, null, null, null);
INSERT INTO "public"."traslation_head" VALUES ('675', '9', '2', '7', null, '2019-10-16', 'e ', 'sent', 't', null, null, 'View/documents/trabajo para examen sistemas operativos3.pdf', null, null, null, null, null, null, null, null, null, null);
INSERT INTO "public"."traslation_head" VALUES ('676', '9', '1', '7', '11', '2019-10-16', ' s', 'sent', 't', null, null, 'View/documents/trabajo para examen sistemas operativos3.pdf', null, null, null, null, null, null, null, null, null, null);
INSERT INTO "public"."traslation_head" VALUES ('677', '9', '5', '7', '4', '2019-10-17', ' ss', 'sent', 't', null, null, 'View/documents/trabajo para examen sistemas operativos3.pdf', null, null, null, null, null, null, null, null, null, null);
INSERT INTO "public"."traslation_head" VALUES ('678', '9', '5', '7', '1', '2019-10-17', ' test', 'sent', 't', null, null, 'View/documents/trabajo para examen sistemas operativos3.pdf', null, null, null, null, null, null, null, null, null, null);
INSERT INTO "public"."traslation_head" VALUES ('679', '9', '5', '7', '32', '2019-10-17', 'test', 'sent', 't', null, null, 'View/documents/trabajo para examen sistemas operativos3.pdf', null, null, null, null, null, null, null, null, null, null);

-- ----------------------------
-- Table structure for traslation_type
-- ----------------------------
DROP TABLE IF EXISTS "public"."traslation_type";
CREATE TABLE "public"."traslation_type" (
"trasl_type_id" int4 DEFAULT nextval('traslation_type_trasl_type_id_seq'::regclass) NOT NULL,
"trasl_type_descripcion" varchar(50) COLLATE "default",
"trasl_type_state" char(1) COLLATE "default",
"area_id" int4
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of traslation_type
-- ----------------------------
INSERT INTO "public"."traslation_type" VALUES ('1', 'Orden Judicial', 't', '1');
INSERT INTO "public"."traslation_type" VALUES ('2', 'Seguridad', 't', '3');
INSERT INTO "public"."traslation_type" VALUES ('3', 'Salud', 't', '1');
INSERT INTO "public"."traslation_type" VALUES ('4', 'Cercanía Familiar', 't', '1');
INSERT INTO "public"."traslation_type" VALUES ('5', 'Hacinamiento', 't', '3');
INSERT INTO "public"."traslation_type" VALUES ('6', 'Separación', 't', '3');
INSERT INTO "public"."traslation_type" VALUES ('7', 'Madres con Niños Menores 36m', 't', '1');
INSERT INTO "public"."traslation_type" VALUES ('8', 'Todos', 'f', null);

-- ----------------------------
-- Table structure for ui_view
-- ----------------------------
DROP TABLE IF EXISTS "public"."ui_view";
CREATE TABLE "public"."ui_view" (
"ui_view_id" int4 DEFAULT nextval('ui_view_trasl_ui_view_id_seq'::regclass) NOT NULL,
"ui_view_description" varchar(250) COLLATE "default",
"ui_view_dom" text COLLATE "default",
"ui_view_state" char(1) COLLATE "default",
"prfle_id" int4
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of ui_view
-- ----------------------------
INSERT INTO "public"."ui_view" VALUES ('1', 'botones de desplazamiento', '<button id="btnFirstRecord">
        <li>
            <span class="glyphicon glyphicon-step-backward" aria-hidden="true"></span>
            <span class="glyphicon-class">Primer </span>
        </li>
    </button>
    <button id="btnBackwardRecord">
        <li>
            <span class="glyphicon glyphicon-fast-backward" aria-hidden="true"></span>
            <span class="glyphicon-class">Anterior</span>
        </li>
    </button>
    <button id="btnForwardRecord"> 
        <li>
            <span class="glyphicon glyphicon-fast-forward" aria-hidden="true"id=""></span>
            <span class="glyphicon-class">Siguiente</span>
        </li>
    </button>
    <button id="btnLastRecord">
        <li>
            <span class="glyphicon glyphicon-step-forward" aria-hidden="true"></span>
            <span class="glyphicon-class">Ultimo</span>
        </li>
    </button>', 't', '3');
INSERT INTO "public"."ui_view" VALUES ('2', 'combobox TipoTraslado', ' <label class="input col-md-4" style="margin-left: 5px;"   >
                            <input type="text" id="txt_trasl_type"  name="trasl_type_iew" readonly="" hidden="" />
                            <select id="trasl_type_id" name="trasl_type_id" required="" >
                                <option value="0">Selecionar Tipo de Traslados </option>
                            </select>
                        </label>
', 't', '3');
INSERT INTO "public"."ui_view" VALUES ('3', 'combobox CrsDestino', ' <label class="input col-md-4" style="margin-left: 5px;" >
                            <input  id="txt_crs_id_destination" name="txt_crs_id_destination" type="text" value="" readonly="" hidden="">
                            <select id="crs_id_destination" name="crs_id_destination"  >
                                <option value="0">Selecionar Crs </option>
                            </select>
                        </label>', 't', '3');

-- ----------------------------
-- Table structure for user_login
-- ----------------------------
DROP TABLE IF EXISTS "public"."user_login";
CREATE TABLE "public"."user_login" (
"usr_id" int4 DEFAULT nextval('user_login_usr_id_seq'::regclass) NOT NULL,
"prfle_id" int4,
"crs_id" int4,
"trasl_type_id" int4,
"usr_name" varchar(50) COLLATE "default",
"usr_lasname" varchar(50) COLLATE "default",
"usr_nick" varchar(50) COLLATE "default",
"usr_password" varchar(50) COLLATE "default",
"usr_state" char(1) COLLATE "default",
"area_id" int4,
"usr_email" varchar(255) COLLATE "default"
)
WITH (OIDS=FALSE)

;

-- ----------------------------
-- Records of user_login
-- ----------------------------
INSERT INTO "public"."user_login" VALUES ('1', '3', '1', '8', 'Mario Eduardo', 'Carrillo Rosero', 'mario.carrillo', 'Cotopaxi*2019', 't', null, 'mario.carrillo@atencionintegral.gob.ec');
INSERT INTO "public"."user_login" VALUES ('2', '2', '57', '4', 'Cristina ', 'Fierro', 'cristina', 'Cercania.2020', 't', '6', 'cristina.fierro@atencionintegral.gob.ec');
INSERT INTO "public"."user_login" VALUES ('3', '1', '57', '8', 'Victor H', 'Cozar', 'hugo.cozar', 'Asesor*2020', 't', null, 'victor.cozar@atencionintegral.gob.ec');
INSERT INTO "public"."user_login" VALUES ('4', '2', '57', '2', 'Valeria ', 'Balseca', 'valeria', '12345', 't', '5', 'valeria.balseca@atencionintegral.gob.ec');
INSERT INTO "public"."user_login" VALUES ('5', '5', '57', '8', 'Orlando Javier', 'Jácome Tello', 'orlando.jacome', 'Traslados*2020', 't', '2', 'orlando.jacome@atencionintegral.gob.ec');
INSERT INTO "public"."user_login" VALUES ('6', '4', '57', '8', 'Santiago Israel', 'Carrera Padilla', 'santiago', 'Seguridad.2019', 't', '3', 'santiago.carrera@atencionintegral.gob.ec');
INSERT INTO "public"."user_login" VALUES ('8', '4', '57', '8', 'Percy Alfredo', 'Pareja Vega ', 'percy.pareja', 'Operativos*2019', 't', '4', 'percy.pareja@atencionintegral.gob.ec');
INSERT INTO "public"."user_login" VALUES ('9', '3', '7', '8', 'Maria Belen ', 'Cabrera Aguirre ', 'maria.cabrera', 'Turi*2019', 't', null, 'maria.cabrera@atencionintegral.gob.ec');
INSERT INTO "public"."user_login" VALUES ('10', '2', '57', '3', 'Verónica', 'Tapia', 'veronica', 'Salud.2019', 't', '6', 'veronica.tapia@atencionintegral.gob.ec');
INSERT INTO "public"."user_login" VALUES ('11', '2', '57', '1', 'Roxana', 'Ollage', 'rossana', 'Sebele123', 't', '6', 'rossana.ollague@atencionintegral.gob.ec');
INSERT INTO "public"."user_login" VALUES ('12', '2', '57', '7', 'Andrea', 'Sánchez', 'andrea', 'Menores.2020', 't', '6', 'andrea.sanchez@atencionintegral.gob.ec');
INSERT INTO "public"."user_login" VALUES ('13', '9', '57', '8', 'Victor', 'Jacome', 'victor.jacome', 'Jacome.123', 't', '1', 'victor.jacome@atencionintegral.gob.ec');
INSERT INTO "public"."user_login" VALUES ('16', '3', '43', '8', 'Luz Marina', 'Bacigalupo', 'luz.bacigalupo', 'Crs4*2019', 't', null, 'luz.bacigalupo@atencionintegral.gob.ec');
INSERT INTO "public"."user_login" VALUES ('17', '3', '64', '8', 'Luis Reinaldo', 'Aguilar Mata', 'luis.aguilar', 'Regional*2019', 't', null, 'luis.aguilar@atencionintegral.gob.ec');

-- ----------------------------
-- View structure for history_traslation_ppl
-- ----------------------------
CREATE OR REPLACE VIEW "public"."history_traslation_ppl" AS 
 SELECT th.trasl_id,
    td.prison_per_id,
    ppl.prison_per_name,
    ppl.prison_per_lastname,
    crs.crs_id,
    crs.crs_description,
    ppl.prison_per_identification
   FROM (((traslation_head th
     JOIN traslation_details td ON ((th.trasl_id = td.trasl_id)))
     JOIN center_crs crs ON ((th.crs_id_destination = crs.crs_id)))
     JOIN prison_person ppl ON ((td.prison_per_id = ppl.id_sgp)))
  ORDER BY td.prison_per_id;

-- ----------------------------
-- Alter Sequences Owned By 
-- ----------------------------
ALTER SEQUENCE "public"."center_crs_crs_id_seq" OWNED BY "center_crs"."crs_id";
ALTER SEQUENCE "public"."file_document_file_id_seq" OWNED BY "file_document"."file_id";
ALTER SEQUENCE "public"."prison_person_prison_per_id_seq" OWNED BY "prison_person"."prison_per_id";
ALTER SEQUENCE "public"."profile_prfle_id_seq" OWNED BY "profile"."prfle_id";
ALTER SEQUENCE "public"."rol_rol_id_seq" OWNED BY "rol"."rol_id";
ALTER SEQUENCE "public"."traslation_head_trasl_id_seq" OWNED BY "traslation_head"."trasl_id";
ALTER SEQUENCE "public"."traslation_type_trasl_type_id_seq" OWNED BY "traslation_type"."trasl_type_id";
ALTER SEQUENCE "public"."user_login_usr_id_seq" OWNED BY "user_login"."usr_id";

-- ----------------------------
-- Indexes structure for table center_crs
-- ----------------------------
CREATE UNIQUE INDEX "center_crs_pk" ON "public"."center_crs" USING btree (crs_id);

-- ----------------------------
-- Primary Key structure for table center_crs
-- ----------------------------
ALTER TABLE "public"."center_crs" ADD PRIMARY KEY ("crs_id");

-- ----------------------------
-- Primary Key structure for table direction_area
-- ----------------------------
ALTER TABLE "public"."direction_area" ADD PRIMARY KEY ("area_id");

-- ----------------------------
-- Indexes structure for table file_document
-- ----------------------------
CREATE UNIQUE INDEX "file_document_pk" ON "public"."file_document" USING btree (file_id);
CREATE INDEX "traslationhead_filedocument_fk" ON "public"."file_document" USING btree (prison_per_id);

-- ----------------------------
-- Primary Key structure for table file_document
-- ----------------------------
ALTER TABLE "public"."file_document" ADD PRIMARY KEY ("file_id");

-- ----------------------------
-- Primary Key structure for table menu_objects
-- ----------------------------
ALTER TABLE "public"."menu_objects" ADD PRIMARY KEY ("menu_description_id");

-- ----------------------------
-- Indexes structure for table prison_person
-- ----------------------------
CREATE UNIQUE INDEX "prison_person_pk" ON "public"."prison_person" USING btree (prison_per_id);

-- ----------------------------
-- Uniques structure for table prison_person
-- ----------------------------
ALTER TABLE "public"."prison_person" ADD UNIQUE ("prison_per_identification");

-- ----------------------------
-- Primary Key structure for table prison_person
-- ----------------------------
ALTER TABLE "public"."prison_person" ADD PRIMARY KEY ("prison_per_id", "prison_per_identification");

-- ----------------------------
-- Indexes structure for table profile
-- ----------------------------
CREATE INDEX "fk_rol_profile_fk" ON "public"."profile" USING btree (rol_id);
CREATE UNIQUE INDEX "profile_pk" ON "public"."profile" USING btree (prfle_id);

-- ----------------------------
-- Primary Key structure for table profile
-- ----------------------------
ALTER TABLE "public"."profile" ADD PRIMARY KEY ("prfle_id");

-- ----------------------------
-- Primary Key structure for table profile_saved
-- ----------------------------
ALTER TABLE "public"."profile_saved" ADD PRIMARY KEY ("prfl_saved_id");

-- ----------------------------
-- Indexes structure for table rol
-- ----------------------------
CREATE UNIQUE INDEX "rol_pk" ON "public"."rol" USING btree (rol_id);

-- ----------------------------
-- Primary Key structure for table rol
-- ----------------------------
ALTER TABLE "public"."rol" ADD PRIMARY KEY ("rol_id");

-- ----------------------------
-- Primary Key structure for table traslation_details
-- ----------------------------
ALTER TABLE "public"."traslation_details" ADD PRIMARY KEY ("trasl_det_id");

-- ----------------------------
-- Indexes structure for table traslation_head
-- ----------------------------
CREATE INDEX "fk_crs_traslationhead_fk" ON "public"."traslation_head" USING btree (crs_id_source);
CREATE INDEX "fk_traslation_traslationtype_fk" ON "public"."traslation_head" USING btree (trasl_type_id);
CREATE INDEX "fk_usr_traslation_fk" ON "public"."traslation_head" USING btree (usr_id);
CREATE INDEX "pk_crs_traslation_fk" ON "public"."traslation_head" USING btree (crs_id_destination);
CREATE UNIQUE INDEX "traslation_head_pk" ON "public"."traslation_head" USING btree (trasl_id);

-- ----------------------------
-- Primary Key structure for table traslation_head
-- ----------------------------
ALTER TABLE "public"."traslation_head" ADD PRIMARY KEY ("trasl_id");

-- ----------------------------
-- Indexes structure for table traslation_type
-- ----------------------------
CREATE UNIQUE INDEX "traslation_type_pk" ON "public"."traslation_type" USING btree (trasl_type_id);

-- ----------------------------
-- Primary Key structure for table traslation_type
-- ----------------------------
ALTER TABLE "public"."traslation_type" ADD PRIMARY KEY ("trasl_type_id");

-- ----------------------------
-- Primary Key structure for table ui_view
-- ----------------------------
ALTER TABLE "public"."ui_view" ADD PRIMARY KEY ("ui_view_id");

-- ----------------------------
-- Indexes structure for table user_login
-- ----------------------------
CREATE INDEX "fk_traslationtype_userlogin_fk" ON "public"."user_login" USING btree (trasl_type_id);
CREATE INDEX "fk_usr_crs_fk" ON "public"."user_login" USING btree (crs_id);
CREATE UNIQUE INDEX "user_login_pk" ON "public"."user_login" USING btree (usr_id);
CREATE INDEX "user_profile_fk" ON "public"."user_login" USING btree (prfle_id);

-- ----------------------------
-- Foreign Key structure for table "public"."direction_area"
-- ----------------------------
ALTER TABLE "public"."direction_area" ADD FOREIGN KEY ("area_parent") REFERENCES "public"."direction_area" ("area_id") ON DELETE RESTRICT ON UPDATE RESTRICT;

-- ----------------------------
-- Foreign Key structure for table "public"."file_document"
-- ----------------------------
ALTER TABLE "public"."file_document" ADD FOREIGN KEY ("prison_per_id") REFERENCES "public"."prison_person" ("prison_per_id") ON DELETE RESTRICT ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Key structure for table "public"."profile"
-- ----------------------------
ALTER TABLE "public"."profile" ADD FOREIGN KEY ("rol_id") REFERENCES "public"."rol" ("rol_id") ON DELETE RESTRICT ON UPDATE RESTRICT;

-- ----------------------------
-- Foreign Key structure for table "public"."profile_saved"
-- ----------------------------
ALTER TABLE "public"."profile_saved" ADD FOREIGN KEY ("menu_description_id") REFERENCES "public"."menu_objects" ("menu_description_id") ON DELETE CASCADE ON UPDATE NO ACTION;
ALTER TABLE "public"."profile_saved" ADD FOREIGN KEY ("usr_id") REFERENCES "public"."user_login" ("usr_id") ON DELETE CASCADE ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Key structure for table "public"."traslation_details"
-- ----------------------------
ALTER TABLE "public"."traslation_details" ADD FOREIGN KEY ("trasl_id") REFERENCES "public"."traslation_head" ("trasl_id") ON DELETE RESTRICT ON UPDATE RESTRICT;

-- ----------------------------
-- Foreign Key structure for table "public"."traslation_head"
-- ----------------------------
ALTER TABLE "public"."traslation_head" ADD FOREIGN KEY ("trasl_analyzed_by") REFERENCES "public"."user_login" ("usr_id") ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE "public"."traslation_head" ADD FOREIGN KEY ("trasl_approved_by") REFERENCES "public"."user_login" ("usr_id") ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE "public"."traslation_head" ADD FOREIGN KEY ("trasl_executed_by") REFERENCES "public"."user_login" ("usr_id") ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE "public"."traslation_head" ADD FOREIGN KEY ("trasl_type_id") REFERENCES "public"."traslation_type" ("trasl_type_id") ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE "public"."traslation_head" ADD FOREIGN KEY ("usr_id") REFERENCES "public"."user_login" ("usr_id") ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE "public"."traslation_head" ADD FOREIGN KEY ("trasl_authorized_by") REFERENCES "public"."user_login" ("usr_id") ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE "public"."traslation_head" ADD FOREIGN KEY ("crs_id_destination") REFERENCES "public"."center_crs" ("crs_id") ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE "public"."traslation_head" ADD FOREIGN KEY ("trasl_director_assigned") REFERENCES "public"."user_login" ("usr_id") ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE "public"."traslation_head" ADD FOREIGN KEY ("crs_id_source") REFERENCES "public"."center_crs" ("crs_id") ON DELETE RESTRICT ON UPDATE RESTRICT;

-- ----------------------------
-- Foreign Key structure for table "public"."traslation_type"
-- ----------------------------
ALTER TABLE "public"."traslation_type" ADD FOREIGN KEY ("area_id") REFERENCES "public"."direction_area" ("area_id") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Key structure for table "public"."ui_view"
-- ----------------------------
ALTER TABLE "public"."ui_view" ADD FOREIGN KEY ("prfle_id") REFERENCES "public"."profile" ("prfle_id") ON DELETE RESTRICT ON UPDATE RESTRICT;

-- ----------------------------
-- Foreign Key structure for table "public"."user_login"
-- ----------------------------
ALTER TABLE "public"."user_login" ADD FOREIGN KEY ("area_id") REFERENCES "public"."direction_area" ("area_id") ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE "public"."user_login" ADD FOREIGN KEY ("trasl_type_id") REFERENCES "public"."traslation_type" ("trasl_type_id") ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE "public"."user_login" ADD FOREIGN KEY ("crs_id") REFERENCES "public"."center_crs" ("crs_id") ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE "public"."user_login" ADD FOREIGN KEY ("prfle_id") REFERENCES "public"."profile" ("prfle_id") ON DELETE RESTRICT ON UPDATE RESTRICT;
