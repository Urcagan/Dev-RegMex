USE [RegMex]
GO

/****** Object:  Table [dbo].[KGP_Value]    Script Date: 03.12.2023 8:44:40 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[KGP_Value](
	[Row_id] [uniqueidentifier] NOT NULL,
	[Point_id] [uniqueidentifier] NOT NULL,
	[Value] [float] NOT NULL,
 CONSTRAINT [PK_KGP_Val] PRIMARY KEY CLUSTERED 
(
	[Row_id] ASC,
	[Point_id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO

ALTER TABLE [dbo].[KGP_Value] ADD  DEFAULT ((0)) FOR [Value]
GO

ALTER TABLE [dbo].[KGP_Value]  WITH CHECK ADD  CONSTRAINT [FK_KGP_Val_KGPRow] FOREIGN KEY([Row_id])
REFERENCES [dbo].[KGPRow] ([id])
GO

ALTER TABLE [dbo].[KGP_Value] CHECK CONSTRAINT [FK_KGP_Val_KGPRow]
GO

ALTER TABLE [dbo].[KGP_Value]  WITH CHECK ADD  CONSTRAINT [FK_KGP_Val_TbPoint] FOREIGN KEY([Point_id])
REFERENCES [dbo].[TbPoint] ([id])
GO

ALTER TABLE [dbo].[KGP_Value] CHECK CONSTRAINT [FK_KGP_Val_TbPoint]
GO

EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'Хранение переменных' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'KGP_Value'
GO


