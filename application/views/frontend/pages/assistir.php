<?php 
$ppostdata = http_build_query(
	array(
		'button' => 3,
		'season' => "none",
		'episode' => "none",
		'id' => $_GET['filme']
	)
);

$popts = array('http' =>
	array(
		'method'  => 'POST',
		'header'  => 'Content-Type: application/x-www-form-urlencoded',
		'content' => $ppostdata
	)
);

$pcontext  = stream_context_create($popts);

$fudeu = file_get_contents('https://hdfog.club/video/geradorteste.php', false, $pcontext);


$fudeu = file_get_contents($fudeu);

$whatIWant = substr($fudeu, strpos($fudeu, 'window.location.href = "'));    
if (preg_match('/"([^"]+)"/', $whatIWant, $m)) {
    $final = $m[1];   
}

$fodasefinal = file_get_contents($final);
$whatIWant = substr($fodasefinal, strpos($fodasefinal, 'window.location.href = "'));    
if (preg_match('/"([^"]+)"/', $whatIWant, $m)) {
    $final = $m[1];   
}
$whatIWant = substr($final, strpos($final, '/v/')+3);    

$opts = array('http' =>
	array(
		'method'  => 'POST',
		'header'  => 'Content-Type: application/x-www-form-urlencoded'
	)
);

$context  = stream_context_create($opts);
$result = file_get_contents('https://femax20.com/api/source/'.$whatIWant, false, $context);
$result = json_decode($result);
?>
<script type="text/javascript">
	window.open('<?=$result->data[0]->file?>', '_blank')
</script>