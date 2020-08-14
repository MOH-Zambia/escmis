<?php

/**
 * @link: http://www.Awcore.com/dev
 */
 
   function pagination($query, $per_page = 10,$page = 1, $url = '?'){        
    	$query = "SELECT COUNT(*) as `num` FROM {$query}";
    	$row = mysql_fetch_array(mysql_query($query));
    	$total = $row['num'];
        $adjacents = "2"; 

    	$page = ($page == 0 ? 1 : $page);  
    	$start = ($page - 1) * $per_page;								
		
    	$prev = $page - 1;							
    	$next = $page + 1;
        $lastpage = ceil($total/$per_page);
    	$lpm1 = $lastpage - 1;
    	
    	$pagination = "";
    	if($lastpage > 1)
    	{	
    		$pagination .= "<ul class='pagination'>";
                    $pagination .= "<li class='details'>Page $page of $lastpage</li>";
    		if ($lastpage < 7 + ($adjacents * 2))
    		{	
    			for ($counter = 1; $counter <= $lastpage; $counter++)
    			{
    				if ($counter == $page)
    					$pagination.= "<li><a class='current'>$counter</a></li>";
    				else
    					if(isset($_GET['owner_sales']))
						{
							$pagination.= "<li><a href='{$url}page=$counter&owner_sales=yes'>$counter</a></li>";					
						}elseif(isset($_GET['promo']))
						{
							$pagination.= "<li><a href='{$url}page=$counter&promo=yes'>$counter</a></li>";					
						}elseif(isset($_GET['orders']))
						{
							$pagination.= "<li><a href='{$url}page=$counter&orders=yes'>$counter</a></li>";					
						}else
						{
							$pagination.= "<li><a href='{$url}page=$counter'>$counter</a></li>";	
						}
    			}
    		}
    		elseif($lastpage > 5 + ($adjacents * 2))
    		{
    			if($page < 1 + ($adjacents * 2))		
    			{
    				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
    				{
    					if ($counter == $page)
    						$pagination.= "<li><a class='current'>$counter</a></li>";
    					else
    						if(isset($_GET['owner_sales']))
							{
								$pagination.= "<li><a href='{$url}page=$counter&owner_sales=yes'>$counter</a></li>";					
							}elseif(isset($_GET['promo']))
							{
								$pagination.= "<li><a href='{$url}page=$counter&promo=yes'>$counter</a></li>";					
							}elseif(isset($_GET['orders']))
							{
								$pagination.= "<li><a href='{$url}page=$counter&orders=yes'>$counter</a></li>";					
							}else
							{
								$pagination.= "<li><a href='{$url}page=$counter'>$counter</a></li>";	
							}
							
    				}
    				$pagination.= "<li class='dot'>...</li>";
    				if(isset($_GET['owner_sales']))
					{
						$pagination.= "<li><a href='{$url}page=$lpm1&owner_sales=yes'>$lpm1</a></li>";
						$pagination.= "<li><a href='{$url}page=$lastpage&owner_sales=yes'>$lastpage</a></li>";
					}elseif(isset($_GET['promo']))
					{
						$pagination.= "<li><a href='{$url}page=$lpm1&promo=yes'>$lpm1</a></li>";
						$pagination.= "<li><a href='{$url}page=$lastpage&promo=yes'>$lastpage</a></li>";
					}elseif(isset($_GET['orders']))
					{
						$pagination.= "<li><a href='{$url}page=$lpm1&orders=yes'>$lpm1</a></li>";
						$pagination.= "<li><a href='{$url}page=$lastpage&orders=yes'>$lastpage</a></li>";
					}else
					{
						$pagination.= "<li><a href='{$url}page=$lpm1'>$lpm1</a></li>";
						$pagination.= "<li><a href='{$url}page=$lastpage'>$lastpage</a></li>";
					}
    			}
    			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
    			{
    				if(isset($_GET['owner_sales']))
					{
						$pagination.= "<li><a href='{$url}page=1&owner_sales=yes'>1</a></li>";
						$pagination.= "<li><a href='{$url}page=2&owner_sales=yes'>2</a></li>";
					}elseif(isset($_GET['promo']))
					{
						$pagination.= "<li><a href='{$url}page=1&promo=yes'>1</a></li>";
						$pagination.= "<li><a href='{$url}page=2&promo=yes'>2</a></li>";
					}elseif(isset($_GET['orders']))
					{
						$pagination.= "<li><a href='{$url}page=1&orders=yes'>1</a></li>";
						$pagination.= "<li><a href='{$url}page=2&orders=yes'>2</a></li>";
					}else
					{
						$pagination.= "<li><a href='{$url}page=1'>1</a></li>";
						$pagination.= "<li><a href='{$url}page=2'>2</a></li>";
					}
    				
					$pagination.= "<li class='dot'>...</li>";
    				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
    				{
    					if ($counter == $page)
    						$pagination.= "<li><a class='current'>$counter</a></li>";
    					else
    						if(isset($_GET['owner_sales']))
							{
								$pagination.= "<li><a href='{$url}page=$counter&owner_sales=yes'>$counter</a></li>";					
							}elseif(isset($_GET['promo']))
							{
								$pagination.= "<li><a href='{$url}page=$counter&promo=yes'>$counter</a></li>";					
							}elseif(isset($_GET['orders']))
							{
								$pagination.= "<li><a href='{$url}page=$counter&orders=yes'>$counter</a></li>";					
							}else
							{
								$pagination.= "<li><a href='{$url}page=$counter'>$counter</a></li>";
							}
    				}
    				$pagination.= "<li class='dot'>..</li>";
    				if(isset($_GET['owner_sales']))
					{
						$pagination.= "<li><a href='{$url}page=$lpm1&owner_sales=yes'>$lpm1</a></li>";
						$pagination.= "<li><a href='{$url}page=$lastpage&owner_sales=yes'>$lastpage</a></li>";	
					}elseif(isset($_GET['promo']))
					{
						$pagination.= "<li><a href='{$url}page=$lpm1&promo=yes'>$lpm1</a></li>";
						$pagination.= "<li><a href='{$url}page=$lastpage&promo=yes'>$lastpage</a></li>";	
					}elseif(isset($_GET['orders']))
					{
						$pagination.= "<li><a href='{$url}page=$lpm1&orders=yes'>$lpm1</a></li>";
						$pagination.= "<li><a href='{$url}page=$lastpage&orders=yes'>$lastpage</a></li>";	
					}else
					{
						$pagination.= "<li><a href='{$url}page=$lpm1'>$lpm1</a></li>";
						$pagination.= "<li><a href='{$url}page=$lastpage'>$lastpage</a></li>";	
					}
    			}
    			else
    			{
    				if(isset($_GET['owner_sales']))
					{
						$pagination.= "<li><a href='{$url}page=1&owner_sales=yes'>1</a></li>";
						$pagination.= "<li><a href='{$url}page=2&owner_sales=yes'>2</a></li>";
					}elseif(isset($_GET['promo']))
					{
						$pagination.= "<li><a href='{$url}page=1&promo=yes'>1</a></li>";
						$pagination.= "<li><a href='{$url}page=2&promo=yes'>2</a></li>";
					}elseif(isset($_GET['orders']))
					{
						$pagination.= "<li><a href='{$url}page=1&orders=yes'>1</a></li>";
						$pagination.= "<li><a href='{$url}page=2&orders=yes'>2</a></li>";
					}else
					{
						$pagination.= "<li><a href='{$url}page=1'>1</a></li>";
						$pagination.= "<li><a href='{$url}page=2'>2</a></li>";
					}
    				
					$pagination.= "<li class='dot'>..</li>";
    				
					for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
    				{
    					if ($counter == $page)
    						$pagination.= "<li><a class='current'>$counter</a></li>";
    					else
    						if(isset($_GET['owner_sales']))
							{
								$pagination.= "<li><a href='{$url}page=$counter&owner_sales=yes'>$counter</a></li>";
							}elseif(isset($_GET['promo']))
							{
								$pagination.= "<li><a href='{$url}page=$counter&promo=yes'>$counter</a></li>";
							}elseif(isset($_GET['orders']))
							{
								$pagination.= "<li><a href='{$url}page=$counter&orders=yes'>$counter</a></li>";
							}else
							{
								$pagination.= "<li><a href='{$url}page=$counter'>$counter</a></li>";
							}
    				}
    			}
    		}
    		
    		if ($page < $counter - 1){ 
    			if(isset($_GET['owner_sales']))
				{
					$pagination.= "<li><a href='{$url}page=$next&owner_sales=yes'>Next</a></li>";
					$pagination.= "<li><a href='{$url}page=$lastpage&owner_sales=yes'>Last</a></li>";
				}elseif(isset($_GET['promo']))
				{
					$pagination.= "<li><a href='{$url}page=$next&promo=yes'>Next</a></li>";
					$pagination.= "<li><a href='{$url}page=$lastpage&promo=yes'>Last</a></li>";
				}elseif(isset($_GET['orders']))
				{
					$pagination.= "<li><a href='{$url}page=$next&orders=yes'>Next</a></li>";
					$pagination.= "<li><a href='{$url}page=$lastpage&orders=yes'>Last</a></li>";
				}else
				{
					$pagination.= "<li><a href='{$url}page=$next'>Next</a></li>";
					$pagination.= "<li><a href='{$url}page=$lastpage'>Last</a></li>";
				}
				
    		}else{
    			$pagination.= "<li><a class='current'>Next</a></li>";
                $pagination.= "<li><a class='current'>Last</a></li>";
            }
    		$pagination.= "</ul>\n";		
    	}
    
    
        return $pagination;
    } 
?>