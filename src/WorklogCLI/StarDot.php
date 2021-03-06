<?php 
namespace WorklogCLI;
class StarDot {

  function render($array) {
    
    $output = StarDot::_render($array);
    $output = implode("\n",$output);
    return trim($output)."\n";
    
  }
  function _render($array,$depth=0) {
    
    $output = [];
    $sequential = 0;
    foreach($array as $k => $v) {
      if (is_array($v)) {
        if ($depth==0) $output[] = '';
        $output[] = '* '.$k.':';
        $subout = StarDot::_render($v,$depth+1);
        foreach($subout as $each) $output[] = '  '.$each;
      } else {
        if ($k===$sequential) {
          $output[] = '. '.$v;
          $sequential++;
        } else {
          $output[] = '. '.$k.': '.$v;
        }
        
      }
    }
    return $output;
    
  }  
}
