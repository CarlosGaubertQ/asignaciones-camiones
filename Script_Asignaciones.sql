/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     13-07-2021 21:24:11                          */
/*==============================================================*/


drop table if exists ASIGNACION;

drop table if exists EQUIPO;

drop table if exists ESTADO_EQUIPO;

drop table if exists FACULTAD;

drop table if exists FUNCIONARIO;

drop table if exists HISTORIAL_ASIGNACIONES;

drop table if exists MANTENCION;

drop table if exists PERFIL_EQUIPO;

drop table if exists PROGRAMA;

drop table if exists PROGRAMAFUNCIONARIO;

drop table if exists SEDE;

drop table if exists TIPO_FUNCIONARIO;

drop table if exists TIPO_PROGRAMA;

drop table if exists VARIOS;

/*==============================================================*/
/* Table: ASIGNACION                                            */
/*==============================================================*/
create table ASIGNACION
(
   ID_ASIGNACION        int not null auto_increment,
   ID_EQUIPO            int not null,
   ID_PROGRAMAFUNCIONARIO int,
   FECHAINICIO_ASIGNACION datetime,
   FECHAFINAL_ASIGNACION datetime,
   ESTADO_REASIGNACION  int,
   ELIMINADO_ASIGNACION int,
   USUARIO_ASIGNACION   varchar(255),
   MODIFICAR_ASIGNACION datetime,
   primary key (ID_ASIGNACION)
);

/*==============================================================*/
/* Table: EQUIPO                                                */
/*==============================================================*/
create table EQUIPO
(
   ID_EQUIPO            int not null auto_increment,
   ID_ESTADO            int not null,
   ID_PERFIL_EQUIPO     int,
   ID_SEDE              int not null,
   NOMBRE_EQUIPO        varchar(255),
   primary key (ID_EQUIPO)
);

/*==============================================================*/
/* Table: ESTADO_EQUIPO                                         */
/*==============================================================*/
create table ESTADO_EQUIPO
(
   ID_ESTADO            int not null auto_increment,
   NOMBRE_ESTADO        varchar(255),
   ELIMINAR_ESTADO      varchar(255),
   USUARIO_ESTADO       varchar(255),
   MODIFICAR_ESTADO     datetime,
   primary key (ID_ESTADO)
);

/*==============================================================*/
/* Table: FACULTAD                                              */
/*==============================================================*/
create table FACULTAD
(
   ID_FACULTAD          int not null auto_increment,
   ID_SEDE              int not null,
   NOMBRE_FACULTAD      varchar(255),
   primary key (ID_FACULTAD)
);

/*==============================================================*/
/* Table: FUNCIONARIO                                           */
/*==============================================================*/
create table FUNCIONARIO
(
   RUT_FUNCIONARIO      varchar(255) not null,
   ID_TIPO_FUNCIONARIO  int not null,
   PRIMERNOMBRE_FUNCIONARIO varchar(255),
   SEGUNDONOMBRE_FUNCIONARIO varchar(255),
   PRIMERAPELLIDO_FUNCIONARIO varchar(255),
   SEGUNDOAPELLIDO_FUNCIONARIO varchar(255),
   primary key (RUT_FUNCIONARIO)
);

/*==============================================================*/
/* Table: HISTORIAL_ASIGNACIONES                                */
/*==============================================================*/
create table HISTORIAL_ASIGNACIONES
(
   ID_HISTORIAL         int not null auto_increment,
   ID_ASIGNACION        int not null,
   FECHA_INICIO_HISTORIAL datetime,
   FECHA_TERMINO_HISTORIAL datetime,
   primary key (ID_HISTORIAL)
);

/*==============================================================*/
/* Table: MANTENCION                                            */
/*==============================================================*/
create table MANTENCION
(
   ID_MANTENCION        int not null auto_increment,
   ID_EQUIPO            int,
   DESCRIPCION_MANTENCION varchar(255),
   DIAGNOSTICOTECNICO_MANTENCION varchar(255),
   FECHAINICIO_MANTENCION datetime,
   FECHAFIN_MANTENCION  datetime,
   ELIMINAR_MANTENCION  int,
   USUARIO_MANTENCION   varchar(255),
   MODIFICAR_MANTENCION datetime,
   primary key (ID_MANTENCION)
);

/*==============================================================*/
/* Table: PERFIL_EQUIPO                                         */
/*==============================================================*/
create table PERFIL_EQUIPO
(
   ID_PERFIL_EQUIPO     int not null auto_increment,
   ID_VARIOS            int,
   GABINETE             varchar(255),
   CPU                  varchar(255),
   RAM                  varchar(255),
   VIDEO                varchar(255),
   MONITOR              varchar(255),
   DISCO_DURO           varchar(255),
   UNIDADES             varchar(255),
   MOUSE                varchar(255),
   PAD                  varchar(255),
   TECLADO              varchar(255),
   PUERTOS              varchar(255),
   primary key (ID_PERFIL_EQUIPO)
);

