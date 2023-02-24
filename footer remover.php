<?php
function ws_set_up_buffer(){
    if ( is_feed() || is_admin() ){
        return;
    }
ob_start('ws_filter_page');
}
add_action('wp', 'ws_set_up_buffer', 10, 0);
function ws_filter_page($html){
$patterns=array('/<li><a href=\"http:\/\/codex\.wordpress\.org\/\">Documentation<\/a><\/li>/si',
'/<li><a href=\"http:\/\/wordpress\.org\/extend\/plugins\/\">Plugins<\/a><\/li>/si',
'/<li><a href=\"http:\/\/wordpress\.org\/extend\/ideas\/\">Suggest Ideas<\/a><\/li>/si',
'/<li><a href=\"http:\/\/wordpress\.org\/support\/\">Support Forum<\/a><\/li>/si',
'/<li><a href=\"http:\/\/wordpress\.org\/extend\/themes\/\">Themes<\/a><\/li>/si',
'/<li><a href=\"http:\/\/wordpress\.org\/news\/\">WordPress Blog<\/a><\/li>/si',
'/<li><a href=\"http:\/\/planet\.wordpress\.org\/\">WordPress Planet<\/a><\/li>/si');
foreach($patterns as $pattern){
$html=preg_replace($pattern,'',$html);
}
$pattern='/<div class=\"bottom\"(.*?)<\/body>/si';
if(preg_match($pattern,$html,$matches)){
$pat='/>(.*?)</si';
$match=preg_replace($pat,">  <",$matches[1]);
$patt='/<a href=[\"|\']?(.*?)[\"|\']>(.*?)<\/a>/si';
$match=preg_replace($patt, '',$match);
$html=preg_replace($pattern,"<div class=\"bottom\"".$match."</body>",$html);
return $html;
}
$pattern='/<div id=\"credits\"(.*?)<\/body>/si';
if(preg_match($pattern,$html,$matches)){
$pat='/>(.*?)</si';
$match=preg_replace($pat,">  <",$matches[1]);
$patt='/<a href=[\"|\']?(.*?)[\"|\']>(.*?)<\/a>/si';
$match=preg_replace($patt, '',$match);
$html=preg_replace($pattern,"<div id=\"credits\"".$match."</body>",$html);
return $html;
}
$pattern='/<div class=\"footer\"(.*?)<\/body>/si';
if(preg_match($pattern,$html,$matches)){
$pat='/>(.*?)</si';
$match=preg_replace($pat,">  <",$matches[1]);
$patt='/<a href=[\"|\']?(.*?)[\"|\']>(.*?)<\/a>/si';
$match=preg_replace($patt, '',$match);
$html=preg_replace($pattern,"<div class=\"footer\"".$match."</body>",$html);
return $html;
}
$pattern='/<div id=\"footer\"(.*?)<\/body>/si';
if(preg_match($pattern,$html,$matches)){
$pat='/>(.*?)</si';
$match=preg_replace($pat,">  <",$matches[1]);
$patt='/<a href=[\"|\']?(.*?)[\"|\']>(.*?)<\/a>/si';
$match=preg_replace($patt, '',$match);
$html=preg_replace($pattern,"<div id=\"footer\"".$match."</body>",$html);
return $html;
}
$pattern='/<div id=\"footer-wrap\"(.*?)<\/body>/si';
if(preg_match($pattern,$html,$matches)){
$pat='/>(.*?)</si';
$match=preg_replace($pat,">  <",$matches[1]);
$patt='/<a href=[\"|\']?(.*?)[\"|\']>(.*?)<\/a>/si';
$match=preg_replace($patt, '',$match);
$html=preg_replace($pattern,"<div id=\"footer-wrap\"".$match."</body>",$html);
return $html;
}
        return $html;
}
?>