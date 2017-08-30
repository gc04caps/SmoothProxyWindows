<?php
$myfile = fopen("config.ini", "w") or die("Unable to open file!");
$txt = "[config]\n";
fwrite($myfile, $txt);
$txt = "username = \"" . $_POST['username']."\"\n";
fwrite($myfile, $txt);
$txt = "password = \"" . $_POST['password']."\"\n";
fwrite($myfile, $txt);
$txt = "service = \"" . $_POST['service']."\"\n";
fwrite($myfile, $txt);
$txt = "server = \"" . $_POST['server']."\"\n";
fwrite($myfile, $txt);
$txt = "ip = \"" . $_POST['ip']."\"\n";
fwrite($myfile, $txt);
fclose($myfile);


error_reporting(E_ERROR);
set_time_limit(0);

// EPG - http://sstv.fog.pt/feed.xml

function init()
{
	echo 'Thanks to notorious for his hard work! <br />';
    file_put_contents('./cache/init.running', '', LOCK_EX);
	
	

    // ---------------------------------

 //   $config = parse_ini_file('config.ini');
 //using POST instead of config, but i guess we could, since init.config is being written

    // ---------------------------------

    $hash = json_decode(file_get_contents('https://auth.smoothstreams.tv/hash_api.php?username='
        . urlencode($_POST['username']) . '&password=' . urlencode($_POST['password']) . '&site='
        . urlencode($_POST['service'])), true)['hash'];

    // ---------------------------------

    $id_map = array_flip(json_decode(file_get_contents('http://sstv.fog.pt/utc/chanlist.json'), true));

    // ---------------------------------

    $ch_map = [];
    foreach (preg_split('/\n/', file_get_contents('http://sstv.fog.pt/utc/SmoothStreams.m3u8')) as $ln) {
        if (strpos($ln, '#EXTINF') === 0) {
            $pos = strpos($ln, 'tvg-num') + 9;
            $len = $ln[$pos + 2] === '"' ? 2 : 3;
            $ch_map[(int)substr($ln, $pos, $len)] = substr($ln, $pos + $len + 2);
        }
    }

    // ---------------------------------

    $out_static = '#EXTM3U' . PHP_EOL;
    $out_dynamic = '#EXTM3U' . PHP_EOL;

    for ($ch = 1; $ch <= count($ch_map); $ch++) {
       $png = 'https://guide.smoothstreams.tv/assets/images/channels/' . $ch . '.png';

        if ($ok = stripos(@get_headers($png)[0], '200'))
            file_put_contents('./cache/' . $ch . '.png', file_get_contents($png));

        $inf = '#EXTINF:-1 tvg-id="' . $id_map[$ch] . '" tvg-name="' . $ch
            . '" tvg-logo="http://' . $_POST['ip'] . '/cache/' . ($ok ? $ch : 'empty') . '.png'
            . '" channel-id="' . $ch . '",' . $ch_map[$ch] . PHP_EOL;

        $url = 'http://' . $_POST['server'] . '.smoothstreams.tv:9100/' . $_POST['service']
            . '/ch' . ($ch < 10 ? '0' : '') . $ch . 'q1.stream/playlist.m3u8?wmsAuthSign=' . $hash . '==';

        $out_static .= $inf . $url . PHP_EOL;
        $out_dynamic .= $inf . 'http://' . $_POST['ip'] . '/sstv.php?ch=' . $ch . PHP_EOL;
    }

    file_put_contents('./playlist/sstv_static.m3u8', $out_static);
    file_put_contents('./playlist/sstv_dynamic.m3u8', $out_dynamic);

    // ---------------------------------

    unlink('./cache/init.running');

	echo ' <p>';
	echo '<strong>Do not close this window</strong> <br />';
	echo 'It needs to stay open to re-auth every 4 hours<br />';
	echo 'Now go set up your IPTV player <br />';
	echo ' <p>';
	echo 'Playlist | http://'. $_POST['ip'].'/playlist/sstv_dynamic.m3u8 <br />';
	echo 'EPG | http://sstv.fog.pt/feed.xml';
	echo ' <p>';
	echo '<strong>Not working?</strong> <br /> 
	Double check your IP and port in settings.json';
    exit();
}

if (!file_exists('init.running'))
    init();
	?>