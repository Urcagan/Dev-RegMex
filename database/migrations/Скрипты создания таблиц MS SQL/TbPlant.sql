USE [RegMex]
GO

SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

IF NOT EXISTS (SELECT * FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'dbo' AND  TABLE_NAME = 'TbPlant')
BEGIN

/****** Object:  Table [dbo].[plants]    Script Date: 12.11.2023 20:43:10 ******/

CREATE TABLE [dbo].[TbPlant](
	[id] [uniqueidentifier] NOT NULL,
	[Name] [nvarchar](50) NOT NULL,
	[Description] [nvarchar](120) NULL,
	[Complex_id] [uniqueidentifier] NOT NULL,
	[deleted_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]


ALTER TABLE [dbo].[TbPlant] ADD  DEFAULT (newid()) FOR [id]

ALTER TABLE [dbo].[TbPlant]  WITH CHECK ADD  CONSTRAINT [tbplant_tbcomplex_id_foreign] FOREIGN KEY([Complex_id])
REFERENCES [dbo].[TbComplex] ([id])

ALTER TABLE [dbo].[TbPlant] CHECK CONSTRAINT [tbplant_tbcomplex_id_foreign]

END

ELSE
	BEGIN
		PRINT N'Таблица уже существует.';
	END