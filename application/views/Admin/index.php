<!doctype html>
<html lang="en">

	<head>
		<?php include "layout/header.php"?>"

	</head>

	<body>

		<!-- Page wrapper start -->
		<div class="page-wrapper">

			<!-- Sidebar wrapper start -->
			<?php include "layout/side.php"?>"
			<!-- Sidebar wrapper end -->

			<!-- Page content start  -->
			<div class="page-content">
                <div class="main-container">

					<!-- Header start -->
					<?php include "layout/head.php"?>
				<!-- Main container start -->
				
               <?=$content?>
			</div>
			<!-- Page content end -->

		</div>
		<!-- Page wrapper end -->

		
        <?php include "layout/footer.php"?>"
	</body>

</html>