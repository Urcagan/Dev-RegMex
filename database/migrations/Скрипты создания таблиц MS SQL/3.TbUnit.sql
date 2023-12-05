USE [RegMex]
GO

/****** Object:  Table [dbo].[TbPlant]    Script Date: 19.11.2023 20:26:10 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[TbUnit](
	[id] [uniqueidentifier] NOT NULL,
	[Name] [nvarchar](50) NOT NULL,
	[Description] [nvarchar](120) NULL,
	[Plant_id] [uniqueidentifier] NOT NULL,
	[deleted_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO

ALTER TABLE [dbo].[TbUnit] ADD  DEFAULT (newid()) FOR [id]
GO

ALTER TABLE [dbo].[TbUnit]  WITH CHECK ADD  CONSTRAINT [tbunit_tbplant_id_foreign] FOREIGN KEY([Plant_id])
REFERENCES [dbo].[TbPlant] ([id])
GO

ALTER TABLE [dbo].[TbUnit] CHECK CONSTRAINT [tbunit_tbplant_id_foreign]
GO


