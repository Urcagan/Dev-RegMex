USE [RegMex]
GO

/****** Object:  Table [dbo].[UOMUnit]    Script Date: 21.11.2023 16:35:47 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[UOMUnit](
	[ObjectId] [uniqueidentifier] NOT NULL DEFAULT (newid()),
	[deleted_at] [datetime] NULL,
	[CreationDate] [datetime] NOT NULL DEFAULT (getdate()),
	[Name] [nvarchar](100) NOT NULL,
	[Description] [nvarchar](250) NULL,
	[Abbreviation] [nvarchar](100) NULL,
	[Factor] [float] NOT NULL,
 CONSTRAINT [PK_UOMUnit] PRIMARY KEY NONCLUSTERED 
(
	[ObjectId] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