/*==============================================================*/
/* Table: PROGRAMA                                              */
/*==============================================================*/
create table PROGRAMA
(
   ID_PROGRAMA          int not null auto_increment,
   ID_FACULTAD          int not null,
   ID_TIPO_PROGRAMA     int not null,
   NOMBRE_PROGRAMA      varchar(255),
   primary key (ID_PROGRAMA)
);

/*==============================================================*/
/* Table: PROGRAMAFUNCIONARIO                                   */
/*==============================================================*/
create table PROGRAMAFUNCIONARIO
(
   ID_PROGRAMAFUNCIONARIO int not null auto_increment,
   ID_PROGRAMA          int,
   RUT_FUNCIONARIO      varchar(255),
   FECHAINGRESO_PROGRAMAFUNCIONARIO datetime,
   FECHASALIDA_PROGRAMAFUNCIONARIO datetime,
   primary key (ID_PROGRAMAFUNCIONARIO)
);

/*==============================================================*/
/* Table: SEDE                                                  */
/*==============================================================*/
create table SEDE
(
   ID_SEDE              int not null auto_increment,
   NOMBRE_SEDE          varchar(255),
   primary key (ID_SEDE)
);

/*==============================================================*/
/* Table: TIPO_FUNCIONARIO                                      */
/*==============================================================*/
create table TIPO_FUNCIONARIO
(
   ID_TIPO_FUNCIONARIO  int not null auto_increment,
   NOMBRE_TIPO_FUNCIONARIO varchar(255),
   primary key (ID_TIPO_FUNCIONARIO)
);

/*==============================================================*/
/* Table: TIPO_PROGRAMA                                         */
/*==============================================================*/
create table TIPO_PROGRAMA
(
   ID_TIPO_PROGRAMA     int not null auto_increment,
   NOMBRE_TIPO_PROGRAMA varchar(255),
   primary key (ID_TIPO_PROGRAMA)
);

/*==============================================================*/
/* Table: VARIOS                                                */
/*==============================================================*/
create table VARIOS
(
   ID_VARIOS            int not null auto_increment,
   NOMBRE_VARIOS        varchar(255),
   primary key (ID_VARIOS)
);

alter table ASIGNACION add constraint FK_RELATIONSHIP_11 foreign key (ID_PROGRAMAFUNCIONARIO)
      references PROGRAMAFUNCIONARIO (ID_PROGRAMAFUNCIONARIO) on delete restrict on update restrict;

alter table ASIGNACION add constraint FK_RELATIONSHIP_8 foreign key (ID_EQUIPO)
      references EQUIPO (ID_EQUIPO) on delete restrict on update restrict;

alter table EQUIPO add constraint FK_RELATIONSHIP_1 foreign key (ID_PERFIL_EQUIPO)
      references PERFIL_EQUIPO (ID_PERFIL_EQUIPO) on delete restrict on update restrict;

alter table EQUIPO add constraint FK_RELATIONSHIP_13 foreign key (ID_ESTADO)
      references ESTADO_EQUIPO (ID_ESTADO) on delete restrict on update restrict;

alter table FACULTAD add constraint FK_RELATIONSHIP_5 foreign key (ID_SEDE)
      references SEDE (ID_SEDE) on delete restrict on update restrict;

alter table FUNCIONARIO add constraint FK_FUNCIONARIO_TIENE_UN_TIPO_FUNCIONARIO foreign key (ID_TIPO_FUNCIONARIO)
      references TIPO_FUNCIONARIO (ID_TIPO_FUNCIONARIO) on delete restrict on update restrict;

alter table HISTORIAL_ASIGNACIONES add constraint FK_REGISTRA foreign key (ID_ASIGNACION)
      references ASIGNACION (ID_ASIGNACION) on delete restrict on update restrict;

alter table MANTENCION add constraint FK_PUEDE_REQUERIR foreign key (ID_EQUIPO)
      references EQUIPO (ID_EQUIPO) on delete restrict on update restrict;

alter table PERFIL_EQUIPO add constraint FK_TIENE foreign key (ID_VARIOS)
      references VARIOS (ID_VARIOS) on delete restrict on update restrict;

alter table PROGRAMA add constraint FK_PERTENECE_PF foreign key (ID_FACULTAD)
      references FACULTAD (ID_FACULTAD) on delete restrict on update restrict;

alter table PROGRAMA add constraint FK_PERTENECE_PT foreign key (ID_TIPO_PROGRAMA)
      references TIPO_PROGRAMA (ID_TIPO_PROGRAMA) on delete restrict on update restrict;

alter table PROGRAMAFUNCIONARIO add constraint FK_TIENEN foreign key (RUT_FUNCIONARIO)
      references FUNCIONARIO (RUT_FUNCIONARIO) on delete restrict on update restrict;

alter table PROGRAMAFUNCIONARIO add constraint FK_TIENEN_PF foreign key (ID_PROGRAMA)
      references PROGRAMA (ID_PROGRAMA) on delete restrict on update restrict;




/*Población de datos */
INSERT INTO SEDE (NOMBRE_SEDE) VALUES('Concepción'),('Chillan');

