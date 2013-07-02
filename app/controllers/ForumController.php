<?php
	class ForumController extends BaseController{

		/*	/forum/ or /forum/index
		-----------------------------------*/
		public function getIndex(){
			return View::make('home.template')->with(array(
													'current'	=>	'forum-index',
													'head'		=>	View::make('home.blocks.head')->with(array('current'=>'/forum')),
													'body'		=>	'',
													'foot'		=>	'',
													'class'		=>	'forum-body',
													'title'		=>	'TipidPC | Forum'));
		}
	}
