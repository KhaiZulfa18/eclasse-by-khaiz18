<div class="col-12 float-right">
	<nav class="d-inline-block">
		<ul class="pagination">
			<?php
			$showPage = 0;
			if ($noPage > 1) echo  "<li class='page-item active'><a class='page-link' href='javascript:void(0)' onClick=\"getTweet('".($noPage-1)."')\" >Prev Tweet</a></li>";

			// for($page=1; $page<=$jumPage; $page++)
			// {
			// 	if ((($page >= $noPage - 2) && ($page <= $noPage + 2)) || ($page == 1) || ($page == $jumPage))
			// 	{
			// 		if (($showPage == 1) && ($page != 2))  echo "<li class='page-item'><a class='page-link' href='#'>...</a></li>";
			// 		if (($showPage != ($jumPage - 1)) && ($page == $jumPage))  echo "<li class='page-item'><a class='page-link' href='#'>...</a></li>";
			// 		if ($page == $noPage) echo "<li class='page-item active'><a class='page-link' href='#'>".$page."</a></li>";
			// 		else echo "<li class='page-item'><a class='page-link' href='javascript:void(0)' onClick=\"getTweet('".$page."')\">".$page."</a></li>";
			// 		$showPage = $page;
			// 	}
			// }

			if ($noPage < $jumPage) echo "<li class='page-item active'><a class='page-link' href='javascript:void(0)' onClick=\"getTweet('".($noPage+1)."')\">More Tweet</a></li>";
			?>
		</ul>
	</nav>
</div>