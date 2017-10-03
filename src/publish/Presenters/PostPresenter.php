<?php 

namespace App\Presenters;

use Stylish\Presenter\AbstractPresenter;
use League\CommonMark\CommonMarkConverter;

class PostPresenter extends AbstractPresenter{

	public function publishedDate(){
		if($this->created_at){
			return $this->created_at->toDayDateTimeString();
		}
		return 'Note Published';
	}

	public function publishedAtHighlight(){
		if($this->save_post){
			 return 'border-right: 3px green solid;';
		}else{
			 return 'border-right: 3px orange solid;';
		}

	}

}