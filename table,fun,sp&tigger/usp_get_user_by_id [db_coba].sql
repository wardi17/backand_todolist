
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
-- =============================================
-- Author:		<Author,,Name>
-- Create date: <Create Date,,>
-- Description:	<Description,,>
-- =============================================
CREATE PROCEDURE usp_get_user_by_id
	@tahun int
AS
BEGIN

	SET NOCOUNT ON;

	SELECT * FROM users
END
GO
EXEC usp_get_user_by_id 2025
