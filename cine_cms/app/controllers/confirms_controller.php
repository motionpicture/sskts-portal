<?php
class ConfirmsController extends AppController {

	var $name = 'Confirms';

	var $uses = array(
					         'Trailer',
	                         'Campaign',
                 	         'Topslider',
                	         'TopsliderView',
                 	         'Pick',
                	         'PickView',
 							 'SpecialMainBanner',
							 'SpecialMainBannerView',
                    	     'SpecialSideBanner',
                    	     'SpecialSideBannerView',
                    	     'Introduction',
                    	     'Theater',
	);

	function index() {
		$this->Session->setFlash(__('存在しないアクセスです。	', true));
		$this->redirect(array('action' => '../users/lists'));
	}


	//views用エラーを出す為のglobal宣言
	var $rTheaters;

	function beforeFilter(){
	    //動画
		$conditions = array('Trailer.del_flg'=>0,);
		$trailer =  $this->Trailer->find('all',array('conditions' => $conditions));

		//キャンペーン
		$conditions = array('Campaign.del_flg'=>0,);
		$campaign =  $this->Campaign->find('all',array('conditions' => $conditions));

		//スライダー
		$conditions = array('Topslider.del_flg'=>0,);
		$slider =  $this->Topslider->find('all',array('conditions' => $conditions));
		$sliderView =  $this->TopsliderView->find('all');

		//ピックアップ
		$conditions = array('Pick.del_flg'=>0,);
		$pick =  $this->Pick->find('all',array('conditions' => $conditions));
		$pickView =  $this->PickView->find('all');

		//特設サイトメインバナー
		$conditions = array('SpecialMainBanner.del_flg'=>0,);
		$mainBanner =  $this->SpecialMainBanner->find('all',array('conditions' => $conditions));
		$mainBannerView =  $this->SpecialMainBannerView->find('all');

		//特設サイトサイドバナー
		$conditions = array('SpecialSideBanner.del_flg'=>0,);
		$sideBanner =  $this->SpecialSideBanner->find('all',array('conditions' => $conditions));
		$sideBannerView =  $this->SpecialSideBannerView->find('all');

		//特設サイト作品紹介
		$conditions = array('Introduction.del_flg'=>0,);
		$introduction =  $this->Introduction->find('all',array('conditions' => $conditions));

		//劇場
		$conditions = array('Theater.del_flg'=>0,);
		$theaters = $this->Theater->find('list',array('conditions' => $conditions));
		$theaters['1000'] = "シネマサンシャイントップ";

		$stheaters['1001']="IMAX 特設サイト表示用";
		$stheaters['1003']="4DX 特設サイト表示用";
		$stheaters['1004']="DOLBY 特設サイト表示用";

		$rtheaters = $theaters;
		$rtheaters['1001']="IMAX 特設サイト表示用";
		$rtheaters['1003']="4DX 特設サイト表示用";
		$rtheaters['1004']="DOLBY 特設サイト表示用";

		//劇場表示順
		$order = array(
		        'シネマサンシャイントップ',
		        '池袋',
		        '平和島',
		        '土浦',
		        '沼津',
		        'かほく',
		        '大和郡山',
		        '下関',
		        '大街道',
		        '衣山',
		        '重信',
		        'エミフルMASAKI',
		        '大洲',
		        '北島',
                '姶良',
		);

		$this->set('trailer',$trailer);
		$this->set('campaign',$campaign);
		$this->set('slider',$slider);
		$this->set('sliderView',$sliderView);
		$this->set('pick',$pick);
		$this->set('pickView',$pickView);
		$this->set('mainBanner',$mainBanner);
		$this->set('mainBannerView',$mainBannerView);
		$this->set('sideBanner',$sideBanner);
		$this->set('sideBannerView',$sideBannerView);
		$this->set('introduction',$introduction);
		$this->set('theaters',$theaters);
		$this->set('stheaters',$stheaters);
		$this->set('rtheaters',$rtheaters);
		$this->set('order',$order);

		parent::beforeFilter();
	}

	//劇場選択画面
	function check() {
	}
}
