-- RegMex.dbo.KGPRow definition

-- Drop table

-- DROP TABLE RegMex.dbo.KGPRow;

CREATE TABLE RegMex.dbo.KGPRow (
	id uniqueidentifier DEFAULT newid() NOT NULL,
	LocalTime datetime NOT NULL,
	Unit_id uniqueidentifier NOT NULL,
	CONSTRAINT KGPRow_id_PK PRIMARY KEY (id)
);


-- RegMex.dbo.KGPRow foreign keys

ALTER TABLE RegMex.dbo.KGPRow ADD CONSTRAINT KGPRow_TbUnit_id_FK FOREIGN KEY (Unit_id) REFERENCES RegMex.dbo.TbUnit(id);