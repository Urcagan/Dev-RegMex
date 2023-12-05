-- RegMex.dbo.UOMUnit definition

-- Drop table

-- DROP TABLE RegMex.dbo.UOMUnit;

CREATE TABLE RegMex.dbo.UOMUnit (
	id uniqueidentifier DEFAULT newid() NOT NULL,
	Name nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS NOT NULL,
	Description nvarchar(250) COLLATE SQL_Latin1_General_CP1_CI_AS NULL,
	Abbreviation nvarchar(100) COLLATE SQL_Latin1_General_CP1_CI_AS NULL,
	Factor float NOT NULL,
	deleted_at datetime NULL,
	CONSTRAINT PK_UOMUnit PRIMARY KEY (id)
);