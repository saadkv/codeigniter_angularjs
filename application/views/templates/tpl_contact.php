
<div id="container">
	<h1>Welcome to Contact Page</h1>

	<div id="content">
		This is Content part
	</div>
	<?php if( $is_sidebar ) { ?>
	<div id="sidebar">
		This is Sidebar part
	</div>
	<?php } ?>
</div>
<a ui-sref="home">Back Home</a><br><a ui-sref="help">Back help</a>