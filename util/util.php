<?php
function GBsubstr($string, $start, $length) {
	if(strlen($string)>$length){
	    $str=null;
		$len=$start+$length;
		$count = $len / 3 * 2; // Êý×Ö×ÖÄ¸1¸öµ¥Î»£¬ºº×Ö2¸öµ¥Î»
		for($i=$start, $c = 0;$i<$len && $c < $count;$i++){
		    if(ord(substr($string,$i,1))>0xa0){
    			$str.=substr($string,$i,3);
				$i = $i + 2;
				$c = $c + 2;
			}else{
			    $str.=substr($string,$i,1);
				$c = $c + 1;
			}
		}
		return $str.'...';
	}else{
    	return $string;
	}
}
function softlinksSolve($ori) {
	$start = strpos($ori, '/');
	$end   = strpos($ori, '{/dede:link}');
	return substr($ori, $start, $end - $start);
}
function softlinkPreInsert($ori) {
	return "{dede:link islocal=\'1\' text=\'机动车辆验收报告\'}". $ori. "{/dede:link}";
}
function page($request_page, $pageTotal, $page_nums, $page_name) {	 
    $request_page_pre = $request_page - 1;
	$request_page_next = $request_page + 1;
	
	$req_left_nums = floor($page_nums / 2);
	$req_right_nums = floor($page_nums / 2);
	$left_ori = ($request_page - $req_left_nums);
	$right_ori = ($request_page + $req_right_nums);
	if ($left_ori <= 1) {
	    $left_ori = 1;
		$right_ori = $page_nums;
		if ($pageTotal > $page_nums) {
		    for ($i = 1; $i <= $page_nums; $i++) {
			    if ($i != $request_page) {
				    $page_html .= "<a class='num_page' href='$page_name$i'>$i</a>";
				} else {
				    $page_html .= "<a class='num_page current_page' >$request_page</a>";
				}
			}
			$page_html .= " ... ";
			$page_html .= "<a class='num_page' href='$page_name$i'>$pageTotal</a>";
		} else {
		    for ($i = 1; $i <= $pageTotal; $i++) {
			    if ($i != $request_page) {
				    $page_html .= "<a class='num_page' href='$page_name$i'>$i</a>";
				} else {
				    $page_html .= "<a class='num_page current_page' >$request_page</a>";
				}
			}
		}
	} else if ($right_ori >= $pageTotal) {
		$right_ori = $pageTotal;
		$left_ori = $pageTotal + 1 - $page_nums;
		if ($left_ori > 1) {
		    $page_html .= "<a class='num_page' href='$page_name$i'>1</a>";
		    $page_html .= " ... ";
		} else {
		    $left_ori = 1;
		}
		for ($i = $left_ori; $i <= $pageTotal; $i++) {
		    if ($i != $request_page) {
			    $page_html .= "<a class='num_page' href='$page_name$i'>$i</a>";
			} else {
			    $page_html .= "<a class='num_page current_page' >$request_page</a>";
			}
		}
	} else { // $right_ori < $pageTotal && $left_ori > 1
	    $page_html .= "<a class='num_page' href='$page_name$i'>1</a>";
		$page_html .= " ... ";
		for ($i = $left_ori; $i <= $right_ori; $i++) {
		    if ($i != $request_page) {
			    $page_html .= "<a class='num_page' href='$page_name$i'>$i</a>";
			} else {
			    $page_html .= "<a class='num_page current_page' >$request_page</a>";
			}
		}
		$page_html .= " ... ";
		$page_html .= "<a class='num_page' href='$page_name$pageTotal'>$pageTotal</a>";
	}
	
	if ($request_page_pre > 0 && $request_page_next <= $pageTotal) { // pre,next
	    $page_html .= "<a id='pre' class='pre_next' href='$page_name$request_page_pre'><em></em>pre</a>";
		$page_html .= "<a id='next' class='pre_next' href='$page_name$request_page_next'><em></em>next</a>";
	} else if ($request_page_pre <= 0 && $request_page_next <= $pageTotal) { // next
	    $page_html .= "<a id='pre' class='pre_next pre_next_disable' ><em></em>pre</a>";
		$page_html .= "<a id='next' class='pre_next' href='$page_name$request_page_next'><em></em>next</a>";
	} else if ($request_page_pre > 0 && $request_page_next > $pageTotal) { // pre
	    $page_html .= "<a id='pre' class='pre_next' href='$page_name$request_page_pre'><em></em>pre</a>";
		$page_html .= "<a id='next' class='pre_next pre_next_disable' ><em></em>next</a>";
	} else if ($request_page_pre <= 0 && $request_page_next > $pageTotal) { // pre
	    $page_html .= "<a id='pre' class='pre_next pre_next_disable'><em></em>pre</a>";
		$page_html .= "<a id='next' class='pre_next pre_next_disable'><em></em>next</a>";
	}
	return $page_html;
}
function ajaxPage($request_page, $pageTotal, $page_nums, $js_fuc_name="page") {
    $request_page_pre = $request_page - 1;
	$request_page_next = $request_page + 1;
	
	$req_left_nums = floor($page_nums / 2);
	$req_right_nums = floor($page_nums / 2);
	$left_ori = ($request_page - $req_left_nums);
	$right_ori = ($request_page + $req_right_nums);
	if ($left_ori <= 1) {
	    $left_ori = 1;
		$right_ori = $page_nums;
		if ($pageTotal > $page_nums) {
		    for ($i = 1; $i <= $page_nums; $i++) {
			    if ($i != $request_page) {
				    $page_html .= "<a class='num_page' href='javascript:".$js_fuc_name."($i)'>$i</a>";
				} else {
				    $page_html .= "<a class='num_page current_page' >$request_page</a>";
				}
			}
			$page_html .= " ... ";
			$page_html .= "<a class='num_page' href='javascript:".$js_fuc_name."($pageTotal)'>$pageTotal</a>";
		} else {
		    for ($i = 1; $i <= $pageTotal; $i++) {
			    if ($i != $request_page) {
				    $page_html .= "<a class='num_page' href='javascript:".$js_fuc_name."($i)'>$i</a>";
				} else {
				    $page_html .= "<a class='num_page current_page' >$request_page</a>";
				}
			}
		}
	} else if ($right_ori >= $pageTotal) {
		$right_ori = $pageTotal;
		$left_ori = $pageTotal + 1 - $page_nums;
		if ($left_ori > 1) {
		    $page_html .= "<a class='num_page' href='javascript:".$js_fuc_name."(1)'>1</a>";
		    $page_html .= " ... ";
		} else {
		    $left_ori = 1;
		}
		for ($i = $left_ori; $i <= $pageTotal; $i++) {
		    if ($i != $request_page) {
			    $page_html .= "<a class='num_page' href='javascript:".$js_fuc_name."($i)'>$i</a>";
			} else {
			    $page_html .= "<a class='num_page current_page' >$request_page</a>";
			}
		}
	} else { // $right_ori < $pageTotal && $left_ori > 1
	    $page_html .= "<a class='num_page' href='javascript:".$js_fuc_name."($i)'>1</a>";
		$page_html .= " ... ";
		for ($i = $left_ori; $i <= $right_ori; $i++) {
		    if ($i != $request_page) {
			    $page_html .= "<a class='num_page' href='javascript:".$js_fuc_name."($i)'>$i</a>";
			} else {
			    $page_html .= "<a class='num_page current_page' >$request_page</a>";
			}
		}
		$page_html .= " ... ";
		$page_html .= "<a class='num_page' href='javascript:".$js_fuc_name."($pageTotal)'>$pageTotal</a>";
	}
	
	if ($request_page_pre > 0 && $request_page_next <= $pageTotal) { // pre,next
	    $page_html .= "<a id='pre' class='pre_next' href='javascript:".$js_fuc_name."($request_page_pre)'><em></em>pre</a>";
		$page_html .= "<a id='next' class='pre_next' href='javascript:".$js_fuc_name."($request_page_next)'><em></em>next</a>";
	} else if ($request_page_pre <= 0 && $request_page_next <= $pageTotal) { // next
	    $page_html .= "<a id='pre' class='pre_next pre_next_disable' ><em></em>pre</a>";
		$page_html .= "<a id='next' class='pre_next' href='javascript:".$js_fuc_name."($request_page_next)'><em></em>next</a>";
	} else if ($request_page_pre > 0 && $request_page_next > $pageTotal) { // pre
	    $page_html .= "<a id='pre' class='pre_next' href='javascript:".$js_fuc_name."($request_page_pre)'><em></em>pre</a>";
		$page_html .= "<a id='next' class='pre_next pre_next_disable' ><em></em>next</a>";
	} else if ($request_page_pre <= 0 && $request_page_next > $pageTotal) { // pre
	    $page_html .= "<a id='pre' class='pre_next pre_next_disable'><em></em>pre</a>";
		$page_html .= "<a id='next' class='pre_next pre_next_disable'><em></em>next</a>";
	}
	return $page_html;
/*
    $html = "<a class='num_page current_page' >1</a>";
	if ($pageCount <= $page_nums) {
	    for ($pi = 2; $pi <= $pageCount; $pi++) {
	        $html .= "<a class='num_page' href='javascript:".$js_fuc_name."($pi)'>$pi</a>";	    
	    }
	} else {
	    for ($pi = 2; $pi <= $page_nums; $pi++) {
			$html .= "<a class='num_page' href='javascript:".$js_fuc_name."($pi)'>$pi</a>";
		}
		$html .= "...";
		$html .= "<a class='num_page' href='javascript:".$js_fuc_name."($pageCount)'>$pageCount</a>";
	}
    $html .= '<a id="pre" class="pre_next pre_next_disable"><em></em>pre</a>';
	if ($pageCount >= 2) {
		$html .= '<a id="next" class="pre_next" href="javascript:page(2)"><em></em>next</a>';
	} else {
		$html .= '<a id="next" class="pre_next pre_next_disable" ><em></em>next</a>';
	}
	return $html;
*/
}
?>