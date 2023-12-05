-- RegMex.dbo.KGP_Value definition

-- Drop table

-- DROP TABLE RegMex.dbo.KGP_Value;

CREATE TABLE RegMex.dbo.KGP_Value (
	Row_id uniqueidentifier NOT NULL,
	Point_id uniqueidentifier NOT NULL,
	Value float DEFAULT 0 NOT NULL,
	CONSTRAINT PK_KGP_Val PRIMARY KEY (Row_id,Point_id)
);


-- RegMex.dbo.KGP_Value foreign keys

ALTER TABLE RegMex.dbo.KGP_Value ADD CONSTRAINT FK_KGP_Val_KGPRow FOREIGN KEY (Row_id) REFERENCES RegMex.dbo.KGPRow(id);
ALTER TABLE RegMex.dbo.KGP_Value ADD CONSTRAINT FK_KGP_Val_TbPoint FOREIGN KEY (Point_id) REFERENCES RegMex.dbo.TbPoint(id);