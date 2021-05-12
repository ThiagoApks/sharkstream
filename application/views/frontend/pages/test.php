<?php 

$postdata = http_build_query(
	array(
		'button' => 5,
		'season' => "none",
		'episode' => "none",
		'id' => 'tt5463162'
	)
);

$opts = array('http' =>
	array(
		'method'  => 'POST',
		'header'  => 'Content-Type: application/x-www-form-urlencoded',
		'content' => $postdata
	)
);

$context  = stream_context_create($opts);

$result = file_get_contents('https://hdfog.club/video/geradorteste.php', false, $context);
?>
<script>
  $(document).ready(function(){
      window.open("<?=$result?>", "_blank"); // will open new tab on document ready
  });
</script>