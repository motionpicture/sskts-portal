<div class="">
	<!-- キャンペーン情報 -->
	<h2 style="margin:0 0 10px;">キャンペーン情報</h2>
	<?php

		foreach($campaign as $key => $val){
			if($val['Campaign']['del_flg'] == 0 && $val['Campaign']['theater_ids'] && $val['Campaign']['start_date'] <= date("Y-m-d") && $val['Campaign']['end_date'] >= date("Y-m-d")){
				$cam = explode(",",$val['Campaign']['theater_ids']);
				foreach($cam as $key2 => $val2){
					if($theaters[$val2]){
						$camTheater[$theaters[$val2]][] = $val['Campaign']['midasi'];
					}
				}
			}
		}

		foreach($camTheater as $key => $val){
			asort($camTheater[$key]);
		}

		foreach($order as $key => $val){
			$camTheater2[$val] = $camTheater[$val];
		}

	?>

	<table style="margin:0 0 20px;">
		<?php
			foreach($camTheater2 as $key => $val){
				echo "<tr>";
				echo "<th style='border:1px solid #000;'>$key</th>";
				foreach($val as $key2 => $val2){
					echo "<td style='border:1px solid #000;'>$val2</td>";
				}
				
				echo "</tr>";
			}
		?>
	</table>
	<!-- キャンペーン情報 -->

	<!-- 各劇場TOPバナー -->
	<h2 style="margin:0 0 10px;">各劇場TOPバナー</h2>
	<?php
		foreach($sliderView as $key => $val){
			if($val['TopsliderView']['del_flg'] == 0){
				if($theaters[$val['TopsliderView']['theater_id']]){
					$bnr[$theaters[$val['TopsliderView']['theater_id']]] = explode(",",$val['TopsliderView']['view']);
				}

			}

		}

		foreach($slider as $key => $val){
			$sliderInfo[$val['Topslider']['id']] = $val['Topslider']['name'];
		}

		foreach($bnr as $key => $val){
			foreach($val as $key2 => $val2){
				if($sliderInfo[$val2])
				$bnrInfo[$key][] = $sliderInfo[$val2];
			}
		}

		foreach($order as $key => $val){
			$bnrInfo2[$val] = $bnrInfo[$val];
		}

	?>

	<table style="margin:0 0 20px;">
		<?php
			foreach($bnrInfo2 as $key => $val){
				echo "<tr>";
				echo "<th style='border:1px solid #000;'>$key</th>";
				foreach($val as $key2 => $val2){
					echo "<td style='border:1px solid #000;'>$val2</td>";
				}
				
				echo "</tr>";
			}
		?>
	</table>
	<!-- 各劇場TOPバナー -->

	<!-- 動画バナー -->
	<h2 style="margin:0 0 10px;">動画バナー</h2>
	<?php
		foreach($trailer as $key => $val){
			if($val['Trailer']['del_flg'] == 0 && $val['Trailer']['theater_ids']){
				$flv = explode(",",$val['Trailer']['theater_ids']);
				foreach($flv as $key2 => $val2){
					$flvTheater[$theaters[$val2]][] = $val['Trailer']['name'];
				}
			}
		}

		foreach($order as $key => $val){
			$flvTheater2[$val] = $flvTheater[$val];
		}
	?>

	<table style="margin:0 0 20px;">
		<?php
			foreach($flvTheater2 as $key => $val){
				echo "<tr>";
				echo "<th style='border:1px solid #000;'>$key</th>";
				foreach($val as $key2 => $val2){
					echo "<td style='border:1px solid #000;'>$val2</td>";
				}
				
				echo "</tr>";
			}
		?>
	</table>
	<!-- 動画バナー -->

	<!-- ピックアップバナー -->
	<h2 style="margin:0 0 10px;">ピックアップバナー</h2>
	<?php
		foreach($pickView as $key => $val){
			if($val['PickView']['del_flg'] == 0){
				if($theaters[$val['PickView']['theater_id']]){
					$pickBnr[$theaters[$val['PickView']['theater_id']]] = explode(",",$val['PickView']['view']);
				}

			}

		}

		foreach($pick as $key => $val){
			$pickInfo[$val['Pick']['id']] = $val['Pick']['name'];
		}

		foreach($pickBnr as $key => $val){
			foreach($val as $key2 => $val2){
				if($pickInfo[$val2]){
					$pickBnrInfo[$key][] = $pickInfo[$val2];
				}
			}
		}

		foreach($order as $key => $val){
			$pickBnrInfo2[$val] = $pickBnrInfo[$val];
		}

	?>

	<table style="margin:0 0 20px;">
		<?php
			foreach($pickBnrInfo2 as $key => $val){
				echo "<tr>";
				echo "<th style='border:1px solid #000;'>$key</th>";
				foreach($val as $key2 => $val2){
					echo "<td style='border:1px solid #000;'>$val2</td>";
				}
				
				echo "</tr>";
			}
		?>
	</table>
	<!-- ピックアップバナー -->

	<!-- 特設サイトメインバナ－ -->
	<h2 style="margin:0 0 10px;">特設サイトメインバナ－</h2>
	<?php
		foreach($mainBannerView as $key => $val){
			if($val['SpecialMainBannerView']['del_flg'] == 0){
				if($stheaters[$val['SpecialMainBannerView']['theater_id']]){
					$mainBnr[$stheaters[$val['SpecialMainBannerView']['theater_id']]] = explode(",",$val['SpecialMainBannerView']['view']);
				}

			}

		}

		foreach($mainBanner as $key => $val){
			$mainBannerInfo[$val['SpecialMainBanner']['id']] = $val['SpecialMainBanner']['name'];
		}

		foreach($mainBnr as $key => $val){
			foreach($val as $key2 => $val2){
				if($mainBannerInfo[$val2])
				$mainBnrInfo[$key][] = $mainBannerInfo[$val2];
			}
		}
	?>

	<table style="margin:0 0 20px;">
		<?php
			foreach($mainBnrInfo as $key => $val){
				echo "<tr>";
				echo "<th style='border:1px solid #000;'>$key</th>";
				foreach($val as $key2 => $val2){
					echo "<td style='border:1px solid #000;'>$val2</td>";
				}
				
				echo "</tr>";
			}
		?>
	</table>
	<!-- 特設サイトメインバナ－ -->

	<!-- 特設サイトサイドバナ－ -->
	<h2 style="margin:0 0 10px;">特設サイトサイドバナ－</h2>
	<?php
		foreach($sideBannerView as $key => $val){
			if($val['SpecialSideBannerView']['del_flg'] == 0){
				if($stheaters[$val['SpecialSideBannerView']['theater_id']]){
					$sideBnr[$stheaters[$val['SpecialSideBannerView']['theater_id']]] = explode(",",$val['SpecialSideBannerView']['view']);
				}

			}

		}


		foreach($sideBanner as $key => $val){
			$sideBannerInfo[$val['SpecialSideBanner']['id']] = $val['SpecialSideBanner']['name'];
		}

		foreach($sideBnr as $key => $val){
			foreach($val as $key2 => $val2){
				if($sideBannerInfo[$val2])
				$sideBnrInfo[$key][] = $sideBannerInfo[$val2];
			}
		}
	?>

	<table style="margin:0 0 20px;">
		<?php
			foreach($sideBnrInfo as $key => $val){
				echo "<tr>";
				echo "<th style='border:1px solid #000;'>$key</th>";
				foreach($val as $key2 => $val2){
					echo "<td style='border:1px solid #000;'>$val2</td>";
				}
				
				echo "</tr>";
			}
		?>
	</table>
	<!-- 特設サイドメインバナ－ -->

	<!-- 特設サイト作品紹介 -->
	<h2 style="margin:0 0 10px;">特設サイト作品紹介</h2>
	<?php


		foreach($introduction as $key => $val){
			if($val['Introduction']['del_flg'] == 0 && $val['Introduction']['theater_ids']){
				$intro = explode(",",$val['Introduction']['theater_ids']);

				foreach($intro as $key2 => $val2){
					if($val2 == 1001 && $val['Introduction']['end_date1'] >= date("Y-m-d")){
						$introTheater[$rtheaters[$val2]][] = 
							array($val['Introduction']['name'],$val['Introduction']['start_date1']);
					}elseif($val2 == 1003 && $val['Introduction']['end_date2'] >= date("Y-m-d")){
						$introTheater[$rtheaters[$val2]][] = 
							array($val['Introduction']['name'],$val['Introduction']['start_date2']);
					}elseif($val2 == 1004 && $val['Introduction']['end_date3'] >= date("Y-m-d")) {
						$introTheater[$rtheaters[$val2]][] = 
							array($val['Introduction']['name'],$val['Introduction']['start_date3']);
					}
				}
			}
		}



		$loop = 1;
		foreach($introTheater as $key => $val){
			foreach($val as $key2 => $val2){
				$ar1[$key][] = $val2[1];
			}
		}

		foreach($introTheater as $key => $val){
			unset($sort);
			$sort = $ar1[$key] ;
			array_multisort($sort,$introTheater[$key]);
		}

		foreach($introTheater as $key => $val){
			if($val[0][1] > $val[1][1]){
				$introTheater[$key] = array_reverse($introTheater[$key]);
			}

		}

	?>
	
	<table style="margin:0 0 20px;">
		<?php
			foreach($introTheater as $key => $val){
				echo "<tr>";
				echo "<th style='border:1px solid #000;'>$key</th>";
				foreach($val as $key2 => $val2){
					if($val2[1] <= date("Y-m-d")){
						echo "<td style='border:1px solid #000;'>" . date("Y年m月d月上映開始",strtotime($val2[1])) . "<br />$val2[0]</td>";
					}else{
						echo "<td style='border:1px solid #000;color:red;'>" . date("Y年m月d月上映予定", strtotime($val2[1])) . "<br />$val2[0]</td>";
					}
				}
				
				echo "</tr>";
			}
		?>
	</table>
	<!-- 特設サイト作品紹介 -->
</div>
