USE [RegMex]
GO

/****** Object:  Table [dbo].[PPNRow]    Script Date: 03.12.2023 8:46:40 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[PPNRow](
	[id] [uniqueidentifier] NOT NULL,
	[LocalTime] [datetime] NOT NULL,
	[Unit_id] [uniqueidentifier] NOT NULL,
 CONSTRAINT [PK_PPNRow_id] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO

ALTER TABLE [dbo].[PPNRow] ADD  DEFAULT (newid()) FOR [id]
GO

ALTER TABLE [dbo].[PPNRow]  WITH CHECK ADD  CONSTRAINT [FK_PPNRow_TbUnit_id] FOREIGN KEY([Unit_id])
REFERENCES [dbo].[TbUnit] ([id])
GO

ALTER TABLE [dbo].[PPNRow] CHECK CONSTRAINT [FK_PPNRow_TbUnit_id]
GO


