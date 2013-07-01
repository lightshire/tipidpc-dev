<?php
    $menu = array(
                '/'         =>  "<i class='icon-home icon-white'>&nbsp;</i>&nbsp;Home",
                '/register' =>  "<i class='icon-user'>&nbsp;</i>&nbsp;Register");
  	echo View::make('home.blocks.top-menu')->with(array('menu'=>$menu,'current'=>$current));
?>