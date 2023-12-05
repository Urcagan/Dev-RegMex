-- RegMex.dbo.TbPoint definition

-- Drop table

-- DROP TABLE RegMex.dbo.TbPoint;

CREATE TABLE RegMex.dbo.TbPoint (
	id uniqueidentifier DEFAULT newid() NOT NULL,
	Name nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	Description nvarchar(250) COLLATE SQL_Latin1_General_CP1_CI_AS NULL,
	UOMUnit_id uniqueidentifier NOT NULL,
	Unit_id uniqueidentifier NOT NULL,
	deleted_at datetime NULL,
	CONSTRAINT PK_TbPoint PRIMARY KEY (id)
);


-- RegMex.dbo.TbPoint foreign keys

ALTER TABLE RegMex.dbo.TbPoint ADD CONSTRAINT tbpoint_tbunit_id_foreign FOREIGN KEY (Unit_id) REFERENCES RegMex.dbo.TbUnit(id);
ALTER TABLE RegMex.dbo.TbPoint ADD CONSTRAINT tbpoint_uonunit_id_foreign FOREIGN KEY (UOMUnit_id) REFERENCES RegMex.dbo.UOMUnit(id);