USE [RegMex]
GO

/****** Object:  Table [dbo].[TDTableDefinition]    Script Date: 21.11.2023 16:46:17 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[TDTableDefinition](
	[ObjectId] [uniqueidentifier] NOT NULL,
	[deleted_at] [datetime] NULL,
	[CreationDate] [datetime] NOT NULL DEFAULT (getdate()),
	[Name] [nvarchar](100) NOT NULL,
 CONSTRAINT [PK_TDTableDefinition] PRIMARY KEY NONCLUSTERED 
(
	[ObjectId] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
