USE [ReportVNPZ]
GO
/****** Object:  StoredProcedure [dbo].[sp_WriteDateTimeRow]    Script Date: 03.01.2024 9:13:50 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
/****** Object:  StoredProcedure [dbo].[sp_WriteDateTimeRow]    Script Date: 28.12.2023 14:58:54 ******/
-- =============================================
-- Принимает строку с данными в формате XML в переменную @xml
-- Пример строки 
	/**'
	<Points>
		<Point>
			<Plant>3001</Plant>
			<Tag>FT-2</Tag>
			<DataTimeRow>2022-12-28 21:32:03.453</DataTimeRow>
			<MatBalValue>
				<All>3456.35</All>
				<Day>346</Day>
				<Month>97877</Month>
			</MatBalValue>
		</Point>
	</Points>
	'
	**/
-- Записываем данные в таблицу и получаем ID новой строки
-- =============================================
-- Author:		<Author,VystropovDV>
-- Create date: <Create Date,28.12.2023,>
-- Description:	<Description, Запись в времени события и получение ID записи ,>
-- =============================================
ALTER PROCEDURE [dbo].[sp_WriteDateTimeRow]
	@xml XML,
	@ID uniqueidentifier OUT
AS 
	DECLARE @DateTime as datetime
	DECLARE @Plant_id as uniqueidentifier
	SET @ID = newid()
	SET @DateTime = (SELECT CONVERT (DATETIME,  x.value('(DataTimeRow/text())[1]', 'VARCHAR(255)'), 120) AS DateTimeRow	FROM @xml.nodes('/Points/Point') AS T(x))
	SET @Plant_id = (SELECT Plant.ID FROM ReportVNPZ.dbo.Plant Plant WHERE Plant.Name = (SELECT x.value('(Plant/text())[1]','VARCHAR(250)')FROM @xml.nodes('/Points/Point') AS T(x)))
	INSERT INTO ReportVNPZ.dbo.DateTimeRow ( ID, [DateTime] , Plant_id  )
	VALUES (@ID, @DateTime, @Plant_id)