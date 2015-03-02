/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     25/02/2015 9:29:40                           */
/*==============================================================*/


drop table if exists BARANG;

drop table if exists JENIS_BARANG;

drop table if exists KRITIK_DAN_SARAN;

drop table if exists PEMINJAM;

drop table if exists USER;

/*==============================================================*/
/* Table: BARANG                                                */
/*==============================================================*/
create table BARANG
(
   BARANG_ID            int not null auto_increment,
   JENIS_BARANG_ID      int not null,
   KODE_BARANG          varchar(20) not null,
   MERK_BARANG          varchar(100),
   NAMA_BARANG          varchar(50),
   FOTO_BARANG          varchar(500),
   KONDISI              varchar(20),
   STATUS               varchar(20),
   TANGGAL_PEMBELIAN    date,
   primary key (BARANG_ID)
);

/*==============================================================*/
/* Table: JENIS_BARANG                                          */
/*==============================================================*/
create table JENIS_BARANG
(
   JENIS_BARANG_ID      int not null,
   JENIS_BARANG         varchar(50),
   primary key (JENIS_BARANG_ID)
);

/*==============================================================*/
/* Table: KRITIK_DAN_SARAN                                      */
/*==============================================================*/
create table KRITIK_DAN_SARAN
(
   KRITIK_DAN_SARAN_ID  int not null auto_increment,
   USER_ID              int not null,
   NAMA                 varchar(50),
   primary key (KRITIK_DAN_SARAN_ID)
);

/*==============================================================*/
/* Table: PEMINJAM                                              */
/*==============================================================*/
create table PEMINJAM
(
   PEMINJAM_ID          int not null auto_increment,
   USER_ID              int not null,
   BARANG_ID            int not null,
   TANGGAL_PINJAM       datetime,
   TANGGAL_KEMBALI      datetime,
   primary key (PEMINJAM_ID)
);

/*==============================================================*/
/* Table: USER                                                  */
/*==============================================================*/
create table USER
(
   USER_ID              int not null auto_increment,
   USERNAME             varchar(100) not null,
   PASSWORD             varchar(100) not null,
   NAMA                 varchar(50),
   KELAS                varchar(20) not null,
   JENIS_KELAMIN        varchar(15),
   NO_TELPON            numeric(8,0) not null,
   ALAMAT               varchar(200) not null,
   BANYAK_MEMINJAM      numeric(8,0),
   FOTO                 varchar(500),
   BACKGROUND           varchar(500),
   primary key (USER_ID)
);

alter table BARANG add constraint FK_RELATIONSHIP_2 foreign key (JENIS_BARANG_ID)
      references JENIS_BARANG (JENIS_BARANG_ID) on delete restrict on update restrict;

alter table KRITIK_DAN_SARAN add constraint FK_USER_KRITIK foreign key (USER_ID)
      references USER (USER_ID) on delete restrict on update restrict;

alter table PEMINJAM add constraint FK_PEMINJAM_BARANG foreign key (BARANG_ID)
      references BARANG (BARANG_ID) on delete restrict on update restrict;

alter table PEMINJAM add constraint FK_USER_PEMINJAM foreign key (USER_ID)
      references USER (USER_ID) on delete restrict on update restrict;

