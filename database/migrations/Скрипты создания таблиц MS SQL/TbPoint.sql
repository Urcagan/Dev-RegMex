USE [RegMex]
GO

/****** Object:  Table [dbo].[TbPoint]    Script Date: 03.12.2023 8:39:22 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[TbPoint](
	[id] [uniqueidentifier] NOT NULL,
	[Name] [nvarchar](100) NOT NULL,
	[Description] [nvarchar](250) NULL,
	[UOMUnit_id] [uniqueidentifier] NOT NULL,
	[Unit_id] [uniqueidentifier] NOT NULL,
	[deleted_at] [datetime] NULL,
 CONSTRAINT [PK_TbPoint] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO

ALTER TABLE [dbo].[TbPoint] ADD  DEFAULT (newid()) FOR [id]
GO

ALTER TABLE [dbo].[TbPoint]  WITH CHECK ADD  CONSTRAINT [tbpoint_tbunit_id_foreign] FOREIGN KEY([Unit_id])
REFERENCES [dbo].[TbUnit] ([id])
GO

ALTER TABLE [dbo].[TbPoint] CHECK CONSTRAINT [tbpoint_tbunit_id_foreign]
GO

ALTER TABLE [dbo].[TbPoint]  WITH CHECK ADD  CONSTRAINT [tbpoint_uonunit_id_foreign] FOREIGN KEY([UOMUnit_id])
REFERENCES [dbo].[UOMUnit] ([id])
GO

ALTER TABLE [dbo].[TbPoint] CHECK CONSTRAINT [tbpoint_uonunit_id_foreign]
GO