INSERT INTO FACULTAD (ID_SEDE, NOMBRE_FACULTAD) VALUES(1, 'Facultad de Ingenieria'),(2, 'Facultad de Ingenieria');

INSERT INTO TIPO_PROGRAMA (NOMBRE_TIPO_PROGRAMA) VALUES('Ingenieria'),('Medicina');

INSERT INTO PROGRAMA (ID_FACULTAD, ID_TIPO_PROGRAMA, NOMBRE_PROGRAMA) VALUES(1,1,'Matematica aplicada'),(2,2,'Anatomía');

INSERT INTO TIPO_FUNCIONARIO (NOMBRE_TIPO_FUNCIONARIO) VALUES('Docente');

INSERT INTO FUNCIONARIO (RUT_FUNCIONARIO, ID_TIPO_FUNCIONARIO, PRIMERNOMBRE_FUNCIONARIO, SEGUNDONOMBRE_FUNCIONARIO, PRIMERAPELLIDO_FUNCIONARIO, SEGUNDOAPELLIDO_FUNCIONARIO) VALUES('15648645-4', 1, 'Profesor concepcion',  "", "", ""), ('15234234-3', 1, 'Profesor chillan', "", "", ""); 

INSERT INTO PROGRAMAFUNCIONARIO (ID_PROGRAMA, RUT_FUNCIONARIO, FECHAINGRESO_PROGRAMAFUNCIONARIO, FECHASALIDA_PROGRAMAFUNCIONARIO) VALUES(1, '15648645-4', '2021-03-10', '2021-08-19'),(2, '15234234-3', '2021-03-10', '2021-08-19');

INSERT INTO ESTADO_EQUIPO (NOMBRE_ESTADO) VALUES('Inhabilitado'),('Disponible'),('Asignado'),('Mantención');

INSERT INTO VARIOS (NOMBRE_VARIOS) VALUES('Red 10/100/1000 incorporada, Sonido integrado en MB, sin parlantes, Certificación Energy Star, Epeat.'),('Sonido integrado en MB, sin parlantes, Certificación Energy Star, Epeat.'), ('Bolso de transporte clásico, resistente (tipo maletin y material de nylon). Cable de Seguridad Kensington "con Llave". Mini-Mouse óptico usb. Pad.');

INSERT INTO PERFIL_EQUIPO (ID_VARIOS, GABINETE, CPU, RAM, VIDEO, MONITOR, DISCO_DURO, UNIDADES, MOUSE, PAD, TECLADO, PUERTOS)
VALUES (1,'MicroATX / ATX, color negro.', 'Familia Intel I5-6xxx (CPU equivalente o superior)', '8GB DDR4', 'Nvidia GTX 750 Ti 2GB, puertos de salida: DVI, DP o HDMI', 'LED 23” Wide, Full HD, cable incluido (conector entrada: DVI, DP, o HDMI), LG/Samsung/Viewsonic o propio de la marca.', '500GB, SATA3, 7200 rpm. (o superior)', 'DVD +/- RW, color negro.', 'USB óptico, 2 botones más scroll, negro.', 'Pad Mouse', 'USB, español, color negro.', NULL),(2,'MicroATX / ATX, color negro.', 'Familia Intel I7-6xxx (CPU equivalente o superior)', '8GB DDR4', 'Nvidia GTX 750 Ti 2GB, puertos de salida: DVI, DP o HDMI', 'LED 23” Wide, Full HD, cable incluido (conector entrada: DVI, DP, o HDMI), LG/Samsung/Viewsonic o propio de la marca.', '500GB, SATA3, 7200 rpm. (o superior)', 'DVD +/- RW, color negro.', 'USB óptico, 2 botones más scroll, negro.', 'Pad Mouse', 'USB, español, color negro. Red 10/100/1000 incorporada', NULL), (3, NULL, 'Familia Intel I5-7XXX (CPU equivalente o superior)', '8GB DDR3', 'Nvidia Geforce 820M o superior', 'LED, 14 o 15” pulgadas, Antiglare, HD', '1TB, 5400/7200rpm SATA WI-FI b/g/n o superior, BLUETOOTH 4,0 o superior, LAN 10/100/1000', 'DVD±RW', NULL, NULL,NULL, '3 USB 2.0 o superior, HDMI, VGA (opcional), Jack de audífono y micrófono');


INSERT INTO EQUIPO (ID_ESTADO,ID_PERFIL_EQUIPO, ID_SEDE ,NOMBRE_EQUIPO) 
VALUES
(2,1, 1,'Concepción-1'),
(2,1, 1,'Concepción-2'),
(2,1, 1,'Concepción-3'),
(2,1, 1,'Concepción-4'),
(2,1, 1,'Concepción-5'),
(2,2, 1,'Concepción-6'),
(2,2, 1,'Concepción-7'),
(2,2, 2,'Chillan-1'),
(2,2, 2,'Chillan-2'),
(2,2, 2,'Chillan-3'),
(2,3, 2,'Chillan-4'),
(2,3, 2,'Chillan-5'),
(2,3, 2,'Chillan-6'),
(2,3, 2,'Chillan-7'),
(2,3, 2,'Chillan-8');