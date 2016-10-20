<?php
namespace Home\Model;
use Think\Model\ViewModel;
class GuessViewModel extends ViewModel {
	public $viewFields = array(
		'Guess'=>array(
			'gameissue',
			'input',
			'output',
			'_type'=>'LEFT',
			
		),
		'Game'=>array(
			'num1',
			'num2',
			'num3',
			'runtime',
			'statu',
			'_on'=>'Guess.gamename=Game.name AND Guess.gameissue=Game.issue',
		),
	);
 }