USE [RegMex]
GO

/****** Object:  Table [dbo].[PPN_Value]    Script Date: 03.12.2023 8:47:14 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[PPN_Value](
	[Row_id] [uniqueidentifier] NOT NULL,
	[Point_id] [uniqueidentifier] NOT NULL,
	[Value] [float] NOT NULL,
 CONSTRAINT [PK_PPN_Val] PRIMARY KEY CLUSTERED 
(
	[Row_id] ASC,
	[Point_id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO

ALTER TABLE [dbo].[PPN_Value] ADD  DEFAULT ((0)) FOR [Value]
GO

ALTER TABLE [dbo].[PPN_Value]  WITH CHECK ADD  CONSTRAINT [FK_PPN_Val_PPNRow] FOREIGN KEY([Row_id])
REFERENCES [dbo].[PPNRow] ([id])
GO

ALTER TABLE [dbo].[PPN_Value] CHECK CONSTRAINT [FK_PPN_Val_PPNRow]
GO

ALTER TABLE [dbo].[PPN_Value]  WITH CHECK ADD  CONSTRAINT [FK_PPN_Val_TbPoint] FOREIGN KEY([Point_id])
REFERENCES [dbo].[TbPoint] ([id])
GO

ALTER TABLE [dbo].[PPN_Value] CHECK CONSTRAINT [FK_PPN_Val_TbPoint]
GO

EXEC sys.sp_addextendedproperty @name=N'MS_Description', @value=N'Таблица значений поизводства ППН' , @level0type=N'SCHEMA',@level0name=N'dbo', @level1type=N'TABLE',@level1name=N'PPN_Value'
GO


