<?php
# Load JSON Data
$contentPath = "content.JSON";
$adPath = "ad.JSON";
if($_SERVER['REQUEST_METHOD'] == 'GET'){
	try
	{
	  $page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_URL);
	  if($page == null) $page = 1;

	  # Load content from JSON file
	  if(is_readable($contentPath))  
	    $jContent = file_get_contents($contentPath);
	  else                           
	    throw new Exception("Cannot load content!");

	  # Read ad from JSON file
	  if(is_readable($adPath))  
	    $jAd = file_get_contents($adPath);
	  else                           
	    throw new Exception("Cannot load ad!");

	}
	catch(Exception $e)
	{
	  header('HTTP/1.1 400 Bad request'); 
	  echo $e->getMessage();
	}

	# Convert all JSON string to object 
	$contents = json_decode($jContent);
	$ads = json_decode($jAd);
	
	$maxShowVedio = 9;
	if(4*$page >$maxShowVedio){
		$numShowVedio = $maxShowVedio;
	}else{
		$numShowVedio = 4*$page;
	}
}
#var_dump($contents);
?>


<!DOCTYPE html>
<html>

	<head>

		<title lang="zh-TW">VoiceTube《看影片學英語》60,000 部英文學習影片，每天更新</title>

		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Bootstrap CSS -->
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

		<!-- My CSS -->
		<link rel="stylesheet" type="text/css" href="css/subdropdown.css">
		<link rel="stylesheet" type="text/css" href="css/divider-vertical.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">

	</head>

	<body>
		<nav class="navbar navbar-inverse nav-pad navbar-fixed-top">
			<div class="container-fluid">

				<div class="navbar-header">
					<!-- RWD -->
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span> 
               		</button>

					<a class="navbar-brand" href="index.php">
						<img class="img-logo" src="https://cdn.voicetube.com/assets/img/vt_logo-with_icon-170111-white.png">
					</a>
				</div>

				<!-- RWD -->
				<div class="collapse navbar-collapse" id="myNavbar">
					<ul class="nav navbar-nav navbar-left navleft">
						
						<!-- 精選頻道 -->
						<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">精選頻道<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="#">中英文雙字幕影片</a></li>
							<li class="divider"></li>
							<li><a href="#">深度英文演講</a></li>
							<li><a href="#">知識型動畫</a></li>
							<li class="divider"></li>
							<li><a href="#">看BBC學英文</a></li>
							<li><a href="#">CNN 10</a></li>
							<li class="divider"></li>
							<li><a href="#">TOEIC 多益考試</a></li>
							<li><a href="#">TOEFL 托福考試</a></li>
							<li><a href="#">IELTS 雅思考試</a></li>
							<li class="divider"></li>
							<li><a href="#">職場商用英文</a></li>
							<li><a href="#">阿滴英文</a></li>
							<li><a href="#">主編精選</a></li>
							<li><a href="#">英文學習技巧</a></li>
							<li><a href="#">電影與電視劇學英文</a></li>
							<li><a href="#">聽音樂學英文</a></li>
							<li><a href="#">卡通動畫學英文</a></li>
							<li><a href="#">兒童學英文</a></li>
							<li><a href="#">歡樂脫口秀喜劇</a></li>
							<li><a href="#">康軒英語：七年級</a></li>
							<li><a href="#">康軒英語：八年級</a></li>
							<li><a href="#">康軒英語：九年級</a></li>
						</ul>
						</li>

						<!-- 程度分級 -->
						<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">程度分級<span class="caret"></span></a>
						<ul class="dropdown-menu">
							
							<!-- 初級: TOEIC 250-545 -->
							<li class="dropdown dropdown-submenu"><a class="dropdown-toggle" data-toggle="dropdown" href="#">初級: TOEIC 250-545</a>
							<ul class="dropdown-menu">
								<li><a href="#">全部</a></li>
								<li><a href="#">DIY 教學</a></li>
								<li><a href="#">人物與網誌</a></li>
								<li><a href="#">各類交通工具</a></li>
								<li><a href="#">喜劇</a></li>
								<li><a href="#">娛樂</a></li>
								<li><a href="#">寵物與動物</a></li>
								<li><a href="#">教育</a></li>
								<li><a href="#">新聞與政治</a></li>
								<li><a href="#">旅行與活動</a></li>
								<li><a href="#">科學與技術</a></li>
								<li><a href="#">節目</a></li>
								<li><a href="#">遊戲</a></li>
								<li><a href="#">運動</a></li>
								<li><a href="#">電影</a></li>
								<li><a href="#">電影與動畫</a></li>
								<li><a href="#">非營利組織與行動主義</a></li>
								<li><a href="#">音樂</a></li>
								<li><a href="#">預告片</a></li>
							</ul>

							<!-- 中級: TOEIC 550-780 -->
							<li class="dropdown dropdown-submenu"><a class="dropdown-toggle" data-toggle="dropdown" href="#">中級: TOEIC 550-780</a>
							<ul class="dropdown-menu">
								<li><a href="#">全部</a></li>
								<li><a href="#">DIY 教學</a></li>
								<li><a href="#">人物與網誌</a></li>
								<li><a href="#">各類交通工具</a></li>
								<li><a href="#">喜劇</a></li>
								<li><a href="#">娛樂</a></li>
								<li><a href="#">寵物與動物</a></li>
								<li><a href="#">教育</a></li>
								<li><a href="#">新聞與政治</a></li>
								<li><a href="#">旅行與活動</a></li>
								<li><a href="#">科學與技術</a></li>
								<li><a href="#">節目</a></li>
								<li><a href="#">遊戲</a></li>
								<li><a href="#">運動</a></li>
								<li><a href="#">電影</a></li>
								<li><a href="#">電影與動畫</a></li>
								<li><a href="#">非營利組織與行動主義</a></li>
								<li><a href="#">音樂</a></li>
							</ul>

							<!-- 高級: TOEIC 785-990 -->
							<li class="dropdown dropdown-submenu"><a class="dropdown-toggle" data-toggle="dropdown" href="#">高級: TOEIC 785-990</a>
							<ul class="dropdown-menu">
								<li><a href="#">全部</a></li>
								<li><a href="#">DIY 教學</a></li>
								<li><a href="#">人物與網誌</a></li>
								<li><a href="#">各類交通工具</a></li>
								<li><a href="#">喜劇</a></li>
								<li><a href="#">娛樂</a></li>
								<li><a href="#">寵物與動物</a></li>
								<li><a href="#">教育</a></li>
								<li><a href="#">新聞與政治</a></li>
								<li><a href="#">旅行與活動</a></li>
								<li><a href="#">科學與技術</a></li>
								<li><a href="#">節目</a></li>
								<li><a href="#">遊戲</a></li>
								<li><a href="#">運動</a></li>
								<li><a href="#">電影</a></li>
								<li><a href="#">電影與動畫</a></li>
								<li><a href="#">非營利組織與行動主義</a></li>
								<li><a href="#">音樂</a></li>
								<li><a href="#">預告片</a></li>
							</ul>
						</ul>
						</li>

						<!-- 聽力口說 -->
						<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">聽力口說<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="#">每日口說挑戰</a></li>
							<li><a href="#">聽力測驗</a></li>
						</ul>
						</li>

						<!-- 社群 -->
						<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">社群<span class="caret"></span></a>
						<ul class="dropdown-menu">
							
							<!-- With Icon -->
							<li><a href="#"><span class="glyphicon glyphicon-th">激勵牆</span></a></li>
							<li><a href="#"><span class="glyphicon glyphicon-user">翻譯社群</span></a></li>
							<li><a href="#">VoiceTube Campus</a></li>
						</ul>
						</li>

						<!-- 匯入影片 -->
						<li><a href="#">匯入影片</a></li>



						<!-- HERO 課程 -->
						<li class="divider-vertical collapse"></li>
						<li><a href="#">HERO 課程</a></li>

					</ul>


					<!-- 右側 icon 列 -->
					<ul class="collapse navbar-collapse nav navbar-nav navbar-right">

						<!-- 好友 icon -->
						<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span></a>
						<ul class="dropdown-menu">
							<span class="left-margin">好友邀請</span>
						</ul>

						<!-- 通知 icon -->
						<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-flag"></span></a>
						<ul class="dropdown-menu">
							<span class="left-margin">通知</span>
						</ul>

						<!-- 訊息 icon -->
						<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-comment"></span></a>
						<ul class="dropdown-menu">
							<span class="left-margin">訊息</span>
						</ul>

						<!--  icon -->
						<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-check"></span></a>
						<ul class="dropdown-menu">
							<span class="left-margin"></span>
						</ul>

						<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-check"></span></a>
						<ul class="dropdown-menu">
							<span class="left-margin"></span>
						</ul>
					</ul>
				</div>
			</div>
		</nav>
		<div class="clearfix"></div>


		<!--  index block -->
		<div class="container">
			<div class="index-block">
				<div class="row">
					<!--  Video part -->
					<div id="thumb" class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
						<div class="row">
						<div id="newVideoTitle">New Videos</div>
						<!--  use php to insert thumbnails -->

