<?php
    $menu = array(
                '/'         =>  "<i class='icon-home icon-white'>&nbsp;</i>&nbsp;Home",
                '/forum'	=>	"<i class='icon-th-large icon-white'>&nbsp;</i>&nbsp;Forum",
                /*register' =>  "<i class='icon-user icon-white'>&nbsp;</i>&nbsp;Register"**/);
  	echo View::make('home.blocks.top-menu')->with(array('menu'=>$menu,'current'=>$current));
?>