<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdn.ckeditor.com/4.11.1/standard-all/ckeditor.js"></script>
<script src="/js/datepicker.min.js"></script>    
<script type="text/javascript" src="/js/loading-bar.js"></script>
<script src="/js/global.js"></script>
<script src="script.js"></script>
<?php
	if($user->is_logged_in()){ echo "<script src='/js/post.js'></script>"; }	
?>	