<?php
# Inserting thumbnail's HTML
$thumbHtml = '';
for($i=0; $i<$numShowVedio; $i++)
{
	$thumb = $contents[$i];
	# first line is rwd
	$thumbHtml .= '<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">';
		# thumbnail's div
		$thumbHtml .= '<div class="thumbnail" data-video-id "' . $thumb->data_video_id . '">';
			# thumnail's photo
			$thumbHtml .= '<div class="photo" video_id="' . $thumb->data_video_id . '">';
				# photo's a
				$thumbHtml .= '<a href="' . $thumb->a_href . '">';
					# a's img
					$thumbHtml .= '<img class="lazy" src="' . $thumb->img_src . '" data-original="' . $thumb->img_src . '" alt="' . $thumb->img_alt . '">';
				$thumbHtml .= '</a>';

				# photo's span-readed label
				$thumbHtml .= '<span class="readed-label" data-video-id="' . $thumb->data_video_id . '">';
					# span-readed label's img
					$thumbHtml .= '<img src="' . $thumb->img_readed . '" alt="' . $thumb->img_readed_alt . '" rel="' . $thumb->img_readed_data_original_title . '" data-original-title="' . $thumb->img_readed_rel . '">';
				$thumbHtml .= '</span>';

				# photo's span-photo label
				$thumbHtml .= '<span class="label label-inverse photo-label">';
					# span-photo label's span
					$thumbHtml .= '<span class="video-time">' . $thumb->video_time . '</span>';
				$thumbHtml .= '</span>';
			$thumbHtml .= '</div>';

			# thumbnail's caption
			$thumbHtml .= '<div class="caption">';
				# caption's h5
				$thumbHtml .= '<h5 class="index-thumbnail-title" rel= "tooltip" data-original-title="' . $thumb->data_original_title . '">';
					# h5's a
					$thumbHtml .= '<a href="' . $thumb->a_href . '">' . $thumb->h5_a_href . '</a>';
				$thumbHtml .= '</h5';

				# caption-pull left div
				$thumbHtml .= '<div class="pull-left">';
					$thumbHtml .= '<div>' . $thumb->view . '</div>';
				$thumbHtml .= '</div>';

				# caption's clearfix
				$thumbHtml .= '<div class="clearfix"></div>';

				# caption's thumbnail tags
				$thumbHtml .= '<div class="thumbnail-tags">';
					# first a
					$thumbHtml .= '<a href="' . $thumb->level_href . '">';
						$thumbHtml .= '<span class="label label-info">' . $thumb->level . '</span>';
					$thumbHtml .= '</a>';
					# second a
					$thumbHtml .= '<a href="' . $thumb->chinese_href . '">';
						$thumbHtml .= '<span class="label" rel="tooltip" data-original-title="' . $thumb->chinese_tag . '">' . $thumb->chinese_caption . '</span>';
					$thumbHtml .= '</a>';
					# third a
					$thumbHtml .= '<a href="' . $thumb->pronounciation_href . '">';
						$thumbHtml .= '<span class="label label-warning" rel="tooltip" data-original-title="' . $thumb->pronounciation_tag . '">' . $thumb->pronounciation . '</span>';
					$thumbHtml .= '</a>';
				$thumbHtml .= '</div>';

			$thumbHtml .= '</div>';
		$thumbHtml .= '</div>';
}
# Output to HTML
print $thumbHtml;
?>
						</div>
						<div class="row">
							<div class="col-xs-4 col-sm-4 col-md-5 col-lg-5">
							</div>
							<div class="col-xs-8 col-sm-8 col-md-7 col-lg-7">
							<a href="index.php?page=<?php print ($page+1);?>"><button type="button" class="btn btn-success">More Vedios</button></a>
							</div>
						</div>
					</div>

					<!--  AD part -->
					<div class="col-xs-0 col-sm-0 col-md-3 col-lg-3">
						<div class="qbox index-sidebar span3">
		  					<div id="ad"><a href="/lessons/?apilang=zh_tw">看更多</a></div>
							<h3>英文學習課程</h3>
							<div class="clearfix"></div>
							<div>
		   						<ol id="sidecol" class="shortlist">
								<!--  use php to insert advertise -->
<?php
# Inserting Ad to HTML
$adHtml = '';
foreach($ads as $ad)
{
print <<<STRING
				                      <li>
						                    <div>
							                     <a target="_blank" href="$ad->href">$ad->title</a>
							                     <div class="short_company">$ad->company</div>
						                    </div>
					                    </li>
STRING;
}

?>
         						</ol>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
