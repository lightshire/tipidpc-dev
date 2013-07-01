<div class="navbar navbar-static-top navbar-inverse">
	<div class="navbar-inner">
		<a class="brand" href="/home">TipidPC</a>
		<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
        </a>
		<div class="nav-collapse collapse">
			<ul class="nav">
				<?php foreach($menu as $href=>$label): ?>
					<?php if($href == $current): ?>
						<li class="active"><a href="<?=$href?>"><?=$label?></a></li>
					<?php else: ?>
						<li><a href="<?=$href?>"><?=$label?></a></li>
					<?php endif; ?>
				<?php endforeach?>
			</ul>
		</div>
		
	</div>
</div>