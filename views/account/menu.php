<?php
	$menu = array(	//array('name'=>'Dashboard','url'=>'views/account/dashboard.php','id'=>'dashboard'),
					array('name'=>'New bucket','url'=>'views/account/addbucketlist.php','id'=>'bucket'),
					array('name'=>'New goal','url'=>'views/account/addgoal.php','id'=>'goal'),
					array('name'=>'Profile','url'=>null,'id'=>'profile'),
					array('name'=>'Logout','url'=>'logout.php','id'=>'Logout')
				)
?>
<aside class="account_menu">
	<ul>
		<?php foreach($menu as $item){
			$select = ($item['id'] == $page) ? ' class="active"' : '';
			echo '<li><a href="'.base_url.$item['url'].'"'.$select.'>'.$item['name'].'</a></li>';
		}
		?>
	</ul>
</aside>